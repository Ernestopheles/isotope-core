<?php

declare(strict_types=1);

// src/YourNamespace/YourExtension/Attributes/IsotopeServiceTagAttribute.php
namespace Isotope\DependencyInjection\Attribute;

use Attribute;

/**
 * An attribute to register a Unit Converter.
 */
#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class AsUnitConverter
{
    public function __construct(public int|null $priority = null)
    {
    }
}
