<?php

namespace App\Controller\Admin;

use App\Entity\Producto;
use App\Form\ProductoType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Producto::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new ('id'),
            TextField::new ('nombre'),
            TextField::new ('precio'),
            AssociationField::new ('categoria'),
            // TextEditorField::new('description'),
        ];

    }



}