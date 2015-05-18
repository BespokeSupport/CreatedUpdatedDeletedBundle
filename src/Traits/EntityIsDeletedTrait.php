<?php
/**
 * Entity Trait for use in CreatedUpdatedDeletedBundle
 * PHP Version 5.4
 *
 * @author   Richard Seymour <web@bespoke.support>
 * @license  MIT
 * @link     https://github.com/BespokeSupport/CreatedUpdatedDeletedBundle
 */

namespace BespokeSupport\CreatedUpdatedDeletedBundle\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class EntityIsDeletedTrait
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\Traits;
 */
trait EntityIsDeletedTrait
{
    /**
     * Boolean T/F of entity Deletion
     * 1st entity manager remove() causes True - soft delete
     * 2nd entity manager remove() causes hard deletion of row
     *
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false, options={"default"=false})
     * @Assert\Type("bool")
     */
    protected $isDeleted = false;
    /**
     * isDeleted()
     *
     * @return boolean
     */
    public function isDeleted()
    {
        return $this->isDeleted;
    }
    /**
     * setDeleted()
     *
     * @param boolean $deleted
     * @return $this
     */
    public function setIsDeleted($deleted)
    {
        $this->isDeleted = ($deleted) ? true : false;
        return $this;
    }
}
