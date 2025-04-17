<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_FactoryStatus extends CI_Model {

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
   public function building_info(){
        $tanggal    = $this->input->post('tanggal');
        
        $query      = ("SELECT * FROM [QIP].[DBO].[FS_BUILDING_STATUS]
                                    WHERE WORKDATE = '$tanggal'
                                    ORDER BY BUILDING_TYPE, BUILDING_NAME ASC
                        ");

        return $this->db->query($query)->result();
        // echo $query;
   }

   public function updateGedung(){
        $column     = $this->input->post('column');
        $id         = $this->input->post('id');
        $value      = $this->input->post('value');

        $query = ("
                    UPDATE [QIP].[DBO].[FS_BUILDING_STATUS]
                    SET ".$column." = '$value',
                    UPDATED_AT = GETDATE()
                    WHERE ID= '$id'
                ");

        return $this->db->query($query);
        // echo $query;
   }

   public function display_image_fs(){
            $query = $this->db->query("SELECT A.IMAGE_ID
                        , IMAGE_NAME
                            
                        FROM QIP.DBO.FS_PRODUCTION_IMAGE A WITH (NOLOCK)
                        INNER JOIN
                        (
                            SELECT IMAGE_ID
                                    , MAX(CREATED_AT) AS CREATED_AT
                            FROM QIP.DBO.FS_PRODUCTION_IMAGE
                            GROUP BY IMAGE_ID
                        ) AS U
                        ON A.CREATED_AT = U.CREATED_AT
                        ORDER BY A.IMAGE_ID");

            return $query->result();
   }

   public function insert_image($id, $imagename){
        $query = $this->db->query("
                            INSERT INTO [QIP].[dbo].[FS_PRODUCTION_IMAGE]
                                        ([IMAGE_NAME]
                                        ,[CREATED_AT]
                                        ,[UPDATED_AT]
                                        ,[IMAGE_ID])
                                VALUES
                                        ('$imagename'
                                        ,GETDATE()
                                        ,GETDATE()
                                        ,$id)
        ");

        return $query;
   }

   private $_batchImport;
 
   public function setBatchImport($batchImport) {
       $this->_batchImport = $batchImport;
   }

   public function importBGrade() {
       $data = $this->_batchImport;
       
       $db2 = $this->load->database('qip',TRUE);
       $db2->insert_batch('FS_BGRADE_PO', $data);
   }

   public function delete_blank(){
        $query = $this->db->query("DELETE FROM [QIP].[DBO].FS_BGRADE_PO where po_no =''");
        return $query;
   }

   public function last_bgrade(){
        $query = $this->db->query("SELECT *  FROM [QIP].[DBO].FS_BGRADE_PO WHERE CREATED_AT IN (SELECT MAX(CREATED_AT) FROM [QIP].[DBO].FS_BGRADE_PO)");

        return $query->result();
   }
}
