<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_report extends CI_Controller{
    
    public function __construct(){
        parent:: __construct(); 
        date_default_timezone_set('Asia/Jakarta');
       
		$this->load->model('M_aql_inspect');
		// $this->load->library('Excel');
        sesscheck();
    }


	public function index()
	{
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        //style
        $judul = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 25
            ]
        );

        $konten = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 12,
                'bold' => true,
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'ffff00',
                ],
                'endColor' => [
                    'argb' => 'FFFFFFF',
                ],
            ],
        );

        $kontenboldabuleft = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 12,
                'bold'=>true
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => array('argb' => 'c1c1c1')
            ],
        );

        $arsir = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 12,
                'bold'=>true
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTUP,
            ],
        );

        $kontenputihleft = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 12,
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
        );

        $kontenwraptext = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'wraptext' =>true
            ],
            'font' => [
                'size' => 12,
                'bold' => true,
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'ffff00',
                ],
                'endColor' => [
                    'argb' => 'FFFFFFF',
                ],
            ],
        );

        $kontenatas = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 12
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
        );

        $kontenratatengah = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 12
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
        );

        $merah = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 12, 
                'color'=> array('argb' => 'ff0000')
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
        );


        $biru = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 12, 
                'color'=> array('argb' => '0036b1')
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
        );

        $merahleft = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 12, 
                'color'=> array('argb' => 'ff0000')
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
        );

        $biruleft = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 12, 
                'color'=> array('argb' => '0036b1')
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
        );

        $garistipis = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 12, 
                'color'=> array('argb' => '0000000')
            ], 
            'borders' => array(
                'top' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
                'bottom' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
        );

        $garistebal = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 12, 
                'color'=> array('argb' => '0000000')
            ], 
            'borders' => array(
                'bottom' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => array('argb' => '000000'),
                ),
            ),
        );

        $tanpagaris = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 12, 
                'color'=> array('argb' => '0036b1')
            ], 
        );

        $tanpagariskecil = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 10, 
                'color'=> array('argb' => '000000')
            ], 
        );

        $tanpagaristebal = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 12, 
                'color'=> array('argb' => '000000'),
                'bold' => true
            ], 
        );

        // $sheet->getColumnDimension('A')->setAutoSize(true);
        // $sheet->getColumnDimension('B')->setAutoSize(true);

        // $sheet->getActiveSheet()->getColumnDimensionByColumn('A')->setAutoSize(false);
        // $sheet->getActiveSheet()->getColumnDimensionByColumn('A')->setWidth('10');

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Paid');
        $drawing->setDescription('Paid');
        $drawing->setPath('adidas.jpg'); // put your path and image here
        $drawing->setCoordinates('I1');
        $drawing->setHeight(60);
        $drawing->setOffsetX(0);
        $drawing->setRotation(0);
        $drawing->getShadow()->setVisible(true);
        $drawing->getShadow()->setDirection(0);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
        
        $writer = new Xlsx($spreadsheet);
        
        $po         = '0126558243';
        $partial    = '1';
        $remark     = '2';
        $level      = 'II';

        $report	    = $this->M_aql_inspect->report($po, $partial, $remark, $level);
		$report2 	= $this->M_aql_inspect->report2($po, $partial, $remark, $level);
		$report3 	= $this->M_aql_inspect->report3($po, $partial, $remark, $level);
		$code    	= $this->M_aql_inspect->code_reject()->result_array();
        
        $sheet->mergeCells('A1:U1');
        $sheet->mergeCells('A2:U2');
        $sheet->mergeCells('A3:U3')->getStyle('A3:U3')->applyFromArray($judul);
        $sheet->setCellValue('A3', 'AQL INSPECTION REPORT');
        $sheet->mergeCells('A4:U4');
//kolom
        $sheet->getColumnDimension('A')->setWidth(11);
        $sheet->getColumnDimension('B')->setWidth(16.14);
        $sheet->getColumnDimension('C')->setWidth(19.57);
        $sheet->getColumnDimension('D')->setWidth(21.14);
        $sheet->getColumnDimension('E')->setWidth(12.57);
        $sheet->getColumnDimension('F')->setWidth(11.86);
        $sheet->getColumnDimension('G')->setWidth(30.00);
        $sheet->getColumnDimension('H')->setWidth(18.14);
        $sheet->getColumnDimension('I')->setWidth(10.29);
        $sheet->getColumnDimension('J')->setWidth(11.00);
        $sheet->getColumnDimension('K')->setWidth(11.43);
        $sheet->getColumnDimension('L')->setWidth(12.29);
        $sheet->getColumnDimension('M')->setWidth(18);
        $sheet->getColumnDimension('N')->setWidth(21.29);
        $sheet->getColumnDimension('O')->setWidth(18.57);
        $sheet->getColumnDimension('P')->setWidth(10.86);
        $sheet->getColumnDimension('Q')->setWidth(6.86);
        $sheet->getColumnDimension('R')->setWidth(19.29);
        $sheet->getColumnDimension('S')->setWidth(11.14);
        $sheet->getColumnDimension('T')->setWidth(12.86);
        $sheet->getColumnDimension('U')->setWidth(11.57);

//row
        $sheet->getRowDimension('1')->setRowHeight(37.50);
        $sheet->getRowDimension('2')->setRowHeight(11.25);
        $sheet->getRowDimension('3')->setRowHeight(24.00);
        $sheet->getRowDimension('4')->setRowHeight(14.25);
        $sheet->getRowDimension('5')->setRowHeight(15.00);
        $sheet->getRowDimension('6')->setRowHeight(15.00);
        $sheet->getRowDimension('7')->setRowHeight(15.00);
        $sheet->getRowDimension('8')->setRowHeight(15.00);
        $sheet->getRowDimension('9')->setRowHeight(15.00);
        $sheet->getRowDimension('10')->setRowHeight(15.00);
        $sheet->getRowDimension('11')->setRowHeight(9.75);
        $sheet->getRowDimension('12')->setRowHeight(18.00);
        $sheet->getRowDimension('13')->setRowHeight(28.50);
        $sheet->getRowDimension('14')->setRowHeight(21.75);
        $sheet->getRowDimension('15')->setRowHeight(21.75);
        $sheet->getRowDimension('16')->setRowHeight(21.75);
        $sheet->getRowDimension('17')->setRowHeight(21.75);
        $sheet->getRowDimension('18')->setRowHeight(21.75);
        $sheet->getRowDimension('19')->setRowHeight(7.5);
        $sheet->getRowDimension('20')->setRowHeight(15);
        $sheet->getRowDimension('21')->setRowHeight(15);
        $sheet->getRowDimension('22')->setRowHeight(15);
        $sheet->getRowDimension('23')->setRowHeight(9.75);
        $sheet->getRowDimension('24')->setRowHeight(31.50);
        $sheet->getRowDimension('25')->setRowHeight(19.50);      
        $sheet->getRowDimension('26')->setRowHeight(30.75);
        $sheet->getRowDimension('27')->setRowHeight(24.75);
        $sheet->getRowDimension('28')->setRowHeight(33.00);
        $sheet->getRowDimension('29')->setRowHeight(21.00);
        $sheet->getRowDimension('30')->setRowHeight(30.00);
        $sheet->getRowDimension('31')->setRowHeight(33.00);
        $sheet->getRowDimension('32')->setRowHeight(21.00);
        $sheet->getRowDimension('33')->setRowHeight(26.25);
        $sheet->getRowDimension('34')->setRowHeight(21.00);
        $sheet->getRowDimension('35')->setRowHeight(33.00);
        $sheet->getRowDimension('36')->setRowHeight(36.00);
        $sheet->getRowDimension('37')->setRowHeight(27.75);
        $sheet->getRowDimension('38')->setRowHeight(26.25);
        $sheet->getRowDimension('39')->setRowHeight(24.75);
        $sheet->getRowDimension('40')->setRowHeight(21.00);
        $sheet->getRowDimension('41')->setRowHeight(27.75);
        $sheet->getRowDimension('42')->setRowHeight(21.00);
        $sheet->getRowDimension('43')->setRowHeight(33.00);
        $sheet->getRowDimension('44')->setRowHeight(23.25);
        $sheet->getRowDimension('45')->setRowHeight(21.00);
        $sheet->getRowDimension('46')->setRowHeight(27.00);
        $sheet->getRowDimension('47')->setRowHeight(21.00);
        $sheet->getRowDimension('48')->setRowHeight(21.00);
        $sheet->getRowDimension('49')->setRowHeight(26.25);
        $sheet->getRowDimension('50')->setRowHeight(33.00);
        $sheet->getRowDimension('51')->setRowHeight(31.50);
        $sheet->getRowDimension('52')->setRowHeight(32.25);
        $sheet->getRowDimension('53')->setRowHeight(21.00);
        $sheet->getRowDimension('54')->setRowHeight(21.00);
        $sheet->getRowDimension('55')->setRowHeight(34.50);
        $sheet->getRowDimension('56')->setRowHeight(21.00);
        $sheet->getRowDimension('57')->setRowHeight(30.75);
        $sheet->getRowDimension('58')->setRowHeight(26.25);
        $sheet->getRowDimension('59')->setRowHeight(29.25);
        $sheet->getRowDimension('60')->setRowHeight(21.00);
        $sheet->getRowDimension('61')->setRowHeight(31.50);
        $sheet->getRowDimension('62')->setRowHeight(21.00);
        $sheet->getRowDimension('63')->setRowHeight(23.25);
        $sheet->getRowDimension('64')->setRowHeight(21.00);
        $sheet->getRowDimension('65')->setRowHeight(21.00);
        $sheet->getRowDimension('66')->setRowHeight(31.50);
        $sheet->getRowDimension('67')->setRowHeight(21.00);
        $sheet->getRowDimension('68')->setRowHeight(33.75);
        $sheet->getRowDimension('69')->setRowHeight(27.75);
        $sheet->getRowDimension('70')->setRowHeight(27.75);

        $sheet->getRowDimension('71')->setRowHeight(27.75);
        $sheet->getRowDimension('72')->setRowHeight(27.75);
        $sheet->getRowDimension('73')->setRowHeight(21.00);
        $sheet->getRowDimension('74')->setRowHeight(30.75);
        $sheet->getRowDimension('75')->setRowHeight(21.00);
        $sheet->getRowDimension('76')->setRowHeight(30.00);
        $sheet->getRowDimension('77')->setRowHeight(30.75);
        $sheet->getRowDimension('78')->setRowHeight(21.00);
        $sheet->getRowDimension('79')->setRowHeight(21.00);
        $sheet->getRowDimension('80')->setRowHeight(27.00);

        $sheet->getRowDimension('81')->setRowHeight(21.00);
        $sheet->getRowDimension('82')->setRowHeight(21.00);
        $sheet->getRowDimension('83')->setRowHeight(32.25);
        $sheet->getRowDimension('84')->setRowHeight(25.50);
        $sheet->getRowDimension('85')->setRowHeight(21.00);
        $sheet->getRowDimension('86')->setRowHeight(27.75);
        $sheet->getRowDimension('87')->setRowHeight(21.00);
        $sheet->getRowDimension('88')->setRowHeight(21.00);
        $sheet->getRowDimension('89')->setRowHeight(21.00);
        $sheet->getRowDimension('90')->setRowHeight(24.00);

        $sheet->getRowDimension('91')->setRowHeight(24.00);
        $sheet->getRowDimension('92')->setRowHeight(24.00);
        $sheet->getRowDimension('93')->setRowHeight(24.00);
        $sheet->getRowDimension('94')->setRowHeight(30.75);
        $sheet->getRowDimension('95')->setRowHeight(22.50);
        $sheet->getRowDimension('96')->setRowHeight(22.50);
        $sheet->getRowDimension('97')->setRowHeight(31.50);
        $sheet->getRowDimension('98')->setRowHeight(23.25);
        $sheet->getRowDimension('99')->setRowHeight(23.25);
        $sheet->getRowDimension('100')->setRowHeight(23.25);

        $sheet->getRowDimension('101')->setRowHeight(30.75);
        $sheet->getRowDimension('102')->setRowHeight(30.75);
        $sheet->getRowDimension('103')->setRowHeight(23.25);
        $sheet->getRowDimension('104')->setRowHeight(23.25);
        $sheet->getRowDimension('105')->setRowHeight(23.25);
        $sheet->getRowDimension('106')->setRowHeight(22.50);
        $sheet->getRowDimension('107')->setRowHeight(6.00);
        $sheet->getRowDimension('108')->setRowHeight(17.25);
        $sheet->getRowDimension('109')->setRowHeight(9.75);
        $sheet->getRowDimension('110')->setRowHeight(20.25);

        $sheet->getRowDimension('111')->setRowHeight(29.25);
        $sheet->getRowDimension('112')->setRowHeight(4.50);
        $sheet->getRowDimension('113')->setRowHeight(21.00);
        $sheet->getRowDimension('114')->setRowHeight(21.00);
        $sheet->getRowDimension('115')->setRowHeight(21.00);
        $sheet->getRowDimension('116')->setRowHeight(19.50);
        $sheet->getRowDimension('117')->setRowHeight(19.50);
        $sheet->getRowDimension('118')->setRowHeight(19.50);
        $sheet->getRowDimension('119')->setRowHeight(18.00);
        $sheet->getRowDimension('120')->setRowHeight(18.00);

        $report1 = $report->row_array();
        // plant cell
        $sheet->setCellValue('A5', 'Plant / Cell')->getStyle('A5')->applyFromArray($kontenatas);
        $sheet->mergeCells('B5:C5');
        $sheet->setCellValue('B5', 'HWI')->getStyle('B5:C5')->applyFromArray($kontenatas);

        $sheet->setCellValue('A6', 'Article #')->getStyle('A6')->applyFromArray($kontenatas);
        $sheet->mergeCells('B6:C6');
        $sheet->setCellValue('B6', $report1['ARTICLE'])->getStyle('B6:C6')->applyFromArray($kontenatas);

        $sheet->setCellValue('A7', 'Art. Name')->getStyle('A7')->applyFromArray($kontenatas);
        $sheet->mergeCells('B7:C7');
        $sheet->setCellValue('B7',  $report1['MODEL_NAME'])->getStyle('B7:C7')->applyFromArray($kontenatas);

        $sheet->setCellValue('A8', 'Color')->getStyle('A8')->applyFromArray($kontenatas);
        $sheet->mergeCells('B8:C8');
        $sheet->setCellValue('B8', '')->getStyle('B8:C8')->applyFromArray($kontenatas);

        $sheet->setCellValue('A9', 'Gender')->getStyle('A9')->applyFromArray($kontenatas);
        $sheet->mergeCells('B9:C9');
        $sheet->setCellValue('B9',  $report1['GENDER'])->getStyle('B9:C9')->applyFromArray($kontenatas);


        // Brand
        $sheet->setCellValue('E5', 'Brand')->getStyle('E5')->applyFromArray($kontenatas);
        $sheet->setCellValue('F5', '')->getStyle('F5')->applyFromArray($kontenatas);
        $sheet->setCellValue('G5', '')->getStyle('G5')->applyFromArray($kontenatas);

        $sheet->setCellValue('E6', 'Adidas')->getStyle('E6')->applyFromArray($kontenatas);
        $sheet->setCellValue('F6', 'V')->getStyle('F6')->applyFromArray($kontenatas);
        $sheet->setCellValue('G6', '')->getStyle('G6')->applyFromArray($kontenatas);

        $sheet->setCellValue('E7', 'Reebok')->getStyle('E7')->applyFromArray($kontenatas);
        $sheet->setCellValue('F7', '')->getStyle('F7')->applyFromArray($kontenatas);
        $sheet->setCellValue('G7', '')->getStyle('G7')->applyFromArray($kontenatas);


        // PO 
        $sheet->mergeCells('J5:K5');
        $sheet->setCellValue('J5', 'PO #')->getStyle('J5:K5')->applyFromArray($kontenatas);
        $sheet->mergeCells('L5:M5');
        $sheet->setCellValue('L5',  $report1['PO_NO'])->getStyle('L5:M5')->applyFromArray($kontenatas);

        $sheet->mergeCells('J6:K6');
        $sheet->setCellValue('J6', 'CI item#')->getStyle('J6:K6')->applyFromArray($kontenatas);
        $sheet->mergeCells('L6:M6');
        $sheet->setCellValue('L6', '')->getStyle('L6:M6')->applyFromArray($kontenatas);

        $sheet->mergeCells('J7:K7');
        $sheet->setCellValue('J7', 'Total Order Qty')->getStyle('J7:K7')->applyFromArray($kontenatas);
        $sheet->mergeCells('L7:M7');
        $sheet->setCellValue('L7',  $report1['KWMENG'])->getStyle('L7:M7')->applyFromArray($kontenatas);

        $sheet->mergeCells('J8:K8');
        $sheet->setCellValue('J8', 'Actual Qty')->getStyle('J8:K8')->applyFromArray($kontenatas);
        $sheet->mergeCells('L8:M8');
        $sheet->setCellValue('L8', '')->getStyle('L8:M8')->applyFromArray($kontenatas);

        $sheet->mergeCells('J9:K9');
        $sheet->setCellValue('J9', '1st Cnfd Date')->getStyle('J9:K9')->applyFromArray($kontenatas);
        $sheet->mergeCells('L9:M9');
        $sheet->setCellValue('L9', '')->getStyle('L9:M9')->applyFromArray($kontenatas);

        $sheet->mergeCells('J10:K10');
        $sheet->setCellValue('J10', 'Customer')->getStyle('J10:K10')->applyFromArray($kontenatas);
        $sheet->mergeCells('L10:M10');
        $sheet->setCellValue('L10',  $report1['LANDT'])->getStyle('L10:M10')->applyFromArray($kontenatas);


        // INSPECTION DATE 
        $sheet->mergeCells('O5:P5');
        $sheet->setCellValue('O5', 'Inspection Date / Time')->getStyle('O5:P5')->applyFromArray($kontenatas);
        $sheet->mergeCells('Q5:U5');
        $sheet->setCellValue('Q5',  $report1['INSPECT_DATE'])->getStyle('Q5:U5')->applyFromArray($kontenatas);

        if( $report1['REMARK']=== 1)
        {
            $sheet->mergeCells('O6:P6');
            $sheet->setCellValue('O6', 'Final Inspection')->getStyle('O6:P6')->applyFromArray($kontenatas);
            $sheet->mergeCells('Q6:U6');
            $sheet->setCellValue('Q6', 'V')->getStyle('Q6:U6')->applyFromArray($kontenatas);
        
            $sheet->mergeCells('O7:P7');
            $sheet->setCellValue('O7', 'Re-Inspection')->getStyle('O7:P7')->applyFromArray($kontenatas);
            $sheet->mergeCells('Q7:U7');
            $sheet->setCellValue('Q7', '')->getStyle('Q7:U7')->applyFromArray($kontenatas);
        }else{
            $sheet->mergeCells('O6:P6');
            $sheet->setCellValue('O6', 'Final Inspection')->getStyle('O6:P6')->applyFromArray($kontenatas);
            $sheet->mergeCells('Q6:U6');
            $sheet->setCellValue('Q6', '')->getStyle('Q6:U6')->applyFromArray($kontenatas);
        
            $sheet->mergeCells('O7:P7');
            $sheet->setCellValue('O7', 'Re-Inspection')->getStyle('O7:P7')->applyFromArray($kontenatas);
            $sheet->mergeCells('Q7:U7');
            $sheet->setCellValue('Q7', 'V')->getStyle('Q7:U7')->applyFromArray($kontenatas);

        }
        $sheet->mergeCells('O8:P8');
        $sheet->setCellValue('O8', 'Adidas Group Prod. Manager')->getStyle('O8:P8')->applyFromArray($kontenatas);
        $sheet->mergeCells('Q8:U8');
        $sheet->setCellValue('Q8', '')->getStyle('Q8:U8')->applyFromArray($kontenatas);

        $sheet->mergeCells('O9:P9');
        $sheet->setCellValue('O9', 'inspector')->getStyle('O9:P9')->applyFromArray($kontenatas);
        $sheet->mergeCells('Q9:U9');
        $sheet->setCellValue('Q9', $report1['INSPECTOR'])->getStyle('Q9:U9')->applyFromArray($kontenatas);


        $sheet->mergeCells('A12:U12');
        $sheet->setCellValue('A12', 'INSPECTION')->getStyle('A12:U12')->applyFromArray($konten);

        //-------------------tabel ctn no 1------------------------------------------------------------------
        $data = $report->result_array();

        $sheet->setCellValue('A13', 'Carton #')->getStyle('A13')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('B13', 'Qty / Carton')->getStyle('B13')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('C13', 'Size')->getStyle('C13')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('D13', 'Qty Insp')->getStyle('D13')->applyFromArray($kontenratatengah);

        $no = 13;
        for($a=0; $a<5; $a++){
            $no++;
            if(isset($data[$a]['CARTON_NO'])){
                $sheet->setCellValue('A'.$no.'', $data[$a]['CARTON_NO'])->getStyle('A'.$no.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('A'.$no.'', '')->getStyle('A'.$no.'')->applyFromArray($kontenratatengah);
            }
            
            if(isset($data[$a]['CARTON_QTY'])){
                $sheet->setCellValue('B'.$no.'', $data[$a]['CARTON_QTY'])->getStyle('B'.$no.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('B'.$no.'', '')->getStyle('B'.$no.'')->applyFromArray($kontenratatengah);
            }
            
            if(isset($data[$a]['SIZE'])){
                $sheet->setCellValue('C'.$no.'', $data[$a]['SIZE'])->getStyle('C'.$no.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('C'.$no.'', '')->getStyle('C'.$no.'')->applyFromArray($kontenratatengah);
            }
            
            if(isset($data[$a]['QTY_INSPECT'])){
                $sheet->setCellValue('D'.$no.'', $data[$a]['QTY_INSPECT'])->getStyle('D'.$no.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('D'.$no.'', '')->getStyle('D'.$no.'')->applyFromArray($kontenratatengah);
            }
            
        }

        //-------------------tabel ctn no 2------------------------------------------------------------------
        $sheet->mergeCells('E13:F13');
        $sheet->setCellValue('E13', 'Carton #')->getStyle('E13:F13')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('G13', 'Qty / Carton')->getStyle('G13')->applyFromArray($kontenratatengah);
        $sheet->mergeCells('H13:I13');
        $sheet->setCellValue('H13', 'Size')->getStyle('H13:I13')->applyFromArray($kontenratatengah);
        $sheet->mergeCells('J13:K13');
        $sheet->setCellValue('J13', 'Qty Insp')->getStyle('J13:K13')->applyFromArray($kontenratatengah);

        $no2 = 13;
        for($a=5; $a<10; $a++){
            $no2++;
            $sheet->mergeCells('E'.$no2.':F'.$no2.'');
            
            if (isset($data[$a]['CARTON_NO'])){
                $sheet->setCellValue('E'.$no2.'', $data[$a]['CARTON_NO'])->getStyle('E'.$no2.':F'.$no2.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('E'.$no2.'', '')->getStyle('E'.$no2.':F'.$no2.'')->applyFromArray($kontenratatengah);
            }

            if (isset($data[$a]['CARTON_QTY'])){
                $sheet->setCellValue('G'.$no2.'', $data[$a]['CARTON_QTY'])->getStyle('G'.$no2.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('G'.$no2.'', '')->getStyle('G'.$no2.'')->applyFromArray($kontenratatengah);
            }

            $sheet->mergeCells('H'.$no2.':I'.$no2.'');

            if (isset($data[$a]['SIZE'])){
                $sheet->setCellValue('H'.$no2.'', $data[$a]['SIZE'])->getStyle('H'.$no2.':I'.$no2.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('H'.$no2.'', '')->getStyle('H'.$no2.':I'.$no2.'')->applyFromArray($kontenratatengah);
            }

            $sheet->mergeCells('J'.$no2.':K'.$no2.'');

            if (isset($data[$a]['QTY_INSPECT'])){
                $sheet->setCellValue('J'.$no2.'', $data[$a]['QTY_INSPECT'])->getStyle('J'.$no2.':K'.$no2.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('J'.$no2.'', '')->getStyle('J'.$no2.':K'.$no2.'')->applyFromArray($kontenratatengah);
            }
            
        }
       

        //-------------------tabel ctn no 3------------------------------------------------------------------
        $sheet->setCellValue('L13', 'Carton #')->getStyle('L13')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('M13', 'Qty / Carton')->getStyle('M13')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('N13', 'Size')->getStyle('N13')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('O13', 'Qty Insp')->getStyle('O13')->applyFromArray($kontenratatengah);
        $sheet->mergeCells('P13:Q13');

        $no3 = 13;
        for($a=10; $a<15; $a++){
            $no3++;
            if(ISSET($data[$a]['CARTON_NO'])){
                $sheet->setCellValue('L'.$no3.'', $data[$a]['CARTON_NO'])->getStyle('L'.$no3.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('L'.$no3.'', '')->getStyle('L'.$no3.'')->applyFromArray($kontenratatengah);
            }
            
            if(isset($data[$a]['CARTON_QTY'])){
                $sheet->setCellValue('M'.$no3.'', $data[$a]['CARTON_QTY'])->getStyle('M'.$no3.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('M'.$no3.'', '')->getStyle('M'.$no3.'')->applyFromArray($kontenratatengah);
            }
           
            if(isset($data[$a]['SIZE'])){
                $sheet->setCellValue('N'.$no3.'', $data[$a]['SIZE'])->getStyle('N'.$no3.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('N'.$no3.'', '')->getStyle('N'.$no3.'')->applyFromArray($kontenratatengah);
            }
            
            if(isset($data[$a]['QTY_INSPECT'])){
                $sheet->setCellValue('O'.$no3.'', $data[$a]['QTY_INSPECT'])->getStyle('O'.$no3.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('O'.$no3.'','')->getStyle('O'.$no3.'')->applyFromArray($kontenratatengah);
            }
            
            $sheet->mergeCells('P'.$no3.':Q'.$no3.'');
            
        }

        //--------------------------table ctn no4--------------------------------------------------

        $sheet->setCellValue('P13', 'Carton #')->getStyle('P13:Q13')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('R13', 'Qty / Carton')->getStyle('R13')->applyFromArray($kontenratatengah);
        $sheet->mergeCells('S13:T13');
        $sheet->setCellValue('S13', 'Size')->getStyle('S13:T13')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('U13', 'Qty Insp')->getStyle('U13')->applyFromArray($kontenratatengah);

        $no4 = 13;
        for($a=15; $a<20; $a++){
            $no4++;
            if(isset($data[$a]['CARTON_NO'])){
                $sheet->setCellValue('P'.$no4.'', $data[$a]['CARTON_NO'])->getStyle('P'.$no4.':Q'.$no4.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('P'.$no4.'', '')->getStyle('P'.$no4.':Q'.$no4.'')->applyFromArray($kontenratatengah);
            }

            if(isset($data[$a]['CARTON_QTY'])){
                $sheet->setCellValue('R'.$no4.'', $data[$a]['CARTON_QTY'])->getStyle('R'.$no4.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('R'.$no4.'', '')->getStyle('R'.$no4.'')->applyFromArray($kontenratatengah);
            }
            
            $sheet->mergeCells('S'.$no4.':T'.$no4.'');

            if(isset($data[$a]['SIZE'])){
                $sheet->setCellValue('S'.$no4.'', $data[$a]['SIZE'])->getStyle('S'.$no4.':T'.$no4.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('S'.$no4.'', '')->getStyle('S'.$no4.':T'.$no4.'')->applyFromArray($kontenratatengah);
            }

            if(isset($data[$a]['QTY_INSPECT'])){
                $sheet->setCellValue('U'.$no4.'', $data[$a]['QTY_INSPECT'])->getStyle('U'.$no4.'')->applyFromArray($kontenratatengah);
            }else{
                $sheet->setCellValue('U'.$no4.'', '')->getStyle('U'.$no4.'')->applyFromArray($kontenratatengah);
            }
            
           
        }


        //--------------------------TABEL SAMPLE-----------------------------------------------------------
       
       
        $sheet->mergeCells('A21:B21');
        $sheet->setCellValue('A21', 'Sample Lot')->getStyle('A21:B21')->applyFromArray($kontenratatengah);
        $sheet->mergeCells('C21:D21');
        $sheet->setCellValue('C21', ''.$report2->SAMPLE_LOT.' %')->getStyle('C21:D21')->applyFromArray($kontenatas);
        $sheet->mergeCells('A22:B22');
        $sheet->setCellValue('A22', 'Sample Size')->getStyle('A22:B22')->applyFromArray($kontenratatengah);
        $sheet->mergeCells('C22:D22');
        $sheet->setCellValue('C22', 'Level : '.$report2->LEVEL.' ')->getStyle('C22:D22')->applyFromArray($kontenatas);

        $sheet->mergeCells('J21:K21');
        $sheet->setCellValue('J21', 'Cartons')->getStyle('J21:K21')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('L21', $report2->CARTONS)->getStyle('L21')->applyFromArray($kontenatas);
        $sheet->mergeCells('J22:K22');
        $sheet->setCellValue('J22', 'Pairs')->getStyle('J22:K22')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('L22', $report2->PAIRS)->getStyle('L22')->applyFromArray($kontenatas);


        $sheet->setCellValue('R20', 'MINOR')->getStyle('R20')->applyFromArray($biru);
        $sheet->setCellValue('S20', 'MAJOR')->getStyle('S20')->applyFromArray($biru);
        $sheet->setCellValue('T20', 'CRITICAL')->getStyle('T20')->applyFromArray($biru);
        $sheet->mergeCells('N21:Q21');
        $sheet->setCellValue('N21', 'Max. defect(s) to accept')->getStyle('N21:Q21')->applyFromArray($biruleft);
        $sheet->mergeCells('N22:Q22');
        $sheet->setCellValue('N22', 'No. of defect(s) to reject')->getStyle('N22:Q22')->applyFromArray($merahleft);
        $sheet->setCellValue('R21', $report2->QIP_LEVEL_MINOR_ACC)->getStyle('R21')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('S21', $report2->QIP_LEVEL_MAJOR_ACC)->getStyle('S21')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('T21', $report2->QIP_LEVEL_CRITIC_ACC)->getStyle('T21')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('R22', $report2->QIP_LEVEL_MINOR_REJ)->getStyle('R22')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('S22', $report2->QIP_LEVEL_MAJOR_REJ)->getStyle('S22')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('T22', $report2->QIP_LEVEL_CRITIC_REJ)->getStyle('T22')->applyFromArray($kontenratatengah);

        
//-------------------------------------------------TABEL REPORT DEFECT-------------------------------
        $sheet->mergeCells('A24:A25');
        $sheet->setCellValue('A24', 'CODE DEFECT')->getStyle('A24:A25')->applyFromArray($kontenwraptext)->getAlignment()->setWrapText(true);
        $sheet->mergeCells('B24:G25');
        $sheet->setCellValue('B24', 'DEFECT DESCRIPTION')->getStyle('B24:G25')->applyFromArray($kontenwraptext);
        $sheet->mergeCells('H24:H25');
        $sheet->setCellValue('H24', '')->getStyle('H24:H25')->applyFromArray($kontenwraptext);
        $sheet->setCellValue('I24', 'MINOR DEFECT')->getStyle('I24')->applyFromArray($kontenwraptext)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('I25', '2,5')->getStyle('I25')->applyFromArray($kontenwraptext);
        $sheet->setCellValue('J24', 'MAJOR DEFECT')->getStyle('J24')->applyFromArray($kontenwraptext)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('J25', '1,5')->getStyle('J25')->applyFromArray($kontenwraptext);
        $sheet->setCellValue('K24', 'CRITICAL DEFECT')->getStyle('K24')->applyFromArray($kontenwraptext)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('K25', '0,0')->getStyle('K25')->applyFromArray($kontenwraptext);

        
        $codenya = count($code);
        $report3nya = count($report3);
        $no = 25;
        $no1 = 26;
        for ($a = 0; $a < $codenya; $a++){
            $no++;
            $code1 = $code[$a];
            if($code1['CODE'] > 400){
                // // echo "";
                // $sheet->setCellValue('A'.$no.'','')->getStyle('A'.$no.'')->applyFromArray($kontenboldabuleft);
                // $sheet->mergeCells('B'.$no.':G'.$no.'');
                // $sheet->setCellValue('B'.$no.'', '')->getStyle('B'.$no.':G'.$no.'')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
                // $sheet->setCellValue('H'.$no.'', '')->getStyle('H'.$no.'')->applyFromArray($kontenboldabuleft);
                // $sheet->setCellValue('I'.$no.'', '')->getStyle('I'.$no.'')->applyFromArray($kontenboldabuleft);
                // $sheet->setCellValue('J'.$no.'', '')->getStyle('J'.$no.'')->applyFromArray($kontenboldabuleft);
                // $sheet->setCellValue('K'.$no.'', '')->getStyle('K'.$no.'')->applyFromArray($kontenboldabuleft);
            }else{
                $sheet->setCellValue('A'.$no.'', $code1['CODE'])->getStyle('A'.$no.'')->applyFromArray($kontenboldabuleft);
                $sheet->mergeCells('B'.$no.':G'.$no.'');
                $sheet->setCellValue('B'.$no.'', $code1['CODE_NAME'])->getStyle('B'.$no.':G'.$no.'')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
                $sheet->setCellValue('H'.$no.'', '')->getStyle('H'.$no.'')->applyFromArray($kontenboldabuleft);
                $sheet->setCellValue('I'.$no.'', '')->getStyle('I'.$no.'')->applyFromArray($kontenboldabuleft);
                $sheet->setCellValue('J'.$no.'', '')->getStyle('J'.$no.'')->applyFromArray($kontenboldabuleft);
                $sheet->setCellValue('K'.$no.'', '')->getStyle('K'.$no.'')->applyFromArray($kontenboldabuleft);
            }
            
            for($b = 0; $b < ($report3nya/2); $b++) {
                $no++;
                $haha = $report3[$b];
                if($code1['CODE_NAME'] != $haha['CODE_NAME']){
                    // if(($code1['CODE'] = $haha['CODE']) && ($haha['REJECT_CODE_NAME']!='0')){
                }else{
                    $sheet->setCellValue('A'.$no.'', $haha['CODE_DEFECT'])->getStyle('A'.$no.'')->applyFromArray($kontenputihleft);
                    $sheet->mergeCells('B'.$no.':G'.$no.'');
                    $sheet->setCellValue('B'.$no.'', $haha['REJECT_CODE_NAME'])->getStyle('B'.$no.':G'.$no.'')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
                    $sheet->setCellValue('H'.$no.'', $haha['DESCRIPTION'])->getStyle('H'.$no.'')->applyFromArray($kontenputihleft);
                    if($haha['STATUS_CODE'] == 'MI'){
                        $sheet->setCellValue('I'.$no.'', '')->getStyle('I'.$no.'')->applyFromArray($kontenputihleft);
                        $sheet->setCellValue('J'.$no.'', '')->getStyle('J'.$no.'')->applyFromArray($arsir);
                        $sheet->setCellValue('K'.$no.'', '')->getStyle('K'.$no.'')->applyFromArray($arsir);
                    }else if($haha['STATUS_CODE'] == 'MA'){
                        $sheet->setCellValue('I'.$no.'', '')->getStyle('I'.$no.'')->applyFromArray($arsir);
                        $sheet->setCellValue('J'.$no.'', '')->getStyle('J'.$no.'')->applyFromArray($kontenputihleft);
                        $sheet->setCellValue('K'.$no.'', '')->getStyle('K'.$no.'')->applyFromArray($arsir);
                    }else if($haha['STATUS_CODE'] == 'CR'){
                        $sheet->setCellValue('I'.$no.'', '')->getStyle('I'.$no.'')->applyFromArray($arsir);
                        $sheet->setCellValue('J'.$no.'', '')->getStyle('J'.$no.'')->applyFromArray($arsir);
                        $sheet->setCellValue('K'.$no.'', '')->getStyle('K'.$no.'')->applyFromArray($kontenputihleft);
                    }
                }
            }
        }
        
                // // }else if($haha['REJECT_CODE_NAME']== 0){
                // //     echo "";
                // }else{
                //     // echo "";
                //      $sheet->setCellValue('A'.$no.'','')->getStyle('A'.$no.'')->applyFromArray($kontenputihleft);
                // $sheet->mergeCells('B'.$no.':G'.$no.'');
                // $sheet->setCellValue('B'.$no.'', '')->getStyle('B27:G27')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
                // $sheet->setCellValue('H'.$no.'', '')->getStyle('H'.$no.'')->applyFromArray($kontenputihleft);
                // $sheet->setCellValue('I'.$no.'', '')->getStyle('I'.$no.'')->applyFromArray($kontenputihleft);
                // $sheet->setCellValue('J'.$no.'', '')->getStyle('J'.$no.'')->applyFromArray($arsir);
                // $sheet->setCellValue('K'.$no.'', '')->getStyle('K'.$no.'')->applyFromArray($arsir);
                 
              
        // $sheet->setCellValue('A28', '100,02')->getStyle('A28')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B28:G28');
        // $sheet->setCellValue('B28', 'INNER BOX DAMAGED / DIRTY (OFF CENTER/ UNREADABLE/ UNSCANABLE, STICKER)')->getStyle('B28:G28')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H28', '< 2 dots, < 2 mm')->getStyle('H28')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I28', '')->getStyle('I28')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J28', '')->getStyle('J28')->applyFromArray($arsir);
        // $sheet->setCellValue('K28', '')->getStyle('K28')->applyFromArray($arsir);
       

        // $sheet->setCellValue('A29', '100,03')->getStyle('A29')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B29:G29');
        // $sheet->setCellValue('B29', 'INNER BOX DAMAGED / DIRTY (INCLUDE LABELING, LABELING OFF CENTER AND PACKING MATERIALS)')->getStyle('B29:G29')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H29', '> 2 dots, ≥ 2 mm')->getStyle('H29')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I29', '')->getStyle('I29')->applyFromArray($arsir);
        // $sheet->setCellValue('J29', '')->getStyle('J29')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K29', '')->getStyle('K29')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A30', '100,04')->getStyle('A30')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B30:G30');
        // $sheet->setCellValue('B30', 'ACCESSORIES/ATTACHMENTS MISSING OR IN BAD QUALITY )')->getStyle('B30:G30')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H30', '')->getStyle('H30')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I30', '')->getStyle('I30')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J30', '')->getStyle('J30')->applyFromArray($arsir);
        // $sheet->setCellValue('K30', '')->getStyle('K30')->applyFromArray($arsir);
       
        // $sheet->setCellValue('A31', '100,05')->getStyle('A31')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B31:G31');
        // $sheet->setCellValue('B31', "ODD PAIR (BOTH LEFT/RIGHT SHOES IN PAIR, DIFFERENT SIZE IN ONE PAIR, SHOE'S SIZE NOT AS LABEL/STICKER)")->getStyle('B31:G31')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H31', '')->getStyle('H31')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I31', '')->getStyle('I31')->applyFromArray($arsir);
        // $sheet->setCellValue('J31', '')->getStyle('J31')->applyFromArray($arsir);
        // $sheet->setCellValue('K31', '')->getStyle('K31')->applyFromArray($kontenputihleft);
        

        // $sheet->setCellValue('A32', '100,06')->getStyle('A32')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B32:G32');
        // $sheet->setCellValue('B32', "SIZE LABEL AND HANGTAG IN BAD QUALITY (PEEL OFF, UNCLEAR, ETC.) OR MISSING")->getStyle('B32:G32')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H32', '')->getStyle('H32')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I32', '')->getStyle('I32')->applyFromArray($arsir);
        // $sheet->setCellValue('J32', '')->getStyle('J32')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K32', '')->getStyle('K32')->applyFromArray($arsir);
       

        // $sheet->setCellValue('A33', '100,07')->getStyle('A33')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B33:G33');
        // $sheet->setCellValue('B33', "WRONG MATERIAL CONTENT LABELOR HANGTAG")->getStyle('B33:G33')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H33', '')->getStyle('H33')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I33', '')->getStyle('I33')->applyFromArray($arsir);
        // $sheet->setCellValue('J33', '')->getStyle('J33')->applyFromArray($arsir);
        // $sheet->setCellValue('K33', '')->getStyle('K33')->applyFromArray($kontenputihleft);
       
        // $sheet->setCellValue('A34', '200')->getStyle('A34')->applyFromArray($kontenboldabuleft);
        // $sheet->mergeCells('B34:G34');
        // $sheet->setCellValue('B34', "INSIDE THE SHOE")->getStyle('B34:G34')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H34', '')->getStyle('H34')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('I34', '')->getStyle('I34')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('J34', '')->getStyle('J34')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('K34', '')->getStyle('K34')->applyFromArray($kontenboldabuleft);
       

        // $sheet->setCellValue('A35', '200,01')->getStyle('A35')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B35:G35');
        // $sheet->setCellValue('B35', "CONTAMINATION (STAINS, CEMENT, etc.)")->getStyle('B35:G35')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H35', '< 2 dots,< 2 mm')->getStyle('H35')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I35', '')->getStyle('I35')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J35', '')->getStyle('J35')->applyFromArray($arsir);
        // $sheet->setCellValue('K35', '')->getStyle('K35')->applyFromArray($arsir);
      
        // $sheet->setCellValue('A36', '200,02')->getStyle('A36')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B36:G36');
        // $sheet->setCellValue('B36', "CONTAMINATION (STAINS, CEMENT, etc.)")->getStyle('B36:G36')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H36', '> 2 dots, ≥ 2mm')->getStyle('H36')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I36', '')->getStyle('I36')->applyFromArray($arsir);
        // $sheet->setCellValue('J36', '')->getStyle('J36')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K36', '')->getStyle('K36')->applyFromArray($arsir);
       
        // $sheet->setCellValue('A37', '200,03')->getStyle('A37')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B37:G37');
        // $sheet->setCellValue('B37', "METAL PIECE/SHARP PIECE OR any foreign object that could cause ham/injury to customer.")->getStyle('B37:G37')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H37', '')->getStyle('H37')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I37', '')->getStyle('I37')->applyFromArray($arsir);
        // $sheet->setCellValue('J37', '')->getStyle('J37')->applyFromArray($arsir);
        // $sheet->setCellValue('K37', '')->getStyle('K37')->applyFromArray($kontenputihleft);
        

        // $sheet->setCellValue('A38', '200,04')->getStyle('A38')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B38:G38');
        // $sheet->setCellValue('B38', "MINOR/SOFT FOLD, WRINKLES IN LINING OR LOOSE LINING")->getStyle('B38:G38')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H38', '')->getStyle('H38')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I38', '')->getStyle('I38')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J38', '')->getStyle('J38')->applyFromArray($arsir);
        // $sheet->setCellValue('K38', '')->getStyle('K38')->applyFromArray($arsir);
       

        // $sheet->setCellValue('A39', '200,05')->getStyle('A39')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B39:G39');
        // $sheet->setCellValue('B39', "NOTICEABLE/MAJOR/HARD FOLDS, WRINKLES IN LINING OR LOOSE LINING ")->getStyle('B39:G39')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H39', '')->getStyle('H39')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I39', '')->getStyle('I39')->applyFromArray($arsir);
        // $sheet->setCellValue('J39', '')->getStyle('J39')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K39', '')->getStyle('K39')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A40', '200,06')->getStyle('A40')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B40:G40');
        // $sheet->setCellValue('B40', "LINING MATERIAL DAMAGED")->getStyle('B40:G40')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H40', '')->getStyle('H40')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I40', '')->getStyle('I40')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J40', '')->getStyle('J40')->applyFromArray($arsir);
        // $sheet->setCellValue('K40', '')->getStyle('K40')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A41', '200,07')->getStyle('A41')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B41:G41');
        // $sheet->setCellValue('B41', "LINING NOT SECURED BY STROBEL STITCHING OR LASTING")->getStyle('B41:G41')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H41', '')->getStyle('H41')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I41', '')->getStyle('I41')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J41', '')->getStyle('J41')->applyFromArray($arsir);
        // $sheet->setCellValue('K41', '')->getStyle('K41')->applyFromArray($arsir);
       

        // $sheet->setCellValue('A42', '200,08')->getStyle('A42')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B42:G42');
        // $sheet->setCellValue('B42', "SOCKLINER POOR QUALITY OF PRINT, EMBOSS, LOGO")->getStyle('B42:G42')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H42', '')->getStyle('H42')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I42', '')->getStyle('I42')->applyFromArray($arsir);
        // $sheet->setCellValue('J42', '')->getStyle('J42')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K42', '')->getStyle('K42')->applyFromArray($arsir);
       

        // $sheet->setCellValue('A43', '200,09')->getStyle('A43')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B43:G43');
        // $sheet->setCellValue('B43', "SOCKLINER OFF-SPEC.  (THICKNESS, LENGTH)")->getStyle('B43:G43')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H43', '')->getStyle('H43')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I43', '')->getStyle('I43')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J43', '')->getStyle('J43')->applyFromArray($arsir);
        // $sheet->setCellValue('K43', '')->getStyle('K43')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A44', '200,10')->getStyle('A44')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B44:G44');
        // $sheet->setCellValue('B44', "POOR CEMENTING SOCKLINER TO INSOLE BOARD")->getStyle('B44:G44')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H44', '')->getStyle('H44')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I44', '')->getStyle('I44')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J44', '')->getStyle('J44')->applyFromArray($arsir);
        // $sheet->setCellValue('K44', '')->getStyle('K44')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A45', '200,11')->getStyle('A45')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B45:G45');
        // $sheet->setCellValue('B45', "MINOR/SOFT WRINKLED SOCKLINER/INSOLE BOARD")->getStyle('B45:G45')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H45', '')->getStyle('H45')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I45', '')->getStyle('I45')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J45', '')->getStyle('J45')->applyFromArray($arsir);
        // $sheet->setCellValue('K45', '')->getStyle('K45')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A46', '200,12')->getStyle('A46')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B46:G46');
        // $sheet->setCellValue('B46', "NOTICEABLE/MAJOR/HARD WRINKLED SOCKLINER/INSOLE BOARD")->getStyle('B46:G46')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H46', '')->getStyle('H46')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I46', '')->getStyle('I46')->applyFromArray($arsir);
        // $sheet->setCellValue('J46', '')->getStyle('J46')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K46', '')->getStyle('K46')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A47', '200,13')->getStyle('A47')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B47:G47');
        // $sheet->setCellValue('B47', "MISSING SOCKLINER ")->getStyle('B47:G47')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H47', '')->getStyle('H47')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I47', '')->getStyle('I47')->applyFromArray($arsir);
        // $sheet->setCellValue('J47', '')->getStyle('J47')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K47', '')->getStyle('K47')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A48', '200,14')->getStyle('A48')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B48:G48');
        // $sheet->setCellValue('B48', "WRONG COLOR OF LINING, SOCKLINER, LOGO OR PRINT")->getStyle('B48:G48')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H48', '')->getStyle('H48')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I48', '')->getStyle('I48')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J48', '')->getStyle('J48')->applyFromArray($arsir);
        // $sheet->setCellValue('K48', '')->getStyle('K48')->applyFromArray($arsir);
       

        // $sheet->setCellValue('A49', '200,15')->getStyle('A49')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B49:G49');
        // $sheet->setCellValue('B49', "DELAMINATION SOCKLINER COVER ")->getStyle('B49:G49')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H49', '')->getStyle('H49')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I49', '')->getStyle('I49')->applyFromArray($arsir);
        // $sheet->setCellValue('J49', '')->getStyle('J49')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K49', '')->getStyle('K49')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A50', '200,16')->getStyle('A50')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B50:G50');
        // $sheet->setCellValue('B50', "WRONG SIZE OR POSITION OF HEEL COUNTER/DAMAGED OR POOR TOE BOX")->getStyle('B50:G50')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H50', '')->getStyle('H50')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I50', '')->getStyle('I50')->applyFromArray($arsir);
        // $sheet->setCellValue('J50', '')->getStyle('J50')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K50', '')->getStyle('K50')->applyFromArray($arsir);
       

        // $sheet->setCellValue('A51', '200,17')->getStyle('A51')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B51:G51');
        // $sheet->setCellValue('B51', "OTHER DEFECTS")->getStyle('B51:G51')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H51', '')->getStyle('H51')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I51', '')->getStyle('I51')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J51', '')->getStyle('J51')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K51', '')->getStyle('K51')->applyFromArray($kontenputihleft);
        

        // $sheet->setCellValue('A52', '300')->getStyle('A52')->applyFromArray($kontenboldabuleft);
        // $sheet->mergeCells('B52:G52');
        // $sheet->setCellValue('B52', "UPPER")->getStyle('B52:G52')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H52', '')->getStyle('H52')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('I52', '')->getStyle('I52')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('J52', '')->getStyle('J52')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('K52', '')->getStyle('K52')->applyFromArray($kontenboldabuleft);
        

        // $sheet->setCellValue('A53', '310')->getStyle('A53')->applyFromArray($kontenboldabuleft);
        // $sheet->mergeCells('B53:G53');
        // $sheet->setCellValue('B53', "UPPER MATERIALS")->getStyle('B53:G53')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H53', '')->getStyle('H53')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('I53', '')->getStyle('I53')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('J53', '')->getStyle('J53')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('K53', '')->getStyle('K53')->applyFromArray($kontenboldabuleft);
        
        // $sheet->setCellValue('A54', '310,01')->getStyle('A54')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B54:G54');
        // $sheet->setCellValue('B54', "LEATHER DEFECTS (LOOSE GRAIN, PEELING, ORANGE PEEL, EDGES NOT DYED AS REQUESTED, ETC.)")->getStyle('B54:G54')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H54', '')->getStyle('H54')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I54', '')->getStyle('I54')->applyFromArray($arsir);
        // $sheet->setCellValue('J54', '')->getStyle('J54')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K54', '')->getStyle('K54')->applyFromArray($arsir);
        
        // $sheet->setCellValue('A55', '310,02')->getStyle('A55')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B55:G55');
        // $sheet->setCellValue('B55', "MATERIAL BROKEN, POOR MATERIAL QUALITY (TEXTILE, SYNTHETIC, MESH, ETC. )/POOR LEATHER (HAIRY,FRAYED EDGE)")->getStyle('B55:G55')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H55', '')->getStyle('H55')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I55', '')->getStyle('I55')->applyFromArray($arsir);
        // $sheet->setCellValue('J55', '')->getStyle('J55')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K55', '')->getStyle('K55')->applyFromArray($arsir);
        
        // $sheet->setCellValue('A56', '310,03')->getStyle('A56')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B56:G56');
        // $sheet->setCellValue('B56', "COLOR DIFFERENCE/LEATHER GRAIN DIFFERENCE BETWEEN LEFT AND RIGHT SHOE")->getStyle('B56:G56')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H56', '')->getStyle('H56')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I56', '')->getStyle('I56')->applyFromArray($arsir);
        // $sheet->setCellValue('J56', '')->getStyle('J56')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K56', '')->getStyle('K56')->applyFromArray($arsir);
       
        
        // $sheet->setCellValue('A57', '310,04')->getStyle('A57')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B57:G57');
        // $sheet->setCellValue('B57', "SHARP EDGE/ POINT (for children's shoes) OR any foreign object that could cause ham/injury to customer. ")->getStyle('B57:G57')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H57', '')->getStyle('H57')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I57', '')->getStyle('I57')->applyFromArray($arsir);
        // $sheet->setCellValue('J57', '')->getStyle('J57')->applyFromArray($arsir);
        // $sheet->setCellValue('K57', '')->getStyle('K57')->applyFromArray($kontenputihleft);
       

        // $sheet->setCellValue('A58', '320')->getStyle('A58')->applyFromArray($kontenboldabuleft);
        // $sheet->mergeCells('B58:G58');
        // $sheet->setCellValue('B58', "UPPER STITCHING")->getStyle('B58:G58')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H58', '')->getStyle('H58')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('I58', '')->getStyle('I58')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('J58', '')->getStyle('J58')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('K58', '')->getStyle('K58')->applyFromArray($kontenboldabuleft);
        

        // $sheet->setCellValue('A59', '320,01')->getStyle('A59')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B59:G59');
        // $sheet->setCellValue('B59', "WRONG STITCH LENGTH")->getStyle('B59:G59')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H59', 'not 9-10 stitches/inch')->getStyle('H59')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('I59', '')->getStyle('I59')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J59', '')->getStyle('J59')->applyFromArray($arsir);
        // $sheet->setCellValue('K59', '')->getStyle('K59')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A60', '320,02')->getStyle('A60')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B60:G60');
        // $sheet->setCellValue('B60', "WRONG ZIG-ZAG STITCH LENGTH")->getStyle('B60:G60')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H60', 'not 8 stitches/inch')->getStyle('H60')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I60', '')->getStyle('I60')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J60', '')->getStyle('J60')->applyFromArray($arsir);
        // $sheet->setCellValue('K60', '')->getStyle('K60')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A61', '320,03')->getStyle('A61')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B61:G61');
        // $sheet->setCellValue('B61', "POOR STITCHING MARGIN, POOR STITCHING EDGE DISTANCE (1mm < adidas edge distance's standard < 2.5mm)")->getStyle('B61:G61')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H61', '')->getStyle('H61')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I61', '')->getStyle('I61')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J61', '')->getStyle('J61')->applyFromArray($arsir);
        // $sheet->setCellValue('K61', '')->getStyle('K61')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A62', '320,04')->getStyle('A62')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B62:G62');
        // $sheet->setCellValue('B62', "BROKEN STITCHING/LOOSE STITCHING/SKIPPED STITCHING/OPEN SEAM")->getStyle('B62:G62')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H62', '')->getStyle('H62')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I62', '')->getStyle('I62')->applyFromArray($arsir);
        // $sheet->setCellValue('J62', '')->getStyle('J62')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K62', '')->getStyle('K62')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A63', '320,05')->getStyle('A63')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B63:G63');
        // $sheet->setCellValue('B63', "INSECURE BACK/LOCK-STITCH")->getStyle('B63:G63')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H63', '')->getStyle('H63')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I63', '')->getStyle('I63')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J63', '')->getStyle('J63')->applyFromArray($arsir);
        // $sheet->setCellValue('K63', '')->getStyle('K63')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A64', '320,06')->getStyle('A64')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B64:G64');
        // $sheet->setCellValue('B64', "WAVY/INCONSISTENT STITCHING")->getStyle('B64:G64')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H64', '')->getStyle('H64')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I64', '')->getStyle('I64')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J64', '')->getStyle('J64')->applyFromArray($arsir);
        // $sheet->setCellValue('K64', '')->getStyle('K64')->applyFromArray($arsir);
        
        // $sheet->setCellValue('A65', '320,07')->getStyle('A65')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B65:G65');
        // $sheet->setCellValue('B65', "NEEDLE HOLES / CUTS")->getStyle('B65:G65')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H65', '')->getStyle('H65')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I65', '')->getStyle('I65')->applyFromArray($arsir);
        // $sheet->setCellValue('J65', '')->getStyle('J65')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K65', '')->getStyle('K65')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A66', '320,08')->getStyle('A66')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B66:G66');
        // $sheet->setCellValue('B66', "THREAD ENDS")->getStyle('B66:G66')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H66', '>2 mm')->getStyle('H66')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I66', '')->getStyle('I66')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J66', '')->getStyle('J66')->applyFromArray($arsir);
        // $sheet->setCellValue('K66', '')->getStyle('K66')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A67', '320,09')->getStyle('A67')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B67:G67');
        // $sheet->setCellValue('B67', "WRONG THREAD OR WRONG COLOR")->getStyle('B67:G67')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H67', '')->getStyle('H67')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I67', '')->getStyle('I67')->applyFromArray($arsir);
        // $sheet->setCellValue('J67', '')->getStyle('J67')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K67', '')->getStyle('K67')->applyFromArray($arsir);
       
        // $sheet->setCellValue('A68', '330')->getStyle('A68')->applyFromArray($kontenboldabuleft);
        // $sheet->mergeCells('B68:G68');
        // $sheet->setCellValue('B68', "UPPER TREATMENTS (LOGO, EMBROIDERY, HF WELDING,DE-AND EMBOSS, PRINT, COMPONENTS, etc)")->getStyle('B68:G68')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H68', '')->getStyle('H68')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('I68', '')->getStyle('I68')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('J68', '')->getStyle('J68')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('K68', '')->getStyle('K68')->applyFromArray($kontenboldabuleft);
        

        // $sheet->setCellValue('A69', '330,01')->getStyle('A69')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B69:G69');
        // $sheet->setCellValue('B69', "WRONG COLOR/ COLOR DIFFERENCE")->getStyle('B69:G69')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H69', '')->getStyle('H69')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I69', '')->getStyle('I69')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J69', '')->getStyle('J69')->applyFromArray($arsir);
        // $sheet->setCellValue('K69', '')->getStyle('K69')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A70', '330,02')->getStyle('A70')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B70:G70');
        // $sheet->setCellValue('B70', "MISSING")->getStyle('B70:G70')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H70', '')->getStyle('H70')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I70', '')->getStyle('I70')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J70', '')->getStyle('J70')->applyFromArray($arsir);
        // $sheet->setCellValue('K70', '')->getStyle('K70')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A71', '330,03')->getStyle('A71')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B71:G71');
        // $sheet->setCellValue('B71', "POOR SYMMETRY/ OFF POSITION/WRONG SIZE")->getStyle('B71:G71')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H71', '')->getStyle('H71')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I71', '')->getStyle('I71')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J71', '')->getStyle('J71')->applyFromArray($arsir);
        // $sheet->setCellValue('K71', '')->getStyle('K71')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A72', '330,04')->getStyle('A72')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B72:G72');
        // $sheet->setCellValue('B72', "POOR DEFINITION, NOT CLEAN, NOT CLEAR, DELAMINATION")->getStyle('B72:G72')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H72', '')->getStyle('H72')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I72', '')->getStyle('I72')->applyFromArray($arsir);
        // $sheet->setCellValue('J72', '')->getStyle('J72')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K72', '')->getStyle('K72')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A73', '340')->getStyle('A73')->applyFromArray($kontenboldabuleft);
        // $sheet->mergeCells('B73:G73');
        // $sheet->setCellValue('B73', "UPPER APPERANCE")->getStyle('B73:G73')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H73', '')->getStyle('H73')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('I73', '')->getStyle('I73')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('J73', '')->getStyle('J73')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('K73', '')->getStyle('K73')->applyFromArray($kontenboldabuleft);
        

        // $sheet->setCellValue('A74', '340,01')->getStyle('A74')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B74:G74');
        // $sheet->setCellValue('B74', "CONTAMINATION (Stains, printing mark) ")->getStyle('B74:G74')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H74', '< 2 dots,< 2 mm')->getStyle('H74')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I74', '')->getStyle('I74')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J74', '')->getStyle('J74')->applyFromArray($arsir);
        // $sheet->setCellValue('K74', '')->getStyle('K74')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A75', '340,02')->getStyle('A75')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B75:G75');
        // $sheet->setCellValue('B75', "CONTAMINATION (Stains, printing mark) ")->getStyle('B75:G75')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H75', '>2 dots, ≥ 2mm')->getStyle('H75')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I75', '')->getStyle('I75')->applyFromArray($arsir);
        // $sheet->setCellValue('J75', '')->getStyle('J75')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K75', '')->getStyle('K75')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A76', '340,03')->getStyle('A76')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B76:G76');
        // $sheet->setCellValue('B76', "OVER CEMENTING OR PRIMING ")->getStyle('B76:G76')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H76', '<4mm length, >2mm width ')->getStyle('H76')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('I76', '')->getStyle('I76')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J76', '')->getStyle('J76')->applyFromArray($arsir);
        // $sheet->setCellValue('K76', '')->getStyle('K76')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A77', '340,04')->getStyle('A77')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B77:G77');
        // $sheet->setCellValue('B77', "OVER CEMENTING OR PRIMING ")->getStyle('B77:G77')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H77', '<4mm length, >2mm width ')->getStyle('H77')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('I77', '')->getStyle('I77')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J77', '')->getStyle('J77')->applyFromArray($arsir);
        // $sheet->setCellValue('K77', '')->getStyle('K77')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A78', '340,05')->getStyle('A78')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B78:G78');
        // $sheet->setCellValue('B78', "POOR TOUCH UP/PAINTING,MARKING LINE")->getStyle('B78:G78')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H78', '')->getStyle('H78')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I78', '')->getStyle('I78')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J78', '')->getStyle('J78')->applyFromArray($arsir);
        // $sheet->setCellValue('K78', '')->getStyle('K78')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A79', '340,06')->getStyle('A79')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B79:G79');
        // $sheet->setCellValue('B79', "COLOR CHANGE /MIGRATION/BLEEDING")->getStyle('B79:G79')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H79', '')->getStyle('H79')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I79', '')->getStyle('I79')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J79', '')->getStyle('J79')->applyFromArray($arsir);
        // $sheet->setCellValue('K79', '')->getStyle('K79')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A80', '340,07')->getStyle('A80')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B80:G80');
        // $sheet->setCellValue('B80', "OFF CENTER TOE TO HEEL / CROOKED ")->getStyle('B80:G80')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H80', '<=3mm')->getStyle('H80')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I80', '')->getStyle('I80')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J80', '')->getStyle('J80')->applyFromArray($arsir);
        // $sheet->setCellValue('K80', '')->getStyle('K80')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A81', '340,08')->getStyle('A81')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B81:G81');
        // $sheet->setCellValue('B81', "OFF CENTER TOE TO HEEL / CROOKED ")->getStyle('B81:G81')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H81', '>3mm')->getStyle('H81')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I81', '')->getStyle('I81')->applyFromArray($arsir);
        // $sheet->setCellValue('J81', '')->getStyle('J81')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K81', '')->getStyle('K81')->applyFromArray($arsir);
       

        // $sheet->setCellValue('A82', '340,09')->getStyle('A82')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B82:G82');
        // $sheet->setCellValue('B82', "POOR SHAPE (WRINKLES/COLLAPSING/TOE SPRING")->getStyle('B82:G82')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H82', '')->getStyle('H82')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I82', '')->getStyle('I82')->applyFromArray($arsir);
        // $sheet->setCellValue('J82', '')->getStyle('J82')->applyFromArray($arsir);
        // $sheet->setCellValue('K82', '')->getStyle('K82')->applyFromArray($kontenputihleft);
       

        // $sheet->setCellValue('A83', '340,10')->getStyle('A83')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B83:G83');
        // $sheet->setCellValue('B83', "PATTERN VARIATION different between LEFT and RIGHT shoes (when not intended by MCS)")->getStyle('B83:G83')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H83', '')->getStyle('H83')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I83', '')->getStyle('I83')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J83', '')->getStyle('J83')->applyFromArray($arsir);
        // $sheet->setCellValue('K83', '')->getStyle('K83')->applyFromArray($arsir);
        
        // $sheet->setCellValue('A84', '340,11')->getStyle('A84')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B84:G84');
        // $sheet->setCellValue('B84', "POOR SKIVING/ X RAY/ PRESSING MARKS")->getStyle('B84:G84')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H84', '')->getStyle('H84')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I84', '')->getStyle('I84')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J84', '')->getStyle('J84')->applyFromArray($arsir);
        // $sheet->setCellValue('K84', '')->getStyle('K84')->applyFromArray($arsir);
       

        // $sheet->setCellValue('A85', '340,12')->getStyle('A85')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B85:G85');
        // $sheet->setCellValue('B85', "TONGUE MISSPLACED, LOOSE/EYESTAY NOT ALIGNED, HOLES NOT PUNCHED PROPERLY")->getStyle('B85:G85')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H85', '')->getStyle('H85')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I85', '')->getStyle('I85')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J85', '')->getStyle('J85')->applyFromArray($arsir);
        // $sheet->setCellValue('K85', '')->getStyle('K85')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A86', '340,13')->getStyle('A86')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B86:G86');
        // $sheet->setCellValue('B86', "MIS-MATCHING, INCORRECT MEDIAL AND LATERAL QUARTER AND BACK HEIGHT")->getStyle('B86:G86')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H86', '<=3mm')->getStyle('H86')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I86', '')->getStyle('I86')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J86', '')->getStyle('J86')->applyFromArray($arsir);
        // $sheet->setCellValue('K86', '')->getStyle('K86')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A87', '340,14')->getStyle('A87')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B87:G87');
        // $sheet->setCellValue('B87', "MIS-MATCHING, INCORRECT MEDIAL AND LATERAL QUARTER AND BACK HEIGHT")->getStyle('B87:G87')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H87', '>3mm')->getStyle('H87')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I87', '')->getStyle('I87')->applyFromArray($arsir);
        // $sheet->setCellValue('J87', '')->getStyle('J87')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K87', '')->getStyle('K87')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A88', '340,15')->getStyle('A88')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B88:G88');
        // $sheet->setCellValue('B88', "UNEVEN COLLAR TOP LINE")->getStyle('B88:G88')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H88', '')->getStyle('H88')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I88', '')->getStyle('I88')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J88', '')->getStyle('J88')->applyFromArray($arsir);
        // $sheet->setCellValue('K88', '')->getStyle('K88')->applyFromArray($arsir);
       

        // $sheet->setCellValue('A89', '350')->getStyle('A89')->applyFromArray($kontenboldabuleft);
        // $sheet->mergeCells('B89:G89');
        // $sheet->setCellValue('B89', "LACES / VELCROS/ SPEED LACE")->getStyle('B89:G89')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H89', '')->getStyle('H89')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('I89', '')->getStyle('I89')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('J89', '')->getStyle('J89')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('K89', '')->getStyle('K89')->applyFromArray($kontenboldabuleft);
        

        // $sheet->setCellValue('A90', '350,01')->getStyle('A90')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B90:G90');
        // $sheet->setCellValue('B90', "LACE/LACE LENGTH OUT OF SPEC (TOO SHORT OR LONG)")->getStyle('B90:G90')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H90', '<=3mm')->getStyle('H90')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I90', '')->getStyle('I90')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J90', '')->getStyle('J90')->applyFromArray($arsir);
        // $sheet->setCellValue('K90', '')->getStyle('K90')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A91', '350,02')->getStyle('A91')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B91:G91');
        // $sheet->setCellValue('B91', "LACE/LACE LENGTH OUT OF SPEC (TOO SHORT OR LONG)")->getStyle('B91:G91')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H91', '>3mm')->getStyle('H91')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I91', '')->getStyle('I91')->applyFromArray($arsir);
        // $sheet->setCellValue('J91', '')->getStyle('J91')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K91', '')->getStyle('K91')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A92', '350,03')->getStyle('A92')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B92:G92');
        // $sheet->setCellValue('B92', "LACE / VELCRO / SPEED LACE LENGTH OUT OF SPEC (TOO SHORT OR LONG)")->getStyle('B92:G92')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H92', '<=2mm')->getStyle('H92')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I92', '')->getStyle('I92')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J92', '')->getStyle('J92')->applyFromArray($arsir);
        // $sheet->setCellValue('K92', '')->getStyle('K92')->applyFromArray($arsir);
       
        // $sheet->setCellValue('A93', '350,04')->getStyle('A93')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B93:G93');
        // $sheet->setCellValue('B93', "LACE / VELCRO / SPEED LACE LENGTH OUT OF SPEC (TOO SHORT OR LONG)")->getStyle('B93:G93')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H93', '>2mm')->getStyle('H93')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I93', '')->getStyle('I93')->applyFromArray($arsir);
        // $sheet->setCellValue('J93', '')->getStyle('J93')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K93', '')->getStyle('K93')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A94', '350,05')->getStyle('A94')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B94:G94');
        // $sheet->setCellValue('B94', "LACE / VELCRO / SPEED LACE WRONG COLOR, WRONG MATERIAL, DAMAGED, BROKEN OR NOT FUNCTIONING")->getStyle('B94:G94')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H94', '')->getStyle('H94')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I94', '')->getStyle('I94')->applyFromArray($arsir);
        // $sheet->setCellValue('J94', '')->getStyle('J94')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K94', '')->getStyle('K94')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A95', '350,06')->getStyle('A95')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B95:G95');
        // $sheet->setCellValue('B95', "CONTAMINATION")->getStyle('B95:G95')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H95', '')->getStyle('H95')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I95', '')->getStyle('I95')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J95', '')->getStyle('J95')->applyFromArray($arsir);
        // $sheet->setCellValue('K95', '')->getStyle('K95')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A96', '350,07')->getStyle('A96')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B96:G96');
        // $sheet->setCellValue('B96', "FRAYING")->getStyle('B96:G96')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H96', '')->getStyle('H96')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I96', '')->getStyle('I96')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J96', '')->getStyle('J96')->applyFromArray($arsir);
        // $sheet->setCellValue('K96', '')->getStyle('K96')->applyFromArray($arsir);
        


        // $sheet->setCellValue('A97', '360')->getStyle('A97')->applyFromArray($kontenboldabuleft);
        // $sheet->mergeCells('B97:G97');
        // $sheet->setCellValue('B97', "OTHER DEFECTS (THAT NEED REPORT AND CONSULT WITH ADIDAS PRODUCTION/QUALITY)")->getStyle('B97:G97')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H97', '')->getStyle('H97')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('I97', '')->getStyle('I97')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('J97', '')->getStyle('J97')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('K97', '')->getStyle('K97')->applyFromArray($kontenboldabuleft);
        

        // $sheet->setCellValue('A98', '400')->getStyle('A98')->applyFromArray($kontenboldabuleft);
        // $sheet->mergeCells('B98:G98');
        // $sheet->setCellValue('B98', "BOTTOM AND STOCKFITTING (attaching midsole and components to outsole)")->getStyle('B98:G98')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H98', '')->getStyle('H98')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('I98', '')->getStyle('I98')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('J98', '')->getStyle('J98')->applyFromArray($kontenboldabuleft);
        // $sheet->setCellValue('K98', '')->getStyle('K98')->applyFromArray($kontenboldabuleft);
       
        // $sheet->setCellValue('A99', '400,01')->getStyle('A99')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B99:G99');
        // $sheet->setCellValue('B99', "CONTAMINATION (Stains)")->getStyle('B99:G99')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H99', '< 2 dots,< 2 mm')->getStyle('H99')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I99', '')->getStyle('I99')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J99', '')->getStyle('J99')->applyFromArray($arsir);
        // $sheet->setCellValue('K99', '')->getStyle('K99')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A100', '400,02')->getStyle('A100')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B100:G100');
        // $sheet->setCellValue('B100', "CONTAMINATION (Stains)")->getStyle('B100:G100')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H100', '>2 dots, ≥ 2mm')->getStyle('H100')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('I100', '')->getStyle('I100')->applyFromArray($arsir);
        // $sheet->setCellValue('J100', '')->getStyle('J100')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K100', '')->getStyle('K100')->applyFromArray($arsir);
       

        // $sheet->setCellValue('A101', '400,03')->getStyle('A101')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B101:G101');
        // $sheet->setCellValue('B101', "OVER CEMENTING OR PRIMING ")->getStyle('B101:G101')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H101', '<4mm length,<2mm width ')->getStyle('H101')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('I101', '')->getStyle('I101')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J101', '')->getStyle('J101')->applyFromArray($arsir);
        // $sheet->setCellValue('K101', '')->getStyle('K101')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A102', '400,04')->getStyle('A102')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B102:G102');
        // $sheet->setCellValue('B102', "OVER CEMENTING OR PRIMING ")->getStyle('B102:G102')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H102', '>=4mm length, >=2mm width ')->getStyle('H102')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('I102', '')->getStyle('I102')->applyFromArray($arsir);
        // $sheet->setCellValue('J102', '')->getStyle('J102')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('K102', '')->getStyle('K102')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A103', '400,05')->getStyle('A103')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B103:G103');
        // $sheet->setCellValue('B103', "POOR TOUCH UP/PAINTING. MARKING LINE")->getStyle('B103:G103')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H103', '')->getStyle('H103')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('I103', '')->getStyle('I103')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J103', '')->getStyle('J103')->applyFromArray($arsir);
        // $sheet->setCellValue('K103', '')->getStyle('K103')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A104', '400,06')->getStyle('A104')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B104:G104');
        // $sheet->setCellValue('B104', "WRONG OR POOR OUTSOLE STITCHING")->getStyle('B104:G104')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H104', 'not 8-10mm/stitch')->getStyle('H104')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('I104', '')->getStyle('I104')->applyFromArray($kontenputihleft);
        // $sheet->setCellValue('J104', '')->getStyle('J104')->applyFromArray($arsir);
        // $sheet->setCellValue('K104', '')->getStyle('K104')->applyFromArray($arsir);
        

        // $sheet->setCellValue('A105', '400,07')->getStyle('A105')->applyFromArray($kontenputihleft);
        // $sheet->mergeCells('B105:G105');
        // $sheet->setCellValue('B105', "COLOR RELATED ( WRONG COLOR,BLEEDING, MIGRATION, YELLOWING, ETC) ")->getStyle('B105:G105')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('H105', '')->getStyle('H105')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        // $sheet->setCellValue('I105', '')->getStyle('I105')->applyFromArray($arsir);
        // $sheet->setCellValue('J105', '')->getStyle('J105')->applyFromArray($arsir);
        // $sheet->setCellValue('K105', '')->getStyle('K105')->applyFromArray($kontenputihleft);
        

        $sheet->mergeCells('A106:K106');
        $sheet->setCellValue('A106', '')->getStyle('A106:K106')->applyFromArray($kontenratatengah);
        $sheet->mergeCells('L106:Q106');
        $sheet->setCellValue('L106', 'TOTAL DEFECT : ')->getStyle('L106:Q106')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('R106', '')->getStyle('R106')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('S106', '')->getStyle('S106')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('T106', '')->getStyle('T106')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('U106', '')->getStyle('U106')->applyFromArray($kontenratatengah);

        $sheet->mergeCells('H108:I108');
        $sheet->setCellValue('H108', 'Accepted')->getStyle('H108:I108')->applyFromArray($biru);
        $sheet->setCellValue('J108', '')->getStyle('J108')->applyFromArray($kontenratatengah);

        $sheet->mergeCells('L108:M108');
        $sheet->setCellValue('L108', 'Rejected')->getStyle('L108:M108')->applyFromArray($merahleft);
        $sheet->setCellValue('N108', '')->getStyle('N108')->applyFromArray($kontenratatengah);

        $sheet->mergeCells('A110:D110');
        $sheet->setCellValue('A110', 'COMMENT(S) / CORRECTIVE ACTION(S) REQUIRED:')->getStyle('A110:D110')->applyFromArray($tanpagaris);

        $sheet->mergeCells('A111:U111');
        $sheet->setCellValue('A111', '')->getStyle('A111:U111')->applyFromArray($garistipis);

        $sheet->mergeCells('A113:E113');
        $sheet->setCellValue('A113', 'adidas-Group Prod. Manager*')->getStyle('A113:E113')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('F113:K113');
        $sheet->setCellValue('F113', '')->getStyle('F113:K113')->applyFromArray($garistebal);
        $sheet->mergeCells('L113:M113');
        $sheet->setCellValue('L113', 'Signature /date ')->getStyle('L113:M113')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('N113:U113');
        $sheet->setCellValue('N113', '')->getStyle('N113:U113')->applyFromArray($garistebal);

        $sheet->mergeCells('A114:E114');
        $sheet->setCellValue('A114', 'Inspector**')->getStyle('A114:E114')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('F114:K114');
        $sheet->setCellValue('F114', '')->getStyle('F114:K114')->applyFromArray($garistebal);
        $sheet->mergeCells('L114:M114');
        $sheet->setCellValue('L114', 'Signature /date ')->getStyle('L114:M114')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('N114:U114');
        $sheet->setCellValue('N114', '')->getStyle('N114:U114')->applyFromArray($garistebal);

        $sheet->mergeCells('A115:E115');
        $sheet->setCellValue('A115', 'Factory Rep./  Fty Prod. Head')->getStyle('A115:E115')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('F115:K115');
        $sheet->setCellValue('F115', '')->getStyle('F115:K115')->applyFromArray($garistebal);
        $sheet->mergeCells('L115:M115');
        $sheet->setCellValue('L115', 'Signature /date ')->getStyle('L115:M115')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('N115:U115');
        $sheet->setCellValue('N115', '')->getStyle('N115:U115')->applyFromArray($garistebal);

        $sheet->mergeCells('A116:E116');
        $sheet->setCellValue('A116', '* To be filled after adidas audit')->getStyle('A116:E116')->applyFromArray($tanpagariskecil);
        $sheet->mergeCells('A117:E117');
        $sheet->setCellValue('A117', '**To be filled after factory inspection')->getStyle('A117:E117')->applyFromArray($tanpagariskecil);
        
        $sheet->setCellValue('N118', 'Date Issue #')->getStyle('N118')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('O118:R118');
        $sheet->setCellValue('O118', ': 9/2/2020')->getStyle('O118')->applyFromArray($tanpagaristebal);

        $sheet->setCellValue('N119', 'Revision#')->getStyle('N119')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('O119:R119');
        $sheet->setCellValue('O119', ': 4')->getStyle('O119')->applyFromArray($tanpagaristebal);

        $sheet->setCellValue('N120', 'Control#')->getStyle('N120')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('O120:R120');
        $sheet->setCellValue('O120', ': QIP-HWI/APP/24/00/00-APPENDIX-24')->getStyle('O120')->applyFromArray($tanpagaristebal);

        $spreadsheet->getSheetByName('Worksheet 1');
		
		$filename = 'Report Data';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}

