<script type="text/javascript">
  
    function konfirmasi(){
		var pilihan = confirm("apakah anda yakin akan menghapus data ini?");
		
		if(pilihan){
			return true;		
		}else{
			return false;
		}
	
	}

</script>

<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $formtitle;?></h3>
            </div>
            <!-- /.card-header -->
          
            <div class="card card-primary">
            
              
      
       
            
            <div class="card-body">

            


            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                <th>No</th>
                  <th>PO No</th>
                  <th>Inspection Date</th>
                  <th>Status Inspect</th>
                  <th>Tgl Input status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
		$jumlah = count($query);
	    for ($i=0; $i<$jumlah; $i++){
				$data = $query[$i];
        
        echo "<tr>
        <td style ='word-break:break-word; font-size: 90%;'>".($i+1)."</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[PO_NO]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[INSPECT_DATE]</td>";
        if ($data['STATUS_PO']===null){
          echo "<td style ='word-break:break-word; font-size: 90%;'>$data[STATUS_PO]</td>";
        }else{
          echo "<td style ='word-break:break-word; font-size: 90%;' bgcolor='red'>$data[STATUS_PO]</td>";
        }
        echo "<td style ='word-break:break-word; font-size: 90%;'>$data[MaxTime]</td>
        <td> <a href=\"".site_url('C_Inspection/delete/'.$data['ID_INSPECTION'])."\"onclick=\"return konfirmasi()\" class='btn btn-warning btn-xs' >Delete</a>
        <a href='".site_url('C_Inspection/insert_status/'.$data['PO_NO'])."/"."REJECT' name='STATUS_PO' class='btn btn-danger btn-xs'>Reject</a>
        </td>
							</tr>";
        
        /*echo "<tr>
        <td style ='word-break:break-word; font-size: 90%;'>".($i+1)."</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[id]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[po]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[date]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[remark]</td>
   
   </tr>";*/
				  
				
		}
  ?>
                </tbody>
                </table>
  <?php //}?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          
        



          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>