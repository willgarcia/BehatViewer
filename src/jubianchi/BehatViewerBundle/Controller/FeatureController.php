<?php

namespace jubianchi\BehatViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    jubianchi\BehatViewerBundle\Entity;

/**
 * @Route("/feature")
 */
class FeatureController extends BehatViewerController
{
    /**
     * @return array|\Symfony\Component\HttpFoundation\Response
     *
     * @Route("/{id}/{slug}", name="behatviewer.feature", requirements={"id" = "\d+"})
     * @Template()
     */
    public function indexAction(Entity\Feature $feature)
    {
		$this->beforeAction();

        return $this->getResponse(array(
            'feature' => $feature,
            'build' => $this->getSession()->getBuild(),
            'features' => $this->getSession()->getBuild()->getFeatures()
        ));
    }

    /**
     * @return array|\Symfony\Component\HttpFoundation\Response
     *
     * @Route("/{id}/{slug}/source", name="behatviewer.source", requirements={"id" = "\d+"})
     * @Template()
     */
    public function sourceAction(Entity\Feature $feature)
    {
		$this->beforeAction();

        return $this->getResponse(array(
            'feature' => $feature,
            'build' => $this->getSession()->getBuild(),
            'source' => file_get_contents($feature->getFile())
        ));
    }

  /**
   * @return string
   *
   * @Route("/screenshot/{id}", name="behatviewer.screenshot", options={"expose"=true})
   */
  public function screenshotAction(Entity\Step $step)
  {
    return new \Symfony\Component\HttpFoundation\Response(
      $step->getScreen(),
      200,
      array(
        'Content-type' => 'image/png'
      )
    );
  }
}
