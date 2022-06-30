<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Formatter\Property;

use AnthoDingo\VCard\Property\Photo;

final class PhotoFormatter extends NodeFormatter implements NodeFormatterInterface
{
    /** @var Photo */
    protected $photo;

    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }

    public function getVcfString(): string
    {
        return $this->photo::getNode() . ':' . $this->photo->getValue();
    }
}
