<?php

namespace App\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{




    #[Route('/', name: 'app_home')]
    public function index(LoggerInterface $logger):Response
    {

        $logger->info('Acessou a home');

        $categories = [
            ['title' => 'Mundo',              'text' => 'Notícias sobre o Mundo'],
            ['title' => 'Brasil',              'text' => 'Notícias sobre o Brasil'],
            ['title' => 'Tecnologia',              'text' => 'Notícias sobre o Tecnologia'],
            ['title' => 'Design',              'text' => 'Notícias sobre o Design'],
            ['title' => 'Cultura',              'text' => 'Notícias sobre o Cultura'],
            ['title' => 'Negócios',              'text' => 'Notícias sobre o Negócios'],
            ['title' => 'Política',              'text' => 'Notícias sobre o Política'],
            ['title' => 'Opinião',              'text' => 'Notícias sobre o Opinião'],
            ['title' => 'Ciência',              'text' => 'Notícias sobre o Ciência'],
            ['title' => 'Saúde',              'text' => 'Notícias sobre o Saúde'],
            ['title' => 'Estilo',              'text' => 'Notícias sobre o Estilo'],
            ['title' => 'Viagens',              'text' => 'Notícias sobre o Viagens'],
        ];
        $logger->info('Array criada');
        $pageTitle = "Sistemas de notícias";
        return $this->render('home/home.html.twig', [
            'categories' => $categories,
            'pageTitle' => $pageTitle,
        ]);
    }

    #[Route('/categoria/{slug}', name: 'app_category')]
    public function category(string $slug=null):Response
    {

        $categories = [
            ['title' => 'Mundo',              'text' => 'Notícias sobre o Mundo'],
            ['title' => 'Brasil',              'text' => 'Notícias sobre o Brasil'],
            ['title' => 'Tecnologia',              'text' => 'Notícias sobre o Tecnologia'],
            ['title' => 'Design',              'text' => 'Notícias sobre o Design'],
            ['title' => 'Cultura',              'text' => 'Notícias sobre o Cultura'],
            ['title' => 'Negócios',              'text' => 'Notícias sobre o Negócios'],
            ['title' => 'Política',              'text' => 'Notícias sobre o Política'],
            ['title' => 'Opinião',              'text' => 'Notícias sobre o Opinião'],
            ['title' => 'Ciência',              'text' => 'Notícias sobre o Ciência'],
            ['title' => 'Saúde',              'text' => 'Notícias sobre o Saúde'],
            ['title' => 'Estilo',              'text' => 'Notícias sobre o Estilo'],
            ['title' => 'Viagens',              'text' => 'Notícias sobre o Viagens'],
        ];

        $pageTitle = $slug;
        return $this->render('home/category.html.twig', [
            'categories' => $categories,
            'pageTitle' => $pageTitle,
        ]);
    }
    #[Route('/news/{id}')]
    public function newsDetails(int $id=null, HttpClientInterface $httpClient)
    {
        $response = $httpClient->request('GET', 'https://127.0.0.1:8000/api/news/'.$id);
        dd($response);
    }
}