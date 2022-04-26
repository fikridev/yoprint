<?php

namespace App\Imports;

use App\Events\ImportCsvQueue;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrderImport implements ToModel, WithHeadingRow,WithChunkReading,ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Order([
            'product_title' => $row['product_title'],
            'product_description' => $row['product_description'],
            'style#' => $row['style'],
            'sanmar_mainframe_color' => $row['sanmar_mainframe_color'],
            'size' => $row['size'],
            'color_name' => $row['color_name'],
            'piece_price' => $row['piece_price'],
        ]);

    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
