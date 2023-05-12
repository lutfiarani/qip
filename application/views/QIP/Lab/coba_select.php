<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location = window.location.href;
        zoom: 95%;
    }
    setInterval('autoRefreshPage()', 180000);
    
</script>

<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $formtitle;?></h3>
            </div>
            <!-- /.card-header -->
          
            <div class="card card-primary">
           
            <form role="form" action=<?php echo $action;?> method="post">
               <div class="card-body">
                <!-- Date range -->
                
                <div class="form-group">
                    <label> Pickup Date</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input placeholder="yyyy-mm-dd" type="text" class="form-control datepicker" name="PICKUP_DATE">
                    </div>
                </div>
               </div>
            <!-- /.card -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Search</button>
        </div>
        </form>
      
        
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">LAB PICKUP SHOE <?php echo $tgl;?></h3>
              </div>
              <!-- /.card-header -->
             
              <!-- /.card-body -->
            </div>
            
            <div class="card-body">
            
            

            <div class="table-responsive-sm">
           <?php echo $query;?>
  </div>
  <?php //}?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          
        



          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>