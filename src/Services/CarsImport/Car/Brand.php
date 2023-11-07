<?php

declare(strict_types=1);

namespace App\Services\CarsImport\Car;

use Webmozart\Assert\Assert;

final readonly class Brand
{
    public function __construct(
        public string $value,
    ) {
        Assert::notEmpty($this->value);
    }
}
