<?php

//
if (file_exists(dirname(__FILE__).'/../../../../autoload.php')) {
    return;
}


if (!isset($_SERVER['KERNEL_DIR'])) {
    $_SERVER['KERNEL_DIR'] = dirname(__FILE__);
}


if (isset($_ENV['BOOTSTRAP_CLEAR_CACHE_ENV'])) {
    passthru(sprintf(
        'php "%s/console" cache:clear --env=%s --no-warmup',
        __DIR__,
        $_ENV['BOOTSTRAP_CLEAR_CACHE_ENV']
    ));
}

require __DIR__.'/bootstrap.php';
