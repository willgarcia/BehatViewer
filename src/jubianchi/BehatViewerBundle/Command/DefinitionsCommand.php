<?php
namespace jubianchi\BehatViewerBundle\Command;

use Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface,
    Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\Console\Input\InputOption,
    jubianchi\BehatViewerBundle\Entity;

/**
 *
 */
class DefinitionsCommand extends ProjectCommand
{
    protected function configure()
    {
        parent::configure();

        $this
            ->setName('behat-viewer:definitions')
            ->setDescription('Reload project\'s definitions')
            ->addOption('clean', null, InputOption::VALUE_NONE, 'Removes all step definitions')
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
        parent::execute($input, $output);

        $project = $this->getProject();

        $this->getDoctrine()->getRepository('BehatViewerBundle:Definition')->truncateForProject($project);

        if (true === $input->getOption('clean')) {
            return 0;
        }

        exec(sprintf('php behat.phar -di'), $data);

        $this->saveProjectDefinitionsFromData($project, $data, $output);

        $this->getDoctrine()->getEntityManager()->flush();
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

                    $this->getDoctrine()->getEntityManager()->persist($definition);
                    $definition = null;
                }
            }
        }
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
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param string                                            $message
     * @param string|null                                       $status
     * @param int                                               $level
     */
    protected function log(OutputInterface $output, $message, $level = 0)
    {
        if (OutputInterface::VERBOSITY_VERBOSE === $output->getVerbosity()) {
            $output->writeln($this->formatLog($message, $level));
        }
    }

    /**
     * @param $message
     * @param  string|null $status
     * @param  int         $level
     * @return string
     */
    protected function formatLog($message, $level = 0)
    {
        return sprintf(
            '<info>[INFO]</info> %s %s',
            $this->formatLevel($level),
            $message
        );
    }

    protected function formatLevel($level = 0)
    {
        $level = $level < 0 ? 0 : $level;

        if (0 === $level) {
            $level = '+-';
        } else {
            $level = str_repeat('|-', $level) . '+';
        }

        return $level;
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
