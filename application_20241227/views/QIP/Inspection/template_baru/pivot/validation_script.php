
<script>
const theButton = document.querySelector(".buttontry");

theButton.addEventListener("click", () => {
    theButton.classList.add("buttontry--loading");
});

function removeWhereCondition()
{
    $(this).closest("tr").remove();
}
 
window.reset = function(e) {
  e.wrap('<form>').closest('form').get(0).reset();
  e.unwrap();
}

function DeletePhotoMeasurement(i) { 
    var control = '#photo_name20'+i                        
    reset($(control))
}

function DeletePhotoProduct(i) { 
    var control = '#photo_name10'+i                        
    reset($(control))
}

// function DisplayPhotoProduct(i) {
//     var id_product  = '#photo_name10'+i    
//     var output      = document.getElementById(id_product);
//     output.src      = URL.createObjectURL(event.target.files[0]);
//     output.onload = function() {
//       URL.revokeObjectURL(output.src) // free memory
//     }
// };

function readPhoto(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // $('#display_prevs').attr('src', e.target.result);
            document.getElementById('display_prevs').innerHTML = '<br><h1>Preview</h1><br> <img src="'+e+'"/>';
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$.fn.datepicker.defaults.format = "yyyymmdd";
$('#datepicker').datepicker({
    startDate: '-90d',
    todayHighlight: true,autoclose: true,
});

var total_amount = function(){
    var sum = 0;
    $('.amount_qty').each(function(){
        var num = $(this).text();

        if(num != 0){
          sum = sum + parseInt(num);
        }
    });
    // $('#total_amount').val(sum);
    document.getElementById("total_amount").innerHTML = " " + sum;
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

function disp_image(PO_NO, PARTIAL, LEVEL, LEVEL_USER, ARTICLE){
    $.ajax({
        type:"POST",
        url: "<?php echo site_url('C_pivot_validation/disp_product/') ?>",
        data : {PO_NO:PO_NO, PARTIAL:PARTIAL, LEVEL:LEVEL, LEVEL_USER:LEVEL_USER, ARTICLE:ARTICLE},
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
                                    '<input type="text" class="form-control" value="'+data[i].PHOTO_NAME+'" id="mcs_ready'+i+'" readOnly>'+
                                    '<span class="input-group-append">'+
                                        '<label class="btn btn-info btn-flat show_image" data-NAME="'+data[i].PHOTO_NAME+'" data-ARTICLE="'+data[i].ARTICLE+'" data-SEQ="'+data[i].SEQ+'" data-CODE="'+data[i].PHOTO_CODE+'">'+
                                            '<i class="fa fa-image"></i>'+
                                        '</label>'+
                                    '</span>'+
                                    '<span class="input-group-append">'+
                                        '<label class="btn btn-danger btn-flat delete_display" data-PARTIAL="'+data[i].PARTIAL+'" data-PO="'+data[i].PO_NO+'"  data-NAME="'+data[i].PHOTO_NAME+'" data-ARTICLE="'+data[i].ARTICLE+'" data-SEQ="'+data[i].SEQ+'" data-CODE="'+data[i].PHOTO_CODE+'">'+
                                            '<i class="fa fa-trash"></i>'+
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

function disp_measurements(PO_NO, PARTIAL, LEVEL, LEVEL_USER, ARTICLE){
    $.ajax({
        type:"POST",
        url: "<?php echo site_url('C_pivot_validation/disp_measurements/') ?>",
        data : {PO_NO:PO_NO, PARTIAL:PARTIAL, LEVEL:LEVEL, LEVEL_USER:LEVEL_USER, ARTICLE:ARTICLE},
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
                                    '<input type="text" class="form-control" id="measure_ready'+i+'" value="'+data[i].PHOTO_NAME+'" readOnly>'+
                                    '<span class="input-group-append">'+
                                        '<label class="btn btn-info btn-flat show_image" data-NAME="'+data[i].PHOTO_NAME+'" data-ARTICLE="'+data[i].ARTICLE+'" data-SEQ="'+data[i].SEQ+'" data-CODE="'+data[i].PHOTO_CODE+'">'+
                                            '<i class="fa fa-image"></i>'+
                                        '</label>'+
                                    '</span>'+
                                    '<span class="input-group-append">'+
                                        '<label class="btn btn-danger btn-flat delete_display" data-PARTIAL="'+data[i].PARTIAL+'" data-PO="'+data[i].PO_NO+'"  data-NAME="'+data[i].PHOTO_NAME+'" data-ARTICLE="'+data[i].ARTICLE+'" data-SEQ="'+data[i].SEQ+'" data-CODE="'+data[i].PHOTO_CODE+'">'+
                                            '<i class="fa fa-trash"></i>'+
                                        '</label>'+
                                    '</span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                        
            }

            $('#display_measurements').html(html); 
            
        }
    })
}

function disp_image_product(PO_NO, PARTIAL, LEVEL, LEVEL_USER, ARTICLE){
            var html =''
            var measurement=''
            var i
            var k
            var nama_id
        for(i=1 ; i<=6; i++)            {
            html += '<input type="hidden" id="PO_NO1" name="PO_NO1[]" value="'+PO_NO+'"/>'+
                    '<input type="hidden" id="PARTIAL1" name="PARTIAL1[]" value="'+PARTIAL+'"/>'+
                    // '<input type="hidden" id="REMARK1" name="REMARK1[]" value="'+REMARK+'"/>'+
                    '<input type="hidden" id="LEVEL1" name="LEVEL1[]" value="II"/>'+
                    '<input type="hidden" id="LEVEL_USER1" name="LEVEL_USER1[]" value="'+LEVEL_USER+'"/>'+
                    '<input type="hidden" id="ARTICLE1" name="ARTICLE1[]" value="'+ARTICLE   +'">'
            html +='<div class="col-md-3">'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group ">'+
                                '<input type="text" class="form-control" name="photo_name[]" id="photo_name10'+i+'" readOnly>'+
                                '<span class="input-group-append">'+
                                    '<label class="btn btn-success btn-flat">'+
                                        '<input type="file" id="upload_gambar10'+i+'" name="files[]" id_seq="'+i+'"/ accept="image/png, image/gif, image/jpeg" />'+
                                        '<input type="hidden" name="picture_code[]" id="picture_code" value="10'+i+'">'+
                                        
                                        '<i class="fa fa-camera"></i>'+
                                    '</label>'+
                                '</span>'+
                                '<span class="input-group-append" id="open_image10'+i+'">'+
                                    '<label class="btn btn-info btn-flat show_image">'+
                                        '<i class="fa fa-image"></i>'+
                                    '</label>'+
                                '</span>'+
                                '<span class="input-group-append"  id="clear">'+
                                        '<label class="btn btn-danger btn-flat" onClick="DeletePhotoProduct('+i+')">'+
                                            '<i class="fa fa-trash"></i>'+
                                        '</label>'+
                                '</span>'+
                            '</div>'+
                        '</div>'+
                        '<img id="photoShowId10'+i+'" src="" width="120" height="150" style="border: 1px solid blue" hidden/>'+
                    '</div>'
        }
        $('#upload_product').html(html); 
}
        

function disp_image_measurement(PO_NO, PARTIAL, LEVEL, LEVEL_USER, ARTICLE){
    var html =''
    var i
    var y
    var nama_id, nama_id1
    var cobalah
    for(i=1; i<=3; i++)   {
        
        html += '<input type="hidden" id="PO_NO1" name="PO_NO1[]" value="'+PO_NO+'"/>'+
                '<input type="hidden" id="PARTIAL1" name="PARTIAL1[]" value="'+PARTIAL+'"/>'+
                // '<input type="hidden" id="REMARK1" name="REMARK1[]" value="'+REMARK+'"/>'+
                '<input type="hidden" id="LEVEL1" name="LEVEL1[]" value="II"/>'+
                '<input type="hidden" id="LEVEL_USER1" name="LEVEL_USER1[]" value="'+LEVEL_USER+'"/>'+
                '<input type="hidden" id="ARTICLE1" name="ARTICLE1[]" value="'+ARTICLE   +'">'
  
        html +='<div class="col-md-3">'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group ">'+
                                '<input type="text" class="form-control" name="photo_name[]" id="photo_name20'+i+'"  readOnly>'+
                                '<span class="input-group-append">'+
                                    '<label class="btn btn-success btn-flat">'+
                                        '<input type="file"  id="upload_gambar'+i+'" name="files[]" id_seqk="'+i+'" picture_code="20'+i+'" accept="image/png, image/gif, image/jpeg"/>'+
                                        '<input type="hidden" name="picture_code[]" id="picture_code'+i+'" value="20'+i+'">'+
                                        '<i class="fa fa-camera"></i>'+
                                    '</label>'+
                                '</span>'+
                                '<span class="input-group-append" id="open_image'+i+'">'+
                                    '<label class="btn btn-info btn-flat">'+
                                        '<i class="fa fa-image"></i>'+
                                    '</label>'+
                                '</span>'+
                                '<span class="input-group-append"  id="clear">'+
                                    '<label class="btn btn-danger btn-flat" onClick="DeletePhotoMeasurement('+i+')">'+
                                        '<i class="fa fa-trash"></i>'+
                                    '</label>'+
                                '</span>'+
                            '</div>'+
                            '<img id="photoShowId'+i+'" src="" width="120" height="150" style="border: 1px solid blue" hidden/>'+
                        '</div>'+
                    '</div>'
    }  
          
    $('#upload_measurement').html(html); 
    
}

function checkSize(id, id2){
        var fileLimit       = 2024; // limit the file size goes here
        var files           = id.files; //this is an array
        var fileSize        = files[0].size; 
        var fileSizeInKB    = (fileSize/1024); // this would be converted byte into kilobyte

        if(fileSizeInKB < fileLimit){
        } else {
            // id.val('')
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Your Image is more than 2MB, please choose another one',
            }).then(function () {
                reset($('#' + id2))
            });
        }
}

function readFile(input) {
    if (input.files && input.files[0]) {
        var reader  = new FileReader();
        var image   = new Image(); 
        reader.onload = function (e) {
            $('#photoShowId').attr('src', e.target.result);
            $(image).ready(function($) {
                $('#Modal_image_prev').modal('show');
            });
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+ id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

   
function random_detail(PO_NO, PARTIAL){
    $.ajax({
        type:"POST",
        url: "<?php echo site_url('C_pivot_validation/view_random/') ?>",
        data : {PO_NO:PO_NO, PARTIAL:PARTIAL},
        cache: false,
        dataType : "JSON",
        success: function(data){
            var html =''
            var jumlah = 0
            var i
            var k = 0
            
            
            html += '<thead><tr><th>SIZE</th>'
            for(i=0; i< data.length; i++){
                html += '<th>'+data[i].SIZE+'</th>'
            }
            html += '<th>TOTAL</th></tr></thead><tbody><tr><th>QTY</th>'

            for(i=0; i< data.length; i++){
                k = parseInt(data[i].QTY)
                if(data[i].STAGE == '2'){
                    html +='<td style="background-color:yellow" class="amount_qty" data-size="'+data[i].SIZE+'" contenteditable>'+k+'</td>'
                }else{
                    html +='<td style="background-color:#ADEBEE" class="amount_qty" data-size="'+data[i].SIZE+'">'+k+'</td>'
                }
            }
            
            html +='<td><b><span id="total_amount"></span></b></td>'+
                    '</tr></tbody>'

            $('#random_detail').html(html); 
            total_amount()
        }
    })
}

function booking_ctn(PO_NO, PARTIAL){
    $.ajax({
        type:"POST",
        url: "<?php echo site_url('C_pivot_validation/view_booking_ctn/') ?>",
        data : {PO_NO:PO_NO, PARTIAL:PARTIAL},
        cache: false,
        dataType : "JSON",
        success: function(data){
            var html =''
            var jumlah = 0
            var i
            var k = 0
            
            
            html += '<thead><tr><th>BOOKING COMMENT</th><th>CARTON NO</th></thead>'
            html += '<tbody><tr>'+
                    '<td bgcolor="#F7C8AB" data-column="BOOKING_COMMENT" data-po="'+data.PO_NO+'" data-partial="'+data.PARTIAL+'" id="booking1" name="booking1" class="updateBookingCtn" contenteditable>'+data.BOOKING_COMMENT+'</td>'+
                    '<td bgcolor="#F7C8AB" data-column="CTN_NO" data-po="'+data.PO_NO+'" data-partial="'+data.PARTIAL+'" name="ctn1" class="updateBookingCtn" contenteditable>'+data.CTN_NO+'</td></tbody>'

            $('#booking_ctn').html(html); 
          
        }
    })
}

function update_random(PO_NO, PARTIAL, SIZE, VALUE){
    $.ajax({
        type:"POST",
        url: "<?php echo site_url('C_pivot_validation/update_random/') ?>",
        data : {PO_NO:PO_NO, PARTIAL:PARTIAL, SIZE:SIZE, VALUE:VALUE},
        cache: false,
        dataType : "JSON",
        success: function(data){
            console.log(data)
        }
    })
}

$(document).on('blur', '.updateBookingCtn', function(){
    var po      = $(this).data("po");
    var partial = $(this).data("partial");
    var column  = $(this).data("column");
    var value   = $(this).text();

    update_data(po, partial, column, value);
});

function update_data(po, partial, column, value){
    $.ajax({
        url:"<?php echo site_url('c_pivot_validation/updateBookingCtn')?>",
        data : {po:po, partial:partial, column:column, value:value},
        method:"POST",
        dataType : 'json',
        success:function(data)
        {
            booking_ctn(po, partial);
        }
    })
}

$(document).ready(function(){
    var PO_NO       = $('#PO_NO').val();
    var PARTIAL     = $('#PARTIAL').val();
    // var REMARK      = $('#REMARK').val();
    var LEVEL       = $('#LEVEL').val();
    var LEVEL_USER  = $('#LEVEL_USER').val();
    var ARTICLE     = $('#ARTICLE').val();

    disp_image(PO_NO, PARTIAL, LEVEL, LEVEL_USER, ARTICLE)
    disp_measurements(PO_NO, PARTIAL, LEVEL, LEVEL_USER, ARTICLE)
    disp_image_product(PO_NO, PARTIAL, LEVEL, LEVEL_USER, ARTICLE)
    disp_image_measurement(PO_NO, PARTIAL, LEVEL, LEVEL_USER, ARTICLE)
    random_detail(PO_NO, PARTIAL)
    booking_ctn(PO_NO, PARTIAL)

    $('#input_gambar1').bind('change', function() { 
            var fileName = ''; 
            fileName = $(this).val(); $('#file-selected').html(fileName); 
    })

   $(document).on('blur', '.amount_qty', function(){
        var SIZE    = $(this).attr("data-size")
        var VALUE   = $(this).text();
        
        update_random(PO_NO, PARTIAL, SIZE, VALUE)
        total_amount()
    });

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


    $(document).on('click','.delete_display',function(){
        var PO       = $(this).attr("data-PO");
        var SEQ      = $(this).attr("data-SEQ");
        var CODE     = $(this).attr("data-CODE");
        var NAME     = $(this).attr("data-NAME");
        var PARTIAL  = $(this).attr("data-PARTIAL");
        
        Swal.fire({
            title: 'Are you sure to delete this file?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                $.ajax({
                    type      : "POST",
                    url       : "<?php echo site_url('C_pivot_validation/delete_display')?>",
                    dataType  : "JSON",
                    data      : {PO:PO , SEQ:SEQ, CODE:CODE, NAME:NAME, PARTIAL:PARTIAL},
                    success   : function(data)
                    {
                        location.reload();
                    }
                });
            }
        })
                
            
         
    })


    function save_validation(){
        var formData = new FormData(document.querySelector("#form_validation"));
           
        $('form').find(':input:not(:checkbox, :radio)').each(function () {
                formData.append(this.name, $(this).val());
        });

        $.ajax({
            url : "<?php echo base_url();?>/C_pivot_validation/save_first_data",
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
                save_measurement()
            
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
                save_validation();
            }
        })
        
    }

    $(document).on('click','#save_validation',function(){
        var measure201  = document.getElementById('photo_name201').value;
        var measure202  = document.getElementById('photo_name202').value;
        var measure203  = document.getElementById('photo_name203').value;
        var mcs0        = document.getElementById('mcs_ready0');
        var product101  = document.getElementById('photo_name101').value;
        var measure     = document.getElementById('measure_ready0');

        if (($("input:radio[name=SlipOn_inspection]:checked").length == 0)||($("input:radio[name=CPSIA]:checked").length == 0)) {
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please check your data. Make sure the CPSIA and Slip On Inspection have been filled in',
            })
        }

        // if ((mcs0 == null) && (product101 == '')){ 
        //     Swal.fire({
        //             icon: 'error',
        //             title: 'Oops...',
        //             text: 'Something went wrong! Please select an image for Product and Measurement.',
        //     })
        // }

        if(((mcs0 == null) && (product101 == '')) || ((measure == null) && ((measure201 == '') && (measure202 == '') && (measure203 == '')))){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong! Please select an image for Product and Measurement.',
            })
        }else{
            save_product();
          
        }
    })

    
    $('[id^="upload_gambar"]').bind('change', function() { 
            var fileName    = ''; 
            var id          = $(this).attr('id_seq');
            var idk         = $(this).attr('id_seqk');
            fileName        = $(this).val(); 
            var filenamea   = fileName.match(/[^\\/]*$/)[0];

            $('#photo_name10'+id).val(filenamea); 
            $('#photo_name20'+idk).val(filenamea); 
    })

    $(document).on('change', '#upload_gambar1', function() {
        readURL(this, 'photoShowId1');
        checkSize(this, 'photo_name201')
    });

    $(document).on('change', '#upload_gambar2', function() {
        readURL(this, 'photoShowId2');
        checkSize(this, 'photo_name202')
    });

    $(document).on('change', '#upload_gambar3', function() {
        readURL(this, 'photoShowId3');
        checkSize(this, 'photo_name203')
    });

    // -----------------------------------------------open image measurement-------------------------------------------

    $(document).on('click', '#open_image1', function() {
        $('#imagepreview').attr('src', $('#photoShowId1').attr('src'));
        $('#Modal_image_prev').modal('show'); 
    });

    $(document).on('click', '#open_image2', function() {
        $('#imagepreview').attr('src', $('#photoShowId2').attr('src')); 
        $('#Modal_image_prev').modal('show'); 
    });

    $(document).on('click', '#open_image3', function() {
        $('#imagepreview').attr('src', $('#photoShowId2').attr('src')); 
        $('#Modal_image_prev').modal('show'); 
    });
   
    // -------------------------------------------------open image product------------------------------------------------
    $(document).on('click', '#open_image101', function() {
        $('#imagepreview').attr('src', $('#photoShowId101').attr('src'));
        $('#Modal_image_prev').modal('show'); 
    });

    $(document).on('click', '#open_image102', function() {
        $('#imagepreview').attr('src', $('#photoShowId102').attr('src'));
        $('#Modal_image_prev').modal('show'); 
    });

    $(document).on('click', '#open_image103', function() {
        $('#imagepreview').attr('src', $('#photoShowId103').attr('src'));
        $('#Modal_image_prev').modal('show'); 
    });

    $(document).on('click', '#open_image104', function() {
        $('#imagepreview').attr('src', $('#photoShowId104').attr('src'));
        $('#Modal_image_prev').modal('show'); 
    });

    $(document).on('click', '#open_image105', function() {
        $('#imagepreview').attr('src', $('#photoShowId105').attr('src'));
        $('#Modal_image_prev').modal('show'); 
    });

    $(document).on('click', '#open_image106', function() {
        $('#imagepreview').attr('src', $('#photoShowId106').attr('src'));
        $('#Modal_image_prev').modal('show'); 
    });

    $(document).on('change', '#upload_gambar101', function() {
        readURL(this, 'photoShowId101');
        checkSize(this, 'photo_name101')
    });

    $(document).on('change', '#upload_gambar102', function() {
        readURL(this, 'photoShowId102');
        checkSize(this, 'photo_name102')
    });

    $(document).on('change', '#upload_gambar103', function() {
        readURL(this, 'photoShowId103');
        checkSize(this, 'photo_name103')
    });

    $(document).on('change', '#upload_gambar104', function() {
        readURL(this, 'photoShowId104');
        checkSize(this, 'photo_name104')
    });

    $(document).on('change', '#upload_gambar105', function() {
        readURL(this, 'photoShowId105');
        checkSize(this, 'photo_name105')
    });

    $(document).on('change', '#upload_gambar106', function() {
        readURL(this, 'photoShowId106');
        checkSize(this, 'photo_name106')
    });

})
       
</script>