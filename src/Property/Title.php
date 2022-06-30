<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

use AnthoDingo\VCard\Formatter\Property\TitleFormatter;
use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Parser\Property\TitleParser;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Property\Value\StringValue;

final class Title extends StringValue implements PropertyInterface, SimpleNodeInterface
{
    public function getFormatter(): NodeFormatterInterface
    {
        return new TitleFormatter($this);
    }

    public static function getNode(): string
    {
        return 'TITLE';
    }

    public static function getParser(): NodeParserInterface
    {
        return new TitleParser();
    }

    public function isAllowedMultipleTimes(): bool
    {
        return false;
    }
}
