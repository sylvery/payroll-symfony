<?php

namespace App\Controller;

use App\Entity\Penalty;
use App\Form\PenaltyType;
use App\Repository\PenaltyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/penalty")
 */
class PenaltyController extends AbstractController
{
    /**
     * @Route("/", name="penalty_index", methods={"GET"})
     */
    public function index(PenaltyRepository $penaltyRepository): Response
    {
        return $this->render('penalty/index.html.twig', [
            'penalties' => $penaltyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="penalty_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $penalty = new Penalty();
        $form = $this->createForm(PenaltyType::class, $penalty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($penalty);
            $entityManager->flush();

            return $this->redirectToRoute('penalty_index');
        }

        return $this->render('penalty/new.html.twig', [
            'penalty' => $penalty,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="penalty_show", methods={"GET"})
     */
    public function show(Penalty $penalty): Response
    {
        return $this->render('penalty/show.html.twig', [
            'penalty' => $penalty,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="penalty_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Penalty $penalty): Response
    {
        $form = $this->createForm(PenaltyType::class, $penalty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('penalty_index');
        }

        return $this->render('penalty/edit.html.twig', [
            'penalty' => $penalty,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="penalty_delete", methods={"POST"})
     */
    public function delete(Request $request, Penalty $penalty): Response
    {
        if ($this->isCsrfTokenValid('delete'.$penalty->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($penalty);
            $entityManager->flush();
        }

        return $this->redirectToRoute('penalty_index');
    }
}
