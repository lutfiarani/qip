<!-- 
<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location = window.location.href;
    }
    setInterval('autoRefreshPage()', 60000);
</script> -->

<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $formtitle;?></h3>
            </div>
            <!-- /.card-header -->
          
            <div class="card card-primary">
            
            <form role="form" method="post">
               <div class="card-body">
                <!-- Date range -->
                
                
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
                      <label>SDD</label>
                      <select class="custom-select" name="sdd" id="sdd">
                        <option value="">All SDD</option>
                        
                      </select>
                    </div>
                  </div>
                  
                </div>
               </div>
            <!-- /.card -->
            <div class="card-footer">
                  <button type="button" id="lihatData" class="btn btn-primary lihatData" class="btn btn-primary">Search</button>
        </div>
        </form>
        <div class="card-body">
        <table id="InspectBalance" class="table table-bordered table-striped dt-responsive" cellspacing="0" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Fac</th>
                  <th>Cell</th>
                  <th>PO No</th>
                  <th>Model Name</th>
                  <th>Country</th>
                  <th>Cust No</th>
                  <th>Art</th>
                  <th>Qty</th>
                  <th>Qty Ctn</th>
                  <th>SDD</th>
                  <th>Type</th>
                  <th>Load No</th>
                  <th>Ex Fty</th>
                  <th>Inspection Date</th>
                  <th>Balance</th>
                  <th>Status</th>
                
                  

                  
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                </table>
                </div>
       
              <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
           
            <!-- <div class="table-responsive-sm"> -->




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
        
        
        // TableBalance.destroy();
        getSDD();

        // showtable();

        $("#factory").change(function(){
            var factory=$(this).val();
            $.ajax({
              data:{factory:factory},
              success: function(respond){
                // console.log(factory);
                $("#sdd").html(respond);
                }
            })
        });

        function getSDD(){
          var factory =$('#factory').val();
          $.ajax({
              type:"POST",
              url: "<?php echo site_url('C_Export/get_data_sdd/') ?>",
              data : {factory:factory},
              cache: false,
              // data : {id:id},
              success: function(respond){
                // console.log(value);
                $("#sdd").html(respond);
              }
          });
        }

      function showtable(){
        var sdd1 =$('#sdd').val();
        var factory1 =$('#factory').val();
       
        $('#InspectBalance').DataTable({
          "processing": true,
          "serverSide": true,
         
                "ajax"  :{
                  type      : "post",
                  url       : "<?php echo site_url('C_Export/inspect_balance_');?>",
                  data      : {sdd1:sdd1, factory1:factory1},
                  // datatype  : 'json',
                  
                  responsive: true
                },
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                  if (aData[16] == 'PRODUCTION') {
                      $('td', nRow).css('background-color', 'yellow');
                      // $('td', nRow).css('color', 'white');
                  }else if(aData[16] == 'RELEASE'){
                    $('td', nRow).css('background-color', 'green');
                  }else if(aData[16] == 'REJECT'){
                    $('td', nRow).css('background-color', 'red');
                  }else if(aData[16] == 'WAITING'){
                    $('td', nRow).css('background-color', 'blue');
                  }
                },
                "columnDefs": [
                    {
                        "targets": [ 16 ],
                        "visible": false,
                        "searchable": false
                    }
                ],
                paging: false
            });
        // });
      }

       
      $('#lihatData').on('click',function(){
       
        if(! $.fn.DataTable.isDataTable( '#InspectBalance' )){
          showtable();
        }

      })


    });
</script>