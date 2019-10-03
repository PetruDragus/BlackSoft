<?php

namespace App\Exports;

use App\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Contact::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Address',
            'Email',
            'Phone',
            'Notes',
            'Created At',
            'Updated At'
        ];
    }
}
