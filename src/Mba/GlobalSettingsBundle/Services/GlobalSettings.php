<?php

namespace Mba\GlobalSettingsBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session;

class GlobalSettings 
{
    protected $em;    
    protected $session;

    public function __construct(EntityManager $em, Session $session) {
        $this->em = $em;        
        $this->session = $session;        
    }        
        
    public function getGlobalValues(){ 
       $result = array(); 
       $globals = $this->em->getRepository('MbaGlobalSettingsBundle:GlobalSetting')->findAll();
       foreach($globals as $global)
           $result[$global->getSlug()] = $global->getValue();
       return $result;
    }
}
