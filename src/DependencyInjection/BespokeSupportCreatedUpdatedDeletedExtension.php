<?php
/**
 * Symfony DI for CreatedUpdatedDeletedBundle
 * PHP Version 5.4
 *
 * @author   Richard Seymour <web@bespoke.support>
 * @license  MIT
 * @link     https://github.com/BespokeSupport/CreatedUpdatedDeletedBundle
 */

namespace BespokeSupport\CreatedUpdatedDeletedBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class BespokeSupportCreatedUpdatedDeletedExtension
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\DependencyInjection
 */
class BespokeSupportCreatedUpdatedDeletedExtension extends Extension
{
    /**
     * load Bundle services.yml
     *
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        $loader->load('services.yml');
    }
}
