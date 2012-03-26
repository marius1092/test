<?php

namespace Mba\CautiousBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter as PagerAdapter;

class PromoController extends Controller {
    /**
     * @Route("/promo-work/")     
     * @Template("MbaCautiousBundle:Promo:index.html.twig")
     */
    public function indexAction() {
        $globals = $this->get('mba_global_settings')->getGlobalValues();
        $page = $this->get('mba_page.details')->getPageDetails('promo-work');
        if (!$page) {
            throw $this->createNotFoundException('The page does not exist');
        }

        if ($this->get('request')->query->get('page')) {
            $this->setPage($this->get('request')->query->get('page'));
        } 
        
        $promos = $this->getPager();                
        return array('globals' => $globals, 'page' => $page, 'promos' => $promos);
    }

    protected function getEm() {
        return $this->get('doctrine')->getEntityManager();
    }
    
    protected function setPage($page) {
        $this->get('session')->set('Mba\CautiousBundle\PromoWork', $page);
    }

    protected function getPage() {
        return $this->get('session')->get('Mba\CautiousBundle\PromoWork', 1);
    }

    protected function getPager() {
        $paginator = new Pagerfanta(new PagerAdapter($this->getQuery()));
        $paginator->setMaxPerPage(3);
        $paginator->setCurrentPage($this->getPage(), false, true);
        return $paginator;
    }

    protected function getQuery() {
        return $this->getEm()->getRepository('MbaCautiousBundle:Promo')->getAll();        
    }

}
