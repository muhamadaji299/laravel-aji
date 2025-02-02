<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class StudentExportController extends Controller
{
    // Ambil semua data mahasiswa
    public function export()
    {
        $students = Student::all();

        // Buat objek Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set nama kolom
        $sheet->setCellValue('A1', 'NIS');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Alamat');
        $sheet->setCellValue('D1', 'No HP');
        $sheet->setCellValue('E1', 'Jenis Kelamin');
        $sheet->setCellValue('F1', 'Hobi');
        $sheet->setCellValue('G1', 'Foto');

        // Masukkan data mahasiswa ke dalam file Excel
        $row = 2;
        foreach ($students as $student) {
            // Pastikan data ini sesuai dengan field di database
            $sheet->setCellValue('A' . $row, $student->nis);  // Misal NIS di tabel mahasiswa
            $sheet->setCellValue('B' . $row, $student->nama);
            $sheet->setCellValue('C' . $row, $student->alamat); // Alamat
            $sheet->setCellValue('D' . $row, $student->no_hp); // No HP
            $sheet->setCellValue('E' . $row, $student->jenis_kelamin); // Jenis Kelamin
            $sheet->setCellValue('F' . $row, $student->hobi); // Hobi
            $sheet->setCellValue('G' . $row, $student->foto); // Foto (Jika ada URL atau nama file)

            $row++;
        }

        // Buat writer untuk menulis ke file Excel
        $writer = new Xlsx($spreadsheet);

        // Mengirim file ke browser untuk diunduh langsung tanpa menyimpannya
        $fileName = 'students.xlsx';
        
        // Menggunakan response stream untuk mengirim file langsung ke browser
        return response()->stream(
            function() use ($writer) {
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment;filename="students.xlsx"',
                'Cache-Control' => 'max-age=0',
            ]
        );
    }
}
