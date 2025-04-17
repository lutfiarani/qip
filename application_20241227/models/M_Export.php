<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Export extends CI_Model {

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
	
	
	public function tampil_export()
	{
		$db2 = $this->load->database('qip_', TRUE);
		$query_qip = $db2->query("SELECT * FROM `export` WHERE DATE='2019-12-31'");
		$qip_export = $query_qip->result();
		
		foreach ($qip_export as $a) {
			$c[] =  $a->po;
		}
		
		$export = "SELECT *, CASE WHEN QTY_CRTN > WHIN THEN 'PRODUCT'
				WHEN QTY_CRTN = WHIN AND WHIN>WHOUT THEN 'WAITING'
				WHEN WHIN=WHOUT THEN 'RELEASE'
				END AS STATUS_CRTN FROM (
				SELECT FACTOR_CODE,PO_NO, MODEL_NAME, DESTINATION, TOTAL_QTY,SUM(CARTON_QTY) AS QTY_CRTN, SUM(WH_IN_QTY) AS WHIN, SUM(WH_OUT_QTY) AS WHOUT ,SDD
				FROM THWHHIS WITH (NOLOCK)
				GROUP BY FACTOR_CODE,PO_NO, MODEL_NAME, DESTINATION, TOTAL_QTY,SDD) AS A 
				WHERE PO_NO IN (
				  ";
				  for($i = 0; $i<count($c); $i++){
					  if ($i < count($c) - 1 ){
						$export .= "'".$c[$i]."',";
					  }
					  else{
						$export .= "'".$c[$i]."'";
					  }
				}
		$export .= ")ORDER BY PO_NO";
		//echo $export;
		$query=$this->db->query($export);
		return $query->result_array();
	}



	public function tampil_exportsssssssss()
	{
		$coba = $this->db->query("SELECT top 10*
		FROM [QIP].[DBO].[T_EXPORT_TODAY] as A WITH (NOLOCK)
		JOIN [MEShs].[dbo].[THPRODHIS] as B WITH (NOLOCK)
		ON A.PO_NO=B.PO_NO");
		$cobacoba = $coba->result_array();
		print_r($cobacoba);

	}

	public function export_schedule($tgl, $factory, $country){
		if (($factory === NULL) && ($country === NULL)){
			$query = ("exec [QIP].[dbo].[EXPORT_SCHEDULE_UPLOAD_NEW] @TANGGAL='$tgl', @FACTORY=NULL, @COUNTRY=NULL");	
		}else if (($factory === NULL) && ($country)){
			$query = ("exec [QIP].[dbo].[EXPORT_SCHEDULE_UPLOAD_NEW] @TANGGAL='$tgl', @FACTORY=NULL, @COUNTRY='$country'");	
		}elseif (($factory) && ($country === NULL)){
			$query = ("exec [QIP].[dbo].[EXPORT_SCHEDULE_UPLOAD_NEW] @TANGGAL='$tgl', @FACTORY='$factory', @COUNTRY=NULL");	
		}else{ //(($factory) && ($country)){
			$query = ("exec [QIP].[dbo].[EXPORT_SCHEDULE_UPLOAD_NEW] @TANGGAL='$tgl', @FACTORY='$factory', @COUNTRY='$country'");	
		}
 
		return $this->db->query($query)->result();
		// echo $query;
		
	}



	public function export_schedule_lama($tgl){
	
		$factory =  $this->input->post('factory');
		$country = $this->input->post('country');
		if (($factory === NULL) && ($country === NULL)){
			$query = $this->db->query("exec [QIP].[dbo].[EXPORT_SCHEDULE_2] @TANGGAL='$tgl', @FACTORY='', @COUNTRY=''");	
	
		}else if (($factory === NULL) && ($country)){
			$query = $this->db->query("exec [QIP].[dbo].[EXPORT_SCHEDULE_2] @TANGGAL='$tgl', @FACTORY='', @COUNTRY='$country'");	
	
		}elseif (($factory) && ($country === NULL)){
			$query = $this->db->query("exec [QIP].[dbo].[EXPORT_SCHEDULE_2] @TANGGAL='$tgl', @FACTORY='$factory', @COUNTRY=''");	
	
		}else{ //(($factory) && ($country)){
			$query = $this->db->query("exec [QIP].[dbo].[EXPORT_SCHEDULE_2] @TANGGAL='$tgl', @FACTORY='$factory', @COUNTRY='$country'");	
	
		}

		return $query->result_array();
		// echo $query;
	}

	public function tampil_exportss($factory, $country){
		if (($factory === NULL) && ($country === NULL)){
			$query = ("exec [QIP].[dbo].[DAILY_EXPORT_SCHEDULE_UPLOAD] @FACTORY='', @COUNTRY=''");	
		}else if (($factory === NULL) && ($country)){
			$query = ("exec [QIP].[dbo].[DAILY_EXPORT_SCHEDULE_UPLOAD] @FACTORY='', @COUNTRY='$country'");	
		}elseif (($factory) && ($country === NULL)){
			$query =("exec [QIP].[dbo].[DAILY_EXPORT_SCHEDULE_UPLOAD] @FACTORY='$factory', @COUNTRY=''");	
		}else{ //(($factory) && ($country)){
			$query = ("exec [QIP].[dbo].[DAILY_EXPORT_SCHEDULE_UPLOAD] @FACTORY='$factory', @COUNTRY='$country'");	
		}
		
		return $this->db->query($query)->result();
		// echo $query;
		// print_r($query->result_array());
	}

	public function today_export(){
		$factory =  $this->input->post('factory');
		$country = $this->input->post('country');
		
		if (($factory === NULL) && ($country === NULL)){
			$query = $this->db->query("exec [QIP].[dbo].[DAILY_EXPORT_SCHEDULE_UPLOAD] @FACTORY='', @COUNTRY=''");	
		
		}else if (($factory === NULL) && ($country)){
			$query = $this->db->query("exec [QIP].[dbo].[DAILY_EXPORT_SCHEDULE_UPLOAD] @FACTORY='', @COUNTRY='$country'");	
		
		}elseif (($factory) && ($country === NULL)){
			$query =$this->db->query("exec [QIP].[dbo].[DAILY_EXPORT_SCHEDULE_UPLOAD] @FACTORY='$factory', @COUNTRY=''");	
		
		}else{ //(($factory) && ($country)){
			$query = $this->db->query("exec [QIP].[dbo].[DAILY_EXPORT_SCHEDULE_UPLOAD] @FACTORY='$factory', @COUNTRY='$country'");	
		}
		return $query;
		
	}



	public function tampil_export_admin($tgl){
		$query = $this->db->query(" 
		SELECT *, CASE WHEN STATUS_PO IS NULL THEN STATUS_PO_AQL
			WHEN STATUS_PO ='REJECT' AND STATUS_PO_AQL='RELEASE' THEN 'RELEASE'
			WHEN STATUS_PO ='REPACKING' AND STATUS_PO_AQL='RELEASE' THEN 'RELEASE'
			WHEN STATUS_PO ='REPACKING' AND STATUS_PO_AQL='PRODUCTION' THEN 'REPACKING'
			WHEN STATUS_PO IS NOT NULL THEN STATUS_PO
			
			END AS STATUS_PO2 FROM (
			SELECT FACTORY , CELL,  C.PO_NO, MODEL_NAME, ART_NO, TOTAL_QTY, SDD, COUNTRY, TOTAL_CARTON,TYPE, CONTAINER, REMARK, STATUS_PO,
			CASE WHEN E.PO_NO IS NULL AND BALANCE_CRTON='0' THEN 'WAITING'
						WHEN E.PO_NO IS NULL AND BALANCE_CRTON>'0' THEN 'PRODUCTION'
						WHEN E.PO_NO IS NOT NULL AND STATUS_PO IS NULL THEN 'RELEASE'
						WHEN E.PO_NO IS NOT NULL AND BALANCE_CRTON='0' THEN 'RELEASE'
						ELSE STATUS_PO 
					END AS STATUS_PO_AQL
					FROM 
					(SELECT * FROM [QIP].[DBO].[T_EXPORT_TODAY] WITH (NOLOCK) WHERE EXPORT_DATE='$tgl') AS C 
						LEFT JOIN
					(
						SELECT a.ZCELLNO AS CELL, a.VBELN AS PO_NO,b.MaxList
							FROM (
								SELECT vbeln AS PO_NO,  MAX(ZNSEQ_C) as MaxList
								FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN] WITH (NOLOCK)
								WHERE ZLPVER IN (SELECT MAX(ZLPVER) FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN])
								GROUP BY vbeln
								
							) b
							LEFT JOIN   [MEShs].[dbo].[ZPP_IF_LOADPLAN] a WITH (NOLOCK)
							ON a.VBELN = b.PO_NO AND a.ZNSEQ_C = b.MaxList
							WHERE a.ZLPVER IN (SELECT MAX(ZLPVER) FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN] WITH (NOLOCK))
					) AS A 
					ON C.PO_NO=A.PO_NO
					LEFT JOIN 
					(
						
						SELECT O.FACTORY, N.PO_NO, N.COUNTRY, N.MODEL_NAME, N.DESTINATION, N.SDD, N.ART_NO, N.CUST_NO, N.TOTAL_QTY, N.TOTAL_CARTON, N.BALANCE_CRTON FROM
							(SELECT PO_NO, COUNTRY, MODEL_NAME, DESTINATION, SDD, ART_NO,CUST_NO,TOTAL_QTY,TOTAL_CARTON, SUM(CASE WHEN STATUS='WR' THEN 1 ELSE 0 END) AS BALANCE_CRTON 
								FROM THWHHIS WITH (NOLOCK)
								WHERE LEFT(SDD,6) >= CONVERT(CHAR(6),GETDATE(),112)
								GROUP BY PO_NO, COUNTRY, MODEL_NAME, DESTINATION, SDD, ART_NO,CUST_NO,TOTAL_QTY,TOTAL_CARTON) AS N
								JOIN
								(SELECT  DISTINCT LEFT(FACTOR_CODE,1) AS FACTORY, PO_NO FROM THWHHIS WITH (NOLOCK)
								WHERE LEFT(SDD,6) >= CONVERT(CHAR(6),GETDATE(),112)
								AND FACTOR_CODE IS NOT NULL) AS O
								ON N.PO_NO=O.PO_NO
								
					) AS B ON C.PO_NO=B.PO_NO
					LEFT JOIN
					(SELECT PO_NO  FROM QIP_AQL_DATA_FIRST WITH (NOLOCK)
							GROUP BY PO_NO) AS E
							ON C.PO_NO=E.PO_NO
							LEFT JOIN
					(
						SELECT t.PO_NO, t.STATUS_PO, r.MaxTime
						FROM (
							SELECT PO_NO, MAX(STATUS_DATE) as MaxTime
							FROM [QIP].[dbo].[T_EXPORT_IC] WITH (NOLOCK)
							GROUP BY PO_NO
						) r
						INNER JOIN [QIP].[dbo].[T_EXPORT_IC] t WITH (NOLOCK)
						ON t.PO_NO = r.PO_NO AND t.STATUS_DATE = r.MaxTime
					) AS D
					ON C.PO_NO=D.PO_NO
					WHERE EXPORT_DATE = '$tgl'
				) AS Z
				ORDER BY CONTAINER, PO_NO
				");
		return $query->result_array();
	}


	public function container($con)	{
		$query = $this->db->query(" SELECT * FROM #QIP_TEMP1 WHERE CONTAINER = '$con' ");
		return $query->result_array();
	}

	public function list_export()	{
		$query = $this->db->query(" SELECT * FROM [QIP].[DBO].[T_EXPORT_TODAY] WITH (NOLOCK) ORDER BY LMNT_DTTM DESC");
		return $query->result_array();
	}

	public function total_container_today($date){
		$query = $this->db->query("SELECT DISTINCT(CONTAINER) AS JUMLAH FROM [QIP].[DBO].[T_EXPORT_UPLOAD] WITH (NOLOCK) WHERE EXPORT_DATE='$date' ");
		
		//return $query->row();
		return $query->result_array();
		//print_r($ana);
	}

	public function total_container($date){
		$query = $this->db->query("SELECT DISTINCT(CONTAINER) AS JUMLAH FROM [QIP].[DBO].[T_EXPORT_UPLOAD] WITH (NOLOCK) WHERE EXPORT_DATE='$date'");
		
		//return $query->row();
		return $query->result();
		//print_r($ana);
		}

	public function total_container_lama($date){
			$query = $this->db->query("SELECT DISTINCT(CONTAINER) AS JUMLAH FROM [QIP].[DBO].[T_EXPORT] WITH (NOLOCK) WHERE CONVERT(VARCHAR(10),LMNT_DTTM,120)='$date'");
			
			//return $query->row();
			return $query->result_array();
			//print_r($ana);
		}
	
	public function detail_po_tidakpakai($po){
		$db2 = $this->load->database('qip_',TRUE);
		$qip_ic = $db2->query("SELECT * FROM ic WITH (NOLOCK) WHERE PO='$po' limit 1");
		$ic_result = $qip_ic->row();
		
		$qip_export = $db2->query("SELECT * FROM export WITH (NOLOCK) WHERE PO='$po'");
		$export_result = $qip_export->row();

		$detail_po = "SELECT *,";
		$detail_po .= "'".$ic_result->release_date."' AS INSP_DATE,";
		$detail_po .= "'".$export_result->date."' AS EX_FTY";
		$detail_po .=" FROM
				(
				SELECT PO_NO,CELL_CODE FROM THPRODHIS
				WHERE PO_NO='$po' AND CELL_CODE='CELLA11'
				GROUP BY PO_NO, CELL_CODE
				) AS A
				JOIN
				(SELECT PO_NO, MODEL_NAME, CUST_NO, DESTINATION, TOTAL_QTY, TOTAL_CARTON, PODD, SDD, SUM(WH_IN_QTY)-SUM(WH_OUT_QTY) AS BALANCE FROM THWHHIS WHERE PO_NO='$po'
				GROUP BY PO_NO, MODEL_NAME, CUST_NO, DESTINATION, TOTAL_QTY, TOTAL_CARTON, PODD, SDD) AS B
				ON A.PO_NO=B.PO_NO";
				//echo $detail_po;
		$query= $this->db->query($detail_po);
		return $query->result_array();
	}

	public function detail_po($po){
		$query = $this->db->query("
		SELECT TOP 1 ZCCELL, A.PO_NO, A.MODEL_NAME, B.CUST_NO, B.COUNTRY AS DESTINATION, ART_NO, QTY_TOTAL, TOTAL_CARTON, PD, A.SDD, 
		case when D.LOAD_TYPE is null then ''
		   else D.LOAD_TYPE
		   END AS TYPE, 
		   case when CONTAINER is null then ''
		   else CONTAINER
		   END AS CONTAINER, 
		   case when EXPORT_DATE is null then ''
		   else EXPORT_DATE
		   END AS EXPORT_DATE, 
		   case when INSPECT_DATE is null then ''
		   else INSPECT_DATE
		   END AS INSPECT_DATE 
		   , BALANCE  FROM 
			  (
				 SELECT ZCCELL, VBELN AS PO_NO, PRDHA_T AS MODEL_NAME, KWMENG AS QTY_TOTAL, ZLPDATE AS PD, ZPPSDD AS SDD 
				 FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN] WITH(NOLOCK)  WHERE VBELN='$po'
				 
			  ) AS A JOIN
			  (
				 SELECT O.FACTORY, N.PO_NO, N.COUNTRY, N.MODEL_NAME, N.DESTINATION, N.ART_NO, N.CUST_NO, N.TOTAL_QTY, N.TOTAL_CARTON, N.BALANCE FROM
					(SELECT PO_NO, COUNTRY, MODEL_NAME, DESTINATION, ART_NO,CUST_NO,TOTAL_QTY,TOTAL_CARTON, SUM(CASE WHEN STATUS='WR' THEN 1 ELSE 0 END) AS BALANCE 
					   FROM THWHHIS WITH (NOLOCK)
					   WHERE PO_NO='$po'
					   GROUP BY PO_NO, COUNTRY, MODEL_NAME, DESTINATION,  ART_NO,CUST_NO,TOTAL_QTY,TOTAL_CARTON) AS N
					   JOIN
					   (SELECT  DISTINCT LEFT(FACTOR_CODE,1) AS FACTORY, PO_NO FROM THWHHIS WITH(NOLOCK) WHERE PO_NO='$po'
					   AND FACTOR_CODE IS NOT NULL) AS O
					   ON N.PO_NO=O.PO_NO
			  ) AS B ON A.PO_NO=B.PO_NO
			  LEFT JOIN 
			  (   
				 SELECT DISTINCT PO_NO, INSPECT_DATE FROM QIP_AQL_DATA_FIRST WITH (NOLOCK)
				 WHERE PO_NO ='$po'
			  ) AS C ON A.PO_NO  = C.PO_NO
			  LEFT JOIN (SELECT PO_NO, EXPORT_DATE,CONTAINER, LOAD_TYPE FROM [QIP].[DBO].[T_EXPORT_UPLOAD] WITH(NOLOCK)  
			  WHERE PO_NO='$po' AND CONVERT(CHAR(8), UPLOAD_TIME, 112) =CONVERT(CHAR(8), GETDATE(), 112)) AS D
			  ON A.PO_NO=D.PO_NO
		
				
		
		");
		return $query->result_array();

	}


	public function detail_size($po){
		$query = $this->db->query("SELECT SIZE, SUM(LOT_QTY) AS TOTAL_QTY, SUM(LOT_QTY)-SUM(ASM_END_QTY) AS ASSY_BALANCE 
				FROM THPRODHIS WITH (NOLOCK)
				WHERE PO_NO='$po'
				GROUP BY SIZE order by SIZE ASC");
		return $query->result_array();

	}

	public function detail_carton($po){
		$query = $this->db->query("SELECT CARTON_NO, STATUS, CASE WHEN STATUS='WR' THEN 'WHITE'
											WHEN STATUS='WI' THEN 'YELLOW'
											WHEN STATUS='WO' THEN 'GREEN'
											END AS WARNA
									FROM THWHHIS WITH (NOLOCK) WHERE PO_NO='$po'
									ORDER BY CARTON_NO");
		return $query->result_array();		
	}

	public function last_carton($po){
		$query = $this->db->query("SELECT TOP 5  B.CARTON_NO, A.LMNT_DTTM FROM
		(SELECT QR_CODE, PO_NO, LMNT_DTTM FROM THWHLOG WITH (NOLOCK)
		WHERE PO_NO='$po'
		AND STATUS='WI') AS A JOIN THWHHIS AS B WITH (NOLOCK)
		ON A.QR_CODE=B.QR_CODE
		ORDER BY A.LMNT_DTTM DESC");
		return $query->result_array();
	}

	public function grey_carton($po){
		$query = $this->db->query("SELECT SIZE, CARTON_NO FROM [QIP].[DBO].QIP_AQL_DATA_FIRST WITH (NOLOCK) WHERE PO_NO='$po'
								ORDER BY SIZE");
		return $query->result_array();	
	}

	public function insert_export($data) 
	{
		$db2 = $this->load->database('qip',TRUE);
		$insert = $db2->insert('T_EXPORT_TODAY', $data);
		return $insert;
		
	}

	public function insert_status($data){
		print_r($data);
		$db2 = $this->load->database('qip',TRUE);
		$insert = $db2->insert('T_EXPORT_IC', $data);
		return $insert;
	}

	public function delete($id){
		return $this->db->query("DELETE FROM [QIP].[DBO].[T_EXPORT_TODAY] WITH (NOLOCK) WHERE ID_EXPORT = '$id'");
	}

	public function country($tgl){
		$query = $this->db->query("SELECT DISTINCT(COUNTRY) AS COUNTRY FROM [QIP].[dbo].[T_EXPORT_UPLOAD] WITH (NOLOCK)
		WHERE CONVERT(CHAR(10), UPLOAD_TIME,120) = '$tgl'");
		
		$country="<option value=''>All Country</pilih>";
        foreach ($query->result_array() as $data ){
        $country.= "<option value='$data[COUNTRY]'>$data[COUNTRY]</option>";
        }

        return $country;
	}

	public function factory(){
		$query = $this->db->query("SELECT DISTINCT(FACTORY) AS FACTORY FROM TMCELL WITH (NOLOCK)");
		return $query->result_array();
	}

	public function list_po_import(){
		$query = $this->db->query("SELECT *, LEFT(CELL_CODE,1) AS FACTORY FROM [QIP].[dbo].[T_EXPORT_UPLOAD] WITH (NOLOCK)
		WHERE EXPORT_DATE >= DATEADD(wk, DATEDIFF(wk,0,CONVERT(CHAR(10),GETDATE(),120)), -1) -- Sunday
		AND EXPORT_DATE <= DATEADD(wk, DATEDIFF(wk,0,CONVERT(CHAR(10),GETDATE(),120)), 5)
		ORDER BY EXPORT_DATE, CONTAINER");
		return $query;
	}

	public function list_export_validation(){
		$query = $this->db->query("EXEC [QIP].[dbo].[LIST_EXPORT_VALIDATION]

								");
		return $query;
	}

	public function status_validation($po, $status, $id){
		$query = $this->db->query("INSERT INTO [QIP].[dbo].[T_EXPORT_IC]
									([ID_EXPORT]
									,[PO_NO]
									,[STATUS_DATE]
									,[STATUS_PO])
									VALUES
									('$id',
									'$po',
									getdate(),
									'$status') ");
									
		return $query;
	}

	function import_po($data)
	{
		// print_r($data);
		// $query = 
		$this->db->insert_batch('[QIP].[dbo].[T_EXPORT_2]', $data);
		// echo $query;
	}

	private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
		// $this->db->insert_batch('[QIP].[dbo].[T_EXPORT_2]', $data);
		$db2 = $this->load->database('qip',TRUE);
		$db2->insert_batch('T_EXPORT_UPLOAD', $data);
	}
	
	public function delete_po($id)
	{
		$query = $this->db->query("DELETE FROM [QIP].[DBO].[T_EXPORT_UPLOAD] WHERE ID_EXPORT = '$id'");
		return $query;
		
	}


	public function update_po(){
      	$id_export = $this->input->post('id_export');
		$container = $this->input->post('container');
		$factory   = $this->input->post('factory');
		$cell      = $this->input->post('cell');
		$po_no     = $this->input->post('po_no');
		$model_name= $this->input->post('model_name');
		$country   = $this->input->post('country');
		$cust_no   = $this->input->post('cust_no');
		$article   = $this->input->post('article');
		$qty       = $this->input->post('qty');
		$sdd       = $this->input->post('sdd');
		$load_type = $this->input->post('load_type');
		$remark    = $this->input->post('remark');
 
		$query = $this->db->query("UPDATE [QIP].[DBO].[T_EXPORT_UPLOAD]
					SET CONTAINER= '$container',
					FACTORY='$factory',	CELL_CODE= '$cell',
					PO_NO='$po_no',	MODEL_NAME='$model_name',
					COUNTRY='$country',	CUST_NO= '$cust_no',
					ARTICLE ='$article',QTY='$qty',
					SDD='$sdd',LOAD_TYPE='$load_type',
					REMARK='$remark'
        		where ID_EXPORT='$id_export'
		 ");
		 return $query;
	}
	

	public function sdd(){
		$factory = $this->input->post('factory');
		$po_date = $this->input->post('po_date');

		$query = $this->db->query("SELECT DISTINCT(ZHSDD) AS SDD FROM ZPP_IF_LOADPLAN
		WHERE convert(char(4), ZHSDD)+left(right(zhsdd,5),2)='$po_date'
		AND ZCDONG ='$factory'
		ORDER BY ZHSDD");
		
		$SDD="<option value=''>All SDD</pilih>";
        foreach ($query->result_array() as $data ){
        $SDD.= "<option value='$data[SDD]'>$data[SDD]</option>";
        }

		return $SDD;
		
	}

	public function sdd2(){
		// $factory = $this->input->post('factory');
		$po_date = $this->input->post('po_date');

		$query = $this->db->query("SELECT DISTINCT(ZHSDD) AS SDD FROM ZPP_IF_LOADPLAN WITH (NOLOCK)
		WHERE convert(char(4), ZHSDD)+left(right(zhsdd,5),2)='$po_date'
		ORDER BY ZHSDD");
	
		
		
		$SDD="<option value=''>All SDD</pilih>";
        foreach ($query->result_array() as $data ){
        $SDD.= "<option value='$data[SDD]'>$data[SDD]</option>";
        }

		return $SDD;
		
	}

	public function sdd_all(){
		$po_date = $this->input->post('po_date');

		$query = $this->db->query("SELECT DISTINCT(ZHSDD) AS SDD FROM ZPP_IF_LOADPLAN WITH (NOLOCK)
		WHERE convert(char(4), ZHSDD)+left(right(zhsdd,5),2)=CONVERT(CHAR(6), GETDATE(),112)
		ORDER BY ZHSDD");
	
		return $query->result_array();
		
	}

	public function factory_(){
		$sdd = $this->input->post('sdd');

		$query = $this->db->query("SELECT DISTINCT(ZCDONG) AS FACTORY FROM ZPP_IF_LOADPLAN WITH (NOLOCK)
		WHERE ZHSDD = '$sdd'
		ORDER BY ZCDONG");
	
		
		
		$SDD="<option value=''>All Factory</pilih>";
        foreach ($query->result_array() as $data ){
        $SDD.= "<option value='$data[FACTORY]'>$data[FACTORY]</option>";
        }

		return $SDD;
		// echo $query;
	}

	public function inspect_balance(){
		$sdd = $this->input->post('sdd1');
		$factory = $this->input->post('factory1');
		$po_date = $this->input->post('po_date1');

		$query = $this->db->query("EXEC [QIP].[dbo].[INSPECT_PO_BALANCE] @SDD = '$sdd', @FACTORY = '$factory', @PO_DATE='$po_date'");
		// $query = ("EXEC [QIP].[dbo].[INSPECT_PO_BALANCE] @SDD = '$sdd', @FACTORY = '$factory'");

		return $query;
		// echo $query;
	}

	public function po_list(){
		$query = $this->db->query("select distinct(vbeln) as vbeln from zpp_if_loadplan WITH (NOLOCK)");
		
		return $query->result_array;
		// print_r($query->result_array());
	}

	public function compliance($po){
		$this->qc = $this->load->database('qc', TRUE);

		$query = $this->qc->query("
		select a.po,b.id as cmaid, 
		case when a.file is null then 'NA'
			else 'YES' 
			end as 'a01', 
			case when b.po is null then 'NA'
			else 'YES'
			end 'CMA', 
		case when c.po is null then 'NA'
		else 'YES'
		end as 'CPSIA'
		, (
				SELECT r.result FROM fgt.fgt f join fgt.final_result r
				on f.id = r.fgt
				and r.result = 'PASS'
				where f.article in (select art from loadplan where po='$po') order by f.id DESC LIMIT 1
			) as 'FGT', 
			(SELECT f.id FROM fgt.fgt f join fgt.final_result r
				on f.id = r.fgt
				and r.result = 'PASS'
				where f.article in (select art from loadplan where po='$po') order by f.id DESC LIMIT 1) as id_fgt
		from 
		(
			SELECT * FROM a01 WHERE po = '$po'
		)	a
		left join
		(
			select * FROM apps.cma where po = '$po'
		) b
		on a.po=b.po
		left join
		(
		SELECT * FROM apps.cpsia WHERE po = '$po'
		) as c
		on a.po = c.po
		")->row();
		return $query;
	}

	public function costco($po){
		$this->qc = $this->load->database('qc', TRUE);

		$query = $this->qc->query("
			select name as nama,category as kategori, f.date as tanggal, f.file as dokumen  from apps.compliance_po p join apps.compliance_files f 
			on p.compliance_files_id = f.id 
			where p.po='$po' 
		")->result_array();
		return $query;
	}

	public function bonding($po){
		$query = $this->db->query("SELECT TOP 1 BUILDING+CELL AS 'CELL', TESTDATE, RESULT FROM QIP_BONDING_TEST WITH (NOLOCK)
									 WHERE ARTICLE IN (SELECT ART_NO FROM THPRODHISPO WITH (NOLOCK) WHERE PO_NO='$po')
									 ORDER BY IN_DTTM DESC");

		return $query->row();
	}

	public function dev_stage($po){
		$query = $this->db->query("
		SELECT S.STAGE_NAME, U.TANGGAL, U.STATUS, U.REMARK FROM [DMS].[dbo].[UPLOAD_STAGE] AS U WITH (NOLOCK)
					JOIN [DMS].[dbo].[STAGE] S WITH (NOLOCK)
					ON U.STAGE_ID = S.STAGE_ID
					WHERE MODEL_NAME IN (SELECT MODEL_NAME FROM [MEShs].DBO.THPRODHISPO WITH (NOLOCK) WHERE PO_NO='$po')
		");
		return $query->result_array();
	}

	public function inspection($po){
		$query  =$this->db->query("SELECT * FROM [QIP].DBO.AQL_UPLOAD_PIVOT WITH (NOLOCK) WHERE PO_NO='$po'");
		return $query->result_array();
	}

	public function production($po){
		$query = $this->db->query("
		SELECT A.PO_NO, QTY_TOTAL, CUTTING_OUT, SEWING_OUT, ASSEMBLY_OUT, QTY_FG
					, CONVERT(CHAR(8), CUT_START,112) AS CUT_START
					, CONVERT(CHAR(8), CUT_START,112) AS CUT_START
					, CONVERT(CHAR(8), CUT_END,112) AS CUT_END
					, CONVERT(CHAR(8), SEW_START,112) AS SEW_START
					, CONVERT(CHAR(8), SEW_END,112) AS SEW_END
					, CONVERT(CHAR(8), ASY_START,112) AS ASY_START
					, CONVERT(CHAR(8), ASY_END,112) AS ASY_END
					, CONVERT(CHAR(8), FG_START,112) AS FG_START
					, CASE WHEN YEAR(FG_END) < '2000' THEN '' 
							ELSE CONVERT(CHAR(8), FG_END,112)
							END AS FG_END
					, CONVERT(CHAR(8), WH_START,112) AS WH_START
					, CONVERT(CHAR(8), WH_END,112) AS WH_END
					
			FROM 
				(
					SELECT PO_NO,SUM(LOT_QTY) AS QTY_TOTAL, MIN(CUT_END_DATE) AS CUT_START, MAX(CUT_END_DATE) AS CUT_END,
								MIN(SEW_END_DATE) AS SEW_START, MAX(SEW_END_DATE) AS SEW_END, MIN(ASM_END_DATE) AS ASY_START, MAX(ASM_END_DATE) AS ASY_END
						FROM THPRODHIS WITH (NOLOCK)
						WHERE PO_NO='$po'
						GROUP BY PO_NO
				) AS A LEFT JOIN
				(
					SELECT PO_NO
					, ISNULL( SUM( CASE WHEN PROD_STATUS = 'CE' THEN CONVERT(NUMERIC,GD_CNT) ELSE 0 END ) ,0 ) AS CUTTING_OUT
					, ISNULL( SUM( CASE WHEN PROD_STATUS = 'SE' THEN CONVERT(NUMERIC,GD_CNT) ELSE 0 END ) ,0 ) AS SEWING_OUT
					, ISNULL( SUM( CASE WHEN PROD_STATUS = 'AE' THEN CONVERT(NUMERIC,GD_CNT) ELSE 0 END ) ,0 ) AS ASSEMBLY_OUT
					FROM THPRODLOG WITH (NOLOCK)
					WHERE		PO_NO  ='$po'
						GROUP BY PO_NO
				) AS B
				ON A.PO_NO = B.PO_NO
				LEFT JOIN
				(
					select W.PO_NO, TOTAL_CARTON-WH_FG AS QTY_FG, FG_START, FG_END
					FROM
					(
						select PO_NO, TOTAL_CARTON, COUNT(WH_IN_QTY) AS WH_FG from THWHHIS WITH (NOLOCK)
						WHERE PO_NO='$po' and WH_IN_QTY>0
						GROUP BY PO_NO, TOTAL_CARTON
					) AS W LEFT JOIN 
					(
						SELECT PO_NO
								, ISNULL( MIN( CASE WHEN STATUS = 'WI' THEN LMNT_DTTM END ) ,0 ) AS 'FG_START'
								, ISNULL( MAX( CASE WHEN STATUS = 'WO' THEN LMNT_DTTM END ) ,0 ) AS 'FG_END'
								FROM THWHLOG WITH (NOLOCK)
												WHERE PO_NO='$po'
												GROUP BY PO_NO
					) AS L
					ON W.PO_NO = L.PO_NO
				) AS C
				ON A.PO_NO = C.PO_NO
				LEFT JOIN
				(
					select VBELN, MIN(LMNT_DTTM) AS WH_START, MAX(LMNT_DTTM) AS WH_END 
					from ZMM_IF_GOODS_TRANSFER_NEW WITH (NOLOCK)
					where MDONO > ''
					and VBELN='$po'
					AND QRBARCODE IS NOT NULL
					GROUP BY VBELN
				) AS D
				ON A.PO_NO = D.VBELN
		");
		return $query->row();
	}


	public function export($po){
		$query = $this->db->query("
			SELECT EXPORT_DATE, LOAD_TYPE, CONTAINER FROM [QIP].dbo.T_EXPORT_UPLOAD WITH (NOLOCK) WHERE PO_NO='$po'
		")->result_array();

		return $query;
	}

	public function quality($po){
		$this->qc = $this->load->database('qc', TRUE);

		$query = $this->qc->query("
				select * from apps.photo_issues where po='$po'");
		return $query->result_array();
	}
}
