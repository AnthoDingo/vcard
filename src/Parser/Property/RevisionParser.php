<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser\Property;

use AnthoDingo\VCard\Property\NodeInterface;
use AnthoDingo\VCard\Property\Parameter\Revision;

final class RevisionParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        return new Revision(new \DateTime($value));
    }
}
