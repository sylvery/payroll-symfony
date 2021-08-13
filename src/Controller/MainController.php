<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use App\Repository\LibrarianRepository;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(BookRepository $br, StudentRepository $sr, AuthorRepository $ar, LibrarianRepository $lr): Response
    {
        return $this->render('main/index.html.twig',[
            'books' => $br->findAll(),
            'students' => $sr->findAll(),
            'authors' => $ar->findAll(),
            'librarians' => $lr->findAll(),
        ]);
    }
}
