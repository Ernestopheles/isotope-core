<?php

/**
 * Isotope eCommerce for Contao Open Source CMS
 *
 * Copyright (C) 2008-2012 Isotope eCommerce Workgroup
 *
 * @package    Isotope
 * @link       http://www.isotopeecommerce.com
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 */

namespace Isotope\Interfaces;


/**
 * IsotopeGallery interface describes an Isotope gallery object
 */
interface IsotopeGallery
{

    /**
     * Return the name and description for this gallery
     * @return array
     */
    public static function getClassLabel();

    /**
     * Generate main image and return it as HTML string
     * @param string
     * @return string
     */
    public function generateMainImage($strType='medium');

    /**
     * Generate gallery and return it as HTML string
     * @param string
     * @param integer
     * @return string
     */
    public function generateGallery($strType='gallery', $intSkip=1);
}