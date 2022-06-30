<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Formatter\Property;

use AnthoDingo\VCard\Property\Gender;

final class GenderFormatter extends NodeFormatter implements NodeFormatterInterface
{
    /** @var Gender */
    protected $gender;

    public function __construct(Gender $gender)
    {
        $this->gender = $gender;
    }

    public function getVcfString(): string
    {
        $string = $this->gender::getNode() . ':' . $this->gender->getValue();

        if ($this->gender->hasNote()) {
            $string .= ';' . $this->gender->getNote();
        }

        return $string;
    }
}
