<?php

declare(strict_types=1);

namespace PHP80\Attribute\ExampleA;

use Attribute;

#[Attribute]
class ListensTo
{
    public function __construct(
        public string $event
    ) {
    }
}
