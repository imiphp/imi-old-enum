<?php

declare(strict_types=1);

namespace Imi\Enum\Test;

use Imi\Enum\Test\Enum\TestEnum;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @testdox Enum
 */
class EnumTest extends TestCase
{
    public function test(): void
    {
        $data = TestEnum::getData(TestEnum::A);
        Assert::assertEquals('甲', $data['text'] ?? null);

        Assert::assertEquals('B', TestEnum::getName(TestEnum::B));
        Assert::assertEquals([
            'A',
            'B',
            'C',
        ], TestEnum::getNames());
        Assert::assertEquals([
            TestEnum::A,
            TestEnum::B,
            TestEnum::C,
        ], TestEnum::getValues());

        Assert::assertEquals('丙', TestEnum::getText(TestEnum::C));
        Assert::assertEquals(TestEnum::B, TestEnum::getValue('B'));
        Assert::assertEquals([
            'A' => TestEnum::A,
            'B' => TestEnum::B,
            'C' => TestEnum::C,
        ], TestEnum::getMap());

        Assert::assertTrue(TestEnum::validate(TestEnum::A));
        Assert::assertFalse(TestEnum::validate(9527));
        TestEnum::assert(TestEnum::A);
        $this->expectException(\InvalidArgumentException::class);
        TestEnum::assert(9527);
    }
}
