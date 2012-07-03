<?php
namespace jubianchi\BehatViewerExtension\Formatter;

use Behat\Behat\Formatter\ConsoleFormatter,
    Behat\Behat\Event,
    Behat\Behat\Exception\FormatterException,
    Behat\Gherkin\Node;

/**
 *
 */
class BehatViewerFormatter extends ConsoleFormatter
{
    private $features = array();

    private $feature;
    private $scenario;

  /**
   * @var \Behat\Behat\DataCollector\LoggerDataCollector;
   */
  private $logger;

    /**
     * @static
     *
     * @return string
     */
    public static function getDescription()
    {
        return "Generates a JSON report for behat-viewer.";
    }

    /**
     * @static
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        $events = array(
            'beforeSuite', 'afterSuite',
            'beforeFeature',
            'beforeBackground',
            'beforeScenario', 'afterScenario',
            'beforeStep', 'afterStep',
            'beforeOutline', 'afterOutline'
        );

        return array_combine($events, $events);
    }

    /**
     * @return array
     */
    protected function getDefaultParameters()
    {
        return array();
    }

    /**
     * @param \Behat\Behat\Event\OutlineEvent $event
     */
    public function beforeOutline(Event\OutlineEvent $event)
    {
        $outline = $event->getOutline();
        $this->scenario = $outline->getTitle();

        $this->features[$this->feature]['scenarios'][$this->scenario] = array(
            'name' => $this->scenario,
            'tags' => $outline->getOwnTags(),
            'steps' => array(),
            'passed' => 0,
            'failed' => 0,
            'skipped' => 0,
            'undefined' => 0,
            'pending' => 0,
            'status' => 'passed'
        );
    }

    /**
     * @param \Behat\Behat\Event\OutlineEvent $event
     */
    public function afterOutline(Event\OutlineEvent $event)
    {
        if ($this->features[$this->feature]['scenarios'][$this->scenario]['status'] !== 'passed') {
            $this->features[$this->feature]['status'] = 'failed';
            $this->features[$this->feature]['failed']++;
        } else {
            $this->features[$this->feature]['passed']++;
        }
    }

    /**
     * @param \Behat\Behat\Event\SuiteEvent $event
     */
    public function beforeSuite(Event\SuiteEvent $event)
    {
        $this->logger = $event->getLogger();
    }

    /**
     * @param \Behat\Behat\Event\SuiteEvent $event
     */
    public function afterSuite(Event\SuiteEvent $event)
    {
        $this->write(json_encode($this->features));

        $this->logger = null;
    }

    /**
     * @param \Behat\Behat\Event\FeatureEvent $event
     */
    public function beforeFeature(Event\FeatureEvent $event)
    {
        $feature = $event->getFeature();
        $this->feature = basename($feature->getFile(), '.feature');

        $this->features[$this->feature] = array(
            'name' => $feature->getTitle() ? : $feature,
            'desc' => $feature->getDescription(),
            'tags' => $feature->getTags(),
            'scenarios' => array(),
            'background' => array(),
            'passed' => 0,
            'failed' => 0,
            'steps' => array(
                'passed' => 0,
                'failed' => 0,
                'skipped' => 0,
                'undefined' => 0,
                'pending' => 0
            )
        );
    }

    /**
     * @param \Behat\Behat\Event\BackgroundEvent $event
     */
    public function beforeBackground(Event\BackgroundEvent $event)
    {
        $this->features[$this->feature]['background'] = array(
            'steps' => array(),
            'passed' => 0,
            'failed' => 0,
            'skipped' => 0,
            'undefined' => 0,
            'pending' => 0,
            'status' => 'passed'
        );
    }

    /**
     * @param \Behat\Behat\Event\ScenarioEvent $event
     */
    public function beforeScenario(Event\ScenarioEvent $event)
    {
        $scenario = $event->getScenario();
        $this->scenario = $scenario->getTitle();

        $this->features[$this->feature]['scenarios'][$this->scenario] = array(
            'name' => $this->scenario,
            'tags' => $scenario->getOwnTags(),
            'steps' => array(),
            'passed' => 0,
            'failed' => 0,
            'skipped' => 0,
            'undefined' => 0,
            'pending' => 0,
            'status' => 'passed'
        );
    }

    /**
     * @param \Behat\Behat\Event\ScenarioEvent $event
     */
    public function afterScenario(Event\ScenarioEvent $event)
    {
        if ($this->features[$this->feature]['scenarios'][$this->scenario]['status'] !== 'passed') {
            $this->features[$this->feature]['status'] = 'failed';
            $this->features[$this->feature]['failed']++;
        } else {
            $this->features[$this->feature]['passed']++;
        }
    }

    /**
     * @param \Behat\Behat\Event\StepEvent $event
     */
    public function beforeStep(Event\StepEvent $event)
    {
        $step = $event->getStep();
        $args = $step->getArguments();

        $data = array(
            'hash' => uniqid(),
            'type' => $step->getType(),
            'background' => $step->getParent() instanceof \Behat\Gherkin\Node\BackgroundNode,
            'clean' => $step->getText(),
            'text' => $step->getText(),
            'file' => $step->getFile(),
            'line' => $step->getLine(),
            'status' => 'passed',
            'definition' => '',
            'snippet' => '',
            'screen' => '',
            'exception' => '',
            'argument' => ''
        );

        if (isset($args[0]) && ($args[0] instanceof Node\TableNode || $args[0] instanceof Node\PyStringNode)) {
            $data['argument'] = (string) $args[0];
        }

        $this->features[$this->feature]['scenarios'][$this->scenario]['steps'][] = $data;
    }

    /**
     * @param \Behat\Behat\Event\StepEvent $event
     */
    public function afterStep(Event\StepEvent $event)
    {
        $status = $this->getResultColorCode($event->getResult());

        $index = count($this->features[$this->feature]['scenarios'][$this->scenario]['steps']) - 1;

        $this->features[$this->feature]['scenarios'][$this->scenario]['steps'][$index]['status'] = $status;

        if (($definition = $event->getDefinition()) !== null) {
            $this->features[$this->feature]['scenarios'][$this->scenario]['steps'][$index]['definition'] = $definition->getPath();
        }

        if ($status !== 'passed') {
            $this->features[$this->feature]['scenarios'][$this->scenario]['status'] = 'failed';

            if ($status === 'undefined') {
                $snippets = $this->logger->getDefinitionsSnippets();

                if (isset($snippets[$event->getSnippet()->getHash()])) {
                    $snippet = $snippets[$event->getSnippet()->getHash()];
                    $this->features[$this->feature]['scenarios'][$this->scenario]['steps'][$index]['snippet'] = (string) $snippet;
                }
            }
        }

        if ($status === 'failed') {
            $this->features[$this->feature]['scenarios'][$this->scenario]['steps'][$index]['exception'] = $event->getException()->getMessage();
        }

        $tags = array();
        if ($event->getStep()->getParent() instanceof \Behat\Gherkin\Node\BackgroundNode) {
          $tags = $event->getStep()->getParent()->getFeature()->getTags();
        } else {
          $tags = $event->getStep()->getParent()->getTags();
        }

        if (in_array($status, array('passed', 'failed')) && in_array('javascript', $tags)) {
            sleep(1);

            if ($screenid = $this->parameters->get('screen_id')) {
                exec(sprintf('xdpyinfo -display :%d >/dev/null 2>&1 && echo OK || echo KO', $screenid), $output, $return);

                if ($return === 0 && sizeof($output) > 0 && $output[0] == 'OK') {
                    $screen = sprintf('%s/%s.png', sys_get_temp_dir(), uniqid());

                    exec(sprintf('DISPLAY=:%d import -window root %s 2>&1', $screenid, $screen), $output, $return);
                    if ($return === 0) {
                        $img = $this->base64Encode($screen);
                        $this->features[$this->feature]['scenarios'][$this->scenario]['steps'][$index]['screen'] = $img;
                        unlink($screen);
                    }
                }
            }
        }

        $this->features[$this->feature]['scenarios'][$this->scenario][$status]++;
        $this->features[$this->feature]['steps'][$status]++;
    }

    /**
     * @param string $filename
     *
     * @return string
     */
    protected function base64Encode($filename)
    {
        if (!file_exists($filename)) {
            throw new \RuntimeException(sprintf('File "%s" does not exist', $filename));
        }

        $imgtype = array('jpg', 'gif', 'png');
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array($filetype, $imgtype)) {
            $imgbinary = fread(fopen($filename, "r"), filesize($filename));
        } else {
            throw new \RuntimeException(sprintf('File type "%s" is not supported', $filetype));
        }

        return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
    }

    /**
     * @return resource
     *
     * @throws \Behat\Behat\Exception\FormatterException
     */
    protected function createOutputStream()
    {
        $outputPath = $this->parameters->get('viewer_output_path');

        if (null === $outputPath) {
            throw new FormatterException(sprintf(
                'You should specify "viewer_output_path" parameter for %s', get_class($this)
            ));
        } elseif(false === is_dir($outputPath))
        {
            throw new FormatterException(sprintf(
                'Directory path expected as "viewer_output_path" parameter of %s, but got: %s',
                get_class($this),
                $outputPath
            ));
        }

        if (!is_dir($outputPath)) {
            mkdir($outputPath, 0777, true);
        }

        $output = $outputPath . DIRECTORY_SEPARATOR . 'behat-viewer.json';
        if (is_file($output)) {
            unlink($output);
        }

        return fopen($output, 'w+');
    }
}
