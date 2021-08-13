<?php

namespace App\Controller;

use App\Entity\Librarian;
use App\Form\LibrarianType;
use App\Repository\LibrarianRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/librarian")
 */
class LibrarianController extends AbstractController
{
    /**
     * @Route("/", name="librarian_index", methods={"GET"})
     */
    public function index(LibrarianRepository $librarianRepository): Response
    {
        return $this->render('librarian/index.html.twig', [
            'librarians' => $librarianRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="librarian_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $librarian = new Librarian();
        $form = $this->createForm(LibrarianType::class, $librarian);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($librarian);
            $entityManager->flush();

            return $this->redirectToRoute('librarian_index');
        }

        return $this->render('librarian/new.html.twig', [
            'librarian' => $librarian,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="librarian_show", methods={"GET"})
     */
    public function show(Librarian $librarian): Response
    {
        return $this->render('librarian/show.html.twig', [
            'librarian' => $librarian,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="librarian_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Librarian $librarian): Response
    {
        $form = $this->createForm(LibrarianType::class, $librarian);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('librarian_index');
        }

        return $this->render('librarian/edit.html.twig', [
            'librarian' => $librarian,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="librarian_delete", methods={"POST"})
     */
    public function delete(Request $request, Librarian $librarian): Response
    {
        if ($this->isCsrfTokenValid('delete'.$librarian->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($librarian);
            $entityManager->flush();
        }

        return $this->redirectToRoute('librarian_index');
    }
}
