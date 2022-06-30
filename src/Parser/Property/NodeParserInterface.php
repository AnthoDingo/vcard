<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser\Property;

use AnthoDingo\VCard\Property\NodeInterface;

interface NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface;
}
