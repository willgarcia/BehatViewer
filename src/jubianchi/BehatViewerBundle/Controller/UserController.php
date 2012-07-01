<?php

namespace jubianchi\BehatViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    Symfony\Component\Security\Core\SecurityContext,
    JMS\SecurityExtraBundle\Annotation\Secure,
    \jubianchi\BehatViewerBundle\Form\Type\ProjectType;


class UserController extends BehatViewerController
{
    /**
     * @Route("/login", name="behatviewer.login")
     * @Template()
     */
    public function indexAction()
    {
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
        if('POST' === $this->getRequest()->getMethod()) {
            $user = $this->get('security.context')->getToken()->getUser();

            $user->setUsername($this->getRequest()->get('_username'));
            $user->setEmail($this->getRequest()->get('_email'));

            if(($password = $this->getRequest()->get('_password'))) {
                if($password === $this->getRequest()->get('_confirm')) {
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
            $this->getDoctrine()->getEntityManager()->refresh($user);
        }

        return $this->getResponse(array());
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
