<?php
require 'vendor/autoload.php'; // Sertakan file autoload Composer

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;

// Sertakan koneksi database
include 'koneksi.php';

// Ambil data dari database
$sql = "SELECT * FROM pesanan";
$result = $koneksi->query($sql);

if (!$result) {
    die("Error mengambil data: " . htmlspecialchars($koneksi->error));
}

// Buat objek Spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set judul di atas tabel
$sheet->setCellValue('A1', 'Daftar Pesanan Saba Baduy');
$sheet->mergeCells('A1:I1');
$sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
$sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A1')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

// Set header kolom
$sheet->setCellValue('A2', 'Nama');
$sheet->setCellValue('B2', 'Phone');
$sheet->setCellValue('C2', 'Jumlah Peserta');
$sheet->setCellValue('D2', 'Jumlah Hari');
$sheet->setCellValue('E2', 'Akomodasi');
$sheet->setCellValue('F2', 'Transportasi');
$sheet->setCellValue('G2', 'Service/Makanan');
$sheet->setCellValue('H2', 'Harga Paket');
$sheet->setCellValue('I2', 'Total Tagihan');

// Set style untuk header kolom
$headerStyle = [
    'font' => ['bold' => true],
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000'],
        ],
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
    ],
];
$sheet->getStyle('A2:I2')->applyFromArray($headerStyle);

// Isi spreadsheet dengan data
$rowIndex = 3;
while ($row = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $rowIndex, $row['nama_pemesan']);
    $sheet->setCellValue('B' . $rowIndex, $row['nomor_hp']);
    $sheet->setCellValue('C' . $rowIndex, $row['jumlah_peserta']);
    $sheet->setCellValue('D' . $rowIndex, $row['durasi_wisata']);
    $sheet->setCellValue('E' . $rowIndex, $row['layanan_penginapan'] == '1' ? 'Y' : 'N');
    $sheet->setCellValue('F' . $rowIndex, $row['layanan_transportasi'] == '1' ? 'Y' : 'N');
    $sheet->setCellValue('G' . $rowIndex, $row['layanan_makanan'] == '1' ? 'Y' : 'N');
    $sheet->setCellValue('H' . $rowIndex, $row['harga_paket']);
    $sheet->setCellValue('I' . $rowIndex, $row['jumlah_tagihan']);
    $rowIndex++;
}

// Set border untuk seluruh tabel
$dataRange = 'A2:I' . ($rowIndex - 1);
$sheet->getStyle($dataRange)->applyFromArray([
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000'],
        ],
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
    ],
]);

// Simpan file Excel
$writer = new Xlsx($spreadsheet);
$filename = 'daftar_pesanan.xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit;
