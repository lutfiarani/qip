<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_report2 extends CI_Controller{
    
    public function __construct(){
        parent:: __construct(); 
        date_default_timezone_set('Asia/Jakarta');
       
		$this->load->model('M_aql_inspect');
		// $this->load->library('Excel');
        sesscheck();
    }


	public function index($po, $partial, $remark, $level, $level_user)
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

        $kontenputihcenter = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
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
        $level_user2= $this->session->userdata('LEVEL');

        $report	    = $this->M_aql_inspect->report($po, $partial, $remark, $level, $level_user);
		$report2 	= $this->M_aql_inspect->report2($po, $partial, $remark, $level, $level_user, $level_user2);
		$report3 	= $this->M_aql_inspect->report3($po, $partial, $remark, $level, $level_user);
		$code    	= $this->M_aql_inspect->code_reject()->result_array();
        

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

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Paid');
        $drawing->setDescription('Paid');
        $drawing->setPath(@$report2->INSPECTOR_SIGN); // put your path and image here
        $drawing->setCoordinates('Q114');
        $drawing->setHeight(27);
        $drawing->setOffsetX(0);
        $drawing->setRotation(0);
        $drawing->getShadow()->setVisible(true);
        $drawing->getShadow()->setDirection(0);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
        
        $writer = new Xlsx($spreadsheet);

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Paid');
        $drawing->setDescription('Paid');
        $drawing->setPath(@$report2->REPRESENTATIVE_SIGN); // put your path and image here
        $drawing->setCoordinates('P113');
        $drawing->setHeight(27);
        $drawing->setOffsetX(0);
        $drawing->setRotation(0);
        $drawing->getShadow()->setVisible(true);
        $drawing->getShadow()->setDirection(0);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
        
        $writer = new Xlsx($spreadsheet);
        
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Paid');
        $drawing->setDescription('Paid');
        $drawing->setPath(@$report2->PRODUCTION_MANAGER_SIGN); // put your path and image here
        $drawing->setCoordinates('O115');
        $drawing->setHeight(27);
        $drawing->setOffsetX(0);
        $drawing->setRotation(0);
        $drawing->getShadow()->setVisible(true);
        $drawing->getShadow()->setDirection(0);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
        
        $writer = new Xlsx($spreadsheet);

        
        
        // $po         = '0126460211';
        // $partial    = '1';
        // $remark     = '2';
        // $level      = 'II';
        // $level_user = '2';

        // $po         = $this->input->post('PO_NO');
        // $partial    = $this->input->post('PARTIAL');
        // $remark     = $this->input->post('REMARK');
        // $level      = $this->input->post('LEVEL');
        // $level_user = $this->input->post('LEVEL_USER');
       
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
        $sheet->getRowDimension('8')->setRowHeight(30.00);
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

        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, 5)->getValue();
        $report1 = $report->row_array();
        // plant cell
        $sheet->setCellValueByColumnAndRow(1, 5, 'Plant / Cell')->getStyle(1,5)->applyFromArray($kontenatas);
        // $sheet->setCellValue('A5', 'Plant / Cell')->getStyle('A5')->applyFromArray($kontenatas);
        $sheet->mergeCells('B5:C5');
        $sheet->setCellValue('B5', 'HWI')->getStyle('B5:C5')->applyFromArray($kontenatas);

        $sheet->setCellValue('A6', 'Article #')->getStyle('A6')->applyFromArray($kontenatas);
        $sheet->mergeCells('B6:C6');
        $sheet->setCellValue('B6', @$report1['ARTICLE'])->getStyle('B6:C6')->applyFromArray($kontenatas);

        $sheet->setCellValue('A7', 'Art. Name')->getStyle('A7')->applyFromArray($kontenatas);
        $sheet->mergeCells('B7:C7');
        $sheet->setCellValue('B7',  @$report1['MODEL_NAME'])->getStyle('B7:C7')->applyFromArray($kontenatas);

        $sheet->setCellValue('A8', 'Color')->getStyle('A8')->applyFromArray($kontenatas);
        $sheet->mergeCells('B8:C8');
        $sheet->setCellValue('B8', @$report1['ZZCLW'])->getStyle('B8:C8')->applyFromArray($kontenatas)->getAlignment()->setWrapText(true);;

        $sheet->setCellValue('A9', 'Gender')->getStyle('A9')->applyFromArray($kontenatas);
        $sheet->mergeCells('B9:C9');
        $sheet->setCellValue('B9',  @$report1['GENDER'])->getStyle('B9:C9')->applyFromArray($kontenatas);


        // Brand
        $sheet->setCellValue('E5', 'Brand')->getStyle('E5')->applyFromArray($kontenatas);
        $sheet->setCellValue('F5', '')->getStyle('F5')->applyFromArray($kontenatas);
        $sheet->setCellValue('G5', '')->getStyle('G5')->applyFromArray($kontenatas);

        $sheet->setCellValue('E6', 'Adidas')->getStyle('E6')->applyFromArray($kontenatas);
        if(@$report1['BRAND'] == 'ADIDAS'){
            $sheet->setCellValue('F6', 'V')->getStyle('F6')->applyFromArray($kontenratatengah);
            $sheet->setCellValue('G6', '')->getStyle('G6')->applyFromArray($kontenratatengah);
        }else{
            $sheet->setCellValue('F6', '')->getStyle('F6')->applyFromArray($kontenratatengah);
            $sheet->setCellValue('G6', '')->getStyle('G6')->applyFromArray($kontenratatengah);
        }

        $sheet->setCellValue('E7', 'Reebok')->getStyle('E7')->applyFromArray($kontenatas);
        if(@$report1['BRAND'] == 'REEBOK'){
            $sheet->setCellValue('F7', 'v')->getStyle('F7')->applyFromArray($kontenratatengah);
            $sheet->setCellValue('G7', '')->getStyle('G7')->applyFromArray($kontenratatengah);
        }else{
            $sheet->setCellValue('F7', '')->getStyle('F7')->applyFromArray($kontenratatengah);
            $sheet->setCellValue('G7', '')->getStyle('G7')->applyFromArray($kontenratatengah);
        }
       


        // PO 
        $sheet->mergeCells('J5:K5');
        $sheet->setCellValue('J5', 'PO #')->getStyle('J5:K5')->applyFromArray($kontenatas);
        $sheet->mergeCells('L5:M5');
        $sheet->setCellValue('L5',  @$report1['PO_NO'])->getStyle('L5:M5')->applyFromArray($kontenatas);

        $sheet->mergeCells('J6:K6');
        $sheet->setCellValue('J6', 'CI item#')->getStyle('J6:K6')->applyFromArray($kontenatas);
        $sheet->mergeCells('L6:M6');
        $sheet->setCellValue('L6', @$report1['IC_NUMBER'])->getStyle('L6:M6')->applyFromArray($kontenatas);

        $sheet->mergeCells('J7:K7');
        $sheet->setCellValue('J7', 'Total Order Qty')->getStyle('J7:K7')->applyFromArray($kontenatas);
        $sheet->mergeCells('L7:M7');
        $sheet->setCellValue('L7',  @$report1['KWMENG'])->getStyle('L7:M7')->applyFromArray($kontenatas);

        $sheet->mergeCells('J8:K8');
        $sheet->setCellValue('J8', 'Actual Qty')->getStyle('J8:K8')->applyFromArray($kontenatas);
        $sheet->mergeCells('L8:M8');
        $sheet->setCellValue('L8', @$report1['PARTIAL_QTY'])->getStyle('L8:M8')->applyFromArray($kontenatas);

        $sheet->mergeCells('J9:K9');
        $sheet->setCellValue('J9', '1st Cnfd Date')->getStyle('J9:K9')->applyFromArray($kontenatas);
        $sheet->mergeCells('L9:M9');
        $sheet->setCellValue('L9', @$report1['ZHSDD'])->getStyle('L9:M9')->applyFromArray($kontenatas);

        $sheet->mergeCells('J10:K10');
        $sheet->setCellValue('J10', 'Customer')->getStyle('J10:K10')->applyFromArray($kontenatas);
        $sheet->mergeCells('L10:M10');
        $sheet->setCellValue('L10',  @$report1['LANDT'])->getStyle('L10:M10')->applyFromArray($kontenatas);


        // INSPECTION DATE 
        $sheet->mergeCells('O5:P5');
        $sheet->setCellValue('O5', 'Inspection Date / Time')->getStyle('O5:P5')->applyFromArray($kontenatas);
        $sheet->mergeCells('Q5:U5');
        $sheet->setCellValue('Q5',  @$report1['INSPECT_DATE'])->getStyle('Q5:U5')->applyFromArray($kontenatas);

        if( @$report1['REMARK']=== 1)
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
        $sheet->setCellValue('Q9', @$report1['INSPECTOR'])->getStyle('Q9:U9')->applyFromArray($kontenatas);


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
        $sheet->setCellValue('C21', ''.@$report2->SAMPLE_LOT.' %')->getStyle('C21:D21')->applyFromArray($kontenatas);
        $sheet->mergeCells('A22:B22');
        $sheet->setCellValue('A22', 'Sample Size')->getStyle('A22:B22')->applyFromArray($kontenratatengah);
        $sheet->mergeCells('C22:D22');
        $sheet->setCellValue('C22', 'Level : '.@$report2->LEVEL.' ')->getStyle('C22:D22')->applyFromArray($kontenatas);

        $sheet->mergeCells('J21:K21');
        $sheet->setCellValue('J21', 'Cartons')->getStyle('J21:K21')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('L21', @$report2->CARTONS)->getStyle('L21')->applyFromArray($kontenatas);
        $sheet->mergeCells('J22:K22');
        $sheet->setCellValue('J22', 'Pairs')->getStyle('J22:K22')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('L22', @$report2->PAIRS)->getStyle('L22')->applyFromArray($kontenatas);


        $sheet->setCellValue('R20', 'MINOR')->getStyle('R20')->applyFromArray($biru);
        $sheet->setCellValue('S20', 'MAJOR')->getStyle('S20')->applyFromArray($biru);
        $sheet->setCellValue('T20', 'CRITICAL')->getStyle('T20')->applyFromArray($biru);
        $sheet->mergeCells('N21:Q21');
        $sheet->setCellValue('N21', 'Max. defect(s) to accept')->getStyle('N21:Q21')->applyFromArray($biruleft);
        $sheet->mergeCells('N22:Q22');
        $sheet->setCellValue('N22', 'No. of defect(s) to reject')->getStyle('N22:Q22')->applyFromArray($merahleft);
        $sheet->setCellValue('R21', @$report2->QIP_LEVEL_MINOR_ACC)->getStyle('R21')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('S21', @$report2->QIP_LEVEL_MAJOR_ACC)->getStyle('S21')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('T21', @$report2->QIP_LEVEL_CRITIC_ACC)->getStyle('T21')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('R22', @$report2->QIP_LEVEL_MINOR_REJ)->getStyle('R22')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('S22', @$report2->QIP_LEVEL_MAJOR_REJ)->getStyle('S22')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('T22', @$report2->QIP_LEVEL_CRITIC_REJ)->getStyle('T22')->applyFromArray($kontenratatengah);

        

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

        $sheet->mergeCells('L24:L25');
        $sheet->setCellValue('L24', 'CODE DEFECT')->getStyle('L24:L25')->applyFromArray($kontenwraptext)->getAlignment()->setWrapText(true);
        $sheet->mergeCells('M24:Q25');
        $sheet->setCellValue('M24', 'DEFECT DESCRIPTION')->getStyle('M24:Q25')->applyFromArray($kontenwraptext);
        $sheet->mergeCells('R24:R25');
        $sheet->setCellValue('R24', '')->getStyle('R24:R25')->applyFromArray($kontenwraptext);
        $sheet->setCellValue('S24', 'MINOR DEFECT')->getStyle('S24')->applyFromArray($kontenwraptext)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S25', '2,5')->getStyle('S25')->applyFromArray($kontenwraptext);
        $sheet->setCellValue('T24', 'MAJOR DEFECT')->getStyle('T24')->applyFromArray($kontenwraptext)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('T25', '1,5')->getStyle('T25')->applyFromArray($kontenwraptext);
        $sheet->setCellValue('U24', 'CRITICAL DEFECT')->getStyle('U24')->applyFromArray($kontenwraptext)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('U25', '0,0')->getStyle('U25')->applyFromArray($kontenwraptext);

        $sheet->setCellValue('A26', @$report3[0]->CODE)->getStyle('A26')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('B26:G26');
        $sheet->setCellValue('B26', @$report3[0]->CODE_NAME)->getStyle('B26:G26')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H26', '')->getStyle('H26')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('I26', '')->getStyle('I26')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('J26', '')->getStyle('J26')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('K26', '')->getStyle('K26')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('L26', @$report3[69]->CODE)->getStyle('L26')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M26:Q26');
        $sheet->setCellValue('M26', @$report3[69]->CODE_NAME)->getStyle('M26:Q26')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R26', '')->getStyle('R26')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('S26', '')->getStyle('S26')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T26', '')->getStyle('T26')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U26', '')->getStyle('U26')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('A27', @$report3[0]->CODE_DEFECT)->getStyle('A27')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B27:G27');
        $sheet->setCellValue('B27', @$report3[0]->REJECT_CODE_NAME)->getStyle('B27:G27')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H27', @$report3[0]->DESCRIPTION)->getStyle('H27')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I27', (@$report3[0]->MI === 0?'':@$report3[0]->MI))->getStyle('I27')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J27', (@$report3[0]->MA === 0?'':@$report3[0]->MA))->getStyle('J27')->applyFromArray($arsir);
        $sheet->setCellValue('K27', (@$report3[0]->CR === 0?'':@$report3[0]->CR))->getStyle('K27')->applyFromArray($arsir);
        $sheet->setCellValue('L27', @$report3[76]->CODE_DEFECT)->getStyle('L27')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M27:Q27');
        $sheet->setCellValue('M27', @$report3[76]->REJECT_CODE_NAME)->getStyle('M27:Q27')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R27', @$report3[76]->DESCRIPTION)->getStyle('R27')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('S27', (@$report3[76]->MI === 0?'':@$report3[76]->MI))->getStyle('S27')->applyFromArray($arsir);
        $sheet->setCellValue('T27', (@$report3[76]->MA === 0?'':@$report3[76]->MA))->getStyle('T27')->applyFromArray($arsir);
        $sheet->setCellValue('U27', (@$report3[76]->CR === 0?'':@$report3[76]->CR))->getStyle('U27')->applyFromArray($kontenputihcenter);

        $sheet->setCellValue('A28', @$report3[1]->CODE_DEFECT)->getStyle('A28')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B28:G28');
        $sheet->setCellValue('B28', @$report3[1]->REJECT_CODE_NAME)->getStyle('B28:G28')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H28', @$report3[1]->DESCRIPTION)->getStyle('H28')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I28', (@$report3[1]->MI === 0?'':@$report3[1]->MI))->getStyle('I28')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J28', (@$report3[1]->MA === 0?'':@$report3[1]->MA))->getStyle('J28')->applyFromArray($arsir);
        $sheet->setCellValue('K28', (@$report3[1]->CR === 0?'':@$report3[1]->CR))->getStyle('K28')->applyFromArray($arsir);
        $sheet->setCellValue('L28', @$report3[77]->CODE_DEFECT)->getStyle('L28')->applyFromArray($kontenputihcenter);
        $sheet->mergeCells('M28:Q28');
        $sheet->setCellValue('M28', @$report3[77]->REJECT_CODE_NAME)->getStyle('M28:Q28')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R28', @$report3[77]->DESCRIPTION)->getStyle('R28')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('S28', (@$report3[77]->MI === 0?'':@$report3[77]->MI))->getStyle('S28')->applyFromArray($arsir);
        $sheet->setCellValue('T28', (@$report3[77]->MA === 0?'':@$report3[77]->MA))->getStyle('T28')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U28', (@$report3[77]->CR === 0?'':@$report3[77]->CR))->getStyle('U28')->applyFromArray($arsir);

        
        $sheet->setCellValue('A29', @$report3[2]->CODE_DEFECT)->getStyle('A29')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B29:G29');
        $sheet->setCellValue('B29', @$report3[2]->REJECT_CODE_NAME)->getStyle('B29:G29')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H29', @$report3[2]->DESCRIPTION)->getStyle('H29')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I29', (@$report3[2]->MI === 0?'':@$report3[2]->MI))->getStyle('I29')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J29', (@$report3[2]->MA === 0?'':@$report3[2]->MA))->getStyle('J29')->applyFromArray($arsir);
        $sheet->setCellValue('K29', (@$report3[2]->CR === 0?'':@$report3[2]->CR))->getStyle('K29')->applyFromArray($arsir);
        $sheet->setCellValue('L29', strval(@$report3[78]->CODE_DEFECT))->getStyle('L29')->applyFromArray($kontenputihleft)->getNumberFormat()->setFormatCode('#,##0.00');
        $sheet->mergeCells('M29:Q29');
        $sheet->setCellValue('M29', @$report3[78]->REJECT_CODE_NAME)->getStyle('M29:Q29')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R29', @$report3[78]->DESCRIPTION)->getStyle('R29')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('S29', (@$report3[78]->MI === 0?'':@$report3[78]->MI))->getStyle('S29')->applyFromArray($arsir);
        $sheet->setCellValue('T29', (@$report3[78]->MA === 0?'':@$report3[78]->MA))->getStyle('T29')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U29', (@$report3[78]->CR === 0?'':@$report3[78]->CR))->getStyle('U29')->applyFromArray($arsir);

       
        $sheet->setCellValue('A30',  @$report3[3]->CODE_DEFECT)->getStyle('A30')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B30:G30');
        $sheet->setCellValue('B30', @$report3[3]->REJECT_CODE_NAME)->getStyle('B30:G30')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H30', @$report3[3]->DESCRIPTION)->getStyle('H30')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I30', (@$report3[3]->MI === 0?'':@$report3[3]->MI))->getStyle('I30')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J30', (@$report3[3]->MA === 0?'':@$report3[3]->MA))->getStyle('J30')->applyFromArray($arsir);
        $sheet->setCellValue('K30', (@$report3[3]->CR === 0?'':@$report3[3]->CR))->getStyle('K30')->applyFromArray($arsir);
        $sheet->setCellValue('L30', @$report3[79]->CODE_DEFECT)->getStyle('L30')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M30:Q30');
        $sheet->setCellValue('M30', @$report3[79]->REJECT_CODE_NAME)->getStyle('M30:Q30')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R30', @$report3[79]->DESCRIPTION)->getStyle('R30')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S30', (@$report3[79]->MI === 0?'':@$report3[79]->MI))->getStyle('S30')->applyFromArray($arsir);
        $sheet->setCellValue('T30', (@$report3[79]->MA === 0?'':@$report3[79]->MA))->getStyle('T30')->applyFromArray($arsir);
        $sheet->setCellValue('U30', (@$report3[79]->CR === 0?'':@$report3[79]->CR))->getStyle('U30')->applyFromArray($kontenputihcenter);

        $sheet->setCellValue('A31', @$report3[4]->CODE_DEFECT)->getStyle('A31')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B31:G31');
        $sheet->setCellValue('B31', @$report3[4]->REJECT_CODE_NAME)->getStyle('B31:G31')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H31', @$report3[4]->DESCRIPTION)->getStyle('H31')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I31', (@$report3[4]->MI === 0?'':@$report3[4]->MI))->getStyle('I31')->applyFromArray($arsir);
        $sheet->setCellValue('J31', (@$report3[4]->MA === 0?'':@$report3[4]->MA))->getStyle('J31')->applyFromArray($arsir);
        $sheet->setCellValue('K31', (@$report3[4]->CR === 0?'':@$report3[4]->CR))->getStyle('K31')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('L31', @$report3[80]->CODE_DEFECT)->getStyle('L31')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M31:Q31');
        $sheet->setCellValue('M31', @$report3[80]->REJECT_CODE_NAME)->getStyle('M31:Q31')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R31', @$report3[80]->DESCRIPTION)->getStyle('R31')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S31', (@$report3[80]->MI === 0?'':@$report3[80]->MI))->getStyle('S31')->applyFromArray($arsir);
        $sheet->setCellValue('T31', (@$report3[80]->MA === 0?'':@$report3[80]->MA))->getStyle('T31')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U31', (@$report3[80]->CR === 0?'':@$report3[80]->CR))->getStyle('U31')->applyFromArray($arsir);

        $sheet->setCellValue('A32', @$report3[5]->CODE_DEFECT)->getStyle('A32')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B32:G32');
        $sheet->setCellValue('B32', @$report3[5]->REJECT_CODE_NAME)->getStyle('B32:G32')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H32', @$report3[5]->DESCRIPTION)->getStyle('H32')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I32', (@$report3[5]->MI === 0?'':@$report3[5]->MI))->getStyle('I32')->applyFromArray($arsir);
        $sheet->setCellValue('J32', (@$report3[5]->MA === 0?'':@$report3[5]->MA))->getStyle('J32')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K32', (@$report3[5]->CR === 0?'':@$report3[5]->CR))->getStyle('K32')->applyFromArray($arsir);
        $sheet->setCellValue('L32', @$report3[81]->CODE_DEFECT)->getStyle('L32')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M32:Q32');
        $sheet->setCellValue('M32', @$report3[81]->REJECT_CODE_NAME)->getStyle('M32:Q32')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R32', @$report3[81]->DESCRIPTION)->getStyle('R32')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S32', (@$report3[81]->MI === 0?'':@$report3[81]->MI))->getStyle('S32')->applyFromArray($arsir);
        $sheet->setCellValue('T32', (@$report3[81]->MA === 0?'':@$report3[81]->MA))->getStyle('T32')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U32', (@$report3[81]->CR === 0?'':@$report3[81]->CR))->getStyle('U32')->applyFromArray($arsir);

        $sheet->setCellValue('A33', @$report3[6]->CODE_DEFECT)->getStyle('A33')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B33:G33');
        $sheet->setCellValue('B33', @$report3[6]->REJECT_CODE_NAME)->getStyle('B33:G33')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H33', @$report3[6]->DESCRIPTION)->getStyle('H33')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I33', (@$report3[6]->MI === 0?'':@$report3[6]->MI))->getStyle('I33')->applyFromArray($arsir);
        $sheet->setCellValue('J33', (@$report3[6]->MA === 0?'':@$report3[6]->MA))->getStyle('J33')->applyFromArray($arsir);
        $sheet->setCellValue('K33', (@$report3[6]->CR === 0?'':@$report3[6]->CR))->getStyle('K33')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('L33', @$report3[82]->CODE_DEFECT)->getStyle('L33')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M33:Q33');
        $sheet->setCellValue('M33', @$report3[82]->REJECT_CODE_NAME)->getStyle('M33:Q33')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R33', @$report3[82]->DESCRIPTION)->getStyle('R33')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S33', (@$report3[82]->MI === 0?'':@$report3[82]->MI))->getStyle('S33')->applyFromArray($arsir);
        $sheet->setCellValue('T33', (@$report3[82]->MA === 0?'':@$report3[82]->MA))->getStyle('T33')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U33', (@$report3[82]->CR === 0?'':@$report3[82]->CR))->getStyle('U33')->applyFromArray($arsir);

        $sheet->setCellValue('A34', @$report3[7]->CODE)->getStyle('A34')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('B34:G34');
        $sheet->setCellValue('B34', @$report3[7]->CODE_NAME)->getStyle('B34:G34')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H34', '')->getStyle('H34')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('I34', '')->getStyle('I34')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('J34', '')->getStyle('J34')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('K34', '')->getStyle('K34')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('L34', @$report3[83]->CODE)->getStyle('L34')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M34:Q34');
        $sheet->setCellValue('M34', @$report3[83]->CODE_NAME)->getStyle('M34:Q34')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R34', '')->getStyle('R34')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S34', '')->getStyle('S34')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T34', '')->getStyle('T34')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U34', '')->getStyle('U34')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('A35', @$report3[7]->CODE_DEFECT)->getStyle('A35')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B35:G35');
        $sheet->setCellValue('B35', @$report3[7]->REJECT_CODE_NAME)->getStyle('B35:G35')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H35', @$report3[7]->DESCRIPTION)->getStyle('H35')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I35', (@$report3[7]->MI === 0?'':@$report3[7]->MI))->getStyle('I35')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J35', (@$report3[7]->MA === 0?'':@$report3[7]->MA))->getStyle('J35')->applyFromArray($arsir);
        $sheet->setCellValue('K35', (@$report3[7]->CR === 0?'':@$report3[7]->CR))->getStyle('K35')->applyFromArray($arsir);
        $sheet->setCellValue('L35', @$report3[83]->CODE_DEFECT)->getStyle('L35')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M35:Q35');
        $sheet->setCellValue('M35', @$report3[83]->REJECT_CODE_NAME)->getStyle('M35:Q35')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R35', @$report3[83]->DESCRIPTION)->getStyle('R35')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S35', (@$report3[83]->MI === 0?'':@$report3[83]->MI))->getStyle('S35')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T35', (@$report3[83]->MA === 0?'':@$report3[83]->MA))->getStyle('T35')->applyFromArray($arsir);
        $sheet->setCellValue('U35', (@$report3[83]->CR === 0?'':@$report3[83]->CR))->getStyle('U35')->applyFromArray($arsir);

        $sheet->setCellValue('A36', @$report3[8]->CODE_DEFECT)->getStyle('A36')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B36:G36');
        $sheet->setCellValue('B36', @$report3[8]->REJECT_CODE_NAME)->getStyle('B36:G36')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H36', @$report3[8]->DESCRIPTION)->getStyle('H36')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I36', (@$report3[8]->MI === 0?'':@$report3[8]->MI))->getStyle('I36')->applyFromArray($arsir);
        $sheet->setCellValue('J36', (@$report3[8]->MA === 0?'':@$report3[8]->MA))->getStyle('J36')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K36', (@$report3[8]->CR === 0?'':@$report3[8]->CR))->getStyle('K36')->applyFromArray($arsir);
        $sheet->setCellValue('L36', @$report3[84]->CODE_DEFECT)->getStyle('L36')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M36:Q36');
        $sheet->setCellValue('M36', @$report3[84]->REJECT_CODE_NAME)->getStyle('M36:Q36')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R36', @$report3[84]->DESCRIPTION)->getStyle('R36')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S36', (@$report3[84]->MI === 0?'':@$report3[84]->MI))->getStyle('S36')->applyFromArray($arsir);
        $sheet->setCellValue('T36', (@$report3[84]->MA === 0?'':@$report3[84]->MA))->getStyle('T36')->applyFromArray($arsir);
        $sheet->setCellValue('U36', (@$report3[84]->CR === 0?'':@$report3[84]->CR))->getStyle('U36')->applyFromArray($kontenputihcenter);

        $sheet->setCellValue('A37', @$report3[9]->CODE_DEFECT)->getStyle('A37')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B37:G37');
        $sheet->setCellValue('B37', @$report3[9]->REJECT_CODE_NAME)->getStyle('B37:G37')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H37', @$report3[9]->DESCRIPTION)->getStyle('H37')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I37', (@$report3[9]->MI === 0?'':@$report3[9]->MI))->getStyle('I37')->applyFromArray($arsir);
        $sheet->setCellValue('J37', (@$report3[9]->MA === 0?'':@$report3[9]->MA))->getStyle('J37')->applyFromArray($arsir);
        $sheet->setCellValue('K37', (@$report3[9]->CR === 0?'':@$report3[9]->CR))->getStyle('K37')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('L37', @$report3[85]->CODE_DEFECT)->getStyle('L37')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M37:Q37');
        $sheet->setCellValue('M37', @$report3[85]->REJECT_CODE_NAME)->getStyle('M37:Q37')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R37', @$report3[85]->DESCRIPTION)->getStyle('R37')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S37', (@$report3[85]->MI === 0?'':@$report3[85]->MI))->getStyle('S37')->applyFromArray($arsir);
        $sheet->setCellValue('T37', (@$report3[85]->MA === 0?'':@$report3[85]->MA))->getStyle('T37')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U37', (@$report3[85]->CR === 0?'':@$report3[85]->CR))->getStyle('U37')->applyFromArray($arsir);

        $sheet->setCellValue('A38', @$report3[10]->CODE_DEFECT)->getStyle('A38')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B38:G38');
        $sheet->setCellValue('B38', @$report3[10]->REJECT_CODE_NAME)->getStyle('B38:G38')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H38', @$report3[10]->DESCRIPTION)->getStyle('H38')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I38', (@$report3[10]->MI === 0?'':@$report3[10]->MI))->getStyle('I38')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J38', (@$report3[10]->MA === 0?'':@$report3[10]->MA))->getStyle('J38')->applyFromArray($arsir);
        $sheet->setCellValue('K38', (@$report3[10]->CR === 0?'':@$report3[10]->CR))->getStyle('K38')->applyFromArray($arsir);
        $sheet->setCellValue('L38', @$report3[86]->CODE_DEFECT)->getStyle('L38')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M38:Q38');
        $sheet->setCellValue('M38', @$report3[86]->REJECT_CODE_NAME)->getStyle('M38:Q38')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R38', @$report3[86]->DESCRIPTION)->getStyle('R38')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S38', (@$report3[86]->MI === 0?'':@$report3[86]->MI))->getStyle('S38')->applyFromArray($arsir);
        $sheet->setCellValue('T38', (@$report3[86]->MA === 0?'':@$report3[86]->MA))->getStyle('T38')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U38', (@$report3[86]->CR === 0?'':@$report3[86]->CR))->getStyle('U38')->applyFromArray($arsir);

        $sheet->setCellValue('A39', @$report3[11]->CODE_DEFECT)->getStyle('A39')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B39:G39');
        $sheet->setCellValue('B39', @$report3[11]->REJECT_CODE_NAME)->getStyle('B39:G39')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H39', @$report3[11]->DESCRIPTION)->getStyle('H39')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I39', (@$report3[11]->MI === 0?'':@$report3[11]->MI))->getStyle('I39')->applyFromArray($arsir);
        $sheet->setCellValue('J39', (@$report3[11]->MA === 0?'':@$report3[11]->MA))->getStyle('J39')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K39', (@$report3[11]->CR === 0?'':@$report3[11]->CR))->getStyle('K39')->applyFromArray($arsir);
        $sheet->setCellValue('L39', @$report3[87]->CODE)->getStyle('L39')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M39:Q39');
        $sheet->setCellValue('M39', @$report3[87]->CODE_NAME)->getStyle('M39:Q39')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R39', '')->getStyle('R39')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S39', '')->getStyle('S39')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T39', '')->getStyle('T39')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U39', '')->getStyle('U39')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('A40', @$report3[12]->CODE_DEFECT)->getStyle('A40')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B40:G40');
        $sheet->setCellValue('B40', @$report3[12]->REJECT_CODE_NAME)->getStyle('B40:G40')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H40', @$report3[12]->DESCRIPTION)->getStyle('H40')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I40', (@$report3[12]->MI === 0?'':@$report3[12]->MI))->getStyle('I40')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J40', (@$report3[12]->MA === 0?'':@$report3[12]->MA))->getStyle('J40')->applyFromArray($arsir);
        $sheet->setCellValue('K40', (@$report3[12]->CR === 0?'':@$report3[12]->CR))->getStyle('K40')->applyFromArray($arsir);
        $sheet->setCellValue('L40', @$report3[87]->CODE_DEFECT)->getStyle('L40')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M40:Q40');
        $sheet->setCellValue('M40', @$report3[87]->REJECT_CODE_NAME)->getStyle('M40:Q40')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R40', @$report3[87]->DESCRIPTION)->getStyle('R40')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S40', (@$report3[87]->MI === 0?'':@$report3[87]->MI))->getStyle('S40')->applyFromArray($arsir);
        $sheet->setCellValue('T40', (@$report3[87]->MA === 0?'':@$report3[87]->MA))->getStyle('T40')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U40', (@$report3[87]->CR === 0?'':@$report3[87]->CR))->getStyle('U40')->applyFromArray($arsir);

        $sheet->setCellValue('A41', @$report3[13]->CODE_DEFECT)->getStyle('A41')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B41:G41');
        $sheet->setCellValue('B41', @$report3[13]->REJECT_CODE_NAME)->getStyle('B41:G41')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H41', @$report3[13]->DESCRIPTION)->getStyle('H41')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I41', (@$report3[13]->MI === 0?'':@$report3[13]->MI))->getStyle('I41')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J41', (@$report3[13]->MA === 0?'':@$report3[13]->MA))->getStyle('J41')->applyFromArray($arsir);
        $sheet->setCellValue('K41', (@$report3[13]->CR === 0?'':@$report3[13]->CR))->getStyle('K41')->applyFromArray($arsir);
        $sheet->setCellValue('L41', @$report3[88]->CODE_DEFECT)->getStyle('L41')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M41:Q41');
        $sheet->setCellValue('M41', @$report3[88]->REJECT_CODE_NAME)->getStyle('M41:Q41')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R41', @$report3[88]->DESCRIPTION)->getStyle('R41')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S41', (@$report3[88]->MI === 0?'':@$report3[88]->MI))->getStyle('S41')->applyFromArray($arsir);
        $sheet->setCellValue('T41', (@$report3[88]->MA === 0?'':@$report3[88]->MA))->getStyle('T41')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U41', (@$report3[88]->CR === 0?'':@$report3[88]->CR))->getStyle('U41')->applyFromArray($arsir);

        $sheet->setCellValue('A42', @$report3[14]->CODE_DEFECT)->getStyle('A42')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B42:G42');
        $sheet->setCellValue('B42', @$report3[14]->REJECT_CODE_NAME)->getStyle('B42:G42')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H42', @$report3[14]->DESCRIPTION)->getStyle('H42')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I42', (@$report3[14]->MI === 0?'':@$report3[14]->MI))->getStyle('I42')->applyFromArray($arsir);
        $sheet->setCellValue('J42', (@$report3[14]->MA === 0?'':@$report3[14]->MA))->getStyle('J42')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K42', (@$report3[14]->CR === 0?'':@$report3[14]->CR))->getStyle('K42')->applyFromArray($arsir);
        $sheet->setCellValue('L42',  @$report3[89]->CODE_DEFECT)->getStyle('L42')->applyFromArray($kontenputihcenter);
        $sheet->mergeCells('M42:Q42');
        $sheet->setCellValue('M42', @$report3[89]->REJECT_CODE_NAME)->getStyle('M42:Q42')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R42', @$report3[89]->DESCRIPTION)->getStyle('R42')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S42', (@$report3[89]->MI === 0?'':@$report3[89]->MI))->getStyle('S42')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T42', (@$report3[89]->MA === 0?'':@$report3[89]->MA))->getStyle('T42')->applyFromArray($arsir);
        $sheet->setCellValue('U42', (@$report3[89]->CR === 0?'':@$report3[89]->CR))->getStyle('U42')->applyFromArray($arsir);

        $sheet->setCellValue('A43', @$report3[15]->CODE_DEFECT)->getStyle('A43')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B43:G43');
        $sheet->setCellValue('B43', @$report3[15]->REJECT_CODE_NAME)->getStyle('B43:G43')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H43', @$report3[15]->DESCRIPTION)->getStyle('H43')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I43', (@$report3[15]->MI === 0?'':@$report3[15]->MI))->getStyle('I43')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J43', (@$report3[15]->MA === 0?'':@$report3[15]->MA))->getStyle('J43')->applyFromArray($arsir);
        $sheet->setCellValue('K43', (@$report3[15]->CR === 0?'':@$report3[15]->CR))->getStyle('K43')->applyFromArray($arsir);
        $sheet->setCellValue('L43', @$report3[90]->CODE_DEFECT)->getStyle('L43')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M43:Q43');
        $sheet->setCellValue('M43', @$report3[90]->REJECT_CODE_NAME)->getStyle('M43:Q43')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R43', @$report3[90]->DESCRIPTION)->getStyle('R43')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S43', (@$report3[90]->MI === 0?'':@$report3[90]->MI))->getStyle('S43')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T43', (@$report3[90]->MA === 0?'':@$report3[90]->MA))->getStyle('T43')->applyFromArray($arsir);
        $sheet->setCellValue('U43', (@$report3[90]->CR === 0?'':@$report3[90]->CR))->getStyle('U43')->applyFromArray($arsir);

        $sheet->setCellValue('A44', @$report3[16]->CODE_DEFECT)->getStyle('A44')->applyFromArray($kontenputihleft)->getNumberFormat()->setFormatCode('#,##0.00');;
        $sheet->mergeCells('B44:G44');
        $sheet->setCellValue('B44', @$report3[16]->REJECT_CODE_NAME)->getStyle('B44:G44')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H44', @$report3[16]->DESCRIPTION)->getStyle('H44')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I44', (@$report3[16]->MI === 0?'':@$report3[16]->MI))->getStyle('I44')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J44', (@$report3[16]->MA === 0?'':@$report3[16]->MA))->getStyle('J44')->applyFromArray($arsir);
        $sheet->setCellValue('K44', (@$report3[16]->CR === 0?'':@$report3[16]->CR))->getStyle('K44')->applyFromArray($arsir);
        $sheet->setCellValue('L44', @$report3[91]->CODE_DEFECT)->getStyle('L44')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M44:Q44');
        $sheet->setCellValue('M44',  @$report3[91]->REJECT_CODE_NAME)->getStyle('M44:Q44')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R44', @$report3[91]->DESCRIPTION)->getStyle('R44')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S44', (@$report3[91]->MI === 0?'':@$report3[91]->MI))->getStyle('S44')->applyFromArray($arsir);
        $sheet->setCellValue('T44', (@$report3[91]->MA === 0?'':@$report3[91]->MA))->getStyle('T44')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U44',  (@$report3[91]->CR === 0?'':@$report3[91]->CR))->getStyle('U44')->applyFromArray($arsir);

        $sheet->setCellValue('A45', @$report3[17]->CODE_DEFECT)->getStyle('A45')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B45:G45');
        $sheet->setCellValue('B45', @$report3[17]->REJECT_CODE_NAME)->getStyle('B45:G45')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H45', @$report3[17]->DESCRIPTION)->getStyle('H45')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I45', (@$report3[17]->MI === 0?'':@$report3[17]->MI))->getStyle('I45')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J45', (@$report3[17]->MA === 0?'':@$report3[17]->MA))->getStyle('J45')->applyFromArray($arsir);
        $sheet->setCellValue('K45', (@$report3[17]->CR === 0?'':@$report3[17]->CR))->getStyle('K45')->applyFromArray($arsir);
        $sheet->setCellValue('L45',  @$report3[92]->CODE_DEFECT)->getStyle('L45')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M45:Q45');
        $sheet->setCellValue('M45', @$report3[92]->REJECT_CODE_NAME)->getStyle('M45:Q45')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R45', @$report3[92]->DESCRIPTION)->getStyle('R45')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S45', (@$report3[92]->MI === 0?'':@$report3[92]->MI))->getStyle('S45')->applyFromArray($arsir);
        $sheet->setCellValue('T45', (@$report3[92]->MA === 0?'':@$report3[92]->MA))->getStyle('T45')->applyFromArray($arsir);
        $sheet->setCellValue('U45', (@$report3[92]->CR === 0?'':@$report3[92]->CR))->getStyle('U45')->applyFromArray($kontenputihcenter);

        $sheet->setCellValue('A46', @$report3[18]->CODE_DEFECT)->getStyle('A46')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B46:G46');
        $sheet->setCellValue('B46', @$report3[18]->REJECT_CODE_NAME)->getStyle('B46:G46')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H46', @$report3[18]->DESCRIPTION)->getStyle('H46')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I46', (@$report3[18]->MI === 0?'':@$report3[18]->MI))->getStyle('I46')->applyFromArray($arsir);
        $sheet->setCellValue('J46', (@$report3[18]->MA === 0?'':@$report3[18]->MA))->getStyle('J46')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K46', (@$report3[18]->CR === 0?'':@$report3[18]->CR))->getStyle('K46')->applyFromArray($arsir);
        $sheet->setCellValue('L46', @$report3[93]->CODE)->getStyle('L46')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M46:Q46');
        $sheet->setCellValue('M46', @$report3[93]->CODE_NAME)->getStyle('M46:Q46')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R46', '')->getStyle('R46')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S46', '')->getStyle('S46')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T46', '')->getStyle('T46')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U46', '')->getStyle('U46')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('A47', @$report3[19]->CODE_DEFECT)->getStyle('A47')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B47:G47');
        $sheet->setCellValue('B47', @$report3[19]->REJECT_CODE_NAME)->getStyle('B47:G47')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H47', @$report3[19]->DESCRIPTION)->getStyle('H47')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I47', (@$report3[19]->MI === 0?'':@$report3[19]->MI))->getStyle('I47')->applyFromArray($arsir);
        $sheet->setCellValue('J47', (@$report3[19]->MA === 0?'':@$report3[19]->MA))->getStyle('J47')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K47', (@$report3[19]->CR === 0?'':@$report3[19]->CR))->getStyle('K47')->applyFromArray($arsir);
        $sheet->setCellValue('L47', @$report3[93]->CODE_DEFECT)->getStyle('L47')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M47:Q47');
        $sheet->setCellValue('M47', @$report3[93]->REJECT_CODE_NAME)->getStyle('M47:Q47')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R47', @$report3[93]->DESCRIPTION)->getStyle('R47')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S47', (@$report3[93]->MI === 0?'':@$report3[93]->MI))->getStyle('S47')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T47', (@$report3[93]->MA === 0?'':@$report3[93]->MA))->getStyle('T47')->applyFromArray($arsir);
        $sheet->setCellValue('U47', (@$report3[93]->CR === 0?'':@$report3[93]->CR))->getStyle('U47')->applyFromArray($arsir);

        $sheet->setCellValue('A48', @$report3[20]->CODE_DEFECT)->getStyle('A48')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B48:G48');
        $sheet->setCellValue('B48',  @$report3[20]->REJECT_CODE_NAME)->getStyle('B48:G48')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H48', @$report3[20]->DESCRIPTION)->getStyle('H48')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I48', (@$report3[20]->MI === 0?'':@$report3[20]->MI))->getStyle('I48')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J48', (@$report3[20]->MA === 0?'':@$report3[20]->MA))->getStyle('J48')->applyFromArray($arsir);
        $sheet->setCellValue('K48', (@$report3[20]->CR === 0?'':@$report3[20]->CR))->getStyle('K48')->applyFromArray($arsir);
        $sheet->setCellValue('L48',  @$report3[94]->CODE_DEFECT)->getStyle('L48')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M48:Q48');
        $sheet->setCellValue('M48', @$report3[94]->REJECT_CODE_NAME)->getStyle('M48:Q48')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R48', @$report3[94]->DESCRIPTION)->getStyle('R48')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S48', (@$report3[94]->MI === 0?'':@$report3[94]->MI))->getStyle('S48')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T48', (@$report3[94]->MA === 0?'':@$report3[94]->MA))->getStyle('T48')->applyFromArray($arsir);
        $sheet->setCellValue('U48', (@$report3[94]->CR === 0?'':@$report3[94]->CR))->getStyle('U48')->applyFromArray($arsir);

        $sheet->setCellValue('A49', @$report3[21]->CODE_DEFECT)->getStyle('A49')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B49:G49');
        $sheet->setCellValue('B49', @$report3[21]->REJECT_CODE_NAME)->getStyle('B49:G49')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H49', @$report3[21]->DESCRIPTION)->getStyle('H49')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I49', (@$report3[21]->MI === 0?'':@$report3[21]->MI))->getStyle('I49')->applyFromArray($arsir);
        $sheet->setCellValue('J49', (@$report3[21]->MA === 0?'':@$report3[21]->MA))->getStyle('J49')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K49', (@$report3[21]->CR === 0?'':@$report3[21]->CR))->getStyle('K49')->applyFromArray($arsir);
        $sheet->setCellValue('L49', @$report3[95]->CODE_DEFECT)->getStyle('L49')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M49:Q49');
        $sheet->setCellValue('M49', @$report3[95]->REJECT_CODE_NAME)->getStyle('M49:Q49')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R49', @$report3[95]->DESCRIPTION)->getStyle('R49')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S49', (@$report3[95]->MI === 0?'':@$report3[95]->MI))->getStyle('S49')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T49', (@$report3[95]->MA === 0?'':@$report3[95]->MA))->getStyle('T49')->applyFromArray($arsir);
        $sheet->setCellValue('U49', (@$report3[95]->CR === 0?'':@$report3[95]->CR))->getStyle('U49')->applyFromArray($arsir);

        $sheet->setCellValue('A50', @$report3[22]->CODE_DEFECT)->getStyle('A50')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B50:G50');
        $sheet->setCellValue('B50', @$report3[22]->REJECT_CODE_NAME)->getStyle('B50:G50')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H50', @$report3[22]->DESCRIPTION)->getStyle('H50')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I50', (@$report3[22]->MI === 0?'':@$report3[22]->MI))->getStyle('I50')->applyFromArray($arsir);
        $sheet->setCellValue('J50', (@$report3[22]->MA === 0?'':@$report3[22]->MA))->getStyle('J50')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K50', (@$report3[22]->CR === 0?'':@$report3[22]->CR))->getStyle('K50')->applyFromArray($arsir);
        $sheet->setCellValue('L50', @$report3[96]->CODE_DEFECT)->getStyle('L50')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M50:Q50');
        $sheet->setCellValue('M50', @$report3[96]->REJECT_CODE_NAME)->getStyle('M50:Q50')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R50', @$report3[96]->DESCRIPTION)->getStyle('R50')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S50', (@$report3[96]->MI === 0?'':@$report3[96]->MI))->getStyle('S50')->applyFromArray($arsir);
        $sheet->setCellValue('T50', (@$report3[96]->MA === 0?'':@$report3[96]->MA))->getStyle('T50')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U50', (@$report3[96]->CR === 0?'':@$report3[96]->CR))->getStyle('U50')->applyFromArray($arsir);

        $sheet->setCellValue('A51', @$report3[23]->CODE_DEFECT)->getStyle('A51')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B51:G51');
        $sheet->setCellValue('B51', @$report3[23]->REJECT_CODE_NAME)->getStyle('B51:G51')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H51', @$report3[23]->DESCRIPTION)->getStyle('H51')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I51', (@$report3[25]->MI === 0?'':@$report3[25]->MI))->getStyle('I51')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J51', (@$report3[24]->MA === 0?'':@$report3[24]->MA))->getStyle('J51')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K51', (@$report3[23]->CR === 0?'':@$report3[23]->CR))->getStyle('K51')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('L51', @$report3[97]->CODE_DEFECT)->getStyle('L51')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M51:Q51');
        $sheet->setCellValue('M51', @$report3[97]->REJECT_CODE_NAME)->getStyle('M51:Q51')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R51', @$report3[97]->DESCRIPTION)->getStyle('R51')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S51', (@$report3[97]->MI === 0?'':@$report3[97]->MI))->getStyle('S51')->applyFromArray($arsir);
        $sheet->setCellValue('T51', (@$report3[97]->MA === 0?'':@$report3[97]->MA))->getStyle('T51')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U51', (@$report3[97]->CR === 0?'':@$report3[97]->CR))->getStyle('U51')->applyFromArray($arsir);

        $sheet->setCellValue('A52', @$report3[26]->CODE)->getStyle('A52')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('B52:G52');
        $sheet->setCellValue('B52', @$report3[26]->CODE_NAME)->getStyle('B52:G52')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H52', '')->getStyle('H52')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('I52', '')->getStyle('I52')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('J52', '')->getStyle('J52')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('K52', '')->getStyle('K52')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('L52', @$report3[98]->CODE_DEFECT)->getStyle('L52')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M52:Q52');
        $sheet->setCellValue('M52', @$report3[98]->REJECT_CODE_NAME)->getStyle('M52:Q52')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R52', @$report3[98]->DESCRIPTION)->getStyle('R52')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S52', (@$report3[98]->MI === 0?'':@$report3[98]->MI))->getStyle('S52')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T52', (@$report3[98]->MA === 0?'':@$report3[98]->MA))->getStyle('T52')->applyFromArray($arsir);
        $sheet->setCellValue('U52', (@$report3[98]->CR === 0?'':@$report3[98]->CR))->getStyle('U52')->applyFromArray($arsir);

        $sheet->setCellValue('A53', @$report3[27]->CODE)->getStyle('A53')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('B53:G53');
        $sheet->setCellValue('B53', @$report3[27]->CODE_NAME)->getStyle('B53:G53')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H53', '')->getStyle('H53')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('I53', '')->getStyle('I53')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('J53', '')->getStyle('J53')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('K53', '')->getStyle('K53')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('L53', @$report3[99]->CODE)->getStyle('L53')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M53:Q53');
        $sheet->setCellValue('M53', @$report3[99]->CODE_NAME)->getStyle('M53:Q53')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R53', '')->getStyle('R53')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S53', '')->getStyle('S53')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T53', '')->getStyle('T53')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U53', '')->getStyle('U53')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('A54', @$report3[27]->CODE_DEFECT)->getStyle('A54')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B54:G54');
        $sheet->setCellValue('B54', @$report3[27]->REJECT_CODE_NAME)->getStyle('B54:G54')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H54', @$report3[27]->DESCRIPTION)->getStyle('H54')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I54', (@$report3[27]->MI === 0?'':@$report3[27]->MI))->getStyle('I54')->applyFromArray($arsir);
        $sheet->setCellValue('J54', (@$report3[27]->MA === 0?'':@$report3[27]->MA))->getStyle('J54')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K54', (@$report3[27]->CR === 0?'':@$report3[27]->CR))->getStyle('K54')->applyFromArray($arsir);
        $sheet->setCellValue('L54', @$report3[99]->CODE_DEFECT)->getStyle('L54')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M54:Q54');
        $sheet->setCellValue('M54', @$report3[99]->REJECT_CODE_NAME)->getStyle('M54:Q54')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R54', @$report3[99]->DESCRIPTION)->getStyle('R54')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S54', (@$report3[99]->MI === 0?'':@$report3[99]->MI))->getStyle('S54')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T54', (@$report3[99]->MA === 0?'':@$report3[99]->MA))->getStyle('T54')->applyFromArray($arsir);
        $sheet->setCellValue('U54', (@$report3[99]->CR === 0?'':@$report3[99]->CR))->getStyle('U54')->applyFromArray($arsir);

        $sheet->setCellValue('A55', @$report3[28]->CODE_DEFECT)->getStyle('A55')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B55:G55');
        $sheet->setCellValue('B55', @$report3[28]->REJECT_CODE_NAME)->getStyle('B55:G55')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H55', @$report3[28]->DESCRIPTION)->getStyle('H55')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I55', (@$report3[28]->MI === 0?'':@$report3[28]->MI))->getStyle('I55')->applyFromArray($arsir);
        $sheet->setCellValue('J55', (@$report3[28]->MA === 0?'':@$report3[28]->MA))->getStyle('J55')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K55', (@$report3[28]->CR === 0?'':@$report3[28]->CR))->getStyle('K55')->applyFromArray($arsir);
        $sheet->setCellValue('L55', @$report3[100]->CODE_DEFECT)->getStyle('L55')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M55:Q55');
        $sheet->setCellValue('M55', @$report3[100]->REJECT_CODE_NAME)->getStyle('M55:Q55')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R55', @$report3[100]->DESCRIPTION)->getStyle('R55')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S55', (@$report3[100]->MI === 0?'':@$report3[100]->MI))->getStyle('S55')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T55', (@$report3[100]->MA === 0?'':@$report3[100]->MA))->getStyle('T55')->applyFromArray($arsir);
        $sheet->setCellValue('U55', (@$report3[100]->CR === 0?'':@$report3[100]->CR))->getStyle('U55')->applyFromArray($arsir);

        $sheet->setCellValue('A56', @$report3[29]->CODE_DEFECT)->getStyle('A56')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B56:G56');
        $sheet->setCellValue('B56', @$report3[29]->REJECT_CODE_NAME)->getStyle('B56:G56')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H56', @$report3[29]->DESCRIPTION)->getStyle('H56')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I56', (@$report3[29]->MI === 0?'':@$report3[29]->MI))->getStyle('I56')->applyFromArray($arsir);
        $sheet->setCellValue('J56', (@$report3[29]->MA === 0?'':@$report3[29]->MA))->getStyle('J56')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K56', (@$report3[29]->CR === 0?'':@$report3[29]->CR))->getStyle('K56')->applyFromArray($arsir);
        $sheet->setCellValue('L56', @$report3[101]->CODE_DEFECT)->getStyle('L56')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M56:Q56');
        $sheet->setCellValue('M56', @$report3[101]->REJECT_CODE_NAME)->getStyle('M56:Q56')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R56', @$report3[101]->DESCRIPTION)->getStyle('R56')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S56', (@$report3[101]->MI === 0?'':@$report3[101]->MI))->getStyle('S56')->applyFromArray($arsir);
        $sheet->setCellValue('T56', (@$report3[101]->MA === 0?'':@$report3[101]->MA))->getStyle('T56')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U56', (@$report3[101]->CR === 0?'':@$report3[101]->CR))->getStyle('U56')->applyFromArray($arsir);
        
        $sheet->setCellValue('A57', @$report3[30]->CODE_DEFECT)->getStyle('A57')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B57:G57');
        $sheet->setCellValue('B57', @$report3[30]->REJECT_CODE_NAME)->getStyle('B57:G57')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H57', @$report3[30]->DESCRIPTION)->getStyle('H57')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I57', (@$report3[30]->MI === 0?'':@$report3[30]->MI))->getStyle('I57')->applyFromArray($arsir);
        $sheet->setCellValue('J57', (@$report3[30]->MA === 0?'':@$report3[30]->MA))->getStyle('J57')->applyFromArray($arsir);
        $sheet->setCellValue('K57', (@$report3[30]->CR === 0?'':@$report3[30]->CR))->getStyle('K57')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('L57', @$report3[102]->CODE_DEFECT)->getStyle('L57')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M57:Q57');
        $sheet->setCellValue('M57', @$report3[102]->REJECT_CODE_NAME)->getStyle('M57:Q57')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R57', @$report3[102]->DESCRIPTION)->getStyle('R57')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S57', (@$report3[102]->MI === 0?'':@$report3[102]->MI))->getStyle('S57')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T57', (@$report3[102]->MA === 0?'':@$report3[102]->MA))->getStyle('T57')->applyFromArray($arsir);
        $sheet->setCellValue('U57', (@$report3[102]->CR === 0?'':@$report3[102]->CR))->getStyle('U57')->applyFromArray($arsir);

        $sheet->setCellValue('A58', @$report3[31]->CODE)->getStyle('A58')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('B58:G58');
        $sheet->setCellValue('B58', @$report3[31]->CODE_NAME)->getStyle('B58:G58')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H58', '')->getStyle('H58')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('I58', '')->getStyle('I58')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('J58', '')->getStyle('J58')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('K58', '')->getStyle('K58')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('L58', @$report3[103]->CODE_DEFECT)->getStyle('L58')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M58:Q58');
        $sheet->setCellValue('M58', @$report3[103]->REJECT_CODE_NAME)->getStyle('M58:Q58')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R58', @$report3[103]->DESCRIPTION)->getStyle('R58')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S58', (@$report3[103]->MI === 0?'':@$report3[103]->MI))->getStyle('S58')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T58', (@$report3[103]->MA === 0?'':@$report3[103]->MA))->getStyle('T58')->applyFromArray($arsir);
        $sheet->setCellValue('U58', (@$report3[103]->CR === 0?'':@$report3[103]->CR))->getStyle('U58')->applyFromArray($arsir);

        $sheet->setCellValue('A59', @$report3[31]->CODE_DEFECT)->getStyle('A59')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B59:G59');
        $sheet->setCellValue('B59', @$report3[31]->REJECT_CODE_NAME)->getStyle('B59:G59')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H59', @$report3[31]->DESCRIPTION)->getStyle('H59')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('I59', (@$report3[31]->MI === 0?'':@$report3[31]->MI))->getStyle('I59')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J59', (@$report3[31]->MA === 0?'':@$report3[31]->MA))->getStyle('J59')->applyFromArray($arsir);
        $sheet->setCellValue('K59', (@$report3[31]->CR === 0?'':@$report3[31]->CR))->getStyle('K59')->applyFromArray($arsir);
        $sheet->setCellValue('L59', @$report3[104]->CODE_DEFECT)->getStyle('L59')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M59:Q59');
        $sheet->setCellValue('M59',  @$report3[104]->REJECT_CODE_NAME)->getStyle('M59:Q59')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R59',  @$report3[104]->DESCRIPTION)->getStyle('R59')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S59', (@$report3[104]->MI === 0?'':@$report3[104]->MI))->getStyle('S59')->applyFromArray($arsir);
        $sheet->setCellValue('T59', (@$report3[104]->MA === 0?'':@$report3[104]->MA))->getStyle('T59')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U59', (@$report3[104]->CR === 0?'':@$report3[104]->CR))->getStyle('U59')->applyFromArray($arsir);

        $sheet->setCellValue('A60', @$report3[32]->CODE_DEFECT)->getStyle('A60')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B60:G60');
        $sheet->setCellValue('B60', @$report3[32]->REJECT_CODE_NAME)->getStyle('B60:G60')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H60', @$report3[32]->DESCRIPTION)->getStyle('H60')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I60', (@$report3[32]->MI === 0?'':@$report3[32]->MI))->getStyle('I60')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J60', (@$report3[32]->MA === 0?'':@$report3[32]->MA))->getStyle('J60')->applyFromArray($arsir);
        $sheet->setCellValue('K60', (@$report3[32]->CR === 0?'':@$report3[32]->CR))->getStyle('K60')->applyFromArray($arsir);
        $sheet->setCellValue('L60', @$report3[105]->CODE_DEFECT)->getStyle('L60')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M60:Q60');
        $sheet->setCellValue('M60', @$report3[105]->REJECT_CODE_NAME)->getStyle('M60:Q60')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R60', @$report3[105]->DESCRIPTION)->getStyle('R60')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S60', (@$report3[105]->MI === 0?'':@$report3[105]->MI))->getStyle('S60')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T60', (@$report3[105]->MA === 0?'':@$report3[105]->MA))->getStyle('T60')->applyFromArray($arsir);
        $sheet->setCellValue('U60', (@$report3[105]->CR === 0?'':@$report3[105]->CR))->getStyle('U60')->applyFromArray($arsir);

        $sheet->setCellValue('A61', @$report3[33]->CODE_DEFECT)->getStyle('A61')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B61:G61');
        $sheet->setCellValue('B61', @$report3[33]->REJECT_CODE_NAME)->getStyle('B61:G61')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H61', @$report3[33]->DESCRIPTION)->getStyle('H61')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I61', (@$report3[33]->MI === 0?'':@$report3[33]->MI))->getStyle('I61')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J61', (@$report3[33]->MA === 0?'':@$report3[33]->MA))->getStyle('J61')->applyFromArray($arsir);
        $sheet->setCellValue('K61', (@$report3[33]->CR === 0?'':@$report3[33]->CR))->getStyle('K61')->applyFromArray($arsir);
        $sheet->setCellValue('L61', @$report3[106]->CODE_DEFECT)->getStyle('L61')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M61:Q61');
        $sheet->setCellValue('M61', @$report3[106]->REJECT_CODE_NAME)->getStyle('M61:Q61')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R61', @$report3[106]->DESCRIPTION)->getStyle('R61')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S61', (@$report3[106]->MI === 0?'':@$report3[106]->MI))->getStyle('S61')->applyFromArray($arsir);
        $sheet->setCellValue('T61', (@$report3[106]->MA === 0?'':@$report3[106]->MA))->getStyle('T61')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U61', (@$report3[106]->CR === 0?'':@$report3[106]->CR))->getStyle('U61')->applyFromArray($arsir);

        $sheet->setCellValue('A62', @$report3[34]->CODE_DEFECT)->getStyle('A62')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B62:G62');
        $sheet->setCellValue('B62', @$report3[34]->REJECT_CODE_NAME)->getStyle('B62:G62')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H62', @$report3[34]->DESCRIPTION)->getStyle('H62')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I62', (@$report3[34]->MI === 0?'':@$report3[34]->MI))->getStyle('I62')->applyFromArray($arsir);
        $sheet->setCellValue('J62', (@$report3[34]->MA === 0?'':@$report3[34]->MA))->getStyle('J62')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K62', (@$report3[34]->CR === 0?'':@$report3[34]->CR))->getStyle('K62')->applyFromArray($arsir);
        $sheet->setCellValue('L62', @$report3[107]->CODE)->getStyle('L62')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M62:Q62');
        $sheet->setCellValue('M62', @$report3[107]->CODE_NAME)->getStyle('M62:Q62')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R62', '')->getStyle('R62')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S62', '')->getStyle('S62')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T62', '')->getStyle('T62')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U62', '')->getStyle('U62')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('A63', @$report3[35]->CODE_DEFECT)->getStyle('A63')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B63:G63');
        $sheet->setCellValue('B63', @$report3[35]->REJECT_CODE_NAME)->getStyle('B63:G63')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H63', @$report3[35]->DESCRIPTION)->getStyle('H63')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I63', (@$report3[35]->MI === 0?'':@$report3[35]->MI))->getStyle('I63')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J63', (@$report3[35]->MA === 0?'':@$report3[35]->MA))->getStyle('J63')->applyFromArray($arsir);
        $sheet->setCellValue('K63', (@$report3[35]->CR === 0?'':@$report3[35]->CR))->getStyle('K63')->applyFromArray($arsir);
        $sheet->setCellValue('L63', @$report3[107]->CODE_DEFECT)->getStyle('L63')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M63:Q63');
        $sheet->setCellValue('M63',  @$report3[107]->REJECT_CODE_NAME)->getStyle('M63:Q63')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R63', @$report3[107]->DESCRIPTION)->getStyle('R63')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S63', (@$report3[107]->MI === 0?'':@$report3[107]->MI))->getStyle('S63')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T63', (@$report3[107]->MA === 0?'':@$report3[107]->MA))->getStyle('T63')->applyFromArray($arsir);
        $sheet->setCellValue('U63', (@$report3[107]->CR === 0?'':@$report3[107]->CR))->getStyle('U63')->applyFromArray($arsir);

        $sheet->setCellValue('A64', @$report3[36]->CODE_DEFECT)->getStyle('A64')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B64:G64');
        $sheet->setCellValue('B64', @$report3[36]->REJECT_CODE_NAME)->getStyle('B64:G64')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H64', @$report3[36]->DESCRIPTION)->getStyle('H64')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I64', (@$report3[36]->MI === 0?'':@$report3[36]->MI))->getStyle('I64')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J64', (@$report3[36]->MA === 0?'':@$report3[36]->MA))->getStyle('J64')->applyFromArray($arsir);
        $sheet->setCellValue('K64', (@$report3[36]->CR === 0?'':@$report3[36]->CR))->getStyle('K64')->applyFromArray($arsir);
        $sheet->setCellValue('L64', @$report3[108]->CODE_DEFECT)->getStyle('L64')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M64:Q64');
        $sheet->setCellValue('M64', @$report3[108]->REJECT_CODE_NAME)->getStyle('M64:Q64')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R64', @$report3[108]->DESCRIPTION)->getStyle('R64')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S64', (@$report3[108]->MI === 0?'':@$report3[108]->MI))->getStyle('S64')->applyFromArray($arsir);
        $sheet->setCellValue('T64', (@$report3[108]->MA === 0?'':@$report3[108]->MA))->getStyle('T64')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U64', (@$report3[108]->CR === 0?'':@$report3[108]->CR))->getStyle('U64')->applyFromArray($arsir);

        $sheet->setCellValue('A65', @$report3[37]->CODE_DEFECT)->getStyle('A65')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B65:G65');
        $sheet->setCellValue('B65', @$report3[37]->REJECT_CODE_NAME)->getStyle('B65:G65')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H65', @$report3[37]->DESCRIPTION)->getStyle('H65')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I65', (@$report3[37]->MI === 0?'':@$report3[37]->MI))->getStyle('I65')->applyFromArray($arsir);
        $sheet->setCellValue('J65', (@$report3[37]->MA === 0?'':@$report3[37]->MA))->getStyle('J65')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K65', (@$report3[37]->CR === 0?'':@$report3[37]->CR))->getStyle('K65')->applyFromArray($arsir);
        $sheet->setCellValue('L65', @$report3[109]->CODE_DEFECT)->getStyle('L65')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M65:Q65');
        $sheet->setCellValue('M65', @$report3[109]->REJECT_CODE_NAME)->getStyle('M65:Q65')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R65', @$report3[109]->DESCRIPTION)->getStyle('R65')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S65', (@$report3[109]->MI === 0?'':@$report3[109]->MI))->getStyle('S65')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T65', (@$report3[109]->MA === 0?'':@$report3[109]->MA))->getStyle('T65')->applyFromArray($arsir);
        $sheet->setCellValue('U65', (@$report3[109]->CR === 0?'':@$report3[109]->CR))->getStyle('U65')->applyFromArray($arsir);

        $sheet->setCellValue('A66', @$report3[38]->CODE_DEFECT)->getStyle('A66')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B66:G66');
        $sheet->setCellValue('B66',  @$report3[38]->REJECT_CODE_NAME)->getStyle('B66:G66')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H66', @$report3[38]->DESCRIPTION)->getStyle('H66')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I66', (@$report3[38]->MI === 0?'':@$report3[38]->MI))->getStyle('I66')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J66', (@$report3[38]->MA === 0?'':@$report3[38]->MA))->getStyle('J66')->applyFromArray($arsir);
        $sheet->setCellValue('K66', (@$report3[38]->CR === 0?'':@$report3[38]->CR))->getStyle('K66')->applyFromArray($arsir);
        $sheet->setCellValue('L66', @$report3[110]->CODE_DEFECT)->getStyle('L66')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M66:Q66');
        $sheet->setCellValue('M66', @$report3[110]->CODE_DEFECT)->getStyle('M66:Q66')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R66', @$report3[110]->DESCRIPTION)->getStyle('R66')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S66', (@$report3[110]->MI === 0?'':@$report3[110]->MI))->getStyle('S66')->applyFromArray($arsir);
        $sheet->setCellValue('T66', (@$report3[110]->MA === 0?'':@$report3[110]->MA))->getStyle('T66')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U66', (@$report3[110]->CR === 0?'':@$report3[110]->CR))->getStyle('U66')->applyFromArray($arsir);

        $sheet->setCellValue('A67', @$report3[39]->CODE_DEFECT)->getStyle('A67')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B67:G67');
        $sheet->setCellValue('B67', @$report3[39]->REJECT_CODE_NAME)->getStyle('B67:G67')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H67', @$report3[39]->DESCRIPTION)->getStyle('H67')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I67', (@$report3[39]->MI === 0?'':@$report3[39]->MI))->getStyle('I67')->applyFromArray($arsir);
        $sheet->setCellValue('J67', (@$report3[39]->MA === 0?'':@$report3[39]->MA))->getStyle('J67')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K67', (@$report3[39]->CR === 0?'':@$report3[39]->CR))->getStyle('K67')->applyFromArray($arsir);
        $sheet->setCellValue('L67', @$report3[111]->CODE_DEFECT)->getStyle('L67')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M67:Q67');
        $sheet->setCellValue('M67', @$report3[111]->CODE_DEFECT)->getStyle('M67:Q67')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R67', @$report3[111]->DESCRIPTION)->getStyle('R67')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S67', (@$report3[111]->MI === 0?'':@$report3[111]->MI))->getStyle('S67')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T67', (@$report3[111]->MA === 0?'':@$report3[111]->MA))->getStyle('T67')->applyFromArray($arsir);
        $sheet->setCellValue('U67', (@$report3[111]->CR === 0?'':@$report3[111]->CR))->getStyle('U67')->applyFromArray($arsir);

        $sheet->setCellValue('A68',  @$report3[40]->CODE)->getStyle('A68')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('B68:G68');
        $sheet->setCellValue('B68', @$report3[40]->CODE_NAME)->getStyle('B68:G68')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H68', '')->getStyle('H68')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('I68', '')->getStyle('I68')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('J68', '')->getStyle('J68')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('K68', '')->getStyle('K68')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('L68', @$report3[112]->CODE_DEFECT)->getStyle('L68')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M68:Q68');
        $sheet->setCellValue('M68', @$report3[112]->CODE_DEFECT)->getStyle('M68:Q68')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R68', @$report3[112]->DESCRIPTION)->getStyle('R68')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S68', (@$report3[112]->MI === 0?'':@$report3[112]->MI))->getStyle('S68')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T68', (@$report3[112]->MA === 0?'':@$report3[112]->MA))->getStyle('T68')->applyFromArray($arsir);
        $sheet->setCellValue('U68', (@$report3[112]->CR === 0?'':@$report3[112]->CR))->getStyle('U68')->applyFromArray($arsir);

        $sheet->setCellValue('A69', @$report3[40]->CODE_DEFECT)->getStyle('A69')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B69:G69');
        $sheet->setCellValue('B69', @$report3[40]->REJECT_CODE_NAME)->getStyle('B69:G69')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H69', @$report3[40]->DESCRIPTION)->getStyle('H69')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I69', (@$report3[40]->MI === 0?'':@$report3[40]->MI))->getStyle('I69')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J69', (@$report3[40]->MA === 0?'':@$report3[40]->MA))->getStyle('J69')->applyFromArray($arsir);
        $sheet->setCellValue('K69', (@$report3[40]->CR === 0?'':@$report3[40]->CR))->getStyle('K69')->applyFromArray($arsir);
        $sheet->setCellValue('L69', @$report3[113]->CODE_DEFECT)->getStyle('L69')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M69:Q69');
        $sheet->setCellValue('M69', @$report3[113]->CODE_DEFECT)->getStyle('M69:Q69')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R69', @$report3[113]->DESCRIPTION)->getStyle('R69')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S69', (@$report3[113]->MI === 0?'':@$report3[113]->MI))->getStyle('S69')->applyFromArray($arsir);
        $sheet->setCellValue('T69', (@$report3[113]->MA === 0?'':@$report3[113]->MA))->getStyle('T69')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U69', (@$report3[113]->CR === 0?'':@$report3[113]->CR))->getStyle('U69')->applyFromArray($arsir);

        $sheet->setCellValue('A70', @$report3[41]->CODE_DEFECT)->getStyle('A70')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B70:G70');
        $sheet->setCellValue('B70', @$report3[41]->REJECT_CODE_NAME)->getStyle('B70:G70')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H70', @$report3[41]->DESCRIPTION)->getStyle('H70')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I70', (@$report3[41]->MI === 0?'':@$report3[41]->MI))->getStyle('I70')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J70', (@$report3[41]->MA === 0?'':@$report3[41]->MA))->getStyle('J70')->applyFromArray($arsir);
        $sheet->setCellValue('K70', (@$report3[41]->CR === 0?'':@$report3[41]->CR))->getStyle('K70')->applyFromArray($arsir);
        $sheet->setCellValue('L70', @$report3[114]->CODE_DEFECT)->getStyle('L70')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M70:Q70');
        $sheet->setCellValue('M70', @$report3[114]->CODE_DEFECT)->getStyle('M70:Q70')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R70', @$report3[114]->DESCRIPTION)->getStyle('R70')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S70', (@$report3[114]->MI === 0?'':@$report3[114]->MI))->getStyle('S70')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T70', (@$report3[114]->MA === 0?'':@$report3[114]->MA))->getStyle('T70')->applyFromArray($arsir);
        $sheet->setCellValue('U70', (@$report3[114]->CR === 0?'':@$report3[114]->CR))->getStyle('U70')->applyFromArray($arsir);

        $sheet->setCellValue('A71', @$report3[42]->CODE_DEFECT)->getStyle('A71')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B71:G71');
        $sheet->setCellValue('B71',  @$report3[42]->REJECT_CODE_NAME)->getStyle('B71:G71')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H71',  @$report3[42]->DESCRIPTION)->getStyle('H71')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I71', (@$report3[42]->MI === 0?'':@$report3[42]->MI))->getStyle('I71')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J71', (@$report3[42]->MA === 0?'':@$report3[42]->MA))->getStyle('J71')->applyFromArray($arsir);
        $sheet->setCellValue('K71', (@$report3[42]->CR === 0?'':@$report3[42]->CR))->getStyle('K71')->applyFromArray($arsir);
        $sheet->setCellValue('L71', @$report3[115]->CODE)->getStyle('L71')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M71:Q71');
        $sheet->setCellValue('M71', @$report3[115]->CODE_NAME)->getStyle('M71:Q71')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R71', '')->getStyle('R71')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S71', '')->getStyle('S71')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T71', '')->getStyle('T71')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U71', '')->getStyle('U71')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('A72', @$report3[43]->CODE_DEFECT)->getStyle('A72')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B72:G72');
        $sheet->setCellValue('B72',  @$report3[43]->REJECT_CODE_NAME)->getStyle('B72:G72')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H72',  @$report3[43]->DESCRIPTION)->getStyle('H72')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I72', (@$report3[43]->MI === 0?'':@$report3[43]->MI))->getStyle('I72')->applyFromArray($arsir);
        $sheet->setCellValue('J72', (@$report3[43]->MA === 0?'':@$report3[43]->MA))->getStyle('J72')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K72', (@$report3[43]->CR === 0?'':@$report3[43]->CR))->getStyle('K72')->applyFromArray($arsir);
        $sheet->setCellValue('L72', @$report3[115]->CODE_DEFECT)->getStyle('L72')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M72:Q72');
        $sheet->setCellValue('M72', @$report3[115]->REJECT_CODE_NAME)->getStyle('M72:Q72')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R72', @$report3[115]->DESCRIPTION)->getStyle('R72')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S72', (@$report3[115]->MI === 0?'':@$report3[115]->MI))->getStyle('S72')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T72', (@$report3[115]->MA === 0?'':@$report3[115]->MA))->getStyle('T72')->applyFromArray($arsir);
        $sheet->setCellValue('U72', (@$report3[115]->CR === 0?'':@$report3[115]->CR))->getStyle('U72')->applyFromArray($arsir);

        $sheet->setCellValue('A73', @$report3[44]->CODE)->getStyle('A73')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('B73:G73');
        $sheet->setCellValue('B73', @$report3[44]->CODE_NAME)->getStyle('B73:G73')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H73', '')->getStyle('H73')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('I73', '')->getStyle('I73')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('J73', '')->getStyle('J73')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('K73', '')->getStyle('K73')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('L73', @$report3[116]->CODE_DEFECT)->getStyle('L73')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M73:Q73');
        $sheet->setCellValue('M73', @$report3[116]->REJECT_CODE_NAME)->getStyle('M73:Q73')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R73', @$report3[116]->DESCRIPTION)->getStyle('R73')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S73', (@$report3[116]->MI === 0?'':@$report3[116]->MI))->getStyle('S73')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T73', (@$report3[116]->MA === 0?'':@$report3[116]->MA))->getStyle('T73')->applyFromArray($arsir);
        $sheet->setCellValue('U73', (@$report3[116]->CR === 0?'':@$report3[116]->CR))->getStyle('U73')->applyFromArray($arsir);

        $sheet->setCellValue('A74', @$report3[44]->CODE_DEFECT)->getStyle('A74')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B74:G74');
        $sheet->setCellValue('B74', @$report3[44]->REJECT_CODE_NAME)->getStyle('B74:G74')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H74', @$report3[44]->DESCRIPTION)->getStyle('H74')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I74', (@$report3[44]->MI === 0?'':@$report3[44]->MI))->getStyle('I74')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J74', (@$report3[44]->MA === 0?'':@$report3[44]->MA))->getStyle('J74')->applyFromArray($arsir);
        $sheet->setCellValue('K74', (@$report3[44]->CR === 0?'':@$report3[44]->CR))->getStyle('K74')->applyFromArray($arsir);
        $sheet->setCellValue('L74', @$report3[117]->CODE_DEFECT)->getStyle('L74')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M74:Q74');
        $sheet->setCellValue('M74', @$report3[117]->REJECT_CODE_NAME)->getStyle('M74:Q74')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R74', @$report3[117]->DESCRIPTION)->getStyle('R74')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S74', (@$report3[117]->MI === 0?'':@$report3[117]->MI))->getStyle('S74')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T74', (@$report3[117]->MA === 0?'':@$report3[117]->MA))->getStyle('T74')->applyFromArray($arsir);
        $sheet->setCellValue('U74', (@$report3[117]->CR === 0?'':@$report3[117]->CR))->getStyle('U74')->applyFromArray($arsir);

        $sheet->setCellValue('A75', @$report3[45]->CODE_DEFECT)->getStyle('A75')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B75:G75');
        $sheet->setCellValue('B75', @$report3[45]->REJECT_CODE_NAME)->getStyle('B75:G75')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H75', @$report3[45]->DESCRIPTION)->getStyle('H75')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I75', (@$report3[45]->MI === 0?'':@$report3[45]->MI))->getStyle('I75')->applyFromArray($arsir);
        $sheet->setCellValue('J75', (@$report3[45]->MA === 0?'':@$report3[45]->MA))->getStyle('J75')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K75', (@$report3[45]->CR === 0?'':@$report3[45]->CR))->getStyle('K75')->applyFromArray($arsir);
        $sheet->setCellValue('L75', @$report3[118]->CODE_DEFECT)->getStyle('L75')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M75:Q75');
        $sheet->setCellValue('M75', @$report3[118]->REJECT_CODE_NAME)->getStyle('M75:Q75')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R75', @$report3[118]->DESCRIPTION)->getStyle('R75')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S75', (@$report3[118]->MI === 0?'':@$report3[118]->MI))->getStyle('S75')->applyFromArray($arsir);
        $sheet->setCellValue('T75', (@$report3[118]->MA === 0?'':@$report3[118]->MA))->getStyle('T75')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U75', (@$report3[118]->CR === 0?'':@$report3[118]->CR))->getStyle('U75')->applyFromArray($arsir);

        $sheet->setCellValue('A76', @$report3[46]->CODE_DEFECT)->getStyle('A76')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B76:G76');
        $sheet->setCellValue('B76', @$report3[46]->REJECT_CODE_NAME)->getStyle('B76:G76')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H76', @$report3[46]->DESCRIPTION)->getStyle('H76')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('I76', (@$report3[46]->MI === 0?'':@$report3[46]->MI))->getStyle('I76')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J76', (@$report3[46]->MA === 0?'':@$report3[46]->MA))->getStyle('J76')->applyFromArray($arsir);
        $sheet->setCellValue('K76', (@$report3[46]->CR === 0?'':@$report3[46]->CR))->getStyle('K76')->applyFromArray($arsir);
        $sheet->setCellValue('L76', @$report3[119]->CODE_DEFECT)->getStyle('L76')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M76:Q76');
        $sheet->setCellValue('M76', @$report3[119]->REJECT_CODE_NAME)->getStyle('M76:Q76')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R76', @$report3[119]->DESCRIPTION)->getStyle('R76')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S76', (@$report3[119]->MI === 0?'':@$report3[119]->MI))->getStyle('S76')->applyFromArray($arsir);
        $sheet->setCellValue('T76', (@$report3[119]->MA === 0?'':@$report3[119]->MA))->getStyle('T76')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U76', (@$report3[119]->CR === 0?'':@$report3[119]->CR))->getStyle('U76')->applyFromArray($arsir);

        $sheet->setCellValue('A77', @$report3[47]->CODE_DEFECT)->getStyle('A77')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B77:G77');
        $sheet->setCellValue('B77', @$report3[47]->REJECT_CODE_NAME)->getStyle('B77:G77')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H77', @$report3[47]->DESCRIPTION)->getStyle('H77')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('I77', (@$report3[47]->MI === 0?'':@$report3[47]->MI))->getStyle('I77')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J77', (@$report3[47]->MA === 0?'':@$report3[47]->MA))->getStyle('J77')->applyFromArray($arsir);
        $sheet->setCellValue('K77', (@$report3[47]->CR === 0?'':@$report3[47]->CR))->getStyle('K77')->applyFromArray($arsir);
        $sheet->setCellValue('L77', @$report3[120]->CODE_DEFECT)->getStyle('L77')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M77:Q77');
        $sheet->setCellValue('M77', @$report3[120]->REJECT_CODE_NAME)->getStyle('M77:Q77')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R77', @$report3[120]->DESCRIPTION)->getStyle('R77')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S77', (@$report3[120]->MI === 0?'':@$report3[120]->MI))->getStyle('S77')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T77', (@$report3[120]->MA === 0?'':@$report3[120]->MA))->getStyle('T77')->applyFromArray($arsir);
        $sheet->setCellValue('U77', (@$report3[120]->CR === 0?'':@$report3[120]->CR))->getStyle('U77')->applyFromArray($arsir);

        $sheet->setCellValue('A78', @$report3[48]->CODE_DEFECT)->getStyle('A78')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B78:G78');
        $sheet->setCellValue('B78', @$report3[48]->REJECT_CODE_NAME)->getStyle('B78:G78')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H78', @$report3[48]->DESCRIPTION)->getStyle('H78')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I78', (@$report3[48]->MI === 0?'':@$report3[48]->MI))->getStyle('I78')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J78', (@$report3[48]->MA === 0?'':@$report3[48]->MA))->getStyle('J78')->applyFromArray($arsir);
        $sheet->setCellValue('K78', (@$report3[48]->CR === 0?'':@$report3[48]->CR))->getStyle('K78')->applyFromArray($arsir);
        $sheet->setCellValue('L78', @$report3[121]->CODE_DEFECT)->getStyle('L78')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M78:Q78');
        $sheet->setCellValue('M78', @$report3[121]->REJECT_CODE_NAME)->getStyle('M78:Q78')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R78', @$report3[121]->DESCRIPTION)->getStyle('R78')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S78', (@$report3[121]->MI === 0?'':@$report3[121]->MI))->getStyle('S78')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T78', (@$report3[121]->MA === 0?'':@$report3[121]->MA))->getStyle('T78')->applyFromArray($arsir);
        $sheet->setCellValue('U78', (@$report3[121]->CR === 0?'':@$report3[121]->CR))->getStyle('U78')->applyFromArray($arsir);

        $sheet->setCellValue('A79', @$report3[49]->CODE_DEFECT)->getStyle('A79')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B79:G79');
        $sheet->setCellValue('B79',  @$report3[49]->REJECT_CODE_NAME)->getStyle('B79:G79')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H79', @$report3[49]->DESCRIPTION)->getStyle('H79')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I79', (@$report3[49]->MI === 0?'':@$report3[49]->MI))->getStyle('I79')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J79', (@$report3[49]->MA === 0?'':@$report3[49]->MA))->getStyle('J79')->applyFromArray($arsir);
        $sheet->setCellValue('K79', (@$report3[49]->CR === 0?'':@$report3[49]->CR))->getStyle('K79')->applyFromArray($arsir);
        $sheet->setCellValue('L79', @$report3[122]->CODE_DEFECT)->getStyle('L79')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M79:Q79');
        $sheet->setCellValue('M79', @$report3[122]->REJECT_CODE_NAME)->getStyle('M79:Q79')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R79', @$report3[122]->DESCRIPTION)->getStyle('R79')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S79', (@$report3[122]->MI === 0?'':@$report3[122]->MI))->getStyle('S79')->applyFromArray($arsir);
        $sheet->setCellValue('T79', (@$report3[122]->MA === 0?'':@$report3[122]->MA))->getStyle('T79')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U79', (@$report3[122]->CR === 0?'':@$report3[122]->CR))->getStyle('U79')->applyFromArray($arsir);

        $sheet->setCellValue('A80', @$report3[50]->CODE_DEFECT)->getStyle('A80')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B80:G80');
        $sheet->setCellValue('B80', @$report3[50]->REJECT_CODE_NAME)->getStyle('B80:G80')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H80', @$report3[50]->DESCRIPTION)->getStyle('H80')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I80', (@$report3[50]->MI === 0?'':@$report3[50]->MI))->getStyle('I80')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J80', (@$report3[50]->MA === 0?'':@$report3[50]->MA))->getStyle('J80')->applyFromArray($arsir);
        $sheet->setCellValue('K80', (@$report3[50]->CR === 0?'':@$report3[50]->CR))->getStyle('K80')->applyFromArray($arsir);
        $sheet->setCellValue('L80', @$report3[123]->CODE_DEFECT)->getStyle('L80')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M80:Q80');
        $sheet->setCellValue('M80', @$report3[123]->REJECT_CODE_NAME)->getStyle('M80:Q80')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R80', @$report3[123]->DESCRIPTION)->getStyle('R80')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S80', (@$report3[123]->MI === 0?'':@$report3[123]->MI))->getStyle('S80')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T80', (@$report3[123]->MA === 0?'':@$report3[123]->MA))->getStyle('T80')->applyFromArray($arsir);
        $sheet->setCellValue('U80', (@$report3[123]->CR === 0?'':@$report3[123]->CR))->getStyle('U80')->applyFromArray($arsir);

        $sheet->setCellValue('A81', @$report3[51]->CODE_DEFECT)->getStyle('A81')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B81:G81');
        $sheet->setCellValue('B81', @$report3[51]->REJECT_CODE_NAME)->getStyle('B81:G81')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H81', @$report3[51]->DESCRIPTION)->getStyle('H81')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I81', (@$report3[51]->MI === 0?'':@$report3[51]->MI))->getStyle('I81')->applyFromArray($arsir);
        $sheet->setCellValue('J81', (@$report3[51]->MA === 0?'':@$report3[51]->MA))->getStyle('J81')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K81', (@$report3[51]->CR === 0?'':@$report3[51]->CR))->getStyle('K81')->applyFromArray($arsir);
        $sheet->setCellValue('L81', @$report3[124]->CODE_DEFECT)->getStyle('L81')->applyFromArray($kontenputihleft)->getNumberFormat()->setFormatCode('###0.00');
        $sheet->mergeCells('M81:Q81');
        $sheet->setCellValue('M81', @$report3[124]->REJECT_CODE_NAME)->getStyle('M81:Q81')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R81', @$report3[124]->DESCRIPTION)->getStyle('R81')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S81', (@$report3[124]->MI === 0?'':@$report3[124]->MI))->getStyle('S81')->applyFromArray($arsir);
        $sheet->setCellValue('T81', (@$report3[124]->MA === 0?'':@$report3[124]->MA))->getStyle('T81')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U81', (@$report3[124]->CR === 0?'':@$report3[124]->CR))->getStyle('U81')->applyFromArray($arsir);

        $sheet->setCellValue('A82', @$report3[52]->CODE_DEFECT)->getStyle('A82')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B82:G82');
        $sheet->setCellValue('B82', @$report3[52]->REJECT_CODE_NAME)->getStyle('B82:G82')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H82', @$report3[52]->DESCRIPTION)->getStyle('H82')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I82', (@$report3[52]->MI === 0?'':@$report3[52]->MI))->getStyle('I82')->applyFromArray($arsir);
        $sheet->setCellValue('J82', (@$report3[52]->MA === 0?'':@$report3[52]->MA))->getStyle('J82')->applyFromArray($arsir);
        $sheet->setCellValue('K82', (@$report3[52]->CR === 0?'':@$report3[52]->CR))->getStyle('K82')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('L82', @$report3[125]->CODE_DEFECT)->getStyle('L82')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M82:Q82');
        $sheet->setCellValue('M82', @$report3[125]->REJECT_CODE_NAME)->getStyle('M82:Q82')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R82', @$report3[125]->DESCRIPTION)->getStyle('R82')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S82', (@$report3[125]->MI === 0?'':@$report3[125]->MI))->getStyle('S82')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T82', (@$report3[125]->MA === 0?'':@$report3[125]->MA))->getStyle('T82')->applyFromArray($arsir);
        $sheet->setCellValue('U82', (@$report3[125]->CR === 0?'':@$report3[125]->CR))->getStyle('U82')->applyFromArray($arsir);

        $sheet->setCellValue('A83', @$report3[53]->CODE_DEFECT)->getStyle('A83')->applyFromArray($kontenputihleft)->getNumberFormat()->setFormatCode('###0.00');
        $sheet->mergeCells('B83:G83');
        $sheet->setCellValue('B83', @$report3[53]->REJECT_CODE_NAME)->getStyle('B83:G83')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H83', @$report3[53]->DESCRIPTION)->getStyle('H83')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I83', (@$report3[53]->MI === 0?'':@$report3[53]->MI))->getStyle('I83')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J83', (@$report3[53]->MA === 0?'':@$report3[53]->MA))->getStyle('J83')->applyFromArray($arsir);
        $sheet->setCellValue('K83', (@$report3[53]->CR === 0?'':@$report3[53]->CR))->getStyle('K83')->applyFromArray($arsir);
        $sheet->setCellValue('L83', @$report3[126]->CODE_DEFECT)->getStyle('L83')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M83:Q83');
        $sheet->setCellValue('M83', @$report3[126]->REJECT_CODE_NAME)->getStyle('M83:Q83')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R83', @$report3[126]->DESCRIPTION)->getStyle('R83')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S83', (@$report3[126]->MI === 0?'':@$report3[126]->MI))->getStyle('S83')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T83', (@$report3[126]->MA === 0?'':@$report3[126]->MA))->getStyle('T83')->applyFromArray($arsir);
        $sheet->setCellValue('U83', (@$report3[126]->CR === 0?'':@$report3[126]->CR))->getStyle('U83')->applyFromArray($arsir);

        $sheet->setCellValue('A84', @$report3[54]->CODE_DEFECT)->getStyle('A84')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B84:G84');
        $sheet->setCellValue('B84', @$report3[54]->REJECT_CODE_NAME)->getStyle('B84:G84')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H84', @$report3[54]->DESCRIPTION)->getStyle('H84')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I84', (@$report3[54]->MI === 0?'':@$report3[54]->MI))->getStyle('I84')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J84', (@$report3[54]->MA === 0?'':@$report3[54]->MA))->getStyle('J84')->applyFromArray($arsir);
        $sheet->setCellValue('K84', (@$report3[54]->CR === 0?'':@$report3[54]->CR))->getStyle('K84')->applyFromArray($arsir);
        $sheet->setCellValue('L84', @$report3[127]->CODE_DEFECT)->getStyle('L84')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M84:Q84');
        $sheet->setCellValue('M84', @$report3[127]->REJECT_CODE_NAME)->getStyle('M84:Q84')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R84', @$report3[127]->DESCRIPTION)->getStyle('R84')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S84', (@$report3[127]->MI === 0?'':@$report3[127]->MI))->getStyle('S84')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T84', (@$report3[127]->MA === 0?'':@$report3[127]->MA))->getStyle('T84')->applyFromArray($arsir);
        $sheet->setCellValue('U84', (@$report3[127]->CR === 0?'':@$report3[127]->CR))->getStyle('U84')->applyFromArray($arsir);

        $sheet->setCellValue('A85', @$report3[55]->CODE_DEFECT)->getStyle('A85')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B85:G85');
        $sheet->setCellValue('B85', @$report3[55]->REJECT_CODE_NAME)->getStyle('B85:G85')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H85', @$report3[55]->DESCRIPTION)->getStyle('H85')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I85', (@$report3[55]->MI === 0?'':@$report3[55]->MI))->getStyle('I85')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J85', (@$report3[55]->MA === 0?'':@$report3[55]->MA))->getStyle('J85')->applyFromArray($arsir);
        $sheet->setCellValue('K85', (@$report3[55]->CR === 0?'':@$report3[55]->CR))->getStyle('K85')->applyFromArray($arsir);
        $sheet->setCellValue('L85', @$report3[128]->CODE_DEFECT)->getStyle('L85')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M85:Q85');
        $sheet->setCellValue('M85', @$report3[128]->REJECT_CODE_NAME)->getStyle('M85:Q85')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R85', @$report3[128]->DESCRIPTION)->getStyle('R85')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S85', (@$report3[128]->MI === 0?'':@$report3[128]->MI))->getStyle('S85')->applyFromArray($arsir);
        $sheet->setCellValue('T85', (@$report3[128]->MA === 0?'':@$report3[128]->MA))->getStyle('T85')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U85', (@$report3[128]->CR === 0?'':@$report3[128]->CR))->getStyle('U85')->applyFromArray($arsir);

        $sheet->setCellValue('A86', @$report3[56]->CODE_DEFECT)->getStyle('A86')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B86:G86');
        $sheet->setCellValue('B86', @$report3[56]->REJECT_CODE_NAME)->getStyle('B86:G86')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H86', @$report3[56]->DESCRIPTION)->getStyle('H86')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I86', (@$report3[56]->MI === 0?'':@$report3[56]->MI))->getStyle('I86')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J86', (@$report3[56]->MA === 0?'':@$report3[56]->MA))->getStyle('J86')->applyFromArray($arsir);
        $sheet->setCellValue('K86', (@$report3[56]->CR === 0?'':@$report3[56]->CR))->getStyle('K86')->applyFromArray($arsir);
        $sheet->setCellValue('L86',  @$report3[129]->CODE_DEFECT)->getStyle('L86')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M86:Q86');
        $sheet->setCellValue('M86', @$report3[129]->REJECT_CODE_NAME)->getStyle('M86:Q86')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R86', @$report3[129]->DESCRIPTION)->getStyle('R86')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S86', (@$report3[129]->MI === 0?'':@$report3[129]->MI))->getStyle('S86')->applyFromArray($arsir);
        $sheet->setCellValue('T86', (@$report3[129]->MA === 0?'':@$report3[129]->MA))->getStyle('T86')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U86', (@$report3[129]->CR === 0?'':@$report3[129]->CR))->getStyle('U86')->applyFromArray($arsir);

        $sheet->setCellValue('A87', @$report3[57]->CODE_DEFECT)->getStyle('A87')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B87:G87');
        $sheet->setCellValue('B87', @$report3[57]->REJECT_CODE_NAME)->getStyle('B87:G87')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H87', @$report3[57]->DESCRIPTION)->getStyle('H87')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I87', (@$report3[57]->MI === 0?'':@$report3[57]->MI))->getStyle('I87')->applyFromArray($arsir);
        $sheet->setCellValue('J87', (@$report3[57]->MA === 0?'':@$report3[57]->MA))->getStyle('J87')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K87', (@$report3[57]->CR === 0?'':@$report3[57]->CR))->getStyle('K87')->applyFromArray($arsir);
        $sheet->setCellValue('L87', @$report3[130]->CODE_DEFECT)->getStyle('L87')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M87:Q87');
        $sheet->setCellValue('M87', @$report3[130]->REJECT_CODE_NAME)->getStyle('M87:Q87')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R87', @$report3[130]->DESCRIPTION)->getStyle('R87')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S87', (@$report3[130]->MI === 0?'':@$report3[130]->MI))->getStyle('S87')->applyFromArray($arsir);
        $sheet->setCellValue('T87', (@$report3[130]->MA === 0?'':@$report3[130]->MA))->getStyle('T87')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U87', (@$report3[130]->CR === 0?'':@$report3[130]->CR))->getStyle('U87')->applyFromArray($arsir);

        $sheet->setCellValue('A88', @$report3[58]->CODE_DEFECT)->getStyle('A88')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B88:G88');
        $sheet->setCellValue('B88', @$report3[58]->REJECT_CODE_NAME)->getStyle('B88:G88')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H88', @$report3[58]->DESCRIPTION)->getStyle('H88')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I88', (@$report3[58]->MI === 0?'':@$report3[58]->MI))->getStyle('I88')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J88', (@$report3[58]->MA === 0?'':@$report3[58]->MA))->getStyle('J88')->applyFromArray($arsir);
        $sheet->setCellValue('K88', (@$report3[58]->CR === 0?'':@$report3[58]->CR))->getStyle('K88')->applyFromArray($arsir);
        $sheet->setCellValue('L88', @$report3[131]->CODE)->getStyle('L88')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M88:Q88');
        $sheet->setCellValue('M88', @$report3[131]->CODE_NAME)->getStyle('M88:Q88')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R88', '')->getStyle('R88')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S88', '')->getStyle('S88')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T88', '')->getStyle('T88')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U88', '')->getStyle('U88')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('A89',  @$report3[59]->CODE)->getStyle('A89')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('B89:G89');
        $sheet->setCellValue('B89', @$report3[59]->CODE_NAME)->getStyle('B89:G89')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H89', '')->getStyle('H89')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('I89', '')->getStyle('I89')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('J89', '')->getStyle('J89')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('K89', '')->getStyle('K89')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('L89', @$report3[131]->CODE_DEFECT)->getStyle('L89')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M89:Q89');
        $sheet->setCellValue('M89', @$report3[131]->REJECT_CODE_NAME)->getStyle('M89:Q89')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R89', @$report3[131]->DESCRIPTION)->getStyle('R89')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S89', (@$report3[131]->MI === 0?'':@$report3[131]->MI))->getStyle('S89')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T89', (@$report3[131]->MA === 0?'':@$report3[131]->MA))->getStyle('T89')->applyFromArray($arsir);
        $sheet->setCellValue('U89', (@$report3[131]->CR === 0?'':@$report3[131]->CR))->getStyle('U89')->applyFromArray($arsir);

        $sheet->setCellValue('A90', @$report3[59]->CODE_DEFECT)->getStyle('A90')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B90:G90');
        $sheet->setCellValue('B90', @$report3[59]->REJECT_CODE_NAME)->getStyle('B90:G90')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H90', @$report3[59]->DESCRIPTION)->getStyle('H90')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I90', (@$report3[59]->MI === 0?'':@$report3[59]->MI))->getStyle('I90')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J90', (@$report3[59]->MA === 0?'':@$report3[59]->MA))->getStyle('J90')->applyFromArray($arsir);
        $sheet->setCellValue('K90', (@$report3[59]->CR === 0?'':@$report3[59]->CR))->getStyle('K90')->applyFromArray($arsir);
        $sheet->setCellValue('L90', @$report3[132]->CODE_DEFECT)->getStyle('L90')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M90:Q90');
        $sheet->setCellValue('M90', @$report3[132]->REJECT_CODE_NAME)->getStyle('M90:Q90')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R90', @$report3[132]->DESCRIPTION)->getStyle('R90')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S90', (@$report3[132]->MI === 0?'':@$report3[132]->MI))->getStyle('S90')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T90', (@$report3[132]->MA === 0?'':@$report3[132]->MA))->getStyle('T90')->applyFromArray($arsir);
        $sheet->setCellValue('U90', (@$report3[132]->CR === 0?'':@$report3[132]->CR))->getStyle('U90')->applyFromArray($arsir);

        $sheet->setCellValue('A91', @$report3[60]->CODE_DEFECT)->getStyle('A91')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B91:G91');
        $sheet->setCellValue('B91', @$report3[60]->REJECT_CODE_NAME)->getStyle('B91:G91')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H91', @$report3[60]->DESCRIPTION)->getStyle('H91')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I91', (@$report3[60]->MI === 0?'':@$report3[60]->MI))->getStyle('I91')->applyFromArray($arsir);
        $sheet->setCellValue('J91', (@$report3[60]->MA === 0?'':@$report3[60]->MA))->getStyle('J91')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K91', (@$report3[60]->CR === 0?'':@$report3[60]->CR))->getStyle('K91')->applyFromArray($arsir);
        $sheet->setCellValue('L91',  @$report3[133]->CODE_DEFECT)->getStyle('L91')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M91:Q91');
        $sheet->setCellValue('M91', @$report3[133]->REJECT_CODE_NAME)->getStyle('M91:Q91')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R91', @$report3[133]->DESCRIPTION)->getStyle('R91')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S91', (@$report3[133]->MI === 0?'':@$report3[133]->MI))->getStyle('S91')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T91', (@$report3[133]->MA === 0?'':@$report3[133]->MA))->getStyle('T91')->applyFromArray($arsir);
        $sheet->setCellValue('U91', (@$report3[133]->CR === 0?'':@$report3[133]->CR))->getStyle('U91')->applyFromArray($arsir);

        $sheet->setCellValue('A92', @$report3[61]->CODE_DEFECT)->getStyle('A92')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B92:G92');
        $sheet->setCellValue('B92', @$report3[61]->REJECT_CODE_NAME)->getStyle('B92:G92')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H92', @$report3[61]->DESCRIPTION)->getStyle('H92')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I92', (@$report3[61]->MI === 0?'':@$report3[61]->MI))->getStyle('I92')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J92', (@$report3[61]->MA === 0?'':@$report3[61]->MA))->getStyle('J92')->applyFromArray($arsir);
        $sheet->setCellValue('K92', (@$report3[61]->CR === 0?'':@$report3[61]->CR))->getStyle('K92')->applyFromArray($arsir);
        $sheet->setCellValue('L92', @$report3[134]->CODE_DEFECT)->getStyle('L92')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M92:Q92');
        $sheet->setCellValue('M92', @$report3[134]->REJECT_CODE_NAME)->getStyle('M92:Q92')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R92', @$report3[134]->DESCRIPTION)->getStyle('R92')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S92', (@$report3[134]->MI === 0?'':@$report3[134]->MI))->getStyle('S92')->applyFromArray($arsir);
        $sheet->setCellValue('T92', (@$report3[134]->MA === 0?'':@$report3[134]->MA))->getStyle('T92')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U92', (@$report3[134]->CR === 0?'':@$report3[134]->CR))->getStyle('U92')->applyFromArray($arsir);

        $sheet->setCellValue('A93', @$report3[62]->CODE_DEFECT)->getStyle('A93')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B93:G93');
        $sheet->setCellValue('B93', @$report3[62]->REJECT_CODE_NAME)->getStyle('B93:G93')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H93', @$report3[62]->DESCRIPTION)->getStyle('H93')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I93', (@$report3[62]->MI === 0?'':@$report3[62]->MI))->getStyle('I93')->applyFromArray($arsir);
        $sheet->setCellValue('J93', (@$report3[62]->MA === 0?'':@$report3[62]->MA))->getStyle('J93')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K93', (@$report3[62]->CR === 0?'':@$report3[62]->CR))->getStyle('K93')->applyFromArray($arsir);
        $sheet->setCellValue('L93', @$report3[135]->CODE)->getStyle('L93')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M93:Q93');
        $sheet->setCellValue('M93', @$report3[135]->CODE_NAME)->getStyle('M93:Q93')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R93', '')->getStyle('R93')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S93', '')->getStyle('S93')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T93', '')->getStyle('T93')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U93', '')->getStyle('U93')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('A94', @$report3[63]->CODE_DEFECT)->getStyle('A94')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B94:G94');
        $sheet->setCellValue('B94', @$report3[63]->REJECT_CODE_NAME)->getStyle('B94:G94')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H94', @$report3[63]->DESCRIPTION)->getStyle('H94')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I94', (@$report3[63]->MI === 0?'':@$report3[63]->MI))->getStyle('I94')->applyFromArray($arsir);
        $sheet->setCellValue('J94', (@$report3[63]->MA === 0?'':@$report3[63]->MA))->getStyle('J94')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K94', (@$report3[63]->CR === 0?'':@$report3[63]->CR))->getStyle('K94')->applyFromArray($arsir);
        $sheet->setCellValue('L94', @$report3[135]->CODE_DEFECT)->getStyle('L94')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M94:Q94');
        $sheet->setCellValue('M94', @$report3[135]->REJECT_CODE_NAME)->getStyle('M94:Q94')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R94', @$report3[135]->DESCRIPTION)->getStyle('R94')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S94', (@$report3[135]->MI === 0?'':@$report3[135]->MI))->getStyle('S94')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T94', (@$report3[135]->MA === 0?'':@$report3[135]->MA))->getStyle('T94')->applyFromArray($arsir);
        $sheet->setCellValue('U94', (@$report3[135]->CR === 0?'':@$report3[135]->CR))->getStyle('U94')->applyFromArray($arsir);

        $sheet->setCellValue('A95', @$report3[64]->CODE_DEFECT)->getStyle('A95')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B95:G95');
        $sheet->setCellValue('B95', @$report3[64]->REJECT_CODE_NAME)->getStyle('B95:G95')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H95', @$report3[64]->DESCRIPTION)->getStyle('H95')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I95', (@$report3[64]->MI === 0?'':@$report3[64]->MI))->getStyle('I95')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J95', (@$report3[64]->MA === 0?'':@$report3[64]->MA))->getStyle('J95')->applyFromArray($arsir);
        $sheet->setCellValue('K95', (@$report3[64]->CR === 0?'':@$report3[64]->CR))->getStyle('K95')->applyFromArray($arsir);
        $sheet->setCellValue('L95', @$report3[136]->CODE_DEFECT)->getStyle('L95')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M95:Q95');
        $sheet->setCellValue('M95', @$report3[136]->REJECT_CODE_NAME)->getStyle('M95:Q95')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R95', @$report3[136]->DESCRIPTION)->getStyle('R95')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S95', (@$report3[136]->MI === 0?'':@$report3[136]->MI))->getStyle('S95')->applyFromArray($arsir);
        $sheet->setCellValue('T95', (@$report3[136]->MA === 0?'':@$report3[136]->MA))->getStyle('T95')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U95', (@$report3[136]->CR === 0?'':@$report3[136]->CR))->getStyle('U95')->applyFromArray($arsir);

        $sheet->setCellValue('A96', @$report3[65]->CODE_DEFECT)->getStyle('A96')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B96:G96');
        $sheet->setCellValue('B96', @$report3[65]->REJECT_CODE_NAME)->getStyle('B96:G96')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H96', @$report3[65]->DESCRIPTION)->getStyle('H96')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I96', (@$report3[65]->MI === 0?'':@$report3[65]->MI))->getStyle('I96')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J96', (@$report3[65]->MA === 0?'':@$report3[65]->MA))->getStyle('J96')->applyFromArray($arsir);
        $sheet->setCellValue('K96', (@$report3[65]->CR === 0?'':@$report3[65]->CR))->getStyle('K96')->applyFromArray($arsir);
        $sheet->setCellValue('L96', @$report3[137]->CODE_DEFECT)->getStyle('L96')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M96:Q96');
        $sheet->setCellValue('M96', @$report3[137]->REJECT_CODE_NAME)->getStyle('M96:Q96')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R96', @$report3[137]->DESCRIPTION)->getStyle('R96')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S96', (@$report3[137]->MI === 0?'':@$report3[137]->MI))->getStyle('S96')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T96', (@$report3[137]->MA === 0?'':@$report3[137]->MA))->getStyle('T96')->applyFromArray($arsir);
        $sheet->setCellValue('U96', (@$report3[137]->CR === 0?'':@$report3[137]->CR))->getStyle('U96')->applyFromArray($arsir);


        $sheet->setCellValue('A97', @$report3[66]->CODE)->getStyle('A97')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B97:G97');
        $sheet->setCellValue('B97', @$report3[66]->CODE_NAME)->getStyle('B97:G97')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H97', '')->getStyle('H97')->applyFromArray($kontenputihleft);
        $sheet->setCellValue('I97', (@$report3[68]->MI === 0?'':@$report3[68]->MI))->getStyle('I97')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J97', (@$report3[67]->MI === 0?'':@$report3[67]->MI))->getStyle('J97')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K97', (@$report3[66]->MI === 0?'':@$report3[66]->MI))->getStyle('K97')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('L97', @$report3[138]->CODE_DEFECT)->getStyle('L97')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M97:Q97');
        $sheet->setCellValue('M97', @$report3[138]->REJECT_CODE_NAME)->getStyle('M97:Q97')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R97', @$report3[138]->DESCRIPTION)->getStyle('R97')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S97', (@$report3[138]->MI === 0?'':@$report3[138]->MI))->getStyle('S97')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T97', (@$report3[138]->MA === 0?'':@$report3[138]->MA))->getStyle('T97')->applyFromArray($arsir);
        $sheet->setCellValue('U97', (@$report3[138]->CR === 0?'':@$report3[138]->CR))->getStyle('U97')->applyFromArray($arsir);

        $sheet->setCellValue('A98', @$report3[69]->CODE)->getStyle('A98')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('B98:G98');
        $sheet->setCellValue('B98', @$report3[69]->CODE_NAME)->getStyle('B98:G98')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H98', '')->getStyle('H98')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('I98', '')->getStyle('I98')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('J98', '')->getStyle('J98')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('K98', '')->getStyle('K98')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('L98', @$report3[139]->CODE)->getStyle('L98')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('M98:Q98');
        $sheet->setCellValue('M98', @$report3[139]->CODE_NAME)->getStyle('M98:Q98')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R98', '')->getStyle('R98')->applyFromArray($kontenboldabuleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S98', '')->getStyle('S98')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('T98', '')->getStyle('T98')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('U98', '')->getStyle('U98')->applyFromArray($kontenboldabuleft);

        $sheet->setCellValue('A99', @$report3[69]->CODE_DEFECT)->getStyle('A99')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B99:G99');
        $sheet->setCellValue('B99', @$report3[69]->REJECT_CODE_NAME)->getStyle('B99:G99')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H99', @$report3[69]->DESCRIPTION)->getStyle('H99')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I99', (@$report3[69]->MI === 0?'':@$report3[69]->MI))->getStyle('I99')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J99', (@$report3[69]->MA === 0?'':@$report3[69]->MA))->getStyle('J99')->applyFromArray($arsir);
        $sheet->setCellValue('K99', (@$report3[69]->CR === 0?'':@$report3[69]->CR))->getStyle('K99')->applyFromArray($arsir);
        $sheet->setCellValue('L99', @$report3[139]->CODE_DEFECT)->getStyle('L99')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M99:Q99');
        $sheet->setCellValue('M99', @$report3[139]->REJECT_CODE_NAME)->getStyle('M99:Q99')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R99', @$report3[139]->DESCRIPTION)->getStyle('R99')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S99', (@$report3[139]->MI === 0?'':@$report3[139]->MI))->getStyle('S99')->applyFromArray($arsir);
        $sheet->setCellValue('T99', (@$report3[139]->MA === 0?'':@$report3[139]->MA))->getStyle('T99')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U99', (@$report3[139]->CR === 0?'':@$report3[139]->CR))->getStyle('U99')->applyFromArray($arsir);

        $sheet->setCellValue('A100', @$report3[70]->CODE_DEFECT)->getStyle('A100')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B100:G100');
        $sheet->setCellValue('B100', @$report3[70]->REJECT_CODE_NAME)->getStyle('B100:G100')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H100', @$report3[70]->DESCRIPTION)->getStyle('H100')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('I100', (@$report3[70]->MI === 0?'':@$report3[70]->MI))->getStyle('I100')->applyFromArray($arsir);
        $sheet->setCellValue('J100', (@$report3[70]->MA === 0?'':@$report3[70]->MA))->getStyle('J100')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K100', (@$report3[70]->CR === 0?'':@$report3[70]->CR))->getStyle('K100')->applyFromArray($arsir);
        $sheet->setCellValue('L100', @$report3[140]->CODE_DEFECT)->getStyle('L100')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M100:Q100');
        $sheet->setCellValue('M100', @$report3[140]->REJECT_CODE_NAME)->getStyle('M100:Q100')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R100', @$report3[140]->DESCRIPTION)->getStyle('R100')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S100', (@$report3[140]->MI === 0?'':@$report3[140]->MI))->getStyle('S100')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T100', (@$report3[140]->MA === 0?'':@$report3[140]->MA))->getStyle('T100')->applyFromArray($arsir);
        $sheet->setCellValue('U100', (@$report3[140]->CR === 0?'':@$report3[140]->CR))->getStyle('U100')->applyFromArray($arsir);

        $sheet->setCellValue('A101', @$report3[71]->CODE_DEFECT)->getStyle('A101')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B101:G101');
        $sheet->setCellValue('B101', @$report3[71]->REJECT_CODE_NAME)->getStyle('B101:G101')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H101', @$report3[71]->DESCRIPTION)->getStyle('H101')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('I101', (@$report3[71]->MI === 0?'':@$report3[71]->MI))->getStyle('I101')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J101', (@$report3[71]->MA === 0?'':@$report3[71]->MA))->getStyle('J101')->applyFromArray($arsir);
        $sheet->setCellValue('K101', (@$report3[71]->CR === 0?'':@$report3[71]->CR))->getStyle('K101')->applyFromArray($arsir);
        $sheet->setCellValue('L101', @$report3[141]->CODE_DEFECT)->getStyle('L101')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M101:Q101');
        $sheet->setCellValue('M101', @$report3[141]->REJECT_CODE_NAME)->getStyle('M101:Q101')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R101', @$report3[141]->DESCRIPTION)->getStyle('R101')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S101', (@$report3[141]->MI === 0?'':@$report3[141]->MI))->getStyle('S101')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T101', (@$report3[141]->MA === 0?'':@$report3[141]->MA))->getStyle('T101')->applyFromArray($arsir);
        $sheet->setCellValue('U101', (@$report3[141]->CR === 0?'':@$report3[141]->CR))->getStyle('U101')->applyFromArray($arsir);

        $sheet->setCellValue('A102', @$report3[72]->CODE_DEFECT)->getStyle('A102')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B102:G102');
        $sheet->setCellValue('B102', @$report3[72]->REJECT_CODE_NAME)->getStyle('B102:G102')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H102', @$report3[72]->DESCRIPTION)->getStyle('H102')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('I102', (@$report3[72]->MI === 0?'':@$report3[72]->MI))->getStyle('I102')->applyFromArray($arsir);
        $sheet->setCellValue('J102', (@$report3[72]->MA === 0?'':@$report3[72]->MA))->getStyle('J102')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('K102', (@$report3[72]->CR === 0?'':@$report3[72]->CR))->getStyle('K102')->applyFromArray($arsir);
        $sheet->setCellValue('L102', @$report3[142]->CODE_DEFECT)->getStyle('L102')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M102:Q102');
        $sheet->setCellValue('M102', @$report3[142]->REJECT_CODE_NAME)->getStyle('M102:Q102')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R102', @$report3[142]->DESCRIPTION)->getStyle('R102')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S102', (@$report3[142]->MI === 0?'':@$report3[142]->MI))->getStyle('S102')->applyFromArray($arsir);
        $sheet->setCellValue('T102', (@$report3[142]->MA === 0?'':@$report3[142]->MA))->getStyle('T102')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U102', (@$report3[142]->CR === 0?'':@$report3[142]->CR))->getStyle('U102')->applyFromArray($arsir);

        $sheet->setCellValue('A103', @$report3[73]->CODE_DEFECT)->getStyle('A103')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B103:G103');
        $sheet->setCellValue('B103', @$report3[73]->REJECT_CODE_NAME)->getStyle('B103:G103')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H103', @$report3[73]->DESCRIPTION)->getStyle('H103')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('I103', (@$report3[73]->MI === 0?'':@$report3[73]->MI))->getStyle('I103')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J103', (@$report3[73]->MA === 0?'':@$report3[73]->MA))->getStyle('J103')->applyFromArray($arsir);
        $sheet->setCellValue('K103', (@$report3[73]->CR === 0?'':@$report3[73]->CR))->getStyle('K103')->applyFromArray($arsir);
        $sheet->setCellValue('L103', @$report3[143]->CODE_DEFECT)->getStyle('L103')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M103:Q103');
        $sheet->setCellValue('M103', @$report3[143]->REJECT_CODE_NAME)->getStyle('M103:Q103')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R103', @$report3[143]->DESCRIPTION)->getStyle('R103')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S103', (@$report3[143]->MI === 0?'':@$report3[143]->MI))->getStyle('S103')->applyFromArray($arsir);
        $sheet->setCellValue('T103', (@$report3[143]->MA === 0?'':@$report3[143]->MA))->getStyle('T103')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U103', (@$report3[143]->CR === 0?'':@$report3[143]->CR))->getStyle('U103')->applyFromArray($arsir);

        $sheet->setCellValue('A104', @$report3[74]->CODE_DEFECT)->getStyle('A104')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B104:G104');
        $sheet->setCellValue('B104', @$report3[74]->REJECT_CODE_NAME)->getStyle('B104:G104')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H104', @$report3[74]->DESCRIPTION)->getStyle('H104')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('I104', (@$report3[74]->MI === 0?'':@$report3[74]->MI))->getStyle('I104')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('J104', (@$report3[74]->MA === 0?'':@$report3[74]->MA))->getStyle('J104')->applyFromArray($arsir);
        $sheet->setCellValue('K104', (@$report3[74]->CR === 0?'':@$report3[74]->CR))->getStyle('K104')->applyFromArray($arsir);
        $sheet->setCellValue('L104', @$report3[144]->CODE_DEFECT)->getStyle('L104')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M104:Q104');
        $sheet->setCellValue('M104', @$report3[144]->REJECT_CODE_NAME)->getStyle('M104:Q104')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R104', @$report3[144]->DESCRIPTION)->getStyle('R104')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S104', (@$report3[144]->MI === 0?'':@$report3[144]->MI))->getStyle('S104')->applyFromArray($arsir);
        $sheet->setCellValue('T104', (@$report3[144]->MA === 0?'':@$report3[144]->MA))->getStyle('T104')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('U104', (@$report3[144]->CR === 0?'':@$report3[144]->CR))->getStyle('U104')->applyFromArray($arsir);

        $sheet->setCellValue('A105', @$report3[75]->CODE_DEFECT)->getStyle('A105')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('B105:G105');
        $sheet->setCellValue('B105', @$report3[75]->REJECT_CODE_NAME)->getStyle('B105:G105')->applyFromArray($merahleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('H105', @$report3[75]->DESCRIPTION)->getStyle('H105')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('I105', (@$report3[75]->MI === 0?'':@$report3[75]->MI))->getStyle('I105')->applyFromArray($arsir);
        $sheet->setCellValue('J105', (@$report3[75]->MA === 0?'':@$report3[75]->MA))->getStyle('J105')->applyFromArray($arsir);
        $sheet->setCellValue('K105', (@$report3[75]->CR === 0?'':@$report3[75]->CR))->getStyle('K105')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('L105', @$report3[145]->CODE_DEFECT)->getStyle('L105')->applyFromArray($kontenputihleft);
        $sheet->mergeCells('M105:Q105');
        $sheet->setCellValue('M105', @$report3[145]->REJECT_CODE_NAME)->getStyle('M105:Q105')->applyFromArray($kontenputihleft)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('R105', @$report3[145]->DESCRIPTION)->getStyle('R105')->applyFromArray($kontenputihcenter)->getAlignment()->setWrapText(true);
        $sheet->setCellValue('S105', (@$report3[145]->MI === 0?'':@$report3[145]->MI))->getStyle('S105')->applyFromArray($kontenputihcenter);
        $sheet->setCellValue('T105', (@$report3[145]->MA === 0?'':@$report3[145]->MA))->getStyle('T105')->applyFromArray($arsir);
        $sheet->setCellValue('U105', (@$report3[145]->CR === 0?'':@$report3[145]->CR))->getStyle('U105')->applyFromArray($arsir);

        $sheet->mergeCells('A106:K106');
        $sheet->setCellValue('A106', '')->getStyle('A106:K106')->applyFromArray($kontenratatengah);
        $sheet->mergeCells('L106:Q106');
        $sheet->setCellValue('L106', 'TOTAL DEFECT : ')->getStyle('L106:Q106')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('R106', '')->getStyle('R106')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('S106', @$report2->MINOR_REJ_DATA)->getStyle('S106')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('T106', @$report2->MAJOR_REJ_DATA)->getStyle('T106')->applyFromArray($kontenratatengah);
        $sheet->setCellValue('U106', @$report2->CRITIC_REJ_DATA)->getStyle('U106')->applyFromArray($kontenratatengah);

        $sheet->mergeCells('H108:I108');
        $sheet->setCellValue('H108', 'Accepted')->getStyle('H108:I108')->applyFromArray($biru);
        $sheet->setCellValue('J108', (@$report2->INSPECT_RESULT === 'Y'?'V':''))->getStyle('J108')->applyFromArray($kontenratatengah);

        $sheet->mergeCells('L108:M108');
        $sheet->setCellValue('L108', 'Rejected')->getStyle('L108:M108')->applyFromArray($merahleft);
        $sheet->setCellValue('N108', (@$report2->INSPECT_RESULT === 'Y'?'':'V'))->getStyle('N108')->applyFromArray($kontenratatengah);

        $sheet->mergeCells('A110:D110');
        $sheet->setCellValue('A110', 'COMMENT(S) / CORRECTIVE ACTION(S) REQUIRED:')->getStyle('A110:D110')->applyFromArray($tanpagaris);

        $sheet->mergeCells('A111:U111');
        $sheet->setCellValue('A111', '')->getStyle('A111:U111')->applyFromArray($garistipis);

        $sheet->mergeCells('A113:E113');
        $sheet->setCellValue('A113', 'adidas-Group Prod. Manager*')->getStyle('A113:E113')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('F113:K113');
        $sheet->setCellValue('F113', @$report2->REPRESENTATIVE_NAME)->getStyle('F113:K113')->applyFromArray($garistebal);
        $sheet->mergeCells('L113:M113');
        $sheet->setCellValue('L113', 'Signature /date ')->getStyle('L113:M113')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('N113:U113');
        $sheet->setCellValue('N113', '')->getStyle('N113:U113')->applyFromArray($garistebal);

        $sheet->mergeCells('A114:E114');
        $sheet->setCellValue('A114', 'Inspector**')->getStyle('A114:E114')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('F114:K114');
        $sheet->setCellValue('F114', @$report2->ID_INSPECTOR)->getStyle('F114:K114')->applyFromArray($garistebal);
        $sheet->mergeCells('L114:M114');
        $sheet->setCellValue('L114', 'Signature /date ')->getStyle('L114:M114')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('N114:U114');
        $sheet->setCellValue('N114', '')->getStyle('N114:U114')->applyFromArray($garistebal);

        $sheet->mergeCells('A115:E115');
        $sheet->setCellValue('A115', 'Factory Rep./  Fty Prod. Head')->getStyle('A115:E115')->applyFromArray($tanpagaristebal);
        $sheet->mergeCells('F115:K115');
        $sheet->setCellValue('F115', @$report2->PRODUCTION_MANAGER_NAME)->getStyle('F115:K115')->applyFromArray($garistebal);
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
		
		$filename = 'Report_'.$po.'_'.$partial;
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

        $writer->save('php://output');
        
        // print("<pre>".print_r($data,true)."</pre>");
        // print("<pre>".print_r($report3,true)."</pre>");
        // PRINT_R($report3[0]->CODE_NAME);
        // print("<pre>".print_r($report2,true)."</pre>");


	}
}

