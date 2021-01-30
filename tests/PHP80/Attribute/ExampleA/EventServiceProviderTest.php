<?php

declare(strict_types=1);

namespace Tests\PHP80\Attribute\ExampleA;

use PHP80\Attribute\ExampleA\EventDispatcher;
use PHP80\Attribute\ExampleA\EventServiceProvider;
use PHPUnit\Framework\TestCase;

class EventServiceProviderTest extends TestCase
{
    /**
     * @test
     */
    public function register_providers(): void
    {
        $s = new EventServiceProvider(new EventDispatcher());
        $s->register();

        self::expectNotToPerformAssertions();
    }
}
