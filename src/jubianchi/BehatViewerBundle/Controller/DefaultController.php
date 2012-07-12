<?php
namespace jubianchi\BehatViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    jubianchi\BehatViewerBundle\Entity;

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
		$this->beforeAction();

		if ($this->getSession()->get('listview', false)) {
            return $this->forward('BehatViewerBundle:History:entrylist', array('build' => $this->getSession()->getBuild()));
        } else {
            return $this->forward('BehatViewerBundle:History:entry', array('build' => $this->getSession()->getBuild()));
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/analyze", name="behatviewer.analyze")
     * @Method({"PUT"})
     */
    public function analyzeAction()
    {
        $data = json_decode($this->getRequest()->getContent(), true);

        $project = $this->get('doctrine')
            ->getRepository('BehatViewerBundle:Project')
            ->findOneById(1);

        $analyzer = $this->get('behat_viewer.analyzer');
        $analyzer->analyze($project, $data);

        return  new \Symfony\Component\HttpFoundation\Response();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/list", name="behatviewer.homepagelist")
     * @Template()
     */
    public function indexlistAction()
    {
		$this->beforeAction();

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
		$this->beforeAction();

		$this->get('session')->set('listview', false);

        return $this->forward(
            'BehatViewerBundle:Default:index',
            array(
                'build' => $this->getSession()->getBuild()
            )
        );
    }
}
