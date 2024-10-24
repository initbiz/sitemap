<?php

declare(strict_types=1);

namespace Initbiz\Sitemap\DOMElements;

use DOMElement;
use Initbiz\Sitemap\Classes\DOMCreator;
use Initbiz\Sitemap\DOMElements\SitemapDOMElement;
use Initbiz\Sitemap\Contracts\ConvertingToDOMElement;

class SitemapIndexDOMElement implements ConvertingToDOMElement
{
    /**
     * Sitemaps
     *
     * @var array<SitemapDOMElement>
     */
    protected array $sitemaps;

    /**
     * Get the value of sitemaps
     *
     * @return array<SitemapDOMElement>|null
     */
    public function getSitemaps(): ?array
    {
        return $this->sitemaps ?? null;
    }

    /**
     * Set the value of sitemaps
     *
     * @param array<SitemapDOMElement> $sitemaps
     * @return void
     */
    public function setSitemaps(array $sitemaps): void
    {
        $this->sitemaps = $sitemaps;
    }

    /**
     * Method that should convert this item to XML DOMElement
     *
     * @param DOMCreator $creator
     * @return DOMElement
     */
    public function toDOMElement(DOMCreator $creator): DOMElement
    {
        $sitemapIndexElement = $creator->createElement('sitemapindex');
        $sitemapIndexElement->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach ($this->getSitemaps() as $sitemap) {
            $sitemapElement = $sitemap->toDOMElement($creator);
            $sitemapIndexElement->appendChild($sitemapElement);
        }

        return $sitemapIndexElement;
    }
}
