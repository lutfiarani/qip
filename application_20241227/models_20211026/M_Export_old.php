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
				FROM THWHHIS
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
		FROM [QIP].[dbo].[T_EXPORT] as A
		JOIN [MEShs].[dbo].[THPRODHIS] as B
		ON A.PO_NO=B.PO_NO");
		$cobacoba = $coba->result_array();
		print_r($cobacoba);

	}

	public function tampil_exportss($tgl){
		$query = $this->db->query(" 
		SELECT *, CASE WHEN STATUS_PO IS NULL THEN STATUS_PO_AQL
			WHEN STATUS_PO IS NOT NULL THEN STATUS_PO
			WHEN STATUS_PO ='REJECT' AND STATUS_PO_AQL='RELEASE' THEN 'RELEASE'
			END AS STATUS_PO2 FROM (
SELECT FACTORY , CELL,  C.PO_NO, MODEL_NAME, ART_NO, TOTAL_QTY, SDD, COUNTRY, TOTAL_CARTON,TYPE, INSPECT_DATE,CONTAINER, REMARK, STATUS_PO,
 CASE WHEN E.INSPECT_DATE IS NULL AND BALANCE_CRTON='0' THEN 'WAITING'
            WHEN E.INSPECT_DATE IS NULL AND BALANCE_CRTON>'0' THEN 'PRODUCTION'
            WHEN E.INSPECT_DATE IS NOT NULL AND STATUS_PO IS NULL THEN 'RELEASE'
            ELSE STATUS_PO 
        END AS STATUS_PO_AQL
		FROM 
		(SELECT * FROM [QIP].[dbo].[T_EXPORT] WHERE EXPORT_DATE='$tgl') AS C 
			LEFT JOIN
		(
			SELECT a.ZCELLNO AS CELL, a.VBELN AS PO_NO,b.MaxList
			FROM (
				SELECT vbeln AS PO_NO,  MAX(ZNSEQ_C) as MaxList
				FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN]
				WHERE ZLPVER IN (SELECT MAX(ZLPVER) FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN])
				GROUP BY vbeln
				
			) b
			LEFT JOIN   [MEShs].[dbo].[ZPP_IF_LOADPLAN] a
			ON a.VBELN = b.PO_NO AND a.ZNSEQ_C = b.MaxList
			WHERE a.ZLPVER IN (SELECT MAX(ZLPVER) FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN])
		) AS A 
		ON C.PO_NO=A.PO_NO
		LEFT JOIN 
		(
			
                    SELECT LEFT(FACTOR_CODE,1) AS FACTORY,PO_NO, COUNTRY, MODEL_NAME, DESTINATION, SDD, ART_NO,CUST_NO,TOTAL_QTY,TOTAL_CARTON, SUM(CASE WHEN STATUS='WR' THEN 1 ELSE 0 END) AS BALANCE_CRTON FROM THWHHIS
                    WHERE LEFT(SDD,6) >= CONVERT(CHAR(6),GETDATE(),112)
					AND FACTOR_CODE IS NOT NULL
					GROUP BY FACTOR_CODE,PO_NO, COUNTRY, MODEL_NAME, DESTINATION, SDD, ART_NO,CUST_NO,TOTAL_QTY,TOTAL_CARTON
					
		) AS B ON C.PO_NO=B.PO_NO
		LEFT JOIN
		(SELECT PO_NO, INSPECT_DATE  FROM QIP_AQL_DATA_FIRST
                GROUP BY PO_NO, INSPECT_DATE) AS E
				ON C.PO_NO=E.PO_NO
				LEFT JOIN
		(
			SELECT t.PO_NO, t.STATUS_PO, r.MaxTime
			FROM (
				SELECT PO_NO, MAX(STATUS_DATE) as MaxTime
				FROM [QIP].[dbo].[T_EXPORT_IC]
				GROUP BY PO_NO
			) r
			INNER JOIN [QIP].[dbo].[T_EXPORT_IC] t
			ON t.PO_NO = r.PO_NO AND t.STATUS_DATE = r.MaxTime
		) AS D
		ON C.PO_NO=D.PO_NO
		WHERE EXPORT_DATE = '$tgl'
	) AS Z
	ORDER BY CONTAINER
				");
		return $query->result_array();
	}



	public function tampil_export_admin($tgl){
		$query = $this->db->query(" 
		SELECT *, CASE WHEN STATUS_PO IS NULL THEN STATUS_PO_AQL
			WHEN STATUS_PO IS NOT NULL THEN STATUS_PO
			WHEN STATUS_PO ='REJECT' AND STATUS_PO_AQL='RELEASE' THEN 'RELEASE'
			END AS STATUS_PO2 FROM (
SELECT FACTORY , CELL,  C.PO_NO, MODEL_NAME, ART_NO, TOTAL_QTY, SDD, COUNTRY, TOTAL_CARTON,TYPE, INSPECT_DATE,CONTAINER, REMARK, STATUS_PO,
 CASE WHEN E.INSPECT_DATE IS NULL AND BALANCE_CRTON='0' THEN 'WAITING'
            WHEN E.INSPECT_DATE IS NULL AND BALANCE_CRTON>'0' THEN 'PRODUCTION'
            WHEN E.INSPECT_DATE IS NOT NULL AND STATUS_PO IS NULL THEN 'RELEASE'
            ELSE STATUS_PO 
        END AS STATUS_PO_AQL
		FROM 
		(SELECT * FROM [QIP].[dbo].[T_EXPORT] WHERE EXPORT_DATE='$tgl') AS C 
			LEFT JOIN
		(
			SELECT a.ZCELLNO AS CELL, a.VBELN AS PO_NO,b.MaxList
			FROM (
				SELECT vbeln AS PO_NO,  MAX(ZNSEQ_C) as MaxList
				FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN]
				WHERE ZLPVER IN (SELECT MAX(ZLPVER) FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN])
				GROUP BY vbeln
				
			) b
			LEFT JOIN   [MEShs].[dbo].[ZPP_IF_LOADPLAN] a
			ON a.VBELN = b.PO_NO AND a.ZNSEQ_C = b.MaxList
			WHERE a.ZLPVER IN (SELECT MAX(ZLPVER) FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN])
		) AS A 
		ON C.PO_NO=A.PO_NO
		LEFT JOIN 
		(
			
                    SELECT LEFT(FACTOR_CODE,1) AS FACTORY,PO_NO, COUNTRY, MODEL_NAME, DESTINATION, SDD, ART_NO,CUST_NO,TOTAL_QTY,TOTAL_CARTON, SUM(CASE WHEN STATUS='WR' THEN 1 ELSE 0 END) AS BALANCE_CRTON FROM THWHHIS
                    WHERE LEFT(SDD,6) >= CONVERT(CHAR(6),GETDATE(),112)
					AND FACTOR_CODE IS NOT NULL
					GROUP BY FACTOR_CODE,PO_NO, COUNTRY, MODEL_NAME, DESTINATION, SDD, ART_NO,CUST_NO,TOTAL_QTY,TOTAL_CARTON
					
		) AS B ON C.PO_NO=B.PO_NO
		LEFT JOIN
		(SELECT PO_NO, INSPECT_DATE  FROM QIP_AQL_DATA_FIRST
                GROUP BY PO_NO, INSPECT_DATE) AS E
				ON C.PO_NO=E.PO_NO
				LEFT JOIN
		(
			SELECT t.PO_NO, t.STATUS_PO, r.MaxTime
			FROM (
				SELECT PO_NO, MAX(STATUS_DATE) as MaxTime
				FROM [QIP].[dbo].[T_EXPORT_IC]
				GROUP BY PO_NO
			) r
			INNER JOIN [QIP].[dbo].[T_EXPORT_IC] t
			ON t.PO_NO = r.PO_NO AND t.STATUS_DATE = r.MaxTime
		) AS D
		ON C.PO_NO=D.PO_NO
		WHERE EXPORT_DATE = '$tgl'
	) AS Z
	ORDER BY CONTAINER
				");
		return $query->result_array();
	}


	public function container($con)	{
		$query = $this->db->query(" SELECT * FROM #QIP_TEMP1 WHERE CONTAINER = '$con' ");
		return $query->result_array();
	}

	public function list_export()	{
		$query = $this->db->query(" SELECT * FROM [QIP].[dbo].[T_EXPORT] ORDER BY LMNT_DTTM DESC");
		return $query->result_array();
	}

	public function total_container(){
		$query = $this->db->query("SELECT DISTINCT(CONTAINER) AS JUMLAH FROM [QIP].[dbo].[T_EXPORT] WHERE EXPORT_DATE='2020-01-08' ");
		
		//return $query->row();
		return $query->result_array();
		//print_r($ana);
		}

	public function detail_po_tidakpakai($po){
		$db2 = $this->load->database('qip_',TRUE);
		$qip_ic = $db2->query("SELECT * FROM ic WHERE PO='$po' limit 1");
		$ic_result = $qip_ic->row();
		
		$qip_export = $db2->query("SELECT * FROM export WHERE PO='$po'");
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
							
		SELECT TOP 1 ZCCELL, A.PO_NO, A.MODEL_NAME, B.CUST_NO, B.DESTINATION, ART_NO, QTY_TOTAL, TOTAL_CARTON, PD, SDD, TYPE, CONTAINER, EXPORT_DATE, INSPECT_DATE, BALANCE  FROM 
		(
			SELECT ZCCELL, VBELN AS PO_NO, PRDHA_T AS MODEL_NAME, KWMENG AS QTY_TOTAL, ZLPDATE AS PD, ZPPSDD AS SDD FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN] WHERE VBELN='$po'
			
		) AS A JOIN
		(
			SELECT PO_NO, CUST_NO, COUNTRY AS DESTINATION,ART_NO, TOTAL_CARTON, SUM(CASE WHEN STATUS='WR' THEN 1 ELSE 0 END) AS BALANCE FROM [MEShs].[dbo].[THWHHIS] WHERE PO_NO='$po'
			GROUP BY PO_NO, CUST_NO, COUNTRY, ART_NO, TOTAL_CARTON, TOTAL_QTY
		) AS B ON A.PO_NO=B.PO_NO
		LEFT JOIN 
		(	
			SELECT DISTINCT PO_NO, INSPECT_DATE FROM QIP_AQL_DATA_FIRST
			WHERE PO_NO ='$po'
		) AS C ON A.PO_NO  = C.PO_NO
		LEFT JOIN (SELECT * FROM [QIP].[dbo].[T_EXPORT] WHERE PO_NO='$po') AS D
		ON A.PO_NO=D.PO_NO
				
		
		");
		return $query->result_array();

	}


	public function detail_size($po){
		$query = $this->db->query("SELECT SIZE, SUM(LOT_QTY) AS TOTAL_QTY, SUM(LOT_QTY)-SUM(ASM_END_QTY) AS ASSY_BALANCE FROM THPRODHIS WHERE PO_NO='$po'
				GROUP BY SIZE");
		return $query->result_array();

	}

	public function detail_carton($po){
		$query = $this->db->query("SELECT CARTON_NO, STATUS, CASE WHEN STATUS='WR' THEN 'WHITE'
											WHEN STATUS='WI' THEN 'YELLOW'
											WHEN STATUS='WO' THEN 'GREEN'
											END AS WARNA
									FROM THWHHIS WHERE PO_NO='$po'
									ORDER BY CARTON_NO");
		return $query->result_array();		
	}

	public function last_carton($po){
		$query = $this->db->query("SELECT TOP 5 A.*, B.CARTON_NO FROM THWHLOG AS A
							JOIN THWHSM01 AS B
							ON A.QR_CODE=B.QR_CODE
							WHERE A.PO_NO='$po'
							AND A.STATUS='WI' 
							ORDER BY LMNT_DTTM DESC");
		return $query->result_array();
	}

	public function grey_carton($po){
		$query = $this->db->query("SELECT SIZE, CARTON_NO FROM QIP_AQL_DATA_FIRST WHERE PO_NO='$po'
								ORDER BY SIZE");
		return $query->result_array();	
	}

	public function insert_export($data) 
	{
		$db2 = $this->load->database('qip',TRUE);
		$insert = $db2->insert('T_EXPORT', $data);
		return $insert;
		
	}

	public function insert_status($data){
		print_r($data);
		$db2 = $this->load->database('qip',TRUE);
		$insert = $db2->insert('T_EXPORT_IC', $data);
		return $insert;
	}

	public function delete($id){
		return $this->db->query("DELETE FROM [QIP].[dbo].[T_EXPORT] WHERE ID_EXPORT = '$id'");
	}
}
