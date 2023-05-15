<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_validation extends CI_Model {

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
    
    public function __construct(){
        parent::__construct();
        $this->db2 = $this->load->database('qc',TRUE);
    }

    public function get_data_po($po){
        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_GET_DATA_PO] @PO_NO='$po'");
        return $query;
    }

    public function insert_partial($data){} 

    public function apps_a01($po) {
       
		$query  = $this->db2->query("select * from apps.a01 where po='$po' limit 1");
        
        return $query->row();
	}

    public function apps_cpsia($po){
        $query  = $this->db2->query("select * from apps.cpsia where po='$po' limit 1");
        
        return $query->row();
    }

    public function fgt($po){
        $query = $this->db2->query("
            Select * from fgt.fgt 
            where article in (select art from apps.loadplan where po='$po')
            order by id desc
            limit 1
        ");

        return $query->result_array();
    }

    public function cma($po){
        $query = $this->db2->query("Select * from fgt.cma where po='$po' limit 1");
        return $query->row();
    }

    public function save_validation(){
        $po                 = $_POST['PO_NO'];
        $partial            = $_POST['PARTIAL'];
        $remark             = $_POST['REMARK'];
        $level              = $_POST['LEVEL'];
        $level_user         = $_POST['LEVEL_USER'];
        $a_1                = $_POST['MCS'];
        $a_2                = $_POST['SHAS'];
        $a_3                = $_POST['A01'];
        $a_4                = $_POST['CPSIA'];
        $a_5                = $_POST['CustomerCountry'];
        $Comment_1          = $_POST['Comment_1'];
        $Comment_2          = $_POST['Comment_1'];
        $Comment_3          = $_POST['Comment_1'];
        $Comment_4          = $_POST['Comment_1'];
        $Comment_5          = $_POST['Comment_1'];
        $a_6                = $_POST['Production'];
        $a_7                = $_POST['Warehouse'];
        $Comment_6          = $_POST['Comment_2'];
        $Comment_7          = $_POST['Comment_2'];
        $a_8                = $_POST['Production_fgt'];
        $a_9                = $_POST['CMA'];
        $Comment_8          = $_POST['Comment_3'];
        $Comment_9          = $_POST['Comment_3'];
        $a_10               = $_POST['UVC_treatment'];
        $a_11               = $_POST['Anti_mold'];
        $Comment_10         = $_POST['Comment_4'];
        $Comment_11         = $_POST['Comment_4'];
        $a_12               = $_POST['Exceptional_visual'];
        $a_13               = $_POST['Factory_disclaimer'];
        $Comment_12         = $_POST['Comment_5'];
        $Comment_13         = $_POST['Comment_5'];
        $a_14               = $_POST['SlipOn_inspection'];
        $Comment_14         = $_POST['Comment_6'];
        $a_15               = $_POST['Moisture_test'];
        $Comment_15         = $_POST['Comment_7'];

       
        $query = ("
        INSERT INTO [QIP].[dbo].[QIP_AQL_DATA_VALIDATION]
                    ([PO_NO]
                    ,[PARTIAL]
                    ,[REMARK]
                    ,[LEVEL]
                    ,[LEVEL_USER]
                    ,[VALIDATION_CODE]
                    ,[VALIDATION_RESULT]
                    ,[VALIDATION_COMMENT]
                    ,[CREATE_DATE]
                    ,[UPDATE_DATE])
            VALUES
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '1', '$a_1', '$Comment_1', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '2', '$a_2', '$Comment_2', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '3', '$a_3', '$Comment_3', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '4', '$a_4', '$Comment_4', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '5', '$a_5', '$Comment_5', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '6', '$a_6', '$Comment_6', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '7', '$a_7', '$Comment_7', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '8', '$a_8', '$Comment_8', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '9', '$a_9', '$Comment_9', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '10', '$a_10', '$Comment_10', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '11', '$a_11', '$Comment_11', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '12', '$a_12', '$Comment_12', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '13', '$a_13', '$Comment_13', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '14', '$a_14', '$Comment_14', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '15', '$a_15', '$Comment_15', getdate(), getdate())");
            
            
        // echo $query;
        $query = $this->db->query($query);
        return $query;
    }

    public function get_article($po){
        $query = $this->db->query("SELECT TOP 1 ART_NO FROM THPRODHISPO WITH (NOLOCK) WHERE PO_NO = '$po' ");
        return $query->row();
    }
    
    public function save_image($data){
        $db2 = $this->load->database('qip',TRUE);
        return $db2->insert_batch('QIP_AQL_DATA_PHOTO', $data);
        // print_r($data);
    }

    public function update_image($data){

    }

    public function edit_stage($PO_NO1, $PARTIAL1, $LEVEL1, $LEVEL_USER1, $REMARK1, $stage){
        $query = $this->db->query("
                UPDATE [QIP].[dbo].[QIP_AQL_STAGE_LOG]
                SET STAGE = '$stage',
                UPDATE_INSPECTION = GETDATE()
                WHERE PO_NO = '$PO_NO1'
                AND PARTIAL = '$PARTIAL1'
                AND LEVEL   = '$LEVEL1'
                AND REMARK  = '$REMARK1'
        ");

        // echo $query;
        return $query;
    }

    public function disp_product($po){
        $query = $this->db->query("SELECT TOP 3 ARTICLE, PHOTO_CODE, PHOTO_NAME, SEQ
                                        FROM [QIP].[DBO].[QIP_AQL_DATA_PHOTO] 
                                        WHERE ARTICLE IN (SELECT ART_NO FROM THPRODHISPO WITH (NOLOCK) WHERE PO_NO = '$po')
                                        AND LEFT(PHOTO_CODE,1) = '1'
                                        ORDER BY CREATE_DATE DESC
                                        "
                );
        
        return $query->result();
    }

    public function image_product(){
        $ARTICLE    = $_POST['ARTICLE'];
        $SEQ    = $_POST['SEQ'];
        $CODE   = $_POST['CODE'];
        $NAME   = $_POST['NAME'];

        $query = $this->db->query("
                                    SELECT ARTICLE, PHOTO_CODE, PHOTO_NAME, SEQ
                                    FROM [QIP].[DBO].[QIP_AQL_DATA_PHOTO] WHERE
                                    ARTICLE ='$ARTICLE'
                                    AND SEQ = '$SEQ'
                                    AND PHOTO_CODE = '$CODE'
                                    AND PHOTO_NAME = '$NAME'
                                    
                                    
        ");

        return $query->row();
    }
}
