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
        private UnitConverter $unitConverter)
    {
        $this->unitConverter = $unitConverter ?? System::getContainer()->get('isotope.unit_converter');
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
        $arrData = StringUtil::deserialize($arrData);

        $weight =  new Weight($arrData['value'], $arrData['unit']);

        if (empty($arrData)
            || !is_array($arrData)
            || $arrData['value'] === ''
            || $arrData['unit'] === ''
            || !in_array($arrData['unit'], self::$unitConverter->getRegistry()->listUnits('Mass'))) {
            return null;
        }

        return $weight;
    }
}
