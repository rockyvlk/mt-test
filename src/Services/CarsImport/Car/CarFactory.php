<?php

declare(strict_types=1);

namespace App\Services\CarsImport\Car;

use App\Services\CarsImport\Exception\InvalidCarTypeException;

final class CarFactory
{
    public function create(array $row): BaseCar
    {
        $carType = CarType::from($row['car_type']);
        $photo = new Photo($row['photo_file_name']);
        $brand = new Brand($row['brand']);
        $carrying = (float) $row['carrying'];

        return match ($carType) {
            CarType::Car =>  new Car(
                $photo,
                $brand,
                $carrying,
                (int) $row['passenger_seats_count']
            ),
            CarType::Truck =>  new Truck(
                $photo,
                $brand,
                $carrying,
                Body::createFromString($row['body_whl'])
            ),
            CarType::SpecMachine =>  new SpecMachine(
                $photo,
                $brand,
                $carrying,
                $row['extra']
            ),
            default => throw new InvalidCarTypeException($carType->value)
        };
    }
}
