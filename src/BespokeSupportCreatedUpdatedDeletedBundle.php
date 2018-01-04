<?php
/**
 * Symfony CreatedUpdatedDeletedBundle - Traits and Doctrine lifecycle listeners
 * PHP Version 5.4
 *
 * @author   Richard Seymour <web@bespoke.support>
 * @license  MIT
 * @link     https://github.com/BespokeSupport/CreatedUpdatedDeletedBundle
 */

namespace BespokeSupport\CreatedUpdatedDeletedBundle;

use BespokeSupport\CreatedUpdatedDeletedBundle\Service\DeletedFilter;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class BespokeSupportCreatedUpdatedDeletedBundle extends Bundle
{
    public function boot()
    {
        $doctrine = $this->container->get('doctrine');

        foreach ($doctrine->getManagers() as $manager) {
            /**
             * @var $manager EntityManager
             */
            $conf = $manager->getConfiguration();
            $conf->addFilter(
                'deleted',
                DeletedFilter::class
            );

            $manager->getFilters()->enable('deleted');
        }
    }
}
