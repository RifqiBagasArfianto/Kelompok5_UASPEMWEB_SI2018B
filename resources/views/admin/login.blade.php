@extends('admin/master/page')
@section('content')
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper" style="padding-top:100px; padding-bottom: 70px">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid" style="width:40%; min-width: 300px">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-body">
                        <h4 class="card-title">Login</h4>
                        <h5 class="card-subtitle"> Kang Laundry Administrator </h5>
                        <?php if(Session::get('status') == "failed") { ?>
                            <div class="alert alert-danger">
                                Login failed incorrect Email or Password.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            </div>
                        <?php } ?>
                        <form class="form-horizontal m-t-30" action="<?php echo URL::to('administrator/login/auth'); ?>" method="POST">
                          @csrf
                            <div class="form-group">
                                <label for="example-email">Email</label>
                                <input type="email" id="input-email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="rem">
                                <label class="custom-control-label" for="rem">Remember me</label>
                            </div>
                        </br>
                        <div class="form-group" style="text-align: center;">
                           <button style="width:50%" class="btn btn-info">Login</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
       <!-- ============================================================== -->
       <!-- End PAge Content -->
       <!-- ============================================================== -->
       <!-- ============================================================== -->
       <!-- Right sidebar -->
       <!-- ============================================================== -->
       <!-- .right-sidebar -->
       <!-- ============================================================== -->
       <!-- End Right sidebar -->
       <!-- ============================================================== -->
   </div>
   <!-- ============================================================== -->
   <!-- End Container fluid  -->
   <!-- ============================================================== -->
   <!-- ============================================================== -->
   @endsection