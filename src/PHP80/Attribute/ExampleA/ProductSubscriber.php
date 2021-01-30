<?php

declare(strict_types=1);

namespace PHP80\Attribute\ExampleA;

class ProductSubscriber
{
    #[ListensTo(ProductCreated::class)]
    public function onProductCreated(ProductCreated $event): void
    {
        $this->doSomething();
    }

    #[ListensTo(ProductDeleted::class)]
    public function onProductDeleted(ProductDeleted $event): void
    {
        $this->doSomething();
    }

    private function doSomething(): void
    {
    }
}
