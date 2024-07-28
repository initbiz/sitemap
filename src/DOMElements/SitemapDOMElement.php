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
     * @return string|null
     */
    public function getLoc(): ?string
    {
        return $this->loc ?? null;
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
        $sitemapElement = $creator->createElement('sitemap');

        $element = $creator->createElement('loc', $this->getLoc());
        $sitemapElement->appendChild($element);

        return $sitemapElement;
    }
}
