<?php

namespace Initbiz\Sitemap\Tests\Functional;

use Initbiz\Sitemap\DOMElements\ImageDOMElement;
use PHPUnit\Framework\TestCase;
use Initbiz\Sitemap\Generators\BasicGenerator;
use Initbiz\Sitemap\DOMElements\SitemapDOMElement;
use Initbiz\Sitemap\DOMElements\SitemapIndexDOMElement;
use Initbiz\Sitemap\DOMElements\UrlsetDOMElement;
use Initbiz\Sitemap\DOMElements\UrlDOMElement;

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
        $url1->setloc('https://www.example.com/foo.html');
        $url1->setlastmod('2022-06-04');
        $url1->setpriority('1.0');
        $url1->setchangefreq('always');

        $url2 = new UrlDOMElement();
        $url2->setloc('https://www.example.com/foo2.html');
        $url2->setlastmod('2022-06-04');
        $url2->setpriority('0.9');

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
}
