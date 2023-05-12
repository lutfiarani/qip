<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_third_summary extends CI_Controller{
    
    public function __construct(){
        parent:: __construct(); 
        date_default_timezone_set('Asia/Jakarta');
       
		$this->load->model('M_aql_inspect');
		// $this->load->library('Excel');
        // sesscheck();
    }


	public function index($tanggal)
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

       

        $kontenboldabuleft = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'wraptext' =>true,
            ],
            'font' => [
                'size' => 12,
                'bold'=>true,
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

        $kontenboldijoleft = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'wraptext' =>true,
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
                'color' => array('argb' => '189E4D')
            ],
        );

        $kontenboldmerahleft = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'wraptext' =>true,
            ],
            'font' => [
                'size' => 12,
                'bold'=>true,
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => array('argb' => 'E31537')
            ],
        );

       

        $kontenwraptext = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'wraptext' =>true,
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
                'size' => 12,
                'bold' => true,
            ], 
           
        );

        $kontenratatengah = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'wraptext' =>true
            ],
            'font' => [
                'size' => 11
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            
        );

        $kontentotal = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'wraptext' =>true
            ],
            'font' => [
                'size' => 11,
                'bold' => true,
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => array('argb' => '737068')
            ],
        );

       

              
        $writer = new Xlsx($spreadsheet);

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Paid');
        $drawing->setDescription('Paid');
        $drawing->setPath('template/sign/supriyati.jpg'); // put your path and image here
        $drawing->setCoordinates('Q114');
        $drawing->setHeight(27);
        $drawing->setOffsetX(0);
        $drawing->setRotation(0);
        $drawing->getShadow()->setVisible(true);
        $drawing->getShadow()->setDirection(0);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
        
        $writer = new Xlsx($spreadsheet);

      
        
        $date = $this->M_aql_inspect->summary_third_date($tanggal)->result_array();
        $factory = $this->M_aql_inspect->summary_third_fac($tanggal)->result_array();
        
        $sheet->mergeCells('A1:U1');
        $sheet->mergeCells('A2:U2');
        $sheet->mergeCells('A3:U3')->getStyle('A3:U3')->applyFromArray($judul);
        $sheet->setCellValue('A3', 'Summary Third Party');
        $sheet->mergeCells('A4:U4');

        $sheet->mergeCells('B7:G7');
        $sheet->setCellValue('B7', 'Summary of Total PO and Pass Rate')->getStyle('B7')->applyFromArray($kontenatas);
        // $sheet->setCellValue('A5', 'Plant / Cell')->getStyle('A5')->applyFromArray($kontenatas);
        // $sheet->mergeCells('B5:C5');
        $sheet->setCellValue('B8', '3rd Party Inspection Date')->getStyle('B8')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('C8', 'Total PO')->getStyle('C8')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('D8', 'PO Release')->getStyle('D8')->applyFromArray($kontenboldijoleft);
        $sheet->setCellValue('E8', 'PO Rejected')->getStyle('E8')->applyFromArray($kontenboldmerahleft);
        $sheet->setCellValue('F8', 'Release %')->getStyle('F8')->applyFromArray($kontenboldijoleft);
        $sheet->setCellValue('G8', 'Rejected %')->getStyle('G8')->applyFromArray($kontenboldmerahleft);
        
        $jumlah = count($date);
        $no = 8;
        for($i=0; $i<$jumlah; $i++){
            $no++;
            if($i < $jumlah-1){

                $sheet->setCellValue('B'.$no.'', @$date[$i]['INSPECT_DATE'])->getStyle('B'.$no.'')->applyFromArray($kontenratatengah);   
                $sheet->setCellValue('C'.$no.'', @$date[$i]['TOTAL_PO'])->getStyle('C'.$no.'')->applyFromArray($kontenratatengah);   
                $sheet->setCellValue('D'.$no.'', @$date[$i]['PO_RELEASE'])->getStyle('D'.$no.'')->applyFromArray($kontenratatengah);   
                $sheet->setCellValue('E'.$no.'', @$date[$i]['PO_REJECT'])->getStyle('E'.$no.'')->applyFromArray($kontenratatengah);   
                $sheet->setCellValue('F'.$no.'', @$date[$i]['RELEASE'].'%')->getStyle('F'.$no.'')->applyFromArray($kontenratatengah);   
                $sheet->setCellValue('G'.$no.'', @$date[$i]['REJECT'].'%')->getStyle('G'.$no.'')->applyFromArray($kontenratatengah);   
            }else{
                $sheet->setCellValue('B'.$no.'', @$date[$i]['INSPECT_DATE'])->getStyle('B'.$no.'')->applyFromArray($kontentotal);   
                $sheet->setCellValue('C'.$no.'', @$date[$i]['TOTAL_PO'])->getStyle('C'.$no.'')->applyFromArray($kontentotal);   
                $sheet->setCellValue('D'.$no.'', @$date[$i]['PO_RELEASE'])->getStyle('D'.$no.'')->applyFromArray($kontentotal);   
                $sheet->setCellValue('E'.$no.'', @$date[$i]['PO_REJECT'])->getStyle('E'.$no.'')->applyFromArray($kontentotal);   
                $sheet->setCellValue('F'.$no.'', @$date[$i]['RELEASE'].'%')->getStyle('F'.$no.'')->applyFromArray($kontentotal);   
                $sheet->setCellValue('G'.$no.'', @$date[$i]['REJECT'].'%')->getStyle('G'.$no.'')->applyFromArray($kontentotal);   
            }
            
        }
       
        $sheet->mergeCells('K7:P7');
        $sheet->setCellValue('K7', 'Summary of Total PO and Pass Rate by Building')->getStyle('K7')->applyFromArray($kontenatas);
        // $sheet->setCellValueByColumnAndRow(11, 7, 'Summary of Total PO and Pass Rate by Building')->getStyle(11,7)->applyFromArray($kontenatas);
        // $sheet->setCellValue('A5', 'Plant / Cell')->getStyle('A5')->applyFromArray($kontenatas);
        // $sheet->mergeCells('B5:C5');
        $sheet->setCellValue('K8', 'Building')->getStyle('K8')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('L8', 'Total PO')->getStyle('L8')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('M8', 'PO Release')->getStyle('M8')->applyFromArray($kontenboldijoleft);
        $sheet->setCellValue('N8', 'PO Rejected')->getStyle('N8')->applyFromArray($kontenboldmerahleft);
        $sheet->setCellValue('O8', 'Release %')->getStyle('O8')->applyFromArray($kontenboldijoleft);
        $sheet->setCellValue('P8', 'Rejected %')->getStyle('P8')->applyFromArray($kontenboldmerahleft);
        
        $jumlah = count($factory);
        $no = 8;
        for($i=0; $i<$jumlah; $i++){
            $no++;
            if($i < $jumlah-1){
                $sheet->setCellValue('K'.$no.'', @$factory[$i]['FACTORY'])->getStyle('K'.$no.'')->applyFromArray($kontenratatengah);   
                $sheet->setCellValue('L'.$no.'', @$factory[$i]['TOTAL_PO'])->getStyle('L'.$no.'')->applyFromArray($kontenratatengah);   
                $sheet->setCellValue('M'.$no.'', @$factory[$i]['PO_RELEASE'])->getStyle('M'.$no.'')->applyFromArray($kontenratatengah);   
                $sheet->setCellValue('N'.$no.'', @$factory[$i]['PO_REJECT'])->getStyle('N'.$no.'')->applyFromArray($kontenratatengah);   
                $sheet->setCellValue('O'.$no.'', @$factory[$i]['RELEASE'].'%')->getStyle('O'.$no.'')->applyFromArray($kontenratatengah);   
                $sheet->setCellValue('P'.$no.'', @$factory[$i]['REJECT'].'%')->getStyle('P'.$no.'')->applyFromArray($kontenratatengah);   
            }else{
                $sheet->setCellValue('K'.$no.'', @$factory[$i]['FACTORY'])->getStyle('K'.$no.'')->applyFromArray($kontentotal);   
                $sheet->setCellValue('L'.$no.'', @$factory[$i]['TOTAL_PO'])->getStyle('L'.$no.'')->applyFromArray($kontentotal);   
                $sheet->setCellValue('M'.$no.'', @$factory[$i]['PO_RELEASE'])->getStyle('M'.$no.'')->applyFromArray($kontentotal);   
                $sheet->setCellValue('N'.$no.'', @$factory[$i]['PO_REJECT'])->getStyle('N'.$no.'')->applyFromArray($kontentotal);   
                $sheet->setCellValue('O'.$no.'', @$factory[$i]['RELEASE'].'%')->getStyle('O'.$no.'')->applyFromArray($kontentotal);   
                $sheet->setCellValue('P'.$no.'', @$factory[$i]['REJECT'].'%')->getStyle('P'.$no.'')->applyFromArray($kontentotal);  
            } 
        }




        $spreadsheet->getSheetByName('Worksheet 1');
		
		$filename = 'Summary_third'.$tanggal;
		
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

