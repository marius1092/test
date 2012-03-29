<?php

namespace Mba\CautiousAdminBundle\Form\Type\ShortFilm;

use Admingenerated\MbaCautiousAdminBundle\Form\BaseShortFilmType\EditType as BaseEditType;
use Symfony\Component\Form\FormBuilder;

class EditType extends BaseEditType
{
     public function buildForm(FormBuilder $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder->add("image", "file", array("required" => false));
        $builder->add("imageOver", "file", array("required" => false));
    }
}
