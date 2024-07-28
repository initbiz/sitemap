# Sitemap

PHP library to build object oriented sitemap generator.

The package is still a work in progress so PRs are welcomed.

You have to write your own generator (I'd suggest using `AbstractGenerator` as a base) and it has to return an array
containing DOMElements to include to the XML.

You can also use `BasicGenerator` but it's limited and built mostly for testing purposes.

## Usage examples

Below you can find a few examples of usage of this library.

### Typical sitemap containing URLs

```php
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
```

```xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
  <url>
    <loc>https://www.example.com/foo.html</loc>
    <lastmod>2022-06-04T00:00:00+00:00</lastmod>
    <changefreq>always</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc>https://www.example.com/foo2.html</loc>
    <lastmod>2022-06-04T00:00:00+00:00</lastmod>
    <priority>0.9</priority>
  </url>
</urlset>
```

### Images sitemap

Code below will generate the following XML:

```php
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
```

```xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
  <url>
    <loc>https://example.com/sample1.html</loc>
    <image:image>
      <image:loc>https://example.com/image.jpg</image:loc>
    </image:image>
    <image:image>
      <image:loc>https://example.com/photo.jpg</image:loc>
    </image:image>
  </url>
  <url>
    <loc>https://example.com/sample2.html</loc>
    <image:image>
      <image:loc>https://example.com/picture.jpg</image:loc>
    </image:image>
  </url>
</urlset>
```

### Sitemap index

```php
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
```

```xml
<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <sitemap>
    <loc>https://www.example.com/sitemap1.xml.gz</loc>
  </sitemap>
  <sitemap>
    <loc>https://www.example.com/sitemap2.xml.gz</loc>
  </sitemap>
</sitemapindex>
```
