<?php

namespace Mba\CautiousAdminBundle\Controller\Podcast;

use Admingenerated\MbaCautiousAdminBundle\BasePodcastController\EditController as BaseEditController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Mba\CautiousAdminBundle\Form\Type\Podcast\EditType;


class EditController extends BaseEditController
{
    public function updateAction($id)
    {        
        $Podcast = $this->getObject($id);

        if (!$Podcast) {
            throw new NotFoundHttpException("The Mba\CautiousBundle\Entity\Podcast with id $id can't be found");
        }
        
        $Podcast->setUpdated(new \DateTime());
        
        $this->preBindRequest($Podcast);
        $type = new EditType();
        $type->setSecurityContext($this->get('security.context'));
        $form = $this->createForm($type, $Podcast);
        $form->bindRequest($this->get('request'));

        if ($form->isValid()) {
            $this->preSave($form, $Podcast);
            $this->saveObject($Podcast);
            $this->postSave($form, $Podcast);

            $this->get('session')->setFlash('success', $this->get('translator')->trans("object.saved.success", array(), 'Admingenerator') );

            return new RedirectResponse($this->generateUrl("Mba_CautiousAdminBundle_Podcast_edit", array('id' => $Podcast->getId()) ));

        } else {
            $this->get('session')->setFlash('error',  $this->get('translator')->trans("object.saved.error", array(), 'Admingenerator') );
        }

        return $this->render('MbaCautiousAdminBundle:PodcastEdit:index.html.twig', array(
            "Podcast" => $Podcast,
            "form" => $form->createView(),
        ));
    }
}
