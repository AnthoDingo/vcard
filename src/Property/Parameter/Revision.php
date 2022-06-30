<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property\Parameter;

use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Formatter\Property\Parameter\RevisionFormatter;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Parser\Property\RevisionParser;
use AnthoDingo\VCard\Property\SimpleNodeInterface;
use AnthoDingo\VCard\Property\Value\DateTimeValue;

final class Revision extends DateTimeValue implements PropertyParameterInterface, SimpleNodeInterface
{
    public function getFormatter(): NodeFormatterInterface
    {
        return new RevisionFormatter($this);
    }

    public static function getNode(): string
    {
        return 'REV';
    }

    public static function getParser(): NodeParserInterface
    {
        return new RevisionParser();
    }
}
