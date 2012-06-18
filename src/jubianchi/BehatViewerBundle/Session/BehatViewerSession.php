<?php

namespace jubianchi\BehatViewerBundle\Session;

use \Symfony\Component\DependencyInjection\ContainerAware,
    \jubianchi\BehatViewerBundle\Entity;

/**
 *
 */
class BehatViewerSession extends ContainerAware
{
    /**
     * @return \jubianchi\BehatViewerBundle\Entity\Project
     */
    public function getProject()
    {
        $projectId = $this->container->get('session')->get('project');
        $repository = $this->container->get('doctrine')->getRepository('BehatViewerBundle:Project');
        $project = null;

        if($projectId !== null) {
            $project = $repository->find($projectId);
        }

        if($project === null) {
            $project = $repository->find(1);
        }

        return $project;
    }

    /**
     * @param \jubianchi\BehatViewerBundle\Entity\Project $project
     *
     * @return \jubianchi\BehatViewerBundle\Session\BehatViewerSession
     */
    public function setProject(Entity\Project $project)
    {
        $this->container->get('session')->set('project', $project->getId());

        return $this;
    }

    /**
     * @return \jubianchi\BehatViewerBundle\Entity\Build
     */
    public function getBuild()
    {
        $buildId = $this->container->get('session')->get('build');
        $repository = $this->container->get('doctrine')->getRepository('BehatViewerBundle:Build');
        $build = null;

        if($buildId !== null) {
            $build = $repository->find($buildId);
        }

        if($build === null && $this->getProject() !== null) {
            $build = $repository->findLastForProject($this->getProject());
        }

        return $build;
    }

    /**
     * @param \jubianchi\BehatViewerBundle\Entity\Build $build
     *
     * @return \jubianchi\BehatViewerBundle\Session\BehatViewerSession
     */
    public function setBuild(Entity\Build $build)
    {
        $this->container->get('session')->set('build', $build->getId());

        return $this;
    }
}
