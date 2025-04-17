<!DOCTYPE html> 
<html>
<head>
    <title>Display Data</title>
</head>
<body>
    <!-- <h1>Display Data</h1> -->
    <button type="submit" id="save_pivot">Save</button>
    <form method="POST" id="form_pivot" name="form_pivot" enctype="multipart/form-data">
        <input type="text" name="po_nya" id="po_nya" value="<?php echo $po;?>">
        <?php
            foreach($decoded_data['po_line'] as $line){
                echo '<br><input type="text" id="PO[]" name="PO[]" value="'.$po.'">'.$po;
                echo '<br><input type="text" id="SKU[]" name="SKU[]" value="'.$line['sku']['sku_number'].'">'.$line['sku']['sku_number'];
                echo '<br><input type="text" id="SIZE[]" name="SIZE[]" value="'.$line['size'].'">'.$line['size'];
                echo '<br><input type="text" id="PROJECT_CODE[]" name="PROJECT_CODE[]" value="'.$line['sku']['project']['project_code'].'">'.$line['sku']['project']['project_code'];
            }
        ?>
    </form>
        <table border="1">
            <!-- <thead>
                <tr>
                    <th>PO Number</th>
                    <th>SKU</th>
                    <th>PROJECT_CODE</th>
                    
                </tr>
            </thead> -->
            <!-- <tbody id="trans_body"> -->
                
               
            <!-- </tbody> -->
        </table>
       
            <span id="trans_input"></span>
        
</body>
</html>
<!-- Scripts -->
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/new_js/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstable/bootstable.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/highcharts/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/highcharts/export-data.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/highcharts/accessibility.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>template/new_js/datatable/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/new_js/sweetalert2/sweetalert2.all.min.js"></script>
<!-- <script src="<?php echo base_url();?>template/plugins/toastr/toastr.min.js"></script> -->

<script>
    function pivot88_tracking(PO_NO){
      $.ajax({
          url       : "<?php echo site_url('C_pivot_aql/get_po_trans/');?>",
          type      : "POST",
          responsive: true,
          async     : true,
          dataType  : 'json',
          data      : {PO_NO:PO_NO},
          success   : function(data)
          {
                var html, html2, po = '';
                var tombol = '';
                var i, j, k;
                var jumlah = data.length
                             
                console.log(data)
                console.log(data.po_line)
                console.log(jumlah)
                for(i=0; i<data.po_line.length; i++){
                    html += '<tr>'+
                            // '<td>'+ (i+1)+'</td>'+
                            '<td>'+data.po_number+'</td>'+
                            '<td>'+data.po_line[i].sku.sku_number+'</td>'+
                            '<td>'+data.po_line[i].sku.project.project_code+'</td>'+
                            '</tr>'
                }
                html2 += ''
                html2+= '<form method="POST" name="form_pivot" id="form_pivot" enctype="multipart/form-data">'
                for(i=0; i<data.po_line.length; i++){
                    html2+= 
                            '<input type="text" id="PO[]" name="PO[]" value="'+data.po_number+'">'+data.po_number+''+
                            '<input type="text" id="SKU[]" name="SKU[]" value="'+data.po_line[i].sku.sku_number+'">'+data.po_line[i].sku.sku_number+''+
                            '<input type="text" id="PROJECT_CODE[]" name="PROJECT_CODE[]" value="'+data.po_line[i].sku.project.project_code+'">'+data.po_line[i].sku.project.project_code+''
                           
                }
                html2 += '</form>'
              
                $('#trans_body').html(html);

                $('#trans_input').html(html2);
            }

        })
    }

    $(document).on('click', '#save_pivot', function () {
    // $(function() {
        var form_data = new FormData(document.getElementById("form_pivot"));
        var html = ''

        $.ajax({
            url : "<?php echo site_url('C_pivot_aql/save_po_trans/');?>",
            method: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
            {
                console.log(data)
            },
            error: function(){
                console.log(data)
            }
        });
    })


    $(document).ready(function(){
        // var PO_NO = $('#po_nya').val()
        // pivot88_tracking(PO_NO)

        // $(document).on('click', '#save_pivot', function () {
        // $(function() {
        //     var form_data = new FormData(document.getElementById("form_pivot"));
        //     var html = ''

        //     $.ajax({
        //         url : "<?php echo site_url('C_pivot_aql/save_po_trans/');?>",
        //         method: "POST",
        //         data: form_data,
        //         contentType: false,
        //         processData: false,
        //         dataType: "JSON",
        //         success: function(data)
        //         {
        //             console.log(data)
                    
        //         }
        //     });
        // })
        window.close()
    })

</script>