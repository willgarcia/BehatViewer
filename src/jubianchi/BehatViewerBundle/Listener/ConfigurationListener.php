<?php
namespace jubianchi\BehatViewerBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerAware,
    Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ConfigurationListener extends \Symfony\Component\DependencyInjection\ContainerAware
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        switch (true) {
            case $exception instanceof \jubianchi\BehatViewerBundle\Exception\NoProjectConfiguredException:
                $event->setResponse(new \Symfony\Component\HttpFoundation\RedirectResponse($this->container->get('router')->generate('behatviewer.config')));
                break;
            default:
                break;
        }
    }
}
