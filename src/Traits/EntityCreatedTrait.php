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
 * Class EntityCreatedTrait
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\Traits
 */
trait EntityCreatedTrait
{
    /**
     * Created DateTime
     *
     * @var \DateTime|null
     * @ORM\Column(name="created", type="datetime", nullable=true)
     * @Assert\Type("\DateTime")
     */
    public $created;

    /**
     * @deprecated
     * DateTime of entity creation
     *
     * @return null|\DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @deprecated
     * Set DateTime of Entity Creation
     *
     * @param \DateTime $created
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;
    }
}
