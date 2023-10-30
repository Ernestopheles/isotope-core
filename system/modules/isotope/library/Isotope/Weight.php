<?php

namespace Isotope;

use UnitConverter\UnitConverter;
use Isotope\Interfaces\IsotopeWeighable;

class Weight implements IsotopeWeighable
{
    protected $weight;

    public function __construct($weight, $unit)
    {
        // Get the UnitConverter service
        $unitConverter = $GLOBALS['container']->get('isotope.unit_converter');
        $this->weight = new Mass($weight, $unit);
    }

    public function getWeightValue()
    {
        return $this->weight->amount();
    }

    public function getWeightUnit()
    {
        return $this->weight->unit();
    }
}
