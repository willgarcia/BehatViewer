<?php

namespace jubianchi\BehatViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    JMS\SecurityExtraBundle\Annotation\Secure,
    jubianchi\BehatViewerBundle\Form\Type\ProjectType;

/**
 * @Route("/config")
 */
class ConfigController extends BehatViewerController
{
    /**
     * @return array
     *
     * @Route("/", name="behatviewer.config")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function indexAction()
    {
        $request = $this->getRequest();
        $project = $this->getSession()->getProject();
        $success = false;

        if ($project === null) {
            $project = new \jubianchi\BehatViewerBundle\Entity\Project();
        }

        $form = $this->get('form.factory')->create(new ProjectType(), $project);

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $project->setSlug(trim($form->getData()->getSlug(), ' -'));

                $manager = $this->getDoctrine()->getEntityManager();
                $manager->persist($project);
                $manager->flush();

                $this->getSession()->setProject($project);
                $success = true;
            }
        }

        return $this->getResponse(array(
            'project' => $project,
            'form' => $form->createView(),
            'success' => $success
        ));
    }
}
