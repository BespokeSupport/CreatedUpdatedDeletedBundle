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
 * Class CudCreatedListener
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\Service
 */
class CudCreatedListener
{
    /**
     * setCreated()
     *
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (in_array('BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityCreatedTrait', class_uses(get_class($entity)))) {
            /**
             * @var $entity \BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityCreatedTrait
             */
            if (!$entity->getCreated()) {
                $entity->setCreated(new \DateTime());
            }
        }
    }
}
