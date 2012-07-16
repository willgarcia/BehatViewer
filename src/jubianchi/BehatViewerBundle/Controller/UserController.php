<?php

namespace jubianchi\BehatViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    Symfony\Component\Security\Core\SecurityContext,
    JMS\SecurityExtraBundle\Annotation\Secure,
    jubianchi\BehatViewerBundle\Form\Type\ProfileType,
    jubianchi\BehatViewerBundle\Form\Type\PasswordType;

class UserController extends BehatViewerController
{
    /**
     * @Route("/login", name="behatviewer.login")
     * @Template()
     */
    public function indexAction()
    {
        if (true === $this->get('security.context')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('behatviewer.profile'));
        }

        $request = $this->getRequest();
        $session = $request->getSession();

        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->getResponse(array(
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }

    /**
     * @Route("/login/check", name="behatviewer.logincheck")
     * @Template()
     */
    public function checkAction()
    {
        return $this->getResponse(array());
    }

    /**
     * @Route("/profile", name="behatviewer.profile")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function profileAction()
    {
        $request = $this->getRequest();
        $success = false;
        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->get('form.factory')->create(new ProfileType(), $user);

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $user->setUsername($form->getData()->getUsername());
                $user->setEmail($form->getData()->getEmail());

                if (($password = $form->getData()->getPassword())) {
                    if ($password === $request->get('confirm')) {
                        $factory = $this->get('security.encoder_factory');
                        $encoder = $factory->getEncoder($user);

                        $user->setPassword(
                            $encoder->encodePassword(
                                $form->getData()->getPassword(),
                                $user->getSalt()
                            )
                        );
                    }
                }

                $this->getDoctrine()->getEntityManager()->persist($user);
                $this->getDoctrine()->getEntityManager()->flush();
                $this->getDoctrine()->getEntityManager()->refresh($user);

                $success = true;
            }
        }

        return $this->getResponse(array(
            'success' => $success,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/password", name="behatviewer.password")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function passwordAction()
    {
        $request = $this->getRequest();
        $success = false;
        /** @var $user \jubianchi\BehatViewerBundle\Entity\User */
        $user = $this->get('security.context')->getToken()->getUser();
        /** @var $form \Symfony\Component\Form\Form */
        $form = $this->get('form.factory')->create(new PasswordType(), $user);

        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);

        if ('POST' === $request->getMethod()) {
            $oldPassword = $user->getPassword();
            $form->bindRequest($request);

            $givenPassword = $encoder->encodePassword(
                $form->get('oldpassword')->getData(),
                $user->getSalt()
            );

            if ($form->isValid()) {
                if ($givenPassword === $oldPassword) {
                    $user->setPassword(
                        $encoder->encodePassword(
                            $form->getData()->getPassword(),
                            $user->getSalt()
                        )
                    );

                    $this->getDoctrine()->getEntityManager()->persist($user);
                    $this->getDoctrine()->getEntityManager()->flush();
                    $this->getDoctrine()->getEntityManager()->refresh($user);

                    $success = true;
                } else {
                    $form->get('oldpassword')->addError(new \Symfony\Component\Form\FormError('Wrong password'));
                }
            }
        }

        return $this->getResponse(array(
            'success' => $success,
            'form' => $form->createView(),
        ));
    }
}
