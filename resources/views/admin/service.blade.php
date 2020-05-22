@extends('admin/master/page')
@extends('admin/master/sidebar')

@section('content')

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Service</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Service</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="title" style="float: left">
                            <h4 class="card-title">Service List</h4>
                            <h6 class="card-subtitle">Manage your Service List</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered display dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Seller</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach($service as $row) { 
                                        $location = explode('|', $row->location);
                                        $user = DB::table('user')->where('id', $row->seller)->first();
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row->title ?></td>
                                            <td><?= $row->description ?></td>
                                            <td><?= $location[0] ?></td>
                                            <td><?= $row->price ?></td>
                                            <td><?= $user->user ?></td>
                                            <td style="text-align: center">
                                                <a class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle waves-effect waves-dark btn btn-secondary btn-sm" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choose </a>
                                                    <div class="dropdown-menu dropdown-menu-center user-dd animated">
                                                        <a class="dropdown-item" href="<?= URL::to('administrator/service/delete/'.$row->id) ?>"><i class="ti-trash m-r-5 m-l-5"></i> Delete</a>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

@endsection