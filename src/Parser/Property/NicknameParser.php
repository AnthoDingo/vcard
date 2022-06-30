<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser\Property;

use AnthoDingo\VCard\Property\Nickname;
use AnthoDingo\VCard\Property\NodeInterface;

final class NicknameParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        return new Nickname($value);
    }
}
