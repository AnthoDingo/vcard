<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser\Property;

use AnthoDingo\VCard\Property\Role;
use AnthoDingo\VCard\Property\NodeInterface;

final class RoleParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        return new Role($value);
    }
}
