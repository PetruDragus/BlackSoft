<?php

namespace App\Exports;

use App\Vehicle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VehiclesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vehicle::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Driver',
            'Plate',
            'Model',
            'Bussiness Type',
        ];
    }
}
