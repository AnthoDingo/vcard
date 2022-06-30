<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

use AnthoDingo\VCard\Formatter\Property\NoteFormatter;
use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Parser\Property\NoteParser;
use AnthoDingo\VCard\Property\Value\StringValue;

final class Note extends StringValue implements PropertyInterface, SimpleNodeInterface
{
    public function getFormatter(): NodeFormatterInterface
    {
        return new NoteFormatter($this);
    }

    public static function getNode(): string
    {
        return 'NOTE';
    }

    public static function getParser(): NodeParserInterface
    {
        return new NoteParser();
    }

    public function isAllowedMultipleTimes(): bool
    {
        return false;
    }
}
