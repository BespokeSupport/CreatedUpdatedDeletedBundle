<?php

namespace BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities;

use BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityUpdatedTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class TestEntityUpdated
 * @package BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities
 * @ORM\Entity(repositoryClass="BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityUpdatedRepository")
 */
class TestEntityUpdated
{
    use EntityUpdatedTrait;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="update_me", type="string", length=255, nullable=true)
     */
    public $updateMe;
}
