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
     * @Route("/podcast/{date}/")
     * @Template("MbaCautiousBundle:Podcast:index.html.twig")
     */
    public function indexAction($date = '')
    {                                
        $globals = $this->get('mba_global_settings')->getGlobalValues();        
        $page = $this->get('mba_page.details')->getPageDetails('podcast');                                        
        if (!$page) {
            throw $this->createNotFoundException('The page does not exist');
        }             
        
        $podcast_archive = $this->getEm()->getRepository('MbaCautiousBundle:Podcast')->getArchive();
        
        if(!$date) {
            $date = (isset($podcast_archive[0]['aldates'])) ? $podcast_archive[0]['aldates'] : date('F-Y');
        }
        $podcasts = $this->getEm()->getRepository('MbaCautiousBundle:Podcast')->getEntriesForDate($date);
        
        return array('globals' => $globals, 'page' => $page, 'archive' => $podcast_archive, 'podcasts' => $podcasts);
    }
}
