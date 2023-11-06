<?php

namespace Isotope;

use Contao\StringUtil;
use Contao\System;
use Haste\Units\Dimension\Unit;
use Isotope\Interfaces\IsotopeWeighable;
use UnitConverter\UnitConverter;

class Weight implements IsotopeWeighable
{
    public function __construct(
        private float $fltValue,
        private string $strUnit,
    {
    }

    public function getWeightValue()
    {
        return $this->fltValue;
    }

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
        $unitConverter = $container->get('isotope.unit_converter');

        $arrData = StringUtil::deserialize($arrData);

        if (empty($arrData)
            || !is_array($arrData)
            || $arrData['value'] === ''
            || $arrData['unit'] === ''
            || !in_array($arrData['unit'], $unitConverter->getRegistry()->listUnits('Mass'))) {
            return null;
        }

        return new static($arrData['value'], $arrData['unit']);
    }
}
