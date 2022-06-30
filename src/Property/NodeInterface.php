<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;

interface NodeInterface
{
    public function getFormatter(): NodeFormatterInterface;
    public static function getParser(): NodeParserInterface;
    public static function getNode(): string;
}
