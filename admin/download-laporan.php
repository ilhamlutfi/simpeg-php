<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');
$sheet->setCellValue('B1', 'Ilham Lutfi');

$writer = new Xlsx($spreadsheet);
$fileName = 'Contoh Laporan.xlsx';
$writer->save($fileName);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Length: ' . filesize($fileName));
header('Content-Disposition: attachment;filename="' . $fileName . '"');
readfile($fileName); // send file
unlink($fileName); // delete file
exit;