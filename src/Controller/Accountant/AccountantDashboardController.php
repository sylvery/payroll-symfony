<?php

namespace App\Controller\Accountant;

use App\Controller\Admin\AppUserCrudController;
use App\Entity\Allowance;
use App\Entity\AppUser;
use App\Entity\Deduction;
use App\Entity\Employee;
use App\Entity\Loan;
use App\Entity\Payment;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountantDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/accountant", name="accountant")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(EmployeeCrudController::class)->generateUrl());

        // you can also redirect to different pages depending on the current user
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Payroll');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Allowance', 'fas fa-list', Allowance::class);
        yield MenuItem::linkToCrud('Deduction', 'fas fa-list', Deduction::class);
        yield MenuItem::linkToCrud('Employee', 'fas fa-list', Employee::class);
        yield MenuItem::linkToCrud('Loan', 'fas fa-list', Loan::class);
        yield MenuItem::linkToCrud('Payment', 'fas fa-list', Payment::class);
        yield MenuItem::linkToCrud('Appuser', 'fas fa-list', AppUser::class);
    }
}
