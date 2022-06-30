<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser\Property\Parameter;

use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Property\NodeInterface;
use AnthoDingo\VCard\Property\Parameter\Value;

final class ValueParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        return new Value($value);
    }
}
