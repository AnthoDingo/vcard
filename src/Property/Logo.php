<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Formatter\Property\LogoFormatter;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Parser\Property\LogoParser;
use AnthoDingo\VCard\Property\Value\ImageValue;

final class Logo extends ImageValue implements PropertyInterface, NodeInterface
{
    public function getFormatter(): NodeFormatterInterface
    {
        return new LogoFormatter($this);
    }

    public static function getNode(): string
    {
        return 'LOGO';
    }

    public static function getParser(): NodeParserInterface
    {
        return new LogoParser();
    }

    public function isAllowedMultipleTimes(): bool
    {
        return false;
    }
}
