<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser\Property;

use AnthoDingo\VCard\Property\FullName;
use AnthoDingo\VCard\Property\NodeInterface;

final class FullNameParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        return new FullName($value);
    }
}
