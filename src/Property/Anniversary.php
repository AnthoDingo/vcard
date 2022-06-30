<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

use AnthoDingo\VCard\Formatter\Property\AnniversaryFormatter;
use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Parser\Property\AnniversaryParser;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Property\Value\DateTimeOrStringValue;

final class Anniversary extends DateTimeOrStringValue implements PropertyInterface, SimpleNodeInterface
{
    public function getFormatter(): NodeFormatterInterface
    {
        return new AnniversaryFormatter($this);
    }

    public static function getNode(): string
    {
        return 'ANNIVERSARY';
    }

    public static function getParser(): NodeParserInterface
    {
        return new AnniversaryParser();
    }

    public function isAllowedMultipleTimes(): bool
    {
        return false;
    }
}
