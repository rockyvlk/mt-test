<?php

declare(strict_types=1);

namespace App\Services\CarsImport\Car;

use Webmozart\Assert\Assert;

final readonly class Photo
{
    private const EXT = ['jpeg', 'jpg', 'png', 'webp'];

    public function __construct(
        public string $fileName,
    ) {
        Assert::regex(
            $this->fileName,
            sprintf(
                '/\w+.(%s)/',
                implode('|', self::EXT)
            )
        );
    }

    public function getFileExt(): string
    {
        [$name, $ext] = explode('.', $this->fileName);
        return $ext;
    }
}
