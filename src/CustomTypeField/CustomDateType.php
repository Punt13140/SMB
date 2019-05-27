<?php

namespace App\CustomTypeField;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomDateType extends DateType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefault('years', range(date('Y') - 20, date('Y') + 20));
    }

}
