<?php
namespace jubianchi\BehatViewerBundle\Features\Context;

use \Behat\Behat\Context\BehatContext,
    \Behat\Symfony2Extension\Context\KernelAwareInterface,
    \Symfony\Component\HttpKernel\KernelInterface;

class BehatViewerContext extends BehatContext implements KernelAwareInterface
{
    protected $parameters = array();

    public function __construct(array $parameters = array())
    {
        $this->parameters = $parameters;
    }
    /**
     * @var \Symfony\Component\HttpKernel\KernelInterface
     */
    protected $kernel;

    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }
}
