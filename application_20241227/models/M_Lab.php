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
	
	public function monthly_pickup_lab()
	{
        //$db2 = $this->load->database('qip_', TRUE);
        $art = $this->db->query("SELECT ART_NO, CELL_CODE FROM THPRODHIS WITH (NOLOCK)
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
	   $query = $this->db->query("SELECT TOP 20 PO_NO, ART_NO, CELL_CODE FROM THPRODHIS WITH (NOLOCK)");
	 //  print_r($query->result());
   }

   public function haha(){
	   $this->db->query("SELECT * FROM [QIP].[dbo].");
   }
   public function coba2(){
	$date = '2020-01-13';//date('Y-m-d');
	$db2 = $this->load->database('qip_', TRUE);
	$za=$this->db->query("select DISTINCT ART_NO,CELL_CODE from THPRODHIS WITH (NOLOCK) where convert(varchar, ASM_STR_DATE, 23)='$date' ORDER BY ART_NO ASC"); 
	//$b= $db2->query("select * from data where art='BB9774' and category='Bonding Daily'
	//and date='$date'")->result_array();
	//print_r($b);
	//print_r($za->result());
	echo "<br>$date <br><br><table border=1><tr><td>ART</td><td>CELL</td><td>Bonding</td><td>FGT</td><td>Upper</td></tr>";
	
	$menu = array();
	foreach ($za->result() as $row){
		echo"<tr>";
		echo "<td>".$row->ART_NO."</td><td>".$row->CELL_CODE."</td>";
		
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
}
}