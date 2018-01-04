<?php

namespace BespokeSupport\CreatedUpdatedDeletedBundle\Tests;

use Doctrine\Bundle\DoctrineBundle\Command\Proxy\UpdateSchemaDoctrineCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class SchemaTest extends KernelTestCase
{
    public static function setUpBeforeClass()
    {
        static::bootKernel([
            'debug' => false
        ]);
    }

    public function testCreate()
    {
        $application = new Application(self::$kernel);

        $command = new UpdateSchemaDoctrineCommand();

        $application->add($command);

        $command = $application->find('doctrine:schema:update');

        $commandTester = new CommandTester($command);
        $commandTester->execute(
            array(
                'command' => $command->getName(),
                '--dump-sql' => true
            )
        );

        $this->assertNotFalse(strpos($commandTester->getDisplay(), 'CREATE TABLE TestEntityCreated (id INTEGER NOT NULL, created DATETIME DEFAULT NULL, PRIMARY KEY(id));'));
        $this->assertNotFalse(strpos($commandTester->getDisplay(), 'CREATE TABLE TestEntityUpdated (id INTEGER NOT NULL, update_me VARCHAR(255) DEFAULT NULL, updated DATETIME DEFAULT NULL, PRIMARY KEY(id));'));
        $this->assertNotFalse(strpos($commandTester->getDisplay(), 'CREATE TABLE TestEntityDeleted (id INTEGER NOT NULL, deleted DATETIME DEFAULT NULL, PRIMARY KEY(id));'));
        $this->assertNotFalse(strpos($commandTester->getDisplay(), 'CREATE TABLE TestEntityIsDeleted (id INTEGER NOT NULL, is_deleted BOOLEAN DEFAULT \'0\' NOT NULL, PRIMARY KEY(id));'));
    }
}
