<?php

namespace Mba\CautiousBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Doctrine\ORM\EntityManager;

class MainMenuBuilder
{
    private $factory;
    private $em;

    /**
     * @param \Knp\Menu\FactoryInterface $factory
     * @param Doctrine\ORM\EntityManager EntityManager 
     */
    public function __construct(FactoryInterface $factory, EntityManager $em)
    {
        $this->factory = $factory;
        $this->em = $em;
    }

    /**
     * @param Request $request
     * @param Router $router
     */
    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setCurrentUri($request->getRequestUri());
                                                       
        $menu_entry = $menu->addChild('home', array('route' => 'mba_cautious_homepage_homepage'));                               
        
        $pages = $this->em->getRepository('MbaPageBundle:Page')->getMenuPages();
        foreach($pages as $page){     
            if($page->getSlug() != 'home'){
                $menu_entry = $menu->addChild($page->getTitle(), array('route' => 'cms_page', 'routeParameters' => array('slug' => $page->getSlug())));
                $menu_entry->setLinkAttributes(array('class'=>'sub main'));        
            }
        }              
        
        //echo $request->get('_route'); die;
        switch($request->get('_route')) {
            case "mba_cautious_blog_index":
            case "mba_cautious_blog_index_1":
            case "mba_cautious_blog_details":            
                $menu['news']->setCurrent(true);
                break;
        }
        
        return $menu;
    }
}
