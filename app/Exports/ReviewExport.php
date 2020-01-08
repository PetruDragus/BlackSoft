<?php

namespace App\Exports;

use App\Review;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReviewExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Review::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Driver',
            'Booking',
            'Review',
            'Rating',
            'Customer',
            'Created At',
            'Updated At'
        ];
    }
}
