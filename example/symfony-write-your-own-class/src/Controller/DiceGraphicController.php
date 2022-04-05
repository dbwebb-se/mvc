<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiceGraphicController extends AbstractController
{
    /**
     * @Route("/dice/graphic", name="dice-graphic-home")
     */
    public function home(): Response
    {
        $die = new \App\Dice\DiceGraphic();
        $data = [
            'title' => 'Dice with graphic representation',
            'die_value' => $die->roll(),
            'die_as_string' => $die->getAsString(),
            'link_to_roll' => $this->generateUrl('dice-graphic-roll', ['numRolls' => 5,]),
        ];
        return $this->render('dice/home.html.twig', $data);
    }

    /**
     * @Route("/dice/grahpic/roll/{numRolls}", name="dice-graphic-roll")
     */
    public function roll(int $numRolls): Response
    {
        $die = new \App\Dice\DiceGraphic();

        $rolls = [];
        for ($i = 1; $i <= $numRolls; $i++) {
            $die->roll();
            $rolls[] = $die->getAsString();
        }

        $data = [
            'title' => 'Graphic dice rolled many times',
            'numRolls' => $numRolls,
            'rolls' => $rolls,
        ];
        return $this->render('dice/roll.html.twig', $data);
    }
}
