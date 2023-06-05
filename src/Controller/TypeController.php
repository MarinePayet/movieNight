<?php

namespace App\Controller;

use App\Entity\Type;
use App\Form\TypeType;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeController extends AbstractController
{
    #[Route('/types', name: 'app_types')]
    public function index(): Response
    {
        return $this->render('type/index.html.twig', [
            'controller_name' => 'TypeController',
        ]);
    }

    #[Route('/type/{id<\d+>}', name: 'app_type_show')]
    public function show(Type $type): Response
    {
        return $this->render('type/show.html.twig', [
            'type' => $type,
        ]);
    }

    #[Route('/type/new', name: 'app_type_new')]
    public function new(Request $request, TypeRepository $typeRepository){
        
        $form = $this->createForm(TypeType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $type = $form->getData();
            $typeRepository->save($type, true);

            return $this->redirectToRoute('app_movies');
        }
        
        return $this->render('type/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/type/edit/{id<\d+>}', name: 'app_type_edit')]
    public function edit(Request $request, TypeRepository $typeRepository, Type $type){
        
        $form = $this->createForm(TypeType::class, $type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $type = $form->getData();
            $typeRepository->save($type, true);

            return $this->redirectToRoute('app_movies');
        }
        
        return $this->render('type/edit.html.twig', [
            'form' => $form,
            'type' => $type
        ]);
    }



}
