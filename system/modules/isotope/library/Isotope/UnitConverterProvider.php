<?php

declare(strict_types=1);

namespace Isotope;

use UnitConverter\Calculator\BinaryCalculator;
use UnitConverter\Calculator\CalculatorInterface;
// use UnitConverter\Unit\Mass\Carat;
// use UnitConverter\Unit\Mass\Grain;
use UnitConverter\Unit\Mass\Gram;
use UnitConverter\Unit\Mass\Kilogram;
// use UnitConverter\Unit\Mass\Metricton;
use UnitConverter\Unit\Mass\Milligram;
use UnitConverter\Unit\Mass\Ounce;
use UnitConverter\Unit\Mass\Pound;
use UnitConverter\Unit\Mass\Stone;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\UnitConverter;

class UnitConverterProvider
{
    public function create(): UnitConverter
    {
        /**
         * @var CalculatorInterface $binaryCalculator
         */
        $binaryCalculator = new BinaryCalculator(5, 2);
        // TODO: Set precision and rounding mode

        $units = [
            new Milligram(),
            new Gram(),
            new Kilogram(),
            // new Metricton(),
            // new Carat(),
            new Ounce(),
            new Pound(),
            new Stone(),
            // new Grain(),
            // Add more units if needed
        ];

        $unitRegistry = new UnitRegistry($units);

        $unitConverter = new UnitConverter($unitRegistry, $binaryCalculator);

        return $unitConverter;
    }
}
