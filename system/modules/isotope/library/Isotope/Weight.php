<?php


namespace Isotope;

use Contao\StringUtil;
use Contao\System;
use Isotope\Interfaces\IsotopeWeighable;
use UnitConverter\UnitConverter;

class Weight implements IsotopeWeighable
{

    /**
     * UnitConverter service instance
     * @param   UnitConverter
     */
    protected $unitConverter;

    /**
     * Weight amount
     * @param   float
     */
    protected $fltValue;

    /**
     * Weight unit
     * @param   string
     */
    protected $strUnit;


    public function __construct(UnitConverter $unitConverter, $fltValue, $strUnit)
    {
        $this->unitConverter = $unitConverter;
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
    public function createFromTimePeriod($arrData)
    {
        $arrData = StringUtil::deserialize($arrData);

        if (empty($arrData)
            || !is_array($arrData)
            || $arrData['value'] === ''
            || $arrData['unit'] === ''
            || !in_array($arrData['unit'], $this->unitConverter->getRegistry()->listUnits('Mass'))) {
            return null;
        }

        return new Weight($arrData['value'], $arrData['unit']);
    }
}
