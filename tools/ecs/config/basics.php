<?php

declare(strict_types=1);

/*
 * Isotope eCommerce for Contao Open Source CMS
 *
 *
 * Copyright (C) 2009 - 2019 terminal42 gmbh & Isotope eCommerce Workgroup
 *
 *
 * @link       https://isotopeecommerce.org
 *
 *
 * @license    https://opensource.org/licenses/lgpl-3.0.html
 *
 *
 */

use PhpCsFixer\Fixer\Whitespace\MethodChainingIndentationFixer;
use SlevomatCodingStandard\Sniffs\Variables\UnusedVariableSniff;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->sets([__DIR__.'/../vendor/contao/easy-coding-standard/config/contao-basics.php']);

    $ecsConfig->skip([
        MethodChainingIndentationFixer::class => [
        ],
        UnusedVariableSniff::class => [
        ],
    ]);

    $ecsConfig->parallel();
    $ecsConfig->lineEnding("\n");
    $ecsConfig->cacheDirectory(sys_get_temp_dir().'/ecs_default_cache');
};
