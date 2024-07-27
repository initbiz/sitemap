<?php

declare(strict_types=1);

namespace Initbiz\Sitemap\Contracts;

use DOMDocument;
use Initbiz\Sitemap\Classes\DOMCreator;
use Initbiz\Sitemap\Contracts\ConvertingToDOMElement;

abstract class AbstractGenerator
{
    /**
     * DOMCreator instance that we use externally to create elements on this XML
     *
     * @var DOMCreator
     */
    protected $creator;

    /**
     * The XML instance
     *
     * @var DOMDocument
     */
    private $xml;

    public function __construct()
    {
        $xml = new DOMDocument();
        $xml->encoding = 'UTF-8';

        $this->xml = $xml;
        $this->setCreator(new DOMCreator($this->xml));
    }

    /**
     * Get dOMCreator instance that we use externally to create elements on our document
     */
    public function getCreator(): DOMCreator
    {
        return $this->creator;
    }

    /**
     * Set DOMCreator instance that we use externally to create elements on this XML
     */
    public function setCreator(DOMCreator $creator): void
    {
        $this->creator = $creator;
    }

    /**
     * Generate the XML
     *
     * @return string|false
     */
    public function generate(): string|false
    {
        $DOMElements = $this->makeDOMElements();

        foreach ($DOMElements as $DOMElement) {
            $creator = $this->getCreator();
            $element = $DOMElement->toDOMElement($creator);

            if ($element) {
                $this->xml->appendChild($element);
                $this->urlCount++;
            }
        }

        return $this->xml->saveXML();
    }

    /**
     * Make items that are added to the XML
     *
     * @return array<ConvertingToDOMElement>
     */
    abstract public function makeDOMElements(): array;
}
