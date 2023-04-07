<!-- Bootstrap core JavaScript-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../assets/js/demo/datatables-demo.js"></script>



<script src="../assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="../assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="../assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->

<script src="../assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
<script src="../assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="../assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="../assets/js/app.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="../assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>

<script src="../assets/datepicker/bootstrap-datepicker.min.js"></script>
<script src="../assets/datepicker/date.js"></script>


<script type="text/javascript">
  // https://github.com/uxsolutions/bootstrap-datepicker
  $('.dateselects').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    todayHighlidht: true
  }).on('changeDate', function(ev) {
    $(this).datepicker('hide');
  });
  $(".datepicker").datepicker({
    format: 'dd-mm-yyyy',
    onSelect: function(date) {
      alert(date);
    }

  });
  // $('.dateselect2').datepicker({
  //     format: 'mm/dd/yyyy',
  //     autoclose:true,
  //     todayHighlidht: true,
  // }).on("hide", function(){
  //   if ($)
  // }
</script>