<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>template/new_js/image_drag.css">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" /> 
<link rel="stylesheet" href="<?php echo base_url();?>template/new_js/sweetalert2/sweetalert2.min.css">



<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Factory Status</h3>
                    </div>
                    <div class="card-body">
                        <label for="tanggal">Workdate</label><input type="date" class="form-control" value="<?php echo date('Y-m-d');?>" id="tanggal" name="tanggal"><br>
                        <table class="table table-bordered table-responsive" id="tabel_gedung">
                        </table>
                    
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Upload B-Grade Data</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                        </div>
                        
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="view_previous" class="form-label"></label><br>
                                        <button type="button" id="view_previous" class="btn btn-warning btn-block btn-flat">View Previous Data</button>
                                    </div>
                                    <div class="col-md-8">
                                        <form method="post" id="bgrade_data" class="form-horizontal" enctype='multipart/form-data'>
                                            <label for="formFile" class="form-label"></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <!-- <button type="button" id="UPLOAD_BGRADE" class="btn btn-primary">Upload B-grade</button> -->
                                                    <a href="" class="btn btn-primary btn-sm" id="UPLOAD_BGRADE">Upload B-grade</a>
                                                </div>
                                                <div class="input-group-append">
                                                    <a href="<?= base_url('upload/format/template_upload_bgrade.xlsx') ?>" class="btn btn-info btn-sm">Download Format Import Data</a>
                                                </div>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Upload Internal Data</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <form method="post" id="image_internal" class="form-horizontal" enctype='multipart/form-data'>
                                    
                                    <div class="container">
                                     <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="id">Image Label</label>
                                            <select name="id" id="id" class="form-control">
                                                <option value="1">Internal Data</option>
                                                <option value="2">Adidas Data</option>
                                            </select>
                                        </div>
                                       <div class="form-group">
                                        <label>Choose File</label>
                                        <div class="preview-zone hidden">
                                         <div class="box box-solid">
                                          <div class="box-header with-border">
                                           <div><b>Preview</b></div>
                                           <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-danger btn-xs remove-preview">
                                             <i class="fa fa-times"></i> Reset This Form
                                            </button>
                                           </div>
                                          </div>
                                          <div class="box-body"></div>
                                         </div>
                                        </div>
                                        <div class="dropzone-wrapper">
                                         <div class="dropzone-desc">
                                          <i class="glyphicon glyphicon-download-alt"></i>
                                          <p>Choose an image file or drag it here.</p>
                                         </div>
                                         <input type="file" id="upload_gambar10" class="dropzone" name="files" accept="image/png, image/gif, image/jpeg" />
                                        </div>
                                       </div>
                                      </div>
                                     </div>
                                     <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" id="save_internal" class="btn btn-primary pull-right">Upload</button>
                                        </div>
                                     </div>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Uploaded Internal Image</h3>
                            </div>
                            <div class="card-body">
                                <div id="tampil_gambar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Uploaded Adidas Image</h3>
                            </div>
                            <div class="card-body">
                                <div id="tampil_gambar2"></div>
                            </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_previous">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Last BGrade Data Imported</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="">
            <div class="table-responsive">
                <table class="table table-bordered" id="tabel_bgrade">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>PO NO</td>
                            <td>EX FTY</td>
                            <td>QTY</td>
                            <td>AVR FOB</td>
                            <td>AMOUNT FOB</td>
                            <td>UPLOAD TIME</td>
                        </tr>
                    </thead>
                    <tbody id="last_bgrade">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

    <!-- /.content -->
    <script type="text/javascript" src="<?php  echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bs-custom-file-input/bs-custom-file-input.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/new_js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstable/bootstable.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/highcharts/highcharts.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/highcharts/export-data.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/highcharts/accessibility.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>template/new_js/datatable/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/new_js/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.mi"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/new_js/image_drag.js"></script>
   
    <script>
       
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $('#customFile').change(function() {
            var i = $(this).prev('label').clone();
            var file = $('#customFile')[0].files[0].name;
            $(this).prev('label').text(file);
        });

        function table_gedung(tanggal){
            $.ajax({
                type      : "POST",
                url       : "<?php echo site_url('C_FactoryStatus/building_info')?>", 
                dataType  : "JSON",
                data      : {tanggal:tanggal},
                success: function(data)
                
                {
                        var html = ''
                        var i, c
                        console.log(data.list)
                        html += '<thead>'+ 
                                '<tr>'+
                                '<th style="white-space: nowrap"><b>'+data.list[1].WORKDATE+'</b></th>'
                                for(i=0; i<data.list.length; i++){
                                    html += '<th>'+data.list[i].BUILDING_NAME+'</th>'
                                }

                        html += '</tr>'+
                                '</thead>'+
                                '<tbody >'+
                                    ''+
                                    '<tr>'+
                                        '<th>CELL</th>'
                                        for(c=0; c<data.list.length; c++){
                                            html += '<td class="updateGedung" data-id="'+data.list[c].ID+'" data-gedung="'+data.list[c].BUILDING_NAME+'" data-column="CELL" data-workdate="'+data.list[c].WORKDATE+'" data-building = "'+data.list[c].BUILDING_NAME+'" contenteditable>'+data.list[c].CELL+'</td>'
                                        }
                                    html += '</tr>'+
                                    '<tr>'+
                                        '<th>CAPACITY</th>'
                                        for(c=0; c<data.list.length; c++){
                                            html += '<td class="updateGedung" data-id="'+data.list[c].ID+'" data-gedung="'+data.list[c].BUILDING_NAME+'" data-column="CAPACITY" data-workdate="'+data.list[c].WORKDATE+'" data-building = "'+data.list[c].BUILDING_NAME+'" contenteditable>'+data.list[c].CAPACITY+'</td>'
                                        }
                                    html += '</tr>'+
                                    '<tr>'+
                                        '<th>WORKER</th>'
                                        for(c=0; c<data.list.length; c++){
                                            html += '<td class="updateGedung" data-id="'+data.list[c].ID+'" data-gedung="'+data.list[c].BUILDING_NAME+'" data-column="WORKER" data-workdate="'+data.list[c].WORKDATE+'" data-building = "'+data.list[c].BUILDING_NAME+'" contenteditable>'+data.list[c].WORKER+'</td>'
                                        }
                                    html += '</tr>'+
                                    '<tr>'+
                                        '<th>PPH</th>'
                                        for(c=0; c<data.list.length; c++){
                                            if(data.list[c].PPH === null){
                                                html += '<td class="updateGedung" data-id="'+data.list[c].ID+'" data-gedung="'+data.list[c].BUILDING_NAME+'" data-column="PPH" data-workdate="'+data.list[c].WORKDATE+'" data-building = "'+data.list[c].BUILDING_NAME+'" contenteditable></td>'
                                            }else{
                                                html += '<td class="updateGedung" data-id="'+data.list[c].ID+'" data-gedung="'+data.list[c].BUILDING_NAME+'" data-column="PPH" data-workdate="'+data.list[c].WORKDATE+'" data-building = "'+data.list[c].BUILDING_NAME+'" contenteditable>'+data.list[c].PPH +'</td>'
                                            }
                                            
                                        }
                                    html += '</tr>'+
                                    '<tr>'+
                                        '<th>UPDATED AT</th>'
                                        for(c=0; c<data.list.length; c++){
                                            html += '<td>'+data.list[c].UPDATED_AT+'</td>'
                                        }
                                    html += '</tr>'
                        html += '</tbody>'
                        $('#tabel_gedung').html(html);
                }
            })
                
        }
    
        function updateGedung(column, id, value){
            $.ajax({
                url:"<?php echo site_url('C_FactoryStatus/updateGedung')?>",
                data : {column:column, id:id, value:value},
                method:"POST",
                dataType : 'json',
                success:function(data)
                {
                    table_gedung()    
                    // alert(data)
                }
            })
        }

        function display_image(){
            $.ajax({
                type    : 'ajax',
                url     : "<?php echo site_url('C_FactoryStatus/display_image_fs');?>",
                async   : true,
                dataType: 'json',
                type    : 'POST',
                success:function(data){
                    var html    = ""
                    var html2   = ""
                    var alamat  = "<?php echo base_url();?>template/images/adidas_data/";
                    
                    if(data[0].IMAGE_ID == 1){
                        html        += '<img src="'+alamat+'/'+data[0].IMAGE_NAME+'" style="height: 250px; width: auto; max-width:500px" id="img1"></img>'
                        $('#tampil_gambar').html(html);
                    }
                    
                    html2        += '<img src="'+alamat+'/'+data[1].IMAGE_NAME+'" style="height: 250px; width: auto; max-width:500px" id="img2"></img>'

                    
                    $('#tampil_gambar2').html(html2);
                 
                }

            })
        }

        function save_image(){
            var formData = new FormData(document.querySelector("#image_internal"));
    
            $.ajax({
                url : "<?php echo site_url('C_FactoryStatus/save_image_fs')?>",
                type: 'post',
                data : formData,
                contentType : false,
                processData : false,
                dataType : "JSON",
                success : function(data){
                    // alert(data)
                    display_image('1')
                }
            })
        }

        function save_bgrade(){
            var formData = new FormData(document.querySelector("#bgrade_data"));
    
            $.ajax({
                url : "<?php echo site_url('C_FactoryStatus/import_BGrade')?>",
                type: 'post',
                data : formData,
                contentType : false,
                processData : false,
                dataType : "JSON",
                success : function(data){
                    // alert(data)
                    // display_image('1')
                    if(data =='Y'){
                        Swal.fire({
                            icon: 'success',
                            text: 'IMPORT DATA BERHASIL',
                        })
                    }else if (data == 'N'){
                        Swal.fire({
                            icon: 'error',
                            text: 'IMPORT DATA GAGAL',
                        })
                    }
                    
                }
            })
        }

        function last_bgrade(){
            $.ajax({
                type      : "POST",
                url       : "<?php echo site_url('C_FactoryStatus/last_bgrade')?>", 
                dataType  : "JSON",
                success: function(data)
                {
                    var html = ''
                    var i, c
                    console.log(data.list)
                  
                    for(c=0; c<data.length; c++){
                        html +='<tr>'+
                                    '<td>'+(c+1)+'</th>'+
                                    '<td>'+data[c].PO_NO+'</th>'+
                                    '<td>'+data[c].EX_FTY+'</th>'+
                                    '<td>'+data[c].QTY+'</th>'+
                                    '<td>'+data[c].AVR_FOB+'</th>'+
                                    '<td>'+data[c].AMOUNT_FOB+'</th>'+
                                    '<td>'+data[c].CREATED_AT+'</th>'+
                               '</tr>'
                    }
                               
                    
                    // $('#last_bgrade').html(html);
                    $('#tabel_bgrade tbody').append(html);
                    $(function () {
                        $("#tabel_bgrade").DataTable({
                            "responsive": true, "lengthChange": false, "autoWidth": false,
                            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                        }).buttons().container().appendTo('#tabel_bgrade_wrapper .col-md-6:eq(0)');
                    });
                    
                }
            })
        }


        $(document).on('click','#save_internal',function(){
            save_image()
        })

        $(document).on('click','#UPLOAD_BGRADE',function(){
            save_bgrade()
            // alert('hei')
        })

        $(document).on('click','#view_previous',function(){
            $('#modal_previous').modal('show');
            last_bgrade();
        })
     

        $(document).on('keyup', '.updateGedung', function(){
            var column      = $(this).data("column");
            var value       = $(this).text();
            var id          = $(this).data("id");
            // var workdate    = $(this).data("workdate");
            // var gedung      = $(this).data("gedung");


            updateGedung(column, id, value)
        });

        $(document).on('change', '#tanggal', function(){
            var tanggal = $('#tanggal').val()
            table_gedung(tanggal)
        })

        $('#code').on('shown.bs.modal', function (e) {
            last_bgrade()
        });

        // $('#tabel_bgrade').DataTable({
        //                 // // dom: 'Bfrtip',
        //                 // processing: true,
        //                 // // serverSide: true,
        //                 // buttons: [
        //                 //     'copy', 'csv', 'excel', 'pdf', 'print'
        //                 // ]
        //                 // // "bDestroy": true
        //               });

      
        $(document).ready(function(){
           
            bsCustomFileInput.init();
            var tanggal = $('#tanggal').val()
            table_gedung(tanggal)  

            // alert('hai') 
            display_image()
           
            // last_bgrade()

            // $('#tabel_bgrade').DataTable({
            //             dom: 'Bfrtip',
            //             processing: true,
            //             // serverSide: true,
            //             buttons: [
            //                 'copy', 'csv', 'excel', 'pdf', 'print'
            //             ]
            //             // "bDestroy": true
            //           });
            
        })
    </script>