<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

use AnthoDingo\VCard\Exception\PropertyException;
use AnthoDingo\VCard\Formatter\Property\EmailFormatter;
use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Parser\Property\EmailParser;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Property\Parameter\Type;

final class Email implements PropertyInterface, NodeInterface
{
    /** @var null|string */
    private $email;

    /** @var Type */
    private $type;

    /**
     * @param null|string $email
     * @param Type|null $type
     * @throws PropertyException
     */
    public function __construct(?string $email = null, Type $type = null)
    {
        if ($email === null && $type === null) {
            throw PropertyException::forEmptyProperty();
        }

        $this->email = $email;
        $this->type = $type ?? Type::home();
    }

    public function getFormatter(): NodeFormatterInterface
    {
        return new EmailFormatter($this);
    }

    public static function getNode(): string
    {
        return 'EMAIL';
    }

    public static function getParser(): NodeParserInterface
    {
        return new EmailParser();
    }

    public function isAllowedMultipleTimes(): bool
    {
        return true;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function setType(Type $type)
    {
        $this->type = $type;
    }
}
