<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

/**
 * Class AppKernel
 */
class AppKernel extends Kernel
{
    protected $debug = true;

    public function registerBundles()
    {
        return array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \BespokeSupport\CreatedUpdatedDeletedBundle\BespokeSupportCreatedUpdatedDeletedBundle()
        );
    }
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

    /**
     * @return string
     */
    public function getCacheDir()
    {
        return __DIR__.'/../tmp/'.$this->getEnvironment();
    }
    /**
     * @return string
     */
    public function getLogDir()
    {
        return __DIR__.'/../tmp/';
    }
}
