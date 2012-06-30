<?php

namespace jubianchi\BehatViewerBundle\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    \jubianchi\BehatViewerBundle\Form\Type\ProjectType;

/**
 * @Route("/stats")
 */
class StatsController extends BehatViewerController
{
    /**
     * @return array
     *
     * @Route("/", name="behatviewer.stats")
     * @Template()
     */
    public function indexAction()
    {
        if ($response = $this->beforeAction()) {
            return $response;
        }

        $project = $this->getSession()->getProject();
        $repository = $this->getDoctrine()->getRepository('BehatViewerBundle:Build');
        $builds = $repository->findLastBuildsForProject($project, 10);

        return $this->getResponse(array(
            'builds' => $builds
        ));
    }
}
