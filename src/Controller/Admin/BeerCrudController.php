<?php

namespace App\Controller\Admin;

use App\Entity\Beer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BeerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Beer::class;
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
