<?php

namespace App\Controller\Admin;

use App\Entity\AppUser;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AppUserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AppUser::class;
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
