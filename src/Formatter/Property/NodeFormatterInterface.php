<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Formatter\Property;

interface NodeFormatterInterface
{
    public function getVcfString(): string;
}
