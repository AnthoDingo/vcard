<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser\Property;

use AnthoDingo\VCard\Property\Email;
use AnthoDingo\VCard\Property\NodeInterface;
use AnthoDingo\VCard\Property\Parameter\Type;

final class EmailParser extends PropertyParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        $email = new Email($value);

        if (array_key_exists(Type::getNode(), $parameters)) {
            $email->setType($parameters[Type::getNode()]);
        }

        return $email;
    }
}
