<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MoviesController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        
    }

    #[Route('/movies', name: 'app_movies')]
    public function index(): Response
    {
        $movies = $this->entityManager->getRepository(Movie::class)->findAll();

        return $this->render('movies/index.html.twig', [
            'movies' => $movies,
        ]);
    }
}
