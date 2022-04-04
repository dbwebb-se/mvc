<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormLoginController extends AbstractController
{
    /**
     * @Route(
     *      "/form/login",
     *      name="form-login",
     *      methods={"GET","HEAD"}
     * )
     */
    public function login(): Response
    {
        return $this->render('form/login.html.twig');
    }

    /**
     * @Route(
     *      "/form/login",
     *      name="form-login-process",
     *      methods={"POST"}
     * )
     */
    public function loginProcess(Request $request): Response
    {
        $user = $request->request->get('user');
        $pwd  = $request->request->get('pwd');

        $type = "notice";
        $isEqual = "NOT";
        if ($user === $pwd) {
            $type = "warning";
            $isEqual = "";
        }

        $this->addFlash($type, "The username and password did $isEqual match.");

        return $this->redirectToRoute('form-login');
    }
}
