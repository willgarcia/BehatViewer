<?php
namespace jubianchi\BehatViewerBundle\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    \jubianchi\BehatViewerBundle\Entity;

/**
 *
 */
class DefaultController extends BehatViewerController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="behatviewer.homepage", options={"expose"=true})
     * @Template()
     */
    public function indexAction()
    {
        if ($response = $this->beforeAction()) {
            return $response;
        }

        if ($this->get('session')->get('listview', false)) {
            return $this->forward('BehatViewerBundle:History:entrylist', array('build' => $this->getSession()->getBuild()));
        } else {
            return $this->forward('BehatViewerBundle:History:entry', array('build' => $this->getSession()->getBuild()));
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/list", name="behatviewer.homepagelist")
     * @Template()
     */
    public function indexlistAction()
    {
        if ($response = $this->beforeAction()) {
            return $response;
        }

        $this->get('session')->set('listview', true);

        return $this->forward(
            'BehatViewerBundle:History:entrylist',
            array(
                'build' => $this->getSession()->getBuild()
            )
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/thumb", name="behatviewer.homepagethumb")
     * @Template()
     */
    public function indexthumbAction()
    {
        if ($response = $this->beforeAction()) {
            return $response;
        }

        $this->get('session')->set('listview', false);

        return $this->forward(
            'BehatViewerBundle:Default:index',
            array(
                'build' => $this->getSession()->getBuild()
            )
        );
    }
}
