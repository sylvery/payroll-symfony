<?php

namespace App\Controller\Accountant;

use App\Entity\Allowance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AllowanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Allowance::class;
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
