<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Formatter\Property\UrlFormatter;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Parser\Property\UrlParser;
use AnthoDingo\VCard\Property\Value\StringValue;

final class Url extends StringValue implements PropertyInterface, SimpleNodeInterface
{
    public function getFormatter(): NodeFormatterInterface
    {
        return new UrlFormatter($this);
    }

    public static function getNode(): string
    {
        return 'URL';
    }

    public static function getParser(): NodeParserInterface
    {
        return new UrlParser();
    }

    public function isAllowedMultipleTimes(): bool
    {
        return false;
    }
}
