<?php

namespace App\Controller\Accountant;

use App\Entity\Deduction;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DeductionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Deduction::class;
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
