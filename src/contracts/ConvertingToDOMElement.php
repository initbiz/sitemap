<?php

declare(strict_types=1);

namespace Initbiz\Sitemap\Contracts;

use DOMElement;
use Initbiz\Sitemap\Classes\DOMCreator;

/**
 * Classes of this type can be parsed by Sitemap Pages generator
 */
interface ConvertingToDOMElement
{
    /**
     * Method that should convert this item to XML DOMElement
     *
     * @param DOMCreator $creator
     * @return DOMElement
     */
    public function toDomElement(DOMCreator $creator): DOMElement;
}
