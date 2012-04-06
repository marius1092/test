<?php

namespace Mba\DashboardBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Symfony\Component\DependencyInjection\ContainerAware;

class AdminMenuBuilder extends ContainerAware
{

    /**
     * @param \Knp\Menu\FactoryInterface $factory
     */
    
    public function AdminMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $menu->setAttributes(array('id' => 'main_navigation', 'class'=>'menu'));
        
        $menu_entry = $menu->addChild('Dashboard', array('route' => 'mba_dashboard_default_index'));
        //$menu_entry = $menu->addChild('Dashboard', array('uri' => '/admin/'));
        $menu_entry->setLinkAttributes(array('class'=>'sub main'));
        
        $menu_entry = $menu->addChild('Pages', array('route' => 'Mba_PageBundle_Page_list'));
        $menu_entry->setLinkAttributes(array('class'=>'sub main'));
        
        $menu_entry = $menu->addChild('Backgrounds', array('route' => 'Mba_CautiousAdminBundle_Background_list'));
        $menu_entry->setLinkAttributes(array('class'=>'sub main'));        
        
        $menu_entry = $menu->addChild('News', array('route' => 'Mba_BlogBundle_Blog_list'));
        $menu_entry->setLinkAttributes(array('class'=>'sub main'));                
        
        $menu_entry = $menu->addChild('Promo Work', array('route' => 'Mba_CautiousAdminBundle_Promo_list'));
        $menu_entry->setLinkAttributes(array('class'=>'sub main'));
        
        $menu_entry = $menu->addChild('Short Film', array('route' => 'Mba_CautiousAdminBundle_ShortFilm_list'));
        $menu_entry->setLinkAttributes(array('class'=>'sub main'));        
        
        $menu_entry = $menu->addChild('Podcast', array('route' => 'Mba_CautiousAdminBundle_Podcast_list'));
        $menu_entry->setLinkAttributes(array('class'=>'sub main'));

        $menu_entry = $menu->addChild('Settings', array('route' => 'Mba_GlobalSettingsBundle_Gs_list'));
        $menu_entry->setLinkAttributes(array('class'=>'sub main'));
                
        if (!(strpos($this->container->get('request')->getRequestUri(), '/admin/pages') === false)) {
            $menu['Pages']->setCurrent(true);
        }        
        if (!(strpos($this->container->get('request')->getRequestUri(), '/admin/background') === false)) {
            $menu['Backgrounds']->setCurrent(true);
        }
        if (!(strpos($this->container->get('request')->getRequestUri(), '/admin/blog') === false)) {
            $menu['News']->setCurrent(true);
        }
        if (!(strpos($this->container->get('request')->getRequestUri(), '/admin/promo') === false)) {
            $menu['Promo Work']->setCurrent(true);
        }
        if (!(strpos($this->container->get('request')->getRequestUri(), '/admin/short') === false)) {
            $menu['Short Film']->setCurrent(true);
        }
        if (!(strpos($this->container->get('request')->getRequestUri(), '/admin/podcast') === false)) {
            $menu['Podcast']->setCurrent(true);
        }
        if (!(strpos($this->container->get('request')->getRequestUri(), '/admin/global') === false)) {
            $menu['Settings']->setCurrent(true);
        }        
        return $menu;
    }

}
