<?php

declare(strict_types=1);

namespace Isotope;

use UnitConverter\Calculator\CalculatorInterface;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\UnitConverter;

class UnitConverterProvider
{
    public function __construct(
        private CalculatorInterface $binaryCalculator,
        private UnitRegistry $unitRegistry,
        private array $units,
        private int $precision,
        private int $roundingMode
    ) {
    }

    public function create(): UnitConverter
    {
        $unitConverter = new UnitConverter($this->unitRegistry, $this->binaryCalculator);

        return $unitConverter;
    }
}
