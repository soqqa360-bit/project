<?php

namespace App\Exports;

use App\Models\Blog;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class BlogExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection(): Collection
    {
        return Blog::with(['category', 'user', 'tags'])->latest()->get();
    }

    public function headings(): array
    {
        return [
            'Tartib Raqam',
            'Sarlavha',
            'Content',
            'Slug',
            'Kategoriya',
            'Tags',
            'Yaratuvchi',
            'Yaratilgan Vaqt',
            'Ko\'rishlar Soni',
        ];
    }

    public function map($blog): array
    {
        return [
            $blog->id,
            $blog->title,
            strip_tags($blog->content),
            $blog->slug,
            $blog->category ? $blog->category->name : 'Kategoriyasiz',
            $blog->tags ? $blog->tags->pluck('name')->implode(', ') : 'Tegsiz',
            $blog->user ? $blog->user->name : 'Mavjud Emas',
            $blog->created_at->format('M d, Y'),
            $blog->views 
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Qatolar balandligi
        $sheet->getRowDimension(1)->setRowHeight(30);

        return [
            // 1. Sarlavha (1-qator) dizayni
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FFFFFF'], // Oq yozuv
                    'size' => 11,
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['argb' => '2F5597'], // To'q ko meva/ko'k fon
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],

            // 2. Barcha kataklarga ramka (border) va hizalash
            'A1:I' . $sheet->getHighestRow() => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['argb' => 'D9D9D9'],
                    ],
                ],
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }
}
