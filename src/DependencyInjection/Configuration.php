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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('bespoke_support_created_updated_deleted');

        return $treeBuilder;
    }
}
