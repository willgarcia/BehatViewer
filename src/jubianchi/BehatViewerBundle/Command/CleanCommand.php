<?php
namespace jubianchi\BehatViewerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface,
    Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\EventDispatcher\EventSubscriberInterface,
    Symfony\Component\EventDispatcher\Event,
    Symfony\Component\Console\Formatter\OutputFormatterStyle,
    Symfony\Component\Console\Input\InputOption,
    jubianchi\BehatViewerBundle\Entity;

/**
 *
 */
class CleanCommand extends ContainerAwareCommand
{
    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    private $output;

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('behat-viewer:clean')
            ->setDescription('Cleans outdated builds')
            ->setDefinition(
                array(
                    new InputArgument('project', InputArgument::OPTIONAL, 'The project to clean')
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
      $repository = $this->getContainer()->get('doctrine')->getRepository('BehatViewerBundle:Project');
      $project = $repository->findOneById(1);

      $output->writeln(sprintf('<info>[INFO]</info> Cleaning outdated builds for project <comment>%s</comment>', $project->getSlug()));

      $repository = $this->getContainer()->get('doctrine')->getRepository('BehatViewerBundle:Build');
      $count = $repository->removeWeekBuildsForProject($project);

      $output->writeln(sprintf('<info>[INFO]</info> Deleted <comment>%d</comment> build(s)', $count));
    }
}
