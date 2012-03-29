<?php

namespace Mba\CautiousBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PodcastController extends Controller
{
    public function getEm(){
         return $this->get('doctrine')->getEntityManager();
    }
    
    /**
     * @Route("/podcast/")     
     * @Template("MbaCautiousBundle:Podcast:index.html.twig")
     */
    public function indexAction($date = '')
    {                                
        $globals = $this->get('mba_global_settings')->getGlobalValues();        
        $page = $this->get('mba_page.details')->getPageDetails('podcast');                                        
        if (!$page) {
            throw $this->createNotFoundException('The page does not exist');
        }             
                
        $podcasts = $this->getEm()->getRepository('MbaCautiousBundle:Podcast')->getAll();                
        
        
        
        return array('globals' => $globals, 'page' => $page, 'podcasts' => $podcasts);
    }
}
