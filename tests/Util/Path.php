<?php

declare(strict_types=1);

namespace Tests\Util;

use Psalm\Pure;

class Path
{
    #[Pure]
    public static function test(): string
    {
        return realpath(__DIR__.'/..');
    }

    public static function testData(): string
    {
        return self::test().'/Data';
    }
}
