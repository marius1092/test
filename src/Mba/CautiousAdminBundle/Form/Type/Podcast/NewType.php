<?php

namespace Mba\CautiousAdminBundle\Form\Type\Podcast;

use Admingenerated\MbaCautiousAdminBundle\Form\BasePodcastType\NewType as BaseNewType;
use Symfony\Component\Form\FormBuilder;

class NewType extends BaseNewType
{
    public function buildForm(FormBuilder $builder, array $options) {
        parent::buildForm($builder, $options);        
        $builder->add("audio_mp3", "file", array("required" => true));        
    }   
}
