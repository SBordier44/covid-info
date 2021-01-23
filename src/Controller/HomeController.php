<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(
        CallApiService $apiService
    ): Response {
        return $this->render(
            'home/index.html.twig',
            [
                'data' => $apiService->getFranceData(),
                'departements' => $apiService->getAllData()
            ]
        )->setMaxAge(3600);
    }
}
