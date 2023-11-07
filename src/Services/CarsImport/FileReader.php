<?php

declare(strict_types=1);

namespace App\Services\CarsImport;

use Generator;

final class FileReader
{
    public function __construct(
        public string $storageDir,
    ) {
    }

    public function getRow(string $filePath): Generator
    {
        $path = $this->storageDir . '/' . $filePath;

        if(!$file = @fopen($path, 'r')) {
            return;
        }

        $headers = [];
        $row = 0;
        while (($items = fgetcsv($file, 0, ';')) !== false) {

            if (0 == $row) {
                $headers = $items;
            } elseif(count($headers) === count($items)) {
                yield array_combine($headers, $items);
            }

            $row++;
        }

        fclose($file);
    }
}
