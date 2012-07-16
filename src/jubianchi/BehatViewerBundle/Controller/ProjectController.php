<?php
namespace jubianchi\BehatViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    jubianchi\BehatViewerBundle\Entity,
    jubianchi\BehatViewerBundle\Form\Type\ProjectType,
    JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * @Route("/project")
 */
class ProjectController extends BehatViewerController
{
    /**
     * @Route("/", name="behatviewer.projectslist")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function indexAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $projects = $this->getDoctrine()->getRepository('BehatViewerBundle:Project')->findByUser($user);

        return $this->getResponse(array(
            'items' => $projects
        ));
    }

    /**
     * @Route("/{id}/select", name="behatviewer.projectselect")
     * @Secure(roles="ROLE_USER")
     */
    public function selectAction(Entity\Project $project)
    {
        $this->getSession()->setProject($project);

        return $this->redirect($this->generateUrl('behatviewer.homepage'));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/create", name="behatviewer.projectcreate")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function createAction()
    {
        $request = $this->getRequest();

        $form = $this->get('form.factory')->create(new ProjectType(), new Entity\Project());

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            $success = $this->save($form);

            $this->getSession()->setProject($form->getData());

            return $this->redirect(
                $this->generateUrl(
                    'behatviewer.projectedit',
                    array(
                        'id' => $form->getData()->getid(),
                        'success' => $success
                    )
                )
            );
        }

        return $this->getResponse(array(
            'hasproject' => $this->getSession()->getProject() !== null,
            'form' => $form->createView(),
            'success' => false
        ));
    }

    /**
     * @return array
     *
     * @Route("/edit/{id}", name="behatviewer.projectedit", requirements={"id" = "\d+"})
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function editAction(Entity\Project $project)
    {
        $request = $this->getRequest();
        $success = false;

        $form = $this->get('form.factory')->create(new ProjectType(), $project);

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            $success = $this->save($form);
        }

        return $this->getResponse(array(
            'project' => $project,
            'hasproject' => $this->getSession()->getProject() !== null,
            'form' => $form->createView(),
            'success' => $success || $this->getRequest()->get('success', false)
        ));
    }

    protected function save(\Symfony\Component\Form\Form $form)
    {
        $form->bindRequest($this->getRequest());

        if ($form->isValid()) {
            $user = $this->get('security.context')->getToken()->getUser();
            $form->getData()->setUser($user);

            $manager = $this->getDoctrine()->getEntityManager();
            $manager->persist($form->getData());
            $manager->flush();
        }

        return $form->isValid();
    }
}
