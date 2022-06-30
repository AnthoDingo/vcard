<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

interface PropertyInterface
{
    public function isAllowedMultipleTimes(): bool;
}
