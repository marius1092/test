<?php

namespace Mba\PageBundle\Form\Type\Page;

use Admingenerated\MbaPageBundle\Form\BasePageType\EditType as BaseEditType;
use Symfony\Component\Form\FormBuilder;

class EditType extends BaseEditType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
           parent::buildForm($builder, $options);
           $builder->add('content', 'ckeditor', array(
                'ui_colour' => '#fff',
                'startup_outline_blocks' => false,
                'width'    => '800',
                'height' => '300',
            ));
    }
}
