<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// use GuzzleHttp\Client;

class M_aql_reject extends CI_Model {

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
	
    // ////////////////////////////////////////////////////////////////////////////////////////////////
    // private $_client;
    // public function __construct(){
    //     $this->_client = new Client([
    //         'base_uri' => 
    //     ])
    // }
    
    public function delete_defect(){
        $PO_NO       = $this->input->post('PO_NO');
        $PARTIAL     = $this->input->post('PARTIAL');
        $LEVEL       = $this->input->post('LEVEL');
        $REMARK      = $this->input->post('REMARK');
        $LEVEL_USER  = $this->input->post('LEVEL_USER');
        $CODE        = $this->input->post('CODE');
        $REJECT_CODE = $this->input->post('REJECT_CODE');
        
//  $query = ("
        $query = $this->db->query("DELETE FROM [QIP].[dbo].QIP_AQL_PO_DEFECT
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
        // echo $query;
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

     public function detail_reject_code(){
        $id = $this->input->post('code_id');
        $query = $this->db->query("SELECT * FROM [QIP].[dbo].QIP_AQL_REJECT_CODE WITH (NOLOCK) WHERE CODE='$id'");
        return $query->result();
    }

    public function update_reject($PO_NO, $PARTIAL, $LEVEL, $LEVEL_USER, $REMARK, $REJECT_CODE, $CODE, $column, $filename){
        $query = ("UPDATE [QIP].[dbo].QIP_AQL_PO_DEFECT
                        SET ".$column." = '$filename'
                        WHERE PO_NO='$PO_NO'
                        AND PARTIAL='$PARTIAL'
                        AND LEVEL='$LEVEL'
                        AND LEVEL_USER='$LEVEL_USER'
                        AND REMARK='$REMARK'
                        AND REJECT_CODE='$REJECT_CODE'
                        AND CODE='$CODE'
        ");

        $querys = $this->db->query($query);

        return $querys;
        // echo $query;

    }

    public function save_second_data($po_no, $partial, $level, $remark, $level_user){
        $query = $this->db->query("
            EXEC [QIP].[dbo].[AQL_SAVE_SECOND_DATA_V1]  @PO_NO = '$po_no', @PARTIAL = '$partial',
            @LEVEL = '$level', @REMARK = '$remark', @LEVEL_USER = '$level_user'
        "
        );
        return $query;
    }

    public function delete_stage($po_no, $partial, $level, $remark, $level_user){
        $query = $this->db->query("DELETE FROM [QIP].[dbo].[QIP_AQL_STAGE_LOG]
                                    WHERE PO_NO = '$po_no'
                                    AND PARTIAL = '$partial'
                                    AND LEVEL = '$level'
                                    AND REMARK = '$remark'
        ");

        return $query;
    }

    
    public function view_image(){
        $PO_NO       = $_POST['PO_NO'];
        $PARTIAL     = $_POST['PARTIAL'];
        $REMARK      = $_POST['REMARK'];
        $LEVEL       = $_POST['LEVEL'];
        $LEVEL_USER  = $_POST['LEVEL_USER'];
        $CODE        = $_POST['CODE'];
        $REJECT_CODE = $_POST['REJECT_CODE'];

        $query = $this->db->query("SELECT TOP 1 * FROM [QIP].[dbo].[QIP_AQL_PO_DEFECT]
                                    WHERE PO_NO = '$PO_NO'
                                    AND PARTIAL = '$PARTIAL'
                                    AND REMARK  = '$REMARK'
                                    AND LEVEL   = '$LEVEL'
                                    AND CODE    = '$CODE'
                                    AND REJECT_CODE = '$REJECT_CODE'
            ");

        return $query->row();
    }
   
}
