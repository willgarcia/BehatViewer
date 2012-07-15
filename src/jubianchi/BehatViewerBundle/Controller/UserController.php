<?php

namespace jubianchi\BehatViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    Symfony\Component\Security\Core\SecurityContext,
    JMS\SecurityExtraBundle\Annotation\Secure,
    jubianchi\BehatViewerBundle\Form\Type\UserType;

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

        $type = new UserType();
        $type->setPasswordRequired(false);
        $form = $this->get('form.factory')->create($type, $user);

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

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

        return $this->getResponse(array(
            'success' => $success,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/profile/avatar/{email}/{size}/{rating}", name="behatviewer.profileavatar", options={"expose"=true}, defaults={"page" = 24, "rating"= "G"})
     * @Template()
     */
    public function avatarAction($email, $size, $rating)
    {
        $url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "&s=" . $size . '&r=' . $rating;

        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->headers->set('Location', $url);

        return $response;
    }
}
