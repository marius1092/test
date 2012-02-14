<?php

namespace Mba\PageBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session;

class PageDetails
{
    protected $em;        

    public function __construct(EntityManager $em) {
        $this->em = $em;                
    }        
        
    public function getPageDetails($slug) {        
       $page = $this->em->getRepository('MbaPageBundle:Page')->getPageBySlug($slug);       
       return $page;
    }
}
