<?php

namespace BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities;

use BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityDeletedTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class TestEntityDeleted
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities
 * @ORM\Entity()
 */
class TestEntityDeleted
{
    use EntityDeletedTrait;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}
