<?php

namespace Mba\CautiousAdminBundle\Form\Type\Promo;

use Admingenerated\MbaCautiousAdminBundle\Form\BasePromoType\EditType as BaseEditType;
use Symfony\Component\Form\FormBuilder;

class EditType extends BaseEditType
{
    public function buildForm(FormBuilder $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder->add("image", "file", array("required" => false));        
        $builder->add('description', 'ckeditor', array(
            'ui_colour' => '#fff',
            'startup_outline_blocks' => false,
            'width' => '800',
            'height' => '300',
        ));
    }
}
