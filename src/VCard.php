<?php

declare(strict_types=1);

namespace AnthoDingo\VCard;

use AnthoDingo\VCard\Exception\VCardException;
use AnthoDingo\VCard\Property\Address;
use AnthoDingo\VCard\Property\Anniversary;
use AnthoDingo\VCard\Property\Birthdate;
use AnthoDingo\VCard\Property\Email;
use AnthoDingo\VCard\Property\FullName;
use AnthoDingo\VCard\Property\Gender;
use AnthoDingo\VCard\Property\Logo;
use AnthoDingo\VCard\Property\Name;
use AnthoDingo\VCard\Property\Nickname;
use AnthoDingo\VCard\Property\NodeInterface;
use AnthoDingo\VCard\Property\Note;
use AnthoDingo\VCard\Property\Parameter\Kind;
use AnthoDingo\VCard\Property\Parameter\PropertyParameterInterface;
use AnthoDingo\VCard\Property\Parameter\Revision;
use AnthoDingo\VCard\Property\Parameter\Type;
use AnthoDingo\VCard\Property\Parameter\Version;
use AnthoDingo\VCard\Property\Photo;
use AnthoDingo\VCard\Property\PropertyInterface;
use AnthoDingo\VCard\Property\Role;
use AnthoDingo\VCard\Property\Telephone;
use AnthoDingo\VCard\Property\Title;
use AnthoDingo\VCard\Property\Url;

final class VCard
{
    public const POSSIBLE_VALUES = [
        // All possible property parameters
        Version::class,
        Revision::class,
        Kind::class,
        Type::class,
        // All possible properties
        Name::class,
        FullName::class,
        Address::class,
        Note::class,
        Gender::class,
        Nickname::class,
        Title::class,
        Role::class,
        Birthdate::class,
        Anniversary::class,
        Email::class,
        Photo::class,
        Logo::class,
        Telephone::class,
        Url::class,
    ];

    private const ONLY_APPLY_TO_INDIVIDUAL_KIND = [
        Birthdate::class,
        Anniversary::class,
        Gender::class,
    ];

    /** @var PropertyParameterInterface[] */
    private $parameters = [];

    /** @var PropertyInterface[] */
    private $properties = [];

    /**
     * @param Kind|null $kind
     * @param Version|null $version
     * @throws VCardException
     */
    public function __construct(Kind $kind = null, Version $version = null)
    {
        $this->add($version ?? Version::version4());
        $this->add($kind ?? Kind::individual());
    }

    /**
     * @param NodeInterface $node
     * @return VCard
     * @throws VCardException
     */
    public function add(NodeInterface $node): self
    {
        if (!in_array(get_class($node), self::POSSIBLE_VALUES, true)) {
            throw VCardException::forNotSupportedNode($node);
        }

        switch (true) {
            case $node instanceof PropertyInterface:
                $this->addProperty($node);
                break;
            case $node instanceof PropertyParameterInterface:
                $this->addPropertyParameter($node);
                break;
        }

        return $this;
    }

    /**
     * @param PropertyInterface $property
     * @throws VCardException
     */
    private function addProperty(PropertyInterface $property): void
    {
        // Property is not allowed multiple times
        if (!$property->isAllowedMultipleTimes() && $this->hasProperty(get_class($property))) {
            throw VCardException::forExistingProperty($property);
        }

        if (!$this->getKind()->isIndividual() && $this->isAllowedIndividualKindProperty(get_class($property))) {
            throw VCardException::forNotAllowedPropertyOnVCardKind($property, Kind::individual());
        }

        $this->properties[] = $property;
    }

    /**
     * @param PropertyParameterInterface $propertyParameter
     * @throws VCardException
     */
    private function addPropertyParameter(PropertyParameterInterface $propertyParameter): void
    {
        // Parameter is not allowed multiple times
        if ($this->hasParameter(get_class($propertyParameter))) {
            throw VCardException::forExistingPropertyParameter($propertyParameter);
        }

        $this->parameters[] = $propertyParameter;
    }

    public function getKind(): Kind
    {
        $kind = $this->getParameters(Kind::class);

        return reset($kind);
    }

    public function getParameters(string $filterByPropertyParameterClass = null): array
    {
        if ($filterByPropertyParameterClass === null) {
            $array = $this->parameters;
            $found = $others = [];
            foreach ($array as $value) {
                if ($value instanceof Version) {
                    $found[] = $value;
                } else {
                    $others[] = $value;
                }
            }
            $array = array_merge($found, $others);
            $this->parameters = $array;

            return $this->parameters;
        }

        return array_filter($this->parameters, function (PropertyParameterInterface $parameter) use ($filterByPropertyParameterClass) {
            return $parameter instanceof $filterByPropertyParameterClass;
        });
    }

    public function getProperties(string $forPropertyClass = null): array
    {
        if ($forPropertyClass === null) {
            return $this->properties;
        }

        return array_filter($this->properties, function (PropertyInterface $property) use ($forPropertyClass) {
            return $property instanceof $forPropertyClass;
        });
    }

    public function hasParameter(string $forParameterClass): bool
    {
        return count($this->getParameters($forParameterClass)) > 0;
    }

    public function hasProperty(string $forPropertyClass): bool
    {
        return count($this->getProperties($forPropertyClass)) > 0;
    }

    private function isAllowedIndividualKindProperty(string $propertyClass): bool
    {
        return in_array($propertyClass, self::ONLY_APPLY_TO_INDIVIDUAL_KIND, true);
    }
}
