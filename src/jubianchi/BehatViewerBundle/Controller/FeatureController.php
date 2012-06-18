<?php

namespace jubianchi\BehatViewerBundle\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller,
    \Symfony\Component\HttpFoundation\Request,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    \jubianchi\BehatViewerBundle\Entity;

/**
 * @Route("/feature")
 */
class FeatureController extends BehatViewerController
{
    /**
     * @var \jubianchi\BehatViewerBundle\Entity\Feature
     */
    private $feature;

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function beforeAction()
    {
        if($response = parent::beforeAction()) {
            return $response;
        }

        if(($build = $this->getSession()->getBuild()) === null)
        {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('No build found.');
        }
        else
        {
            $id = $this->getRequest()->get('id');
            $repository = $this->getDoctrine()->getRepository('BehatViewerBundle:Feature');
            $this->feature = $repository->findOneById($id);

            if($this->feature === null) {
                throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException(
                    sprintf(
                        'The #%d "%s" feature was not found in the build #%d.',
                        $id,
                        $this->getRequest()->get('slug'),
                        $build->getId()
                    )
                );
            }
        }
    }

    /**
     * @return array|\Symfony\Component\HttpFoundation\Response
     *
     * @Route("/{id}/{slug}", name="behatviewer.feature", requirements={"id" = "\d+"})
     * @Template()
     */
    public function indexAction($id, $slug)
    {
        if($response = $this->beforeAction()) {
            return $response;
        }

        return $this->getResponse(array(
            'feature' => $this->feature,
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
    public function sourceAction()
    {
        if($response = $this->beforeAction()) {
            return $response;
        }

        return $this->getResponse(array(
            'feature' => $this->feature,
            'build' => $this->getSession()->getBuild(),
            'source' => file_get_contents($this->feature->getFile())
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
