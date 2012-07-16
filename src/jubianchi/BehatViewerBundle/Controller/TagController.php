<?php

namespace jubianchi\BehatViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    jubianchi\BehatViewerBundle\Entity;

/**
 * @Route("/tag")
 */
class TagController extends BehatViewerController
{
    /**
     * @param \jubianchi\BehatViewerBundle\Entity\Tag $tag
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/{slug}", name="behatviewer.tag")
     * @Template("BehatViewerBundle:Default:index.html.twig")
     */
    public function indexAction(Entity\Tag $tag)
    {
        $this->beforeAction();

        $build = $this->getSession()->getBuild();

        $features = $this->getDoctrine()->getRepository('BehatViewerBundle:Feature')->findByTagAndBuild($tag, $build);
        $scenarios = $this->getDoctrine()->getRepository('BehatViewerBundle:Scenario')->findByTagAndBuild($tag, $build);

        foreach ($scenarios as $scenario) {
            if (!in_array($scenario->getFeature(), $features)) {
                $features[] = $scenario->getFeature();
            }
        }

        return $this->getResponse(
            array(
                'tag' => $tag,
                'build' => $build,
                'items' => $features
            )
        );
    }
}
