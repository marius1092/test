<?php

namespace Mba\CautiousBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BlogController extends Controller {

    public function getEm() {
        return $this->get('doctrine')->getEntityManager();
    }

    /**
     * @Route("/news/")
     * @Route("/news/{date}/")
     * @Template("MbaCautiousBundle:Blog:index.html.twig")
     */
    public function indexAction($date = '') {
        $globals = $this->get('mba_global_settings')->getGlobalValues();
        $page = $this->get('mba_page.details')->getPageDetails('news');
        if (!$page) {
            throw $this->createNotFoundException('The page does not exist');
        }

        $news_archive = $this->getEm()->getRepository('MbaBlogBundle:Blog')->getArchive();

        if (!$date) {
            $date = (isset($news_archive[0]['aldates'])) ? $news_archive[0]['aldates'] : date('F-Y');
        }
        $news = $this->getEm()->getRepository('MbaBlogBundle:Blog')->getEntriesForDate($date);


        return array('globals' => $globals, 'page' => $page, 'news' => $news, 'news_archive' => $news_archive, 'selected_date' => $date);
    }

    /**     
     * @Route("/news/{date}/{slug}")
     * @Template("MbaCautiousBundle:Blog:details.html.twig")
     */
    public function detailsAction($date = '', $slug = '') {
        $globals = $this->get('mba_global_settings')->getGlobalValues();
        $page = $this->get('mba_page.details')->getPageDetails('news');
        if (!$page) {
            throw $this->createNotFoundException('The page does not exist');
        }
        
        $news = $this->getEm()->getRepository('MbaBlogBundle:Blog')->getEntryBySlug($slug);
        if (!$news) {
            throw $this->createNotFoundException('News not found!');
        }
                
        $news_archive = $this->getEm()->getRepository('MbaBlogBundle:Blog')->getArchive();

        if (!$date) {
            $date = (isset($news_archive[0]['aldates'])) ? $news_archive[0]['aldates'] : date('F-Y');
        }
                
        return array('globals' => $globals, 'page' => $page, 'post' => $news, 'news_archive' => $news_archive, 'selected_date' => $date);
    }    
}
