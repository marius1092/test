<?php

namespace Mba\CautiousAdminBundle\Form\Type\ShortFilm;

use Admingenerated\MbaCautiousAdminBundle\Form\BaseShortFilmType\NewType as BaseNewType;
use Symfony\Component\Form\FormBuilder;

class NewType extends BaseNewType
{
    public function buildForm(FormBuilder $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder->add("image", "file", array("required" => true));
        $builder->add("imageOver", "file", array("required" => false));
    }        
}
