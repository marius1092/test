<?php

namespace Mba\CautiousAdminBundle\Form\Type\Background;

use Admingenerated\MbaCautiousAdminBundle\Form\BaseBackgroundType\EditType as BaseEditType;
use Symfony\Component\Form\FormBuilder;

class EditType extends BaseEditType
{
     public function buildForm(FormBuilder $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder->add("video_mp4", "file", array("required" => false));
        $builder->add("video_webm", "file", array("required" => false));
        $builder->add("video_ogg", "file", array("required" => false));
        $builder->add("image", "file", array("required" => false));
    }   
}
