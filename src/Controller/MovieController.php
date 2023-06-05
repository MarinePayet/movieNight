<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\Type;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    #[Route('/movies', name: 'app_movies')]
    public function index(MovieRepository $movieRepository, TypeRepository $typeRepository): Response
    {
        return $this->render('movie/index.html.twig', [
            'movies' => $movieRepository->findAll(),
            'types' => $typeRepository->findAll(),
        ]);
    }

    #[Route('/movies/{id<\d+>}', name: 'app_movie_show')]
    public function show(Movie $movie): Response
    {
        return $this->render('movie/show.html.twig', [
            'movie' => $movie,
        ]);
    }

    #[Route('/movie/new', name: 'app_movie_new')]
    public function new(Request $request, MovieRepository $movieRepository)
    {
        $form = $this->createForm(MovieType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $type = $form->getData();
            $movieRepository->save($type, true);

            return $this->redirectToRoute('app_movies');
        }
        
        return $this->render('movie/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/movie/{id<\d+>}/edit', name: 'app_movie_edit')]
    public function edit(Request $request, MovieRepository $movieRepository, Movie $movie)
    {
        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $type = $form->getData();
            $movieRepository->save($type, true);

            return $this->redirectToRoute('app_movies');
        }
        
        return $this->render('movie/edit.html.twig', [
            'form' => $form,
            'movie' => $movie
        ]);
    }
    

    #[Route('/movie/delete/{id<\d+>}', name: 'app_movie_delete')]        
    public function delete(EntityManagerInterface $entityManager, $id): Response
        {
            $movie = $entityManager->getRepository(Movie::class)->find($id);

            $entityManager->remove($movie);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_movies');
        }
    

}
