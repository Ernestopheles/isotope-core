<?php

/*
 * Isotope eCommerce for Contao Open Source CMS
 *
 * Copyright (C) 2009 - 2019 terminal42 gmbh & Isotope eCommerce Workgroup
 *
 * @link       https://isotopeecommerce.org
 * @license    https://opensource.org/licenses/lgpl-3.0.html
 */

namespace Isotope;

use Contao\StringUtil;
use Contao\System;
use Isotope\Interfaces\IsotopeWeighable;
use UnitConverter\UnitConverter;

class Weight implements IsotopeWeighable
{
    private static UnitConverter $unitConverter;

    public function __construct(
        private float $fltValue,
        private string $strUnit
    ) {
    }

    /**
     * @inheritdoc
     */
    public function getWeightValue()
    {
        return $this->fltValue;
    }

    /**
     * @inheritdoc
     */
    public function getWeightUnit()
    {
        return $this->strUnit;
    }

    /**
     * Create weight object from timePeriod widget value
     * @param   mixed $arrData
     * @return  Weight|null
     */
    public static function createFromTimePeriod($arrData)
    {
        $container = System::getContainer();
        self::$unitConverter = $container->get('isotope.unit_converter');

        $arrData = StringUtil::deserialize($arrData);

        if (
            empty($arrData)
            || !is_array($arrData)
            || $arrData['value'] === ''
            || $arrData['unit'] === ''
            || !in_array($arrData['unit'], self::$unitConverter->getRegistry()->listUnits('Mass'))
        ) {
            return null;
        }

        return new static($arrData['value'], $arrData['unit']);
    }
}
