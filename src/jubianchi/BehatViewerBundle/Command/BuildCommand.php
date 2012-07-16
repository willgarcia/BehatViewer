<?php
namespace jubianchi\BehatViewerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface,
    Symfony\Component\Console\Input\InputOption,
    Symfony\Component\Console\Input\InputArgument;

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

        if ($input->getOption('definitions')) {
            $this->getApplication()->find('behat-viewer:definitions')->run(new \Symfony\Component\Console\Input\ArgvInput(), $output);
        }

        if ($project === null) {
            throw new \RuntimeException(sprintf('Project %s does not exist', $input->getArgument('project')));
        }

        $cmd = $project->getTestCommand();
        $cmd = str_replace("\r\n", PHP_EOL, $cmd);

        if (file_exists('build.sh')) {
            unlink('build.sh');
        }
        $fp = fopen('build.sh', 'w+');
        $script = '#!/bin/sh' . PHP_EOL . $cmd;
        fwrite($fp, $script, strlen($script));
        fclose($fp);

        $process = new \jubianchi\BehatViewerBundle\Process\UnbefferedProcess('sh -e build.sh', $project->getRootPath());
        $process->setTimeout(600);
        $process->run(function ($type, $buffer) use ($output) {
            if ('err' === $type) {
                $output->writeln('<error>' . $buffer . '</error>');
            } else {
                $output->write($buffer);
            }
        });

        if (file_exists('build.sh')) {
            //unlink('build.sh');
        }

        $this->getApplication()->find('behat-viewer:analyze')->run($input, $output);
    }
}
