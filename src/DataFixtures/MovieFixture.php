<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie1 = new Movie();
        $movie1->setTitle('The Shawshank Redemption');
        $movie1->setCountry($this->getReference('country1'));   
        $movie1->setGenre($this->getReference('genre1'));
        $movie1->setBudget(25000000);
        $movie1->setReleaseDate(new \DateTime('1994-10-14'));
        $movie1->setDescription('Andy Dufresne, a successful banker, is arrested for the murders of his wife and her lover, and is sentenced to life imprisonment at the Shawshank prison. He becomes the most unconventional prisoner.');
        $movie1->setRuntime(142);
        $movie1->setPoster('https://pics.filmaffinity.com/Cadena_perpetua-576140557-large.jpg');
        $manager->persist($movie1);

        $movie2 = new Movie();
        $movie2->setTitle('The Godfather');
        $movie2->setCountry($this->getReference('country2'));   
        $movie2->setGenre($this->getReference('genre4'));
        $movie2->setBudget(6000000);
        $movie2->setReleaseDate(new \DateTime('1972-03-24'));
        $movie2->setDescription('The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.');
        $movie2->setRuntime(175);
        $movie2->setPoster('https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg');
        $manager->persist($movie2);

        $movie3 = new Movie();
        $movie3->setTitle('Pulp Fiction');
        $movie3->setCountry($this->getReference('country3'));   
        $movie3->setGenre($this->getReference('genre6'));
        $movie3->setBudget(8000000);
        $movie3->setReleaseDate(new \DateTime('1994-10-14'));
        $movie3->setDescription('The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.');
        $movie3->setRuntime(154);
        $movie3->setPoster('https://pics.filmaffinity.com/Pulp_Fiction-210382116-mmed.jpg');
        $manager->persist($movie3);

        $movie4 = new Movie();
        $movie4->setTitle('The Dark Knight');
        $movie4->setCountry($this->getReference('country5'));   
        $movie4->setGenre($this->getReference('genre1'));
        $movie4->setBudget(185000000);
        $movie4->setReleaseDate(new \DateTime('2008-07-18'));
        $movie4->setDescription('When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.');
        $movie4->setRuntime(152);
        $movie4->setPoster('https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_.jpg');
        $manager->persist($movie4);

        $movie5 = new Movie();
        $movie5->setTitle('Inception');
        $movie5->setCountry($this->getReference('country3'));   
        $movie5->setGenre($this->getReference('genre1'));
        $movie5->setBudget(160000000);
        $movie5->setReleaseDate(new \DateTime('2010-07-16'));
        $movie5->setDescription('A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.');
        $movie5->setRuntime(148);
        $movie5->setPoster('https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_.jpg');
        $manager->persist($movie5);

        $movie6 = new Movie();
        $movie6->setTitle('The Matrix');
        $movie6->setCountry($this->getReference('country1'));   
        $movie6->setGenre($this->getReference('genre2'));
        $movie6->setBudget(63000000);
        $movie6->setReleaseDate(new \DateTime('1999-03-31'));
        $movie6->setDescription('A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.');
        $movie6->setRuntime(136);
        $movie6->setPoster('https://m.media-amazon.com/images/M/MV5BNzQzOTk3OTAtNDQ0Zi00ZTVkLWI0MTEtMDllZjNkYzNjNTc4L2ltYWdlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_.jpg');
        $manager->persist($movie6);
        
        $manager->flush();
    }
}
