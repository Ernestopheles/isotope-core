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

use PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer;
use PhpCsFixer\Fixer\ControlStructure\NoAlternativeSyntaxFixer;
use PhpCsFixer\Fixer\FunctionNotation\VoidReturnFixer;
use PhpCsFixer\Fixer\PhpTag\BlankLineAfterOpeningTagFixer;
use PhpCsFixer\Fixer\PhpTag\LinebreakAfterOpeningTagFixer;
use PhpCsFixer\Fixer\Semicolon\SemicolonAfterInstructionFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use PhpCsFixer\Fixer\Strict\StrictComparisonFixer;
use PhpCsFixer\Fixer\Strict\StrictParamFixer;
use PhpCsFixer\Fixer\Whitespace\StatementIndentationFixer;
use SlevomatCodingStandard\Sniffs\Namespaces\ReferenceUsedNamesOnlySniff;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->sets([__DIR__.'/../vendor/contao/easy-coding-standard/config/contao.php']);

    $ecsConfig->skip([
        BlankLineAfterOpeningTagFixer::class,
        DeclareStrictTypesFixer::class,
        LinebreakAfterOpeningTagFixer::class,
        NoAlternativeSyntaxFixer::class,
        ReferenceUsedNamesOnlySniff::class,
        SemicolonAfterInstructionFixer::class,
        StatementIndentationFixer::class,
        StrictComparisonFixer::class,
        StrictParamFixer::class,
        VisibilityRequiredFixer::class,
        VoidReturnFixer::class,
    ]);

    $ecsConfig->parallel();
    $ecsConfig->lineEnding("\n");
    $ecsConfig->fileExtensions(['html5']);
    $ecsConfig->cacheDirectory(sys_get_temp_dir().'/ecs_template_cache');
};