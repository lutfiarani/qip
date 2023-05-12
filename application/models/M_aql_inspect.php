<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_aql_inspect extends CI_Model {

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
	
    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function get_data_po($po){
        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_GET_DATA_PO] @PO_NO='$po'");
        return $query;
    }

    public function insert_partial($data) 
	{
	      
        $PO  =$_POST['PO_NO'];
		$PARTIAL  = $_POST['PARTIAL']; //$_POST['PARTIAL'];
		$INSPECTOR = $this->session->userdata('USERNAME');
		$QTY = $_POST['QTY'];
		$LEVEL = $_POST['LEVEL'];
        $INSPECT_DATE = $_POST['INSPECT_DATE'];
        $LEVEL_USER = $this->session->userdata('LEVEL');
        $query = ("INSERT INTO [QIP].[dbo].QIP_AQL_PO_PARTIAL_INFO (PO_NO, PARTIAL, QTY, INSPECTOR, LEVEL, INSPECT_DATE, LEVEL_USER) 
                 VALUES ('$PO', '$PARTIAL', $QTY, '$INSPECTOR', '$LEVEL', $INSPECT_DATE, $LEVEL_USER)");
        echo $query;
       
    }


    
    public function _list_partial()
    {
      
        $this->db->from($this->table);
            
    }
    
    public function list_partial(){
        $po     = $this->input->post('PO_NO_');
        $level_user  = $this->session->userdata('LEVEL');
        
        $query  = $this->db->query("
     
        SELECT A.PO_NO, A.PARTIAL, QTY, A.INSPECTOR,INSPECT_DATE, BANYAK, INSPECT_RESULT,
                A. LEVEL, A.LEVEL_USER, '$level_user' AS LEVEL_NOW FROM [QIP].[dbo].[QIP_AQL_PO_PARTIAL_INFO] AS A WITH (NOLOCK) 
        LEFT JOIN (
            SELECT PO_NO,COUNT(PO_NO) AS BANYAK, PARTIAL, LEVEL, LEVEL_USER FROM [QIP].[dbo].[QIP_AQL_DATA_LOG] WITH (NOLOCK)
                WHERE PO_NO='$po' --AND LEVEL='II' AND LEVEL_USER='2'
                GROUP BY PO_NO, PARTIAL, LEVEL, LEVEL_USER
            ) AS B
            ON A.PO_NO=B.PO_NO
            AND A.PARTIAL=B.PARTIAL
			AND A.LEVEL = B.LEVEL
			AND A.LEVEL_USER = B.LEVEL_USER
            LEFT JOIN 
            (	
                SELECT A.PO_NO, A.PARTIAL, A.TANGGAL, A.LEVEL, A.LEVEL_USER,B.INSPECT_RESULT FROM 
                (
                    SELECT PO_NO,PARTIAL, LEVEL, LEVEL_USER,MAX(LMNT_DTTM) AS TANGGAL
                    FROM [QIP].[dbo].[QIP_AQL_DATA_LOG] WITH (NOLOCK) WHERE PO_NO='$po' --AND LEVEL='II' AND LEVEL_USER='2'
                    GROUP BY PO_NO, PARTIAL, LEVEL, LEVEL_USER
                ) AS A
                JOIN [QIP].[dbo].[QIP_AQL_DATA_LOG] AS B WITH (NOLOCK)
                ON A.TANGGAL=B.LMNT_DTTM
                AND A.PO_NO = B.PO_NO
                AND A.PARTIAL=B.PARTIAL
				AND A.LEVEL = B.LEVEL
				AND A.LEVEL_USER = B.LEVEL_USER
            ) AS C
            ON A.PO_NO = C.PO_NO
            AND A.PARTIAL = C.PARTIAL
			AND A.LEVEL = C.LEVEL
			AND A.LEVEL_USER = C.LEVEL_USER
            WHERE A.PO_NO='$po'
          --  AND A.LEVEL='II' AND A.LEVEL_USER='2'
		  ORDER BY PARTIAL,LEVEL, LEVEL_USER
            

       ");
        return $query->result();
        // echo $query;
    }

    public function view_detail_per_partial(){
        $PO_NO       = $this->input->post('PO_NO');
        $PARTIAL     = $this->input->post('PARTIAL');
        $level       = $this->input->post('level');
        $level_user  = $this->input->post('level_user');

        $query = $this->db->query("  SELECT DISTINCT(A.PO_NO), A.LEVEL, CONVERT(NUMERIC,A.REMARK) AS REMARK, A.PARTIAL, B.INSPECTOR, B.INSPECT_DATE, A.LEVEL_USER, 
                        CASE WHEN A.INSPECT_RESULT = 'N' THEN 'REJECTED' WHEN A.INSPECT_RESULT = 'Y' THEN 'RELEASE' END AS INSPECT_RESULT 
                        FROM [QIP].[dbo].[QIP_AQL_DATA_LOG] AS A  WITH (NOLOCK)
                        JOIN [QIP].[dbo].[QIP_AQL_DATA_FIRST] AS B  WITH (NOLOCK)
                        ON A.PO_NO = B.PO_NO
                        AND A.PARTIAL = B.PARTIAL 
                        AND A.LEVEL = B.LEVEL 
                        AND A.LEVEL_USER = B.LEVEL_USER 
                        AND A.REMARK = B.REMARK
       
                WHERE A.PO_NO='$PO_NO'
                AND A.PARTIAL='$PARTIAL'
                AND A.LEVEL = '$level'
                AND A.LEVEL_USER = '$level_user'");
        
        return $query->result();
        // echo $query;
                
    }

    public function inspector_list($level){
        $query = $this->db->query("SELECT USERNAME FROM [QIP].[dbo].AQL_USER WITH (NOLOCK)
                                    WHERE USER_YN='Y'
                                    AND LEVEL = '$level'");

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

    public function aql_report_basic_info($po, $partial,$remark, $level, $level_user){
        $query = $this->db->query("EXECUTE [QIP].[dbo].[AQL_REPORT_BASIC_INFO] @PARAM_PO='$po', @PARAM_PARTIAL='$partial', 
                                    @PARAM_REMARK = '$remark', @PARAM_LEVEL='$level', @LEVEL_USER = '$level_user'");
        return $query->row();
        // echo $query;
    }

    public function detail_reject_code(){
        $id = $this->input->post('code_id');
        $query = $this->db->query("SELECT * FROM [QIP].[dbo].QIP_AQL_REJECT_CODE WITH (NOLOCK) WHERE CODE='$id'");
        return $query->result();
    }

    public function input_reject($level_user){
       $PO_NO       = $this->input->post('PO_NO');
       $PARTIAL     = $this->input->post('PARTIAL');
       $LEVEL       = $this->input->post('LEVEL');
       $REMARK      = $this->input->post('REMARK');
       $CODE        = $this->input->post('CODE');
       $REJECT_CODE = $this->input->post('REJECT_CODE');
       $STATUS_CODE = $this->input->post('STATUS_CODE');
       
       $query       = $this->db->query("EXEC	[QIP].[dbo].[AQL_INPUT_DEFECT2]
                                        @PO_NO      = '$PO_NO',
                                        @PARTIAL    = '$PARTIAL',
                                        @LEVEL      = '$LEVEL',
                                        @REMARK     = '$REMARK',
                                        @CODE       = '$CODE',
                                        @REJECT_CODE= '$REJECT_CODE',
                                        @LEVEL_USER = '$level_user',
                                        @STATUS_CODE= '$STATUS_CODE'");
        //$result=$this->db->insert('product',$data);
        return $query;
    }

    public function view_defect(){
        $PO_NO       = $this->input->post('PO_NO');
        $PARTIAL     = $this->input->post('PARTIAL');
        $LEVEL       = $this->input->post('LEVEL');
        $REMARK      = $this->input->post('REMARK');
        $level_user  = $this->input->post('LEVEL_USER');

        $query = $this->db->query("
                    exec [QIP].[dbo].[AQL_VIEW_DEFECT]
                    @PO_NO      = '$PO_NO',
                    @PARTIAL    = '$PARTIAL',
                    @LEVEL      = '$LEVEL',
                    @REMARK     = '$REMARK',
                    @LEVEL_USER = '$level_user'
                   
        ");

        return $query->result();
    }


    public function delete_defect(){
        $PO_NO       = $this->input->post('PO_NO');
        $PARTIAL     = $this->input->post('PARTIAL');
        $LEVEL       = $this->input->post('LEVEL');
        $REMARK      = $this->input->post('REMARK');
        $LEVEL_USER  = $this->input->post('LEVEL_USER');
        $CODE        = $this->input->post('CODE');
        $REJECT_CODE = $this->input->post('REJECT_CODE');
        
//  $query = ("
        $query = $this->db->query("DELETE TOP (1) FROM [QIP].[dbo].QIP_AQL_PO_DEFECT
                 WHERE PO_NO = '$PO_NO'
                 AND PARTIAL = '$PARTIAL'
                 AND LEVEL = '$LEVEL'
                 AND REMARK = '$REMARK'
                 AND LEVEL_USER = '$LEVEL_USER'
                 AND CODE = '$CODE'
                 AND REJECT_CODE = '$REJECT_CODE'
          ");

        // echo $query;
        return $query;
    }

    public function aql_carton_cek($po, $partial, $level){
        $query = $this->db->query("SELECT * FROM [QIP].[dbo].[QIP_AQL_DATA_FIRST] WITH (NOLOCK)
                                    WHERE PO_NO = '$po'
                                    AND PARTIAL = '$partial'
                                  
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

    public function random_belumsave(){
        $query = $this->db->query("
                   
                    exec [QIP].[dbo].[AQL_RANDOM] @PO_NO='0131057532', @PARTIAL='1', @LEVEL='II'
                   
        ");
        return $query->result();
        // echo $query;
    }

    public function delete_random(){
        $po     =$this->input->post('PO');
        $partial=$this->input->post('partial');
        $size   =$this->input->post('size');

        $query = ("DELETE FROM [QIP].[dbo].[QIP_AQL_RANDOM_PO]
                                WHERE PO_NO= '$po'
                                AND PARTIAL = '$partial'
                                AND SIZE = '$size'
         ");

        // return $query;
        echo $query;

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

        

        // print_r($data);
    }

    function insert_data($po_edit, $partial_edit, $size_edit, $ctn_no_edit, $ctn_qty_edit, $qty_edit, $level_edit, $remark){
        // $db2 = $this->load->database('qip',TRUE);
        $data = $this->db->query("
            insert into [QIP].[dbo].[QIP_AQL_RANDOM_PO] values ('$po_edit', '$partial_edit', '$level_edit', '$ctn_no_edit', '$ctn_qty_edit','$size_edit', '$qty_edit',  '$remark')
        ");
        return $data;
    }

    public function save_first_data($po_no, $partial, $level, $level_user, $INSPECTOR){
        $query = $this->db->query("
            EXEC [QIP].[dbo].[AQL_SAVE_FIRST_DATA2]  @PO_NO = '$po_no', @PARTIAL = '$partial', @LEVEL = '$level',
            @LEVEL_USER = '$level_user', @INSPECTOR='$INSPECTOR'
        "
        );
     
        return $query;
        // echo $query;
    }

    public function cek_second_data($po, $partial, $level, $remark, $level_user){
        $query = $this->db->query("SELECT * FROM [QIP].[dbo].[QIP_AQL_DATA_SECONDE] WITH (NOLOCK)
                                        WHERE PO_NO='$po' 
                                        AND PARTIAL = '$partial'
                                        AND LEVEL = '$level'
                                        AND REMARK = '$remark'
                                        AND LEVEL_USER = '$level_user'
                                        ");
        return $query;
    }
    public function save_second_data($po_no, $partial, $level, $remark, $level_user){
        $query = $this->db->query("
            EXEC [QIP].[dbo].[AQL_SAVE_SECOND_DATA]  @PO_NO = '$po_no', @PARTIAL = '$partial',
            @LEVEL = '$level', @REMARK = '$remark', @LEVEL_USER = '$level_user'
        "
        );
        return $query;
    }

    public function report($po, $partial, $remark, $level, $level_user){
        $query = $this->db->query("EXEC [QIP].dbo.[AQL_SHOW_REPORT_DATA1] @PO_NO = '$po', @PARTIAL = '$partial', 
                                    @REMARK = '$remark', @LEVEL = '$level', @LEVEL_USER = '$level_user'");
        // print_r($query->result_array);
        // echo $query;
        return $query;
    }


    public function report1($po, $partial, $remark, $level, $level_user){
        $query = $this->db->query("EXEC [QIP].dbo.[AQL_SHOW_REPORT_DATA1] @PO_NO = '$po', @PARTIAL = '$partial',
                                     @REMARK = '$remark', @LEVEL = '$level' , @LEVEL_USER = '$level_user'");
        // print_r($query->result_array);
        // echo $query;
        return $query;
    }

    public function report2($po, $partial, $remark, $level, $level_user, $level_user2){
        $query = $this->db->query("EXEC [QIP].dbo.[AQL_SHOW_REPORT_DATA2] @PO_NO = '$po', @PARTIAL = '$partial', 
                                    @REMARK = '$remark', @LEVEL = '$level' , @LEVEL_USER = '$level_user',
                                    @LEVEL_USER2 = '$level_user2'");

        return $query->row();
        // echo $query;
    }

    public function report3($po, $partial, $remark, $level, $level_user){
        $query = $this->db->query("EXEC [QIP].dbo.[AQL_SHOW_REPORT_DATA3] @PO_NO = '$po', @PARTIAL = '$partial', 
                                    @REMARK = '$remark', @LEVEL = '$level', @LEVEL_USER = '$level_user'");

        return $query->result();
        // echo $query;
    }

    public function code_reject(){
        $query = $this->db->query("SELECT DISTINCT(CODE) as CODE, CODE_NAME FROM [QIP].[dbo].[QIP_AQL_REJECT_CODE] WITH (NOLOCK)
                                    ORDER BY CODE ");

        return $query;
    }

    public function confirm_inspector($PO_NO, $PARTIAL, $REMARK, $LEVEL, $USERID, $LEVEL_USER, $FLAG, $COMMENT, $LEVEL_U){
        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_CONFIRM_INSPECT] @PO_NO='$PO_NO', @PARTIAL='$PARTIAL', 
                                    @REMARK = '$REMARK', @LEVEL='$LEVEL', @USERID='$USERID'
                                    , @LEVEL_USER = '$LEVEL_USER', @FLAG = '$FLAG', @COMMENT = '$COMMENT', @LEVEL_U = '$LEVEL_U'
                                    ");
        // $query = ("EXEC [QIP].[dbo].[AQL_CONFIRM_INSPECT] @PO_NO='$PO_NO', @PARTIAL='$PARTIAL', 
        // @REMARK = '$REMARK', @LEVEL='$LEVEL', @USERID='$USERID'
        // , @LEVEL_USER = '$LEVEL_USER', @FLAG = '$FLAG', @COMMENT = '$COMMENT'");
        return $query;
        // echo $query;
    }

    public function confirm_inspector_repre($PO_NO, $PARTIAL, $REMARK, $LEVEL, $USERID, $LEVEL_USER, $FLAG, $LEVEL_U){
        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_CONFIRM_INSPECT_REPRE] @PO_NO='$PO_NO', @PARTIAL='$PARTIAL', 
                                    @REMARK = '$REMARK', @LEVEL='$LEVEL', @USERID='$USERID'
                                    , @LEVEL_USER = '$LEVEL_USER', @FLAG = '$FLAG', @LEVEL_U = '$LEVEL_U'
                                    ");
        // $query = ("EXEC [QIP].[dbo].[AQL_CONFIRM_INSPECT_REPRE] @PO_NO='$PO_NO', @PARTIAL='$PARTIAL', 
        // @REMARK = '$REMARK', @LEVEL='$LEVEL', @USERID='$USERID'
        // , @LEVEL_USER = '$LEVEL_USER', @FLAG = '$FLAG'");
        return $query;
        // echo $query;
    }

    public function input_id_qc($PO_NO, $PARTIAL, $REMARK, $LEVEL, $LEVEL_USER, $ID_QC){
       $query = $this->db->query("EXEC [QIP].[dbo].[AQL_INSERT_ID_QC] @PO_NO='$PO_NO', @PARTIAL='$PARTIAL', 
                                    @REMARK = '$REMARK', @LEVEL='$LEVEL'
                                    , @LEVEL_USER = '$LEVEL_USER',@ID_QC = '$ID_QC'
                                    ");

        return $query;
        // echo $query;
    }

    

    public function inspect_list($flag){
        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_INSPECTION_LIST] @PARAM_FLAG='$flag'");

        return $query;
    }


    public function ic_view($po, $partial, $remark, $level, $level_user){
        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_IC_DATA] @PO_NO='$po', @PARTIAL='$partial', 
                                    @REMARK = '$remark', @LEVEL='$level', @LEVEL_USER = '$level_user'");
        
        return $query->row_array();
    }

    public function daily_report(){
        
       $query = $this->db->query("EXEC [QIP].[dbo].[AQL_DAILY_REPORT_INSPECTOR]");
        // $query = ("EXEC [QIP].[dbo].[AQL_DAILY_REPORT_INSPECTOR] $start_date, $end_date");

        return $query;
        // echo $query;
    }

    public function monthly_report(){
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");

        // $query = $this->db->query("EXEC [QIP].[dbo].[AQL_MONTHLY_REPORT_INSPECTOR]");
        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_MONTHLY_REPORT_INSPECTOR] @start_date = '$start_date', @end_date='$end_date'");
        return $query;
        // echo $query;
    }

    public function monthly_third(){
        $start_date = $this->input->post("start_date");
        // $end_date = $this->input->post("end_date");

        // $query = $this->db->query("EXEC [QIP].[dbo].[AQL_MONTHLY_REPORT_INSPECTOR]");
        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_MONTHLY_REPORT_THIRD_PARTY] @start_date = '$start_date'");
        return $query;
        // echo $query;
    }

    public function summary_aql(){
        $query = $this->db->query("EXEC [QIP].dbo.[AQL_SUMMARY_AQL]");
        return $query->row_array();
    }

    public function edit_carton(){
        $query = $this->db->query("
            SELECT PO_NO, PARTIAL, LEVEL, REMARK, CARTON_NO, CARTON_QTY, SIZE, QTY_INSPECT  FROM [QIP].[dbo].QIP_AQL_DATA_FIRST WITH (NOLOCK)
            WHERE LEVEL_USER='2'
            AND CONVERT(CHAR(6), LMNT_DTTM,112) = CONVERT(CHAR(6), GETDATE(), 112)
            ORDER BY PO_NO, PARTIAL
        ");
        return $query;

    }

    public function edit_carton_(){
        $PO = $this->input->post('PO_NO');
        $PARTIAL = $this->input->post('PARTIAL');
        $REMARK = $this->input->post('REMARK');
        // $LEVEL = $this->input->post('LEVEL');
        $size = $this->input->post('size');
        $ctn_no = $this->input->post('ctn_no');
        $ctn_qty = $this->input->post('ctn_qty');
        $qty = $this->input->post('qty');
        
        $query = $this->db->query("
            UPDATE [QIP].[dbo].QIP_AQL_DATA_FIRST
            SET CARTON_QTY = '$ctn_qty',
                CARTON_NO = '$ctn_no',
                QTY_INSPECT = '$qty'
            WHERE PO_NO ='$PO'
            AND LEVEL_USER='2'
            AND SIZE='$size'
            AND PARTIAL = '$PARTIAL'
            AND LEVEL = 'II'
            AND REMARK = '$REMARK'
            
        ");
        return $query;
        // echo $query;
        
    }

    public function view_detail_po(){
        $po = $this->input->post('PO_NO');
        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_VIEW_DETAIL_INSPECT_PO] @PO_NO = '$po'");

        return $query->result();
        // echo $query;

    }

    public function view_id_qc(){
        $query = $this->db->query("SELECT ID, NIK FROM [QIP].[dbo].AQL_QIP_USER WITH (NOLOCK)");

        return $query->result_array();
    }

    public function po_reject_byname(){
        $TANGGAL = $this->input->post('tanggal');
        
        if ($TANGGAL){
            $query = $this->db->query("EXEC [QIP].[DBO].AQL_PO_REJECT_BY_NAME @TANGGAL='$TANGGAL'");
        }else{
            $query = $this->db->query("EXEC [QIP].[DBO].AQL_PO_REJECT_BY_NAME @TANGGAL=''");
        }
        

        return $query;
    }

    public function cell(){
        $query = $this->db->query("SELECT LEFT(CELL_CODE,1)+RIGHT(CELL_CODE,2) AS CELL FROM TMCELL WITH (NOLOCK)
        WHERE USE_FLAG='Y'
        AND FACTORY<>'L1'
        ORDER BY FACTORY, CELL_CODE");
        return $query;
    }

    public function po_reject_byfactory(){
        $TANGGAL = $this->input->post('tanggal');
        if($TANGGAL){
            $query = $this->db->query("EXEC [QIP].[DBO].AQL_PO_REJECT_BY_FACTORY @TANGGAL='$TANGGAL'");
        }else{
            $query = $this->db->query("EXEC [QIP].[DBO].AQL_PO_REJECT_BY_FACTORY @TANGGAL=''");
        }
        

        return $query;
        // echo $query;
    }

    public function po_reject_all(){
        $TANGGAL = $this->input->post('tanggal');

        if($TANGGAL){
            $query = $this->db->query("EXEC [QIP].[DBO].AQL_PO_REJECT_SUMMARY @TANGGAL='$TANGGAL'");
        }else{
            $query = $this->db->query("EXEC [QIP].[DBO].AQL_PO_REJECT_SUMMARY @TANGGAL=''");
        }
        

        return $query;
    }

    public function po_reject_detail(){
        $cell = $this->input->post('CELL');
        $query = $this->db->query("EXEC [QIP].[DBO].AQL_PO_REJECT_DETAIL @CELL = '$cell'");

        return $query->result();

    }

    public function po_reject_summary($tanggal){
        // $cell = $this->input->post('CELL');
        $query = $this->db->query("EXEC [QIP].[DBO].AQL_PO_REJECT_DETAIL_ALL @TANGGAL = '$tanggal'");

        return $query;

    }

    public function packing_plan(){
        $str = $this->input->get('stra');

        // $arrayCode = array();
        // $rows = explode("\n", $str);
        // foreach($rows as $idx => $row)
        // {
        //     $row = explode( "\t", $row );
        //     foreach( $row as $field )
        //     {
        //         $arrayCode[$idx][] = $field;
        //     }
        // }
        // print_r( $arrayCode );


        $query=("$str");
        // $query = $this->db->query("EXEC [QIP].[DBO].AQL_PO_REJECT_SUMMARY @TANGGAL=''");
        // print_r( $query->result());  
        echo $query;

    }

    public function monthly_validator(){
        $tanggal    = $this->input->post('tanggal');
        $level      = $this->input->post('level');
        $level_user = $this->input->post('level_user');

        $query = $this->db->query("EXEC [QIP].[DBO].AQL_MONTHLY_REPORT_VALIDATION_YS @TANGGAL = '$tanggal', @LEVEL='$level', @LEVEL_USER = '$level_user'");

        return $query;
    }

    public function summary_third_fac($tanggal){
       
       
        $query = $this->db->query("EXEC [QIP].[DBO].AQL_MONTHLY_SUMMARY_THIRD_FAC @INSPECT_DATE = '$tanggal'");
        // echo $query;
        return $query;

    }

    public function summary_third_date($tanggal){
       
        $query = $this->db->query("EXEC [QIP].[DBO].AQL_MONTHLY_SUMMARY_THIRD_DATE @INSPECT_DATE = '$tanggal'");
        // echo $query;

        return $query;
    }

    public function summary_validation_total(){
        $tanggal = $this->input->post('tanggal');
        $level_user = $this->input->post('level_user');
        $level = $this->input->post('level');

        $query = $this->db->query("	SELECT COUNT(PO_NO) AS TOTAL_PO, SUM(TOTAL_QTY) AS TOTAL_QTY, SUM(QTY_INSPECT) AS QTY_INSPECT FROM(
            SELECT A.PO_NO, TOTAL_QTY, SUM(QTY_INSPECT) AS QTY_INSPECT FROM [QIP].[dbo].QIP_AQL_DATA_FIRST A 
			JOIN [QIP].[dbo].QIP_AQL_DATA_LOG B WITH (NOLOCK)
			ON A.PO_NO = B.PO_NO
			AND A.PARTIAL = B.PARTIAL
			AND A.LEVEL = B.LEVEL
			AND A.LEVEL_USER = B.LEVEL_USER
			AND A.REMARK = B.REMARK
            WHERE CONVERT(CHAR(6), A.LMNT_DTTM, 112) = '$tanggal'
            AND A.LEVEL = '$level'
            AND A.LEVEL_USER= '$level_user'
            GROUP BY A.PO_NO, TOTAL_QTY) AS A ");
        
        return $query->result();
    }

    public function summary_validation_defect(){
        $tanggal = $this->input->post('tanggal');
        $level_user = $this->input->post('level_user');
        $level = $this->input->post('level');

        $query   = $this->db->query(" SELECT TOP 10 J.CODE, CODE_NAME, REJECT_CODE_NAME,SUM(I.QTY) AS QTY_DEFECT 
        FROM(
        SELECT G.* FROM (
        SELECT PO_NO, PARTIAL, REMARK,LEVEL, LEVEL_USER FROM [QIP].[dbo].QIP_AQL_DATA_LOG WITH (NOLOCK)
        WHERE CONVERT(CHAR(6),LMNT_DTTM,112) ='$tanggal'
        AND LEVEL = '$level'
        AND LEVEL_USER= '$level_user'
        ) AS F 
        LEFT JOIN 
        (	SELECT PO_NO, PARTIAL, LEVEL, REMARK, LEVEL_USER,CODE, REJECT_CODE, SUM(QTY) AS QTY 
            FROM [QIP].[dbo].QIP_AQL_DATA_SECONDE WITH (NOLOCK) 
            GROUP BY PO_NO, PARTIAL,LEVEL, REMARK, LEVEL_USER, CODE, REJECT_CODE
        ) AS G ON F.PO_NO=G.PO_NO AND F.PARTIAL=G.PARTIAL AND F.LEVEL=G.LEVEL AND F.LEVEL_USER=G.LEVEL_USER AND F.REMARK = G.REMARK) AS I
        JOIN [QIP].[DBO].QIP_AQL_REJECT_CODE AS J WITH (NOLOCK)
        ON I.CODE=J.CODE AND I.REJECT_CODE=J.REJECT_CODE
        GROUP BY  J.CODE, CODE_NAME,REJECT_CODE_NAME
        ORDER BY QTY_DEFECT DESC");

        return $query->result();
        
    }

    public function summary_third_total(){
        $tanggal = $this->input->post('tanggal');
        $query = $this->db->query("	SELECT COUNT(PO_NO) AS TOTAL_PO, SUM(TOTAL_QTY) AS TOTAL_QTY, SUM(QTY_INSPECT) AS QTY_INSPECT FROM(
            SELECT A.PO_NO, TOTAL_QTY, SUM(QTY_INSPECT) AS QTY_INSPECT FROM [QIP].[dbo].QIP_AQL_DATA_FIRST A WITH (NOLOCK)
			JOIN [QIP].[dbo].QIP_AQL_DATA_LOG B WITH (NOLOCK)
			ON A.PO_NO = B.PO_NO
			AND A.PARTIAL = B.PARTIAL
			AND A.LEVEL = B.LEVEL
			AND A.LEVEL_USER = B.LEVEL_USER
			AND A.REMARK = B.REMARK
            WHERE CONVERT(CHAR(6), A.LMNT_DTTM, 112) = '$tanggal'
            AND A.LEVEL = 'II'
            AND A.LEVEL_USER= '3'
            GROUP BY A.PO_NO, TOTAL_QTY) AS A  ");
        
        return $query;
    }

    public function summary_third_defect(){
        $tanggal = $this->input->post('tanggal');
        $query   = $this->db->query(" SELECT TOP 10 J.CODE, CODE_NAME, REJECT_CODE_NAME,SUM(I.QTY) AS QTY_DEFECT 
        FROM(
        SELECT G.* FROM (
        SELECT PO_NO, PARTIAL, REMARK,LEVEL, LEVEL_USER FROM [QIP].[dbo].QIP_AQL_DATA_LOG WITH (NOLOCK)
        WHERE CONVERT(CHAR(6),LMNT_DTTM,112) ='$tanggal'
        AND LEVEL='II'
        AND LEVEL_USER='3'
        ) AS F 
        LEFT JOIN 
        (	SELECT PO_NO, PARTIAL, LEVEL, REMARK, LEVEL_USER,CODE, REJECT_CODE, SUM(QTY) AS QTY 
            FROM [QIP].[dbo].QIP_AQL_DATA_SECONDE WITH (NOLOCK) 
            GROUP BY PO_NO, PARTIAL,LEVEL, REMARK, LEVEL_USER, CODE, REJECT_CODE
        ) AS G ON F.PO_NO=G.PO_NO AND F.PARTIAL=G.PARTIAL AND F.LEVEL=G.LEVEL AND F.LEVEL_USER=G.LEVEL_USER AND F.REMARK = G.REMARK) AS I
        JOIN [QIP].[DBO].QIP_AQL_REJECT_CODE AS J
        ON I.CODE=J.CODE AND I.REJECT_CODE=J.REJECT_CODE
        GROUP BY  J.CODE, CODE_NAME,REJECT_CODE_NAME
        ORDER BY QTY_DEFECT DESC");

        return $query;
        
    }

    public function summary_inspection(){
        $tanggal = $this->input->post('tanggal');
        $query = $this->db->query("
            CREATE TABLE #HAHAHHIHI
            (
                TOTAL_SCHEDULE INT NULL,
                TANGGAL_INI NVARCHAR(30) NULL,
                SDD_GROUP NVARCHAR(20) NULL,
                TOTAL INT NULL,
                INSPECTION_TODAY INT NULL,
                RELEASE_TODAY INT NULL,
                REJECT_TODAY INT NULL,
                RELEASE INT NULL,
                REJECT INT NULL,
                RELEASED_PERCENT FLOAT NULL,
                REJECTED_PERCENT FLOAT NULL,
                SISA int NULL, 
                BELUM_INSPECT_LAGI INT NULL
            )

            INSERT INTO #HAHAHHIHI
            EXEC [QIP].[DBO].[AQL_SUMMARY_INSPECTION] @TANGGAL='$tanggal'");

        return $query;
        // echo $query;
        // print_r($query->result());
    }

    public function summary_inspection_view(){
       $query = $this->db->query("SELECT * FROM #HAHAHHIHI"); 
       return $query->result();
    }

    public function summary_inspection_sum(){
        $query = $this->db->query("SELECT SUM(INSPECTION_TODAY) AS SUM_INSPECTION_TODAY, 
        SUM(RELEASE_TODAY) AS SUM_RELEASE_TODAY,
        SUM(REJECT_TODAY) AS SUM_REJECT_TODAY
        FROM #HAHAHHIHI");

        return $query->row();
    }

    public function drop_summary_inspection(){
        $query = $this->db->query("DROP TABLE #HAHAHHIHI");

        return $query;
    }

    public function list_repacking(){
        $query = $this->db->query("SELECT R.PO_NO, T.PARTIAL, CONVERT(CHAR(10),MAXTIME, 120) AS TANGGAL, T.REJECT_DESC
        FROM (
            SELECT PO_NO, PARTIAL, MAX(LMNT_DTTM) AS MAXTIME
            FROM [QIP].[DBO].QIP_AQL_DATA_LOG
            WHERE PO_NO IN (SELECT PO_NO FROM [QIP].[dbo].QIP_AQL_DATA_LOG WITH (NOLOCK) WHERE INSPECT_RESULT='N' )
            AND LEVEL='II'
            AND LEVEL_USER='2'
            GROUP BY PO_NO, PARTIAL
        ) R
        INNER JOIN [QIP].[DBO].QIP_AQL_DATA_LOG T WITH (NOLOCK)
        ON T.PO_NO = R.PO_NO AND T.LMNT_DTTM = R.MAXTIME AND T.PARTIAL = R.PARTIAL
        WHERE T.INSPECT_RESULT='N'
        AND LEVEL='II'
        AND LEVEL_USER='2'
        ORDER BY MAXTIME");

        return $query;
    }


    private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }

	public function importRepacking() {
        $data = $this->_batchImport;
		
		$db2 = $this->load->database('qip',TRUE);
		$db2->insert_batch('REPACK_FIRST_DATA', $data);
	}

    public function importDefect() {
        $data = $this->_batchImport;
		
		$db2 = $this->load->database('qip',TRUE);
		$db2->insert_batch('REPACK_SECOND_DATA', $data);
	}

    public function po_info(){
        $query = $this->db->query("");
    }
    public function bgrade(){
        $query = $this->db->query("SELECT A.SIZE, B.QTY FROM 
                    (SELECT DISTINCT(SIZE) FROM [QIP].[dbo].QIP_AQL_DATA_FIRST WITH (NOLOCK) WHERE PO_NO='0126504328'
                    AND LEVEL_USER='2') AS A
                    LEFT JOIN 
                    (SELECT * FROM [QIP].[dbo].REPACK_FIRST_DATA WITH (NOLOCK)
                    WHERE PO_NO='0126504328' AND STATUS='BGRADE') AS B
                    ON A.SIZE = B.SIZE
                    ORDER BY STATUS, A.SIZE");

        return $query->result_array();

    }

    public function repacking(){
        $query = $this->db->query("SELECT A.SIZE, B.QTY FROM 
                    (SELECT DISTINCT(SIZE) FROM [QIP].[dbo].QIP_AQL_DATA_FIRST WITH (NOLOCK) WHERE PO_NO='0126504328'
                    AND LEVEL_USER='2') AS A
                    LEFT JOIN 
                    (SELECT * FROM [QIP].[dbo].REPACK_FIRST_DATA WITH (NOLOCK)
                    WHERE PO_NO='0126504328' AND STATUS='REPACKING') AS B
                    ON A.SIZE = B.SIZE
                    ORDER BY STATUS, A.SIZE");

        return $query->result_array();

    }

    public function cgrade(){
        $query = $this->db->query("SELECT A.SIZE, B.QTY FROM 
                    (SELECT DISTINCT(SIZE) FROM [QIP].[dbo].QIP_AQL_DATA_FIRST WITH (NOLOCK) WHERE PO_NO='0126504328'
                    AND LEVEL_USER='2') AS A
                    LEFT JOIN 
                    (SELECT * FROM [QIP].[dbo].REPACK_FIRST_DATA WITH (NOLOCK)
                    WHERE PO_NO='0126504328' AND STATUS='CGRADE') AS B
                    ON A.SIZE = B.SIZE
                    ORDER BY STATUS, A.SIZE");

        return $query->result_array();

    }

    public function defect(){
        $query = $this->db->query("		SELECT A.CODE_ID, a.CODE_DESC, B.SIZE, B.QTY, B.TANGGAL, BGRADE, CGRADE,
		(SELECT COUNT(*) FROM [QIP].DBO.REPACK_SECOND_DATA G WITH (NOLOCK) WHERE G.DEFECT = A.CODE_ID ) AS JUMLAH
		FROM 
                                    (SELECT * FROM [MEShs].DBO.[C_CODE] WITH (NOLOCK)
                                    WHERE CODE_GRP='QCODE') AS A
                                    JOIN
                                    (SELECT * FROM [QIP].DBO.REPACK_SECOND_DATA WITH (NOLOCK) WHERE PO_NO='0126504328') AS B
                                    ON A.CODE_ID = B.DEFECT");

        // $query = $this->db->query(" SELECT A.CODE_ID, CODE_DESC, B.SIZE, B.QTY, B.TANGGAL, BGRADE, CGRADE FROM 
        // (SELECT * FROM [MEShs].DBO.[C_CODE]
        // WHERE CODE_GRP='QCODE') AS A
        // JOIN
        // (SELECT * FROM [QIP].DBO.REPACK_SECOND_DATA WHERE PO_NO='0126504328') AS B
        // ON A.CODE_ID = B.DEFECT");

        return $query->result_array();
    }

    public function defect_count(){
        $query = $this->db->query(" SELECT DISTINCT(CODE_ID) AS JUMLAH FROM 
                        (SELECT * FROM [MEShs].DBO.[C_CODE] WITH (NOLOCK)
                        WHERE CODE_GRP='QCODE') AS A
                        JOIN
                        (SELECT * FROM [QIP].DBO.REPACK_SECOND_DATA WITH (NOLOCK) WHERE PO_NO='0126504328') AS B
                        ON A.CODE_ID = B.DEFECT");

        return $query->result_array();
    }

    public function delete_inspection(){
        $query = $this->db->query("SELECT	A.PO_NO, A.PARTIAL, A.QTY, A.INSPECT_DATE, A.LEVEL, A.INSPECTOR, A.LEVEL_USER, B.REMARK, B.INSPECT_RESULT 
        FROM	[QIP].DBO.QIP_AQL_PO_PARTIAL_INFO AS A WITH (NOLOCK)
        LEFT	JOIN QIP.DBO.QIP_AQL_DATA_LOG AS B WITH (NOLOCK)
        ON		A.PO_NO			= B.PO_NO
        AND		A.PARTIAL		= B.PARTIAL 
        AND		A.LEVEL			= B.LEVEL
        AND		A.LEVEL_USER	= B.LEVEL_USER
        WHERE   CONVERT(CHAR(6), LMNT_DTTM, 112) = CONVERT(CHAR(6), GETDATE(),112)
        ORDER BY INSPECT_DATE DESC");
        return $query;
    }
    
    public function delete_inspection_($po, $partial, $level, $level_user, $remark){
        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_DELETE_INSPECTION]
            @PO_NO = '$po', 
            @PARTIAL = '$partial',
            @LEVEL = '$level',
            @LEVEL_USER = '$level_user',
            @REMARK = '$remark'
        ");
        return $query;
    }
   
    public function list_import_pivot(){
        $query = $this->db->query("SELECT * FROM [QIP].DBO.AQL_UPLOAD_PIVOT WITH (NOLOCK) ORDER BY UPLOAD_DATE DESC");
        return $query;
    }

    public function importPivot() {
        $data = $this->_batchImport;
		
		$db2 = $this->load->database('qip',TRUE);
		$db2->insert_batch('AQL_UPLOAD_PIVOT', $data);
	}

    public function delete_import_pivot(){
        $id = $this->input->post('ID');
        $query = $this->db->query("DELETE FROM [QIP].[DBO].[AQL_UPLOAD_PIVOT] WHERE ID_TRANSAKSI = '$id'");
        return $query;
    }

    public function send_to_mes(){
		return $this->db->query("
		UPDATE  [meshs].[dbo].[THWHHIS] 
		SET 	
				[meshs].[dbo].[THWHHIS].INSPECTION = [QIP].[dbo].[AQL_UPLOAD_PIVOT].INSPECT_DATE
		FROM 		[meshs].[dbo].[THWHHIS] INNER JOIN [QIP].[dbo].[AQL_UPLOAD_PIVOT]
		ON [meshs].[dbo].[THWHHIS].PO_NO = [QIP].[dbo].[AQL_UPLOAD_PIVOT].PO_NO
		WHERE [QIP].[dbo].[AQL_UPLOAD_PIVOT].UPDATE_STATUS = 'N'
		AND [QIP].[dbo].[AQL_UPLOAD_PIVOT].LEVEL_INSPECTOR ='1'
        AND [QIP].[dbo].[AQL_UPLOAD_PIVOT].RESULT ='Pass'
		AND [meshs].[dbo].[THWHHIS].INSPECTION IS NULL");
	}

    public function change_status(){
		return $this->db->query("UPDATE [QIP].[dbo].[AQL_UPLOAD_PIVOT]
		SET UPDATE_STATUS = 'Y'
		WHERE UPDATE_STATUS = 'N'
		");
	}

}
