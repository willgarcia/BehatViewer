<?php

namespace jubianchi\BehatViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 *
 */
abstract class BehatViewerController extends Controller
{
    /**
     * @return \jubianchi\BehatViewerBundle\Session
     */
    public function getSession()
    {
        return $this->get('behat_viewer.session');
    }

    protected function beforeAction()
    {
        if (null === $this->getSession()->getProject()) {
            throw new \jubianchi\BehatViewerBundle\Exception\NoProjectConfiguredException();
        }
    }

    /**
     * @return array
     */
    public function getResponse(array $variables = array())
    {
        $lastbuild = $this->getLastBuild();

        return array_merge(
            array(
                'session' => $this->getSession(),
                'lastbuild' => (null !== $lastbuild ? $lastbuild->getId() : 0)
            ),
            $variables
        );
    }

    /**
     * @return \jubianchi\BehatViewerBundle\Entity\Build
     */
    protected function getLastBuild()
    {
        $project = $this->getSession()->getProject();
        $build = null;

        if (null !== $project) {
            $current = $this->getSession()->getBuild();

            $repository = $this->getDoctrine()->getRepository('BehatViewerBundle:Build');
            $last = $repository->findLastForProject($project);

            if (null !== $last && $current !== $last) {
                $build = $last;
            }
        }

        return $build;
    }
}
