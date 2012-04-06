<?php

namespace Mba\PageBundle\Form\Type\Page;

use Admingenerated\MbaPageBundle\Form\BasePageType\NewType as BaseNewType;
use Symfony\Component\Form\FormBuilder;

class NewType extends BaseNewType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
           parent::buildForm($builder, $options);
           $builder->add('content', 'ckeditor', array(
                'toolbar' => array('document', 'clipboard', 'editing', '/', 'basicstyles', 'paragraph', 'links', '/', 'insert', 'styles', 'tools'),
                'ui_colour' => '#fff',
                'startup_outline_blocks' => false,
                'width'    => '800',
                'height' => '400',
            ));
    }
}
