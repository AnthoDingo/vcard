<?php

declare(strict_types=1);

namespace AnthoDingo\Tests\VCard\Property;

use AnthoDingo\VCard\Property\Address;
use AnthoDingo\VCard\Property\Email;
use AnthoDingo\VCard\Property\Gender;
use AnthoDingo\VCard\Property\Name;
use PHPUnit\Framework\TestCase;

/**
 * How to execute all tests: `vendor/bin/phpunit tests`
 */
final class PropertyTest extends TestCase
{
    /**
     * @expectedException \AnthoDingo\VCard\Exception\PropertyException
     * @expectedExceptionMessage The property you are trying to add is empty.
     */
    public function testEmptyName(): void
    {
        new Name();
    }

    /**
     * @expectedException \AnthoDingo\VCard\Exception\PropertyException
     * @expectedExceptionMessage The property you are trying to add is empty.
     */
    public function testEmptyAddress(): void
    {
        new Address();
    }

    /**
     * @expectedException \AnthoDingo\VCard\Exception\PropertyException
     * @expectedExceptionMessage The property you are trying to add is empty.
     */
    public function testEmptyEmail(): void
    {
        new Email();
    }

    /**
     * @expectedException \AnthoDingo\VCard\Exception\PropertyException
     * @expectedExceptionMessage The property you are trying to add is empty.
     */
    public function testEmptyGender(): void
    {
        new Gender();
    }
}
