<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser\Property;

use AnthoDingo\VCard\Property\Birthdate;
use AnthoDingo\VCard\Property\NodeInterface;

final class BirthdateParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        return new Birthdate(new \DateTime($value));
    }
}
