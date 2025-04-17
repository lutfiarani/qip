</div>
    </div>
    
  </div>
  

  <!-- Control Sidebar -->
  {{-- <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->



<script src="{{asset('js/jquery-3.7.0.js"></script>
    <script>
         $(document).ready(function(){
              $('#buttonSearchPO').on('click',function(){
                  var PO = $('#searchPO').val();
                  
                  window.location.href = '/search_PO/'+PO;
                  return false;
                
              })
         })
    </script>
</body>
</html>
