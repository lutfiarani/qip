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
        $query = $this->db->query("select * from [DMS].[dbo].[STAGE] WITH (NOLOCK) WHERE PAKAI = 'Y' ORDER BY SEQ");
        return $query->result_array();
    }

    public function save_upload($model_input, $article, $pdf, $status, $modelhaha, $stage, $date, $remark){
        
        $query1 =  $this->db->query("
        INSERT INTO [DMS].[dbo].[UPLOAD_STAGE]
                   ([MODEL_INPUT]
                   ,[ARTICLE]
                   ,[MODEL_NAME]
                   ,[STAGE_ID]
                   ,[TANGGAL]
                   ,[STATUS]
                   ,[REMARK]
                   ,[CREATED_AT]
                   ,[DOKUMEN]
                   ,[UPDATED_AT])
             VALUES
                   ('$model_input'
                   ,'$article'
                   ,'$modelhaha'
                   ,'$stage'
                   ,'$date'
                   ,'$status'
                   ,'$remark'
                   ,GETDATE()
                   ,'$pdf'
                   ,GETDATE())
        ");

        return array($query1);
    }

    Public function save_log($pdf, $status){
        $query2 =  $this->db->query("INSERT INTO [DMS].[dbo].UPLOAD_STAGE_LOG
                                    ([DOKUMEN]
                                    
                                    , [STATUS]
                                    , [CREATED_AT])
                                VALUES
                                    ( '$pdf'
                                    , '$status'
                                    , GETDATE()

                                    )    
                                ");
        return $query;
    }

    public function upload_edit($file_awal, $pdf, $status){
        $query1 = $this->db->query("
                                    INSERT INTO [DMS].[dbo].UPLOAD_STAGE_LOG
                                            ([DOKUMEN]
                                            , [DOKUMEN_UPDATE]
                                            , [STATUS]
                                            , [CREATED_AT])
                                        VALUES
                                            ( '$file_awal'
                                            , '$pdf'
                                            , '$status'
                                            , GETDATE()

                                            )    
                                    ");
        
        $query2 = $this->db->query("
                                    UPDATE [DMS].dbo.UPLOAD_STAGE
                                                                SET STATUS = '$status',
                                                                    UPDATED_AT = GETDATE()
                                                                WHERE DOKUMEN = '$file_awal'
                                    ");
        // return array('query1' => $query1, 'query2' => $query2);
        return array($query1, $query2);
        // ECHO $query1;
    }

  
    public function view_upload_stage(){
        $model = $this->input->post('model');

        return $this->db->query("SELECT DATA_A.*, DATA_B.LISTMODEL, DATA_C.DOKUMEN_UPDATE  FROM 
        (
            SELECT A.MODEL_INPUT, B.STAGE_NAME, A.ARTICLE, A.TANGGAL, A.STATUS, A.REMARK, CONVERT(varchar(16), A.CREATED_AT, 120) AS CREATED_AT, A.DOKUMEN , CONVERT(varchar(16), A.UPDATED_AT, 120) AS UPDATED_AT
            FROM [DMS].[dbo].[UPLOAD_STAGE] AS A WITH (NOLOCK)
            JOIN [DMS].[dbo].[STAGE] AS B WITH (NOLOCK)
            ON A.STAGE_ID = B.STAGE_ID
            GROUP BY A.MODEL_INPUT, B.STAGE_NAME, A.ARTICLE, A.TANGGAL, A.STATUS, A.REMARK, A.DOKUMEN, CONVERT(varchar(16), A.CREATED_AT, 120),  CONVERT(varchar(16), A.UPDATED_AT, 120)
        ) AS DATA_A
        JOIN 
        (
            SELECT 
                DOKUMEN,  MODEL_INPUT, 
                    STUFF((
                        SELECT ', ' + U.MODEL_NAME
                        FROM [DMS].[dbo].UPLOAD_STAGE U WITH (NOLOCK)
                        WHERE U.DOKUMEN = B.DOKUMEN
                        
                        GROUP BY MODEL_NAME--, MODEL_INPUT
                        ORDER BY U.MODEL_NAME
                        FOR XML PATH('')
                    ),1,1,'') AS LISTMODEL
                FROM [DMS].[dbo].UPLOAD_STAGE AS B WITH (NOLOCK)
                GROUP BY DOKUMEN, MODEL_INPUT
        ) AS DATA_B
        ON DATA_A.DOKUMEN = DATA_B.DOKUMEN
        LEFT JOIN 
        (
                SELECT T.DOKUMEN, T.DOKUMEN_UPDATE, R.MAXTIME
                FROM (
                    SELECT DOKUMEN, MAX(CREATED_AT) AS MAXTIME 
                    FROM [DMS].[dbo].UPLOAD_STAGE_LOG WITH (NOLOCK) 
                    GROUP BY DOKUMEN
                ) R
                INNER JOIN [DMS].[dbo].UPLOAD_STAGE_LOG T WITH (NOLOCK)
                ON T.DOKUMEN = R.DOKUMEN AND T.CREATED_AT = R.MAXTIME
        ) AS DATA_C
        ON DATA_A.DOKUMEN = DATA_C.DOKUMEN
        ORDER BY DATA_A.CREATED_AT DESC

                ")->result();
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
        return $this->db->query("SELECT * FROM [DMS].[DBO].STAGE WITH (NOLOCK) WHERE STAGE_ID = '$stage' ")->row();
    }
    
    public function tampil_model(){
        $model = $this->input->post('nama_model');
        $query = $this->db->query(" DECLARE @TANGGAL VARCHAR(6);
                                    SET @TANGGAL = (SELECT CONVERT(CHAR(6),GETDATE(),112) );
                                    select DISTINCT(MODEL) AS MODEL2, MODEL from [MEShs].[dbo].ZMD_IF_MATERIAL_MASTER WITH (NOLOCK) 
                                    WHERE CONVERT(CHAR(6), LMNT_DTTM,112) = @TANGGAL
                                    AND MODEL LIKE ('$model%')
                                    AND MODEL<>''
                                    ORDER BY MODEL");
        $model_sap="";
        foreach ($query->result_array() as $data ){
                    $model_sap.= "<option data-tokens='$data[MODEL]' value='$data[MODEL]' selected>$data[MODEL]</option>";
                    // $model_sap .="<option value='$data[MODEL]'>$data[MODEL]</option>";
        }
        return $model_sap;
      
    }

    public function get_file($file){
        $query = $this->db->query("		SELECT A.MODEL_INPUT, B.STAGE_NAME, A.TANGGAL, A.STATUS, A.REMARK, CONVERT(varchar(16), A.CREATED_AT, 120) AS CREATED_AT, A.DOKUMEN , C.DOKUMEN_UPDATE
                                        FROM [DMS].[dbo].[UPLOAD_STAGE] AS A WITH (NOLOCK)
                                        JOIN [DMS].[dbo].[STAGE] AS B WITH (NOLOCK)
                                        ON A.STAGE_ID = B.STAGE_ID
                                        LEFT JOIN [DMS].[dbo].UPLOAD_STAGE_LOG AS C WITH (NOLOCK)
                                        ON A.DOKUMEN = C.DOKUMEN
                                        WHERE A.DOKUMEN='$file'
                                        GROUP BY A.MODEL_INPUT, B.STAGE_NAME, A.TANGGAL, A.STATUS, A.REMARK, A.DOKUMEN, 
                                                CONVERT(varchar(16), A.CREATED_AT, 120), C.DOKUMEN_UPDATE
        ");
        return $query->row();
    }

    public function update_status($file){
        $query = $this->db->query("UPDATE [DMS].[DBO].[UPLOAD_STAGE]
                                    SET STATUS = 'RE-TRIAL PASSED',
                                    UPDATED_AT = GETDATE()
                                    WHERE DOKUMEN ='$file'

        ");
        return $query;
    }

    public function email_list(){
        $query = $this->db->query("SELECT * FROM [DMS].[DBO].EMAIL_STAGE 
                                        WHERE STATUS_PAKAI = 'Y'
                                        ORDER BY CREATED_AT");

        return $query->result();
    }

    public function insertEmail(){
        $nama        = $this->input->post('nama');
        $email      = $this->input->post('email');
        $departemen = $this->input->post('departemen');
        $job_level  = $this->input->post('job_level');

        $insert = $this->db->query("
                
                INSERT INTO [DMS].[dbo].[EMAIL_STAGE]
                        ([ALAMAT_EMAIL]
                        ,[NAMA]
                        ,[DEPARTEMEN]
                        ,[JOB_LEVEL]
                        ,[STATUS_PAKAI]
                        ,[CREATED_AT])
                    VALUES
                        ( '$email'
                        , '$nama'
                        , '$departemen'
                        , '$job_level'
                        , 'Y'
                        , GETDATE())
              
        "
        );
        return $insert;
    }

    public function deleteEmail(){
        $id = $this->input->post('id');

        $delete = $this->db->query("UPDATE [DMS].[dbo].[EMAIL_STAGE]
                                    SET STATUS_PAKAI = 'N'
                                    WHERE ID_EMAIL = '$id'
            ");
        return $delete;
    }
    

    public function list_email_kirim(){
        $query = $this->db->query("SELECT * FROM [DMS].[dbo].[EMAIL_STAGE] WHERE STATUS_PAKAI ='Y'");

        $email="";
        $jumlah = count($query->result_array());
        $i = 0;
        // foreach ($query->result_array() as $data ){
        $data = $query->result_array();    
        for ($i = 0; $i<$jumlah; $i++){
            if($i<$jumlah-1){
                $email.= $data[$i]['ALAMAT_EMAIL'].",";
            }else if($i==$jumlah-1){
                $email.= $data[$i]['ALAMAT_EMAIL'];
            }
            
        }
        return $email;
    
    }
   
}
