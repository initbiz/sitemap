<?php

declare(strict_types=1);

namespace Initbiz\Sitemap\DOMElements;

use DOMElement;
use Initbiz\Sitemap\Classes\DOMCreator;
use Initbiz\Sitemap\DOMElements\UrlDOMElement;
use Initbiz\Sitemap\Contracts\ConvertingToDOMElement;

class UrlsetDOMElement implements ConvertingToDOMElement
{
    /**
     * Maximum URLs allowed (Protocol limit is 50k)
     */
    const MAX_URLS = 50000;

    /**
     * URLs
     *
     * @var array<UrlDOMElement>
     */
    protected array $urls;

    /**
     * Get the value of urls
     *
     * @return array<UrlDOMElement>
     */
    public function getUrls(): array
    {
        return $this->urls;
    }

    /**
     * Set the value of urls
     *
     * @param array<UrlDOMElement> $urls
     * @return void
     */
    public function setUrls(array $urls): void
    {
        $this->urls = $urls;
    }

    /**
     * Method that should convert this item to XML DOMElement
     *
     * @param DOMCreator $creator
     * @return DOMElement
     */
    public function toDOMElement(DOMCreator $creator): DOMElement
    {
        $urlSet = $creator->createElement('urlset');
        $urlSet->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $urlSet->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $urlSet->setAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

        $i = 1;
        foreach ($this->urls as $url) {
            if ($i >= self::MAX_URLS) {
                break;
            }

            $urlElement = $url->toDOMElement($creator);
            $urlSet->appendChild($urlElement);

            $i++;
        }

        return $urlSet;
    }
}
