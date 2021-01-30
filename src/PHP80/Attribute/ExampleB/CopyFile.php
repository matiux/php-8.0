<?php

declare(strict_types=1);

namespace PHP80\Attribute\ExampleB;

use RuntimeException;

/**
 * @psalm-suppress MissingConstructor
 */
class CopyFile implements Action
{
    public string $fileName;
    public string $targetDirectory;

    #[SetUp]
    public function fileExists(): void
    {
        if (!file_exists($this->fileName)) {
            throw new RuntimeException('File does not exist');
        }
    }

    #[SetUp]
    public function targetDirectoryExists(): void
    {
        mkdir($this->targetDirectory);
    }

    public function execute(): void
    {
        copy($this->fileName, $this->targetDirectory.'/'.basename($this->fileName));
    }
}
