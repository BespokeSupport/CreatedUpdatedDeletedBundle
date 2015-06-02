<?php

//
if (file_exists(dirname(__FILE__).'/../../../../autoload.php')) {
    return;
}

//$loader = require_once './vendor/autoload.php';

$symfonyTestApplicationDir = __DIR__ . '/vendor/bespoke-support/symfony-test-application/app/';


if (!isset($_SERVER['KERNEL_DIR'])) {
    $_SERVER['KERNEL_DIR'] = $symfonyTestApplicationDir;
}


if (isset($_ENV['BOOTSTRAP_CLEAR_CACHE_ENV'])) {
    passthru(sprintf(
        'php "%s" cache:clear --env=%s --no-warmup',
        __DIR__.'/vendor/bin/symfony-test-console',
        $_ENV['BOOTSTRAP_CLEAR_CACHE_ENV']
    ));
}

/**
 * @var $loader \Composer\Autoload\ClassLoader
 */
$loader = require_once $symfonyTestApplicationDir . 'bootstrap.php';
