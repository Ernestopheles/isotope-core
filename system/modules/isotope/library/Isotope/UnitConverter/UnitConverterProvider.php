<?php

declare(strict_types=1);

namespace YourNamespace\YourExtension;

use Isotope\DependencyInjection\Attribute\AsUnitConverter;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use UnitConverter\Calculator\BinaryCalculator;
use UnitConverter\Calculator\CalculatorInterface;
use UnitConverter\Unit\Mass\Kilogram;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\UnitConverter;

#[AsUnitConverter()]
class UnitConverterProvider
{
    public function create(ContainerBuilder $container): UnitConverter
    {
        /**
         * @var CalculatorInterface $binaryCalculator
         */
        $binaryCalculator = new BinaryCalculator(5, 2);
        // TODO: Set precision and rounding mode

        $units = [
            new Kilogram(),
            // Add more units if needed
        ];

        $unitRegistry = new UnitRegistry($units);

        $unitConverter = new UnitConverter($unitRegistry, $binaryCalculator);

        return $unitConverter;
    }
}
