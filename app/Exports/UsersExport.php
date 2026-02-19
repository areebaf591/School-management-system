<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    // DATA JO EXCEL ME JAYEGA
    public function collection()
    {
        return User::select('id', 'name', 'email', 'status')
            ->orderBy('id', 'asc')
            ->get();
    }

    // EXCEL HEADINGS
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Status',
        ];
    }
}
