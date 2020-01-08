<?php

namespace App\Exports;

use App\ContactForm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactFormsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ContactForm::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Subject',
            'Message',
            'Created At',
            'Updated At'
        ];
    }
}
