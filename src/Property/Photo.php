<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Formatter\Property\PhotoFormatter;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Parser\Property\PhotoParser;
use AnthoDingo\VCard\Property\Value\ImageValue;

final class Photo extends ImageValue implements PropertyInterface, NodeInterface
{
    public function getFormatter(): NodeFormatterInterface
    {
        return new PhotoFormatter($this);
    }

    public static function getNode(): string
    {
        return 'PHOTO';
    }

    public static function getParser(): NodeParserInterface
    {
        return new PhotoParser();
    }

    public function isAllowedMultipleTimes(): bool
    {
        return false;
    }
}
