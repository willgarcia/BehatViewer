<?php
namespace jubianchi\BehatViewerBundle\Command;

use \Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand,
    \Symfony\Component\Console\Input\InputInterface,
    \Symfony\Component\Console\Output\OutputInterface,
    \Symfony\Component\Console\Input\InputArgument,
    \Symfony\Component\Console\Input\InputOption,
    \jubianchi\BehatViewerBundle\Entity;

/**
 *
 */
class DefinitionsCommand extends ContainerAwareCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('behat-viewer:definitions')
            ->setDescription('Reload project\'s definitions')
            ->setDefinition(
                array(
                    new InputArgument('project', InputArgument::OPTIONAL, 'The project to reload'),
                    new InputOption('clean', null, InputOption::VALUE_NONE, 'Removes all step definitions')
                )
            );
    }

    /**
     * @return \Symfony\Bundle\DoctrineBundle\Registry
     */
    public function getDoctrine()
    {
        return $this->getContainer()->get('doctrine');
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->getDoctrine()->getEntityManager();
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @throws \RuntimeException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('clean')) {
            $this->manager = $this->getDoctrine()->getEntityManager();
            $this->connection = $this->manager->getConnection();
            $this->platform = $this->connection->getDatabasePlatform();

            $this->connection->executeUpdate(
                $this->platform->getTruncateTableSQL(
                    $this->manager->getClassMetadata('BehatViewerBundle:Definition')->getTableName(),
                    true
                )
            );

            return;
        }

        $repository = $this->getDoctrine()->getRepository('BehatViewerBundle:Project');
        $project = $repository->findOneById(1);

        if ($project === null) {
            throw new \RuntimeException(sprintf('Project %s does not exist', $input->getArgument('project')));
        }

        $this->getDoctrine()->getRepository('BehatViewerBundle:Definition')->truncateForProject($project);

        $cmd = sprintf('%s -di', $project->getTestCommand());

        exec($cmd, $data);

        $this->saveProjectDefinitionsFromData($project, $data, $output);

        $this->log($output, '|/');

        $this->getEntityManager()->flush();
    }

    protected function saveProjectDefinitionsFromData(Entity\Project $project, $data, $output)
    {
        $definition = null;
        foreach ($data as $item) {
            $line = trim($item);

            if (empty($line) === false) {
                if ($definition === null) {
                    $this->log($output, sprintf('Found step definition <comment>%s</comment>', $line), 1);

                    $definition = $this->getStepDefinition($project, $line);
                }

                if (strpos($line, '-') === 0) {
                    $this->log($output, 'Adding step <comment>description</comment>', 2);

                    $definition->setDescription(trim($line, '- '));
                }

                if (strpos($line, '#') === 0) {
                    $infos = $this->getContextInfosFromString($line);

                    $this->log($output, sprintf('Adding step context <comment>%s</comment>', $infos['context']), 2);

                    $definition->setContext($infos['context']);
                    $definition->setMethod($infos['method']);

                    $this->getEntityManager()->persist($definition);
                    $definition = null;

                    $this->log($output, '|-/');
                }
            }
        }
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param string                                            $message
     * @param int                                               $level
     */
    protected function log($output, $message, $level = 0)
    {
        $prefix = str_repeat('|-', $level) . ($level ? '+' : '');
        $prefix = '' !== $prefix ? $prefix . ' ' : '';

        $output->writeln(sprintf('<info>[INFO]</info> %s%s', $prefix, $message));
    }

    /**
     * @param string $string
     *
     * @return array
     */
    protected function getContextInfosFromString($string)
    {
        $parts = explode('::', trim($string, '# '));
        $method = $parts[1];
        $parts = explode('\\', $parts[0]);
        $context = end($parts);

        return array(
            'context' => $context,
            'method' => $method
        );
    }

    /**
     * @param \jubianchi\BehatViewerBundle\Entity\Project $project
     * @param string                                      $snippet
     *
     * @return \jubianchi\BehatViewerBundle\Entity\Definition
     */
    protected function getStepDefinition(Entity\Project $project, $snippet)
    {
        $definition = new Entity\Definition();
        $definition->setProject($project);
        $definition->setSnippet($snippet);

        return $definition;
    }
}
