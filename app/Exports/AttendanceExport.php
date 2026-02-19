<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Attendance::with('student')->get()->map(function($att){
            return [
                'ID'       => $att->id,
                'Student'  => $att->student->name ?? 'N/A',
                'Date'     => $att->date,
                'Status'   => $att->present ? 'Present' : 'Absent',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Student Name',
            'Date',
            'Status'
        ];
    }
}
