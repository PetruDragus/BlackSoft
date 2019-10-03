<?php

namespace App\Exports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Invoice::all();
    }

    public function headings(): array
    {
        return [
            '# ID',
            'Number',
            'Customer',
            'Date',
            'Due Date',
            'Reference',
            'Status',
            'Terms And Conditions',
            'Sub Total',
            'Discount',
            'Total',
            'Created At',
            'Updated At'
        ];
    }
}
