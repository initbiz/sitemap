<?php

declare(strict_types=1);

namespace Initbiz\Sitemap\DOMElements;

use DOMElement;
use Initbiz\Sitemap\Classes\DOMCreator;
use Initbiz\Sitemap\Contracts\ConvertingToDOMElement;

class SitemapDOMElement implements ConvertingToDOMElement
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
    public function toDomElement(DOMCreator $creator): DOMElement
    {
        $sitemapElement = $creator->createElement('sitemap');
        $sitemapElement->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        $element = $creator->createElement('loc', $this->getLoc());
        $sitemapElement->appendChild($element);

        return $sitemapElement;
    }
}

