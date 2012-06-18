<?php
namespace jubianchi\BehatViewerBundle\Features\Context;

use \Behat\Behat\Context\BehatContext,
    \Behat\Symfony2Extension\Context\KernelAwareInterface,
    \Symfony\Component\HttpKernel\KernelInterface;

class BehatViewerContext extends BehatContext implements KernelAwareInterface
{
    /**
     * @var \Symfony\Component\HttpKernel\KernelInterface
     */
    protected $kernel;

    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }
}
