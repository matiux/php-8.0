<?php

declare(strict_types=1);

namespace PHP80\Attribute\ExampleB;

use ReflectionObject;

class ExecuteAction
{
    public function execute(Action $actionToExecute): void
    {
        $reflection = new ReflectionObject($actionToExecute);

        foreach ($reflection->getMethods() as $method) {
            $attributes = $method->getAttributes(SetUp::class);

            if (count($attributes) > 0) {
                $methodName = $method->getName();

                $actionToExecute->{$methodName}();
            }
        }

        $actionToExecute->execute();
    }
}
