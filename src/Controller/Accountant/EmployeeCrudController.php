<?php

namespace App\Controller\Accountant;

use App\Entity\Employee;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EmployeeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Employee::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
