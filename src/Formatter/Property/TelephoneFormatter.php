<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Formatter\Property;

use AnthoDingo\VCard\Property\Telephone;

final class TelephoneFormatter implements NodeFormatterInterface
{
    /** @var Telephone */
    protected $telephone;

    public function __construct(Telephone $telephone)
    {
        $this->telephone = $telephone;
    }

    public function getVcfString(): string
    {
        return $this->telephone->getNode() .
            ';VALUE=' .  $this->telephone->getValue()->__toString() .
            ';TYPE=' . $this->telephone->getType()->__toString() .
            ':tel:' . $this->telephone->getTelephoneNumber();
    }
}
