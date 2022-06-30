<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Parser;

use AnthoDingo\VCard\VCard;

interface ParserInterface
{
    /**
     * @param string $content
     * @return VCard[]
     */
    public function getVCards(string $content): array;
}
