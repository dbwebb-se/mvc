<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormSearchController extends AbstractController
{
    /**
     * @Route("/form/search", name="form-search")
     */
    public function search(Request $request): Response
    {
        $data = [
            'search' => $request->query->get('search'),
        ];

        return $this->render('form/search.html.twig', $data);
    }
}
