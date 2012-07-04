<?php
namespace jubianchi\BehatViewerExtension\Formatter;

use Behat\Behat\Formatter\ConsoleFormatter,
    Behat\Behat\Event,
    Behat\Behat\Exception\FormatterException,
    Behat\Gherkin\Node;

/**
 *
 */
class BehatViewerDistantFormatter extends BehatViewerFormatter
{
    /**
     * @param \Behat\Behat\Event\SuiteEvent $event
     */
    public function afterSuite(Event\SuiteEvent $event)
    {
        parent::afterSuite($event);

        $outputPath = $this->parameters->get('viewer_output_path');
        $file = $outputPath . DIRECTORY_SEPARATOR . 'behat-viewer.json';
        $handle = fopen($file, 'r');

        echo 'Initializing request to ' . $this->parameters->get('behat_viewer_url') . PHP_EOL;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->parameters->get('behat_viewer_url'),
            CURLOPT_PUT => TRUE,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_INFILE => $handle,
            CURLOPT_INFILESIZE => filesize($file)
        ));

        echo 'Sending report to ' . $this->parameters->get('behat_viewer_url') . PHP_EOL;
        $success = curl_exec($curl);
        echo 'Request ' . ($success ? 'successfully' : 'not') . ' sent !';
    }
}
