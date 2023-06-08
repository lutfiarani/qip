
<script>
  function removeWhereCondition()
  {
      $(this).closest("tr").remove();
  }

$.fn.datepicker.defaults.format = "yyyymmdd";
$('#datepicker').datepicker({
    startDate: '-90d',
    todayHighlight: true,autoclose: true,
});



  var total_amount = function(){
    var sum = 0;
    $('.amount').each(function(){
        var num = $(this).val();

        if(num != 0){
          sum = sum + parseInt(num);
        }
    });
    // $('#total_amount').val(sum);
    document.getElementById("total_amount").innerHTML = "Total Qty Inspected = " + sum;
    console.log(sum);
  }

</script>

<script>
//   Webcam.set({
//      width: 640,
//      height: 480,
//      image_format: 'jpeg',
//      jpeg_quality: 90,
//      dest_width: 640,
//      dest_height: 480,

//  });
//  Webcam.attach( '#my_camera' );

function upload_gambar(nama){
    $.ajax({
        type:"POST",
        url: "<?php echo site_url('C_pivot_aql/upload_image/') ?>",
        data : {nama:nama},
        cache: false,
        dataType : "JSON",
        success: function(data){
            alert("berhasil")
        }
    })
}

// function tampil_foto(){
//     $.ajax({
//         url: "<?php echo site_url('C_pivot_aql/tampil_foto/') ?>",
//         cache: false,
//         dataType : "JSON",
//         success: function(data){
//             var html =''
//             document.getElementById('image_preview').innerHTML = 
//                 '<img src="'+data[0].nama_foto+'"/>';
//         }
//     })
// }

function disp_image(PO_NO, PARTIAL, REMARK, LEVEL, LEVEL_USER, ARTICLE){
    $.ajax({
        type:"POST",
        url: "<?php echo site_url('C_pivot_validation/disp_product/') ?>",
        data : {PO_NO:PO_NO, PARTIAL:PARTIAL, REMARK:REMARK, LEVEL:LEVEL, LEVEL_USER:LEVEL_USER, ARTICLE:ARTICLE},
        cache: false,
        dataType : "JSON",
        success: function(data){
            var html =''
            var measurement=''
            var i
            var k
            
            var jumlah = data.length
            
            for(i=0; i<jumlah; i++){
                html +='<div class="col-md-3">'+
                            '<div class="form-group">'+
                                '<div class="input-group input-group ">'+
                                    '<input type="text" class="form-control" value="'+data[i].PHOTO_NAME+'" readOnly>'+
                                    '<span class="input-group-append">'+
                                        '<label class="btn btn-info btn-flat show_image" data-NAME="'+data[i].PHOTO_NAME+'" data-ARTICLE="'+data[i].ARTICLE+'" data-SEQ="'+data[i].SEQ+'" data-CODE="'+data[i].PHOTO_CODE+'">'+
                                            '<i class="fa fa-image"></i>'+
                                        '</label>'+
                                    '</span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
            }

            $('#display_product').html(html); 
        }
    })
}

function disp_image_product(PO_NO, PARTIAL, REMARK, LEVEL, LEVEL_USER, ARTICLE){
            var html =''
            var measurement=''
            var i
            var k
            for(i=0; i<6; i++){
                html += '<input type="hidden" id="PO_NO1" name="PO_NO1[]" value="'+PO_NO+'"/>'+
                        '<input type="hidden" id="PARTIAL1" name="PARTIAL1[]" value="'+PARTIAL+'"/>'+
                        '<input type="hidden" id="REMARK1" name="REMARK1[]" value="'+REMARK+'"/>'+
                        '<input type="hidden" id="LEVEL1" name="LEVEL1[]" value="II"/>'+
                        '<input type="hidden" id="LEVEL_USER1" name="LEVEL_USER1[]" value="'+LEVEL_USER+'"/>'+
                        '<input type="hidden" id="ARTICLE1" name="ARTICLE1[]" value="'+ARTICLE   +'">'
                html +='<div class="col-md-3">'+
                            '<div class="form-group">'+
                                '<div class="input-group input-group ">'+
                                    '<input type="text" class="form-control" name="photo_name[]" id="photo_name10'+i+'" readOnly>'+
                                    '<span class="input-group-append">'+
                                        '<label class="btn btn-danger btn-flat">'+
                                            '<input type="file" id="upload_gambar'+i+'" name="files[]" id_seq="'+i+'"/ accept="image/png, image/gif, image/jpeg" />'+
                                            '<input type="hidden" name="picture_code[]" id="picture_code" value="10'+i+'">'+
                                            '<i class="fa fa-camera"></i>'+
                                        '</label>'+
                                    '</span>'+
                                    '<span class="input-group-append">'+
                                        '<label class="btn btn-info btn-flat show_image">'+
                                            '<i class="fa fa-image"></i>'+
                                        '</label>'+
                                    '</span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
            }

            $('#upload_product').html(html); 
        
        }

function disp_image_measurement(PO_NO, PARTIAL, REMARK, LEVEL, LEVEL_USER, ARTICLE){
    var html =''
    var k
   
    for(k=1; k<=3; k++){
        html += '<input type="hidden" id="PO_NO1" name="PO_NO1[]" value="'+PO_NO+'"/>'+
                '<input type="hidden" id="PARTIAL1" name="PARTIAL1[]" value="'+PARTIAL+'"/>'+
                '<input type="hidden" id="REMARK1" name="REMARK1[]" value="'+REMARK+'"/>'+
                '<input type="hidden" id="LEVEL1" name="LEVEL1[]" value="II"/>'+
                '<input type="hidden" id="LEVEL_USER1" name="LEVEL_USER1[]" value="'+LEVEL_USER+'"/>'+
                '<input type="hidden" id="ARTICLE1" name="ARTICLE1[]" value="'+ARTICLE   +'">'
        html +='<div class="col-md-3">'+
                                '<div class="form-group">'+
                                    '<div class="input-group input-group ">'+
                                        '<input type="text" class="form-control" name="photo_name[]" id="photo_name20'+k+'"  readOnly>'+
                                        '<span class="input-group-append">'+
                                            '<label class="btn btn-danger btn-flat">'+
                                                '<input type="file" id="upload_gambar'+k+'" name="files[]" id_seqk="'+k+'" picture_code="20'+k+'"/>'+
                                                '<input type="hidden" name="picture_code[]" id="picture_code" value="20'+k+'">'+
                                                '<i class="fa fa-camera"></i>'+
                                            '</label>'+
                                        '</span>'+
                                        '<span class="input-group-append">'+
                                            '<label class="btn btn-info btn-flat">'+
                                                '<i class="fa fa-image"></i>'+
                                            '</label>'+
                                        '</span>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
    }
    $('#upload_measurement').html(html); 
}


$(document).ready(function(){
    var PO_NO       = $('#PO_NO').val();
    var PARTIAL     = $('#PARTIAL').val();
    var REMARK      = $('#REMARK').val();
    var LEVEL       = $('#LEVEL').val();
    var LEVEL_USER  = $('#LEVEL_USER').val();
    var ARTICLE     = $('#ARTICLE').val();

    disp_image(PO_NO, PARTIAL, REMARK, LEVEL, LEVEL_USER, ARTICLE)
    disp_image_product(PO_NO, PARTIAL, REMARK, LEVEL, LEVEL_USER, ARTICLE)
    disp_image_measurement(PO_NO, PARTIAL, REMARK, LEVEL, LEVEL_USER, ARTICLE)

    $('#input_gambar1').bind('change', function() { 
            var fileName = ''; 
            fileName = $(this).val(); $('#file-selected').html(fileName); 
    })

    //modal preview image
    // $(document).on('click','.preview_image',function(){
    //     $('#modal_preview_image').modal('show');
    //     tampil_foto();
    // })
    
    $(document).on('click','.show_image',function(){
        var ARTICLE  = $(this).attr("data-ARTICLE");
        var SEQ      = $(this).attr("data-SEQ");
        var CODE     = $(this).attr("data-CODE");
        var NAME     = $(this).attr("data-NAME");
        
        $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_pivot_validation/image_product')?>",
            dataType  : "JSON",
            data      : {ARTICLE:ARTICLE , SEQ:SEQ, CODE:CODE, NAME:NAME},
            success   : function(data)
            {
                var html    = ''
                var alamat  = "<?php echo base_url();?>template/images/aql_image";
                html        += '<img src="'+alamat+'/'+data.PHOTO_NAME+'" width="100%" height="100%" id="img1"></img>'

                $('#Modal_image').modal('show');
                $('#display_image').html(html);

            }
        });
    })


    function save_validation(){
        var formData = new FormData(document.querySelector("#form_validation"));
        if ((($("input:radio[name=Moisture_test]:checked").length == 0)||($("input:radio[name=CMA]:checked").length == 0))||($("input:radio[name=SlipOn_inspection]:checked").length == 0)||($("input:radio[name=CPSIA]:checked").length == 0)) {
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Alert',
                subtitle: 'Data not complete',
                body: 'Please check your data again. make sure the <b>CPSIA, CMA, Moisture Test, and Slip On Inspection</b> have been filled in.'
            })
        }
         
           
        $('form').find(':input:not(:checkbox, :radio)').each(function () {
                formData.append(this.name, $(this).val());
        });

        $.ajax({
            url : "<?php echo base_url();?>/C_pivot_validation/save_validation",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
            {
                location.href = data.url;
            },
        });
    }

    function save_product(){
        var formData = new FormData(document.querySelector("#gambar_product"));

        $.ajax({
            url : "<?php echo base_url();?>/C_pivot_validation/save_image",
            type : "POST",
            data : formData,
            contentType : false,
            processData : false,
            dataType : "JSON",
            success : function(data){
                // alert(data)
            }
        })
    }


    function save_measurement(){
        var formData = new FormData(document.querySelector("#gambar_measurement"));

        $.ajax({
            url : "<?php echo base_url();?>/C_pivot_validation/save_image",
            type : "POST",
            data : formData,
            contentType : false,
            processData : false,
            dataType : "JSON",
            success : function(data){
                // alert(data)
            }
        })
    }

    $(document).on('click','#save_validation',function(){
        // var CPSIA = $("#")

        save_product();
        save_measurement()
        save_validation(); 
    })

    
    $('[id^="upload_gambar"]').bind('change', function() { 
            var fileName    = ''; 
            var id          = $(this).attr('id_seq');
            var idk          = $(this).attr('id_seqk');
            fileName        = $(this).val(); 
            var filenamea   = fileName.match(/[^\\/]*$/)[0];

            $('#photo_name10'+id).val(filenamea); 
            $('#photo_name20'+idk).val(filenamea); 
    })


})
       
</script>