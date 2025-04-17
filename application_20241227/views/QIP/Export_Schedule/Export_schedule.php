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
                    <label> Export Date</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input placeholder="yyyy-mm-dd" type="text" class="form-control datepicker" name="EXPORT_DATE" id="EXPORT_DATE" value=<?php echo date('Y-m-d');?> autocomplete='off'>
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
        
      
       
            
            <div class="card-body">

            


            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                <th>No</th>
                  <th>Cont</th>
                  <th>Fac</th>
                  <th>Cell</th>
                  <th>PO No</th>
                  <th>Model Name</th>
                  <th>Dest</th>
                  <th>Art</th>
                  <th>qty</th>
                  <th>SDD</th>
                  <th>Type</th>
                  <th>Validation</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
		$jumlah = count($query);
	    for ($i=0; $i<$jumlah; $i++){
				$data = $query[$i];
        if (($data['STATUS_PO2']=='RELEASE')||($data['STATUS_PO2']=='NOTE'))
        {
          echo "<tr style='background-color:#00CC00'>";
          $data['STATUS_PO2']='';
        } else if (($data['STATUS_PO2']=='REJECT')||($data['STATUS_PO2']=='REJECTED'))
        {
          echo "<tr style='background-color:#FF0000'>";
          $data['STATUS_PO2']='';
        } else if ($data['STATUS_PO2']=='REPACKING')
        {
          echo "<tr style='background-color:#A0A0A0'>";
          $data['STATUS_PO2']='';
        } else if ($data['STATUS_PO2']=='WAITING')
        {
          echo "<tr style='background-color:#3399FF'>";
          $data['STATUS_PO2']='';
        } else if ($data['STATUS_PO2']=='PRODUCT')
        {
          echo "<tr style='background-color:#FFFF99'>";
          $data['STATUS_PO2']='';
        } else if ($data['STATUS_PO2']=='CANCEL')
        {
          echo "<tr style='background-color:#FF8000'>";
          $data['STATUS_PO2']='';
        }else if (($data['STATUS_PO2']=='NOT YET VALIDATION')||($data['STATUS_PO2']=='VALIDATED'))
        {
          echo "<tr style='background-color:#00CC00'>";
          
        }
        echo "
        <td style ='word-break:break-word; font-size: 90%;'>".($i+1)."</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[CONTAINER]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[FACTORY]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[CELL]</td>
        <td style ='word-break:break-word; font-size: 90%;'> <a href='".site_url('C_Export/detail_export/'.$data['PO_NO'])."'><b>$data[PO_NO]</b></a> </td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[MODEL_NAME]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[COUNTRY]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[ARTICLE]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[QTY]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[SDD]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[LOAD_TYPE]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[STATUS_PO2]</td>
   
        
       
        <td style ='word-break:break-word; font-size: 90%;'><a href='".site_url('C_Export/insert_status/'.$data['PO_NO'])."/"."RELEASE' name='STATUS_PO' class='btn btn-success btn-xs' >Release</a>
            <a href='".site_url('C_Export/insert_status/'.$data['PO_NO'])."/"."REJECT' name='STATUS_PO' class='btn btn-danger btn-xs'>Reject</a>
            <a href='".site_url('C_Export/insert_status/'.$data['PO_NO'])."/"."REPACKING' name='STATUS_PO' class='btn btn-secondary btn-xs'>Repacking</a>
            <a href='".site_url('C_Export/insert_status/'.$data['PO_NO'])."/"."CANCEL' name='STATUS_PO' class='btn btn-warning btn-xs'>Cancel</a>
            
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
    
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App >
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes >
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script-->
   
    <script>
    
      // var tablePartial;
      // function reload_table(){
      //   tablePartial.ajax.reload(null, false);
      // }

      $(document).ready(function(){
       
        $.ajaxSetup({
            type:"POST",
            url: "<?php echo site_url('C_Export/get_data_country/') ?>",
            cache: false,
        });

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