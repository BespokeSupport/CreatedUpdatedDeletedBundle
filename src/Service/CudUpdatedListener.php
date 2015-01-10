<?php
/**
 * Doctrine Listener for CreatedUpdatedDeletedBundle
 * PHP Version 5.4
 *
 * @author   Richard Seymour <web@bespoke.support>
 * @license  MIT
 * @link     https://github.com/BespokeSupport/CreatedUpdatedDeletedBundle
 */

namespace BespokeSupport\CreatedUpdatedDeletedBundle\Service;

use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * Class CudUpdatedListener
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\Service
 */
class CudUpdatedListener
{
    /**
     * setUpdated()
     *
     * @param LifecycleEventArgs $args
     */
    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (in_array('BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityUpdatedTrait', class_uses(get_class($entity)))) {
            /**
             * @var $entity \BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityUpdatedTrait
             */
            $entity->setUpdated(new \DateTime());
        }
    }
}
