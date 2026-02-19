@extends('layouts.admin')

@section('content')
<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-teal-600">
            Attendance Report
        </h2>

        <a href="{{ route('reports.attendance.export') }}"
           class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Export Attendance (Excel)
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Student</th>
                    <th class="border px-4 py-2">Date</th>
                    <th class="border px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $attendance)
                    <tr>
                        <td class="border px-4 py-2">
                            {{ $attendance->id }}
                        </td>

                        <td class="border px-4 py-2">
                            {{ $attendance->student->name ?? 'N/A' }}
                        </td>

                        <td class="border px-4 py-2">
                            {{ $attendance->date }}
                        </td>

                        <td class="border px-4 py-2">
                            <span class="px-2 py-1 rounded text-white
                                {{ $attendance->status == 'present' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ ucfirst($attendance->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">
                            No attendance records found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
