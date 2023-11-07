<?php

declare(strict_types=1);

namespace App\Services\CarsImport\Exception;

final class InvalidCarTypeException extends \RuntimeException
{
    public function __construct(string $carType)
    {
        parent::__construct(sprintf('Invalid car type %s', $carType));
    }
}
