<?php

declare(strict_types=1);

namespace App\Services\CarsImport\Car;

final class Body
{
    public function __construct(
        private float $length,
        private float $width,
        private float $height,
    ) {
    }

    public static function createFromString(string $bodyWhl): self
    {
        [$length, $width, $height] = array_pad(explode('x', $bodyWhl), 3, 0);

        return new Body(
            (float) $length,
            (float) $width,
            (float) $height,
        );
    }

    public function getVolume(): float
    {
        return $this->length * $this->width * $this->height;
    }
}
