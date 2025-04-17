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
        $query  = $this->db2->query("SELECT
                                a.po,
                                a.gender,
                                a.country,
                                b.file,
                                b.coc,
                            CASE
                                
                                WHEN ( ( a.gender = 'C' ) OR ( a.gender = 'I' ) OR ( a.gender = 'K' ) ) 
                                AND ( ( a.country = 'USA' ) OR ( a.country = 'US' ) OR ( a.country = 'Panama' ) ) 
                                                            AND b.coc IS NOT NULL
                                THEN
                                    'yes' 
                                    WHEN ( ( a.gender = 'C' ) OR ( a.gender = 'I' ) OR ( a.gender = 'K' ) ) 
                                    AND ( ( a.country = 'USA' ) OR ( a.country = 'US' ) OR ( a.country = 'Panama' ) ) 
                                    AND ( b.coc IS NULL ) THEN
                                        'no' ELSE 'na' 
                                    END AS statusnya 
                                FROM
                                    apps.po_tracking a
                                    LEFT JOIN apps.cpsia b ON a.po = b.po 
                                WHERE
                            a.po = '$po' 
                        LIMIT 1");
        
        return $query;
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
        $query = $this->db2->query("SELECT
                                a.po,
                                a.gen,
                                a.country,
                                b.po,
                                
                            CASE
                                
                                WHEN ( ( a.country = 'CHINA' )) 
                                AND ( a.po IS NOT NULL ) THEN
                                    'yes' 
                                    WHEN ( ( a.country = 'CHINA' )) 
                                    AND ( a.po IS NULL ) THEN
                                        'no' ELSE 'na' 
                                    END AS statusnya 
                                FROM
                                    apps.loadplan a
                                    LEFT JOIN apps.cma b ON a.po = b.po 
                                WHERE
                                a.po = '$po' 
                            LIMIT 1");
        return $query->row();
    }

    public function save_validation($remark){
        $po                 = $_POST['PO_NO'];
        $partial            = $_POST['PARTIAL'];
        $remark             = $remark;
        $level              = $_POST['LEVEL'];
        $level_user         = $_POST['LEVEL_USER'];
        $a_1                = $_POST['MCS'];
        $a_2                = $_POST['SHAS'];
        $a_3                = $_POST['A01'];
        $a_4                = $_POST['CPSIA'];
        $a_5                = $_POST['CustomerCountry'];
        $Comment_1          = $_POST['Comment_1'];
        $Comment_a01        = $_POST['Comment_a01'];
        $Comment_2          = $_POST['Comment_1'];
        $Comment_3          = $_POST['Comment_1'];
        $Comment_cpsia      = $_POST['Comment_cpsia'];
        $Comment_5          = $_POST['Comment_1'];
        $a_6                = $_POST['Production'];
        $a_7                = $_POST['Warehouse'];
        $Comment_6          = $_POST['Comment_2'];
        $Comment_7          = $_POST['Comment_2'];
        $a_8                = $_POST['Production_fgt'];
        // $a_9                = $_POST['CMA'];
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
        // $a_15               = $_POST['Moisture_test'];
        $a_16               = $_POST['Moisture_control_box'];
        $Comment_16         = $_POST['Comment_4'];
        $a_17               = $_POST['Moisture_control_product'];
        $Comment_17         = $_POST['Comment_4'];

        $delete = ("DELETE FROM [QIP].[dbo].[QIP_AQL_DATA_VALIDATION] WHERE PO_NO='$po' AND PARTIAL ='$partial'");
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
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '3', '$a_3', '$Comment_a01', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '4', '$a_4', '$Comment_cpsia', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '5', '$a_5', '$Comment_5', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '6', '$a_6', '$Comment_6', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '7', '$a_7', '$Comment_7', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '8', '$a_8', '$Comment_8', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '10', '$a_10', '$Comment_10', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '11', '$a_11', '$Comment_11', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '12', '$a_12', '$Comment_12', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '13', '$a_13', '$Comment_13', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '14', '$a_14', '$Comment_14', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '16', '$a_16', '$Comment_16', getdate(), getdate()),
                    ( '$po' , '$partial', '$remark' , '$level', '$level_user' , '17', '$a_17', '$Comment_17', getdate(), getdate())
                    ");
            
            
        // echo $query;
        $delete = $this->db->query($delete); 
        $query  = $this->db->query($query);
        return $query;
    }

    public function get_article($po){
        $query = $this->db->query("SELECT TOP 1 ART_NO FROM THPRODHISPO WITH (NOLOCK) WHERE PO_NO = '$po' ");
        return $query;
    }

    public function get_article_ckd($po){
        $query = $this->db->query("SELECT TOP 1 ART_NO FROM THPRODHIS WITH (NOLOCK) WHERE PO_NO = '$po' ");
        return $query;
    }
    
    public function save_image($data){
        $db2 = $this->load->database('qip',TRUE);
        return $db2->insert_batch('QIP_AQL_DATA_PHOTO', $data);
        // print_r($data);
    }

    public function update_image($data){

    } 

    public function cek_val($po, $partial, $level, $level_user){
        $query = $this->db->query("SELECT * FROM [QIP].[dbo].[QIP_AQL_DATA_VALIDATION] WITH (NOLOCK)
                                    WHERE PO_NO = '$po'
                                    AND PARTIAL = '$partial'
                                    AND LEVEL = '$level'
                                    AND LEVEL_USER = '$level_user'
                        
        ");

        return $query;
    }

    public function insert_stage($po, $partial, $level, $level_user, $stage){
        $query = $this->db->query("
               
                INSERT INTO [QIP].[dbo].[QIP_AQL_STAGE_LOG](PO_NO, PARTIAL, LEVEL, REMARK, STAGE, START_INSPECTION, UPDATE_INSPECTION)
                VALUES ('$po' , '$partial', '$level', '$level_user', '$stage', GETDATE(), GETDATE())
               
        ");

        return $query;
    }
    public function edit_stage($PO_NO1, $PARTIAL1, $LEVEL1, $LEVEL_USER1, $REMARK1, $stage){
        $query = $this->db->query("
                    UPDATE [QIP].[dbo].[QIP_AQL_STAGE_LOG]
                    SET STAGE = '$stage',
                    UPDATE_INSPECTION = GETDATE()
                    WHERE PO_NO = '$PO_NO1'
                    AND PARTIAL = '$PARTIAL1'
                  
        ");

        // echo $query;
        return $query;
    }

    public function disp_product($po){
        $query = $this->db->query("SELECT TOP 6 *--PO_NO, ARTICLE, PHOTO_CODE, PHOTO_NAME, SEQ
                                        FROM [QIP].[DBO].[QIP_AQL_DATA_PHOTO]  WITH (NOLOCK) 
                                        WHERE ARTICLE IN (SELECT ART_NO FROM THPRODHISPO WITH (NOLOCK) WHERE PO_NO = '$po')
                                        AND LEFT(PHOTO_CODE,1) = '1'
                                        ORDER BY CREATE_DATE DESC
                                        "
                );
        
        return $query->result();
        // echo $query;
    }

    public function disp_measurements($po, $partial, $level, $level_user){
        $query = $this->db->query("SELECT TOP 3 *
                                        FROM [QIP].[DBO].[QIP_AQL_DATA_PHOTO]  WITH (NOLOCK) 
                                        WHERE PO_NO = '$po'
                                        AND PARTIAL = '$partial'
                                        AND LEVEL   = '$level'
                                        AND LEVEL_USER = '$level_user'
                                        AND LEFT(PHOTO_CODE,1) = '2'
                                        ORDER BY CREATE_DATE DESC

                                        "
                );
        
        return $query->result();
        // echo $query;
    }

    public function image_product(){
        $ARTICLE    = $_POST['ARTICLE'];
        $SEQ    = $_POST['SEQ'];
        $CODE   = $_POST['CODE'];
        $NAME   = $_POST['NAME'];

        $query = $this->db->query("
                                    SELECT ARTICLE, PHOTO_CODE, PHOTO_NAME, SEQ
                                    FROM [QIP].[DBO].[QIP_AQL_DATA_PHOTO] WITH (NOLOCK)
                                    WHERE ARTICLE ='$ARTICLE'
                                    AND SEQ = '$SEQ'
                                    AND PHOTO_CODE = '$CODE'
                                    AND PHOTO_NAME = '$NAME'
                                    
                                    
        ");

        return $query->row();
    }

    public function val_result($po, $partial, $level, $level_user, $code){
        $query = $this->db->query("SELECT * FROM [QIP].[dbo].QIP_AQL_DATA_VALIDATION WITH (NOLOCK)
                                    WHERE PO_NO = '$po'
                                    AND PARTIAL = '$partial'
                                    AND LEVEL = '$level'
                                    AND LEVEL_USER = '$level_user'
                                    AND VALIDATION_CODE = '$code'
                                    ");
        return $query->row();
        // echo $query;
    }

    public function view_random($po, $partial){
        $query = $this->db->query("SELECT A.PO_NO, A.PARTIAL, A.LEVEL, A.CTN_NO, A.BOOKING_COMMENT, A.SIZE, A.QTY, B.STAGE
                                    FROM [QIP].[dbo].[QIP_AQL_RANDOM_PO] AS A WITH (NOLOCK)
                                    JOIN [QIP].[dbo].[QIP_AQL_STAGE_LOG] AS B WITH (NOLOCK)
                                    ON A.PO_NO      = B.PO_NO 
                                    AND A.PARTIAL   = B.PARTIAL
                                    WHERE A.PO_NO   = '$po'
                                    AND A.PARTIAL   = '$partial'
        ");
        return $query->result();
    }

    public function view_booking_ctn($po, $partial){
        $query = $this->db->query("SELECT TOP 1 * FROM [QIP].[dbo].[QIP_AQL_RANDOM_PO] WITH (NOLOCK) WHERE PO_NO='$po' AND PARTIAL='$partial'");
        return $query->row();
    }

    public function updateBookingCtn(){
        $column     = $this->input->post('column');
        $isi_column = $this->input->post('value');
        $po         = $this->input->post('po');
        $partial    = $this->input->post('partial');

        $query = $this->db->query("UPDATE [QIP].[dbo].[QIP_AQL_RANDOM_PO]
                        SET ".$column." = '$isi_column'
                        WHERE PO_NO = '$po'
                        AND PARTIAL = '$partial'
        ");
        
        return $query;
    }

    public function update_random($PO_NO, $PARTIAL, $SIZE, $VALUE){
        $query = $this->db->query("
                        UPDATE [QIP].[dbo].[QIP_AQL_RANDOM_PO]
                        SET QTY     = '$VALUE'
                        WHERE PO_NO = '$PO_NO'
                        AND PARTIAL = '$PARTIAL'
                        AND SIZE    = '$SIZE'
        ");

        return $query;
    }

    public function cek_first_data($PO_NO, $PARTIAL, $LEVEL, $LEVEL_USER){
        $query = $this->db->query("SELECT * FROM [QIP].[DBO].[QIP_AQL_DATA_FIRST] WITH (NOLOCK)
                                    WHERE PO_NO     = '$PO_NO'
                                    AND PARTIAL     = '$PARTIAL'
                                    AND LEVEL       = '$LEVEL'
                                    AND LEVEL_USER  = '$LEVEL_USER'
        ");

        return $query;
    }

    public function delete_display(){
        $PO         = $_POST['PO'];
        $SEQ        = $_POST['SEQ'];
        $CODE       = $_POST['CODE'];
        $NAME       = $_POST['NAME'];
        $PARTIAL    = $_POST['PARTIAL'];

        $query = $this->db->query("DELETE FROM [QIP].[DBO].[QIP_AQL_DATA_PHOTO]
                    WHERE PO_NO ='$PO'
                    AND     SEQ = '$SEQ'
                    AND     PHOTO_CODE = '$CODE'
                    AND     PHOTO_NAME='$NAME'
                    AND     PARTIAL = '$PARTIAL'
        ");
        return $query;
    }

    public function cek_kriteria_cpsia($po){
        $query = $this->db->query("
        SELECT A.VBELN AS PO_NO, 
                    CASE WHEN ((A.J_3APGNR='C') OR (A.J_3APGNR='K') OR (A.J_3APGNR='I')) AND ((B.LANDT='USA') OR (B.LANDT='PANAMA')) THEN 'YES'
                    ELSE 'NO'
                    END AS KRITERIA
                FROM (
                    SELECT * FROM ZSD_IF_PO_SEND_MES_HEADER WITH (NOLOCK) WHERE VBELN='$po'
                ) AS A JOIN 
                (SELECT * FROM ZSD_IF_PO_PACKING_SEND_MES_HEADER WITH (NOLOCK) WHERE VBELN='$po') AS B
                ON A.VBELN= B.VBELN
        ");
        return $query;
    }
    
}

