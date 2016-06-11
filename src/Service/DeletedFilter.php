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
        $columns = array_values($targetEntity->columnNames);

        if (in_array("is_deleted", $columns)) {
            return $tableAlias.'.is_deleted = 0';
        }

        if (in_array("deleted", $columns)) {
            return $tableAlias.'.deleted IS NULL';
        }

        return "";
    }
}
