<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_AqlReport extends CI_Model {

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
   public function SummaryReport($from, $to){
        // $from 	= $this->input->post('from');
        // $to 	= $this->input->post('to');

        $query   = ("EXEC [QIP].DBO.AQL_SUMMARY_REPORT_v1 @FROM='$from', @TO='$to'");

        return $this->db->query($query)->result();
		// print_r($query);
		// echo $query;
   }

   public function list_defect(){
		$query = ("SELECT 'FTW'+CAST(CODE AS VARCHAR)+'.'+CAST(REJECT_CODE AS VARCHAR)+' '+REJECT_CODE_NAME AS DEFECT FROM QIP.DBO.QIP_AQL_REJECT_CODE");
		// $query = ("SELECT 'FTW'+CAST(CODE AS VARCHAR)+'.'+CAST(REJECT_CODE AS VARCHAR) AS DEFECT FROM QIP.DBO.QIP_AQL_REJECT_CODE");
		return $this->db->query($query)->result();
   }

   public function InspectionSummary($from, $to){
		$query = ("EXEC [QIP].DBO.AQL_INSPECTION_SUMMARY_BY_FACTORY @FROM='$from', @TO='$to'");

        return $this->db->query($query)->result();
   }

   public function DefectTracking($from, $to){
		$query = ("EXEC [QIP].DBO.[AQL_DEFECT_TRACKING_V01] @FROM='$from', @TO = '$to'");

		return $this->db->query($query)->result();
   }

	public function InspectorPerformance($from, $to){
		$query = ("EXEC [QIP].DBO.AQL_INSPECTOR_PERFORMANCE @FROM='$from', @TO='$to'");

        return $this->db->query($query)->result();
	}
}
