<?php

declare(strict_types=1);

namespace AnthoDingo\VCard\Formatter\Property;

use AnthoDingo\VCard\Property\SimpleNodeInterface;

class SimpleNodeFormatter extends NodeFormatter implements NodeFormatterInterface
{
    /** @var SimpleNodeInterface */
    protected $node;

    public function __construct(SimpleNodeInterface $node)
    {
        $this->node = $node;
    }

    public function getVcfString(): string
    {
        return $this->node->getNode() . ':' . $this->escape($this->node->__toString());
    }
}
