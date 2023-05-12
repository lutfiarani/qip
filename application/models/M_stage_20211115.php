<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stage extends CI_Model {

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
	
	public function model()
	{
        $query = $this->db->query("
                    DECLARE @TANGGAL VARCHAR(8);
                    SET @TANGGAL = (SELECT CONVERT(CHAR(6),GETDATE(),112) );
                    select DISTINCT(MODEL) AS MODEL2, MODEL from [MEShs].[dbo].ZMD_IF_MATERIAL_MASTER WITH (NOLOCK) WHERE CONVERT(CHAR(6), LMNT_DTTM,112) = @TANGGAL
                    AND MODEL<>''
                    ORDER BY MODEL
            ")->result_array();
        // print_r($query);
        return $query;
    }

    public function stage(){
        $query = $this->db->query("select * from [DMS].[dbo].[STAGE]");
        return $query->result_array();
    }

    public function save_upload($pdf, $status, $model, $stage, $date, $remark){
        
        return $this->db->query("
        INSERT INTO [DMS].[dbo].[UPLOAD_STAGE]
                   ([MODEL_NAME]
                   ,[STAGE_ID]
                   ,[TANGGAL]
                   ,[STATUS]
                   ,[REMARK]
                   ,[CREATED_AT]
                   ,[DOKUMEN])
             VALUES
                   ('$model'
                   ,'$stage'
                   ,'$date'
                   ,'$status'
                   ,'$remark'
                   ,GETDATE()
                   ,'$pdf')
        ");
    }

    public function view_upload_stage(){
        $model = $this->input->post('model');

        return $this->db->query("SELECT A.MODEL_NAME, B.STAGE_NAME, A.TANGGAL, A.STATUS, A.REMARK, A.CREATED_AT, A.DOKUMEN FROM [DMS].[dbo].[UPLOAD_STAGE] AS A
                JOIN [DMS].[dbo].[STAGE] AS B
                ON A.STAGE_ID = B.STAGE_ID
                WHERE A.MODEL_NAME = '$model'")->result();
    }

    // public function stage(){
    //     $model = $this->input->post('model');
    //     $query = $this->db->query("SELECT A.STAGE_ID, A.STAGE_NAME FROM [DMS].[dbo].[STAGE]  AS A
    //     LEFT JOIN (SELECT * FROM [DMS].[dbo].[UPLOAD_STAGE]  WHERE MODEL_NAME ='$model') AS B
    //     ON A.STAGE_ID = B.STAGE_ID
    //     AND B.MODEL_NAME IS NULL");

    //     $stage="";
    //     foreach ($query->result_array() as $data ){
    //         $stage.= "<option value='$data[STAGE_ID]'>$data[STAGE_NAME]</option>";
    //     }

	// 	return $stage;
    // }

 
    public function delete_file(){
        $nama_file = $this->input->post('nama_file');
        
        return $this->db->query("DELETE FROM [DMS].[DBO].UPLOAD_STAGE WHERE DOKUMEN = '$nama_file'");
    }

    public function nama_stage($stage){
        return $this->db->query("SELECT * FROM [DMS].[DBO].STAGE WHERE STAGE_ID = '$stage' ")->row();
    }
    

   
}
