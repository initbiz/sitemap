<?php

declare(strict_types=1);

namespace Initbiz\Sitemap\Generators;

use Initbiz\Sitemap\Generators\AbstractGenerator;
use Initbiz\Sitemap\Contracts\ConvertingToDOMElement;

/**
 * It's a basic generator that is rather useless for typical sitemap generators
 * Just an example of usage and for testing purposes
 */
class BasicGenerator extends AbstractGenerator
{
    /**
     * Array of DOMElements
     *
     * @var array<ConvertingToDOMElement>
     */
    private array $DOMElements;

    /**
     * Setter for DOMElements attribute
     *
     * @param array<ConvertingToDOMElement> $DOMElements
     * @return void
     */
    public function setDOMElements(array $DOMElements): void
    {
        $this->DOMElements = $DOMElements;
    }

    /**
     * Make items that are added to the XML
     *
     * @return array<ConvertingToDOMElement>
     */
    public function makeDOMElements(): array
    {
        return $this->DOMElements;
    }
}
