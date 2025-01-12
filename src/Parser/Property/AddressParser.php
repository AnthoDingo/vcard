<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser\Property;

use AnthoDingo\VCard\Property\Address;
use AnthoDingo\VCard\Property\NodeInterface;
use AnthoDingo\VCard\Property\Parameter\Type;

final class AddressParser extends PropertyParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        $address = $this->parseAddress($value);

        if (array_key_exists(Type::getNode(), $parameters)) {
            $address->setType($parameters[Type::getNode()]);
        }

        return $address;
    }

    private function parseAddress(string $value): Address
    {
        @list(
            $postOfficeBox,
            $extendedAddress,
            $streetAddress,
            $locality,
            $region,
            $postalCode,
            $countryName
        ) = explode(';', $value);

        $this->convertEmptyStringToNull([
            $postOfficeBox,
            $extendedAddress,
            $streetAddress,
            $locality,
            $region,
            $postalCode,
            $countryName
        ]);

        return new Address($postOfficeBox, $extendedAddress, $streetAddress, $locality, $region, $postalCode, $countryName);
    }
}
