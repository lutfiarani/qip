function insert_random(){
		
		$po_edit 		= $_POST['po_edit'];
		$partial_edit 	= $_POST['partial_edit'];
		$size_edit 		= $_POST['size_edit'];
		$ctn_no_edit 	= $_POST['ctn_no_edit'];
		$ctn_qty_edit 	= $_POST['ctn_qty_edit'];
		$qty_edit 		= $_POST['qty_edit'];
		$level_edit 	= $_POST['level_edit'];
		$remark 		= $_POST['remark'];
		$data 			= array();
		$cek_carton 	= $this->M_Aql->aql_carton_cek($po_edit, $partial_edit, $level_edit, $remark);

		// if ($cek_carton->num_rows() > 0){
			$index = 0; 
			if(is_array($po_edit) || is_object($po_edit))
			{
				foreach($po_edit as $data_PO){ 
				array_push($data, array(
					'PO_NO'=>$data_PO,
					'PARTIAL'=>$partial_edit[$index],  
					'LEVEL'=>$level_edit[$index],
					'SIZE'=>$size_edit[$index],
					'CTN_QTY'=>$ctn_qty_edit[$index],
					'CTN_NO'=>$ctn_no_edit[$index],
					'QTY'=>$qty_edit[$index]
				));
				
				$index++;
				}

			}
			
			$random = $this->M_Aql->save_random_batch($data);
			// $first_data = $this->M_Aql->save_first_data($po_edit, $partial_edit, $level_edit, $remark);
			// if($sql){ // Jika sukses
			// 	echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('index.php/c_mes/view_lc')."';</script>";
			// }else{ // Jika gagal
			// 	echo "<script>alert('Data gagal disimpan');window.location = '".base_url('index.php/c_mes/index')."';</script>";
			// }
			// echo json_encode($first_data);
		// }else{
			// return false;
			// echo "<script>alert('Data gagal disimpan');window.location = '".base_url('index.php/C_Aql/input_aql')."';</script>";
			// echo "salah";
		// }
	}




    public function save_first_data($po, $partial, $level, $remark){
        $query = $this->db->query("INSERT INTO [QIP].[dbo].QIP_AQL_DATA_FIRST
        SELECT A.PO_NO, A.PARTIAL, B.QTY AS PARTIAL_QTY, C.ART_NO AS ARTICLE, C.MODEL_NAME, C.GENDER, C.CUST_NO AS CUSTOMER,  B.INSPECT_DATE, B.INSPECTOR, B.LEVEL, A.CTN_NO AS CARTON_NO, A.CTN_QTY AS CARTON_QTY, A.SIZE, A.QTY AS QTY_INSPECT,A.REMARK AS REMARK, GETDATE() AS LMNT_DTTM  FROM 
         (
            SELECT * FROM [QIP].[dbo].QIP_AQL_RANDOM_PO WHERE PO_NO='$po' AND PARTIAL='$partial' 
            AND LEVEL='$level' AND REMARK='$remark'
        ) AS A
         JOIN   [QIP].[dbo].QIP_AQL_PO_PARTIAL_INFO AS B 
         ON     A.PO_NO= b.PO_NO AND A.PARTIAL=B.PARTIAL
         JOIN   [MEShs].[dbo].THWHHIS AS C
         ON     A.PO_NO=C.PO_NO");
         return $query;
    }