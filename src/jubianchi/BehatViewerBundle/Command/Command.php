<?php
namespace jubianchi\BehatViewerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand,
    Symfony\Component\Console\Output\OutputInterface;

abstract class Command extends ContainerAwareCommand
{
    /**
     * @return \Symfony\Bundle\DoctrineBundle\Registry
     */
    public function getDoctrine()
    {
        return $this->getContainer()->get('doctrine');
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param string                                            $message
     * @param string|null                                       $status
     * @param int                                               $level
     */
    protected function log(OutputInterface $output, $message)
    {
        if (OutputInterface::VERBOSITY_VERBOSE === $output->getVerbosity()) {
            $output->writeln($this->formatLog($message));
        }
    }

    /**
     * @param $message
     * @param  string|null $status
     * @param  int         $level
     * @return string
     */
    protected function formatLog($message)
    {
        return sprintf(
            '<info>[INFO]</info> %s',
            $message
        );
    }
}
