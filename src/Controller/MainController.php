<?php


namespace App\Controller;


use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app.index")
     */
    public function index(): Response
    {
        return $this->redirectToRoute("app.discover");
    }

    /**
     * @Route("/discover", name="app.discover")
     */
    public function discover(): Response
    {
        $gameR = $this->getDoctrine()->getRepository(Game::class);

        $popular = $gameR->popular();
        $favorites = $gameR->favorites();

        return $this->render("pages/discover.html.twig", array(
          "popular" => $popular,
          "favorites" => $favorites,
        ));
    }

    /**
     * @Route("/about", name="app.about")
     */
    public function about(): Response
    {
        return $this->render("pages/about.html.twig");
    }
}
