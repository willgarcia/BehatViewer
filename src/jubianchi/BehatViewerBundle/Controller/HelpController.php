<?php
namespace jubianchi\BehatViewerBundle\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    \jubianchi\BehatViewerBundle\Entity,
    \Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class HelpController extends BehatViewerController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/help/{page}", name="behatviewer.help", defaults={"page" = "home"})
     * @Template()
     */
    public function indexAction($page)
    {
        $file = $this->getDataDirectory() . '/' . $page . '.md';
        if(false === file_exists($file)) {
            return new Response('', 404);
        }

        return $this->getResponse(array(
            'help' => file_get_contents($file),
            'sections' => array_keys($this->getSections())
        ));
    }

    protected function getDataDirectory()
    {
        return __DIR__ . '/../Resources/doc/help';
    }

    protected function getSections()
    {
        $content = new \RecursiveDirectoryIterator($this->getDataDirectory(), \FilesystemIterator::SKIP_DOTS);
        $sections = array();

        foreach($content as $directory) {
            if($directory->isDir()) {
                $sections[basename($directory)] = $directory;
            }
        }

      return $sections;
    }
}
