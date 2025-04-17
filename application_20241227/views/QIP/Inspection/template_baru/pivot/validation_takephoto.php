<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<style>
td textarea 
{
    width: 100%;
    height: 100%

}

 #my_camera{
     width: 320px;
     height: 240px;
     border: 1px solid black;
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
                <input type="hidden" name="PO_NO" value="<?php echo $PO_NO;?>"/>
                <input type="hidden" name="PARTIAL" value="<?php echo $PARTIAL;?>"/>
                <input type="hidden" name="REMARK" value="<?php echo $REMARK;?>"/>
                <input type="hidden" name="LEVEL" value="<?php echo $LEVEL;?>"/>
                <input type="hidden" name="LEVEL_USER" value="<?php echo $LEVEL_USER;?>"/>
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
                                                                <input type="radio" name="CPSIA" id="CPSIA_YES" autocomplete="off" value="yes"> Yes
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
                                                                <input type="radio" name="CMA" id="CMA_YES" autocomplete="off" value="yes"> Yes
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
                                                    <input type="radio" name="SlipOn_inspection" id="SlipOn_inspection_YES" autocomplete="off" value="yes"> Yes
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
                                                    <input type="radio" name="Moisture_test" id="Moisture_test_YES" autocomplete="off" value="yes"> Yes
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
                    <div class="card-body">
                        <div class="row">
                            <div class='col-md-3'>
                                <div class="form-group">
                                    <div class="input-group input-group ">
                                        <input type="text" class="form-control" name="photo_name101" id="photo_name101" readOnly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-danger btn-flat take_photo101" id="take_photo" value="101"><i class="fa fa-camera"></i></button>
                                        </span>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat" id="btnGo"><i class="fa fa-image"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <div class="form-group">
                                    <div class="input-group input-group ">
                                        <input type="text" class="form-control" name="photo_name102" id="photo_name102" readOnly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-danger btn-flat take_photo102" id="take_photo" value="102"><i class="fa fa-camera"></i></button>
                           
                                        </span>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat" id="btnGo"><i class="fa fa-image"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <div class="form-group">
                                    <div class="input-group input-group ">
                                        <input type="text" class="form-control" name="photo_name103" id="photo_name103" readOnly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-danger btn-flat take_photo103" id="take_photo" value="103"><i class="fa fa-camera"></i></button>
                                        </span>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat" id="btnGo"><i class="fa fa-image"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group input-group ">
                                        <input type="text" class="form-control" name="photo_name104" id="photo_name104" readOnly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-danger btn-flat take_photo104" id="take_photo" value="104"><i class="fa fa-camera"></i></button>
                                        </span>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat" id="btnGo"><i class="fa fa-image"></i></button>
                                        </span>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group input-group ">
                                        <input type="text" class="form-control" name="photo_name105" id="photo_name105" readOnly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-danger btn-flat take_photo105" id="take_photo" value="105"><i class="fa fa-camera"></i></button>
                                        </span>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat" id="btnGo"><i class="fa fa-image"></i></button>
                                        </span>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group input-group ">
                                        <input type="text" class="form-control" name="photo_name106" id="photo_name106" readOnly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-danger btn-flat take_photo106" id="take_photo" value="106"><i class="fa fa-camera"></i></button>
                                        </span>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat" id="btnGo"><i class="fa fa-image"></i></button>
                                        </span>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Measurements</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                            <form method="post" id="upload_gambar" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="input-group input-group ">
                                       
                                            <input type="text" class="form-control" name="photo_name201" id="photo_name201" readOnly>
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-danger btn-flat take_photo201" id="take_photo" value="201"><i class="fa fa-camera"></i></button>
                                            </span>
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-info btn-flat preview_image" id="preview_image"><i class="fa fa-image"></i></button>
                                            </span>
                                       
                                        
                                    </div>
                                   
                                </div>
                            </div> </form>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group input-group ">
                                        <input type="text" class="form-control" name="photo_name202" id="photo_name202" readOnly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-danger btn-flat take_photo202" id="take_photo" value="202"><i class="fa fa-camera"></i></button>
                                        </span>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat" id="btnGo"><i class="fa fa-image"></i></button>
                                        </span>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group input-group ">
                                        <input type="text" class="form-control" name="photo_name203" id="photo_name203" readOnly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-danger btn-flat take_photo203" id="take_photo" value="203"><i class="fa fa-camera"></i></button>
                                        </span>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat" id="btnGo"><i class="fa fa-image"></i></button>
                                        </span>
                                    </div>
                                   
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <right> <button type="button" class="btn btn-success btn-block" name="save_validation" id="save_validation">Go to Next Step </button></right>
                </div>
               
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

      <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">PONO</label>
                            <form>
                                <div class="col-md-10">
                                    <input type="text" name="PO_NO_edit" id="PO_NO_edit" class="form-control" placeholder="Product Code" readOnly>
                                </div>
                            </form>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Partial</label>
                            <div class="col-md-6">
                              <input type="text" name="partial_edit" id="partial_edit" class="form-control" placeholder="Partial No" readOnly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Qty</label>
                            <div class="col-md-6">
                              <input type="text" name="qty_edit" id="qty_edit" class="form-control" placeholder="Qty Partial">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Level</label>
                            <div class="col-md-6">
                              <input type="text" name="level_edit" id="level_edit" class="form-control" placeholder="Qty Partial" value='II' readOnly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Inspector</label>
                            <div class="col-md-6">
                              <input type="text" name="Inspector_edit" id="Inspector_edit" class="form-control" placeholder="Inspector" readOnly>
                            </div>
                        </div>
                        <!--div class="form-group row">
                          <label class="col-md-2 col-form-label">Inspector</label>
                              <div class="col-md-6">
                                  <select name="Inspector_edit" id="Inspector_edit" class="form-control" tabindex="1">
                              <?php 
                                for($i=0;$i<count($inspector);$i++){
                                  if($inspector[$i]['USERNAME']== $row['USERNAME']){
                                    echo "<option value='".$inspector[$i]['USERNAME']."' selected>".$inspector[$i]['USERNAME']."</option>";
                                  }else{
                                    echo "<option value='".$inspector[$i]['USERNAME']."' >".$inspector[$i]['USERNAME']."</option>";
                                  }
                                }
                              ?>
                                  </select>
                              </div>
                      </div-->
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Inspect Date</label>
                            <div class="col-md-6">
                              <input type="text" name="date_edit" id="date_edit" class="form-control" placeholder="Inspect Date">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->
            <div class="modal fade" id="Modal_View_Detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Partial Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <table class="table table-bordered" >
                          <thead>
                            <th>PO NO</th>
                            <th>PARTIAL</th>
                            <th>SEQ INSPECT</th>
                            <th>LEVEL</th>
                            <th>INSPECTOR</th>
                            <th>INSPECT DATE</th>
                            <th>STATUS INSPECT</th>
                            <th>ACTION</th>
                          </thead>
                          <tbody id="view_detail_partial">
                          </tbody>
                       </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>
    
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
    
<!-- Scripts -->
<script src="<?php  echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
<!-- <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>  -->
<!-- <script type="text/javascript" src="<?php // echo base_url();?>template/plugins/jquery-tabledit-master/jquery.tabledit.js"></script> -->

<script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>

<script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
<!-- jQuery -->
  
<script src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/jquery.mask.min.js"></script>
    
<!--script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script-->
<script src="<?php echo base_url();?>template/plugins/bootstable/bootstable.js" ></script>

<script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
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
  Webcam.set({
     width: 640,
     height: 480,
     image_format: 'jpeg',
     jpeg_quality: 90,
     dest_width: 640,
     dest_height: 480,

 });
 Webcam.attach( '#my_camera' );

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

function tampil_foto(){
    $.ajax({
        url: "<?php echo site_url('C_pivot_aql/tampil_foto/') ?>",
        cache: false,
        dataType : "JSON",
        success: function(data){
            var html =''
            document.getElementById('image_preview').innerHTML = 
                '<img src="'+data[0].nama_foto+'"/>';
        }
    })
}




function take_snapshot() {
 
   // take snapshot and get image data
   Webcam.snap( function(data_uri) {
       // display results in page
       document.getElementById('results').innerHTML = '<br><h1>Preview</h1><br> <img src="'+data_uri+'"/>';
        console.log(data_uri)
        upload_gambar(data_uri)
    } );
}
  
$(document).ready(function(){
    // tampil_foto()

    $(document).on('click','.take_photo101',function(){
        var photo_code = '101'
        $('#Modal_take_foto').modal('show');
    })

    $(document).on('click','.take_photo102',function(){
        var photo_code = '102'
        $('#Modal_take_foto').modal('show');
    })

    $(document).on('click','.take_photo103',function(){
        var photo_code = '103'
        $('#Modal_take_foto').modal('show');
    })

    $(document).on('click','.take_photo104',function(){
        var photo_code = '104'
        $('#Modal_take_foto').modal('show');
    })

    $(document).on('click','.take_photo105',function(){
        var photo_code = '105'
        $('#Modal_take_foto').modal('show');
    })

    $(document).on('click','.take_photo106',function(){
        var photo_code = '106'
        $('#Modal_take_foto').modal('show');
    })

    $(document).on('click','.take_photo201',function(){
        var photo_code = '201'
        $('#Modal_take_foto').modal('show');
    })

    $(document).on('click','.take_photo202',function(){
        var photo_code = '202'
        $('#Modal_take_foto').modal('show');
    })

    $(document).on('click','.take_photo203',function(){
        var photo_code = '203'
        $('#Modal_take_foto').modal('show');
    })

    //modal preview image
    $(document).on('click','.preview_image',function(){
        $('#modal_preview_image').modal('show');
        tampil_foto();
    })
    

    function simpandata_random(){
      var formData = new FormData($('#form_validation')[0]);
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
              alert(data)
          },
      });
    }

    $(document).on('click','#save_validation',function(){
        simpandata_random();
    })



})
       
</script>