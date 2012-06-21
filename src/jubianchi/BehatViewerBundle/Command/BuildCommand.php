<?php
namespace jubianchi\BehatViewerBundle\Command;

use \Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand,
    \Symfony\Component\Console\Input\InputInterface,
    \Symfony\Component\Console\Output\OutputInterface,
    \Symfony\Component\Console\Input\InputOption,
    \Symfony\Component\Console\Input\InputArgument;

/**
 *
 */
class BuildCommand extends ContainerAwareCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('behat-viewer:build')
            ->setDescription('Builds a project\'s report file')
            ->setDefinition(
                array(
                    new InputArgument('project', InputArgument::OPTIONAL, 'The project to build'),
                    new InputOption('feature', null, InputOption::VALUE_REQUIRED, 'Rebuilds a feature'),
                    new InputOption('definitions', null, InputOption::VALUE_NONE, 'Updates definition list'),
                )
            )
        ;
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @throws \RuntimeException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $project = $this->getContainer()->get('doctrine')
            ->getRepository('BehatViewerBundle:Project')
            ->findOneById(1);

        if($input->getOption('definitions')) {
            $this->getApplication()->find('behat-viewer:definitions')->run(new \Symfony\Component\Console\Input\ArgvInput(), $output);
        }

        if($project === null) {
            throw new \RuntimeException(sprintf('Project %s does not exist', $input->getArgument('project')));
        }

        $cmd = $project->getTestCommand();
        if(($feature = $input->getOption('feature'))) {
            $repository = $this->getContainer()->get('doctrine')->getRepository('BehatViewerBundle:Feature');
            $feature = $repository->findOneById($feature);

            $cmd = preg_replace('/@[\w]+/', '', $cmd);
            $cmd .= ' ' . escapeshellarg($feature->getFile());
        }

        $process = new \Symfony\Component\Process\Process($cmd, $project->getRootPath());
        $process->setTimeout(600);
        $process->run(function ($type, $buffer) use($output) {
            if ('err' === $type) {
                $output->writeln('<error>' . $buffer . '</error>');
            } else {
                $output->getFormatter()->setStyle('tag', new \Symfony\Component\Console\Formatter\OutputFormatterStyle('blue', null, array('bold')));
                $output->getFormatter()->setStyle('string', new \Symfony\Component\Console\Formatter\OutputFormatterStyle('green', null, array('bold')));
                $output->getFormatter()->setStyle('keyword', new \Symfony\Component\Console\Formatter\OutputFormatterStyle('white', null, array('bold', 'underscore')));

                $buffer = rtrim($buffer);
                $buffer = preg_replace('/(\s*)(@[\w\-\:]+)(\s*)/', '$1<tag>$2</tag>$3', $buffer);
                $buffer = preg_replace('/"([^\\"]*)"/', '"<string>$1</string>"', $buffer);
                $buffer = preg_replace('/\s+(# [\w\/\-_\.:\\\\\(\)]*)/', '     <comment>$1</comment>', $buffer);
                $buffer = preg_replace('/^(\s+)(Given|Then|And|But|Scenario:|Feature:|Background:|Scenario Outline:|Examples:)/', '$1<keyword>$2</keyword>', $buffer);

                $output->writeln($buffer);
            }
        });

        $this->getApplication()->find('behat-viewer:analyze')->run($input, $output);
    }
}
