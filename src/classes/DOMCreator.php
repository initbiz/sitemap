<?php

declare(strict_types=1);

namespace Initbiz\Sitemap\Classes;

use DOMElement;
use DOMDocument;

/**
 * Simple class that creates elements and attributes of given DOMDocument
 */
class DOMCreator
{
    /**
     * DOMDocument that we create elements and attributes on
     *
     * @var DOMDocument
     */
    protected DOMDocument $document;

    public function __construct(DOMDocument $document)
    {
        $this->document = $document;
    }

    /**
     * Method that creates DOMElement using our DOMDocument instance
     *
     * @param string $name
     * @param string $value
     * @return DOMElement|false
     */
    public function createElement(string $name, string $value = ""): DOMElement|false
    {
        return $this->document->createElement($name, $value);
    }
}
