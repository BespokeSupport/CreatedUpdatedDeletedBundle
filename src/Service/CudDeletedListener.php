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

use Doctrine\ORM\Event\OnFlushEventArgs;

/**
 * Class CudDeletedListener
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\Service
 */
class CudDeletedListener
{
    /**
     * setDeleted()
     *
     * @param OnFlushEventArgs $args
     */
    public function onFlush(OnFlushEventArgs $args)
    {
        $entityManager = $args->getEntityManager();

        $unitOfWork = $entityManager->getUnitOfWork();

        foreach ($unitOfWork->getScheduledEntityDeletions() as $entity) {

            $traits = class_uses(get_class($entity));

            if (in_array('BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityIsDeletedTrait', $traits)) {
                /**
                 * @var $entity \BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityIsDeletedTrait
                 */
                // hard delete
                if ($entity->getDeleted()) {
                    continue;
                }

                //soft delete
                $entity->setDeleted(true);
                $entityManager->persist($entity);
                $unitOfWork->scheduleExtraUpdate($entity, array('deleted'=> array(0, 1)));
            }

            if (in_array('BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityDeletedTrait', $traits)) {
                /**
                 * @var $entity \BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityDeletedTrait
                 */

                // hard delete
                if ($entity->getDeleted()) {
                    continue;
                }

                //soft delete
                $entity->setDeleted(new \DateTime());
                $entityManager->persist($entity);
                $unitOfWork->scheduleExtraUpdate($entity, array('deleted'=> array(null, new \DateTime())));
            }
        }
    }
}
