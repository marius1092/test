<?php

namespace Mba\CautiousBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageController extends Controller
{
    /**
     * @Template("MbaCautiousBundle:Page:index.html.twig")
     */
    public function indexAction($slug)
    {                        
        $globals = $this->get('mba_global_settings')->getGlobalValues();        
        $page = $this->get('mba_page.details')->getPageDetails($slug);                                        
        if (!$page) {
            throw $this->createNotFoundException('The page does not exist');
        }             
        return array('globals' => $globals, 'page' => $page);
    }
}
