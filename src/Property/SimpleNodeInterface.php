<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Property;

interface SimpleNodeInterface extends NodeInterface
{
    public function __toString(): string;
}
