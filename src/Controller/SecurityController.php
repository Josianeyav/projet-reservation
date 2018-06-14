<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller {

    /**
     * @Route("/login", name="login")
     */
    public function login (Request $request, AuthenticationUtils $auth) {
        return $this->render(
            'security/login.html.twig',
            [
                'last_username' => $auth->getLastUsername(),
                'error' => $auth->getLastAuthenticationError(),
            ]
        );
    }
}
