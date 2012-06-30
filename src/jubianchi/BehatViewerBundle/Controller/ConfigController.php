<?php

namespace jubianchi\BehatViewerBundle\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    \jubianchi\BehatViewerBundle\Form\Type\ProjectType;

/**
 * @Route("/config")
 */
class ConfigController extends BehatViewerController
{
    /**
     * @return array
     *
     * @Route("/", name="behatviewer.config")
     * @Template()
     */
    public function indexAction()
    {
        $request = $this->getRequest();
        $project = $this->getSession()->getProject();

        if ($project === null) {
            $project = new \jubianchi\BehatViewerBundle\Entity\Project();
        }

        $form = $this->get('form.factory')->create(new ProjectType(), $project);

        if ($request->getMethod() === 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $project->setSlug(trim($form->getData()->getSlug(), ' -'));

                $manager = $this->getDoctrine()->getEntityManager();
                $manager->persist($project);
                $manager->flush();
            }

            $this->getSession()->setProject($project);
        }

        return $this->getResponse(array(
            'project' => $project,
            'form' => $form->createView()
        ));
    }
}
