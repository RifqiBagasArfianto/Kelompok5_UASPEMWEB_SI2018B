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
                <h4 class="page-title">Order</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Order</li>
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
                            <h4 class="card-title">Order List</h4>
                            <h6 class="card-subtitle">Manage your Order List</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered display dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bukti</th>
                                        <th>Nama</th>
                                        <th>Berat Laundry</th>
                                        <th>Alamat</th>
                                        <th>Service</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 1; foreach($order as $row) { 
                                        $order = DB::table('order')->where('id', $row->order_id)->first();
                                        $service = DB::table('product')->where('id', $order->service)->first();
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><img src="<?= URL::to('assets/invoice/'. $row->photo) ?>" width="100"></td>
                                            <td><?= $order->name ?></td>
                                            <td><?= $order->weight ?></td>
                                            <td><?= $order->address ?></td>
                                            <td><?= $service->title ?></td>
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