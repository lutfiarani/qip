<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Aql extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct(){
        parent:: __construct(); 
        date_default_timezone_set('Asia/Jakarta');
       
		$this->load->model('M_Aql');
		$this->load->library('Excel');
        sesscheck();
    }

	public function index()
	{
		$level = $this->session->userdata('LEVEL');
		if($level){
			$data['pagetitle']="DAILY AQL INSPECTION";
			$subdata['sub']= 1;
			//$subdata['container'] = count($ana);
			if ( $this->input->post('INSPECT_DATE', true) === NULL){
				$tgl = date('Ymd');
			} else{
				$tgl = $this->input->post('INSPECT_DATE', true);
			}
			if ( $this->input->post('INSPECT_MONTH', true) === NULL){
				$month = date('Ym');
			} else{
				$month = $this->input->post('INSPECT_MONTH', true);
			}
			//$subdata['ana']= $this->M_Aql->total_container($tgl);
			$subdata['formtitle'] = "DAILY AQL INSPECTION ".$tgl;
			$subdata['formtitle_monthly'] = "MONTHLY AQL INSPECTION ".$month;
			$subdata['query'] = $this->M_Aql->daily_summary($tgl);
			$subdata['query_monthly'] = $this->M_Aql->monthly_summary($month);
			$subdata['action']= site_url('C_Aql/index');
			$subdata['export']= site_url('C_Aql/export_excel/'.$tgl);
			$subdata['action_monthly']= site_url('C_Aql/monthly_report/'.$month);
			// $data['content'] = $this->load->view('QIP/Aql_Report/Daily_report',$subdata,true);
			// $this->load->view('template_admin',$data);
			
			$datasub['username'] = $this->session->userdata('USERNAME');
			$datasub['tingkat'] = $this->session->userdata('LEVEL');
			$datasub['formtitle'] = "DAILY AQL INSPECTION";
			$this->load->view('template/header', $datasub);
			$this->load->view('QIP/Aql_Report/Daily_report', $subdata);
			$this->load->view('template/footer');

		}else{
			redirect('C_Login'); 
		}

		
	}

	public function monthly_report(){
		$level = $this->session->userdata('LEVEL');
		if($level){
			$subdata['sub']=2;
			if ( $this->input->post('INSPECT_MONTH', true) === NULL){
				$month = date('Ym');
			} else{
				$month = $this->input->post('INSPECT_MONTH', true);
			}
			$subdata['export']= site_url('C_Aql/export_excel/'.$month);
			$subdata['formtitle'] = "MONTHLY AQL INSPECTION ".$month;
			$this->M_Aql->monthly_summary($month);
			$subdata['query'] = $this->M_Aql->tampil_monthly_summary();
			$subdata['summary'] = $this->M_Aql->summary_inspection();
			$subdata['defect'] = $this->M_Aql->summary_defect($month);
			$subdata['action']= site_url('C_Aql/monthly_report/'.$month);
			// $data['content'] = $this->load->view('QIP/Aql_Report/Monthly_report',$subdata,true);
			// $this->load->view('template_admin',$data);
			$datasub['username'] = $this->session->userdata('USERNAME');
			$datasub['tingkat'] = $this->session->userdata('LEVEL');
			$datasub['formtitle'] = "MONTHLY AQL INSPECTION";
			$this->load->view('template/header', $datasub);
			$this->load->view('QIP/Aql_Report/Monthly_report', $subdata);
			$this->load->view('template/footer');
			$this->M_Aql->drop_monthly_summary();
		}else{
			redirect('C_Login');
		}	
	}

	// public function monthly_defect()
	// {
	// 	$data['pagetitle'] = "MONTHLY DEFECT QTY";
	// 	if ($this->input->post('INSPECT_DATE', true) === NULL){
	// 		$month = date('Y-m');
	// 	}else{
	// 		$month = $this->input->post('INSPECT_DATE', true);
	// 	}
	// 	$subdata['formtitle'] = "DEFECT QTY REPORT MONTHLY ".$month;
	// 	$this->M_Aql->monthly_defect($month);
	// 	$subdata['query'] = $this->M_Aql->tampil_monthly_defect($month);
	// 	$subdata['action'] = site_url('C_Aql/monthly_defect');
	// 	$data['content'] = $this->load->view('QIP/Aql_Report/Monthly_defect', $subdata, true);
	// 	$this->load->view('template_admin', $data);
	// 	$this->M_Aql->hapus_monthly_defect();
	// }	


	public function date_range_defect()
	{ 
		$level = $this->session->userdata('LEVEL');
		if($level == 1){
			$data['pagetitle'] = "DEFECT QTY";
			if ($this->input->post('START_DATE', true) === NULL){
				$start_date = date('Y-m-d');
			}else{
				$start_date = $this->input->post('START_DATE', true);
			}

			if ($this->input->post('END_DATE', true) === NULL){
				$end_date = date('Y-m-d');
			}else{
				$end_date = $this->input->post('END_DATE', true);
			}

			$subdata['formtitle'] = "DEFECT QTY REPORT FROM  ".$start_date." TO ".$end_date;
			$this->M_Aql->defect_by_date($start_date, $end_date);
			$subdata['query'] = $this->M_Aql->tampil_defect_by_date();
			
			$subdata['action'] = site_url('C_Aql/date_range_defect');
			// $data['content'] = $this->load->view('QIP/Aql_Report/Monthly_defect', $subdata, true);
			// $this->load->view('template_admin', $data);

			$datasub['username'] = $this->session->userdata('USERNAME');
			$datasub['tingkat'] = $this->session->userdata('LEVEL');
			$datasub['formtitle'] = "DEFECT QTY REPORT";
			
			$this->load->view('template/header', $datasub);
			$this->load->view('QIP/Aql_Report/Monthly_defect', $subdata);
			$this->load->view('template/footer');
		
			
			$this->M_Aql->hapus_defect_by_date();
		}else{
			redirect('C_Login');
		}
	}



	public function monthly_inspector(){
		$level = $this->session->userdata('LEVEL');
		if($level == 1){
			$data['pagetitle'] = "MONTHLY AQL INSPECTOR CAPACITY";
			if ( $this->input->post('INSPECT_MONTH', true) === NULL){
				$month = date('Ym');
			} else{
				$month = $this->input->post('INSPECT_MONTH', true);
			}
			$subdata['formtitle'] = "MONTHLY AQL INSPECTOR CAPACITY ".$month;
			$subdata['query'] = $this->M_Aql->monthly_inspector($month);
			$subdata['action'] = site_url('C_Aql/monthly_inspector');
			// $data['content'] = $this->load->view('QIP/Aql_Report/Monthly_inspector', $subdata, true);

			$datasub['username'] = $this->session->userdata('USERNAME');
			$datasub['tingkat'] = $this->session->userdata('LEVEL');
			$datasub['formtitle'] = "MONTHLY AQL INSPECTOR";
			
			$this->load->view('template/header', $datasub);
			$this->load->view('QIP/Aql_Report/Monthly_inspector', $subdata);
			$this->load->view('template/footer');

			// $this->load->view('template_admin', $data);
		}else{
			redirect('C_Login');
		}
	}


	public function export_excel($tgl){
		
		if (strlen($tgl) == 7){ //monthly
			$this->M_Aql->monthly_summary($tgl);
			$data = array( 'title' => 'Monthly_AQL_Report_'.$tgl,
				'query' => $this->M_Aql->tampil_monthly_summary(),
				'tgl' => $tgl,
				'formtitle' => 'MONTHLY AQL REPORT '.$tgl);
		} else if (strlen($tgl) == 10){ //daily
			$data = array( 'title' => "Daily_AQL_Report_".$tgl,
					'query' => $this->M_Aql->daily_summary($tgl),
					'tgl' => $tgl,
					'formtitle' => 'DAILY AQL REPORT '.$tgl);
			
		}
		$this->load->view('QIP/Aql_Report/export_excel',$data);
	}


	public function generateXls($tgl) {
        // create file name
		$fileName = 'data-'.time().'.xlsx';  
		$this->M_Aql->monthly_summary($tgl);
        // load excel library
	   // $this->load->library('excel');
	  	if (strlen($tgl) == 7){ //monthly
			$listInfo= $this->M_Aql->tampil_monthly_summary($tgl);
			
		} else if (strlen($tgl) == 10){ //daily
			$listInfo= $this->M_Aql->daily_summary($tgl);
					
			
		}
     //  $listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'First Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Last Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'DOB');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contact_No');       
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
			$range = 'A'.$rowCount.':'.'H'.$rowCount;
			$objPHPExcel->getActiveSheet()
				->getStyle($range)
				->getNumberFormat()
				->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT );
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list['IC_NUMBER']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list['CustomerOrderNumber']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list['FACTORY']);
			$objPHPExcel->getActiveSheet()
						
						->SetCellValue('D' . $rowCount, $list['PO_NO']);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('E' . $rowCount, $list['PO_NO'],PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$rowCount, $list['PO_NO'])
			->getNumberFormat()
			->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
			
			$objPHPExcel->getActiveSheet()
						->getStyle('G' . $rowCount, $list['PO_NO'])
						->getNumberFormat()
						->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT );
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount,"'". $list['PO_NO']);					
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount,"&#39;". $list['PO_NO']);					

			$rowCount++;
			//$objPHPExcel->getActiveSheet()->setCellValueExplicit('A1', '1234', PHPExcel_Cell_DataType::TYPE_STRING);
			/*<td style ='word-break:break-word; font-size: 90%;'>".($i+1)."</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[IC_NUMBER]</td>
            <td style ='word-break:break-word; font-size: 90%;'>#39;$data[CustomerOrderNumber]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[FACTORY]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[CELL]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[MODEL_NAME]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[ARTICLE]</a> </td>
            <td style ='word-break:break-word; font-size: 90%;'>&#8217;$data[PO_NO]</a> </td>
            <td style ='word-break:break-word; font-size: 90%;'>&#8216;$data[PO_NO]</a> </td>
            <td style ='word-break:break-word; font-size: 90%;'>'$data[PO_NO]</a> </td>
            <td style ='word-break:break-word; font-size: 90%;'>&#39;$data[PO_NO]</a> </td>
            <td style ='word-break:break-word; font-size: 90%;'>&apos;$data[PO_NO]</a> </td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[PARTIAL]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[COUNTRY]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[PARTIAL_QTY]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[LEVEL]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[QTY_INSPECT1]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[QIP_LEVEL_ACC]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[QIP_LEVEL_REJECT]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[INSPECT_DATE]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[INSPECTOR_NAMA]</td>     
            <td style ='word-break:break-word; font-size: 90%;'>$data[REJECT_QTY]</td>     
            <td style ='word-break:break-word; font-size: 90%;'>$data[STATUS_REPORT]</td>   */
        }
        $filename = "tutsmake". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
		$objWriter->save('php://output'); 
		
		$objPHPExcel = new PHPExcel();
 
		// Set active sheet index to the first sheet, so <a class="zem_slink" title="Microsoft Excel" href="http://office.microsoft.com/en-us/excel" target="_blank" rel="homepage">Excel</a> opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
	
 
    }
}
