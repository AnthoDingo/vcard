<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

use AnthoDingo\VCard\Formatter\Property\BirthdateFormatter;
use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Parser\Property\BirthdateParser;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Property\Value\DateTimeOrStringValue;

final class Birthdate extends DateTimeOrStringValue implements PropertyInterface, SimpleNodeInterface
{
    public function getFormatter(): NodeFormatterInterface
    {
        return new BirthdateFormatter($this);
    }

    public static function getNode(): string
    {
        return 'BDAY';
    }

    public static function getParser(): NodeParserInterface
    {
        return new BirthdateParser();
    }

    public function isAllowedMultipleTimes(): bool
    {
        return false;
    }
}
