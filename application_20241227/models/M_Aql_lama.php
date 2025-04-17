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
	var $column_search = array('PO_NO'); //set column field database for datatable searchable 
    var $table = '[QIP].[dbo].[QIP_AQL_PO_PARTIAL_INFO]';
    public function daily_summary($tgl){
        $query = $this->db->query("
        SELECT LEFT(H.CELL,1) AS FACTORY,SUBSTRING(INSPECTOR, 4, 20) as INSPECTOR_NAMA, CustomerOrderNumber,IC_NUMBER,COUNTRY, PO_NO, PARTIAL, PARTIAL_QTY,  MODEL_NAME, ARTICLE, LEVEL, QTY_INSPECT1, INSPECT_DATE,  QIP_LEVEL_ACC, QIP_LEVEL_REJECT, TOTAL_INSPECT, REJECT_QTY, PASS_YN, CELL, MaxList,
            CASE WHEN PASS_YN = 'Y' THEN 'RELEASE'
            ELSE 'REJECT'
            END AS STATUS_REPORT
            
            FROM 
            (
            SELECT F.PO_NO, F.PARTIAL, PARTIAL_QTY, IC_NUMBER, CustomerOrderNumber,MODEL_NAME, ARTICLE, LEVEL, QTY_INSPECT1, INSPECTOR,G.INSPECT_DATE,  QIP_LEVEL_ACC, QIP_LEVEL_REJECT, TOTAL_INSPECT, REJECT_QTY, PASS_YN, CELL, MaxList,Country 
			FROM (
            SELECT PO_NO, PARTIAL, IC_NUMBER, CONFIRM_INSPECTOR_DTTM, CONFIRM_INSPECTOR FROM AQL_PO_REPORT_CONFIRM WITH (NOLOCK)
            WHERE CONFIRM_INSPECTOR='Y'
            ) AS F 
            JOIN 
            (	SELECT A.*, B.QIP_LEVEL_SAMPLE_INSPECTION, B.QIP_LEVEL_FROM_QTY, B.QIP_LEVEL_TO_QTY,B.QIP_LEVEL_ACC, B.QIP_LEVEL_REJECT FROM
                (
                SELECT PO_NO , PARTIAL_QTY, PARTIAL, MODEL_NAME, ARTICLE, LEVEL, SUM(QTY_INSPECT) AS QTY_INSPECT1, INSPECT_DATE, INSPECTOR
                    FROM	QIP_AQL_DATA_FIRST WITH (NOLOCK)
					WHERE INSPECT_DATE='$tgl'
                    GROUP BY PARTIAL,PARTIAL_QTY,MODEL_NAME, ARTICLE, PO_NO, LEVEL, INSPECT_DATE, INSPECTOR
                ) AS A
                JOIN QIP_AQL_LEVEL_INFO AS B WITH (NOLOCK)
                ON A.LEVEL=B.QIP_LEVEL AND A.PARTIAL_QTY>=B.QIP_LEVEL_FROM_QTY AND A.PARTIAL_QTY<=B.QIP_LEVEL_TO_QTY
				
            ) AS G ON F.PO_NO=G.PO_NO AND F.PARTIAL=G.PARTIAL
            LEFT JOIN 
            (
                SELECT DISTINCT PO_NO, PARTIAL,TOTAL_INSPECT, REJECT_QTY, PASS_YN, INSPECT_DATE
                FROM QIP_AQL_DATA_SECONDE WITH (NOLOCK)
                
                GROUP BY PO_NO, PARTIAL,TOTAL_INSPECT, INSPECT_DATE,REJECT_QTY, PASS_YN
            ) AS C 
            ON G.PO_NO=C.PO_NO AND G.PARTIAL=C.PARTIAL
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
                FROM	THSHIPMARKINFO AS T WITH (NOLOCK) 
				JOIN THPRODHISPO AS P WITH (NOLOCK) 
				ON T.PO_number = P.PO_NO
            ) AS E
            ON F.PO_NO=E.PO_number
          ) AS H  
			GROUP BY PO_NO, PARTIAL, PARTIAL_QTY, CustomerOrderNumber, IC_NUMBER,MODEL_NAME, ARTICLE, LEVEL, QTY_INSPECT1, COUNTRY,INSPECTOR, INSPECT_DATE,  QIP_LEVEL_ACC, QIP_LEVEL_REJECT, TOTAL_INSPECT, REJECT_QTY, PASS_YN, CELL, MaxList,Country
			ORDER BY INSPECT_DATE");
        return $query;

    }

    public function monthly_summary($month){
        // $query = $this->db->query
        $query = ("
        SELECT left(H.CELL,1) AS FACTORY,SUBSTRING(INSPECTOR, 4, 20) as INSPECTOR_NAMA, CustomerOrderNumber,IC_NUMBER,COUNTRY, PO_NO, PARTIAL, PARTIAL_QTY,  MODEL_NAME, ARTICLE, LEVEL, QTY_INSPECT1, INSPECT_DATE,  QIP_LEVEL_ACC, QIP_LEVEL_REJECT, TOTAL_INSPECT, REJECT_QTY, PASS_YN, CELL, MaxList,
            CASE WHEN PASS_YN = 'Y' THEN 'RELEASE'
            ELSE 'REJECT'
            END AS STATUS_REPORT
            INTO #TEMP_MONTHLY_INSPECT
            FROM 
            (
            SELECT F.PO_NO, F.PARTIAL, PARTIAL_QTY, IC_NUMBER ,MODEL_NAME, ARTICLE, LEVEL, CustomerOrderNumber,QTY_INSPECT1, INSPECTOR,G.INSPECT_DATE,  QIP_LEVEL_ACC, QIP_LEVEL_REJECT, TOTAL_INSPECT, REJECT_QTY, PASS_YN, CELL, MaxList,Country 
			FROM (
            SELECT PO_NO, PARTIAL, IC_NUMBER, CONFIRM_INSPECTOR_DTTM, CONFIRM_INSPECTOR FROM AQL_PO_REPORT_CONFIRM WITH (NOLOCK)
            WHERE CONFIRM_INSPECTOR='Y'
            ) AS F 
            JOIN 
            (	SELECT A.*, B.QIP_LEVEL_SAMPLE_INSPECTION, B.QIP_LEVEL_FROM_QTY, B.QIP_LEVEL_TO_QTY,B.QIP_LEVEL_ACC, B.QIP_LEVEL_REJECT FROM
                (
                SELECT PO_NO , PARTIAL_QTY, PARTIAL, MODEL_NAME, ARTICLE, LEVEL, SUM(QTY_INSPECT) AS QTY_INSPECT1, INSPECT_DATE, INSPECTOR
                    FROM	QIP_AQL_DATA_FIRST WITH (NOLOCK)
					WHERE LEFT(INSPECT_DATE,7)='$month'
                    GROUP BY PARTIAL,PARTIAL_QTY,MODEL_NAME, ARTICLE, PO_NO, LEVEL, INSPECT_DATE, INSPECTOR
                ) AS A
                JOIN QIP_AQL_LEVEL_INFO AS B WITH (NOLOCK)
                ON A.LEVEL=B.QIP_LEVEL AND A.PARTIAL_QTY>=B.QIP_LEVEL_FROM_QTY AND A.PARTIAL_QTY<=B.QIP_LEVEL_TO_QTY
				
            ) AS G ON F.PO_NO=G.PO_NO AND F.PARTIAL=G.PARTIAL
            LEFT JOIN 
            (
                SELECT DISTINCT PO_NO, PARTIAL,TOTAL_INSPECT, REJECT_QTY, PASS_YN, INSPECT_DATE
                FROM QIP_AQL_DATA_SECONDE WITH (NOLOCK)
                
                GROUP BY PO_NO, PARTIAL,TOTAL_INSPECT, INSPECT_DATE,REJECT_QTY, PASS_YN
            ) AS C 
            ON G.PO_NO=C.PO_NO AND G.PARTIAL=C.PARTIAL
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
                FROM	THSHIPMARKINFO AS T WITH (NOLOCK) 
				JOIN THPRODHISPO AS P WITH (NOLOCK) 
				ON T.PO_number = P.PO_NO
                
            ) AS E
            ON F.PO_NO=E.PO_number
          ) AS H  
			GROUP BY PO_NO, PARTIAL, PARTIAL_QTY, IC_NUMBER, CustomerOrderNumber,MODEL_NAME, ARTICLE, LEVEL, QTY_INSPECT1, COUNTRY,INSPECTOR, INSPECT_DATE,  QIP_LEVEL_ACC, QIP_LEVEL_REJECT, TOTAL_INSPECT, REJECT_QTY, PASS_YN, CELL, MaxList,Country
			ORDER BY INSPECT_DATE
			
        ");//->result_array();
        //return $query;
        echo $query;
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
        SELECT TOP 10 J.CODE, CODE_NAME,SUM(I.QTY) AS QTY_DEFECT FROM(
			SELECT G.* FROM (
            SELECT PO_NO, PARTIAL, IC_NUMBER, CONFIRM_INSPECTOR_DTTM, CONFIRM_INSPECTOR FROM AQL_PO_REPORT_CONFIRM WITH (NOLOCK)
            WHERE CONFIRM_INSPECTOR='Y'
            AND CONVERT(CHAR(7),CONFIRM_INSPECTOR_DTTM,126)='$month'
            ) AS F 
            LEFT JOIN 
            (	SELECT PO_NO, PARTIAL, CODE_1, CODE_2, SUM(QTY) AS QTY FROM QIP_AQL_DATA_SECONDE GROUP BY PO_NO, PARTIAL, CODE_1, CODE_2
            ) AS G ON F.PO_NO=G.PO_NO AND F.PARTIAL=G.PARTIAL) AS I
			JOIN QIP_AQL_REJECT_CODE AS J WITH (NOLOCK)
			ON I.CODE_1=J.CODE AND I.CODE_2=J.REJECT_CODE
			GROUP BY  J.CODE, CODE_NAME
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
            SELECT PO_NO, PARTIAL, IC_NUMBER, CONFIRM_INSPECTOR_DTTM, CONFIRM_INSPECTOR FROM AQL_PO_REPORT_CONFIRM WITH (NOLOCK)
            WHERE CONFIRM_INSPECTOR='Y'
            AND CONVERT(CHAR(7),CONFIRM_INSPECTOR_DTTM,126)='$month'
            ) AS F 
            LEFT JOIN 
            (	SELECT PO_NO, PARTIAL, CODE_1, CODE_2, SUM(QTY) AS QTY FROM QIP_AQL_DATA_SECONDE WITH (NOLOCK) GROUP BY PO_NO, PARTIAL, CODE_1, CODE_2
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
            SELECT PO_NO, PARTIAL, IC_NUMBER, CONFIRM_INSPECTOR_DTTM, CONFIRM_INSPECTOR FROM AQL_PO_REPORT_CONFIRM WITH (NOLOCK)
            WHERE CONFIRM_INSPECTOR='Y'
            AND CONVERT(CHAR(10),CONFIRM_INSPECTOR_DTTM,126) BETWEEN '$start_date' AND '$end_date'
            ) AS F 
            LEFT JOIN 
            (	SELECT PO_NO, PARTIAL, CODE_1, CODE_2, SUM(QTY) AS QTY FROM QIP_AQL_DATA_SECONDE WITH (NOLOCK) GROUP BY PO_NO, PARTIAL, CODE_1, CODE_2
            ) AS G ON F.PO_NO=G.PO_NO AND F.PARTIAL=G.PARTIAL) AS I
            JOIN QIP_AQL_REJECT_CODE AS J
            ON I.CODE_1=J.CODE AND I.CODE_2=J.REJECT_CODE
            GROUP BY  J.CODE, CODE_NAME,REJECT_CODE_NAME
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
            SELECT INSPECTOR, SUBSTRING(INSPECTOR, 4, 20) as INSPECTOR_NAMA, CONVERT(NUMERIC, QTY_INSPECT) AS QTY FROM 
            (
            SELECT INSPECTOR, SUM(CONVERT(NUMERIC,QTY_INSPECT)) AS QTY_INSPECT FROM QIP_AQL_DATA_FIRST WITH (NOLOCK)
            WHERE	LEFT(INSPECT_DATE,7) = '$month' 
            GROUP BY INSPECTOR
            )
            AS A
            ORDER BY CONVERT(NUMERIC, QTY_INSPECT) DESC
            "
        )->result_array();
        return $query;
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function get_data_po($po){
        $query = $this->db->query("
        SELECT DISTINCT W1.VBELN 
				, PRDHAT AS STYLE 
				, MATNR AS ARTICLE
				, W1.ZHSDD AS SDD 
				, ZHPODD AS SHIP_DATE 
				, W1.VDATU AS  SHIP_OUT 
				, J_3APGNR
				, W1.BSTKD AS CUSTNO
				, W2.LANDT AS DUST 
				, CONVERT( INT, KWMENG) AS KWMENG
				--, (SELECT TOTAL_QTY FROM THPRODHISPO WHERE PO_NO = '$po') AS KWMENG
				, (SELECT COUNT(*) FROM THWHSM01 WITH(NOLOCK) WHERE PO_NO = '$po') - (SELECT COUNT(*) FROM THWHLOG WITH(NOLOCK) WHERE PO_NO = '$po' AND STATUS = 'WI') AS CARTON_BALANCE
				, W3.INSPECTOR 
				, W3.[LEVEL] 
				, CONVERT(NVARCHAR(10) , W3.INSPECT_DATE , 120) AS INSPECT_DATE 
				, W3.FGT
			FROM	(
						SELECT W1.VBELN
								, W1.PRDHAT
								, W1.MATNR
								, W1.ZHSDD
								, W1.ZHPODD
								, W1.VDATU
								, W1.J_3APGNR
								, W1.BSTKD
								, W1.KWMENG
						FROM	(
									SELECT	ROW_NUMBER() OVER (PARTITION BY W1.VBELN ORDER BY MAX(W1.ZIF_NO) DESC  ) AS ROW_NUM
											, W1.VBELN
											, W1.PRDHAT
											, W1.MATNR
											, W1.ZHSDD
											, W1.ZHPODD
											, W1.VDATU
											, W1.J_3APGNR
											, W1.BSTKD
											, W1.KWMENG
									FROM	ZSD_IF_PO_SEND_MES_HEADER W1 WITH(NOLOCK)  
									--where VBELN = '$po'
									GROUP	BY W1.VBELN, W1.PRDHAT, W1.MATNR, W1.ZHSDD, W1.ZHPODD, W1.VDATU, W1.J_3APGNR, W1.BSTKD, W1.KWMENG
								)W1
						WHERE ROW_NUM = 1
					) W1
				INNER JOIN ZSD_IF_PO_PACKING_SEND_MES_HEADER W2 WITH(NOLOCK) ON W1.VBELN = W2.VBELN
				LEFT OUTER  JOIN QIP_AQL_DATA_FIRST W3 WITH(NOLOCK) ON W1.VBELN = W3.PO_NO --AND W3.PARTIAL = @PARAM_PARTIAL
			
			WHERE W1.VBELN = '$po'
        ");
        return $query;
    }

    public function insert_partial($data) 
	{
		$db2 = $this->load->database('qip',TRUE);
		$insert = $db2->insert('QIP_AQL_PO_PARTIAL_INFO', $data);
		return $insert; 
    }


    
    public function _list_partial()
    {
        
        // if($this->input->post('PO_NO')){
        //     $this->db->where('PO_NO', $this->input->post('PO_NO'));
        // }
        $this->db->from($this->table);
            
    }
    
    public function list_partial($po){
        $query = $this->db->query("
        SELECT * FROM [QIP].[dbo].[QIP_AQL_PO_PARTIAL_INFO] WHERE PO_NO='$po'
       ");
        return $query->result();
    }

    public function inspector_list(){
        $query = $this->db->query("SELECT USERNAME FROM AQL_USER
        WHERE USER_YN='Y'
        AND AUTHORITY='INSPECTOR'
        AND SYSTEM_USED IN ('AQL','AQL|BA')");
        return $query->result_array();
    }

    function update_partial(){
        $QTY=$this->input->post('QTY');
        $level=$this->input->post('level');
        $inspector=$this->input->post('Inspector');
        $date=$this->input->post('Inspect_date');
        $PO_NO=$this->input->post('PO_NO');
        $partial=$this->input->post('PARTIAL');
        
        $query = $this->db->query("UPDATE [QIP].[dbo].[QIP_AQL_PO_PARTIAL_INFO]
            SET QTY='$QTY',
                LEVEL = '$level',
                INSPECTOR = '$inspector',
                INSPECT_DATE = '$date'
            WHERE PO_NO = '$PO_NO'
            AND PARTIAL='$partial'
        ");
        return $query;
    }

    public function aql_report_basic_info($po, $partial,$remark, $level){
        $query = $this->db->query("EXECUTE [QIP].[dbo].[SP_AQL_REPORT_BASIC_INFO] @PARAM_PO='$po', @PARAM_PARTIAL='$partial', @PARAM_REMARK = '$remark', @PARAM_LEVEL='$level'");
        return $query->row();
        // echo $query;
    }

    public function detail_reject_code(){
        $id = $this->input->post('code_id');
        $query = $this->db->query("SELECT * FROM [QIP].[dbo].QIP_AQL_REJECT_CODE WHERE CODE='$id'");
        return $query->result();
    }

    public function input_reject(){
       $PO_NO       = $this->input->post('PO_NO');
       $PARTIAL     = $this->input->post('PARTIAL');
       $LEVEL       = $this->input->post('LEVEL');
       $REMARK      = $this->input->post('REMARK');
       $CODE        = $this->input->post('CODE');
       $REJECT_CODE = $this->input->post('REJECT_CODE');
       
       $query       = $this->db->query("EXEC	[QIP].[dbo].[AQL_INPUT_DEFECT]
                                        @PO_NO      = '$PO_NO',
                                        @PARTIAL    = '$PARTIAL',
                                        @LEVEL      = '$LEVEL',
                                        @REMARK     = '$REMARK',
                                        @CODE       ='$CODE',
                                        @REJECT_CODE= '$REJECT_CODE'");
        //$result=$this->db->insert('product',$data);
        return $query->result();
    }

    public function aql_carton_cek($po, $partial, $level, $remark){
        $query = $this->db->query("SELECT * FROM [QIP].[dbo].[QIP_AQL_DATA_FIRST] 
                                    WHERE PO_NO = '$po'
                                    AND PARTIAL = '$partial'
                                    AND REMARK	= '$remark'
                                    AND LEVEL	= '$level'");
        return $query->num_rows();
    }

    public function random_sudahsave($po, $partial){
        $query = $this->db->query("SELECT CARTON_NO, CARTON_QTY, SIZE, QTY_INSPECT 
                FROM QIP_AQL_DATA_FIRST WITH (NOLOCK) 
                WHERE PO_NO='$po' 
                AND PARTIAL='$partial'");
        return $query->result();
    }

    public function random_belumsave($po, $partial, $level, $remark){
        $query = $this->db->query("
                    exec [QIP].[dbo].[AQL_RANDOM] @PO_NO='$po', @PARTIAL='$partial', @LEVEL='$level',
                    @REMARK = '$remark'
        ");
        return $query->result();
        // echo $query;
    }

    public function delete_random(){
        $po=$this->input->post('PO');
        $partial=$this->input->post('partial');
        $size=$this->input->post('size');
        $remark=$this->input->post('remark');
        $query = $this->db->query("DELETE FROM [QIP].[dbo].[QIP_AQL_RANDOM_PO]
                                WHERE PO_NO= '$po'
                                AND PARTIAL = '$partial'
                                AND SIZE = '$size'
                                AND REMARK = '$remark'
         ");
        return $query;
        // echo $query;

    }

    public function edit_random(){
        $po=$this->input->post('PO');
        $partial=$this->input->post('partial');
        $size=$this->input->post('size');
        $remark=$this->input->post('remark');
        $ctn_qty=$this->input->post('ctn_qty');
        $ctn_no=$this->input->post('ctn_no');
        $qty=$this->input->post('qty');
        $query = ("UPDATE [QIP].[dbo].[QIP_AQL_RANDOM_PO]
                            SET CTN_QTY = '$ctn_qty',
                                CTN_NO = '$ctn_no',
                                QTY = '$qty'
                                WHERE PO_NO= '$po'
                                AND PARTIAL = '$partial'
                                AND SIZE = '$size'
                                AND REMARK = '$remark'
         ");
        echo $query;
    }

    public function save_batch($data){
        $db2 = $this->load->database('qip',TRUE);
        return $db2->insert_batch('QIP_AQL_RANDOM_PO', $data);
        // return $this->db->insert_batch('T_SKILL_MATRIX', $data);
    }

    function insert_data($po_edit, $partial_edit, $size_edit, $ctn_no_edit, $ctn_qty_edit, $qty_edit, $level_edit, $remark){
        // $db2 = $this->load->database('qip',TRUE);
        $data = $this->db->query("
            insert into [QIP].[dbo].[QIP_AQL_RANDOM_PO] values ('$po_edit', '$partial_edit', '$level_edit', '$ctn_no_edit', '$ctn_qty_edit','$size_edit', '$qty_edit',  '$remark')
        ");
        return $data;
    }

    public function save_first_data($po, $partial, $level, $remark){
        $query = $this->db->query("
            EXEC [QIP].[dbo].[AQL_SAVE_FIRST_DATA]  @PO_NO = '$po_no', @PARTIAL = '$partial', @LEVEL = '$level', @REMARK = '$remark'
        "
        );
     
        return $query;
    }

    public function report(){
        $query = $this->db->query("EXEC [QIP].dbo.[AQL_SHOW_REPORT_DATA1]");
        return $query;
    }

    public function report2(){
        $query = $this->db->query("EXEC [QIP].dbo.[AQL_SHOW_REPORT_DATA2]");

        return $query->row();
    }

    public function report3(){
        $query = $this->db->query("EXEC [QIP].dbo.[AQL_SHOW_REPORT_DATA3]");

        return $query->result_array();
    }

    public function code_reject(){
        $query = $this->db->query("SELECT DISTINCT(CODE) as CODE, CODE_NAME FROM [QIP].[dbo].[QIP_AQL_REJECT_CODE]
      
        ORDER BY CODE ");

        return $query;
    }

    public function confirm_inspector(){
        $PO_NO      = $this->input->post('PO_NO');
        $PARTIAL    = $this->input->post('PARTIAL');
        $REMARK     = $this->input->post('REMARK');
        $LEVEL      = $this->input->post('LEVEL');
        $USERID     = $this->input->post('INSPECTOR');
        $FLAG       = $this->input->post('FLAG');

        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_CONFIRM_INSPECT] @PO_NO='$PO_NO', @PARTIAL='$PARTIAL', @REMARK = '$REMARK', @LEVEL='$LEVEL', @FLAG='$FLAG', @USERID='$USERID'");

        return $query;
    }

}
