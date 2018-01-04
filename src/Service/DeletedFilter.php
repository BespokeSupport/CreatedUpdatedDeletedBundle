<?php
/**
 * Doctrine Filter for CreatedUpdatedDeletedBundle
 * PHP Version 5.4
 *
 * @author   Richard Seymour <web@bespoke.support>
 * @license  MIT
 * @link     https://github.com/BespokeSupport/CreatedUpdatedDeletedBundle
 */

namespace BespokeSupport\CreatedUpdatedDeletedBundle\Service;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

/**
 * Class DeletedFilter
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\Service
 */
class DeletedFilter extends SQLFilter
{
    /**
     * @param ClassMetadata $targetEntity
     * @param string $tableAlias
     * @return string
     */
    public function addFilterConstraint(ClassMetadata $targetEntity, $tableAlias)
    {
        if (in_array('isDeleted', $targetEntity->fieldNames)) {
            $field = array_search('isDeleted', $targetEntity->fieldNames);
            return "$tableAlias.$field = 0";
        }

        if (in_array('deleted', $targetEntity->fieldNames)) {
            $field = array_search('deleted', $targetEntity->fieldNames);
            return "$tableAlias.$field IS NULL";
        }

        return "";
    }
}
