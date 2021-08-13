<?php

namespace App\Controller;

use App\Entity\Borrow;
use App\Form\BorrowType;
use App\Repository\BorrowRepository;
use DateInterval;
use DateTime;
use DateTimeZone;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function PHPUnit\Framework\throwException;

/**
 * @Route("/borrow")
 */
class BorrowController extends AbstractController
{
    /**
     * @Route("/", name="borrow_index", methods={"GET"})
     */
    public function index(BorrowRepository $borrowRepository): Response
    {
        return $this->render('borrow/index.html.twig', [
            'borrows' => $borrowRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="borrow_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $borrow = new Borrow();
        $form = $this->createForm(BorrowType::class, $borrow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $book = $borrow->getBook();
            $today = new DateTime('now', new DateTimeZone('Pacific/Port_Moresby'));
            $borrow
                // borrowDate
                ->setBorrowDate(new DateTime('now', new DateTimeZone('Pacific/Port_Moresby')))
                // dueDate
                ->setDueDate($today->add(new DateInterval('P7D')))
                // librarian
                // ->setLibrarian($this->getUser())
            ;
            $booksOnLoan = $book->getOnBorrow();
            if ($booksOnLoan == 1) {
                throwException(new Exception('This is the last book on the shelf. It cannot be loaned out!'));
            }
            $book->setOnBorrow($book->getOnBorrow()+1);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($borrow);
            $entityManager->flush();

            return $this->redirectToRoute('borrow_show',['id' => $borrow->getId()]);
        }

        return $this->render('borrow/new.html.twig', [
            'borrow' => $borrow,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="borrow_show", methods={"GET"})
     */
    public function show(Borrow $borrow): Response
    {
        return $this->render('borrow/show.html.twig', [
            'borrow' => $borrow,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="borrow_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Borrow $borrow): Response
    {
        $form = $this->createForm(BorrowType::class, $borrow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $borrow->setReturnDate(new DateTime($form->getData()->getReturnDate(), new DateTimeZone('Pacific/Port_Moresby')));
            $book = $borrow->getBook();
            $book->setOnBorrow($book->getOnBorrow()-1);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('borrow_index');
        }

        return $this->render('borrow/edit.html.twig', [
            'borrow' => $borrow,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="borrow_delete", methods={"POST"})
     */
    public function delete(Request $request, Borrow $borrow): Response
    {
        if ($this->isCsrfTokenValid('delete'.$borrow->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($borrow);
            $entityManager->flush();
        }

        return $this->redirectToRoute('borrow_index');
    }
}
