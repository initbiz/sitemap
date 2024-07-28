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
     * Allowed types of the urlset
     */
    const URLSET_TYPE_URLS = 'urls';
    const URLSET_TYPE_IMAGES = 'images';
    const URLSET_TYPE_VIDEOS = 'videos';

    /**
     * Attributes added to this urlset depending on the type of the URL set
     */
    const URLSET_ATTRIBUTES = [
        self::URLSET_TYPE_URLS => [
            'xmlns' => 'http://www.sitemaps.org/schemas/sitemap/0.9',
            'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
            'xsi:schemaLocation' => 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd',
        ],

        self::URLSET_TYPE_IMAGES => [
            "xmlns" => "http://www.sitemaps.org/schemas/sitemap/0.9",
            "xmlns:image" => "http://www.google.com/schemas/sitemap-image/1.1",
        ],

        self::URLSET_TYPE_VIDEOS => [
            "xmlns" => "http://www.sitemaps.org/schemas/sitemap/0.9",
            "xmlns:video" => "http://www.google.com/schemas/sitemap-video/1.1",
        ],
    ];

    /**
     * Type of the urlset, by default, it's urls
     *
     * @var string
     */
    protected string $type = self::URLSET_TYPE_URLS;

    /**
     * URLs
     *
     * @var array<UrlDOMElement>
     */
    protected array $urls;

    /**
     * Get the value of urls
     *
     * @return array<UrlDOMElement>|null
     */
    public function getUrls(): ?array
    {
        return $this->urls?? null;
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
     * Use this method to change urlset type
     *
     * @param string $type
     * @return void
     */
    public function setType(string $type): void
    {
        if ($type === self::URLSET_TYPE_IMAGES) {
            $this->type = self::URLSET_TYPE_IMAGES;
        } elseif ($type === self::URLSET_TYPE_VIDEOS) {
            $this->type = self::URLSET_TYPE_VIDEOS;
        } else {
            $this->type = self::URLSET_TYPE_URLS;
        }
    }

    /**
     * Get this urlset type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
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

        $i = 1;
        foreach ($this->urls as $url) {
            if ($i >= self::MAX_URLS) {
                break;
            }

            $urlElement = $url->toDOMElement($creator);
            if (!is_null($url->getImages())) {
                $this->setType(self::URLSET_TYPE_IMAGES);
            } elseif (!is_null($url->getVideos())) {
                $this->setType(self::URLSET_TYPE_VIDEOS);
            }

            $urlSet->appendChild($urlElement);

            $i++;
        }

        // Set attributes depending on type
        foreach (self::URLSET_ATTRIBUTES[$this->getType()] as $key => $value) {
            $urlSet->setAttribute($key, $value);
        }

        return $urlSet;
    }
}
