<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/dist/css/jquery.dataTables.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->

  <!--datepicker-->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/datepicker/dist/css/bootstrap-datepicker.min.css">
 
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
                <div class="form-group">
                    <label for="exampleInputEmail1">PO NO</label>
                    <input type="text" class="form-control" name="PO_NO" id="PO_NO" placeholder="Enter PO NO">
                </div>
               </div>
            <!-- /.card -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="addInspect">Add Inspection</button>
        </div>
        </form>
        <div class="card-body">
          <div class="table-responsive-sm">
            <table id="todayInspect" class="table table-bordered table-striped" style="width:100%">
                <thead>
          
                           
                            <th>NO</th>
                            <th>FACTORY</th>
                            <th>PO NO</th>
                            <th>MODEL NAME</th>
                            <th>COUNTRY</th>
                            <th>ART</th>
                            <th>TOTAL QTY</th>
                            <th>TOTAL CTN</th>
                            <th>SDD</th>
                            <th>TYPE</th>
                            <th>CONT</th>
                            <th>EXPORT DATE</th>
                            <th>BALANCE CARTON</th>
                            <th>STATUS PO</th>
                            <th>INSPECT DATE</th>

                </thead>
                <tbody>
                </tbody>
            </table>
  </div>
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
    
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
    <script>
       var tableAddInspect;

       function reload_table(){
          tableAddInspect.ajax.reload(null, false);
       }
       $(document).ready(function(){
           
        tableAddInspect = $('#todayInspect').DataTable({
              "ajax":{
                url   : "<?php echo site_url('C_Inspection/today_inspect')?>",
                type  : 'GET',
                responsive: true
              }
                ,
                  "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    if (aData[13] == 'PRODUCTION') {
                        $('td', nRow).css('background-color', '#f6f611');
                        // $('td', nRow).css('color', 'white');
                    }else if(aData[13] == 'RELEASE'){
                      $('td', nRow).css('background-color', '#00CC00');
                    }else if(aData[13] == 'REJECT'){
                      $('td', nRow).css('background-color', '#FF0000');
                    }else if(aData[13] == 'WAITING'){
                      $('td', nRow).css('background-color', '#3399FF');
                    }else if(aData[13] == 'REPACKING'){
                      $('td', nRow).css('background-color', '#A0A0A0');
                    }else if(aData[13] == 'CANCEL'){
                      $('td', nRow).css('background-color', '#FF8000');
                    }else if(aData[13] == 'NOT YET VALIDATION'){
                      $('td', nRow).css('background-color', '#00CC00');
                    }else if(aData[13] == 'REJECTED'){
                      $('td', nRow).css('background-color', '#FF0000');
                    }else if(aData[13] == 'PASS'){
                      $('td', nRow).css('background-color', '#00CC00');
                    }
                    
                  },
                  "columnDefs": [
                      {
                          "targets": [ 13 ],
                          "visible": false,
                          "searchable": false
                      }
                  ], 
                  paging: false

              
            });
        
            $('#addInspect').on('click',function(){
              var PO_NO = $('#PO_NO').val();
              $.ajax({
                type    : "POST",
                url     : "<?php echo site_url('C_Inspection/input_inspection')?>",
                dataType: "JSON",
                data    : {PO_NO:PO_NO},
                success : function(data){
                    $('[name="PO_NO"]').val("");
                    //window.location.href = window.location.href;
                    reload_table();
                }
              });
            });

//Save product
      });


    </script>