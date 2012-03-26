<?php

namespace Mba\BlogBundle\Form\Type\Blog;

use Admingenerated\MbaBlogBundle\Form\BaseBlogType\NewType as BaseNewType;
use Symfony\Component\Form\FormBuilder;

class NewType extends BaseNewType
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
