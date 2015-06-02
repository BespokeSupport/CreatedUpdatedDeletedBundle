<?php

namespace BespokeSupport\CreatedUpdatedDeletedBundle\Tests;

use BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityCreated;
use BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityDeleted;
use BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityIsDeleted;
use BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityUpdated;
use Doctrine\Bundle\DoctrineBundle\Command\Proxy\UpdateSchemaDoctrineCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class ServiceDoctrineTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected static $entityManager;

    /**
     * @var \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected static $doctrine;

    public function setUp()
    {
        self::bootKernel();

        self::$entityManager = self::$kernel->getContainer()->get('doctrine.orm.entity_manager');
        self::$doctrine = self::$kernel->getContainer()->get('doctrine');


        $application = new Application(self::$kernel);
        $command = new UpdateSchemaDoctrineCommand();
        $application->add($command);
        $command = $application->find('doctrine:schema:update');

        $commandTester = new CommandTester($command);
        $commandTester->execute(
            array(
                'command' => $command->getName(),
                '--force' => true
            )
        );
    }

    public function testListeners()
    {
        $eventManager = self::$entityManager->getEventManager();

        $listeners = $eventManager->getListeners();

        $this->assertCount(1, $listeners['prePersist']);
        $this->assertCount(1, $listeners['preUpdate']);
        $this->assertCount(1, $listeners['onFlush']);
    }



    public function testCreated()
    {
        $entity = new TestEntityCreated();
        self::$entityManager->persist($entity);
        self::$entityManager->flush();
        $this->assertNotNull($entity->getCreated());

        $entity = self::$entityManager->find('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityCreated', 1);
        $this->assertNotNull($entity->getCreated());
    }

    public function testUpdated()
    {
        $entity = new TestEntityUpdated();
        $this->assertNull($entity->getUpdated());

        self::$entityManager->persist($entity);
        self::$entityManager->flush();

        $entity = self::$entityManager->find('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityUpdated', 1);
        $this->assertNull($entity->getUpdated());

        // update something on the entity
        $entity->updateMe = 'UPDATING';

        self::$entityManager->persist($entity);
        self::$entityManager->flush();

        $this->assertNotNull($entity->getUpdated());
    }

    public function testIsDelete()
    {
        $entity = new TestEntityIsDeleted();

        // save the entity - not deleted
        self::$entityManager->persist($entity);
        self::$entityManager->flush();
        $this->assertFalse($entity->isDeleted());

        // soft delete the entity
        self::$entityManager->remove($entity);
        self::$entityManager->flush();
        $this->assertTrue($entity->isDeleted());

        // reload entity
        $entity = self::$entityManager->find('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityIsDeleted', 1);
        $this->assertNotNull($entity);
        $this->assertTrue($entity->isDeleted());

        // hard delete the entity
        self::$entityManager->remove($entity);
        self::$entityManager->flush();

        // entity removed
        $entity = self::$entityManager->find('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityIsDeleted', 1);
        $this->assertNull($entity);
    }


    public function testDelete()
    {
        $entity = new TestEntityDeleted();

        // save the entity - not deleted
        self::$entityManager->persist($entity);
        self::$entityManager->flush();
        $this->assertNull($entity->getDeleted());

        // soft delete the entity
        self::$entityManager->remove($entity);
        self::$entityManager->flush();
        $this->assertNotNull($entity->getDeleted());

        // reload entity
        $entity = self::$entityManager->find('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityDeleted', 1);
        $this->assertNotNull($entity);
        $this->assertNotNull($entity->getDeleted());

        // hard delete the entity
        self::$entityManager->remove($entity);
        self::$entityManager->flush();

        // entity removed
        $entity = self::$entityManager->find('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityDeleted', 1);
        $this->assertNull($entity);
    }

    public function testTwoUpdates()
    {
        $entity1 = new TestEntityUpdated();
        $entity2 = new TestEntityUpdated();
        self::$entityManager->persist($entity1);
        self::$entityManager->persist($entity2);
        self::$entityManager->flush();

        // reload the entities
        $entity1 = self::$entityManager->find('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityUpdated', 1);
        $entity2 = self::$entityManager->find('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityUpdated', 2);

        $this->assertNotNull($entity1);
        $this->assertNull($entity1->getUpdated());
        $this->assertNotNull($entity2);
        $this->assertNull($entity2->getUpdated());

        // update something on the entity
        $entity1->updateMe = 'UPDATING';
        $entity2->updateMe = 'UPDATING';

        self::$entityManager->persist($entity1);
        self::$entityManager->persist($entity2);
        self::$entityManager->flush();

        $this->assertNotNull($entity1->getUpdated());
        $this->assertNotNull($entity2->getUpdated());

        // reload the entities
        $entity1 = self::$entityManager->find('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityUpdated', 1);
        $entity2 = self::$entityManager->find('BespokeSupport\CreatedUpdatedDeletedBundle\Tests\TestEntities\TestEntityUpdated', 2);

        $this->assertNotNull($entity1->getUpdated());
        $this->assertNotNull($entity2->getUpdated());
    }
}
