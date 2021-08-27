<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\Screenshot;
use App\Repository\ScreenshotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class ScreenshotController extends AbstractController
{
    /**
     * @Route("/screenshot/random", name="app.screenshot.random")
     */
    public function randomScreenshots(): Response
    {
        $screenshotR = $this->getDoctrine()->getRepository(Screenshot::class);

        $screenshots = $screenshotR->getRandomScreenshots(20);

        return JsonResponse::create($screenshots);
    }
}
