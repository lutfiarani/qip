<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ProductionByModel extends CI_Model {

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
   public function ProdResult(){
        $tanggal = $this->input->post('tanggal');
        $factory = $this->input->post('factory');

        $query   = ("EXEC [QIP].DBO.YSHA_PRODUCTION_V1 @TANGGAL='$tanggal', @FACTORY='$factory'");

        return $this->db->query($query)->result();
		// echo $query;
   }

   public function view_po_china(){
	$tanggal = $this->input->post('tanggal');
	$query = $this->db->query("EXEC [QIP].[dbo].[VIEW_PO_CHINA] @tanggal ='$tanggal'");
	return $query;
}
}
