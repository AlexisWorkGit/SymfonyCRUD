<?php

namespace App\Validator;

use App\Entity\Producto;
use App\Repository\ProductoRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UniqueProductNameAndCategoryValidator extends ConstraintValidator
{
    private $ProductoRepository;

    public function __construct(ProductoRepository $ProductoRepository)
    {
        $this->ProductoRepository = $ProductoRepository;
    }

    public function validate($value, Constraint $constraint)
    {
        $existingProducto = $this->ProductoRepository->findOneBy(['nombre' => $value->getNombre('nombre'), 'categoria' => $value->getCategoria()]);

        if ($existingProducto && $existingProducto->getId() !== $value->getId()) {
            $this->context->buildViolation($constraint->message)
                ->atPath('nombre')
                ->addViolation();
        }
    }
}