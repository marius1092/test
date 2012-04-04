<?php

namespace Mba\CautiousAdminBundle\Form\Type\Podcast;

use Admingenerated\MbaCautiousAdminBundle\Form\BasePodcastType\EditType as BaseEditType;
use Symfony\Component\Form\FormBuilder;

class EditType extends BaseEditType {

    public function buildForm(FormBuilder $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder->add("audio_mp3", "file", array("required" => true));
    }
}
