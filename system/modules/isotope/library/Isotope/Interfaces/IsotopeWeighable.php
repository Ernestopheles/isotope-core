<?php

namespace Isotope\Interfaces;

interface IsotopeWeighable
{

    /**
     * Get the weight amount based on weight unit
     * @return  float
     */
    public function getWeightValue();

    /**
     * Get the weight unit
     * @return  string
     */
    public function getWeightUnit();

}
