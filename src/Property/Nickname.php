<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

use AnthoDingo\VCard\Formatter\Property\NicknameFormatter;
use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Parser\Property\NicknameParser;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Property\Value\StringValue;

final class Nickname extends StringValue implements PropertyInterface, SimpleNodeInterface
{
    public function getFormatter(): NodeFormatterInterface
    {
        return new NicknameFormatter($this);
    }

    public static function getNode(): string
    {
        return 'NICKNAME';
    }

    public static function getParser(): NodeParserInterface
    {
        return new NicknameParser();
    }

    public function isAllowedMultipleTimes(): bool
    {
        return false;
    }
}
