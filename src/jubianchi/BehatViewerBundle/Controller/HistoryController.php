<?php

namespace jubianchi\BehatViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    JMS\SecurityExtraBundle\Annotation\Secure,
    jubianchi\BehatViewerBundle\Entity;

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
        $this->beforeAction();

        $project = $this->getSession()->getproject();

        $builds = array();
        $pages = 1;
        if ($project !== null) {
            $total = $this->getDoctrine()->getRepository('BehatViewerBundle:Build')->findBy(
                array(
                    'project' => $project->getId()
                )
            );
            $pages = ceil(sizeof($total) / 10);

            $page = $page < 1 ? 1 : $page;
            $page = $page > $pages ? $pages : $page;

            $builds = $this->getDoctrine()->getRepository('BehatViewerBundle:Build')->findBy(
                array(
                    'project' => $project->getId()
                ),
                array(
                    'id' => 'DESC'
                ),
                10,
                10 * (($page - 1) < 0 ? 0 : ($page - 1))
            );
        }

        return $this->getResponse(array(
            'builds' => $builds,
            'current' => $page,
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
        $this->beforeAction();

        if ($build !== null) {
            $this->getSession()->setBuild($build);
        }

        $variables = $this->getResponse(array(
            'build' => $build,
            'features' => null
        ));

        if ($this->getSession()->get('listview', false)) {
            $template = 'BehatViewerBundle:Default:list.html.twig';
        } else {
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
     * @Secure(roles="ROLE_USER")
     * @Template("BehatViewerBundle:History:index.html.twig")
     */
    public function deleteAction(Entity\Build $build)
    {
        $this->beforeAction();

        $manager = $this->getDoctrine()->getEntityManager();
        $manager->remove($build);
        $manager->flush();

        return $this->redirect($this->getRequest()->headers->get('referer'));
    }

    /**
     * @return array
     *
     * @Method({"POST"})
     * @Route("/delete", name="behatviewer.historydeletesel")
     * @Secure(roles="ROLE_USER")
     * @Template("BehatViewerBundle:History:index.html.twig")
     */
    public function deleteSelectedAction()
    {
        $this->beforeAction();

        $manager = $this->getDoctrine()->getEntityManager();
        $repository = $this->getDoctrine()->getRepository('BehatViewerBundle:Build');

        foreach ($this->getRequest()->get('delete') as $id) {
            $build = $repository->findOneById($id);
            $manager->remove($build);
            $manager->flush();
        }

        return $this->redirect($this->getRequest()->headers->get('referer'));
    }
}
