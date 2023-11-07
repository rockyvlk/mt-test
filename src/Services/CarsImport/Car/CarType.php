<?php

declare(strict_types=1);

namespace App\Services\CarsImport\Car;

enum CarType: string
{
    case Car = 'car';
    case Truck = 'truck';
    case SpecMachine = 'spec_machine';
}
