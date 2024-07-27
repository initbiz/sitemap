<?php

declare(strict_types=1);

namespace Initbiz\Sitemap\DOMElements;

use DateTime;
use DOMElement;
use Initbiz\Sitemap\Classes\DOMCreator;
use Initbiz\Sitemap\Contracts\ConvertingToDOMElement;

class SitemapSingleVideoItem implements ConvertingToDOMElement
{
    /**
     * Thumbnail loc
     *
     * @var string
     */
    protected string $thumbnailLoc;

    /**
     * Title
     *
     * @var string
     */
    protected $title;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Content Loc
     *
     * @var string
     */
    protected $contentLoc;

    /**
     * Player loc
     *
     * @var string
     */
    protected $playerLoc;

    /**
     * Duration
     *
     * @var int
     */
    protected $duration;

    /**
     * Expiration date
     *
     * @var DateTime
     */
    protected $expirationDate;

    /**
     * Rating
     *
     * @var float
     */
    protected $rating;

    /**
     * View count
     *
     * @var int
     */
    protected $viewCount;

    /**
     * Publication date
     *
     * @var DateTime
     */
    protected $publicationDate;

    /**
     * Family friendly
     *
     * @var string
     */
    protected $familyFriendly;

    /**
     * Requires subscription
     *
     * @var string
     */
    protected $requiresSubscription;

    /**
     * Uploader
     *
     * @var string
     */
    protected $uploader;

    /**
     * Live
     *
     * @var string
     */
    protected $live;

    /**
     * Get thumbnail loc
     *
     * @return string
     */
    public function getThumbnailLoc(): string
    {
        return $this->thumbnailLoc;
    }

    /**
     * Set thumbnail loc
     *
     * @param string $thumbnailLoc
     * @return void
     */
    public function setThumbnailLoc(string $thumbnailLoc): void
    {
        $this->thumbnailLoc = $thumbnailLoc;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Get content Loc
     *
     * @return string
     */
    public function getContentLoc(): string
    {
        return $this->contentLoc;
    }

    /**
     * Set content Loc
     *
     * @param string $contentLoc
     * @return void
     */
    public function setContentLoc(string $contentLoc): void
    {
        $this->contentLoc = $contentLoc;
    }

    /**
     * Get player loc
     *
     * @return string
     */
    public function getPlayerLoc(): string
    {
        return $this->playerLoc;
    }

    /**
     * Set player loc
     *
     * @param string $playerLoc
     * @return void
     */
    public function setPlayerLoc(string $playerLoc): void
    {
        $this->playerLoc = $playerLoc;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return void
     */
    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * Get expiration date
     *
     * @return DateTime
     */
    public function getExpirationDate(): DateTime
    {
        return $this->expirationDate;
    }

    /**
     * Set expiration date
     *
     * @param DateTime $expirationDate
     * @return void
     */
    public function setExpirationDate(DateTime $expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * Get rating
     *
     * @return float
     */
    public function getRating(): float
    {
        return $this->rating;
    }

    /**
     * Set rating
     *
     * @param float $rating
     * @return void
     */
    public function setRating(float $rating): void
    {
        $this->rating = $rating;
    }

    /**
     * Get view count
     *
     * @return integer
     */
    public function getViewCount(): int
    {
        return $this->viewCount;
    }

    /**
     * Set view count
     *
     * @param integer $viewCount
     * @return void
     */
    public function setViewCount(int $viewCount): void
    {
        $this->viewCount = $viewCount;
    }

    /**
     * Get publication date
     *
     * @return DateTime
     */
    public function getPublicationDate(): DateTime
    {
        return $this->publicationDate;
    }

    /**
     * Set publication date
     *
     * @param DateTime $publicationDate
     * @return void
     */
    public function setPublicationDate(DateTime $publicationDate): void
    {
        $this->publicationDate = $publicationDate;
    }

    /**
     * Get family friendly
     *
     * @return string
     */
    public function getFamilyFriendly(): string
    {
        return $this->familyFriendly;
    }

    /**
     * Set family friendly
     *
     * @param string $familyFriendly
     * @return void
     */
    public function setFamilyFriendly(string $familyFriendly): void
    {
        $this->familyFriendly = $familyFriendly;
    }

    /**
     * Get requires subscription
     *
     * @return string
     */
    public function getRequiresSubscription(): string
    {
        return $this->requiresSubscription;
    }

    /**
     * Set requires subscription
     *
     * @param string $requiresSubscription
     * @return void
     */
    public function setRequiresSubscription(string $requiresSubscription): void
    {
        $this->requiresSubscription = $requiresSubscription;
    }

    /**
     * Get uploader
     *
     * @return string
     */
    public function getUploader(): string
    {
        return $this->uploader;
    }

    /**
     * Set uploader
     *
     * @param string $uploader
     * @return void
     */
    public function setUploader(string $uploader): void
    {
        $this->uploader = $uploader;
    }

    /**
     * Get live
     *
     * @return string
     */
    public function getLive(): string
    {
        return $this->live;
    }

    /**
     * Set live
     *
     * @param string $live
     * @return void
     */
    public function setLive(string $live): void
    {
        $this->live = $live;
    }

    /**
     * Method that should convert this item to XML DOMElement
     *
     * @param DOMCreator $creator
     * @return DOMElement
     */
    public function toDomElement(DOMCreator $creator): DOMElement
    {
        $videoElement = $creator->createElement('video:video');

        $thumbnailLoc = $this->getThumbnailLoc();
        if (!is_null($thumbnailLoc)) {
            $subElement = $creator->createElement('video:thumbnail_loc', $thumbnailLoc);
            $videoElement->appendChild($subElement);
        }

        $this->getTitle();
        $this->getDescription();
        $this->getContentLoc();
        $this->getPlayerLoc();
        $this->getDuration();
        $this->getExpirationDate();
        $this->getRating();
        $this->getViewCount();
        $this->getPublicationDate();
        $this->getFamilyFriendly();
        $this->getRequiresSubscription();
        $this->getUploader();
        $this->getLive();

        return $videoElement;
    }
}
