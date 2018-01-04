<?php

namespace BespokeSupport\CreatedUpdatedDeletedBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BundleTest extends WebTestCase
{
    public function testLoad()
    {
        static::bootKernel([
            'debug' => false
        ]);

        $this->assertNotNull(self::$kernel);

        $container = self::$kernel->getContainer();
        $this->assertNotNull($container);

        $listener = $container->get('bespokesupport.createdupdateddeleted.listener.created');
        $this->assertNotNull($listener);

        $listener = $container->get('bespokesupport.createdupdateddeleted.listener.updated');
        $this->assertNotNull($listener);

        $listener = $container->get('bespokesupport.createdupdateddeleted.listener.deleted');
        $this->assertNotNull($listener);
    }
}
