<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class UniqueProductNameAndCategory extends Constraint
{
    public $message = 'This product already exist in the category';
}