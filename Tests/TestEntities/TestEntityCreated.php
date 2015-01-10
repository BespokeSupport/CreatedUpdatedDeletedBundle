<?php

namespace BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities;

use BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityCreatedTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class TestEntityCreated
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities
 * @ORM\Entity()
 */
class TestEntityCreated
{
    use EntityCreatedTrait;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}
