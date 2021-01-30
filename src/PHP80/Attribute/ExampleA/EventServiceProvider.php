<?php

declare(strict_types=1);

namespace PHP80\Attribute\ExampleA;

use ReflectionClass;
use ReflectionException;

class EventServiceProvider
{
    /** @var class-string[] */
    private array $subscribers = [
        ProductSubscriber::class,
    ];

    public function __construct(
        private EventDispatcher $eventDispatcher,
    ) {
    }

    public function register(): void
    {
        foreach ($this->subscribers as $subscriber) {
            /**
             * We'll resolve all listeners registered in the
             * subscriber class, and add them to the dispatcher.
             */
            foreach ($this->resolveListeners($subscriber) as [$event, $listener]) {
                $this->eventDispatcher->listen(
                    event: $event,
                    listener: $listener,
                );
            }
        }
    }

    /**
     * @param class-string $subscriberClass
     *
     * @throws ReflectionException
     *
     * @psalm-return list<array{string, array{string, string}}>
     *
     * @return array
     */
    private function resolveListeners(string $subscriberClass): array
    {
        $reflectionClass = new ReflectionClass($subscriberClass);

        $listeners = [];

        foreach ($reflectionClass->getMethods() as $method) {
            $attributes = $method->getAttributes(ListensTo::class);

            foreach ($attributes as $attribute) {
                $attributeName = $attribute->getName();
                $attributeArguments = $attribute->getArguments();

                $listener = $attribute->newInstance();

                $listeners[] = [
                    // The event that's configured on the attribute
                    $listener->event,

                    // The listener for this event
                    [$subscriberClass, $method->getName()],
                ];
            }
        }

        return $listeners;
    }
}
