<?php

namespace jubianchi\BehatViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    JMS\SecurityExtraBundle\Annotation\Secure,
    jubianchi\BehatViewerBundle\Form\Type\ProjectType,
    jubianchi\BehatViewerBundle\Entity,
    jubianchi\BehatViewerBundle\Form\Type\EditUserType;

/**
 * @Route("/admin")
 */
class AdminController extends BehatViewerController
{
    /**
     * @return array
     *
     * @Route("/users", name="behatviewer.users")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function usersAction()
    {
        $repository = $this->getDoctrine()->getRepository('BehatViewerBundle:User');
        $users = $repository->findAllOrderByLimit(array('username' => 'ASC'));

        return $this->getResponse(array(
            'items' => $users
        ));
    }

    /**
     * @Route("/users/disable/{id}", name="behatviewer.userdisable")
     * @Secure(roles="ROLE_USER")
     */
    public function userDisableAction(Entity\User $user)
    {
        $user->setIsActive(false);

        $this->getDoctrine()->getEntityManager()->persist($user);
        $this->getDoctrine()->getEntityManager()->flush();

        return $this->redirect($this->getRequest()->headers->get('referer'));
    }

    /**
     * @Route("/users/enable/{id}", name="behatviewer.userenable")
     * @Secure(roles="ROLE_USER")
     */
    public function userEnableAction(Entity\User $user)
    {
        $user->setIsActive(true);

        $this->getDoctrine()->getEntityManager()->persist($user);
        $this->getDoctrine()->getEntityManager()->flush();

        return $this->redirect($this->getRequest()->headers->get('referer'));
    }

    /**
     * @return array
     *
     * @Route("/users/{id}", name="behatviewer.useredit", requirements={"id" = "\d+"})
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function userEditAction(Entity\User $user)
    {
        $request = $this->getRequest();
        $form = $this->get('form.factory')->create(
            new EditUserType(false, $user->getId() !== $this->get('security.context')->getToken()->getUser()->getId()),
            $user
        );
        $success = false;

        if ('POST' === $request->getMethod()) {
            $success = $this->save($form, $user);
        }

        return  $this->getResponse(array(
            'success' => $success,
            'user' => $user,
            'form' => $form->createView()
        ));
    }

    /**
     * @return array
     *
     * @Route("/users/create", name="behatviewer.usercreate")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function userCreateAction()
    {
        $request = $this->getRequest();
        $user = new Entity\User();
        $form = $this->get('form.factory')->create(new EditUserType(), $user);

        if ('POST' === $request->getMethod()) {
            if ($this->save($form, $user)) {
                return  $this->redirect($this->generateUrl('behatviewer.useredit', array('id' => $user->getId())));
            }
        }

        return  $this->getResponse(array(
            'success' => false,
            'user' => $user,
            'form' => $form->createView()
        ));
    }

    protected function save(\Symfony\Component\Form\Form $form, Entity\User $user)
    {
        $form->bindRequest($this->getRequest());

        if ($form->isValid()) {
            $user->setUsername($form->getData()->getUsername());
            $user->setEmail($form->getData()->getEmail());
            $user->setIsactive($form->getData()->isActive());

            if (($password = $form->get('password')->getData()) !== null) {
                if ($password === $form->get('confirm')->getData()) {
                    $factory = $this->get('security.encoder_factory');
                    $encoder = $factory->getEncoder($user);

                    $user->setPassword(
                        $encoder->encodePassword(
                            $password,
                            $user->getSalt()
                        )
                    );
                }
            }

            $this->getDoctrine()->getEntityManager()->persist($user);
            $this->getDoctrine()->getEntityManager()->flush();
        }

        return $form->isValid();
    }
}
