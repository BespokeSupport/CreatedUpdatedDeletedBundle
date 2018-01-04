<?php

namespace BespokeSupport\CreatedUpdatedDeletedBundle\Tests;

use BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityCreated;
use BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityUpdated;
use BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityDeleted;
use BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityIsDeleted;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EntityBasicTraitTest extends WebTestCase
{
    public function testCreated()
    {
        $entity = new TestEntityCreated();

        $uses = class_uses($entity);
        $this->assertArrayHasKey('BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityCreatedTrait', $uses);

        $methods = get_class_methods($entity);
        $this->assertTrue((in_array('getCreated', $methods)));
        $this->assertTrue((in_array('setCreated', $methods)));

        $properties = get_class_vars('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityCreated');
        $this->assertCount(0, $properties);

        $this->assertNull($entity->getCreated());

        $entity->setCreated(new \DateTime());

        $this->assertNotNull($entity->getCreated());
    }

    public function testUpdated()
    {
        $entity = new TestEntityUpdated();

        $uses = class_uses($entity);
        $this->assertArrayHasKey('BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityUpdatedTrait', $uses);

        $methods = get_class_methods($entity);
        $this->assertTrue((in_array('getUpdated', $methods)));
        $this->assertTrue((in_array('setUpdated', $methods)));

        $properties = get_class_vars('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityUpdated');
        $this->assertCount(1, $properties);

        $this->assertNull($entity->getUpdated());

        $entity->setUpdated(new \DateTime());

        $this->assertNotNull($entity->getUpdated());
    }

    public function testDeleted()
    {
        $entity = new TestEntityDeleted();

        $uses = class_uses($entity);
        $this->assertArrayHasKey('BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityDeletedTrait', $uses);

        $methods = get_class_methods($entity);
        $this->assertTrue((in_array('getDeleted', $methods)));
        $this->assertTrue((in_array('setDeleted', $methods)));

        $properties = get_class_vars('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityDeleted');
        $this->assertCount(0, $properties);

        $this->assertNull($entity->getDeleted());

        $entity->setDeleted(new \DateTime());

        $this->assertNotNull($entity->getDeleted());
    }

    public function testIsDeleted()
    {
        $entity = new TestEntityIsDeleted();

        $uses = class_uses($entity);
        $this->assertArrayHasKey('BespokeSupport\CreatedUpdatedDeletedBundle\Traits\EntityIsDeletedTrait', $uses);

        $methods = get_class_methods($entity);
        $this->assertTrue((in_array('setIsDeleted', $methods)));
        $this->assertTrue((in_array('isDeleted', $methods)));

        $properties = get_class_vars('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityIsDeleted');
        $this->assertCount(0, $properties);

        $entity->setIsDeleted(true);
        $this->assertTrue($entity->isDeleted());
    }
}
