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
 * Class EntityDeletedTrait
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\Traits
 */
trait EntityDeletedTrait
{
    /**
     * DateTime of entity Deletion
     * 1st entity manager remove() causes DateTime - soft delete
     * 2nd entity manager remove() causes hard deletion of row
     *
     * @var \DateTime|null
     * @ORM\Column(name="deleted", type="datetime", nullable=true)
     * @Assert\Type("\DateTime")
     */
    public $deleted;

    /**
     * @deprecated
     * getDeleted()
     *
     * @return \DateTime|null
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @deprecated
     * setDeleted()
     *
     * @param \DateTime $deleted
     */
    public function setDeleted(\DateTime $deleted = null)
    {
        $this->deleted = $deleted;
    }
}
