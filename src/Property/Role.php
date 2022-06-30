<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

use AnthoDingo\VCard\Formatter\Property\RoleFormatter;
use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Parser\Property\RoleParser;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Property\Value\StringValue;

final class Role extends StringValue implements PropertyInterface, SimpleNodeInterface
{
    public function getFormatter(): NodeFormatterInterface
    {
        return new RoleFormatter($this);
    }

    public static function getNode(): string
    {
        return 'ROLE';
    }

    public static function getParser(): NodeParserInterface
    {
        return new RoleParser();
    }

    public function isAllowedMultipleTimes(): bool
    {
        return false;
    }
}
