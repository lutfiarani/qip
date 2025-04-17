<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Aql extends CI_Model {

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
	
    
    public function daily_summary($tgl){
        $query = $this->db->query("
        exec [QIP].[dbo].AQL_DAILY_SUMMARY @INSPECT_DATE='$tgl'")->result_array();
        return $query;

    }
    
    public function monthly_summary($month){
        $query = $this->db->query("
        SELECT LEFT(H.CELL,1) AS FACTORY,INSPECTOR, CustomerOrderNumber,IC_NUMBER,COUNTRY, CAST(PO_NO as VARCHAR(10)) AS PO_NO, 
        PARTIAL, PARTIAL_QTY,  MODEL_NAME, ARTICLE, LEVEL,  INSPECT_DATE, QIP_LEVEL_MINOR_ACC, QIP_LEVEL_MINOR_REJ,
				QIP_LEVEL_MAJOR_ACC, QIP_LEVEL_MAJOR_REJ, QIP_LEVEL_CRITIC_ACC, QIP_LEVEL_CRITIC_REJ, QTY_INSPECT1, MINOR_REJ_DATA, MAJOR_REJ_DATA, CRITIC_REJ_DATA, CELL, MaxList,
            CASE WHEN INSPECT_RESULT = 'Y' THEN 'RELEASE'
            ELSE 'REJECT'
            END AS STATUS_REPORT
            INTO #TEMP_MONTHLY_INSPECT
            FROM 
            (
            SELECT F.PO_NO, F.PARTIAL, PARTIAL_QTY, IC_NUMBER, CustomerOrderNumber,MODEL_NAME, ARTICLE, F.LEVEL, QTY_INSPECT1, INSPECTOR,G.INSPECT_DATE, QIP_LEVEL_MINOR_ACC, QIP_LEVEL_MINOR_REJ,
				QIP_LEVEL_MAJOR_ACC, QIP_LEVEL_MAJOR_REJ, QIP_LEVEL_CRITIC_ACC, QIP_LEVEL_CRITIC_REJ, 
			QTY_INSPECT1 AS TOTAL_REJECT, MINOR_REJ_DATA, MAJOR_REJ_DATA, CRITIC_REJ_DATA , INSPECT_RESULT, CELL, MaxList,Country 
			FROM (
            SELECT PO_NO, PARTIAL, REMARK, LEVEL, LEVEL_USER,IC_NUMBER, CONFIRM_INSPECTOR_DTTM, CONFIRM_INSPECTOR FROM [QIP].[dbo].AQL_PO_REPORT_CONFIRM WITH (NOLOCK)
            WHERE CONFIRM_INSPECTOR='Y'
			AND LEVEL = 'II'
			AND LEVEL_USER='2'
            ) AS F 
            JOIN 
            (	SELECT A.*, B.QIP_LEVEL_SAMPLE_INSPECTION, B.QIP_LEVEL_FROM_QTY, B.QIP_LEVEL_TO_QTY,B.QIP_LEVEL_MINOR_ACC, QIP_LEVEL_MINOR_REJ,
				QIP_LEVEL_MAJOR_ACC, QIP_LEVEL_MAJOR_REJ, QIP_LEVEL_CRITIC_ACC, QIP_LEVEL_CRITIC_REJ FROM
                (
                SELECT PO_NO , PARTIAL_QTY, PARTIAL, LEVEL_USER, REMARK,MODEL_NAME, ARTICLE, LEVEL, SUM(QTY_INSPECT) AS QTY_INSPECT1, INSPECT_DATE, INSPECTOR
                    FROM	[QIP].[dbo].QIP_AQL_DATA_FIRST WITH (NOLOCK)
					WHERE	LEFT(INSPECT_DATE,6)='$month' 
					AND LEVEL = 'II'
					AND LEVEL_USER='2'
                    GROUP BY PARTIAL,PARTIAL_QTY,MODEL_NAME, LEVEL_USER, REMARK,ARTICLE, PO_NO, LEVEL, INSPECT_DATE, INSPECTOR
                ) AS A
                JOIN [QIP].[dbo].QIP_AQL_LEVEL_INFO AS B WITH (NOLOCK)
                ON A.LEVEL=B.QIP_LEVEL AND A.PARTIAL_QTY>=B.QIP_LEVEL_FROM_QTY AND A.PARTIAL_QTY<=B.QIP_LEVEL_TO_QTY
				
            ) AS G ON F.PO_NO=G.PO_NO AND F.PARTIAL=G.PARTIAL AND F.REMARK=G.REMARK AND F.LEVEL=G.LEVEL AND F.LEVEL_USER=G.LEVEL_USER
            LEFT JOIN 
            (
				SELECT PO_NO, PARTIAL, REMARK, LEVEL, LEVEL_USER, MINOR_REJ_DATA, MAJOR_REJ_DATA, CRITIC_REJ_DATA ,INSPECT_RESULT 
				FROM [QIP].[DBO].[QIP_AQL_DATA_LOG] WITH (NOLOCK)
				WHERE LEVEL = 'II'
					AND LEVEL_USER='2'
				
			) AS C 
            ON G.PO_NO=C.PO_NO AND G.PARTIAL=C.PARTIAL AND G.REMARK=C.REMARK AND G.LEVEL=C.LEVEL AND G.LEVEL_USER=C.LEVEL_USER
            LEFT JOIN 
            ( 
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
                    
            ) AS D
            ON F.PO_NO=D.PO_NO
            LEFT JOIN 
            (
                SELECT DISTINCT T.PO_number, T.COUNTRY, T.Ordered_Quantity , P.CustomerOrderNumber
                FROM	[MEShs].[dbo].THSHIPMARKINFO AS T WITH (NOLOCK) 
				JOIN [MEShs].[dbo].THPRODHISPO AS P WITH (NOLOCK) 
				ON T.PO_number = P.PO_NO
            ) AS E
            ON F.PO_NO=E.PO_number
          ) AS H  
			GROUP BY PO_NO, PARTIAL, PARTIAL_QTY, CustomerOrderNumber, IC_NUMBER,MODEL_NAME, ARTICLE, LEVEL, QTY_INSPECT1, COUNTRY,INSPECTOR, INSPECT_DATE, 
			QIP_LEVEL_MINOR_ACC, QIP_LEVEL_MINOR_REJ,
				QIP_LEVEL_MAJOR_ACC, QIP_LEVEL_MAJOR_REJ, QIP_LEVEL_CRITIC_ACC, QIP_LEVEL_CRITIC_REJ, QTY_INSPECT1, MAJOR_REJ_DATA, MINOR_REJ_DATA, CRITIC_REJ_DATA, INSPECT_RESULT, CELL, MaxList,Country
			ORDER BY INSPECT_DATE
			
        ")->result_array();
        return $query;
    }

    public function tampil_monthly_summary(){
        $query = $this->db->query("SELECT * FROM #TEMP_MONTHLY_INSPECT ORDER BY INSPECT_DATE")->result_array();
        return $query;
    }

    public function summary_inspection(){
        $query = $this->db->query("
        SELECT COUNT(PO_NO) AS TOTAL_PO, SUM(PARTIAL_QTY) AS TOTAL_QTY, SUM(QTY_INSPECT1) AS TOTAL_INSPECTED
        FROM
        (SELECT PO_NO, PARTIAL,PARTIAL_QTY,QTY_INSPECT1  FROM #TEMP_MONTHLY_INSPECT
        ) AS A")->row();
        return $query;
    }

    public function summary_defect($month){
        $query = $this->db->query("
                SELECT TOP 10 J.CODE, CODE_NAME, REJECT_CODE_NAME,SUM(I.QTY) AS QTY_DEFECT 
                --INTO #TEMP_DAILY_DEFECT
                FROM(
                SELECT G.* FROM (
                SELECT PO_NO, PARTIAL, REMARK,LEVEL, LEVEL_USER FROM [QIP].[dbo].QIP_AQL_DATA_LOG
                WHERE CONVERT(CHAR(6),LMNT_DTTM,112) ='$month'
                AND LEVEL='II'
				AND LEVEL_USER='2'
                ) AS F 
                LEFT JOIN 
                (	SELECT PO_NO, PARTIAL, LEVEL, REMARK, LEVEL_USER,CODE, REJECT_CODE, SUM(QTY) AS QTY FROM [QIP].[dbo].QIP_AQL_DATA_SECONDE 
                    WITH (NOLOCK) GROUP BY PO_NO, PARTIAL,LEVEL, REMARK, LEVEL_USER, CODE, REJECT_CODE
                ) AS G ON F.PO_NO=G.PO_NO AND F.PARTIAL=G.PARTIAL AND F.LEVEL=G.LEVEL AND F.LEVEL_USER=G.LEVEL_USER AND F.REMARK = G.REMARK) AS I
                JOIN [QIP].[DBO].QIP_AQL_REJECT_CODE AS J
                ON I.CODE=J.CODE AND I.REJECT_CODE=J.REJECT_CODE
                GROUP BY  J.CODE, CODE_NAME,REJECT_CODE_NAME
                ORDER BY QTY_DEFECT DESC")->result_array();

        return $query;
    }

    public function drop_monthly_summary(){
        $query = $this->db->query("DROP TABLE #TEMP_MONTHLY_INSPECT");
        return $query;
    }


    public function monthly_defect($month){
        $query= $this->db->query("
            SELECT J.CODE, CODE_NAME, REJECT_CODE_NAME,SUM(I.QTY) AS QTY 
            INTO #TEMP_MONTHLY_DEFECT
            FROM(
            SELECT G.* FROM (
            SELECT PO_NO, PARTIAL, IC_NUMBER, CONFIRM_INSPECTOR_DTTM, CONFIRM_INSPECTOR FROM [QIP].[dbo].AQL_PO_REPORT_CONFIRM WITH (NOLOCK)
            WHERE CONFIRM_INSPECTOR='Y'
            AND CONVERT(CHAR(7),CONFIRM_INSPECTOR_DTTM,126)='$month'
            AND LEVEL='II'
            AND LEVEL_USER='2'
            ) AS F 
            LEFT JOIN 
            (	SELECT PO_NO, PARTIAL, CODE_1, CODE_2, SUM(QTY) AS QTY FROM [QIP].[dbo].QIP_AQL_DATA_SECONDE WITH (NOLOCK) GROUP BY PO_NO, PARTIAL, CODE_1, CODE_2
            ) AS G ON F.PO_NO=G.PO_NO AND F.PARTIAL=G.PARTIAL) AS I
            JOIN QIP_AQL_REJECT_CODE AS J
            ON I.CODE_1=J.CODE AND I.CODE_2=J.REJECT_CODE
            GROUP BY  J.CODE, CODE_NAME,REJECT_CODE_NAME
        ")->result_array();
        return $query;
    }


    public function defect_by_date($start_date, $end_date){
        $query = $this->db->query("
                SELECT J.CODE, CODE_NAME, REJECT_CODE_NAME,SUM(I.QTY) AS QTY 
                INTO #TEMP_DAILY_DEFECT
                FROM(
                SELECT G.* FROM (
                SELECT PO_NO, PARTIAL, IC_NUMBER, CONFIRM_INSPECTOR_DTTM, CONFIRM_INSPECTOR 
                FROM [QIP].[dbo].AQL_PO_REPORT_CONFIRM WITH (NOLOCK)
                WHERE CONFIRM_INSPECTOR='Y'
                AND CONVERT(CHAR(10),CONFIRM_INSPECTOR_DTTM,126) BETWEEN '$start_date' AND '$end_date'
                AND LEVEL='II'
                AND LEVEL_USER='2'
                ) AS F 
                LEFT JOIN 
                (	SELECT PO_NO, PARTIAL, LEVEL, REMARK, LEVEL_USER,CODE, REJECT_CODE, SUM(QTY) AS QTY FROM [QIP].[dbo].QIP_AQL_DATA_SECONDE 
                    WITH (NOLOCK) GROUP BY PO_NO, PARTIAL,LEVEL, REMARK, LEVEL_USER, CODE, REJECT_CODE
                ) AS G ON F.PO_NO=G.PO_NO AND F.PARTIAL=G.PARTIAL) AS I
                JOIN [QIP].[DBO].QIP_AQL_REJECT_CODE AS J
                ON I.CODE=J.CODE AND I.REJECT_CODE=J.REJECT_CODE
                GROUP BY  J.CODE, CODE_NAME,REJECT_CODE_NAME

                SELECT CODE_NAME, REJECT_CODE_NAME, QTY, QTY/CONVERT(NUMERIC,QTY_SEMUA)*100 AS DEFECT FROM (
                SELECT *, (SELECT SUM(QTY) FROM #TEMP_DAILY_DEFECT) AS QTY_SEMUA FROM #TEMP_DAILY_DEFECT) AS A
                ORDER BY QTY DESC
        ")->result_array();
        return $query;
    }

    public function tampil_defect_by_date(){
        $query = $this->db->query("
        SELECT CODE_NAME, REJECT_CODE_NAME, QTY, QTY/CONVERT(NUMERIC,QTY_SEMUA)*100 AS DEFECT FROM (
			SELECT *, (SELECT SUM(QTY) FROM #TEMP_DAILY_DEFECT) AS QTY_SEMUA FROM #TEMP_DAILY_DEFECT) AS A
			ORDER BY QTY DESC
        "
         )->result_array();
         return $query;
    }

    public function hapus_defect_by_date(){
        $query = $this->db->query("DROP TABLE #TEMP_DAILY_DEFECT");
        return $query;
    }

    public function tampil_monthly_defect(){
        $query = $this->db->query("
        SELECT CODE_NAME, REJECT_CODE_NAME, QTY, QTY/CONVERT(NUMERIC,QTY_SEMUA)*100 AS DEFECT FROM (
			SELECT *, (SELECT SUM(QTY) FROM #TEMP_MONTHLY_DEFECT) AS QTY_SEMUA FROM #TEMP_MONTHLY_DEFECT) AS A
			ORDER BY QTY DESC
        "
         )->result_array();
         return $query;
    }

    public function hapus_monthly_defect(){
        $query = $this->db->query("DROP TABLE #TEMP_MONTHLY_DEFECT");
        return $query;
    }

    public function monthly_inspector($month){
        $query = $this->db->query("
           
			 SELECT INSPECTOR, CONVERT(NUMERIC, QTY_INSPECT) AS QTY FROM 
             (
             SELECT INSPECTOR, SUM(CONVERT(NUMERIC,QTY_INSPECT)) AS QTY_INSPECT FROM [QIP].[dbo].QIP_AQL_DATA_FIRST WITH (NOLOCK)
             WHERE	LEFT(INSPECT_DATE,6) = '$month' 
             AND INSPECTOR<>''
             AND LEVEL_USER='2'
             GROUP BY INSPECTOR
             )
             AS A
             ORDER BY CONVERT(NUMERIC, QTY_INSPECT) DESC
            "
        )->result_array();
        return $query;
    }

	
}
