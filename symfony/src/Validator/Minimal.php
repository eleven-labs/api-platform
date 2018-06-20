<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Minimal extends Constraint
{
    public $message = 'The article must have the minimal properties required ("title")';
}