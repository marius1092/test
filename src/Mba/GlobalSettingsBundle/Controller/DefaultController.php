<?php

namespace Mba\GlobalSettingsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
        
    public function getGlobalValues($name){        
       $globals = $this->get('doctrine')->getEntityManager()->getRepository('MbaGlobalSettingsBundle:GlobalSetting')->findAll();             
       return $globals;
    }
}
