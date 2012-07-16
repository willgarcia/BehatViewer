<?php
namespace jubianchi\BehatViewerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface,
    Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\EventDispatcher\EventSubscriberInterface,
    Symfony\Component\EventDispatcher\Event,
    Symfony\Component\Console\Formatter\OutputFormatterStyle,
    Symfony\Component\Console\Input\InputOption;

/**
 *
 */
class AnalyzeCommand extends ContainerAwareCommand implements EventSubscriberInterface
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
            ->setName('behat-viewer:analyze')
            ->setDescription('Analyzes a project\'s report file')
            ->setDefinition(
                array(
                    new InputArgument('project', InputArgument::OPTIONAL, 'The project to analyze'),
                    new InputOption('feature', null, InputOption::VALUE_REQUIRED, 'Rebuilds a feature')
                )
            )
        ;
    }

    /**
     * @static
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        $events = array(
            'foundFeature',
            'foundScenario',
            'foundStep',
            'foundTags'
        );

        return array_combine($events, $events);
    }

    /**
     * @param \Symfony\Component\EventDispatcher\Event $event
     */
    public function foundFeature(Event $event)
    {
        $this->log(
            $this->output,
            sprintf(
                'Found feature <comment>%s</comment>',
                $event->data['name']
            )
        );
    }

    /**
     * @param \Symfony\Component\EventDispatcher\Event $event
     */
    public function foundScenario(Event $event)
    {
        $this->log(
            $this->output,
            sprintf(
                'Found scenario <comment>%1$-77s</comment>',
                $event->data['name']
            ),
            $event->data['status'],
            1
        );
    }

    /**
     * @param \Symfony\Component\EventDispatcher\Event $event
     */
    public function foundStep(Event $event)
    {
        $this->log(
            $this->output,
            sprintf(
                'Found step <comment>%1$-80s</comment>',
                iconv('utf-8', 'us-ascii//TRANSLIT', $event->data['text'])
            ),
            $event->data['status'],
            2
        );
    }

    /**
     * @param \Symfony\Component\EventDispatcher\Event $event
     */
    public function foundTags(Event $event)
    {
        $this->log(
            $this->output,
            sprintf(
                'Found tags <pending> %s </pending>',
                implode(' </pending> <pending> ', (array) $event->data)
            )
        );
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param string $message
     * @param string|null $status
     * @param int $level
     */
    protected function log(OutputInterface $output, $message, $status = null, $level = 0)
    {
        if ($output->getVerbosity() == OutputInterface::VERBOSITY_VERBOSE) {
            $output->writeln($this->format($message, $status, $level));
        }
    }

    /**
     * @param $message
     * @param string|null $status
     * @param int $level
     * @return string
     */
    protected function format($message, $status = null, $level = 0) {
        $status = $status ? sprintf('<%1$s> %1$-10s </%1$s>', $status) : '            ';

        if (0 === $level) {
            $level = '+-';
        } else {
            $level = str_repeat('|-', $level) . '+';
        }

        return sprintf('<info>[INFO]</info> %s %s %s', $status, $level, $message);
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return \Symfony\Component\Console\Output\OutputInterface
     */
    protected function style(OutputInterface $output)
    {
        if ($output->getVerbosity() == OutputInterface::VERBOSITY_VERBOSE) {
            $output->getFormatter()->setStyle('passed', new OutputFormatterStyle('white', 'green'));
            $output->getFormatter()->setStyle('failed', new OutputFormatterStyle('white', 'red'));
            $output->getFormatter()->setStyle('skipped', new OutputFormatterStyle('white', 'blue'));
            $output->getFormatter()->setStyle('pending', new OutputFormatterStyle('white', 'blue'));
            $output->getFormatter()->setStyle('undefined', new OutputFormatterStyle('white', 'yellow'));
        }

        return $output;
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @throws \RuntimeException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $this->style($output);

        $project = $this->getContainer()->get('doctrine')
            ->getRepository('BehatViewerBundle:Project')
            ->findOneById(1);

        $report = $project->getOutputPath() . DIRECTORY_SEPARATOR . 'behat-viewer.json';
        if (!is_file($report) || !is_readable($report)) {
            throw new \RuntimeException(sprintf('File not found : %s', $report));
        }

        $feature = null;
        if (($feature = $input->getOption('feature'))) {
            $repository = $this->getContainer()->get('doctrine')->getRepository('BehatViewerBundle:Feature');
            $feature = $repository->findOneById($feature);
        }

        $data = json_decode(file_get_contents($report), true);

        $analyzer = $this->getContainer()->get('behat_viewer.analyzer');
        $analyzer->addSubscriber($this);
        $analyzer->analyze($project, $data, $feature);
    }
}
