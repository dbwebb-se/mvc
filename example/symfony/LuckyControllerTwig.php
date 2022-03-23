<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerTwig extends AbstractController
{
    /**
     * @Route("/lucky/number/twig")
     */
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('lucky_number.html.twig', [
            'number' => $number,
        ]);
    }
}
