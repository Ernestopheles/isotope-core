<?php

namespace Isotope;

use Contao\StringUtil;
use Isotope\Interfaces\IsotopeWeighable;
use Isotope\UnitConverterProvider;
use UnitConverter\UnitConverter;

class Weight implements IsotopeWeighable
{
    protected UnitConverterProvider $unitConverterProvider;
    protected UnitConverter $unitConverter;

    protected float $fltValue;
    protected float $strUnit;

    public function __construct($fltValue, $strUnit)
    {
        $this->fltValue = $fltValue;
        $this->strUnit = (string) $strUnit;
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
    public static function createFromTimePeriod($unitConverterProvider, $arrData)
    {
        $unitConverter = $unitConverterProvider->create();

        $arrData = StringUtil::deserialize($arrData);

        if (
            empty($arrData)
            || !is_array($arrData)
            || $arrData['value'] === ''
            || $arrData['unit'] === ''
            || !in_array($arrData['unit'], $unitConverter->getRegistry()->listUnits('Mass'))
        ) {
            return null;
        }

        return new static($arrData['value'], $arrData['unit']);
    }
}
