<?php

namespace jubianchi\BehatViewerBundle\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    \jubianchi\BehatViewerBundle\Entity;

/**
 * @Route("/history")
 */
class HistoryController extends BehatViewerController
{
    /**
     * @param int $page
     *
     * @return array
     *
     * @Route("/", name="behatviewer.history", defaults={"page" = 1})
     * @Route("/page/{page}", name="behatviewer.historypage", requirements={"page" = "\d+"})
     * @Template()
     */
    public function indexAction($page = 1)
    {
        if($response = $this->beforeAction()) {
            return $response;
        }

        $builds = array();
        $project = $this->getSession()->getproject();
        $pages = ceil(sizeof($this->getDoctrine()->getRepository('BehatViewerBundle:Build')->findBy(array())) / 10);

        $page = $page - 1;
        $page = $page < 0 ? 0 : $page;
        $page = $page >= $pages ? $pages : $page;

        if($project !== null)
        {
            $builds = $this->getDoctrine()->getRepository('BehatViewerBundle:Build')->findBy(
                array(
                    'project' => $project->getId()
                ),
                array(
                    'id' => 'DESC'
                ),
                10,
                10 * $page
            );
        }

        return $this->getResponse(array(
            'builds' => $builds,
            'current' => $page + 1,
            'pages' => $pages
        ));
    }

    /**
     * @param \jubianchi\BehatViewerBundle\Entity\Build|null $build
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/{id}", requirements={"id" = "\d+"}, name="behatviewer.historyentry", options={"expose"=true})
     * @Template("BehatViewerBundle:Default:index.html.twig")
     */
    public function entryAction(Entity\Build $build = null)
    {
        if($response = $this->beforeAction()) {
            return $response;
        }

        if($build !== null) {
            $this->getSession()->setBuild($build);
        }

        $variables = $this->getResponse(array(
            'build' => $build,
            'features' => null
        ));

        if($this->get('session')->get('listview', false)) {
            $template = 'BehatViewerBundle:Default:list.html.twig';
        }
        else
        {
            $template = 'BehatViewerBundle:Default:index.html.twig';
        }

        return $this->render($template, $variables);
    }

    /**
     * @param \jubianchi\BehatViewerBundle\Entity\Build|null $build
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/{id}/list", requirements={"id" = "\d+"}, name="behatviewer.historyentrylist")
     * @Template("BehatViewerBundle:Default:list.html.twig")
     */
    public function entrylistAction(Entity\Build $build = null)
    {
        return $this->entryAction($build);
    }

    /**
     * @param \jubianchi\BehatViewerBundle\Entity\Build|null $build
     *
     * @return \Symfony\Component\HttpFoundation\Response|array
     *
     * @Route("/delete/{id}", requirements={"id" = "\d+"}, name="behatviewer.historydelete")
     * @Template("BehatViewerBundle:History:index.html.twig")
     */
    public function deleteAction(Entity\Build $build)
    {
        if($response = $this->beforeAction()) {
            return $response;
        }

        $manager = $this->getDoctrine()->getEntityManager();

        $project = $this->getSession()->getproject();
        $pages = ceil(sizeof($this->getDoctrine()->getRepository('BehatViewerBundle:Build')->findBy(array())) / 10);

        $manager->remove($build);
        $manager->flush();

        $builds = $this->getDoctrine()->getRepository('BehatViewerBundle:Build')->findByProject($project->getId());

        if($this->getRequest()->isXmlHttpRequest()) {
            return new \Symfony\Component\HttpFoundation\Response();
        }
        else
        {
            return $this->getResponse(array(
                'builds' => $builds,
                'pages' => $pages
            ));
        }
    }

    /**
     * @return array
     *
     * @Route("/delete", name="behatviewer.historydeletesel")
     * @Method({"POST"})
     * @Template("BehatViewerBundle:History:index.html.twig")
     */
    public function deleteSelectedAction()
    {
        $manager = $this->getDoctrine()->getEntityManager();
        $repository = $this->getDoctrine()->getRepository('BehatViewerBundle:Build');

        foreach($this->getRequest()->get('delete') as $id)
        {
            $build = $repository->findOneById($id);
            $manager->remove($build);
            $manager->flush();
        }

        return $this->indexAction();
    }
}
