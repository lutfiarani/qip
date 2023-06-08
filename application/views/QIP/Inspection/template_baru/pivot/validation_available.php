<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<link rel="stylesheet" href="<?php echo base_url();?>template/new_js/sweetalert2/sweetalert2.min.css">
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
<!-- <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/toastr/toastr.min.css"> -->

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="col-md-12">
            <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">RANDOM SIZE</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered"  id="random_detail">
                        </table>
                    </div>
                </div>
            </div>
            <!-- general form elements -->
            <div class="col-md-12">
            <form class='form-horizontal' method="POST" id="form_validation">
                <input type="hidden" name="PO_NO" id="PO_NO" value="<?php echo $PO_NO;?>"/>
                <input type="hidden" name="PARTIAL" id="PARTIAL" value="<?php echo $PARTIAL;?>"/>
                
                <input type="hidden" name="LEVEL" id="LEVEL" value="<?php echo $LEVEL;?>"/>
                <input type="hidden" name="LEVEL_USER" id="LEVEL_USER" value="<?php echo $LEVEL_USER;?>"/>
                <input type="hidden" name="ARTICLE" id="ARTICLE" value="<?php echo $ARTICLE->ART_NO;?>"/>
            <!-- General Compliance -->
                <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">1. GENERAL COMPLIANCE</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" >
                <!-- <div class="card-body"> -->
                    <!-- <form class="form-horizontal"> -->
                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">MCS Availability & signature compliance</label>
                                <div class="input-group input-group col-sm-10">
                                        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                            <?php 
                                                if($mcs->VALIDATION_RESULT == 'yes'){
                                                    echo '  <label class="btn btn-outline-success active">
                                                                <input type="radio" name="MCS" id="MCS_YES" value="yes" autocomplete="off" checked=""> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="MCS" id="MCS_NO" value="no" autocomplete="off"> No
                                                            </label>';
                                                }else if($mcs->VALIDATION_RESULT == 'no'){
                                                    echo '  <label class="btn btn-outline-success">
                                                                <input type="radio" name="MCS" id="MCS_YES" value="yes" autocomplete="off" > Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger active">
                                                                <input type="radio" name="MCS" id="MCS_NO" value="no" autocomplete="off" checked=""> No
                                                            </label>';
                                                }
                                            ?>
                                            
                                        </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">SHAS Compliance</label>
                                <div class="input-group input-group col-sm-10">
                                        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                            <?php 
                                                if($shas->VALIDATION_RESULT == 'yes'){
                                                    echo '<label class="btn btn-outline-success active">
                                                                <input type="radio" name="SHAS" id="SHAS_YES" autocomplete="off" value="yes" checked=""> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="SHAS" id="SHAS_NO" autocomplete="off" value="no"> No
                                                            </label>';
                                                }else{
                                                    echo '<label class="btn btn-outline-success">
                                                                <input type="radio" name="SHAS" id="SHAS_YES" autocomplete="off" value="yes"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger active">
                                                                <input type="radio" name="SHAS" id="SHAS_NO" autocomplete="off" value="no"  checked=""> No
                                                            </label>';
                                                }
                                            ?>
                                            
                                        </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">A-01 Compliance</label>
                                <div class="input-group input-group col-sm-10">
                                        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                            <?php
                                                if($a01->VALIDATION_RESULT =='yes'){
                                                    echo '<label class="btn btn-outline-success active">
                                                                <input type="radio" name="A01" id="A01_YES" checked="" value="yes"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="A01" id="A01_NO" autocomplete="off" value="no" disabled="disabled"> No
                                                            </label>';
                                                }else{
                                                    echo '<label class="btn btn-outline-success">
                                                            <input type="radio" name="A01" id="A01_YES" autocomplete="off" value="yes" disabled="disabled"> Yes
                                                            </label>
                                                        <label class="btn btn-outline-danger active">
                                                            <input type="radio" name="A01" id="A01_NO" autocomplete="off" checked="" value="no"> No
                                                        </label>';
                                                }
                                            ?>
                                            
                                        </div>
                                </div>
                            </div><br>
                            <!-- <div class="row">
                                <label class="col-sm-2 col-form-label">Comment A01</label>
                                <div class="col-sm-10 input-group input-group-sm"> -->
                                    <input type="text" class="form-control form-control-border" id="Comment_a01" name="Comment_a01" value="<?php echo $a01->VALIDATION_COMMENT;?>" placeholder="Add a comment..." hidden>
                                <!-- </div>
                            </div><br> -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">CPSIA Compliance</label>
                                <div class="input-group input-group col-sm-10">
                                        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                            <?php 
                                                if($cpsia->VALIDATION_RESULT=='yes'){
                                                    echo ' <label class="btn btn-outline-success active">
                                                                <input type="radio" name="CPSIA" id="CPSIA_YES" autocomplete="off" checked="" value="yes"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="CPSIA" id="CPSIA_NO" autocomplete="off" value="no"  disabled="disabled"> No
                                                            </label>
                                                            <label class="btn btn-outline-secondary">
                                                                <input type="radio" name="CPSIA" id="CPSIA_NA" autocomplete="off" value="n/a" disabled="disabled"> N/A
                                                            </label>';
                                                }else if($cpsia->VALIDATION_RESULT='no'){
                                                    echo ' <label class="btn btn-outline-success">
                                                                <input type="radio" name="CPSIA" id="CPSIA_YES" autocomplete="off" value="yes"  disabled="disabled"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger active">
                                                                <input type="radio" name="CPSIA" id="CPSIA_NO" autocomplete="off" value="no"  checked=""> No
                                                            </label>
                                                            <label class="btn btn-outline-secondary">
                                                                <input type="radio" name="CPSIA" id="CPSIA_NA" autocomplete="off" value="n/a"  disabled="disabled"> N/A
                                                            </label>';
                                                }else{
                                                    echo ' <label class="btn btn-outline-success">
                                                                <input type="radio" name="CPSIA" id="CPSIA_YES" autocomplete="off" value="yes"  disabled="disabled"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="CPSIA" id="CPSIA_NO" autocomplete="off" value="no"  disabled="disabled"> No
                                                            </label>
                                                            <label class="btn btn-outline-secondary active">
                                                                <input type="radio" name="CPSIA" id="CPSIA_NA" autocomplete="off" value="n/a"  checked=""> N/A
                                                            </label>';
                                                }
                                            ?>
                                           
                                        </div>
                                </div>
                            </div><br>
                            <!-- <div class="row">
                                <label class="col-sm-2 col-form-label">Comment CPSIA</label>
                                <div class="col-sm-10 input-group input-group-sm"> -->
                                    <input type="text" class="form-control form-control-border" id="Comment_cpsia" name="Comment_cpsia" value="<?php echo $cpsia->VALIDATION_COMMENT;?>" placeholder="Add a comment..." hidden>
                                <!-- </div>
                            </div><br> -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Customer/Country specific compliance</label>
                                <div class="input-group input-group col-sm-10">
                                        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                            <?php
                                                if($customer->VALIDATION_RESULT=='yes'){
                                                    echo ' <label class="btn btn-outline-success active">
                                                                <input type="radio" name="CustomerCountry" id="CustomerCountry_YES" autocomplete="off" value="yes" checked="" > Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="CustomerCountry" id="CustomerCountry_NO" autocomplete="off" value="no"> No
                                                            </label>
                                                            <label class="btn btn-outline-secondary  active">
                                                                <input type="radio" name="CustomerCountry" id="CustomerCountry_NA" autocomplete="off" value="n/a"> N/A
                                                            </label>';
                                                }else if($customer->VALIDATION_RESULT == 'no'){
                                                    echo ' <label class="btn btn-outline-success">
                                                                <input type="radio" name="CustomerCountry" id="CustomerCountry_YES" autocomplete="off" value="yes"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger active">
                                                                <input type="radio" name="CustomerCountry" id="CustomerCountry_NO" autocomplete="off" value="no"  checked=""> No
                                                            </label>
                                                            <label class="btn btn-outline-secondary">
                                                                <input type="radio" name="CustomerCountry" id="CustomerCountry_NA" autocomplete="off" value="n/a"> N/A
                                                            </label>';
                                                }else{
                                                    echo ' <label class="btn btn-outline-success">
                                                                <input type="radio" name="CustomerCountry" id="CustomerCountry_YES" autocomplete="off" value="yes"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="CustomerCountry" id="CustomerCountry_NO" autocomplete="off" value="no"> No
                                                            </label>
                                                            <label class="btn btn-outline-secondary active">
                                                                <input type="radio" name="CustomerCountry" id="CustomerCountry_NA" autocomplete="off" value="n/a"  checked=""> N/A
                                                            </label>';
                                                }
                                            ?>
                                           
                                        </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Comment</label>
                                <div class="col-sm-10 input-group input-group-sm">
                                    <input type="text" class="form-control form-control-border" id="Comment_1" name="Comment_1" value="<?php echo $mcs->VALIDATION_COMMENT;?>" placeholder="Add a comment...">
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
                    <div class="card-body" >
                        <!-- <form class="form-horizontal"> -->
                            <div class="card-body">
                            <!-- <div class="col-sm-6"> -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Production (Finish Goods)</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <?php
                                                    if($fg->VALIDATION_RESULT =='yes'){
                                                        echo '<label class="btn btn-outline-success active">
                                                                    <input type="radio" name="Production" id="Production_YES" autocomplete="off" checked="" value="yes"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger">
                                                                    <input type="radio" name="Production" id="Production_NO" autocomplete="off" value="no"> No
                                                                </label>
                                                                <label class="btn btn-outline-secondary">
                                                                    <input type="radio" name="Production" id="Production_NA" autocomplete="off" value="n/a"> N/A
                                                                </label>';
                                                    }else if ($fg->VALIDATION_RESULT == 'no'){
                                                        echo '<label class="btn btn-outline-success">
                                                                    <input type="radio" name="Production" id="Production_YES" autocomplete="off"  value="yes"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger active">
                                                                    <input type="radio" name="Production" id="Production_NO" autocomplete="off" value="no" checked=""> No
                                                                </label>
                                                                <label class="btn btn-outline-success">
                                                                    <input type="radio" name="Production" id="Production_NA" autocomplete="off" value="n/a"> N/A
                                                                </label>';
                                                    }else{
                                                        echo '<label class="btn btn-outline-success">
                                                                    <input type="radio" name="Production" id="Production_YES" autocomplete="off"  value="yes"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger">
                                                                    <input type="radio" name="Production" id="Production_NO" autocomplete="off" value="no"> No
                                                                </label>
                                                                <label class="btn btn-outline-secondary active">
                                                                    <input type="radio" name="Production" id="Production_NA" autocomplete="off" value="n/a" checked=""> N/A
                                                                </label>';
                                                    }
                                                ?>
                                                
                                            </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Warehouse (outer carton)</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <?php 
                                                    if($warehouse->VALIDATION_RESULT == 'yes'){
                                                        echo '<label class="btn btn-outline-success active">
                                                                    <input type="radio" name="Warehouse" id="Warehouse_YES" autocomplete="off" checked="" value="yes"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger">
                                                                    <input type="radio" name="Warehouse" id="Warehouse_NO" autocomplete="off" value="no"> No
                                                                </label>
                                                                <label class="btn btn-outline-secondary">
                                                                    <input type="radio" name="Warehouse" id="Warehouse_NA" autocomplete="off" value="n/a"> N/A
                                                                </label>';
                                                    }else if ($warehouse->VALIDATION_RESULT == 'no'){
                                                        echo '<label class="btn btn-outline-success">
                                                                    <input type="radio" name="Warehouse" id="Warehouse_YES" autocomplete="off" value="yes"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger active">
                                                                    <input type="radio" name="Warehouse" id="Warehouse_NO" autocomplete="off" value="no" checked="" > No
                                                                </label>
                                                                <label class="btn btn-outline-secondary">
                                                                    <input type="radio" name="Warehouse" id="Warehouse_NA" autocomplete="off" value="n/a"> N/A
                                                                </label>';
                                                    }else{
                                                        echo '<label class="btn btn-outline-success">
                                                                    <input type="radio" name="Warehouse" id="Warehouse_YES" autocomplete="off" value="yes"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger">
                                                                    <input type="radio" name="Warehouse" id="Warehouse_NO" autocomplete="off" value="no"> No
                                                                </label>
                                                                <label class="btn btn-outline-secondary active">
                                                                    <input type="radio" name="Warehouse" id="Warehouse_NA" autocomplete="off" value="n/a" checked="" > N/A
                                                                </label>';
                                                    }
                                                ?>
                                                
                                            </div>
                                    </div>
                                </div><br>
                            
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-10 input-group input-group-sm">
                                    <input type="text" class="form-control form-control-border" id="Comment_2" name="Comment_2" value="<?php echo $warehouse->VALIDATION_COMMENT?>" placeholder="Add a comment...">
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
                    <div class="card-body" >
                        <!-- <form class="form-horizontal"> -->
                            <div class="card-body">
                            <!-- <div class="col-sm-6"> -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Production FGT Pass</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <?php
                                                    if ($fgt->VALIDATION_RESULT == 'yes'){
                                                        echo ' <label class="btn btn-outline-success active">
                                                                    <input type="radio" name="Production_fgt" id="Production_fgt_YES" autocomplete="off" checked="" value="yes"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger">
                                                                    <input type="radio" name="Production_fgt" id="Production_fgt_NO" autocomplete="off" value="no" disabled="disabled"> No
                                                                </label>';
                                                    }else{
                                                        echo ' <label class="btn btn-outline-success">
                                                                    <input type="radio" name="Production_fgt" id="Production_fgt_YES" autocomplete="off" value="yes" disabled="disabled"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger active">
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
                                                    if($cma->VALIDATION_RESULT == 'yes'){
                                                        echo '<label class="btn btn-outline-success active">
                                                                    <input type="radio" name="CMA" id="CMA_YES" autocomplete="off" checked="" value="yes" > Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger">
                                                                    <input type="radio" name="CMA" id="CMA_NO" autocomplete="off" value="no" disabled="disabled"> No
                                                                </label>
                                                                <label class="btn btn-outline-success">
                                                                    <input type="radio" name="CMA" id="CMA_NA" autocomplete="off" value="n/a" disabled="disabled"> N/A
                                                                </label>';
                                                    }else if($cma->VALIDATION_RESULT == 'no'){
                                                        echo '<label class="btn btn-outline-success">
                                                                <input type="radio" name="CMA" id="CMA_YES" autocomplete="off" value="yes" disabled="disabled"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger active">
                                                                <input type="radio" name="CMA" id="CMA_NO" autocomplete="off" value="no" checked=""> No
                                                            </label>
                                                            <label class="btn btn-outline-secondary">
                                                                <input type="radio" name="CMA" id="CMA_NA" autocomplete="off" value="n/a" disabled="disabled"> N/A
                                                            </label>';
                                                    }else{
                                                        echo '<label class="btn btn-outline-success">
                                                                    <input type="radio" name="CMA" id="CMA_YES" autocomplete="off" value="yes" disabled="disabled"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger">
                                                                    <input type="radio" name="CMA" id="CMA_NO" autocomplete="off" value="no" disabled="disabled"> No
                                                                </label>
                                                                <label class="btn btn-outline-secondary active">
                                                                    <input type="radio" name="CMA" id="CMA_NA" autocomplete="off" value="n/a"  checked=""> N/A
                                                                </label>';
                                                    }
                                                ?>
                                                
                                            </div>
                                    </div>
                                </div><br>
                            
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-10 input-group input-group-sm">
                                    <input type="text" class="form-control form-control-border" id="Comment_3" name="Comment_3" value="<?php echo $cma->VALIDATION_COMMENT;?>" placeholder="Add a comment...">
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
                    <div class="card-body" >
                        <!-- <form class="form-horizontal"> -->
                            <div class="card-body">
                            <!-- <div class="col-sm-6"> -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">UV-C Treatment</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <?php
                                                    if($uv_c->VALIDATION_RESULT == 'yes'){
                                                        echo '<label class="btn btn-outline-success active">
                                                                <input type="radio" name="UVC_treatment" id="UVC_treatment_YES" autocomplete="off" value="yes" checked="" > Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="UVC_treatment" id="UVC_treatment_NO" autocomplete="off" value="no"> No
                                                            </label>
                                                            <label class="btn btn-outline-secondary">
                                                                <input type="radio" name="UVC_treatment" id="UVC_treatment_NA" autocomplete="off"  value="n/a"> N/A
                                                            </label>';
                                                    }else if($uv_c->VALIDATION_RESULT == 'no'){
                                                        echo '<label class="btn btn-outline-success ">
                                                                <input type="radio" name="UVC_treatment" id="UVC_treatment_YES" autocomplete="off" value="yes"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger active">
                                                                <input type="radio" name="UVC_treatment" id="UVC_treatment_NO" autocomplete="off" value="no" checked="" > No
                                                            </label>
                                                            <label class="btn btn-outline-secondary">
                                                                <input type="radio" name="UVC_treatment" id="UVC_treatment_NA" autocomplete="off"  value="n/a"> N/A
                                                            </label>';
                                                    }else{
                                                        echo '<label class="btn btn-outline-success ">
                                                                <input type="radio" name="UVC_treatment" id="UVC_treatment_YES" autocomplete="off" value="yes"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="UVC_treatment" id="UVC_treatment_NO" autocomplete="off" value="no"> No
                                                            </label>
                                                            <label class="btn btn-outline-secondary active">
                                                                <input type="radio" name="UVC_treatment" id="UVC_treatment_NA" autocomplete="off"  value="n/a" checked="" > N/A
                                                            </label>';
                                                    }
                                                ?>
                                                
                                            </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Anti Mold Wrapping Paper </label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <?php 
                                                    if($anti_mold->VALIDATION_RESULT=='yes'){
                                                        echo ' <label class="btn btn-outline-success active">
                                                                <input type="radio" name="Anti_mold" id="Anti_mold_YES" autocomplete="off" checked="" value="yes"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="Anti_mold" id="Anti_mold_NO" autocomplete="off" value="no"> No
                                                            </label>';
                                                    }else{
                                                        echo ' <label class="btn btn-outline-success">
                                                                <input type="radio" name="Anti_mold" id="Anti_mold_YES" autocomplete="off" value="yes"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger active">
                                                                <input type="radio" name="Anti_mold" id="Anti_mold_NO" autocomplete="off" value="no" checked=""> No
                                                            </label>'; 
                                                    }
                                                ?>
                                               
                                             
                                            </div>
                                    </div>
                                </div><br>
                            
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-10 input-group input-group-sm">
                                    <input type="text" class="form-control form-control-border" id="Comment_4" name="Comment_4" value="<?php echo $anti_mold->VALIDATION_COMMENT;?>" placeholder="Add a comment...">
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
                    <div class="card-body" >
                        <!-- <form class="form-horizontal"> -->
                            <div class="card-body">
                            <!-- <div class="col-sm-6"> -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Exceptional Visual Standard</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <?php
                                                    if($visual->VALIDATION_RESULT=='yes'){
                                                        echo '<label class="btn btn-outline-success active ">
                                                                    <input type="radio" name="Exceptional_visual" id="Exceptional_visual_YES" autocomplete="off" checked=""  value="yes"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger">
                                                                    <input type="radio" name="Exceptional_visual" id="Exceptional_visual_NO" autocomplete="off" value="no"> No
                                                                </label>
                                                                <label class="btn btn-outline-secondary">
                                                                    <input type="radio" name="Exceptional_visual" id="Exceptional_visual_NA" autocomplete="off"  value="n/a"> N/A
                                                                </label>';
                                                    }else if($visual->VALIDATION_RESULT=='no'){
                                                        echo '<label class="btn btn-outline-success ">
                                                                    <input type="radio" name="Exceptional_visual" id="Exceptional_visual_YES" autocomplete="off" value="yes"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger active">
                                                                    <input type="radio" name="Exceptional_visual" id="Exceptional_visual_NO" autocomplete="off" value="no" checked=""> No
                                                                </label>
                                                                <label class="btn btn-outline-secondary">
                                                                    <input type="radio" name="Exceptional_visual" id="Exceptional_visual_NA" autocomplete="off"  value="n/a"> N/A
                                                                </label>';
                                                    }else{
                                                        echo '<label class="btn btn-outline-success ">
                                                                <input type="radio" name="Exceptional_visual" id="Exceptional_visual_YES" autocomplete="off" value="yes"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="Exceptional_visual" id="Exceptional_visual_NO" autocomplete="off" value="no"> No
                                                            </label>
                                                            <label class="btn btn-outline-secondary active">
                                                                <input type="radio" name="Exceptional_visual" id="Exceptional_visual_NA" autocomplete="off" value="n/a" checked=""> N/A
                                                            </label>';
                                                    }
                                                ?>
                                                
                                            </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Factory Disclaimer</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <?php
                                                    if($factory->VALIDATION_RESULT == 'yes'){
                                                        echo '  <label class="btn btn-outline-success active">
                                                                <input type="radio" name="Factory_disclaimer" id="Factory_disclaimer_YES" autocomplete="off" value="yes" checked="" > Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="Factory_disclaimer" id="Factory_disclaimer_NO" autocomplete="off" value="no"> No
                                                            </label>
                                                            <label class="btn btn-outline-secondary">
                                                                <input type="radio" name="Factory_disclaimer" id="Factory_disclaimer_NA" autocomplete="off" value="n/a"> N/A
                                                            </label>';
                                                    }else if($factory->VALIDATION_RESULT == 'no'){
                                                        echo '  <label class="btn btn-outline-success">
                                                                    <input type="radio" name="Factory_disclaimer" id="Factory_disclaimer_YES" autocomplete="off" value="yes"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger active">
                                                                    <input type="radio" name="Factory_disclaimer" id="Factory_disclaimer_NO" autocomplete="off" value="no" checked="" > No
                                                                </label>
                                                                <label class="btn btn-outline-secondary ">
                                                                    <input type="radio" name="Factory_disclaimer" id="Factory_disclaimer_NA" autocomplete="off" value="n/a"> N/A
                                                                </label>';
                                                    }else{
                                                        echo '  <label class="btn btn-outline-success">
                                                                <input type="radio" name="Factory_disclaimer" id="Factory_disclaimer_YES" autocomplete="off" value="yes"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="Factory_disclaimer" id="Factory_disclaimer_NO" autocomplete="off" value="no" > No
                                                            </label>
                                                            <label class="btn btn-outline-secondary active">
                                                                <input type="radio" name="Factory_disclaimer" id="Factory_disclaimer_NA" autocomplete="off" value="n/a" checked="" > N/A
                                                            </label>';
                                                    }
                                                
                                                ?>
                                              
                                            </div>
                                    </div>
                                </div><br>
                            
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-10 input-group input-group-sm">
                                    <input type="text" class="form-control form-control-border" id="Comment_5" name="Comment_5" value="<?php echo $factory->VALIDATION_COMMENT;?>" placeholder="Add a comment...">
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
                    <div class="card-body" >
                        <!-- <form class="form-horizontal"> -->
                            <div class="card-body">
                            <!-- <div class="col-sm-6"> -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Slip-on inspection pass (step-in tool)</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <?php
                                                    if($slip_on->VALIDATION_RESULT == 'yes'){
                                                        echo '<label class="btn btn-outline-success active">
                                                                    <input type="radio" name="SlipOn_inspection" id="SlipOn_inspection_YES" autocomplete="off" value="yes" checked=""> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger">
                                                                    <input type="radio" name="SlipOn_inspection" id="SlipOn_inspection_NO" autocomplete="off" value="no"> No
                                                                </label>
                                                                <label class="btn btn-outline-success">
                                                                    <input type="radio" name="SlipOn_inspection" id="SlipOn_inspection_NA" autocomplete="off" value="n/a"> N/A
                                                                </label>';
                                                    }   else if($slip_on->VALIDATION_RESULT == 'no'){
                                                        echo '<label class="btn btn-outline-success">
                                                                    <input type="radio" name="SlipOn_inspection" id="SlipOn_inspection_YES" autocomplete="off" value="yes"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger active">
                                                                    <input type="radio" name="SlipOn_inspection" id="SlipOn_inspection_NO" autocomplete="off" value="no" checked=""> No
                                                                </label>
                                                                <label class="btn btn-outline-success">
                                                                    <input type="radio" name="SlipOn_inspection" id="SlipOn_inspection_NA" autocomplete="off" value="n/a"> N/A
                                                                </label>';
                                                    }else{
                                                        echo '<label class="btn btn-outline-success">
                                                                    <input type="radio" name="SlipOn_inspection" id="SlipOn_inspection_YES" autocomplete="off" value="yes"> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger">
                                                                    <input type="radio" name="SlipOn_inspection" id="SlipOn_inspection_NO" autocomplete="off" value="no"> No
                                                                </label>
                                                                <label class="btn btn-outline-success active">
                                                                    <input type="radio" name="SlipOn_inspection" id="SlipOn_inspection_NA" autocomplete="off" value="n/a" checked=""> N/A
                                                                </label>';
                                                    }
                                                ?>
                                                
                                            </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-10 input-group input-group-sm">
                                    <input type="text" class="form-control form-control-border" id="Comment_6" name="Comment_6" value="<?php echo $slip_on->VALIDATION_COMMENT;?>" placeholder="Add a comment...">
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
                    <div class="card-body" >
                        <!-- <form class="form-horizontal"> -->
                            <div class="card-body">
                            <!-- <div class="col-sm-6"> -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Moisture test (Aquaboy) Pass</label>
                                    <div class="input-group input-group col-sm-10">
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <?php 
                                                    if($moisture->VALIDATION_RESULT == 'yes'){
                                                        echo ' <label class="btn btn-outline-success active">
                                                                    <input type="radio" name="Moisture_test" id="Moisture_test_YES" autocomplete="off" value="yes" checked=""> Yes
                                                                    </label>
                                                                <label class="btn btn-outline-danger">
                                                                    <input type="radio" name="Moisture_test" id="Moisture_test_YES" autocomplete="off" value="no"> No
                                                                </label>
                                                                <label class="btn btn-outline-success">
                                                                    <input type="radio" name="Moisture_test" id="Moisture_test_YES" autocomplete="off" value="n/a"> N/A
                                                                </label>';
                                                    }else if($moisture->VALIDATION_RESULT == 'no'){
                                                        echo ' <label class="btn btn-outline-success">
                                                                <input type="radio" name="Moisture_test" id="Moisture_test_YES" autocomplete="off" value="yes"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger active">
                                                                <input type="radio" name="Moisture_test" id="Moisture_test_YES" autocomplete="off" value="no" checked=""> No
                                                            </label>
                                                            <label class="btn btn-outline-success">
                                                                <input type="radio" name="Moisture_test" id="Moisture_test_YES" autocomplete="off" value="n/a"> N/A
                                                            </label>';
                                                    }else{
                                                        echo ' <label class="btn btn-outline-success">
                                                                <input type="radio" name="Moisture_test" id="Moisture_test_YES" autocomplete="off" value="yes"> Yes
                                                                </label>
                                                            <label class="btn btn-outline-danger">
                                                                <input type="radio" name="Moisture_test" id="Moisture_test_YES" autocomplete="off" value="no"> No
                                                            </label>
                                                            <label class="btn btn-outline-success active">
                                                                <input type="radio" name="Moisture_test" id="Moisture_test_YES" autocomplete="off" value="n/a" checked=""> N/A
                                                            </label>';
                                                    }
                                                ?>
                                               
                                            </div>
                                    </div>
                                </div><br>
                                
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-10 input-group input-group-sm">
                                    <input type="text" class="form-control form-control-border" id="Comment_7" value="<?php echo $moisture->VALIDATION_COMMENT;?>" name="Comment_7" placeholder="Add a comment...">
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
                    <div class="card-body" style="background-color:#ffc107">
                        <h4 class="timeline-header" style="font-color:blue">Uploaded Image</h4>
                        <div class="row" id="display_measurements">
                            <!-- <div class="col-md-12"  ></div> -->
                        </div>
                        
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
          
            <!-- general form elements disabled="disabled" -->
          
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

         <!-- MODAL DISPLAY IMAGE BEFORE UPLOAD  -->
            <div class="modal fade" id="Modal_image_prev" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Preview Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <div class="modal-body">
                        <!-- <img id="display_prevs" src="" width="120" height="150" style="border: 1px solid blue" /> -->
                        <div id="display_prevs"><img id="imagepreview" src="" width="100%" height="auto" style="border: 1px solid blue" /></div>
                        
                  </div>
                 <div class='modal-footer'>
               
                 </div>
                </div>
              </div>
            </div>
        <!-- END MODAL DISPLAY IMAGE BEFORE UPLOAD -->
    
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
<script src="<?php echo base_url();?>template/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- <script src="<?php echo base_url();?>template/plugins/toastr/toastr.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url();?>template/new_js/sweetalert2/sweetalert2.all.min.js"></script>



