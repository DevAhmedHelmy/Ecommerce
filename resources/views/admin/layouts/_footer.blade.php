<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
 
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
 
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('js/dataTables.buttons.js')}}"></script> 


<script src="/vendor/datatables/buttons.server-side.js"></script> 
<script src="{{asset('js/adminlte.min.js')}}"></script>
@stack('js')
@stack('css')
</body>
</html>