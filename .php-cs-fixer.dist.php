<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

return (new Config())
    ->setFinder(Finder::create()->exclude('vendor')->in(__DIR__))
    ->setRules(['@PSR12' => true]);
