<?php 

if(Session::get('status') == 'deleted') {
    echo '<script>alert("data has been deleted")</script>';
} else if(Session::get('status') == 'updated') {
     echo '<script>alert("data has been updated")</script>';
} else if(Session::get('status') == 'added') {
     echo '<script>alert("data has been added")</script>';
} else {
    
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= URL::to('admin/assets') ?>/images/favicon.png">
    <title>Kang Laundry - Admin</title>
    <!-- Custom CSS -->
    <link href="<?= URL::to('admin/assets') ?>/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= URL::to('admin/assets') ?>/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?= URL::to('admin/assets') ?>/libs/datatables.net-bs4/css/datatables.min.css" rel="stylesheet">

    <link href="<?= URL::to('admin/dist') ?>/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    

    @yield('content')

    <footer class="footer text-center">
        All Rights Reserved by Nice admin. Designed and Developed by
        <a href="https://wrappixel.com">WrapPixel</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= URL::to('admin/assets') ?>/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= URL::to('admin/assets') ?>/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= URL::to('admin/assets') ?>/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?= URL::to('admin/assets') ?>/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?= URL::to('admin/dist') ?>/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?= URL::to('admin/dist') ?>/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= URL::to('admin/dist') ?>/js/custom.min.js"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="<?= URL::to('admin/assets') ?>/libs/chartist/dist/chartist.min.js"></script>
<script src="<?= URL::to('admin/assets') ?>/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="<?= URL::to('admin/dist') ?>/js/pages/dashboards/dashboard1.js"></script>
<script src="<?= URL::to('admin/assets') ?>/extra-libs/DataTables/datatables.min.js"></script>
<script src="<?= URL::to('admin/assets') ?>/extra-libs/DataTables/datatables.responsive.js"></script>
<script src="<?= URL::to('admin/dist')   ?>/js/pages/datatable/datatable-basic.init.js"></script>

<script>
    $(document).ready( function () {
        $('#datatable').DataTable();
    });
</script>

<script>
    $('.edit-user').on('click', function() {
      $('#m-edit-user').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
          type : 'post',
          url : '<?= URL::to("administrator/user/edit") ?>',
          data :  'rowid='+ rowid,
          success : function(data){
            $('.edit-body').html(data);
          }
        });
      })
    })
  </script>

</body>

</html>