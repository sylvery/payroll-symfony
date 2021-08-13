<?php

namespace App\Controller;

use App\Entity\ReadingLevel;
use App\Form\ReadingLevelType;
use App\Repository\ReadingLevelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reading-level")
 */
class ReadingLevelController extends AbstractController
{
    /**
     * @Route("/", name="reading_level_index", methods={"GET"})
     */
    public function index(ReadingLevelRepository $readingLevelRepository): Response
    {
        return $this->render('reading_level/index.html.twig', [
            'reading_levels' => $readingLevelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="reading_level_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $readingLevel = new ReadingLevel();
        $form = $this->createForm(ReadingLevelType::class, $readingLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($readingLevel);
            $entityManager->flush();

            return $this->redirectToRoute('reading_level_index');
        }

        return $this->render('reading_level/new.html.twig', [
            'reading_level' => $readingLevel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reading_level_show", methods={"GET"})
     */
    public function show(ReadingLevel $readingLevel): Response
    {
        return $this->render('reading_level/show.html.twig', [
            'reading_level' => $readingLevel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reading_level_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ReadingLevel $readingLevel): Response
    {
        $form = $this->createForm(ReadingLevelType::class, $readingLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reading_level_index');
        }

        return $this->render('reading_level/edit.html.twig', [
            'reading_level' => $readingLevel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reading_level_delete", methods={"POST"})
     */
    public function delete(Request $request, ReadingLevel $readingLevel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$readingLevel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($readingLevel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reading_level_index');
    }
}
