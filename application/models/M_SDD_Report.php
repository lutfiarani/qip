<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_SDD_Report extends CI_Model {

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
    public function list_SDD(){
        $query = $this->db->query("
            SELECT DISTINCT(ZHSDD)  AS ZHSDD
            FROM [MEShs].dbo.ZPP_IF_LOADPLAN WITH (NOLOCK)
                WHERE ZLPVER IN (SELECT MAX(ZLPVER) FROM [MEShs].dbo.ZPP_IF_LOADPLAN WITH (NOLOCK))
                AND  ZHSDD >= CONVERT(CHAR(10), GETDATE(),120)
                ORDER BY ZHSDD ");
        
        return $query->result();
    }

    public function list_model(){
        $sdd    = $this->input->post('sdd');
        $query  = $this->db->query("
                       EXEC [QIP].[dbo].[YSHA_SDD_LIST_MODEL] @SDD = '$sdd'
        ");

        return $query->result();
    }

    public function list_po(){
        $sdd        = $this->input->post('sdd');
        $model_name = $this->input->post('model');

        $query      = ("
                    EXEC [QIP].[DBO].[YSHA_SDD_LIST_MODEL_PO] @SDD = '$sdd', @MODEL_NAME = '$model_name'
        ");

        return $this->db->query($query)->result();
        // echo $query;
    }

    public function model_list(){
        $query      = $this->db->query("EXEC [QIP].[dbo].[YSHA_MODEL_LIST]");
        return $query->result();
    }

    public function model_list_model_po(){
        $model = $this->input->post('model');
        
        $query = ("EXEC [QIP].[dbo].[YSHA_MODEL_LIST_MODEL_PO] @MODEL_NAME='$model'");
        return $this->db->query($query)->result();
        // echo $query;
    }

}
