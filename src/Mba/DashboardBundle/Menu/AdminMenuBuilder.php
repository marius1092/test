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
        
        $menu_entry = $menu->addChild('Promo Work', array('route' => 'Mba_CautiousAdminBundle_Promo_list'));
        $menu_entry->setLinkAttributes(array('class'=>'sub main'));
        
        $menu_entry = $menu->addChild('Podcast', array('route' => 'Mba_CautiousAdminBundle_Podcast_list'));
        $menu_entry->setLinkAttributes(array('class'=>'sub main'));

        $menu_entry = $menu->addChild('Global Settings', array('route' => 'Mba_GlobalSettingsBundle_Gs_list'));
        $menu_entry->setLinkAttributes(array('class'=>'sub main'));
                
//        $test = $menu->addChild('ha ha', array('uri' => '#'));
//        $test->setLinkAttributes(array('class'=>'sub main'));
//        
//        $help = $menu->addChild('Overwrite this menu', array('uri' => '#'));
//        $help->setLinkAttributes(array('class'=>'sub main'));
//
//        $help->addChild('Configure menu class', array('uri' => 'https://github.com/knplabs/KnpMenuBundle/blob/master/Resources/doc/index.md'));
//        $help->addChild('Configure php class to use', array('uri' => 'https://github.com/cedriclombardot/AdmingeneratorGeneratorBundle/blob/master/Resources/doc/change-the-menu-class.markdown'));                        
//        $menu->addChild('About Me', array(
//            'route' => 'page_show',
//            'routeParameters' => array('id' => 42)
//        ));
        // ... add more children

        return $menu;
    }

}
