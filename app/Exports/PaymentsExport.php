<?php

namespace App\Exports;

use App\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Payment::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Date',
            'Invoice',
            'Contact',
            'Amount',
            'Status',
            'Created At',
            'Updated At'
        ];
    }
}
