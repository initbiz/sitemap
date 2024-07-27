<?php

declare(strict_types=1);

namespace Initbiz\Sitemap\Values;

enum Changefreq: string
{
    case always = 'always';
    case hourly = 'hourly';
    case daily = 'daily';
    case weekly = 'weekly';
    case monthly = 'monthly';
    case yearly = 'yearly';
    case never = 'never';
}
