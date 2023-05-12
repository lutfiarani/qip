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
		// $db2 = $this->load->database('qip',TRUE);
		// $insert = $this->db->insert('[QIP].[dbo].QIP_AQL_PO_PARTIAL_INFO', $data);
        // return $insert; 
        // return $insert;
        // $sql = $this->db->set($data)->get_compiled_insert('[QIP].[dbo].QIP_AQL_PO_PARTIAL_INFO');
        // return $sql;
        
        $PO  =$_POST['PO_NO'];
		$PARTIAL  = $_POST['PARTIAL']; //$_POST['PARTIAL'];
		$INSPECTOR = $this->session->userdata('USERNAME');
		$QTY = $_POST['QTY'];
		$LEVEL = $_POST['LEVEL'];
        $INSPECT_DATE = $_POST['INSPECT_DATE'];
        $LEVEL_USER = $this->session->userdata('LEVEL');
        $query = $this->db->query("INSERT INTO [QIP].[dbo].QIP_AQL_PO_PARTIAL_INFO (PO_NO, PARTIAL, QTY, INSPECTOR, LEVEL, INSPECT_DATE, LEVEL_USER) 
                    VALUES ('$PO', '$PARTIAL', $QTY, '$INSPECTOR', '$LEVEL', $INSPECT_DATE, $LEVEL_USER)");
        return $query;
        // echo $query;
        // print_r($data);
    }


    
    public function _list_partial()
    {
        
        // if($this->input->post('PO_NO')){
        //     $this->db->where('PO_NO', $this->input->post('PO_NO'));
        // }
        $this->db->from($this->table);
            
    }
    
    public function list_partial(){
        $po     = $this->input->post('PO_NO_');
        // $level  = $this->input->post('LEVEL');
        $level_user  = $this->session->userdata('LEVEL');
        
        $query  = $this->db->query("
     
        SELECT A.PO_NO, A.PARTIAL, QTY, A.INSPECTOR,INSPECT_DATE, BANYAK, INSPECT_RESULT,
                A. LEVEL, A.LEVEL_USER, '$level_user' AS LEVEL_NOW FROM [QIP].[dbo].[QIP_AQL_PO_PARTIAL_INFO] AS A
        LEFT JOIN (
            SELECT PO_NO,COUNT(PO_NO) AS BANYAK, PARTIAL, LEVEL, LEVEL_USER FROM [QIP].[dbo].[QIP_AQL_DATA_LOG]
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
                    FROM [QIP].[dbo].[QIP_AQL_DATA_LOG] WHERE PO_NO='$po' --AND LEVEL='II' AND LEVEL_USER='2'
                    GROUP BY PO_NO, PARTIAL, LEVEL, LEVEL_USER
                ) AS A
                JOIN [QIP].[dbo].[QIP_AQL_DATA_LOG] AS B
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
                        FROM [QIP].[dbo].[QIP_AQL_DATA_LOG] AS A 
                        JOIN [QIP].[dbo].[QIP_AQL_DATA_FIRST] AS B 
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
        $query = $this->db->query("SELECT USERNAME FROM [QIP].[dbo].AQL_USER
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
        $query = $this->db->query("SELECT * FROM [QIP].[dbo].QIP_AQL_REJECT_CODE WHERE CODE='$id'");
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
        $query = $this->db->query("SELECT * FROM [QIP].[dbo].[QIP_AQL_DATA_FIRST] 
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

    public function random_belumsave($po, $partial, $level){
        $query = $this->db->query("
                    exec [QIP].[dbo].[AQL_RANDOM] @PO_NO='$po', @PARTIAL='$partial', @LEVEL='$level'
                   
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
    }

    public function cek_second_data($po, $partial, $level, $remark, $level_user){
        $query = $this->db->query("SELECT * FROM [QIP].[dbo].[QIP_AQL_DATA_SECONDE] 
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
        $query = $this->db->query("SELECT DISTINCT(CODE) as CODE, CODE_NAME FROM [QIP].[dbo].[QIP_AQL_REJECT_CODE]
                                    ORDER BY CODE ");

        return $query;
    }

    public function confirm_inspector($PO_NO, $PARTIAL, $REMARK, $LEVEL, $USERID, $LEVEL_USER, $FLAG, $COMMENT){
        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_CONFIRM_INSPECT] @PO_NO='$PO_NO', @PARTIAL='$PARTIAL', 
                                    @REMARK = '$REMARK', @LEVEL='$LEVEL', @USERID='$USERID'
                                    , @LEVEL_USER = '$LEVEL_USER', @FLAG = '$FLAG', @COMMENT = '$COMMENT'
                                    ");
        // $query = ("EXEC [QIP].[dbo].[AQL_CONFIRM_INSPECT] @PO_NO='$PO_NO', @PARTIAL='$PARTIAL', 
        // @REMARK = '$REMARK', @LEVEL='$LEVEL', @USERID='$USERID'
        // , @LEVEL_USER = '$LEVEL_USER', @FLAG = '$FLAG', @COMMENT = '$COMMENT'");
        return $query;
        // echo $query;
    }

    public function confirm_inspector_repre($PO_NO, $PARTIAL, $REMARK, $LEVEL, $USERID, $LEVEL_USER, $FLAG){
        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_CONFIRM_INSPECT_REPRE] @PO_NO='$PO_NO', @PARTIAL='$PARTIAL', 
                                    @REMARK = '$REMARK', @LEVEL='$LEVEL', @USERID='$USERID'
                                    , @LEVEL_USER = '$LEVEL_USER', @FLAG = '$FLAG'
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
            SELECT PO_NO, PARTIAL, LEVEL, REMARK, CARTON_NO, CARTON_QTY, SIZE, QTY_INSPECT  FROM [QIP].[dbo].QIP_AQL_DATA_FIRST
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
        $query = $this->db->query("SELECT ID, NIK FROM [QIP].[dbo].AQL_QIP_USER");

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
        $query = $this->db->query("SELECT LEFT(CELL_CODE,1)+RIGHT(CELL_CODE,2) AS CELL FROM TMCELL
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
        $tanggal = $this->input->post('tanggal');
        $query = $this->db->query("EXEC [QIP].[DBO].AQL_MONTHLY_REPORT_VALIDATION @TANGGAL = '$tanggal'");

        return $query;
    }

    public function summary_third_fac(){
        $tanggal = $this->input->post('tanggal');
        $query = $this->db->query("EXEC [QIP].[DBO].AQL_MONTHLY_SUMMARY_THIRD_FAC @INSPECT_DATE = '$tanggal'");
        // echo $query;
        return $query->result();

    }

    public function summary_third_date(){
        $tanggal = $this->input->post('tanggal');
        $query = $this->db->query("EXEC [QIP].[DBO].AQL_MONTHLY_SUMMARY_THIRD_DATE @INSPECT_DATE = '$tanggal'");
        // echo $query;

        return $query->result();

    }
}
