<?php

namespace jubianchi\BehatViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/definitions")
 */
class DefinitionsController extends BehatViewerController
{
    /**
     * @return array
     *
     * @Route("/", name="behatviewer.definitions")
     * @Template()
     */
    public function indexAction()
    {
        $this->beforeAction();

        $definitions = array();
        $contexts = array();
        $project = $this->getSession()->getProject();
        $repository = $this->getDoctrine()->getRepository('BehatViewerBundle:Definition');

        if ($project !== null) {
            $definitions = $repository->findByProject($project->getId());
            $contexts = $repository->getContexts($project);
        }

        return $this->getResponse(array(
            'items' => $definitions,
            'contexts' => $contexts
        ));
    }
}
