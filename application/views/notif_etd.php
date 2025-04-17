<form id="telegramForm2" method="POST">
<!-- *Notifikasi Laporan Harian* <br />
Posisi : <?php echo date("Y-m-d H:i:s");?><br /> -->
<input id="judul" class="form-control" name="judul" type="text" value="*Notifikasi Laporan Harian*">
<input id="id" class="form-control" name="chat_id" type="hidden" value="-1002048474669" >
<input id="waktu" class="form-control" name="waktu" type="text" value="Waktu : <?php echo date("Y-m-d H:i:s");?>">
<!-- <input class="form-control" id="po" name="text" type="text" value='*<?php echo $data->PO_NO;?> ETD *<?php echo $data->ETD_DATE;?> has been sent now by *<?php echo $data->INSPECTOR_NAME;?> '/> -->
<!-- <input class="form-control" name="text" type="text" value='*<?php echo $data[0]['PO_NO']; ?> ETD *<?php echo $data[0]['ETD_DATE']?> has been sent now by *<?php echo $data[0]['INSPECTOR_NAME']?> '/> -->
<!-- <input class="form-control" name="text" type="text" value='*test'/>-->
<input class="form-control" name="text" type="hidden" value='* <?php echo $data[0]['PO_NO']?> * ETD *<?php echo $data[0]['ETD_DATE'];?>* has been set now by *<?php echo $data[0]['INSPECTOR_NAME'];?>*<?php echo "\n";?> '/> 
<span class="datanya"></span>

</form>
<script type="text/javascript" src="<?php  echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
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

<script>
    function kirim_notif(){
        $.ajax({
            type    : 'ajax',
            // url     : "https://api.telegram.org/bot5619207690:AAFA_QvqRyVBLmmISknK00A9YIETtDDwIlA/sendMessage?parse_mode=Markdown",  //asli
            // url     : "https://api.telegram.org/bot6639936918:AAFozjmvrs95lbMy5JSTxVL5cDRTZX3tC4I/sendMessage?parse_mode=Markdown",
            url     : "https://api.telegram.org/bot5619207690:AAFA_QvqRyVBLmmISknK00A9YIETtDDwIlA/sendMessage?parse_mode=Markdown",
            async   : true,
            type    : 'POST',
            data    : $('#telegramForm2').serialize(),
            dataType: 'html',
            success : function(data){
                // alert('data terkirim')
                $(".datanya").append(data);
                close();
            }
        })
    }

    $(document).ready(function(){
        kirim_notif()
    })
</script>