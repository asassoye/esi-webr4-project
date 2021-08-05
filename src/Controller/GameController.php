<?php

namespace App\Controller;

use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/game/{slug}")
     */
    public function showGame(string $slug): Response
    {
        $gameR = $this->getDoctrine()->getRepository(Game::class);
        $game = $gameR->findOneBy(array(
          "slug" => $slug,
        ));

        if ($game === null) {
            throw $this->createNotFoundException("This game doesn't exist..");
        }

        return $this->render("pages/game.html.twig", array(
          "game" => $game,
        ));
    }
}