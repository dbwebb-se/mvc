<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DiceHandController extends AbstractController
{
    /**
     * @Route(
     *      "/dice/hand",
     *      name="dice-hand-home",
     *      methods={"GET","HEAD"}
     * )
     */
    public function home(): Response
    {
        return $this->render('dice/hand.html.twig');
    }

    /**
     * @Route(
     *      "/dice/hand",
     *      name="dice-hand-process",
     *      methods={"POST"}
     * )
     */
    public function process(
        Request $request,
        SessionInterface $session
    ): Response {
        $hand = $session->get("dicehand") ?? new \App\Dice\DiceHand();

        $roll  = $request->request->get('roll');
        $add  = $request->request->get('add');
        $clear = $request->request->get('clear');

        if ($roll) {
            $hand->roll();
        } elseif ($add) {
            $hand->add(new \App\Dice\Dice());
            //$hand->add(new \App\Dice\DiceGraphic());
        } elseif ($clear) {
            $hand = new \App\Dice\DiceHand();
        }

        $session->set("dicehand", $hand);

        $this->addFlash("info", "Your dice hand holds " . $hand->getNumberDices() . " dices.");
        $this->addFlash("info", "Current values: " . $hand->getAsString());

        return $this->redirectToRoute('dice-hand-home');
    }
}
