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
                    new InputOption('clean', null, InputOption::VALUE_NONE, 'Removes outdated builds')
                )
            );
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @throws \RuntimeException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if($input->getOption('clean')) {
            $repository = $this->getContainer()->get('doctrine')->getRepository('BehatViewerBundle:Build');
            $repository->removeWeekBuilds();

            return;
        }

        $repository = $this->getContainer()->get('doctrine')->getRepository('BehatViewerBundle:Project');
        $project = $repository->findOneById(1);

        if($project === null) {
            throw new \RuntimeException(sprintf('Project %s does not exist', $input->getArgument('project')));
        }

        passthru(sprintf('%s', $project->getTestCommand()));

        $this->getApplication()->find('behat-viewer:analyze')->run($input, $output);
    }
}
