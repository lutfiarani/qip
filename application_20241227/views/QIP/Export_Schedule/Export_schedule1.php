<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

<?php 
  foreach($query as $querys => $value){
?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>CONTAINER</th>
                  <th>FACTORY</th>
                  <th>PO NO</th>
                  <th>MODEL NAME</th>
                  <th>DESTINATION</th>
                  <th>QTY CARTON</th>
                  <th>SDD</th>
                  <th>REMARK</th>
                 
                </tr>
                </thead>
                <tbody>
                <?php
		$jumlah = count($value);
	    for ($i=0; $i<$jumlah; $i++){
				$data = $value[$i];
        if ($data['STATUS_PO2']=='RELEASE')
        {
          echo "<tr style='background-color:#91E3A5'>";
        } else if ($data['STATUS_PO2']=='REJECT')
        {
          echo "<tr style='background-color:#FF0000'>";
        } else if ($data['STATUS_PO2']=='REPACKING')
        {
          echo "<tr style='background-color:#A0A0A0'>";
        } else if ($data['STATUS_PO2']=='WAITING')
        {
          echo "<tr style='background-color:#3399FF'>";
        } else if ($data['STATUS_PO2']=='PRODUCT')
        {
          echo "<tr style='background-color:#FFFF99'>";
        } else if ($data['STATUS_PO2']=='CANCEL')
        {
          echo "<tr style='background-color:#FF8000'>";
        }
        echo "
                <td>".($i+1)."</td>
                <td>$data[CONTAINER]</td>
                <td>$data[FACTORY]</td>
                <td> <a href='".site_url('C_Export/detail_export/'.$data['PO_NO'])."'>$data[PO_NO]</a> </td>
                <td>$data[MODEL_NAME]</td>
                <td>$data[DESTINATION]</td>
                <td>$data[QTY_CRTN]</td>
                <td>$data[ZHSDD]</td>
                <td>$data[STATUS_PO2]</td>
               	</tr>";
        
        /*echo "<tr>
        <td>".($i+1)."</td>
    <td>$data[id]</td>
    <td>$data[po]</td>
    <td>$data[date]</td>
    <td>$data[remark]</td>
   
   </tr>";*/
				  
				
		}
  ?>
                </tbody>
                </table>
  <?php }?>
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