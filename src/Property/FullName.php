<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

use AnthoDingo\VCard\Formatter\Property\FullNameFormatter;
use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Parser\Property\FullNameParser;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Property\Value\StringValue;

final class FullName extends StringValue implements PropertyInterface, SimpleNodeInterface
{
    public function getFormatter(): NodeFormatterInterface
    {
        return new FullNameFormatter($this);
    }

    public static function getNode(): string
    {
        return 'FN';
    }

    public static function getParser(): NodeParserInterface
    {
        return new FullNameParser();
    }

    public function isAllowedMultipleTimes(): bool
    {
        return false;
    }
}
