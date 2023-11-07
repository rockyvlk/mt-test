<?php

declare(strict_types=1);

namespace App\Console;

use App\Services\CarsImport\Car\Car;
use App\Services\CarsImport\Car\SpecMachine;
use App\Services\CarsImport\Car\Truck;
use App\Services\CarsImport\CarsImporterInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[
    AsCommand('import')
]
final class Import extends Command
{
    public function __construct(
        private CarsImporterInterface $carParser,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument(
                'filepath',
                InputArgument::REQUIRED,
                'Parse file path'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $filePath = $input->getArgument('filepath');

        $cars = [];
        foreach ($this->carParser->getCarList($filePath) as $car) {
            $cars[] = [
                $car->carType->value,
                $car->brand->value,
                $car instanceof Car ? $car->passengerSeatsCount : null,
                $car->photo->fileName,
                $car->getPhotoFileExt(),
                $car instanceof Truck ? $car->getBodyVolume() : null,
                $car->carrying,
                $car instanceof SpecMachine ? $car->extra : null
            ];
        }

        if($cars) {
            $table = new Table($output);
            $table
                ->setHeaders([
                    'Тип',
                    'Марка',
                    'Кол-во пассажирских мест',
                    'Фото',
                    'Объём кузова',
                    'Грузоподъемность',
                    'Дополнительно'
                ])
                ->setRows($cars)
                ->render();
        }

        return Command::SUCCESS;
    }
}



