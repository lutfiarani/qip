<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Inspection extends CI_Model {

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
	
	

	public function search_loadplan($po){
        $query = $this->db->query("
		SELECT CELL, FACTORY, PO_NO, COUNTRY, MODEL_NAME, DESTINATION, SDD, ART_NO, CUST_NO, TOTAL_QTY, TOTAL_CARTON, BALANCE_CRTON, INSPECT_DATE_INPUT, TYPE, EXPORT_DATE, CONTAINER, INSPECT_DATE_AQL, STATUS_PO, CASE WHEN STATUS_PO IS NULL THEN STATUS_PO_AQL
		WHEN STATUS_PO ='REJECT' AND STATUS_PO_AQL='RELEASE' THEN 'RELEASE'
		WHEN STATUS_PO IS NOT NULL THEN STATUS_PO
		
		END AS STATUS_PO2 
		FROM (SELECT A.CELL, A.FACTORY, D.* , CONVERT(CHAR(10),B.INSPECT_DATE,126) AS INSPECT_DATE_INPUT, C.TYPE,EXPORT_DATE,C.CONTAINER, E.INSPECT_DATE AS INSPECT_DATE_AQL, F.STATUS_PO,
	CASE WHEN E.INSPECT_DATE IS NULL AND BALANCE_CRTON='0' THEN 'WAITING'
		WHEN E.INSPECT_DATE IS NULL AND BALANCE_CRTON > '0' THEN 'PRODUCTION'
		WHEN E.INSPECT_DATE IS NOT NULL AND BALANCE_CRTON > '0' THEN 'PRODUCTION'
		WHEN E.INSPECT_DATE IS NOT NULL AND BALANCE_CRTON = '0' THEN 'RELEASE'
		WHEN E.INSPECT_DATE IS NOT NULL AND F.STATUS_PO IS NULL THEN 'RELEASE'
		ELSE F.STATUS_PO
	END AS STATUS_PO_AQL
	FROM (
			  
			  SELECT TOP 1 a.ZCDONG AS FACTORY,a.ZCELLNO AS CELL,  a.VBELN AS PO_NO,b.MaxList
							FROM (
								SELECT vbeln AS PO_NO,  MAX(ZNSEQ_C) as MaxList
								FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN]
								WHERE VBELN='$po'
								GROUP BY vbeln
			
							) b
							LEFT JOIN   [MEShs].[dbo].[ZPP_IF_LOADPLAN] a
							ON a.VBELN = b.PO_NO AND a.ZNSEQ_C = b.MaxList) as A
			  LEFT JOIN (
			  
			  
			  SELECT t.PO_NO, t.INSPECT_DATE, r.MaxTime
				FROM (
					SELECT PO_NO, MAX(INSPECT_DATE) as MaxTime
					FROM [QIP].[dbo].[T_INSPECTION]
					GROUP BY PO_NO
				) r
				INNER JOIN [QIP].[dbo].[T_INSPECTION] t
				ON t.PO_NO = r.PO_NO AND t.INSPECT_DATE = r.MaxTime
				WHERE t.PO_NO='$po') as B
				ON A.PO_NO=B.PO_NO
				LEFT JOIN (SELECT t.PO_NO, t.EXPORT_DATE,t.CONTAINER, t.TYPE,t.REMARK, r.MaxTime
				FROM (
					SELECT PO_NO, MAX(LMNT_DTTM) as MaxTime
					FROM [QIP].[dbo].[T_EXPORT]
					GROUP BY PO_NO
				) r
				INNER JOIN  [QIP].[dbo].[T_EXPORT] t
				ON t.PO_NO = r.PO_NO AND t.LMNT_DTTM = r.MaxTime
				WHERE t.PO_NO='$po') AS C
				ON A.PO_NO=C.PO_NO

				LEFT JOIN (
				SELECT PO_NO, COUNTRY, MODEL_NAME, DESTINATION, SDD, ART_NO,CUST_NO,TOTAL_QTY,TOTAL_CARTON, SUM(CASE WHEN STATUS='WR' THEN 1 ELSE 0 END) AS BALANCE_CRTON FROM THWHHIS
				WHERE PO_NO='$po'
				GROUP BY PO_NO, COUNTRY, MODEL_NAME, DESTINATION, SDD, ART_NO,CUST_NO,TOTAL_QTY,TOTAL_CARTON
				) AS D
				ON A.PO_NO=D.PO_NO
				LEFT JOIN 
				(SELECT PO_NO, INSPECT_DATE  FROM QIP_AQL_DATA_FIRST
				WHERE PO_NO='$po'
				GROUP BY PO_NO, INSPECT_DATE) AS E
				ON A.PO_NO=E.PO_NO
				LEFT JOIN (SELECT t.PO_NO, t.STATUS_PO, r.MaxTime
				FROM (
					SELECT PO_NO, MAX(STATUS_DATE) as MaxTime
					FROM [QIP].[dbo].[T_EXPORT_IC]
					WHERE PO_NO='$po'
					GROUP BY PO_NO
				) r
				INNER JOIN [QIP].[dbo].[T_EXPORT_IC] t
				ON t.PO_NO = r.PO_NO AND t.STATUS_DATE = r.MaxTime) AS F
				ON A.PO_NO = F.PO_NO
				WHERE A.PO_NO='$po'
			   ) AS Z
			   WHERE PO_NO='$po'
				ORDER BY INSPECT_DATE_INPUT DESC
        ");
        return $query->result_array();
        //echo $query;
    }

	public function today_inspect(){
		// $query = $this->db->query("
		//   EXEC [QIP].[DBO].[INSPECT_INPUT_PPIC]
		// ");
		$query = $this->db->query("
		  SELECT  * FROM [QIP].[DBO].[T_INSPECTION] ORDER BY INSPECT_DATE DESC
		");
		return $query;
	}


    public function loadplan($tgl,$factory){
        $query = $this->db->query("
		SELECT *, CASE WHEN STATUS_PO IS NULL THEN STATUS_PO_AQL
			WHEN STATUS_PO ='REJECT' AND STATUS_PO_AQL='RELEASE' THEN 'RELEASE'	
			WHEN STATUS_PO IS NOT NULL THEN STATUS_PO
			
			END AS STATUS_PO2 INTO #QIP_TEMP$factory
			FROM (SELECT B.CELL, D.* , CONVERT(CHAR(10),A.INSPECT_DATE,126) AS INSPECT_DATE_INPUT, C.LOAD_TYPE,EXPORT_DATE,C.CONTAINER, E.INSPECT_DATE AS INSPECT_DATE_AQL, F.STATUS_PO,
			CASE WHEN E.INSPECT_RESULT IS NULL AND BALANCE_CRTON='0' THEN 'WAITING'
			WHEN E.INSPECT_RESULT IS NULL AND BALANCE_CRTON > '0' THEN 'PRODUCTION'
			WHEN E.INSPECT_RESULT IS NOT NULL AND BALANCE_CRTON > '0' THEN 'PRODUCTION'
			WHEN E.INSPECT_RESULT = 'Y' AND BALANCE_CRTON = '0' THEN 'RELEASE'
			WHEN E.INSPECT_RESULT = 'N' THEN 'REJECT'
            WHEN E.INSPECT_RESULT IS NOT NULL AND F.STATUS_PO IS NULL THEN 'RELEASE'
            ELSE F.STATUS_PO
        END AS STATUS_PO_AQL
        FROM (
                   SELECT t.PO_NO, t.INSPECT_DATE, r.MaxTime
					FROM (
						SELECT PO_NO, MAX(INSPECT_DATE) as MaxTime
						FROM [QIP].[dbo].[T_INSPECTION]
						GROUP BY PO_NO
					) r
					INNER JOIN [QIP].[dbo].[T_INSPECTION] t
					ON t.PO_NO = r.PO_NO AND t.INSPECT_DATE = r.MaxTime
					WHERE CONVERT(CHAR(10),MaxTime,126)='$tgl') as A 
                  
                    LEFT JOIN (
						SELECT a.CELL_CODE AS CELL, a.PO_NO,b.MaxList
						FROM (
							SELECT PO_NO,  MAX(RIGHT(CELL_CODE, 2)) as MaxList
							FROM [MEShs].[dbo].[THPRODLOG_HEADER] WITH (NOLOCK)
							WHERE PROD_STATUS='AE'
							GROUP BY PO_NO
							
						) b
						JOIN   [MEShs].[dbo].[THPRODLOG_HEADER] a WITH (NOLOCK)
						ON a.PO_NO = b.PO_NO AND RIGHT(a.CELL_CODE,2) = b.MaxList
						GROUP BY A.CELL_CODE, A.PO_NO, MaxList
					) AS B
                    ON A.PO_NO=B.PO_NO
                    LEFT JOIN (SELECT t.PO_NO, t.EXPORT_DATE,t.CONTAINER, t.LOAD_TYPE,t.REMARK, r.MaxTime
					FROM (
						SELECT PO_NO, MAX(UPLOAD_TIME) as MaxTime
						FROM [QIP].[dbo].[T_EXPORT_UPLOAD]
						GROUP BY PO_NO
					) r
					INNER JOIN  [QIP].[dbo].[T_EXPORT_UPLOAD] t
					ON t.PO_NO = r.PO_NO AND t.UPLOAD_TIME = r.MaxTime) AS C
                    ON A.PO_NO=C.PO_NO
                    LEFT JOIN (
                    SELECT S.PO_NO, S.COUNTRY, S.MODEL_NAME, S.DESTINATION, S.SDD, S.ART_NO, 
					S.CUST_NO, S.TOTAL_QTY, S.TOTAL_CARTON, S.BALANCE_CRTON
					, LEFT(FACTOR_CODE,1) AS FACTORY FROM 
						(SELECT PO_NO, COUNTRY, MODEL_NAME, DESTINATION, SDD, ART_NO,RIGHT(CUST_NO,6) AS CUST_NO,TOTAL_QTY,TOTAL_CARTON, SUM(CASE WHEN STATUS='WR' THEN 1 ELSE 0 END) AS BALANCE_CRTON 
						FROM THWHHIS WITH (NOLOCK)
									WHERE LEFT(SDD,6) >= CONVERT(CHAR(6),GETDATE(),112)-2-2
									GROUP BY PO_NO, COUNTRY, MODEL_NAME, DESTINATION, SDD, ART_NO,CUST_NO,TOTAL_QTY,TOTAL_CARTON) AS S
						JOIN (SELECT FACTOR_CODE, PO_NO FROM THWHHIS WITH (NOLOCK)
						WHERE LEFT(SDD,6) >= CONVERT(CHAR(6),GETDATE(),112)-2-2
						AND LEFT(FACTOR_CODE,1) = '$factory'
						GROUP BY FACTOR_CODE, PO_NO
						) AS P
						ON S.PO_NO = P.PO_NO

					) AS D
                    ON A.PO_NO=D.PO_NO
                    LEFT JOIN 
                    (
						SELECT t.PO_NO, t.LMNT_DTTM, t.INSPECT_RESULT, r.MaxTime, j.INSPECT_DATE
						FROM (
							SELECT PO_NO, MAX(LMNT_DTTM) as MaxTime
							FROM [QIP].[dbo].[QIP_AQL_DATA_LOG] WITH (NOLOCK)
							GROUP BY PO_NO
						) r
						INNER JOIN [QIP].[dbo].[QIP_AQL_DATA_LOG] t  WITH (NOLOCK)
						ON t.PO_NO = r.PO_NO AND t.LMNT_DTTM = r.MaxTime
						INNER JOIN [QIP].[dbo].QIP_AQL_DATA_FIRST j  WITH (NOLOCK)
						ON t.PO_NO = j.PO_NO
						and t.PARTIAL = j.PARTIAL
						and t.LEVEL = j.LEVEL
						and t.LEVEL_USER = j.LEVEL_USER
						and t.REMARK = j.REMARK
						group by t.PO_NO, t.LMNT_DTTM, t.INSPECT_RESULT, r.MaxTime, j.INSPECT_DATE
 
						
					) AS E
                    ON A.PO_NO=E.PO_NO
                    LEFT JOIN (SELECT t.PO_NO, t.STATUS_PO, r.MaxTime
					FROM (
						SELECT PO_NO, MAX(STATUS_DATE) as MaxTime
						FROM [QIP].[dbo].[T_EXPORT_IC]
						GROUP BY PO_NO
					) r
					INNER JOIN [QIP].[dbo].[T_EXPORT_IC] t
					ON t.PO_NO = r.PO_NO AND t.STATUS_DATE = r.MaxTime) AS F
                    ON A.PO_NO = F.PO_NO
                    WHERE CONVERT(CHAR(10),A.INSPECT_DATE,126) = '$tgl'
				   ) AS Z
				   WHERE FACTORY='$factory'
				   ORDER BY INSPECT_DATE_AQL DESC
        ");
        return $query->result_array();
        //echo $query;
    }

    public function tampil_loadplan($tgl,$factory){
        $query = $this->db->query("SELECT * FROM #QIP_TEMP$factory WHERE CONVERT(CHAR(10),INSPECT_DATE_INPUT,126) = '$tgl' ");
        return $query->result_array();
    }

    public function drop_loadplan($factory){
        $query = $this->db->query("DROP TABLE #QIP_TEMP$factory");
        return $query;
    }

    public function tampil_loadplan_admin($factory){
        $query = $this->db->query("SELECT * FROM #QIP_TEMPADM$factory ");
        return $query->result_array();
    }

    public function drop_loadplan_admin($factory){
        $query = $this->db->query("DROP TABLE #QIP_TEMPADM$factory");
        return $query;
    }

    public function inspect_count($factory){
        $query = $this->db->query("SELECT 
                    COUNT(CASE WHEN STATUS_PO2 = 'PRODUCTION' then 1 ELSE NULL END) as 'PRODUCTION',
                    COUNT(CASE WHEN STATUS_PO2 = 'REJECT' then 1 ELSE NULL END) as 'REJECT',
                    COUNT(CASE WHEN STATUS_PO2 = 'RELEASE' then 1 ELSE NULL END) as 'RELEASE',
                    COUNT(CASE WHEN STATUS_PO2 = 'WAITING' then 1 ELSE NULL END) as 'WAITING',
                    COUNT(STATUS_PO2) AS TOTAL
                from #QIP_TEMP$factory");
        return $query->row();
    }

    public function inspect_count_admin($factory){
        $query = $this->db->query("SELECT 
                    COUNT(CASE WHEN STATUS_PO2 = 'PRODUCTION' then 1 ELSE NULL END) as 'PRODUCTION',
                    COUNT(CASE WHEN STATUS_PO2 = 'REJECT' then 1 ELSE NULL END) as 'REJECT',
                    COUNT(CASE WHEN STATUS_PO2 = 'RELEASE' then 1 ELSE NULL END) as 'RELEASE',
                    COUNT(CASE WHEN STATUS_PO2 = 'WAITING' then 1 ELSE NULL END) as 'WAITING',
                    COUNT(STATUS_PO2) AS TOTAL
                from #QIP_TEMPADM$factory");
        return $query->row();
    }


    public function insert_inspection($data) 
	{
		$db2 = $this->load->database('qip',TRUE);
        $insert = $db2->insert('T_INSPECTION', $data);
       // echo $insert;
		return $insert;
		
	}

	public function tampil_inspect($tgl, $factory){
		$query = $this->db->query(" 
				SELECT FACTORY , CELL, ZLPVER, A.PO_NO, MODEL_NAME, ART_NO, QTY, ZHSDD, COUNTRY, DESTINATION, QTY_CRTN, WHIN, WHOUT, STATUS_CRTN, TYPE, CONTAINER, REMARK, STATUS_PO,
				CASE WHEN STATUS_PO IS NULL THEN STATUS_CRTN
					WHEN STATUS_PO IS NOT NULL THEN STATUS_PO
					END AS STATUS_PO2
				FROM 
				(
					SELECT ZCDONG AS FACTORY,ZCCELL AS CELL, ZLPVER, VBELN AS PO_NO, PRDHA_T AS MODEL_NAME, MATNR AS ART_NO, KWMENG AS QTY, ZHSDD FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN]
					WHERE ZLPVER IN (SELECT MAX(ZLPVER) FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN])
				) AS A JOIN 
				(
					SELECT PO_NO, COUNTRY, DESTINATION, SUM(CARTON_QTY) AS QTY_CRTN, SUM(WH_IN_QTY) AS WHIN, SUM(WH_OUT_QTY) AS WHOUT,
					CASE WHEN SUM(CARTON_QTY) > SUM(WH_IN_QTY) THEN 'PRODUCT'
							WHEN SUM(CARTON_QTY) = SUM(WH_IN_QTY) AND SUM(WH_IN_QTY) >  SUM(WH_OUT_QTY) THEN 'WAITING'
							WHEN SUM(WH_IN_QTY) =  SUM(WH_OUT_QTY) THEN 'RELEASE'
							END AS STATUS_CRTN 
					FROM [MEShs].[dbo].[THWHHIS] GROUP BY PO_NO, COUNTRY, DESTINATION
				) AS B ON A.PO_NO=B.PO_NO
				JOIN [QIP].[dbo].[T_EXPORT] AS C 
				ON B.PO_NO = C.PO_NO 
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
				ORDER BY CONTAINER
				");
		return $query->result_array();
	}

	public function container($con)	{
		$query = $this->db->query(" SELECT * FROM #QIP_TEMP1 WHERE CONTAINER = '$con' ");
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
							
						SELECT ZCCELL, A.PO_NO, A.MODEL_NAME, RIGHT(B.CUST_NO,6) AS CUST_NO, B.DESTINATION, ART_NO, QTY_TOTAL, TOTAL_CARTON, PD, SDD, TYPE, CONTAINER, EXPORT_DATE, INSP_DATE, BALANCE  FROM 
						(
							SELECT ZCCELL, VBELN AS PO_NO, PRDHA_T AS MODEL_NAME, KWMENG AS QTY_TOTAL, ZLPDATE AS PD, ZPPSDD AS SDD FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN] WHERE VBELN='$po'
							AND ZLPVER in (SELECT MAX(ZLPVER) FROM [MEShs].[dbo].[ZPP_IF_LOADPLAN])
						) AS A JOIN
						(
							SELECT PO_NO, CUST_NO, DESTINATION,ART_NO, TOTAL_CARTON, TOTAL_QTY-SUM(WH_OUT_QTY) AS BALANCE FROM [MEShs].[dbo].[THWHHIS] WHERE PO_NO='$po'
							GROUP BY PO_NO, CUST_NO, DESTINATION, ART_NO, TOTAL_CARTON, TOTAL_QTY
						) AS B ON A.PO_NO=B.PO_NO
						JOIN 
						(	
							SELECT t.PO_NO, t.STATUS_PO, r.Insp_date
							FROM (
								SELECT PO_NO, MAX(STATUS_DATE) as Insp_date
								FROM [QIP].[dbo].[T_EXPORT_IC]
								GROUP BY PO_NO
							) r
							INNER JOIN [QIP].[dbo].[T_EXPORT_IC] t
							ON t.PO_NO = r.PO_NO AND t.STATUS_DATE = r.Insp_date
							WHERE t.PO_NO ='$po'
						) AS C ON B.PO_NO  = C.PO_NO
						JOIN (SELECT * FROM [QIP].[dbo].[T_EXPORT] WHERE PO_NO='$po') AS D
						ON C.PO_NO=D.PO_NO
		
		");
		return $query->result_array();

	}


	public function detail_size($po){
		$query = $this->db->query("SELECT SIZE, SUM(LOT_QTY) AS TOTAL_QTY, SUM(ASM_END_QTY) AS ASSY_BALANCE FROM THPRODHIS WHERE PO_NO='$po'
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
							AND A.STATUS='WO' 
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
		// print_r($data);
		$db2 = $this->load->database('qip',TRUE);
		$insert = $db2->insert('T_EXPORT_IC', $data);
		return $insert;
		// print_r($data);
	}

	public function list_inspection(){
		$query = $this->db->query("select * from [QIP].[dbo].[T_INSPECTION] WHERE CONVERT(CHAR(8), INSPECT_DATE,112) = CONVERT(CHAR(8), GETDATE(),112)
		ORDER BY INSPECT_DATE DESC
		");
		return $query;

	}

	public function delete($id){
		return $this->db->query("DELETE FROM [QIP].[dbo].[T_INSPECTION] WHERE ID_INSPECTION = '$id'");
	}

	public function input_schedule_ppic(){
		$sdd = $this->input->post('sdd1');
		$factory = $this->input->post('factory1');
		$po_date = $this->input->post('po_date1');

		return $this->db->query("EXEC [QIP].[dbo].[INSPECT_PO_BALANCE_PPIC] @SDD='$sdd',  @FACTORY = '$factory', @PO_DATE='$po_date'");
		// echo ("EXEC [QIP].[dbo].[INSPECT_PO_BALANCE_PPIC]");
	}

	public function not_inspected_po(){
		return $this->db->query(" EXEC [QIP].[DBO].[AQL_PO_INSPECTED]");
	}

	public function update_po($id){
		return $this->db->query("INSERT INTO [QIP].[DBO].[T_INSPECTION](PO_NO, INSPECT_DATE) VALUES ('$id',GETDATE())");
	}

	public function inspect_all(){
		$tanggal = $this->input->post("tanggal");
		$query =  $this->db->query("
		CREATE TABLE #schedule_all (
			ART_NO NVARCHAR(25) NULL, 
			BALANCE_CRTON INT NULL, 
			COUNTRY VARCHAR(20) NULL, 
			CUST_NO VARCHAR(20) NULL, 
			DESTINATION VARCHAR(max) NULL, 
			FACTOR_CODE VARCHAR(2) NULL, 
			MODEL_NAME VARCHAR(MAX) NULL, 
			PO_NO VARCHAR(20) NULL,
			SDD VARCHAR(8) NULL, 
			INSPECT_DATE_INPUT VARCHAR(40) NULL, 
			LOAD_TYPE VARCHAR(max) NULL, 
			EXPORT_DATE VARCHAR(10) NULL, 
			CONTAINER VARCHAR(10) NULL, 
			STATUS_PO VARCHAR(15) NULL, 
			TOTAL_QTY INT NULL, 
			TOTAL_CARTON INT NULL, 
			STATUS_PO_AQL VARCHAR(15) NULL, 
			STATUS_PO2 VARCHAR(15) NULL ) 

				INSERT INTO #schedule_all
				EXEC [QIP].DBO.INSPECT_SCHEDULE_ALL @TANGGAL='$tanggal'

		");

		return $query;
		// echo $query;

	}

	public function inspect_all_view(){
		$query = $this->db->query("SELECT isnull(ART_NO,'') AS ART_NO,
		isnull(BALANCE_CRTON,'') AS BALANCE_CRTON,
		isnull(COUNTRY,'') AS COUNTRY,
		isnull(CUST_NO,'') AS CUST_NO,
		isnull(DESTINATION,'') AS DESTINATION,
		isnull(FACTOR_CODE,'') AS FACTOR_CODE,
		isnull(MODEL_NAME,'') MODEL_NAME,
		isnull(PO_NO,'') PO_NO,
		isnull(SDD,'') SDD,
		isnull(INSPECT_DATE_INPUT,'') INSPECT_DATE_INPUT,
		isnull(LOAD_TYPE,'') LOAD_TYPE,
		isnull(EXPORT_DATE,'') EXPORT_DATE,
		isnull(CONTAINER,'') CONTAINER,
		isnull(STATUS_PO,'') STATUS_PO,
		isnull(TOTAL_QTY,'') TOTAL_QTY,
		isnull(TOTAL_CARTON,'') TOTAL_CARTON,
		isnull(STATUS_PO_AQL,'') STATUS_PO_AQL,
		isnull(STATUS_PO2,'') STATUS_PO2
		FROM #schedule_all");

		return $query->result();
		// echo $query;
	}

	public function inspect_all_count(){
		$query = $this->db->query("
			SELECT	COUNT(CASE WHEN STATUS_PO2 ='RELEASE' OR STATUS_PO2 ='PASS' THEN 1 END) AS RELEASE,
			COUNT(CASE WHEN STATUS_PO2 ='REJECT' THEN 1 END) AS REJECT,
			COUNT(CASE WHEN STATUS_PO2 ='WAITING' THEN 1 END) AS WAITING,
			COUNT(CASE WHEN STATUS_PO2 ='PRODUCTION' THEN 1 END) AS PRODUCTION,
			COUNT(STATUS_PO2) AS TOTAL

			FROM #schedule_all
		");

		return $query->row();
		// echo $query;
	}

	public function drop_inspect_all(){
        $query = $this->db->query("DROP TABLE #schedule_all");

        return $query;
    }

	private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }

	public function importData() {
        $data = $this->_batchImport;
		
		$db2 = $this->load->database('qip',TRUE);
		$db2->insert_batch('T_INSPECTION', $data);
	}

	public function importDataMES() {
        $data = $this->_batchImport;
		
		$db2 = $this->load->database('qip',TRUE);
		$db2->insert_batch('MES_INSPECT', $data);
	}

	public function list_mes_inspect(){
		return $this->db->query("SELECT TOP 1000 * FROM [QIP].[DBO].[MES_INSPECT] ORDER BY LMNT_DTTM DESC ");
	}

	public function send_to_mes(){
		return $this->db->query("
		UPDATE  [meshs].[dbo].[THWHHIS] 
		SET 	
				[meshs].[dbo].[THWHHIS].INSPECTION = [QIP].[dbo].[MES_INSPECT].INSPECT_DATE
		FROM 		[meshs].[dbo].[THWHHIS] INNER JOIN [QIP].[dbo].[MES_INSPECT]
		ON [meshs].[dbo].[THWHHIS].PO_NO = [QIP].[dbo].[MES_INSPECT].PO_NO
		WHERE [QIP].[dbo].[MES_INSPECT].UPDATE_STATUS = 'N'
		AND [meshs].[dbo].[THWHHIS].INSPECTION IS NULL");
	}

	public function change_status(){
		return $this->db->query("UPDATE [QIP].[dbo].[MES_INSPECT]
		SET UPDATE_STATUS = 'Y'
		WHERE UPDATE_STATUS = 'N'
		");
	}
	
}
