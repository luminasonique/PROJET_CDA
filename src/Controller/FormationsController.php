<?php

namespace App\Controller;

use App\Entity\Formations;
use App\Form\FormationsType;
use App\Repository\FormationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/formations')]
final class FormationsController extends AbstractController
{
    #[Route(name: 'app_formations_index', methods: ['GET'])]
    public function index(FormationsRepository $formationsRepository): Response
    {
        return $this->render('formations/index.html.twig', [
            'formations' => $formationsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_formations_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $formation = new Formations();
        $form = $this->createForm(FormationsType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($formation);
            $entityManager->flush();

            return $this->redirectToRoute('app_formations_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('formations/new.html.twig', [
            'formation' => $formation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_formations_show', methods: ['GET'])]
    public function show(Formations $formation): Response
    {
        return $this->render('formations/show.html.twig', [
            'formation' => $formation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_formations_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Formations $formation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FormationsType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_formations_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('formations/edit.html.twig', [
            'formation' => $formation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_formations_delete', methods: ['POST'])]
    public function delete(Request $request, Formations $formation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($formation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_formations_index', [], Response::HTTP_SEE_OTHER);
    }
}
