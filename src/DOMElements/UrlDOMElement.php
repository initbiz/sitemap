<?php

declare(strict_types=1);

namespace Initbiz\Sitemap\DOMElements;

use DateTime;
use DOMElement;
use Initbiz\Sitemap\Values\Changefreq;
use Initbiz\Sitemap\Classes\DOMCreator;
use Initbiz\Sitemap\DOMElements\VideoDOMElement;
use Initbiz\Sitemap\Contracts\ConvertingToDOMElement;

class UrlDOMElement implements ConvertingToDOMElement
{
    /**
     * Loc
     *
     * @var string
     */
    protected string $loc;

    /**
     * Lastmod
     *
     * @var DateTime
     */
    protected DateTime $lastmod;

    /**
     * Changefreq
     *
     * @var Changefreq
     */
    protected Changefreq $changefreq;

    /**
     * Priority
     *
     * @var float
     */
    protected float $priority;

    /**
     * Videos
     *
     * @var array<VideoDOMElement>
     */
    protected array $videos;

    /**
     * Images
     *
     * @var array<ImageDOMElement>
     */
    protected array $images;

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
     * Get lastmod attribute
     *
     * @return DateTime|null
     */
    public function getLastmod(): ?DateTime
    {
        return $this->lastmod ?? null;
    }

    /**
     * Get changefreq attribute
     *
     * @return Changefreq|null
     */
    public function getChangefreq(): ?Changefreq
    {
        return $this->changefreq ?? null;
    }

    /**
     * Get priority attribute
     *
     * @return float|null
     */
    public function getPriority(): ?float
    {
        return $this->priority ?? null;
    }

    /**
     * Get the value of videos
     *
     * @return array<VideoDOMElement>|null
     */
    public function getVideos(): ?array
    {
        return $this->videos ?? null;
    }

    /**
     * Get the value of images
     *
     * @return array<ImageDOMElement>|null
     */
    public function getImages(): ?array
    {
        return $this->images ?? null;
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
     * Set Lastmod attribute
     *
     * @param string|DateTime $lastmod
     * @return void
     */
    public function setLastmod(string|DateTime $lastmod): void
    {
        if (is_string($lastmod)) {
            $lastmod = new DateTime($lastmod);
        }

        $this->lastmod = $lastmod;
    }

    /**
     * Set Changefreq attribute
     *
     * @param string|Changefreq $changefreq
     * @return void
     */
    public function setChangefreq(string|Changefreq $changefreq): void
    {
        if (is_string($changefreq)) {
            $changefreq = Changefreq::tryFrom($changefreq);
        }

        $this->changefreq = $changefreq;
    }

    /**
     * Set priority attribute
     *
     * @param string|float $priority
     * @return void
     */
    public function setPriority(string|float $priority): void
    {
        $this->priority = (float) $priority;
    }

    /**
     * Set the value of videos
     *
     * @param array<VideoDOMElement> $videos
     * @return void
     */
    public function setVideos(array $videos): void
    {
        $this->videos = $videos;
    }

    /**
     * Set the value of images
     *
     * @param array<ImageDOMElement>
     * @return void
     */
    public function setImages(array $images): void
    {
        $this->images = $images;
    }

    /**
     * Method that should convert this item to XML DOMElement
     *
     * @param DOMCreator $creator
     * @return DOMElement
     */
    public function toDOMElement(DOMCreator $creator): DOMElement
    {
        $urlElement = $creator->createElement('url');

        $element = $creator->createElement('loc', $this->getLoc());
        $urlElement->appendChild($element);

        $lastmod = $this->getLastmod();
        if (!is_null($lastmod)) {
            $element = $creator->createElement('lastmod', $lastmod->format('c'));
            $urlElement->appendChild($element);
        }

        $changefreq = $this->getChangefreq();
        if (!is_null($changefreq)) {
            $element = $creator->createElement('changefreq', $changefreq->value);
            $urlElement->appendChild($element);
        }

        $priority = $this->getPriority();
        if (!is_null($priority)) {
            $element = $creator->createElement('priority', number_format($priority, 1));
            $urlElement->appendChild($element);
        }

        $images = $this->getImages();
        if (!is_null($images)) {
            foreach ($images as $image) {
                $imageElement = $image->toDOMElement($creator);
                $urlElement->appendChild($imageElement);
            }
        }

        $videos = $this->getVideos();
        if (!empty($videos)) {
            foreach ($videos as $video) {
                $videoElement = $video->toDOMElement($creator);
                $urlElement->appendChild($videoElement);
            }
        }

        return $urlElement;
    }
}
