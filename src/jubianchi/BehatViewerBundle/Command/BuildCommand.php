<?php
namespace jubianchi\BehatViewerBundle\Command;

use \Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand,
    \Symfony\Component\Console\Input\InputInterface,
    \Symfony\Component\Console\Output\OutputInterface,
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
                    new InputArgument('project', InputArgument::OPTIONAL, 'The project to build')
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
        $repository = $this->getContainer()->get('doctrine')->getRepository('BehatViewerBundle:Project');
        $project = $repository->findOneById(1);

        if($project === null) {
            throw new \RuntimeException(sprintf('Project %s does not exist', $input->getArgument('project')));
        }

        passthru(sprintf('%s', $project->getTestCommand()));

        $this->getApplication()->find('behat-viewer:analyze')->run($input, $output);
    }
}
