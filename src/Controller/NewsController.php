<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    #[Route('/api/news/{id}')]
    public function getNew(string $id=null): Response
    {
        // TODO - criar uma query real
        $new= [
            'id' => $id,
            'title' => 'Artista brasileiro mata dois e morre por causa do jogo do vasco',
            'categoria' => 'Cultura',
            'descrição' => 'O artista brasileiro jão da silva ganhou o prêmio de melhor filme do festival',
            'data' => '2022-02-10',
            'imagem' => 'https://exemplo.com/imagem/arte.jpg'
        ];
        return new JsonResponse($new);
    }
}