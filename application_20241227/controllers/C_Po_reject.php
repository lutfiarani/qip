<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_Po_reject extends CI_Controller{
    
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
                'size' => 11
               
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            )
            // ),
            // 'fill' => [
            //     'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            //     'color' => array('argb' => '737068')
            // ],
        );

       

              
        $writer = new Xlsx($spreadsheet);
  
        $po_reject = $this->M_aql_inspect->po_reject_summary($tanggal)->result_array();
        
        
        $sheet->mergeCells('A1:U1');
        $sheet->mergeCells('A2:U2');
        $sheet->mergeCells('A3:U3')->getStyle('A3:U3')->applyFromArray($judul);
        $sheet->setCellValue('A3', $tanggal.' PO REJECT SUMMARY');
        $sheet->mergeCells('A4:U4');

        $sheet->mergeCells('B7:G7');
        // $sheet->setCellValue('B7', 'Summary of Total PO and Pass Rate')->getStyle('B7')->applyFromArray($kontenatas);
        // $sheet->setCellValue('A5', 'Plant / Cell')->getStyle('A5')->applyFromArray($kontenatas);
        // $sheet->mergeCells('B5:C5');
        $sheet->mergeCells('B8:C8');
        $sheet->setCellValue('B8', 'Date')->getStyle('B8:C8')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('D8:E8');
        $sheet->setCellValue('D8', 'PO')->getStyle('D8:E8')->applyFromArray($kontenboldabuleft);
        $sheet->mergeCells('F8:G8');
        $sheet->setCellValue('F8', 'Cell No')->getStyle('F8:G8')->applyFromArray($kontenboldijoleft);
        $sheet->mergeCells('H8:I8');
        $sheet->setCellValue('H8', 'Model Name')->getStyle('H8:I8')->applyFromArray($kontenboldmerahleft);
        $sheet->setCellValue('J8', 'Article')->getStyle('J8')->applyFromArray($kontenboldijoleft);
        $sheet->mergeCells('K8:L8');
        $sheet->setCellValue('K8', 'QC Name')->getStyle('K8:L8')->applyFromArray($kontenboldmerahleft);
        $sheet->mergeCells('M8:R8');
        $sheet->setCellValue('M8', 'Reject Reason')->getStyle('M8:R8')->applyFromArray($kontenboldmerahleft);
        
        $jumlah = count($po_reject);
        $no = 8;
        for($i=0; $i<$jumlah; $i++){
            $no++;
                $sheet->mergeCells('B'.$no.':C'.$no.'');
                $sheet->setCellValue('B'.$no.'', @$po_reject[$i]['TANGGAL'])->getStyle('B'.$no.':C'.$no.'')->applyFromArray($kontentotal);   
                $sheet->mergeCells('D'.$no.':E'.$no.'');
                $sheet->setCellValue('D'.$no.'', @$po_reject[$i]['PO_NO'])->getStyle('D'.$no.':E'.$no.'')->applyFromArray($kontentotal);   
                $sheet->mergeCells('F'.$no.':G'.$no.'');
                $sheet->setCellValue('F'.$no.'', @$po_reject[$i]['ZCELLNO'])->getStyle('F'.$no.':G'.$no.'')->applyFromArray($kontentotal);   
                $sheet->mergeCells('H'.$no.':I'.$no.'');
                $sheet->setCellValue('H'.$no.'', @$po_reject[$i]['PRDHA_T'])->getStyle('H'.$no.':I'.$no.'')->applyFromArray($kontentotal);   
                $sheet->setCellValue('J'.$no.'', @$po_reject[$i]['MATNR'])->getStyle('J'.$no.'')->applyFromArray($kontentotal);   
                $sheet->mergeCells('K'.$no.':L'.$no.'');
                $sheet->setCellValue('K'.$no.'', @$po_reject[$i]['NAME'])->getStyle('K'.$no.':L'.$no.'')->applyFromArray($kontentotal);   
                $sheet->mergeCells('M'.$no.':R'.$no.'');
                $sheet->setCellValue('M'.$no.'', @$po_reject[$i]['REJECT'])->getStyle('M'.$no.':R'.$no.'')->applyFromArray($kontentotal);   
                
            
            
        }
       
      
        $spreadsheet->getSheetByName('Worksheet 1');
		
		$filename = 'Summary_PO_Reject_'.$tanggal;
		
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

