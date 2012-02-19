<?php

namespace Mba\CautiousBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PromoController extends Controller
{
    public function getEm(){
         return $this->get('doctrine')->getEntityManager();
    }
    
    /**
     * @Route("/promo-work/")
     * @Route("/promo-work/{slug}/")
     * @Template("MbaCautiousBundle:Promo:index.html.twig")
     */        
    public function indexAction($slug = '')
    {        
        $globals = $this->get('mba_global_settings')->getGlobalValues();        
        $page = $this->get('mba_page.details')->getPageDetails('promo-work');                                        
        if (!$page) {
            throw $this->createNotFoundException('The page does not exist');
        }             
                
        $promos = $this->getEm()->getRepository('MbaCautiousBundle:Promo')->getAll();
        
        $promo = $slug ? $this->getEm()->getRepository('MbaCautiousBundle:Promo')->getOneBySlug($slug) : $this->getEm()->getRepository('MbaCautiousBundle:Promo')->getLatestPromo();                                   
        if (!$promo) {
            throw $this->createNotFoundException('The promo does not exist');
        }             
        
        return array('globals' => $globals, 'page' => $page, 'promos'=>$promos, 'promo'=>$promo);
    }
}
