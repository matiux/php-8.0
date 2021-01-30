<?php

declare(strict_types=1);

namespace Tests\PHP80\Attribute\ExampleB;

use PHP80\Attribute\ExampleB\CopyFile;
use PHP80\Attribute\ExampleB\ExecuteAction;
use PHPUnit\Framework\TestCase;
use Tests\Util\Path;

class ExecuteActionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        exec(sprintf('rm -fr %s/Destination', Path::testData()));
    }

    /**
     * @test
     */
    public function copy_file(): void
    {
        $copyAction = new CopyFile();
        $copyAction->fileName = '/var/www/app/tests/Data/a.txt';
        $copyAction->targetDirectory = '/var/www/app/tests/Data/Destination';

        $execute = new ExecuteAction();
        $execute->execute($copyAction);

        self::expectNotToPerformAssertions();
    }
}
