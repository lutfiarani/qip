<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Lab extends CI_Model {

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
	
	public function tampil_export()
	{
		$db2 = $this->load->database('qip_', TRUE);
		$query_qip = $db2->query("SELECT * FROM `export` WHERE DATE='2019-12-31'");
		$qip_export = $query_qip->result();
		
		foreach ($qip_export as $a) {
			$c[] =  $a->po;
		}
		
		$export = "SELECT *, CASE WHEN QTY_CRTN > WHIN THEN 'PRODUCT'
				WHEN QTY_CRTN = WHIN AND WHIN>WHOUT THEN 'WAITING'
				WHEN WHIN=WHOUT THEN 'RELEASE'
				END AS STATUS_CRTN FROM (
				SELECT FACTOR_CODE,PO_NO, MODEL_NAME, DESTINATION, TOTAL_QTY,SUM(CARTON_QTY) AS QTY_CRTN, SUM(WH_IN_QTY) AS WHIN, SUM(WH_OUT_QTY) AS WHOUT ,SDD
				FROM THWHHIS
				GROUP BY FACTOR_CODE,PO_NO, MODEL_NAME, DESTINATION, TOTAL_QTY,SDD) AS A 
				WHERE PO_NO IN (
				  ";
				  for($i = 0; $i<count($c); $i++){
					  if ($i < count($c) - 1 ){
						$export .= "'".$c[$i]."',";
					  }
					  else{
						$export .= "'".$c[$i]."'";
					  }
				}
		$export .= ")ORDER BY PO_NO";
		//echo $export;
		$query=$this->db->query($export);
		return $query->result_array();
	}



	public function monthly_pickup_lab()
	{
        //$db2 = $this->load->database('qip_', TRUE);
        $art = $this->db->query("SELECT ART_NO, CELL_CODE FROM THPRODHIS 
								WHERE CONVERT(CHAR(6), ASM_STR_DATE,112) = CONVERT(CHAR(6), GETDATE(),112)
								GROUP BY ART_NO, CELL_CODE");
        $art_list = $art->result();
		foreach ($art_list as $a) {
            $c[] =  $a->ART_NO;
          //  echo $a->ART_NO;
        }
        
        $list = "SELECT * FROM data WHERE art in ( ";
            for($i = 0; $i<count($c); $i++){
                if ($i < count($c) - 1 ){
                $list .= "'".$c[$i]."',";
                }
                else{
                $list .= "'".$c[$i]."'";
				}
			}
        $list .= ") ORDER BY art";
       // echo $list;
   }

   public function coba_select(){
	   $query = $this->db->query("SELECT TOP 20 PO_NO, ART_NO, CELL_CODE FROM THPRODHIS");
	 //  print_r($query->result());
   }

   public function haha(){
	   $this->db->query("SELECT * FROM [QIP].[dbo].");
   }
   public function coba2(){
	$date = '2020-01-13';//date('Y-m-d');
	$db2 = $this->load->database('qip_', TRUE);
	$za=$this->db->query("select DISTINCT ART_NO,CELL_CODE from THPRODHIS where convert(varchar, ASM_STR_DATE, 23)='$date' ORDER BY ART_NO ASC"); 
	//$b= $db2->query("select * from data where art='BB9774' and category='Bonding Daily'
	//and date='$date'")->result_array();
	//print_r($b);
	//print_r($za->result());
	echo "<br>$date <br><br><table border=1><tr><td>ART</td><td>CELL</td><td>Bonding</td><td>FGT</td><td>Upper</td></tr>";
	
	$menu = array();
	foreach ($za->result() as $row){
		echo"<tr>";
		echo "<td>".$row->ART_NO."</td><td>".$row->CELL_CODE."</td>";
		/*$b= $db2->query("select * from data where art='$row->ART_NO' and category='Bonding Daily' and date='$date' and cell=right('$row->CELL_CODE',3)
						");
		foreach($b->result() as $bb){
			if ($bb->art <> NULL){
			echo"<td>".$bb->art."</td>";
			} else if ($bb->art ===NULL){
				echo "<td>apanih</td>";
			}
		}
		*/
		//print_r($b->result());
		$b = $db2->query("select a.cell, a.po, a.art, a.style,b.article, 
				case when b.lab_in IS NULL then 'kosong'
				else b.lab_in
				end status_lab
				from (select * from pickup.data where art='$row->ART_NO' and category='Bonding Daily' and date='$date' and cell=right('$row->CELL_CODE',3)) a
				left join (select * from fgt.fgt where article = '$row->ART_NO'
				and substr(lab_in,1,7)=substr('$date',1,7)) as b 
				on a.art = b.article");
		foreach ($b->result() as $bb){
			echo "<td>".$bb->art."</td><td>".$bb->status_lab."</td>";
		}
		$d=$db2->query("select model_name,
		case when model_name ='' then 'kosong'
		else model_name
		end as model_name
		from fgt.fgt where fgt.article = '".$row->ART_NO."' and substr(fgt.lab_in,1,7)=substr('$date',1,7)")->result();
		echo"</tr>";
	}
	//while($z=sqlsrv_fetch_array($za, SQLSRV_FETCH_ASSOC)){
	/*	$data = array();
foreach ($za->result() as $row)
{
  // Add array keys to the array while looping...

 echo"<tr>";
  echo "<td>".$row->PO_NO."</td><td>".$row->ART_NO."</td><td>".$row->CELL_CODE."</td>";
	 $b= $db2->query("select id from data where art='".$row->ART_NO."' and category='Bonding Daily' and date='2019-09-19' order by id desc")->row();
	 echo "<td>$b[id]</td>";
  echo"</tr>";
}*/


	//	$b= $db2->query("select id from data where art='".$z['ART_NO']."' and category='Bonding Daily' and date='$date' order by id desc")->row();
	//	$f=$db2->query("select id,model_name,lab from fgt.fgt where fgt.article='".$z['ART_NO']."' and substr(fgt.lab_in,1,7)=substr('$date',1,7)")->row();
		//echo "<tr><td>".$z['PO_NO']."</td><td>".$z['ART_NO']."</td><td>".SUBSTR($z['CELL_CODE'],4)."</td>";
	/*	if($b['id']!=""){$color="green";$te="done";}else{$color="white";$te="";}
		echo "<td style='background-color:$color'>$te</td>";
		
		
		if($f['id']!=""){$color="green";$te="done";}else{
			$sto=$db2->query("select count(*) as a from shoe_stock where art='".$z['ART_NO']."'")->row();
			$te=$sto['a'];
			$color="white";
		}
		echo "<td style='background-color:$color'>$te</td>";
				
	/*	$c=$db2->query("select id from fgt.ct_upper where ct_upper.fgt='".$f['id']."'")->row();
		$sto=$db2->query("select count(*) as a from upper_stock where art='".$z['ART_NO']."'")->row();
		$te=$sto['a'];
		if($c['id']!=""){$color="green";$te="done";}else{
		
		$color="white";
		}
		echo "<td style='background-color:$color'>$te</td>";
				
		
		
		echo "</tr>"; 
	
   }*/


}
}