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
 * Class EntityUpdatedTrait
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\Traits
 */
trait EntityUpdatedTrait
{
    /**
     * Updated DateTime - null on persist - DateTime after each subsequent update
     *
     * @var \DateTime|null
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     * @Assert\Type("\DateTime")
     */
    public $updated;

    /**
     * @deprecated
     * getUpdated()
     *
     * @return null|\DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @deprecated
     * setUpdated()
     *
     * @param \DateTime $updated
     */
    public function setUpdated(\DateTime $updated)
    {
        $this->updated = $updated;
    }
}
