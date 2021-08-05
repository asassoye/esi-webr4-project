<?php

namespace App\Controller;

use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search")
     */
    public function search(Request $request): Response
    {
        $query = $request->query->get('query');

        $gameR = $this->getDoctrine()->getRepository(Game::class);
        $games = $gameR->search($query);

        return $this->render("pages/search.html.twig", array(
          "query" => $query,
          "games" => $games,
        ));
    }
}