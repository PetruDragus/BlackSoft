<?php

namespace App\Exports;

use App\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class BookingsExport implements FromQuery, WithMapping
{

    public function query()
    {
        $booking = Booking::query()->with('driver');
    }

    /**
     * @var Invoice $invoice
     */
    public function map($booking): array
    {
        return [
            $booking->invoice_number,
            $booking->driver->name,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Driver',
            'Email',
            'Twitter',
        ];
    }
}
