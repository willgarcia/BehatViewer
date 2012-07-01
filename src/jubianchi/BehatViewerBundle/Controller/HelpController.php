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
     * @Route("/help/{section}/{page}", name="behatviewer.help", defaults={"section" = "", "page" = "home"})
     * @Template()
     */
    public function indexAction($section, $page)
    {
        $section = $section ? $section . '/' : '';
        $file = $this->getDataDirectory() . '/' . $section . $page . '.md';
        if (false === file_exists($file)) {
            return new Response('', 404);
        }

        return $this->getResponse(array(
            'help' => file_get_contents($file),
            'sections' => $this->getSections()
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

        foreach ($content as $directory) {
            if ($directory->isDir()) {
                $section = basename($directory);
                $sections[$section] = array(
                    'label' => preg_replace('/\d+[\.|\-]/', '', $section),
                    'links' => array()
                );

                $iterator = new \RecursiveRegexIterator(
                    new \RecursiveDirectoryIterator($directory->getPathname()),
                    '/[a-z]*.md$/i'
                );

                foreach($iterator as $file) {
                    $file = basename($file, '.md');
                    $label = preg_replace('/\d+[\.|\-]/', '', $file);
                    $label = str_replace('-', ' ', $label);
                    $label = ucfirst($label);
                    $sections[$section]['links'][$label] = $file;
                }
            }
        }

        return $sections;
    }
}
