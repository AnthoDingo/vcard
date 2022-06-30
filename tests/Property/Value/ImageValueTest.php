<?php

declare(strict_types=1);

namespace AnthoDingo\Tests\VCard\Property\Value;

use AnthoDingo\VCard\Property\Value\ImageValue;
use PHPUnit\Framework\TestCase;

/**
 * How to execute all tests: `vendor/bin/phpunit tests`
 */
final class ImageValueTest extends TestCase
{
    public function testValidLocalImageUrl(): void
    {
        $image = new ImageValue(__DIR__ . '/../../assets/landscape.jpeg');
        $this->assertTrue($image instanceof ImageValue);
    }

    public function testValidImageContent(): void
    {
        $image = new ImageValue(file_get_contents(__DIR__ . '/../../assets/landscape.jpeg'));
        $this->assertTrue($image instanceof ImageValue);
    }

    public function testValidImageUrl(): void
    {
        $image = new ImageValue('http://www.jeroendesloovere.be/images/my_head.jpg');
        $this->assertTrue($image instanceof ImageValue);
    }

    /**
     * @expectedException \AnthoDingo\VCard\Exception\PropertyException
     * @expectedExceptionMessage The image you have provided is invalid.
     */
    public function testEmptyFile(): void
    {
        new ImageValue(__DIR__ . '/../../assets/emptyfile');
    }

    /**
     * @expectedException \AnthoDingo\VCard\Exception\PropertyException
     * @expectedExceptionMessage The image you have provided is invalid.
     */
    public function testEmptyImage(): void
    {
        new ImageValue(__DIR__ . '/../../assets/empty.jpg');
    }

    /**
     * @expectedException \AnthoDingo\VCard\Exception\PropertyException
     * @expectedExceptionMessage The image you have provided is invalid.
     */
    public function testWrongFile(): void
    {
        new ImageValue(__DIR__ . '/../../assets/wrongfile');
    }
}
