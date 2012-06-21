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
class DeleteCommand extends ContainerAwareCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('behat-viewer:delete')
            ->setDescription('Deletes selected builds')
            ->setDefinition(
                array(
                    new InputArgument('builds', InputArgument::REQUIRED, 'The builds to delete'),
                    new InputArgument('project', InputArgument::OPTIONAL, 'The project to build'),
                )
            )
        ;
    }

  /**
   * @param InputInterface $input
   * @param OutputInterface $output
   *
   * @throws \RuntimeException
   *
   * @return int
   */
  protected function execute(InputInterface $input, OutputInterface $output)
    {
        $repository = $this->getContainer()->get('doctrine')->getRepository('BehatViewerBundle:Project');
        $project = $repository->findOneById(1);

        $builds = $input->getArgument('builds');
        $matches = array();
        $repository = $this->getContainer()->get('doctrine')->getRepository('BehatViewerBundle:Build');

        $output->writeln(sprintf('<info>[INFO]</info> Deleting builds for project <comment>%s</comment>', $project->getSlug()));

        switch(true) {
          case preg_match('/^(\d+)\.\.(\d+)$/', $builds, $matches):
              $output->writeln(sprintf(
                '<info>[INFO]</info> Deleting builds by <comment>ID interval [%d - %d]</comment>',
                $matches[1],
                $matches[2]
              ));

              $count = $repository->removeBuildsByIdIntervalForProject($matches[1], $matches[2], $project);
              break;
          case preg_match('/^([\d\-]+)\.\.([\d\-]+)$/', $builds, $matches):
              try {
                  $start = new \DateTime($matches[1]);
                  $end = new \DateTime($matches[2]);
              } catch(\Exception $e) {
                  throw new \RuntimeException('Invalid date');
              }

              $output->writeln(sprintf(
                '<info>[INFO]</info> Deleting builds by <comment>date interval [%s - %s]</comment>',
                $start->format('Y-m-d'),
                $end->format('Y-m-d')
              ));

              $count = $repository->removeBuildsByDateIntervalForProject($start, $end, $project);
              break;
          default:
              $count = $repository->removeBuildsByDateIntervalForProject(
                  $repository->findOneById((int)$builds),
                  $project
              );
              break;
        }

        $output->writeln(sprintf('<info>[INFO]</info> Deleted <comment>%d</comment> build(s)', $count));

        return 0;
    }
}
