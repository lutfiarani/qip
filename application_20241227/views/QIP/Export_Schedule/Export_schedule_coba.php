<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/buttons.dataTables.min.css">

<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title" ><span id="title_export"></span></h3>
            </div>
            <!-- /.card-header -->
          
            <div class="card card-primary">
            
            <form role="form" method="post">
               <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="date" data-provide="datepicker" id="datepicker">
                          <label>Export Date</label>
                            <input placeholder="yyyy-mm-dd" type="date" class="form-control datepicker" name="EXPORT_DATE" id="ExportDate" autocomplete="off" value="<?php echo date('Y-m-d');?>">
                          <div class="input-group-addon">
                              <span class="glyphicon glyphicon-th"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Factory</label>
                      <select class="custom-select" name="factory" id="factory">
                        <option value="">All Factory</option>
                        <option value="A">Factory A</option>
                        <option value="B">Factory B</option>
                        <option value="C">Factory C</option>
                        <option value="D">Factory D</option>
                        <option value="E">Factory E</option>
                        <option value="H">Factory H</option>
                  
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
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
                  <button type="button" class="btn btn-primary" id="search_export">Search</button>
            </div>
        </form>
      </div>
      <div class="container-fluid table-responsive" id="export">
       
         
      </div>
    </div>
        <!-- /.col -->
    </div>
</section>

<script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>

<script src="<?php echo base_url();?>template/plugins/new_js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/buttons.flash.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/jszip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/pdfmake.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/vfs_fonts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/buttons.html5.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/buttons.print.min.js" type="text/javascript"></script>
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js"></script> -->
<script>
    function get_today(){
        var d       = new Date()
        var month   = d.getMonth()+1
        var day     = d.getDate()
        var output  = d.getFullYear() + '-' + 
                        (month<10 ? '0' : '') + month + '-'+
                        (day<10 ? '0' : '') + day
        $('#ExportDate').val(output)
    }

   

    function export_schedule(export_date, factory, country){
        $.ajax({
            url       : '<?php echo site_url('C_Export/export_')?>',
            type      : 'POST',
            dataType  : 'json',
            data      : {export_date:export_date, factory:factory, country:country},
            success   : function(data){
                var judul = ''
                var html = ''
                var alamat = ''
                var i, j;
                judul += '<span>EXPORT SCHEDULE TANGGAL '+export_date+'</span>'
                console.log(judul)
                html += ' <table class="table table-bordered" id="tabel_export" style="width:100%">'+
                        '<thead class="table-dark">'+
                          '<tr>'+
                              '<th scope="col">#</th>'+
                              '<th scope="col">Cell</th>'+
                              '<th scope="col">PO NO</th>'+
                              '<th scope="col">Model Name</th>'+
                              '<th scope="col">Dest</th>'+
                              '<th scope="col">Art</th>'+
                              '<th scope="col">Qty</th>'+
                              '<th scope="col">SDD</th>'+
                              '<th scope="col">Bal</th>'+
                              '<th scope="col">Type</th>'+
                          '</tr>'+
                        '</thead>'+
                      '<tbody id="export_schedule">'
                for( i = 0; i<data.container.length; i++){
                        
                        html += '<tr>'+
                        '<td></td>'+
                                '<td><strong>Container No : '+data.container[i].JUMLAH+'</strong></td>'+
                                
                                '<td style="display: none;"></td>'+
                                '<td style="display: none;"></td>'+
                                '<td style="display: none;"></td>'+
                                '<td style="display: none;"></td>'+
                                '<td style="display: none;"></td>'+
                                '<td style="display: none;"></td>'+
                                '<td style="display: none;"></td>'+
                                '<td style="display: none;"></td>'+
                        '</tr>'
                            for(k=0; k<data.export.length; k++){
                                alamat = "<?php echo site_url('C_Export/detail_export2/')?>"+data.export[k].PO_NO
                                if(data.container[i].JUMLAH == data.export[k].CONTAINER){
                                    if((data.export[k].STATUS_PO2 == 'RELEASE')||(data.export[k].STATUS_PO2 == 'PASS')||(data.export[k].STATUS_PO2 == 'VALIDATION PASS')){
                                        html += '<tr style="background-color: #46BF3A;">';
                                    }else if((data.export[k].STATUS_PO2 == 'REJECT')||(data.export[k].STATUS_PO2 == 'REJECTED')){
                                        html += '<tr style="background-color:#FF0000; ">';
                                    }else if(data.export[k].STATUS_PO2 == 'REPACKING'){
                                        html += '<tr style="background-color:#A0A0A0; ">';
                                    }else if(data.export[k].STATUS_PO2 == 'WAITING'){
                                        html += '<tr style="background-color:#3399FF; ">';
                                    }else if(data.export[k].STATUS_PO2 == 'PRODUCTION'){
                                        html += '<tr style="background-color:#f6f611; ">';
                                    }else if(data.export[k].STATUS_PO2 == 'CANCEL'){
                                        html += '<tr style="background-color:#FF8000; ">';
                                    }else if((data.export[k].STATUS_PO_AQL == 'WAITING') && (data.export[k].STATUS_PO2 == 'NOT YET VALIDATION')) {
                                        html += '<tr style="background-color:#3399FF; ">';
                                    }else if((data.export[k].STATUS_PO_AQL == 'PRODUCTION') && (data.export[k].STATUS_PO2 == 'NOT YET VALIDATION')) {
                                        html += '<tr style="background-color:#f6f611; ">';
                                    }else{
                                        html += '<tr>';
                                    }
                                    html += '<td scope="row">'+(k+1)+'</td>'+
                                    '<td>'+data.export[k].CELL+'</td>'+
                                    
                                    '<td><a href="'+alamat+'">'+data.export[k].PO_NO+'</a></td>'+
                                    '<td>'+data.export[k].MODEL_NAME+'</td>'+
                                    '<td>'+data.export[k].COUNTRY+'</td>'+
                                    '<td>'+data.export[k].ARTICLE+'</td>'+
                                    '<td>'+data.export[k].QTY+'</td>'+
                                    '<td>'+data.export[k].SDD+'</td>'+
                                    '<td>'+data.export[k].BAL+'</td>'+
                                    '<td>'+data.export[k].LOAD_TYPE+'</td>';
                                    // if(data.export[k].STATUS_PO2 == 'NOT YET VALIDATION'){
                                    //     html += '<td style="background-color:#FFFFFF">'+data.export[k].STATUS_PO2+'</td>'
                                    // }else if (data.export[k].STATUS_PO2 == 'VALIDATION PASS'){
                                    //     html += '<td style="background-color:#FFFFFF">'+data.export[k].STATUS_PO2+'</td>'
                                    // }else{
                                    //     html += '<td style="background-color:#FFFFFF"></td>'
                                    // }
                                    
                                    html += '</tr>'
                                }else{

                                }
                               
                            }
                       
                }
                html += ' </tbody>'+
                              '</table>'   
                $('#export').html(html);
                $('#title_export').html(judul);
              
                $(function () {
                  $("#tabel_export").DataTable({
                        dom: 'Bfrtip',
                            buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ],
                        "paging": false,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": false,
                        "info": true,
                        "autoWidth": true,
                        "responsive": true,
                        "destroy":true,
                        "retrieve": true,
                        "scrollY": 500,
                        "scrollX": true,
                        "scrollCollapse": true,
                        "aaSorting": []
                    }).columns.adjust().draw(); 
                })
              }
        })
    }
   
   
    function getcountry(id){
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

      $(document).ready(function(){
      
        
        var export_date     = $('#ExportDate').val();
        var factory         = $('#factory').val();
        var country         = $('#country').val();

        export_schedule(export_date, factory, country)
        
        $("#tanggal").html(export_date);
        getcountry(export_date);

        $("#EXPORT_DATE").change(function(){
            var value=$(this).val();
            $.ajax({
            data:{id:value},
            success: function(respond){
              console.log(value);
              $("#country").html(respond);
              }
            })
        });

        $('#search_export').on('click',function(){
            var export_date     = $('#ExportDate').val();
            var factory         = $('#factory').val();
            var country         = $('#country').val()
            export_schedule(export_date, factory, country)
        })

        
    })
</script>