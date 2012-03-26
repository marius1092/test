<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\DoctrineBundle\DoctrineBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Symfony\Bundle\DoctrineFixturesBundle\DoctrineFixturesBundle(),   
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Admingenerator\GeneratorBundle\AdmingeneratorGeneratorBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),
            new Gregwar\CaptchaBundle\GregwarCaptchaBundle(),
            new Trsteel\CkeditorBundle\TrsteelCkeditorBundle(),            
            new AntiMattr\GoogleBundle\GoogleBundle(),
            new Oryzone\Bundle\BoilerplateBundle\OryzoneBoilerplateBundle(),    
            new Gregwar\ImageBundle\GregwarImageBundle(),
            new Avalanche\Bundle\ImagineBundle\AvalancheImagineBundle(),
            //my own bundles
            new Mba\UserBundle\MbaUserBundle(),
            new Mba\PageBundle\MbaPageBundle(),
            new Mba\DashboardBundle\MbaDashboardBundle(),
            new Mba\GlobalSettingsBundle\MbaGlobalSettingsBundle(),
            new Mba\CautiousBundle\MbaCautiousBundle(),
            new Mba\CautiousAdminBundle\MbaCautiousAdminBundle(),
            new Vich\UploaderBundle\VichUploaderBundle(),
            new Mba\BlogBundle\MbaBlogBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            //$bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
