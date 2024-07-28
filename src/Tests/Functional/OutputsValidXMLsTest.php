<?php

namespace Initbiz\Sitemap\Tests\Functional;

use DateTime;
use PHPUnit\Framework\TestCase;
use Initbiz\Sitemap\DOMElements\UrlDOMElement;
use Initbiz\Sitemap\Generators\BasicGenerator;
use Initbiz\Sitemap\DOMElements\ImageDOMElement;
use Initbiz\Sitemap\DOMElements\VideoDOMElement;
use Initbiz\Sitemap\DOMElements\UrlsetDOMElement;
use Initbiz\Sitemap\DOMElements\SitemapDOMElement;
use Initbiz\Sitemap\DOMElements\SitemapIndexDOMElement;

class OutputsValidXMLsTest extends TestCase
{
    public function testSitemapIndex()
    {
        $sitemap1 = new SitemapDOMElement();
        $sitemap1->setLoc('https://www.example.com/sitemap1.xml.gz');

        $sitemap2 = new SitemapDOMElement();
        $sitemap2->setLoc('https://www.example.com/sitemap2.xml.gz');

        $sitemapIndexDOMElement = new SitemapIndexDOMElement();
        $sitemapIndexDOMElement->setSitemaps([$sitemap1, $sitemap2]);

        $DOMElements = [$sitemapIndexDOMElement];
        $generator = new BasicGenerator();
        $generator->setDOMElements($DOMElements);

        $xml = $generator->generate();
        $filePath = __DIR__ . '/../Fixtures/sitemap_index.xml';
        $this->assertXmlStringEqualsXmlFile($filePath, $xml);
    }

    public function testUrlSet()
    {
        $url1 = new UrlDOMElement();
        $url1->setLoc('https://www.example.com/foo.html');
        $url1->setLastmod('2022-06-04');
        $url1->setPriority('1.0');
        $url1->setChangefreq('always');

        $url2 = new UrlDOMElement();
        $url2->setLoc('https://www.example.com/foo2.html');
        $url2->setLastmod('2022-06-04');
        $url2->setPriority('0.9');

        $urlSetDOMElement = new UrlsetDOMElement();
        $urlSetDOMElement->setUrls([$url1, $url2]);

        $DOMElements = [$urlSetDOMElement];
        $generator = new BasicGenerator();
        $generator->setDOMElements($DOMElements);

        $xml = $generator->generate();
        $filePath = __DIR__ . '/../Fixtures/urlset.xml';
        $this->assertXmlStringEqualsXmlFile($filePath, $xml);
    }

    public function testUrlSetWithImages()
    {
        $url1 = new UrlDOMElement();
        $url1->setloc('https://example.com/sample1.html');

        $image = new ImageDOMElement();
        $image->setLoc('https://example.com/image.jpg');
        $photo = new ImageDOMElement();
        $photo->setLoc('https://example.com/photo.jpg');
        $url1->setImages([$image, $photo]);

        $url2 = new UrlDOMElement();
        $url2->setloc('https://example.com/sample2.html');
        $picture = new ImageDOMElement();
        $picture->setLoc('https://example.com/picture.jpg');
        $url2->setImages([$picture]);

        $urlSetDOMElement = new UrlsetDOMElement();
        $urlSetDOMElement->setUrls([$url1, $url2]);

        $DOMElements = [$urlSetDOMElement];
        $generator = new BasicGenerator();
        $generator->setDOMElements($DOMElements);

        $xml = $generator->generate();
        $filePath = __DIR__ . '/../Fixtures/urlset_with_images.xml';
        $this->assertXmlStringEqualsXmlFile($filePath, $xml);
    }

    public function testUrlSetWithVideos()
    {
        $url1 = new UrlDOMElement();
        $url1->setloc('https://www.example.com/videos/some_video_landing_page.html');

        $video1 = new VideoDOMElement();
        $video1->setThumbnailLoc('https://www.example.com/thumbs/123.jpg');
        $video1->setTitle('Grilling steaks for summer');
        $video1->setDescription('Alkis shows you how to get perfectly done steaks every time');
        $video1->setContentLoc('http://streamserver.example.com/video123.mp4');
        $video1->setPlayerLoc('https://www.example.com/videoplayer.php?video=123');
        $video1->setDuration(600);
        $video1->setExpirationDate(new DateTime('2021-11-05T19:20:30+08:00'));
        $video1->setRating(4.2);
        $video1->setViewCount(12345);
        $video1->setPublicationDate(new DateTime('2007-11-05T19:20:30+08:00'));
        $video1->setFamilyFriendly(true);
        $video1->setRequiresSubscription(true);
        $video1->setLive(false);

        $video2 = new VideoDOMElement();
        $video2->setThumbnailLoc('https://www.example.com/thumbs/345.jpg');
        $video2->setTitle('Grilling steaks for winter');
        $video2->setDescription('In the freezing cold, Roman shows you how to get perfectly done steaks every time.');
        $video2->setContentLoc('http://streamserver.example.com/video345.mp4');
        $video2->setPlayerLoc('https://www.example.com/videoplayer.php?video=345');

        $url1->setVideos([$video1, $video2]);

        $urlSetDOMElement = new UrlsetDOMElement();
        $urlSetDOMElement->setUrls([$url1]);

        $DOMElements = [$urlSetDOMElement];
        $generator = new BasicGenerator();
        $generator->setDOMElements($DOMElements);

        $xml = $generator->generate();
        $filePath = __DIR__ . '/../Fixtures/urlset_with_videos.xml';
        $this->assertXmlStringEqualsXmlFile($filePath, $xml);
    }
}
