<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<style>
td textarea 
{
    width: 100%;
    height: 100%

}

input[type="file"] {
    display: none; 
    /* position: absolute; left: -99999rem */
}



</style>
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="col-md-12">
            <form class='form-horizontal' method="POST" id="form_validation">
                <input type="hidden" name="PO_NO" id="PO_NO" value="<?php echo $PO_NO;?>"/>
                <input type="hidden" name="PARTIAL" id="PARTIAL" value="<?php echo $PARTIAL;?>"/>
                <input type="hidden" name="REMARK" id="REMARK" value="<?php echo $REMARK;?>"/>
                <input type="hidden" name="LEVEL" id="LEVEL" value="<?php echo $LEVEL;?>"/>
                <input type="hidden" name="LEVEL_USER" id="LEVEL_USER" value="<?php echo $LEVEL_USER;?>"/>
                <input type="hidden" name="ARTICLE" id="ARTICLE" value="<?php echo $ARTICLE->ART_NO;?>"/>
            <!-- General Compliance -->
                <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">1. GENERAL COMPLIANCE</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="background-color:powderblue;">
                    <!-- <form class="form-horizontal"> -->
                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">MCS Availability & signature compliance</label>
                                <div class="input-group input-group col-sm-10">
                                        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                            <label class="btn bg-olive active">
                                                <input type="radio" name="MCS" id="MCS_YES" value="yes" autocomplete="off" checked=""> Yes
                                                </label>
                                            <label class="btn bg-olive">
                                                <input type="radio" name="MCS" id="MCS_NO" value="no" autocomplete="off"> No
                                            </label>
                                        </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">SHAS Compliance</label>
                                <div class="input-group input-group col-sm-10">
                                        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                            <label class="btn bg-olive active">
                                                <input type="radio" name="SHAS" id="SHAS_YES" autocomplete="off" value="yes" checked=""> Yes
                                                </label>
                                            <label class="btn bg-olive">
                                                <input type="radio" name="SHAS" id="SHAS_NO" autocomplete="off" value="no"> No
                                            </label>
                                        </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">A-01 Compliance</label>
                                <div class="input-group input-group col-sm-10">
                                        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                            <?php
                                                if(isset($a01)){
                                                    echo '<label class="btn bg-olive active">
                                                                <input type="radio" name="A01" id="A01_YES" checked="" value="yes"> Yes
                                                                </label>
                                                            <label class="btn bg-olive">
                                                                <input type="radio" name="A01" id="A01_NO" autocomplete="off" value="no"> No
                                                            </label>';
                                                }else{
                                                    echo '<label class="btn bg-olive">
                                                            <input type="radio" name="A01" id="A01_YES" autocomplete="off" value="yes"> Yes
                                                            </label>
                                                        <label class="btn bg-olive active">
                                                            <input type="radio" name="A01" id="A01_NO" autocomplete="off" checked="" value="no"> No
                                                        </label>';
                                                }
                                            ?>
                                            
                                        </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">CPSIA Compliance</label>
                                <div class="input-group input-group col-sm-10">
                                        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                            <?php 
                                                if(isset($cpsia)){
                                                    echo ' <label class="btn bg-olive active">
                                                                <input type="radio" name="CPSIA" id="CPSIA_YES" autocomplete="off" checked="" value="yes"> Yes
                                                                </label>
                                                            <label class="btn bg-olive">
                                                                <input type="radio" name="CPSIA" id="CPSIA_NO" autocomplete="off" value="no"> No
                                                            </label>
                                                            <label class="btn bg-olive">
                                                                <input type="radio" name="CPSIA" id="CPSIA_NA" autocomplete="off" value="n/a"> N/A
                                                            </label>';
                                                }else{
                                                    echo ' <label class="btn bg-olive">
                                                                <input type="radio" name="CPSIA" id="CPSIA_YES" autocomplete="off" value="yes" required> Yes
                                                                </label>
                                                            <label class="btn bg-olive">
                                                                <input type="radio" name="CPSIA" id="CPSIA_NO" autocomplete="off" value="no"> No
                                                            </label>
                                                            <label class="btn bg-olive">
                                                                <input type="radio" name="CPSIA" id="CPSIA_NA" autocomplete="off" value="n/a"> N/A
                                                            </label>';
                                                }
                                            ?>
                                           
                                        </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Customer/Country specific compliance</label>
                                <div class="input-group input-group col-sm-10">
                                        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                            <label class="btn bg-olive">
                                                <input type="radio" name="CustomerCountry" id="CustomerCountry_YES" autocomplete="off" value="yes"> Yes
                                                </label>
                                            <label class="btn bg-olive">
                                                <input type="radio" name="CustomerCountry" id="CustomerCountry_NO" autocomplete="off" value="no"> No
                                            </label>
                                            <label class="btn bg-olive  active">
                                                <input type="radio" name="CustomerCountry" id="CustomerCountry_NA" autocomplete="off"  checked="" value="n/a"> N/A
                                            </label>
                                        </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Comment</label>
                                <div class="col-sm-10 input-group input-group-sm">
                                <input type="text" class="form-control form-control-border" id="Comment_1" name="Comment_1" placeholder="Add a comment...">
                                </div>
                            </div>
                        
                        </div>
                    <!-- </form> -->
                </div>
                <!-- /.card-body -->
                </div>
            <!-- //general Compliance -->


            <!-- metal detection compliance -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">2. METAL DETECTION COMPLIANCE</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="background-color:powderblue;">
                        <!-- <form class="form-horizontal"> -->
                            <div class="card-body">
                            <!-- <div class="col-sm-6"> -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Production (Finish Goods)</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <label class="btn bg-olive active">
                                                    <input type="radio" name="Production" id="Production_YES" autocomplete="off" checked="" value="yes"> Yes
                                                    </label>
                                                <label class="btn bg-olive">
                                                    <input type="radio" name="Production" id="Production_NO" autocomplete="off" value="no"> No
                                                </label>
                                                <label class="btn bg-olive">
                                                    <input type="radio" name="Production" id="Production_NA" autocomplete="off" value="n/a"> N/A
                                                </label>
                                            </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Warehouse (outer carton)</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <label class="btn bg-olive active">
                                                    <input type="radio" name="Warehouse" id="Warehouse_YES" autocomplete="off" checked="" value="yes"> Yes
                                                    </label>
                                                <label class="btn bg-olive">
                                                    <input type="radio" name="Warehouse" id="Warehouse_NO" autocomplete="off" value="no"> No
                                                </label>
                                                <label class="btn bg-olive">
                                                    <input type="radio" name="Warehouse" id="Warehouse_NA" autocomplete="off" value="n/a"> N/A
                                                </label>
                                            </div>
                                    </div>
                                </div><br>
                            
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-10 input-group input-group-sm">
                                    <input type="text" class="form-control form-control-border" id="Comment_2" name="Comment_2" placeholder="Add a comment...">
                                    </div>
                                </div>
                            
                            </div>
                            </div>
                        <!-- </form> -->
                    
                    </div>
                    <!-- /.card-body -->
            <!-- //Metal Detector Motion -->
            
            <!-- metal detection compliance -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">3. FGT COMPLIANCE</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="background-color:powderblue;">
                        <!-- <form class="form-horizontal"> -->
                            <div class="card-body">
                            <!-- <div class="col-sm-6"> -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Production FGT Pass</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <?php
                                                    if (isset($fgt)){
                                                        echo ' <label class="btn bg-yellow active">
                                                                    <input type="radio" name="Production_fgt" id="Production_fgt_YES" autocomplete="off" checked="" value="yes"> Yes
                                                                    </label>
                                                                <label class="btn bg-yellow">
                                                                    <input type="radio" name="Production_fgt" id="Production_fgt_NO" autocomplete="off" value="no"> No
                                                                </label>';
                                                    }else{
                                                        echo ' <label class="btn bg-yellow">
                                                                    <input type="radio" name="Production_fgt" id="Production_fgt_YES" autocomplete="off" value="yes"> Yes
                                                                    </label>
                                                                <label class="btn bg-yellow  active">
                                                                    <input type="radio" name="Production_fgt" id="Production_fgt_NO" autocomplete="off" checked="" value="no"> No
                                                                </label>';
                                                    }
                                                ?>
                                               
                                            </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">CMA Pass </label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <?php 
                                                    if(isset($cma)){
                                                        echo '<label class="btn bg-yellow active">
                                                                    <input type="radio" name="CMA" id="CMA_YES" autocomplete="off" checked="" value="yes"> Yes
                                                                    </label>
                                                                <label class="btn bg-yellow">
                                                                    <input type="radio" name="CMA" id="CMA_NO" autocomplete="off" value="no"> No
                                                                </label>
                                                                <label class="btn bg-yellow">
                                                                    <input type="radio" name="CMA" id="CMA_NA" autocomplete="off" value="n/a"> N/A
                                                                </label>';
                                                    }else{
                                                        echo '<label class="btn bg-yellow">
                                                                <input type="radio" name="CMA" id="CMA_YES" autocomplete="off" value="yes" required> Yes
                                                                </label>
                                                            <label class="btn bg-yellow">
                                                                <input type="radio" name="CMA" id="CMA_NO" autocomplete="off" value="no"> No
                                                            </label>
                                                            <label class="btn bg-yellow">
                                                                <input type="radio" name="CMA" id="CMA_NA" autocomplete="off" value="n/a"> N/A
                                                            </label>';
                                                    }
                                                ?>
                                                
                                            </div>
                                    </div>
                                </div><br>
                            
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-10 input-group input-group-sm">
                                    <input type="text" class="form-control form-control-border" id="Comment_3" name="Comment_3" placeholder="Add a comment...">
                                    </div>
                                </div>
                            
                            </div>
                            </div>
                        <!-- </form> -->
                    
                    </div>
                    <!-- /.card-body -->
    
                    <!-- mold prevention -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">4. MOLD PREVENTION</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="background-color:powderblue;">
                        <!-- <form class="form-horizontal"> -->
                            <div class="card-body">
                            <!-- <div class="col-sm-6"> -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">UV-C Treatment</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <label class="btn bg-yellow ">
                                                    <input type="radio" name="UVC_treatment" id="UVC_treatment_YES" autocomplete="off" value="yes"> Yes
                                                    </label>
                                                <label class="btn bg-yellow">
                                                    <input type="radio" name="UVC_treatment" id="UVC_treatment_NO" autocomplete="off" value="no"> No
                                                </label>
                                                <label class="btn bg-yellow active">
                                                    <input type="radio" name="UVC_treatment" id="UVC_treatment_NA" autocomplete="off"  checked="" value="n/a"> N/A
                                                </label>
                                            </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Anti Mold Wrapping Paper </label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <label class="btn bg-yellow active">
                                                    <input type="radio" name="Anti_mold" id="Anti_mold_YES" autocomplete="off" checked="" value="yes"> Yes
                                                    </label>
                                                <label class="btn bg-yellow">
                                                    <input type="radio" name="Anti_mold" id="Anti_mold_NO" autocomplete="off" value="no"> No
                                                </label>
                                             
                                            </div>
                                    </div>
                                </div><br>
                            
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-10 input-group input-group-sm">
                                    <input type="text" class="form-control form-control-border" id="Comment_4" name="Comment_4" placeholder="Add a comment...">
                                    </div>
                                </div>
                            
                            </div>
                            </div>
                        <!-- </form> -->
                    
                    </div>
                    <!-- /.card-body -->
                <!-- </div> -->
                <!-- //mold prevention -->

                <!-- exceptional management -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">5. EXCEPTIONAL MANAGEMENT</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="background-color:powderblue;">
                        <!-- <form class="form-horizontal"> -->
                            <div class="card-body">
                            <!-- <div class="col-sm-6"> -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Exceptional Visual Standard</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <label class="btn bg-yellow ">
                                                    <input type="radio" name="Exceptional_visual" id="Exceptional_visual_YES" autocomplete="off" value="yes"> Yes
                                                    </label>
                                                <label class="btn bg-yellow">
                                                    <input type="radio" name="Exceptional_visual" id="Exceptional_visual_NO" autocomplete="off" value="no"> No
                                                </label>
                                                <label class="btn bg-yellow active">
                                                    <input type="radio" name="Exceptional_visual" id="Exceptional_visual_NA" autocomplete="off"  checked="" value="n/a"> N/A
                                                </label>
                                            </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Factory Disclaimer</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <label class="btn bg-yellow">
                                                    <input type="radio" name="Factory_disclaimer" id="Factory_disclaimer_YES" autocomplete="off" value="yes"> Yes
                                                    </label>
                                                <label class="btn bg-yellow">
                                                    <input type="radio" name="Factory_disclaimer" id="Factory_disclaimer_NO" autocomplete="off" value="no"> No
                                                </label>
                                                <label class="btn bg-yellow active">
                                                    <input type="radio" name="Factory_disclaimer" id="Factory_disclaimer_NA" autocomplete="off"  checked="" value="n/a"> N/A
                                                </label>
                                            </div>
                                    </div>
                                </div><br>
                            
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-10 input-group input-group-sm">
                                    <input type="text" class="form-control form-control-border" id="Comment_5" name="Comment_5" placeholder="Add a comment...">
                                    </div>
                                </div>
                            
                            </div>
                            </div>
                        <!-- </form> -->
                    
                    </div>
                    <!-- /.card-body -->
                <!-- </div> -->
                <!-- //exceptional management -->



                <!-- FIT -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">1. FIT</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="background-color:powderblue;">
                        <!-- <form class="form-horizontal"> -->
                            <div class="card-body">
                            <!-- <div class="col-sm-6"> -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Slip-on inspection pass (step-in tool)</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <label class="btn bg-yellow">
                                                    <input type="radio" name="SlipOn_inspection" id="SlipOn_inspection_YES" autocomplete="off" value="yes" required> Yes
                                                    </label>
                                                <label class="btn bg-yellow">
                                                    <input type="radio" name="SlipOn_inspection" id="SlipOn_inspection_NO" autocomplete="off" value="no"> No
                                                </label>
                                                <label class="btn bg-yellow">
                                                    <input type="radio" name="SlipOn_inspection" id="SlipOn_inspection_NA" autocomplete="off" value="n/a"> N/A
                                                </label>
                                            </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-10 input-group input-group-sm">
                                    <input type="text" class="form-control form-control-border" id="Comment_6" name="Comment_6" placeholder="Add a comment...">
                                    </div>
                                </div>
                            
                            </div>
                            </div>
                        <!-- </form> -->
                    
                    </div>
                    <!-- /.card-body -->
                <!-- </div> -->
                <!-- //FIT -->

                <!-- mold prevention -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">2. MOLD PREVENTION</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="background-color:powderblue;">
                        <!-- <form class="form-horizontal"> -->
                            <div class="card-body">
                            <!-- <div class="col-sm-6"> -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Moisture test (Aquaboy) Pass</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <label class="btn bg-yellow">
                                                    <input type="radio" name="Moisture_test" id="Moisture_test_YES" autocomplete="off" value="yes" required> Yes
                                                    </label>
                                                <label class="btn bg-yellow">
                                                    <input type="radio" name="Moisture_test" id="Moisture_test_YES" autocomplete="off" value="no"> No
                                                </label>
                                                <label class="btn bg-yellow">
                                                    <input type="radio" name="Moisture_test" id="Moisture_test_YES" autocomplete="off" value="n/a"> N/A
                                                </label>
                                            </div>
                                    </div>
                                </div><br>
                                
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-10 input-group input-group-sm">
                                    <input type="text" class="form-control form-control-border" id="Comment_7" name="Comment_7" placeholder="Add a comment...">
                                    </div>
                                </div>
                            
                            </div>
                            </div>
                        <!-- </form> -->
                    
                    </div>
                <!-- //Mold Prevention -->
           
            </form>
           
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Product</h3>
                    </div>
                    <div class="card-body" style="background-color:#ffc107">
                        <h4 class="timeline-header" style="font-color:blue">Available MCS</h4>
                        <div class="row" id="display_product">
                            <!-- <div class="col-md-12"  ></div> -->
                        </div>
                        
                    </div>
                    <div class="card-body">
                        
                        <form method="post" id="gambar_product" class="form-horizontal" enctype='multipart/form-data'>
                            <div class="row" id="upload_product">
                            
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Measurements</h3>
                    </div>
                    <div class="card-body">
                         <form method="post" id="gambar_measurement" class="form-horizontal" enctype='multipart/form-data'>
                            <div class="row" id="upload_measurement">
                            </div>  
                        </form>
                    </div>
                    <right> <button type="submit" class="btn btn-success btn-block" name="save_validation" id="save_validation">Go to Next Step </button></right>
                </div>
            </form>  
            </div>
            <!-- /.card -->

           
           
                
              
             
          <!-- right column -->
          
            <!-- general form elements disabled -->
          
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

      
    
        <!-- MODAL TAKE FOTO -->
            <div class="modal fade" id="Modal_take_foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Take Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       
                       <div id="my_camera"></div><br>
                       <button type="button" class="btn btn-success" onClick="take_snapshot()">Take Photo</button>
                       <form method="POST" id="form_photo">
                            <input type="text" name="value_photo"/>
                            <input type="text" name="PO_NO1"/>
                            <input type="text" name="PARTIAL1"/>
                            <input type="text" name="REMARK1"/>
                            <input type="text" name="LEVEL1"/>
                            <input type="text" name="LEVEL_USER1"/>
                            <input type="text" name="ARTICLE1"/>
                            <br>
                            
                            <div id="results"></div>
                                        <!-- <div id="tampil_foto"></div> -->
                       </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>                    
        <!-- /MODAL TAKE FOTO -->
        
        <!-- MODAL PREVIEW IMAGE -->
            <div class="modal fade" id="modal_preview_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       
                       <div id="image_preview"></div><br>
                       
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>   
        <!-- /MODAL PREVIEW IMAGE -->



    </section>
    <!-- /.content -->

      <!-- MODAL DISPLAY IMAGE  -->
      <div class="modal fade" id="Modal_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="detailReject"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <div class="modal-body" id="display_image">
                 
                  </div>
                 <div class='modal-footer'>
               
                 </div>
                </div>
              </div>
            </div>
        <!-- END MODAL DISPLAY IMAGE -->
    
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
<script type="text/javascript" src="<?php echo base_url();?>template/webcamjs/webcam.min.js"></script>


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
                var html    =''
                var alamat  = "<?php echo base_url();?>template/images/aql_image";
                html        += '<img src="'+alamat+'/'+data.PHOTO_NAME+'" width="100%" height="100%" id="img1"></img>'

                $('#Modal_image').modal('show');
                $('#display_image').html(html);

            }
        });
    })


    function save_validation(){
        var formData = new FormData(document.querySelector("#form_validation"));

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