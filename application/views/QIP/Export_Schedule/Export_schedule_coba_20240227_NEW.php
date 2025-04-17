

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
                    <div class="date" data-provide="datepicker" id="datepicker">
                        <label>Export Date</label>
                          <input placeholder="yyyy-mm-dd" type="date" class="form-control datepicker" name="EXPORT_DATE" id="ExportDate" autocomplete="off" value="<?php echo date('Y-m-d');?>">
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
      </div>
        <!-- /.col -->
    </div>
    <div class="container-fluid" id="export_schedule">
    </div>
<?php
//   $container = count($ana);
//   $no = 1;

// for($a = 1; $a <= $container; $a++){
//         echo " 
        
//         <br>
//         <table class='table table-bordered table-striped' style='table-layout: fixed;' style='width:100%'>
//         <thead>
//         <tr>
//         <th width='10'><center>No</center></th>
        
//         <th width='65'><center>Cell</center></th>
//         <th width='85'><center>PO No</center></th>
//         <th width='100' style='word-wrap:break-word'><center>Model Name</center></th>
//         <th width='70'><center>Dest</center></th>
//         <th width='55'><center>Art</center></th>
//         <th width='35'><center>qty</center></th>
//         <th width='40'><center>SDD</center></th>
//         <th width='20'><center>Bal</center></th>
//         <th width='50'><center>Type</center></th>
//         <th width='100'><center>Validation</center></th>
        
//         </tr>
//         </thead>
//         <tbody>";
//         echo "<b>Container No : ".$a."</b>";
//         foreach ($query as $haha) {
//             # code...
           
//             if($a != $haha['CONTAINER']){
//                 // echo $a;
//                 echo ' ';
                  
//             } elseif ($a == $haha['CONTAINER']){
             
//                 if (($haha['STATUS_PO2']=='RELEASE'))
//                 {
//                   echo "<tr style='background-color:#00CC00'>";
//                   $haha['STATUS_PO2']='';
//                 }
//                 else if ($haha['STATUS_PO2']=='REJECT')
//                 {
//                   echo "<tr style='background-color:#FF0000'>";
//                   $haha['STATUS_PO2']='';
//                 } else if ($haha['STATUS_PO2']=='REPACKING')
//                 {
//                   echo "<tr style='background-color:#A0A0A0'>";
//                   $haha['STATUS_PO2']='';
//                 } else if ($haha['STATUS_PO2']=='WAITING')
//                 {
//                   echo "<tr style='background-color:#3399FF'>";
//                   $haha['STATUS_PO2']='';
//                 } else if ($haha['STATUS_PO2']=='PRODUCTION')
//                 {
//                   echo "<tr style='background-color:#f6f611'>";
//                   $haha['STATUS_PO2']='';
//                 } else if ($haha['STATUS_PO2']=='CANCEL')
//                 {
//                   echo "<tr style='background-color:#FF8000'>";
//                   $haha['STATUS_PO2']='';
//                 }else if (($haha['STATUS_PO2']=='PASS'))
//                 {
//                   echo "<tr style='background-color:#00CC00'>";
//                 }
//                 else if (($haha['STATUS_PO2']=='REJECTED'))
//                 {
//                   echo "<tr style='background-color:#FF0000'>";
//                 }
            
//                 echo "
//                 <td><center>".($no++)."</center></td>
//                 <td><center>$haha[CELL]</center></td>
//                 <td><center> <a href='".site_url('C_Export/detail_export2/'.$haha['PO_NO'])."'>$haha[PO_NO]</a> </center></td>
//                 <td style='word-wrap:break-word'><center>$haha[MODEL_NAME]</center></td>
//                 <td><center>$haha[COUNTRY]</center></td>
//                 <td><center>$haha[ARTICLE]</center></td>
//                 <td><center>$haha[QTY]</center></td>
//                 <td><center>".substr($haha['SDD'],0, 6)."</center></td>
//                 <td><center>$haha[BAL]</center></td>
//                 <td><center>$haha[LOAD_TYPE]</center></td>";
//                 if(($haha['STATUS_PO2']=='REJECTED')||($haha['STATUS_PO2']=='VALIDATED')){
//                   echo "<td><center>$haha[STATUS_PO2]</center></td>";
//                 }else{
//                   echo "<td bgcolor='white'><center>$haha[STATUS_PO2]</center></td>";
//                 }
//             echo "</tr>";
//             }
//         }
// }
?>

          
                </tbody>
                </table>
 
    </section>

<script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>template/dist/js/demo.js"></script>

<script src="<?php echo base_url();?>template/plugins/new_js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/buttons.flash.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/jszip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/pdfmake.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/vfs_fonts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/buttons.html5.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/buttons.print.min.js" type="text/javascript"></script>

<script>
//   $.fn.datepicker.defaults.format = "yyyy-mm-dd";
//   $('#datepicker').datepicker({
//     // startDate: '-3d',
//     todayHighlight: true,autoclose: true, 
// });

// $('#datepicker1').datepicker({
//     // startDate: '-3d',
//     todayHighlight: true,autoclose: true,
// });
// $('#sandbox-container input').datepicker({ 
//  });

</script>
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
                var html = ''
                var i, j;
                for( i = 0; i<data.container.length; i++){
                    html +='<div class="card cards" >'+
                    '<h5 class="card-header" style="background-color: #B8EAED;">Container No : '+data.container[i].JUMLAH+'</h5>'+
                    '<div class="card-body"">'+
                        '<table class="table table-bordered" style="font-size: 12px">'+
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
                                '<th scope="col">Type</th>'+
                                '<th scope="col">Validation</th>'+
                            '</tr>'+
                            '</thead>'+
                            '<tbody>';
                            for(k=0; k<data.export.length; k++){
                                if(data.container[i].JUMLAH == data.export[k].CONTAINER){
                                    if((data.export[k].STATUS_PO2 == 'RELEASE')||(data.export[k].STATUS_PO2 == 'PASS')||(data.export[k].STATUS_PO2 == 'VALIDATION PASS')){
                                        html += '<tr style="background-color: #46BF3A; color: #FFFFFF">';
                                    }else if((data.export[k].STATUS_PO2 == 'REJECT')||(data.export[k].STATUS_PO2 == 'REJECTED')){
                                        html += '<tr style="background-color:#FF0000; color: white">';
                                    }else if(data.export[k].STATUS_PO2 == 'REPACKING'){
                                        html += '<tr style="background-color:#A0A0A0; color: white">';
                                    }else if(data.export[k].STATUS_PO2 == 'WAITING'){
                                        html += '<tr style="background-color:#3399FF; color: white">';
                                    }else if(data.export[k].STATUS_PO2 == 'PRODUCTION'){
                                        html += '<tr style="background-color:#f6f611; color: white">';
                                    }else if(data.export[k].STATUS_PO2 == 'CANCEL'){
                                        html += '<tr style="background-color:#FF8000; color: white">';
                                    }else if((data.export[k].STATUS_PO_AQL == 'WAITING') && (data.export[k].STATUS_PO2 == 'NOT YET VALIDATION')) {
                                        html += '<tr style="background-color:#3399FF; color: white">';
                                    }else if((data.export[k].STATUS_PO_AQL == 'PRODUCTION') && (data.export[k].STATUS_PO2 == 'NOT YET VALIDATION')) {
                                        html += '<tr style="background-color:#f6f611; color: white">';
                                    }else{
                                        html += '<tr>';
                                    }
                                    html += '<td scope="row">'+(k+1)+'</td>'+
                                    '<td>'+data.export[k].CELL+'</td>'+
                                    '<td><a href="/search_PO/'+data.export[k].PO_NO+'">'+data.export[k].PO_NO+'</a></td>'+
                                    '<td>'+data.export[k].MODEL_NAME+'</td>'+
                                    '<td>'+data.export[k].COUNTRY+'</td>'+
                                    '<td>'+data.export[k].ARTICLE+'</td>'+
                                    '<td>'+data.export[k].QTY+'</td>'+
                                    '<td>'+data.export[k].SDD+'</td>'+
                                    '<td>'+data.export[k].LOAD_TYPE+'</td>';
                                    if(data.export[k].STATUS_PO2 == 'NOT YET VALIDATION'){
                                        html += '<td style="background-color:#FFFFFF">'+data.export[k].STATUS_PO2+'</td>'
                                    }else if (data.export[k].STATUS_PO2 == 'VALIDATION PASS'){
                                        html += '<td style="background-color:#FFFFFF">'+data.export[k].STATUS_PO2+'</td>'
                                    }else{
                                        html += '<td style="background-color:#FFFFFF"></td>'
                                    }
                                    
                                    html += '</tr>'
                                }else{

                                }
                               
                            }
                            html +='</tbody>'+
                        '</table>'+
                    '</div>'+
                '</div>'+
                '<br>';
                }
                $('#export_schedule').html(html);
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

        $('#SearchExport').on('click',function(){
            var export_date     = $('#ExportDate').val();
            var factory         = $('#factory').val();
            var country         = $('#country').val()
            export_schedule(export_date, factory, country)
        })



    })
</script>