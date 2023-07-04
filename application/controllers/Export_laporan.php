<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Border;

// require_once APPPATH . 'libraries/PhpSpreadsheet/src/PhpSpreadsheet/Spreadsheet.php';
// require_once APPPATH . 'libraries/PhpSpreadsheet/src/PhpSpreadsheet/Writer/Xlsx.php';
// require_once APPPATH . 'libraries/PhpSpreadsheet/src/PhpSpreadsheet/Style/Font.php';

require 'vendor/autoload.php';

class Export_laporan extends CI_Controller {

    public function index()
    {
        $selectedMonth = $this->input->get('bulan');
         // Retrieve data from the database
        $data = $this->M_transaksi->get_data_by_month($selectedMonth)->result();
        // $data = $this->M_transaksi->show_data_dashadmin()->result();

        // Create a new PhpSpreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the column headers
        $sheet->setCellValue('A1', 'Tanggal');
        $sheet->setCellValue('B1', 'Pelanggan');
        $sheet->setCellValue('C1', 'Produk');
        $sheet->setCellValue('D1', 'Jumlah');
        $sheet->setCellValue('E1', 'Harga Satuan');
        $sheet->setCellValue('F1', 'Total Harga');
        $sheet->setCellValue('G1', 'ID Invoice');
        
        $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THICK,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ];
        $sheet->getStyle('A1:G1')->applyFromArray($styleArray);

        // Set the data rows
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->tanggal_transakasi_masuk);
            $sheet->setCellValue('B' . $row, $item->nama_pelanggan);
            $sheet->setCellValue('C' . $row, $item->nama_sasirangan);
            $sheet->setCellValue('D' . $row, $item->jumlah);
            $sheet->setCellValue('E' . $row, $item->harga_produk);
            $sheet->setCellValue('F' . $row, $item->total_harga);
            $sheet->setCellValue('G' . $row, $item->id_invoice);
            // Add more data cells if needed
            // Set borders for the current row
            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THICK,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ];
            $sheet->getStyle('A' . $row . ':G' . $row)->applyFromArray($styleArray);

            $row++;
        }

        // Set the file name and save the Excel file
        $filename = 'data_penjualan_sasirangan.xlsx';
        $writer = new Xlsx($spreadsheet);
        // $writer->save($filename);

        // Set the response headers
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Output the Excel file to the browser
        $writer->save('php://output');
    }
}
