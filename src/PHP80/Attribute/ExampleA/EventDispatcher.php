<?php

declare(strict_types=1);

namespace PHP80\Attribute\ExampleA;

class EventDispatcher
{
    /**
     * @param string $event
     * @param array  $listener
     */
    public function listen(string $event, array $listener): void
    {
        $a = 1;
    }
}
