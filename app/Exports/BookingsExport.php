<?php

namespace App\Exports;

use App\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class BookingsExport implements FromCollection, WithMapping, WithHeadings
{

    public function collection()
    {
        return Booking::with('customer', 'driver')->orderBy('id', 'DESC')->get();
    }

    public function map($booking): array
    {
        return [
            $booking->id,
            $booking->number,
            $booking->type,
            $booking->date,
            $booking->pickup_hour . $booking->pickup_min,
            $booking->customer->name,
            $booking->vehicle->make . ' ' .$booking->vehicle->model,
            $booking->driver->name,
            $booking->pickup_address,
            $booking->drop_address,
            $booking->flight_number,
            'km' . ' ' . $booking->distance,
            $booking->price . ' ' . '€',
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Number',
            'Type',
            'Pickup Date',
            'Pickup Time',
            'Customer',
            'Vehicle',
            'Driver',
            'From',
            'To',
            'Flight Number',
            'Distance',
            'Price',
        ];
    }
}
