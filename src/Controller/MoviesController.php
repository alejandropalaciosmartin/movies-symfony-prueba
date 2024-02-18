<?php

namespace App\Controller;

use App\Entity\Country;
use App\Entity\Genre;
use App\Entity\Movie;
use App\Form\MovieType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\GenresType;
use App\Controller\CountriesType;
use App\Form\CountriesType as FormCountriesType;

class MoviesController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        
    }

    #[Route('/movies/createMovie', name: 'app_movie_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieType::class, $movie);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($movie);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_movie', ['id' => $movie->getId()]);
        }

        return $this->render('movies/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/movies', name: 'app_movies', methods: ['GET', 'HEAD'])]
    public function index(): Response
    {
        $movies = $this->entityManager->getRepository(Movie::class)->findAll();

        return $this->render('movies/index.html.twig', [
            'movies' => $movies,
        ]);
    }

    #[Route('/movies/{id}', name: 'app_movie', methods: ['GET'])]
    public function show(int $id): Response
    {
        $movie = $this->entityManager->getRepository(Movie::class)->find($id);

        if(!$movie) {
            throw $this->createNotFoundException('The movie does not exist');
        }

        return $this->render('movies/show.html.twig', [
            'movie' => $movie,
        ]);
    }

    #[Route('/movies/{id}/edit', name: 'app_movie_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request): Response
    {
        $movie = $this->entityManager->getRepository(Movie::class)->find($id);
        if(!$movie) {
            throw $this->createNotFoundException('The movie does not exist');
        }

        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('app_movie', ['id' => $movie->getId()]);
        }

        return $this->render('movies/edit.html.twig', [
            'form' => $form->createView(),
            'movie' => $movie,
        ]);
    }

    #[Route('/movies/{id}/delete', name: 'app_movie_delete', methods: ['GET'])]
    public function deleteMovie(int $id): Response
    {
        $movie = $this->entityManager->getRepository(Movie::class)->find($id);
        if(!$movie) {
            throw $this->createNotFoundException('The movie does not exist');
        }

        $this->entityManager->remove($movie);
        $this->entityManager->flush();

        return $this->redirectToRoute('app_movies');
    }

    // --- GENRES ---
    #[Route('/genres/createGenre', name: 'app_genre_create', methods: ['GET', 'POST'])]
    public function createGenre(Request $request): Response
    {
        $genre = new Genre();
        $form = $this->createForm(GenresType::class, $genre);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($genre);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_genres', ['id' => $genre->getId()]);
        }

        return $this->render('movies/create_genre.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    #[Route('/genres', name: 'app_genres', methods: ['GET', 'HEAD'])]
    public function genres(): Response
    {
        $genres = $this->entityManager->getRepository(Genre::class)->findAll();

        return $this->render('movies/genre.html.twig', [
            'genres' => $genres,
        ]);
    }

    #[Route('/genres/{id}/delete', name: 'app_genre_delete', methods: ['GET'])]
    public function deleteGenre(int $id): Response
    {
        try {
            $genre = $this->entityManager->getRepository(Genre::class)->find($id);
            if (!$genre) {
                throw $this->createNotFoundException('The genre does not exist');
            }

            $this->entityManager->remove($genre);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            return $this->redirectToRoute('error_page', ['entity' => 'genres']);
        }

        return $this->redirectToRoute('app_genres');
    }

    // --- COUNTRIES ---
    #[Route('/countries/createCountry', name: 'app_country_create', methods: ['GET', 'POST'])]
    public function createCountry(Request $request): Response
    {
        $country = new Country();
        $form = $this->createForm(FormCountriesType::class, $country);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {


            $this->entityManager->persist($country);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_countries', ['id' => $country->getId()]);
        }

        return $this->render('movies/create_country.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    #[Route('/countries', name: 'app_countries', methods: ['GET', 'HEAD'])]
    public function countries(): Response
    {
        $countries = $this->entityManager->getRepository(Country::class)->findAll();

        return $this->render('movies/country.html.twig', [
            'countries' => $countries,
        ]);
    }
    
    #[Route('/countries/{id}/delete', name: 'app_country_delete', methods: ['GET'])]
    public function deleteCountry(int $id): Response
    {
        try {
            $country = $this->entityManager->getRepository(Genre::class)->find($id);
            if (!$country) {
                throw $this->createNotFoundException('The country does not exist');
            }

            $this->entityManager->remove($country);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            return $this->redirectToRoute('error_page', ['entity' => 'countries']);
        }

        return $this->redirectToRoute('app_countries');
    }

    // --- ERROR PAGE ---
    #[Route('/error', name: 'error_page', methods: ['GET'])]
    public function errorPage(Request $request): Response
    {
        $entity = $request->query->get('entity');

        return $this->render('movies/error.html.twig', [
            'entity' => $entity,
        ]);
    }
}
