<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EmployeesExport implements FromCollection, WithHeadings, WithEvents, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Employee::select(
            'identity_id',
            'badge_id',
            'request_type',
            'full_name',
            'nick_name',
            'birth_date',
            'birth_place',
            'gender',
            'marital_status',
            'skill_category',
            'category_id',
            'category_code_id',
            'nationality',
            'email',
            'country_code',
            'phone_number',
            'start_date',
            'end_date',
            'company',
            'status',
            'address'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Identity ID',
            'Badge ID',
            'Request Type',
            'Full Name',
            'Nick Name',
            'Birth Date',
            'Birth Place',
            'Gender',
            'Marital Status',
            'Skill Category',
            'Category ID',
            'Category Code ID',
            'Nationality',
            'Email',
            'Country Code',
            'Phone Number',
            'Start Date',
            'End Date',
            'Company',
            'Status',
            'Address'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function ($event) {

                $event->sheet->insertNewRowBefore(1, 1);

                $event->sheet->setCellValue('A1', 'EMPLOYEE MASTER DATA');

                $event->sheet->mergeCells('A1:X1');

                $event->sheet->getStyle('A1')->getFont()->setBold(true);
            },
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            1 => [ // Baris header
                'font' => [
                    'bold' => true,
                    'size' => 14,
                ],
            ],
        ];
    }
}
