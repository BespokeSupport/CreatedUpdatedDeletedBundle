<?php

namespace BespokeSupport\CreatedUpdatedDeletedBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EntityPropertiesTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected static $entityManager;

    public static function setUpBeforeClass()
    {
        static::bootKernel([
            'debug' => false
        ]);

        self::$entityManager = self::$kernel->getContainer()->get('doctrine.orm.entity_manager');
    }

    public function testEntityCreated()
    {
        /**
         * @var $meta \Doctrine\ORM\Mapping\ClassMetadata
         */
        $meta = self::$entityManager->getClassMetadata('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityCreated');

        $this->assertArrayHasKey('id', $meta->columnNames);
        $this->assertEquals('integer', $meta->fieldMappings['id']['type']);

        $this->assertArrayHasKey('created', $meta->columnNames);
        $this->assertEquals('datetime', $meta->fieldMappings['created']['type']);
    }

    public function testEntityUpdated()
    {
        /**
         * @var $meta \Doctrine\ORM\Mapping\ClassMetadata
         */
        $meta = self::$entityManager->getClassMetadata('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityUpdated');

        $this->assertArrayHasKey('id', $meta->columnNames);
        $this->assertEquals('integer', $meta->fieldMappings['id']['type']);

        $this->assertArrayHasKey('updated', $meta->columnNames);
        $this->assertEquals('datetime', $meta->fieldMappings['updated']['type']);
    }


    public function testEntityDeleted()
    {
        /**
         * @var $meta \Doctrine\ORM\Mapping\ClassMetadata
         */
        $meta = self::$entityManager->getClassMetadata('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityDeleted');

        $this->assertArrayHasKey('id', $meta->columnNames);
        $this->assertEquals('integer', $meta->fieldMappings['id']['type']);

        $this->assertArrayHasKey('deleted', $meta->columnNames);
        $this->assertEquals('datetime', $meta->fieldMappings['deleted']['type']);
    }


    public function testEntityIsDeleted()
    {
        /**
         * @var $meta \Doctrine\ORM\Mapping\ClassMetadata
         */
        $meta = self::$entityManager->getClassMetadata('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityIsDeleted');

        $this->assertArrayHasKey('id', $meta->columnNames);
        $this->assertEquals('integer', $meta->fieldMappings['id']['type']);

        $this->assertArrayHasKey('isDeleted', $meta->columnNames);
        $this->assertEquals('boolean', $meta->fieldMappings['isDeleted']['type']);
    }
}
