
<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location = window.location.href;
    }
    setInterval('autoRefreshPage()', 60000);
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
            
            <form role="form" action=<?php echo $action;?> method="post">
               <div class="card-body">
                <!-- Date range -->
                
                <div class="form-group">
                    <div class="date" data-provide="datepicker" id="datepicker">
                        <label>Export Date</label>
                          <input placeholder="yyyy-mm-dd" type="text" class="form-control datepicker" name="EXPORT_DATE" id="EXPORT_DATE" autocomplete="off" value="<?php echo date('Y-m-d');?>">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
               <div class="row">
               <div class="col-sm-6">
                    <div class="form-group">
                      <label>Factory</label>
                      <select class="custom-select" name="factory" id="factory">
                        <option value="">All Factory</option>
                        <option value="A">Factory A</option>
                        <option value="B">Factory B</option>
                        <option value="C">Factory C</option>
                        <option value="D">Factory D</option>
                        <option value="E">Factory E</option>
                  
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Country</label>
                      <select class="custom-select" name="country" id="country">
                        <option value="">All Country</option>
                        
                      </select>
                    </div>
                  </div>
                  
                </div>
               </div>
            <!-- /.card -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Search</button>
        </div>
        </form>
        
      
       
              <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
            <!-- <div class="card-body"> -->

            <!-- <div class="table-responsive-sm"> -->
<?php
  $container = count($ana);
  $no = 1;
//   echo $container;
for($a = 1; $a <= $container; $a++){
  // <table  class='table table-bordered table-striped' style='width:100%'>
  // <th width='30'><center>Fac</center></th>
  
  // <td><center>$haha[FACTORY]</center></td>
        echo " 
        
        <br>
        <table class='table table-bordered table-striped' style='table-layout: fixed;' style='width:100%'>
        <thead>
        <tr>
        <th width='30'><center>No</center></th>
        
        <th width='65'><center>Cell</center></th>
        <th width='85'><center>PO No</center></th>
        <th width='100' style='word-wrap:break-word'><center>Model Name</center></th>
        <th width='70'><center>Dest</center></th>
        <th width='55'><center>Art</center></th>
        <th width='35'><center>qty</center></th>
        <th width='40'><center>SDD</center></th>
        <th width='50'><center>Type</center></th>
        <th width='100'><center>Validation</center></th>
        
        </tr>
        </thead>
        <tbody>";
        echo "<b>Container No : ".$a."</b>";
      
        
        foreach ($query as $haha) {
            # code...
           
            if($a != $haha['CONTAINER']){
                // echo $a;
                echo ' ';
                  
            } elseif ($a == $haha['CONTAINER']){
             
                //echo //left($haha['CONTAINER'],1);
                if ($haha['STATUS_PO2']=='RELEASE')
                    {
                      echo "<tr style='background-color:#00CC00'>";
                      $haha['STATUS_PO2']='';
                    } else if ($haha['STATUS_PO2']=='REJECT')
                    {
                      echo "<tr style='background-color:#FF0000'>";
                      $haha['STATUS_PO2']='';
                    } else if ($haha['STATUS_PO2']=='REPACKING')
                    {
                      echo "<tr style='background-color:#A0A0A0'>";
                      $haha['STATUS_PO2']='';
                    } else if ($haha['STATUS_PO2']=='WAITING')
                    {
                      echo "<tr style='background-color:#3399FF'>";
                      $haha['STATUS_PO2']='';
                    } else if ($haha['STATUS_PO2']=='PRODUCTION')
                    {
                      echo "<tr style='background-color:#f6f611'>";
                      $haha['STATUS_PO2']='';
                    } else if ($haha['STATUS_PO2']=='CANCEL')
                    {
                      echo "<tr style='background-color:#FF8000'>";
                      $haha['STATUS_PO2']='';
                    }else if (($haha['STATUS_PO2']=='PASS'))
                    {
                      echo "<tr style='background-color:#00CC00'>";
                    }
                    else if (($haha['STATUS_PO2']=='REJECTED'))
                    {
                      echo "<tr style='background-color:#FF0000'>";
                    }else if(($haha['STATUS_PO_AQL']=='WAITING')&&($haha['STATUS_PO2']=='NOT YET VALIDATION')){
                      echo "<tr style='background-color:#3399FF'>";
                    }else if(($haha['STATUS_PO_AQL']=='PRODUCTION')&&($haha['STATUS_PO2']=='NOT YET VALIDATION')){
                      echo "<tr style='background-color:#f6f611'>";
                    }
                echo "
                <td><center>".($no++)."</center></td>
                <td><center>$haha[CELL]</center></td>
                <td><center> <a href='".site_url('C_Export/detail_export/'.$haha['PO_NO'])."'>$haha[PO_NO]</a> </center></td>
                <td style='word-wrap:break-word'><center>$haha[MODEL_NAME]</center></td>
                <td><center>$haha[COUNTRY]</center></td>
                <td><center>$haha[ARTICLE]</center></td>
                <td><center>$haha[QTY]</center></td>
                <td><center>".substr($haha['SDD'],0, 6)."</center></td>
                <td><center>$haha[LOAD_TYPE]</center></td>";
                if(($haha['STATUS_PO2']=='REJECTED')||($haha['STATUS_PO2']=='VALIDATED')){
                  echo "<td><center>$haha[STATUS_PO2]</center></td>";
                }else{
                  echo "<td bgcolor='white'><center>$haha[STATUS_PO2]</center></td>";
                }
            echo "</tr>";
            }
        }
    // echo $a;
    // echo ' <table id="example1" class="table table-bordered table-striped" style="width:100%">
    // <thead>
    // <tr>
    //   <th>No</center></th>
    //   <th>Cont</center></th>
    //   <th>Fac</center></th>
    //   <th>Cell</center></th>
    //   <th>PO No</center></th>
    //   <th>Model Name</center></th>
    //   <th>Destination</center></th>
    //   <th>Art</center></th>
    //   <th>qty</center></th>
    //   <th>SDD</center></th>
    //   <th>Type</center></th>
    //   <th>PO Status</center></th>
    //   <th>Remark</center></th>
      
    // </tr>
    // </thead>
    // <tbody>';
    // }
    // else if ($a = $query['CONTAINER']){
    // $jumlah = count($query);
	//     for ($i=0; $i<$jumlah; $i++){
	// 			$data = $query[$i];
    //     if ($data['STATUS_PO2']=='RELEASE')
    //     {
    //       echo "<tr style='background-color:#91E3A5'>";
    //     } else if ($data['STATUS_PO2']=='REJECT')
    //     {
    //       echo "<tr style='background-color:#FF0000'>";
    //     } else if ($data['STATUS_PO2']=='REPACKING')
    //     {
    //       echo "<tr style='background-color:#A0A0A0'>";
    //     } else if ($data['STATUS_PO2']=='WAITING')
    //     {
    //       echo "<tr style='background-color:#3399FF'>";
    //     } else if ($data['STATUS_PO2']=='PRODUCT')
    //     {
    //       echo "<tr style='background-color:#FFFF99'>";
    //     } else if ($data['STATUS_PO2']=='CANCEL')
    //     {
    //       echo "<tr style='background-color:#FF8000'>";
    //     }
        // echo "
        //         <td style ='font-size: 90%;'>".($i+1)."</center></td>
        //         <td style ='font-size: 90%;'>$data[CONTAINER]</center></td>
        //         <td style ='font-size: 90%;'>$data[FACTORY]</center></td>
        //         <td style ='font-size: 90%;'>$data[CELL]</center></td>
        //         <td style ='font-size: 90%;'> <a href='".site_url('C_Export/detail_export/'.$data['PO_NO'])."'>$data[PO_NO]</a> </center></td>
        //         <td style ='font-size: 90%;'>$data[MODEL_NAME]</center></td>
        //         <td style ='font-size: 90%;'>$data[COUNTRY]</center></td>
        //         <td style ='font-size: 90%;'>$data[ART_NO]</center></td>
        //         <td style ='font-size: 90%;'>$data[TOTAL_QTY]</center></td>
        //         <td style ='font-size: 90%;'>$data[SDD]</center></td>
        //         <td style ='font-size: 90%;'>$data[TYPE]</center></td>
        //         <td style ='font-size: 90%;'>$data[STATUS_PO2]</center></td>
        //         <td style ='font-size: 90%;'>$data[REMARK]</center></td>
                
        //                     </tr>";
    // }
// }
    // echo "</tbody>
    // </table>";

}
?>

            <!-- <table id="example1" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th>No</center></th>
                  <th>Cont</center></th>
                  <th>Fac</center></th>
                  <th>Cell</center></th>
                  <th>PO No</center></th>
                  <th>Model Name</center></th>
                  <th>Destination</center></th>
                  <th>Art</center></th>
                  <th>qty</center></th>
                  <th>SDD</center></th>
                  <th>Type</center></th>
                  <th>PO Status</center></th>
                  <th>Remark</center></th>
                  
                </tr>
                </thead>
                <tbody> -->
                <?php
		// $jumlah = count($query);
	    // for ($i=0; $i<$jumlah; $i++){
		// 		$data = $query[$i];
        // if ($data['STATUS_PO2']=='RELEASE')
        // {
        //   echo "<tr style='background-color:#91E3A5'>";
        // } else if ($data['STATUS_PO2']=='REJECT')
        // {
        //   echo "<tr style='background-color:#FF0000'>";
        // } else if ($data['STATUS_PO2']=='REPACKING')
        // {
        //   echo "<tr style='background-color:#A0A0A0'>";
        // } else if ($data['STATUS_PO2']=='WAITING')
        // {
        //   echo "<tr style='background-color:#3399FF'>";
        // } else if ($data['STATUS_PO2']=='PRODUCT')
        // {
        //   echo "<tr style='background-color:#FFFF99'>";
        // } else if ($data['STATUS_PO2']=='CANCEL')
        // {
        //   echo "<tr style='background-color:#FF8000'>";
        // }
        // echo "
        //         <td style ='font-size: 90%;'>".($i+1)."</center></td>
        //         <td style ='font-size: 90%;'>$data[CONTAINER]</center></td>
        //         <td style ='font-size: 90%;'>$data[FACTORY]</center></td>
        //         <td style ='font-size: 90%;'>$data[CELL]</center></td>
        //         <td style ='font-size: 90%;'> <a href='".site_url('C_Export/detail_export/'.$data['PO_NO'])."'>$data[PO_NO]</a> </center></td>
        //         <td style ='font-size: 90%;'>$data[MODEL_NAME]</center></td>
        //         <td style ='font-size: 90%;'>$data[COUNTRY]</center></td>
        //         <td style ='font-size: 90%;'>$data[ART_NO]</center></td>
        //         <td style ='font-size: 90%;'>$data[TOTAL_QTY]</center></td>
        //         <td style ='font-size: 90%;'>$data[SDD]</center></td>
        //         <td style ='font-size: 90%;'>$data[TYPE]</center></td>
        //         <td style ='font-size: 90%;'>$data[STATUS_PO2]</center></td>
        //         <td style ='font-size: 90%;'>$data[REMARK]</center></td>
                
		// 					</tr>";
        
        /*echo "<tr>
        <td style ='font-size: 90%;'>".($i+1)."</center></td>
    <td style ='font-size: 90%;'>$data[id]</center></td>
    <td style ='font-size: 90%;'>$data[po]</center></td>
    <td style ='font-size: 90%;'>$data[date]</center></td>
    <td style ='font-size: 90%;'>$data[remark]</center></td>
   
   </tr>";*/
				  
				
		// }
  ?>
                </tbody>
                </table>
  <?php //}?>
            <!-- </div> -->
            <!-- /.card-body -->
          <!-- </div> -->
          <!-- /.card -->

          
        



          <!-- /.card -->
        <!-- </div> -->
        <!-- /.col -->
      <!-- </div> -->
      <!-- /.row -->
    </section>

    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <!-- jQuery -->
    <!--script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
 


    
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- <AdminLTE App > -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- <AdminLTE for demo purposes > -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
    <script src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>

<script>
  $.fn.datepicker.defaults.format = "yyyy-mm-dd";
  $('#datepicker').datepicker({
    // startDate: '-3d',
    todayHighlight: true,autoclose: true, 
});

$('#datepicker1').datepicker({
    // startDate: '-3d',
    todayHighlight: true,autoclose: true,
});
$('#sandbox-container input').datepicker({ 
 });

</script>
    <script>
    
      // var tablePartial;
      // function reload_table(){
      //   tablePartial.ajax.reload(null, false);
      // }

      $(document).ready(function(){
       
        getcountry();

        function getcountry(){
          var id =$('#EXPORT_DATE').val();
          $.ajax({
              type:"POST",
              url: "<?php echo site_url('C_Export/get_data_country_2/') ?>"+id,
              cache: false,
              // data : {id:id},
              success: function(respond){
                // console.log(value);
                $("#country").html(respond);
              }
          });
        }

        

        $("#EXPORT_DATE").change(function(){
            var value=$(this).val();
           // var factory = $('#factory').val();
            
            $.ajax({
            data:{id:value},
            success: function(respond){
              console.log(value);
              $("#country").html(respond);
              }
            })
            // }
            // console.log(value);
        });


    })
</script>