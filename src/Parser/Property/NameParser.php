<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser\Property;

use AnthoDingo\VCard\Property\Name;
use AnthoDingo\VCard\Property\NodeInterface;

final class NameParser extends PropertyParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        @list($firstName, $additional, $lastName, $prefix, $suffix) = explode(';', $value);

        $this->convertEmptyStringToNull([
            $lastName,
            $firstName,
            $additional,
            $prefix,
            $suffix
        ]);

        return new Name($lastName, $firstName, $additional, $prefix, $suffix);
    }
}
