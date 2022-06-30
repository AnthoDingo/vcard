<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser\Property\Parameter;

use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Property\NodeInterface;
use AnthoDingo\VCard\Property\Parameter\Kind;

final class KindParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        return new Kind($value);
    }
}
