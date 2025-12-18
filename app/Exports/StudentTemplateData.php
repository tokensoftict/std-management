<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class StudentTemplateData implements FromCollection, WithHeadings, WithTitle
{
    public $class_id, $section_id = "";

    public function __construct($class_id, $section_id) {
        $this->class_id = $class_id;
        $this->section_id = $section_id;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect([]);
    }

    public function headings(): array
    {
        return [
            'first_name',
            'middle_name',
            'last_name',
            'gender',
            'adm_no'
        ];
    }

    public function title(): string
    {
        return $this->class_id."+".$this->section_id;
    }
}
