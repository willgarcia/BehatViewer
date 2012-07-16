<?php

namespace jubianchi\BehatViewerBundle;

use Symfony\Component\DependencyInjection\ContainerAware,
    jubianchi\BehatViewerBundle\Entity;

/**
 *
 */
class Session extends ContainerAware
{
    /**
     * @return \jubianchi\BehatViewerBundle\Entity\Project
     */
    public function getProject()
    {
        $projectId = $this->container->get('session')->get('project');
        $repository = $this->container->get('doctrine')->getRepository('BehatViewerBundle:Project');
        $project = null;

        if ($projectId !== null) {
            $project = $repository->find($projectId);
        }

        if ($project === null) {
            $project = $repository->findOneBy(array());
        }

        if (null !== $project) {
            $this->setProject($project);
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

        if ($buildId !== null) {
            $build = $repository->find($buildId);
        }

        if($build !== null && $build->getProject()->getId() !== $this->getProject()->getId()) {
            $build = null;
        }

        if ($build === null && $this->getProject() !== null) {
            $build = $repository->findLastForProject($this->getProject());
        }

        if (null !== $build) {
            $this->setBuild($build);
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

    /**
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($name, $default = null)
    {
        return $this->container->get('session')->get($name, $default);
    }

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return \jubianchi\BehatViewerBundle\Session
     */
    public function set($name, $value)
    {
        $this->container->get('session')->set($name, $value);

        return $this;
    }
}
