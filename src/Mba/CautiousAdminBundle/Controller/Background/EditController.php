<?php

namespace Mba\CautiousAdminBundle\Controller\Background;

use Admingenerated\MbaCautiousAdminBundle\BaseBackgroundController\EditController as BaseEditController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Mba\CautiousAdminBundle\Form\Type\Background\EditType;


class EditController extends BaseEditController
{
        public function updateAction($id)
    {
        

        $Background = $this->getObject($id);

        if (!$Background) {
            throw new NotFoundHttpException("The Mba\CautiousBundle\Entity\Background with id $id can't be found");
        }
        
        $Background->setUpdated(new \DateTime());
        
        $this->preBindRequest($Background);
        $type = new EditType();
        $type->setSecurityContext($this->get('security.context'));
        $form = $this->createForm($type, $Background);
        $form->bindRequest($this->get('request'));

        if ($form->isValid()) {
            $this->preSave($form, $Background);
            $this->saveObject($Background);
            $this->postSave($form, $Background);

            $this->get('session')->setFlash('success', $this->get('translator')->trans("object.saved.success", array(), 'Admingenerator') );

            return new RedirectResponse($this->generateUrl("Mba_CautiousAdminBundle_Background_edit", array('id' => $Background->getId()) ));

        } else {
            $this->get('session')->setFlash('error',  $this->get('translator')->trans("object.saved.error", array(), 'Admingenerator') );
        }

        return $this->render('MbaCautiousAdminBundle:BackgroundEdit:index.html.twig', array(
            "Background" => $Background,
            "form" => $form->createView(),
        ));
    }
}
