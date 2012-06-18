<?php
namespace jubianchi\BehatViewerBundle\DataCollector;

use \Symfony\Component\HttpKernel\DataCollector\DataCollector,
    \Symfony\Component\HttpFoundation\Request,
    \Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class BehatViewerDataCollector extends DataCollector
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'behatviewer';
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request  $request
     * @param \Symfony\Component\HttpFoundation\Response $response
     * @param \Exception|null                            $exception
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
    }
}
