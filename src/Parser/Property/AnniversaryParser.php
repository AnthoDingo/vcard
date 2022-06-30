<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser\Property;

use AnthoDingo\VCard\Property\Anniversary;
use AnthoDingo\VCard\Property\NodeInterface;

final class AnniversaryParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        return new Anniversary(new \DateTime($value));
    }
}
