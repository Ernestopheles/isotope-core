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

use Rector\CodeQuality\Rector\BooleanNot\SimplifyDeMorganBinaryRector;
use Rector\CodeQuality\Rector\Empty_\SimplifyEmptyCheckOnEmptyArrayRector;
use Rector\CodeQuality\Rector\FuncCall\CompactToVariablesRector;
use Rector\CodeQuality\Rector\FunctionLike\SimplifyUselessVariableRector;
use Rector\CodeQuality\Rector\Identical\SimplifyBoolIdenticalTrueRector;
use Rector\CodeQuality\Rector\If_\SimplifyIfReturnBoolRector;
use Rector\CodingStyle\Rector\ClassMethod\NewlineBeforeNewAssignSetRector;
use Rector\CodingStyle\Rector\FuncCall\CountArrayToEmptyArrayComparisonRector;
use Rector\CodingStyle\Rector\String_\SymplifyQuoteEscapeRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassMethod\RemoveUnusedPrivateMethodParameterRector;
use Rector\DeadCode\Rector\Concat\RemoveConcatAutocastRector;
use Rector\Php74\Rector\FuncCall\ArraySpreadInsteadOfArrayMergeRector;
use Rector\Php74\Rector\Property\RestoreDefaultNullToNullableTypePropertyRector;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\Php81\Rector\Array_\FirstClassCallableRector;
use Rector\Php81\Rector\FuncCall\NullToStrictStringFuncCallArgRector;
use Rector\Set\ValueObject\SetList;
use Rector\Strict\Rector\Empty_\DisallowedEmptyRuleFixerRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->parallel();

    $rectorConfig->import(SetList::PHP_80);
    $rectorConfig->import(SetList::PHP_81);

    $rectorConfig->paths([
        __DIR__.'/../../../*/bin',
        __DIR__.'/../../../*/src',
        __DIR__.'/../../../*/tests',
        __DIR__.'/../../../tools/*/bin',
        __DIR__.'/../../../tools/*/config',
        __DIR__.'/../../../tools/*/src',
    ]);

    $rectorConfig->skip([
        ClassPropertyAssignToConstructorPromotionRector::class => [
        ],
        FirstClassCallableRector::class => [
        ],
        NullToStrictStringFuncCallArgRector::class,
        SimplifyIfReturnBoolRector::class => [
        ],
    ]);

    $rectorConfig->rule(ArraySpreadInsteadOfArrayMergeRector::class);
    $rectorConfig->rule(CompactToVariablesRector::class);
    $rectorConfig->rule(CountArrayToEmptyArrayComparisonRector::class);
    $rectorConfig->rule(DisallowedEmptyRuleFixerRector::class);
    $rectorConfig->rule(NewlineBeforeNewAssignSetRector::class);
    $rectorConfig->rule(RemoveConcatAutocastRector::class);
    $rectorConfig->rule(RemoveUnusedPrivateMethodParameterRector::class);
    $rectorConfig->rule(RestoreDefaultNullToNullableTypePropertyRector::class);
    $rectorConfig->rule(SimplifyBoolIdenticalTrueRector::class);
    $rectorConfig->rule(SimplifyDeMorganBinaryRector::class);
    $rectorConfig->rule(SimplifyEmptyCheckOnEmptyArrayRector::class);
    $rectorConfig->rule(SimplifyIfReturnBoolRector::class);
    $rectorConfig->rule(SymplifyQuoteEscapeRector::class);
    $rectorConfig->rule(SimplifyUselessVariableRector::class);
};
