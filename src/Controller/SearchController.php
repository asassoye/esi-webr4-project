<?php

namespace App\Controller;

use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\AcceptHeader;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class SearchController extends AbstractController
{
    /**
     * @Route("/search")
     */
    public function search(Request $request): Response
    {
        $acceptHeader = AcceptHeader::fromString($request->headers->get('Accept'));
        $query = $request->query->get('query');

        $gameR = $this->getDoctrine()->getRepository(Game::class);
        $games = $gameR->search($query);

        if ($acceptHeader->has("application/json")) {
            $jsonEncoder = new JsonEncoder();

            return JsonResponse::create($games);
        }

        return $this->render("pages/search.html.twig", array(
          "query" => $query,
          "games" => $games,
        ));
    }
}
