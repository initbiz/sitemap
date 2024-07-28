<?php

declare(strict_types=1);

namespace Initbiz\Sitemap\DOMElements;

use DateTime;
use DOMElement;
use Initbiz\Sitemap\Classes\DOMCreator;
use Initbiz\Sitemap\Contracts\ConvertingToDOMElement;

class VideoDOMElement implements ConvertingToDOMElement
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
    protected string $title;

    /**
     * Description
     *
     * @var string
     */
    protected string $description;

    /**
     * Content Loc
     *
     * @var string
     */
    protected string $contentLoc;

    /**
     * Player loc
     *
     * @var string
     */
    protected string $playerLoc;

    /**
     * Duration
     *
     * @var int
     */
    protected int $duration;

    /**
     * Expiration date
     *
     * @var DateTime
     */
    protected DateTime $expirationDate;

    /**
     * Rating
     *
     * @var float
     */
    protected float $rating;

    /**
     * View count
     *
     * @var int
     */
    protected int $viewCount;

    /**
     * Publication date
     *
     * @var DateTime
     */
    protected DateTime $publicationDate;

    /**
     * Family friendly
     *
     * @var bool
     */
    protected bool $familyFriendly;

    /**
     * Requires subscription
     *
     * @var bool
     */
    protected bool $requiresSubscription;

    /**
     * Live
     *
     * @var bool
     */
    protected bool $live;

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
     * @return string|null
     */
    public function getContentLoc(): ?string
    {
        return $this->contentLoc ?? null;
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
     * @return integer|null
     */
    public function getDuration(): ?int
    {
        return $this->duration ?? null;
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
     * @return DateTime|null
     */
    public function getExpirationDate(): ?DateTime
    {
        return $this->expirationDate ?? null;
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
     * @return float|null
     */
    public function getRating(): ?float
    {
        return $this->rating ?? null;
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
     * @return integer|null
     */
    public function getViewCount(): ?int
    {
        return $this->viewCount ?? null;
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
     * @return DateTime|null
     */
    public function getPublicationDate(): ?DateTime
    {
        return $this->publicationDate ?? null;
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
     * @return string|null
     */
    public function getFamilyFriendly(): ?bool
    {
        return $this->familyFriendly ?? null;
    }

    /**
     * Set family friendly
     *
     * @param bool $familyFriendly
     * @return void
     */
    public function setFamilyFriendly(bool $familyFriendly): void
    {
        $this->familyFriendly = $familyFriendly;
    }

    /**
     * Get requires subscription
     *
     * @return string|null
     */
    public function getRequiresSubscription(): ?bool
    {
        return $this->requiresSubscription ?? null;
    }

    /**
     * Set requires subscription
     *
     * @param bool $requiresSubscription
     * @return void
     */
    public function setRequiresSubscription(bool $requiresSubscription): void
    {
        $this->requiresSubscription = $requiresSubscription;
    }

    /**
     * Get live
     *
     * @return string|null
     */
    public function getLive(): ?bool
    {
        return $this->live ?? null;
    }

    /**
     * Set live
     *
     * @param bool $live
     * @return void
     */
    public function setLive(bool $live): void
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
        $subElement = $creator->createElement('video:thumbnail_loc', $thumbnailLoc);
        $videoElement->appendChild($subElement);

        $title = $this->getTitle();
        $subElement = $creator->createElement('video:title', $title);
        $videoElement->appendChild($subElement);

        $description = $this->getDescription();
        $subElement = $creator->createElement('video:description', $description);
        $videoElement->appendChild($subElement);

        $playerLoc = $this->getPlayerLoc();
        $subElement = $creator->createElement('video:player_loc', $playerLoc);
        $videoElement->appendChild($subElement);

        $contentLoc = $this->getContentLoc();
        if (!is_null($contentLoc)) {
            $subElement = $creator->createElement('video:content_loc', $contentLoc);
            $videoElement->appendChild($subElement);
        }

        $duration = $this->getDuration();
        if (!is_null($duration)) {
            $subElement = $creator->createElement('video:duration', (string) $duration);
            $videoElement->appendChild($subElement);
        }

        $expirationDate = $this->getExpirationDate();
        if (!is_null($expirationDate)) {
            $subElement = $creator->createElement('video:expiration_date', $expirationDate->format('c'));
            $videoElement->appendChild($subElement);
        }

        $rating = $this->getRating();
        if (!is_null($rating)) {
            $subElement = $creator->createElement('video:rating', number_format($rating, 1));
            $videoElement->appendChild($subElement);
        }

        $viewCount = $this->getViewCount();
        if (!is_null($viewCount)) {
            $subElement = $creator->createElement('video:view_count', (string) $viewCount);
            $videoElement->appendChild($subElement);
        }

        $publicationDate = $this->getPublicationDate();
        if (!is_null($publicationDate)) {
            $subElement = $creator->createElement('video:publication_date', $publicationDate->format('c'));
            $videoElement->appendChild($subElement);
        }

        $familyFriendly = $this->getFamilyFriendly();
        if (!is_null($familyFriendly)) {
            $subElement = $creator->createElement('video:family_friendly', $familyFriendly ? 'yes' : 'no');
            $videoElement->appendChild($subElement);
        }

        $requiresSubscription = $this->getRequiresSubscription();
        if (!is_null($requiresSubscription)) {
            $subElement = $creator->createElement('video:requires_subscription', $requiresSubscription ? 'yes' : 'no');
            $videoElement->appendChild($subElement);
        }

        $live = $this->getLive();
        if (!is_null($live)) {
            $subElement = $creator->createElement('video:live', $live ? 'yes' : 'no');
            $videoElement->appendChild($subElement);
        }


        return $videoElement;
    }
}
