<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser\Property;

use AnthoDingo\VCard\Property\NodeInterface;
use AnthoDingo\VCard\Property\Telephone;
use AnthoDingo\VCard\Property\Parameter\Type;
use AnthoDingo\VCard\Property\Parameter\Value;

final class TelephoneParser extends PropertyParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        $telephone = new Telephone(str_replace('tel:', '', $value));

        if (array_key_exists(Type::getNode(), $parameters)) {
            $telephone->setType($parameters[Type::getNode()]);
        }

        if (array_key_exists(Value::getNode(), $parameters)) {
            $telephone->setValue($parameters[Value::getNode()]);
        }

        return $telephone;
    }
}
