<?php

namespace Mba\CautiousBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ContactController extends Controller
{
    public function getEm(){
         return $this->get('doctrine')->getEntityManager();
    }
    
    /**
     * @Route("/contact/")     
     * @Template("MbaCautiousBundle:Contact:index.html.twig")
     */
    public function indexAction()
    {                                
        $globals = $this->get('mba_global_settings')->getGlobalValues();        
        $page = $this->get('mba_page.details')->getPageDetails('contact');                                        
        if (!$page) {
            throw $this->createNotFoundException('The page does not exist');
        }             
                                                
        return array('globals' => $globals, 'page' => $page);
    }
}
