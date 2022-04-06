<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class FormSessionController extends AbstractController
{
    /**
     * @Route(
     *      "/form/session",
     *      name="form-session",
     *      methods={"GET","HEAD"}
     * )
     */
    public function session(): Response
    {
        return $this->render('form/session.html.twig');
    }

    /**
     * @Route(
     *      "/form/session",
     *      name="form-session-process",
     *      methods={"POST"}
     * )
     */
    public function sessionProcess(
        Request $request,
        SessionInterface $session
    ): Response {
        $roll  = $request->request->get('roll');
        $save  = $request->request->get('save');
        $clear = $request->request->get('clear');

        $sum = $session->get("sum") ?? 0;
        $saved = $session->get("saved") ?? 0;

        if ($roll) {
            $value = random_int(1, 6);
            $sum += $value;
            if ($value === 1) {
                $this->addFlash("error", "You rolled 1 and looses your points.");
                $sum = 0;
            } else {
                $this->addFlash("info", "You rolled $value and adds to your current sum of points.");
            }
            $session->set("sum", $sum);
        } elseif ($save) {
            $this->addFlash("info", "You saved $sum points.");
            $saved += $sum;
            $sum = 0;
            $session->set("saved", $saved);
            $session->set("sum", 0);
        } elseif ($clear) {
            $this->addFlash("warning", "You cleared the game.");
            $sum = 0;
            $saved = 0;
            $session->set("sum", 0);
            $session->set("saved", 0);
        }

        $this->addFlash("info", "You have currently $sum points (not saved).");
        $this->addFlash("info", "You have currently $saved saved points.");

        return $this->redirectToRoute('form-session');
    }
}
