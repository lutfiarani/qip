<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_report_ic_excel extends CI_Controller{
    public function __construct(){
        parent:: __construct(); 
        date_default_timezone_set('Asia/Jakarta');
       
		$this->load->model('M_aql_inspect');
		// $this->load->library('Excel');
        sesscheck();
    }

    public function get_report($po, $partial, $remark, $level, $level_user)
	{
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        //style
        $judul_1 = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 16,
                'name'  => 'Arial'
            ], 
            
        );

        $judul_2 = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 24,
                'name'  => 'Arial'
            ], 
            
        );

        $center = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 24,
                'name'  => 'Arial'
            ], 
            
        );

        $judulcenter = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 48,
                'name'  => 'Arial',
                'bold' => true
            ], 
            'borders' => array(
                'top' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => array('argb' => '000000'),
                ),
            ),
            
        );

        $kontentboldleft = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 24,
                'name'  => 'Arial',
                'bold' => true
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

        $kontentboldboderkanan= array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 24,
                'name'  => 'Arial',
                'bold' => true
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
                'right' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            
            
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

        $outline = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 24
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            )
        );

        $top = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 24
            ], 
            'borders' => array(
                'top' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            )
        );

        $writer = new Xlsx($spreadsheet);

        $report = $this->M_aql_inspect->ic_view($po, $partial, $remark, $level, $level_user);

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Paid');
        $drawing->setDescription('Paid');
        $drawing->setPath($report['SIGN_PRODUCTION']); // put your path and image here
        $drawing->setCoordinates('M30');
        $drawing->setHeight(150);
        $drawing->setOffsetX(0);
        $drawing->setRotation(0);
        $drawing->getShadow()->setVisible(true);
        $drawing->getShadow()->setDirection(0);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
        
        $writer = new Xlsx($spreadsheet);

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Paid');
        $drawing->setDescription('Paid');
        $drawing->setPath($report['SIGN_REPRESENTATIVE']); // put your path and image here
        $drawing->setCoordinates('M38');
        $drawing->setHeight(150);
        $drawing->setOffsetX(0);
        $drawing->setRotation(0);
        $drawing->getShadow()->setVisible(true);
        $drawing->getShadow()->setDirection(0);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
        
        $writer = new Xlsx($spreadsheet);
        
        
        $sheet->getColumnDimension('A')->setWidth(21.29);
        $sheet->getColumnDimension('B')->setWidth(17.00);
        $sheet->getColumnDimension('C')->setWidth(17.00);
        $sheet->getColumnDimension('D')->setWidth(13.22);
        $sheet->getColumnDimension('E')->setWidth(17.22);
        $sheet->getColumnDimension('F')->setWidth(14.89);
        $sheet->getColumnDimension('G')->setWidth(14.89);
        $sheet->getColumnDimension('H')->setWidth(12.56);
        $sheet->getColumnDimension('I')->setWidth(9.44);
        $sheet->getColumnDimension('J')->setWidth(10.44);
        $sheet->getColumnDimension('K')->setWidth(21.33);
        $sheet->getColumnDimension('L')->setWidth(15.22);
        $sheet->getColumnDimension('M')->setWidth(10.33);
        $sheet->getColumnDimension('N')->setWidth(12.67);
        $sheet->getColumnDimension('O')->setWidth(20.11);
        $sheet->getColumnDimension('P')->setWidth(17.33);
        $sheet->getColumnDimension('Q')->setWidth(12.89);
        $sheet->getColumnDimension('R')->setWidth(10.00);
        $sheet->getColumnDimension('S')->setWidth(10.89);

//row
        $sheet->getRowDimension('1')->setRowHeight(115.50);
        $sheet->getRowDimension('2')->setRowHeight(30.00);
        $sheet->getRowDimension('3')->setRowHeight(30.00);
        $sheet->getRowDimension('4')->setRowHeight(30.00);
        $sheet->getRowDimension('5')->setRowHeight(30.00);
        $sheet->getRowDimension('6')->setRowHeight(30.00);
        $sheet->getRowDimension('7')->setRowHeight(58.50);
        $sheet->getRowDimension('8')->setRowHeight(78.75);
        $sheet->getRowDimension('9')->setRowHeight(52.50);
        $sheet->getRowDimension('10')->setRowHeight(30.00);
        $sheet->getRowDimension('11')->setRowHeight(30.00);
        $sheet->getRowDimension('12')->setRowHeight(30.00);
        $sheet->getRowDimension('13')->setRowHeight(30.00);
        $sheet->getRowDimension('14')->setRowHeight(30.00);
        $sheet->getRowDimension('15')->setRowHeight(30.00);
        $sheet->getRowDimension('16')->setRowHeight(30.00);
        $sheet->getRowDimension('17')->setRowHeight(30.00);
        $sheet->getRowDimension('18')->setRowHeight(30.00);
        $sheet->getRowDimension('19')->setRowHeight(30.75);
        $sheet->getRowDimension('20')->setRowHeight(30.00);
        $sheet->getRowDimension('21')->setRowHeight(30.00);
        $sheet->getRowDimension('22')->setRowHeight(30.00);
        $sheet->getRowDimension('23')->setRowHeight(30.00);
        $sheet->getRowDimension('24')->setRowHeight(30.00);
        $sheet->getRowDimension('25')->setRowHeight(30.00);      
        $sheet->getRowDimension('26')->setRowHeight(30.00);
        $sheet->getRowDimension('27')->setRowHeight(30.00);
        $sheet->getRowDimension('28')->setRowHeight(30.00);
        $sheet->getRowDimension('29')->setRowHeight(30.75);
        $sheet->getRowDimension('30')->setRowHeight(30.75);
        $sheet->getRowDimension('31')->setRowHeight(30.75);
        $sheet->getRowDimension('32')->setRowHeight(30.75);
        $sheet->getRowDimension('33')->setRowHeight(30.00);
        $sheet->getRowDimension('34')->setRowHeight(30.00);
        $sheet->getRowDimension('35')->setRowHeight(30.00);
        $sheet->getRowDimension('36')->setRowHeight(30.00);
        $sheet->getRowDimension('37')->setRowHeight(30.00);
        $sheet->getRowDimension('38')->setRowHeight(30.00);
        $sheet->getRowDimension('39')->setRowHeight(30.00);
        $sheet->getRowDimension('40')->setRowHeight(30.00);
        $sheet->getRowDimension('41')->setRowHeight(30.75);
        $sheet->getRowDimension('42')->setRowHeight(30.00);
        $sheet->getRowDimension('43')->setRowHeight(30.00);
        $sheet->getRowDimension('44')->setRowHeight(30.00);
        $sheet->getRowDimension('45')->setRowHeight(30.00);
        $sheet->getRowDimension('46')->setRowHeight(30.00);
        $sheet->getRowDimension('47')->setRowHeight(30.00);
        $sheet->getRowDimension('48')->setRowHeight(30.00);
        $sheet->getRowDimension('49')->setRowHeight(30.00);
        $sheet->getRowDimension('50')->setRowHeight(30.00);
        $sheet->getRowDimension('51')->setRowHeight(30.00);
        $sheet->getRowDimension('52')->setRowHeight(30.00);
        $sheet->getRowDimension('53')->setRowHeight(30.00);
        $sheet->getRowDimension('54')->setRowHeight(30.00);

        

        $sheet->setCellValue('A1', 'IC NUMBER : ')->getStyle('A1')->applyFromArray($judul_1);
        $sheet->mergeCells('B1:C1');
        $sheet->setCellValue('B1', $report['IC_NUMBER'])->getStyle('B1:C1')->applyFromArray($judul_1);

        $sheet->setCellValue('A2', 'adidas  Sourcing Limited')->getStyle('A2')->applyFromArray($judul_2);
        $sheet->setCellValue('A3', 'Indonesia Representative Office, ')->getStyle('A3')->applyFromArray($judul_2);
        $sheet->setCellValue('A4', 'Artha Graha building 10th Floor 5C5D lot.25')->getStyle('A4')->applyFromArray($judul_2);
        $sheet->setCellValue('A5', 'Jl. Jendral Sudirman Kav.52-53')->getStyle('A5')->applyFromArray($judul_2);
        $sheet->setCellValue('A6', 'Jakarta | Indonesia')->getStyle('A6')->applyFromArray($judul_2);

        $sheet->mergeCells('A8:R8');
        $sheet->setCellValue('A8', 'INSPECTION CERTIFICATE')->getStyle('A8:R8')->applyFromArray($judulcenter);

        $sheet->mergeCells('A10:C10');
        $sheet->setCellValue('A10', 'Customer Number')->getStyle('A10:C10')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('D10', ':')->getStyle('D10')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('E10:I10');
        $sheet->setCellValue('E10', $report['CUSTOMER'])->getStyle('E10:I10')->applyFromArray($kontentboldboderkanan);
        $sheet->mergeCells('J10:M10');
        $sheet->setCellValue('J10', 'T1 Supplier')->getStyle('J10:M10')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('N10', ':')->getStyle('N10')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('O10:R10');
        $sheet->setCellValue('O10', 'HWI')->getStyle('O10:R10')->applyFromArray($kontentboldboderkanan);

        $sheet->mergeCells('A11:C11');
        $sheet->setCellValue('A11', 'PO Number')->getStyle('A11:C11')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('D11', ':')->getStyle('D11')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('E11:I11');
        $sheet->setCellValue('E11', $report['PO_NO'])->getStyle('E11:I11')->applyFromArray($kontentboldboderkanan);
        $sheet->mergeCells('J11:M11');
        $sheet->setCellValue('J11', 'Model Name')->getStyle('J11:M11')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('N11', ':')->getStyle('N11')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('O11:R11');
        $sheet->setCellValue('O11', $report['MODEL_NAME'])->getStyle('O11:R11')->applyFromArray($kontentboldboderkanan);

        $sheet->mergeCells('A12:C12');
        $sheet->setCellValue('A12', 'Quantity')->getStyle('A12:C12')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('D12', ':')->getStyle('D12')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('E12:G12');
        $sheet->setCellValue('E12', $report['KWMENG'])->getStyle('E12:G12')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('H12:I12');
        $sheet->setCellValue('H12', 'PRS')->getStyle('H12:I12')->applyFromArray($kontentboldboderkanan);
        $sheet->mergeCells('J12:M12');
        $sheet->setCellValue('J12', 'Article Number')->getStyle('J12:M12')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('N12', ':')->getStyle('N12')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('O12:R12');
        $sheet->setCellValue('O12', $report['ARTICLE'])->getStyle('O12:R12')->applyFromArray($kontentboldboderkanan);

        $sheet->mergeCells('A14:C14');
        $sheet->setCellValue('A14', 'Destination')->getStyle('A14:C14')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('D14', ':')->getStyle('D14')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('E14:I14');
        $sheet->setCellValue('E14', $report['LANDT'])->getStyle('E14:I14')->applyFromArray($kontentboldboderkanan);

        $sheet->mergeCells('A15:C15');
        $sheet->setCellValue('A15', 'Part of Full Shipment')->getStyle('A15:C15')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('D15', ':')->getStyle('D15')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('E15:I15');
        $sheet->setCellValue('E15', '')->getStyle('E15:I15')->applyFromArray($kontentboldboderkanan)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffb239');;

        $sheet->setCellValue('A18', 'This merchandise has been checked by us and appears on this right Inspection to be in accordance with')->getStyle('A18')->applyFromArray($judul_2);
        $sheet->setCellValue('A19', 'adidas-Group standards.')->getStyle('A19')->applyFromArray($judul_2);
        $sheet->setCellValue('A21', 'Inspection has been done')->getStyle('A21')->applyFromArray($judul_2);

        $sheet->mergeCells('A23:L23');
        $sheet->setCellValue('A23', 'According to adidas-Group FINAL Line concept (100% inspection)')->getStyle('A23:L23')->applyFromArray($judul_2);

        $sheet->mergeCells('A25:I25');
        $sheet->setCellValue('A25', 'According to adidas-Group AQL Inspection Policy')->getStyle('A25:I25')->applyFromArray($judul_2);

        $sheet->setCellValue('N23', '')->getStyle('N23')->applyFromArray($outline);

        $sheet->setCellValue('N25', 'V')->getStyle('N25')->applyFromArray($outline);
        $sheet->setCellValue('O25', '( see page 2)')->getStyle('O25')->applyFromArray($judul_2);

        $sheet->setCellValue('A27', 'Note : In case that both FINAL 100% Inspection and AQL Inspection are performed e.g. during the transition periode to FINAL')->getStyle('A27')->applyFromArray($judul_2);

        $sheet->setCellValue('A28', 'line concept, both boxes will be ticked.')->getStyle('A28')->applyFromArray($judul_2);

        $sheet->mergeCells('P32:R32');
        $sheet->setCellValue('P32', $report['DATE_REPRESENTATIVE'])->getStyle('P32:R32')->applyFromArray($judul_2);

        $sheet->mergeCells('B34:E34');
        $sheet->setCellValue('B34', $report['ID_REPRESENTATIVE'])->getStyle('B34:E34')->applyFromArray($center);

        $sheet->mergeCells('A35:H35');
        $sheet->setCellValue('A35', 'Name Factory Representative')->getStyle('A35:H35')->applyFromArray($top);

        $sheet->mergeCells('K35:Q35');
        $sheet->setCellValue('K35', 'Signature / Date')->getStyle('K35:Q35')->applyFromArray($top);

        $sheet->mergeCells('P41:R41');
        $sheet->setCellValue('P41', $report['DATE_PRODUCTION_MANAGER'])->getStyle('P41:R41')->applyFromArray($judul_2);

        $sheet->mergeCells('B42:E42');
        $sheet->setCellValue('B42', $report['ID_PRODUCTION_MANAGER'])->getStyle('B42:E42')->applyFromArray($center);

        $sheet->mergeCells('A43:H43');
        $sheet->setCellValue('A43', 'Name adidas-group Production Manager')->getStyle('A43:H43')->applyFromArray($top);

        $sheet->mergeCells('K43:Q43');
        $sheet->setCellValue('K43', 'Signature / Date')->getStyle('K43:Q43')->applyFromArray($top);

        $sheet->setCellValue('A46', 'Factory Representative and adidas-group Production Manager confirm with their signature that this PO meets adidas-Group')->getStyle('A46')->applyFromArray($judul_2);
        $sheet->setCellValue('A47', 'bonding and FGT standards and that valid A-01 and CPSIA certificate area available.')->getStyle('A47')->applyFromArray($judul_2);
        
        $sheet->setCellValue('A51', 'Date issued : 19-09-2016')->getStyle('A51')->applyFromArray($judul_2);
        $sheet->setCellValue('A52', 'Revision# : 0')->getStyle('A52')->applyFromArray($judul_2);
        $sheet->setCellValue('A53', 'Control # : QIP/APP/8-3')->getStyle('A53')->applyFromArray($judul_2);

        $spreadsheet->getActiveSheet()->getPageSetup()->setScale(100);
        $spreadsheet->getSheetByName('Worksheet 1');
		
		$filename = 'IC_Report_'. $po.'_'.$partial;
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

        $writer->save('php://output');
        
        // print("<pre>".print_r($data,true)."</pre>");
        // print("<pre>".print_r($report3,true)."</pre>");
        // PRINT_R($report3[0]->CODE_NAME);
        // print("<pre>".print_r($report,true)."</pre>");


	}
}