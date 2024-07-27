<?php

declare(strict_types=1);

namespace Initbiz\Sitemap\DOMElements;

use DOMElement;
use Initbiz\Sitemap\Classes\DOMCreator;
use Initbiz\Sitemap\Contracts\ConvertingToDOMElement;

class ImageDOMElement implements ConvertingToDOMElement
{
    /**
     * Loc
     *
     * @var string
     */
    protected string $loc;

    /**
     * Get Loc attribute
     *
     * @return string
     */
    public function getLoc(): string
    {
        return $this->loc;
    }

    /**
     * Set loc attribute
     *
     * @param string $loc
     * @return void
     */
    public function setLoc(string $loc): void
    {
        $this->loc = $loc;
    }

    /**
     * @inheritdoc
     */
    public function toDOMElement(DOMCreator $creator): DOMElement
    {
        $imageElement = $creator->createElement('image:image');

        $imageLocElement = $creator->createElement('image:loc', $this->getLoc());
        $imageElement->appendChild($imageLocElement);

        return $imageElement;
    }
}

