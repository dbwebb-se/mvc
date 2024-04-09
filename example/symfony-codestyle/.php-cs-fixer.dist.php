<?php

declare(strict_types=1);

/**
 * Execute the command like this:
 *  php-cs-fixer --config=.php-cs-fixer.dist.php fix src tests
 */
require_once __DIR__.'/vendor/autoload.php';

$finder = PhpCsFixer\Finder::create();

$config = new PhpCsFixer\Config();
$config->setFinder($finder);

return $config;
