<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithColumnWidths;


class AssetsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    protected $data;
    protected $counter = 1;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode',
            'Nama',
            'Merk',
            'Tipe',
            'No. Seri',
            'Lokasi',
            'Status',
            'Waktu Kalibrasi',
            'Hari',
        ];
    }

    public function map($aset): array
    {
        $hari = $aset->hari_sejak_kalibrasi;

        return [
            $this->counter++,
            $aset->kode,
            $aset->nama,
            $aset->merk,
            $aset->type,
            $aset->no_seri,
            $aset->lokasi,
            strtoupper($aset->status),
            $aset->waktu_kalibrasi ? \Carbon\Carbon::parse($aset->waktu_kalibrasi)->format('d-m-Y') : '',
            $hari . ' Hari',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:J1')->getFont()->setBold(true);

        $lastRow = count($this->data) + 1; // +1 untuk header

        // Tambahkan border untuk semua baris dan kolom A sampai J
        $sheet->getStyle("A1:J{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'], // warna hitam
                ],
            ],
        ]);

        foreach ($this->data as $index => $aset) {
            $rowIndex = $index + 2;

            $hari = $aset->hari_sejak_kalibrasi;

            if ($hari > 180) {
                $color = '00C851'; // Hijau
                $textColor = 'FFFFFF';
            } elseif ($hari >= 0 && $hari <= 180) {
                $color = 'FFEB3B'; // Kuning
                $textColor = '000000';
            } else {
                $color = 'ff4444'; // Merah
                $textColor = 'FFFFFF';
            }

            $cell = "J{$rowIndex}";

            $sheet->getStyle($cell)->applyFromArray([
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => $color],
                ],
                'font' => [
                    'color' => ['rgb' => $textColor],
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => 'center',
                ],
            ]);
        }

        return [];
    }
     public function columnWidths(): array
    {
        return [
            'A' => 5,   // No
            'B' => 15,  // Kode
            'C' => 25,  // Nama
            'D' => 20,  // Merk
            'E' => 15,  // Tipe
            'F' => 20,  // No. Seri
            'G' => 25,  // Lokasi
            'H' => 15,  // Status
            'I' => 18,  // Waktu Kalibrasi
            'J' => 12,  // Hari
        ];
    }
}
