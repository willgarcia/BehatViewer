<?php
namespace jubianchi\BehatViewerBundle\Command;

use Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface,
    Symfony\Component\EventDispatcher\EventSubscriberInterface,
    Symfony\Component\EventDispatcher\Event,
    Symfony\Component\Console\Formatter\OutputFormatterStyle,
    Symfony\Component\Console\Input\InputOption;

/**
 *
 */
class AnalyzeCommand extends ProjectCommand implements EventSubscriberInterface
{
    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    private $output;

    protected function configure()
    {
        parent::configure();

        $this
            ->setName('behat-viewer:analyze')
            ->setDescription('Analyzes a project\'s report file')
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
        if (OutputInterface::VERBOSITY_VERBOSE === $output->getVerbosity()) {
            $output->writeln($this->formatLog($message, $status, $level));
        }
    }

    /**
     * @param $message
     * @param string|null $status
     * @param int $level
     * @return string
     */
    protected function formatLog($message, $status = null, $level = 0) {
        return sprintf(
            '<info>[INFO]</info> %s %s %s',
            $this->formatStatus($status),
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

    protected function formatStatus($status) {
        return $status ? sprintf('<%1$s> %1$-10s </%1$s>', $status) : '            ';
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return \Symfony\Component\Console\Output\OutputInterface
     */
    protected function styleOutput(OutputInterface $output)
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
        parent::execute($input, $output);

        $this->output = $this->styleOutput($output);
        $project = $this->getProject();
        $report = $project->getOutputPath() . DIRECTORY_SEPARATOR . 'behat-viewer.json';

        if (!is_file($report) || !is_readable($report)) {
            throw new \RuntimeException(sprintf('File not found : %s', $report));
        }

        $data = json_decode(file_get_contents($report), true);
        $analyzer = $this->getContainer()->get('behat_viewer.analyzer');
        $analyzer->addSubscriber($this);
        $analyzer->analyze($project, $data);
    }
}
