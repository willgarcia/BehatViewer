<?php

namespace jubianchi\BehatViewerBundle\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 *
 */
abstract class BehatViewerController extends Controller
{
    /**
     * @return \jubianchi\BehatViewerBundle\Session\BehatViewerSession
     */
    public function getSession()
    {
        return $this->get('behat_viewer.session');
    }

    /**
     * @return array
     */
    public function getResponse(array $variables = array()) {


        return array_merge(
            array(
                'xhr' => $this->getRequest()->isXmlHttpRequest(),
                'project' => $this->getSession()->getProject(),
                'lastbuild' => null !== ($build = $this->getLastBuild()) ? $build->getId() : 0
            ),
            $variables
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function beforeAction()
    {
        if($this->getSession()->getProject() === null)
        {
            return $this->forward('BehatViewerBundle:Config:index');
        }
    }

    protected function getLastBuild() {
        $project = $this->getSession()->getProject();
        $build = null;

        if(null === $project) {
            $build = null;
        } else {
            $current = $this->getSession()->getBuild();

            $repository = $this->getDoctrine()->getRepository('BehatViewerBundle:Build');
            $last = $repository->findLastForProject($project);

            if(null !== $last && $current !== $last) {
                $build = $last;
            }
        }

        return $build;
    }
}
