<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DiceController extends AbstractController
{
    /**
     * @Route("/dice", name="dice-home")
     */
    public function home(): Response
    {
        $die = new \App\Dice\Dice();
        $data = [
            'title' => 'Dice',
            'die_value' => $die->roll(),
            'die_as_string' => $die->getAsString(),
            'link_to_roll' => $this->generateUrl('dice-roll', ['numRolls' => 5,]),
        ];
        return $this->render('dice/home.html.twig', $data);
    }

    /**
     * @Route("/dice/roll/{numRolls}", name="dice-roll")
     */
    public function roll(int $numRolls): Response
    {
        $die = new \App\Dice\Dice();

        $rolls = [];
        for ($i = 1; $i <= $numRolls; $i++) {
            $die->roll();
            $rolls[] = $die->getAsString();
        }

        $data = [
            'title' => 'Dice rolled many times',
            'numRolls' => $numRolls,
            'rolls' => $rolls,
        ];
        return $this->render('dice/roll.html.twig', $data);
    }
}
