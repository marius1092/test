<?php

namespace Mba\CautiousAdminBundle\Form\Type\Background;

use Admingenerated\MbaCautiousAdminBundle\Form\BaseBackgroundType\NewType as BaseNewType;
use Symfony\Component\Form\FormBuilder;

class NewType extends BaseNewType
{
    public function buildForm(FormBuilder $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder->add("poster_image", "file", array("required" => false));
        $builder->add("video_mp4", "file", array("required" => false));
        $builder->add("video_webm", "file", array("required" => false));
        $builder->add("video_ogg", "file", array("required" => false));
        $builder->add("image", "file", array("required" => false));
    }    
}
