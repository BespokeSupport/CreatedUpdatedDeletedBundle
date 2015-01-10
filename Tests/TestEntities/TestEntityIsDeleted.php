<?php

namespace BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities;

use BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityIsDeletedTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class TestEntityIsDeleted
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities
 * @ORM\Entity()
 */
class TestEntityIsDeleted
{
    use EntityIsDeletedTrait;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}
