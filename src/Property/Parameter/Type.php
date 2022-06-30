<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property\Parameter;

use AnthoDingo\VCard\Exception\PropertyParameterException;
use AnthoDingo\VCard\Formatter\Property\NodeFormatterInterface;
use AnthoDingo\VCard\Formatter\Property\Parameter\TypeFormatter;
use AnthoDingo\VCard\Parser\Property\NodeParserInterface;
use AnthoDingo\VCard\Parser\Property\Parameter\TypeParser;
use AnthoDingo\VCard\Property\SimpleNodeInterface;

final class Type implements PropertyParameterInterface, SimpleNodeInterface
{
    protected const HOME = 'home';
    protected const WORK = 'work';

    public const POSSIBLE_VALUES = [
        self::HOME,
        self::WORK,
    ];

    private $value;

    /**
     * @param string $value
     * @throws PropertyParameterException
     */
    public function __construct(string $value)
    {
        if (!in_array($value, self::POSSIBLE_VALUES, true)) {
            throw PropertyParameterException::forWrongValue($value, self::POSSIBLE_VALUES);
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function getFormatter(): NodeFormatterInterface
    {
        return new TypeFormatter($this);
    }

    public static function getNode(): string
    {
        return 'TYPE';
    }

    public static function getParser(): NodeParserInterface
    {
        return new TypeParser();
    }

    public static function home(): self
    {
        return new self(self::HOME);
    }

    public function isHome(): bool
    {
        return $this->value === self::HOME;
    }

    public static function work(): self
    {
        return new self(self::WORK);
    }

    public function isWork(): bool
    {
        return $this->value === self::WORK;
    }
}
