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
                <h4 class="page-title">Facility</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Facility</li>
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
                            <h4 class="card-title">Facility List</h4>
                            <h6 class="card-subtitle">Manage your Facility List</h6>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#m-add-facility" style="float:right;" class="btn btn-sm btn-success">Add Facility</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered display dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach($facility as $row) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row->name ?></td>
                                            <td style="text-align: center">
                                                <a class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle waves-effect waves-dark btn btn-secondary btn-sm" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choose </a>
                                                    <div class="dropdown-menu dropdown-menu-center user-dd animated">
                                                        <a class="dropdown-item" href="<?= URL::to('administrator/facility/delete/'.$row->id) ?>"><i class="ti-trash m-r-5 m-l-5"></i> Delete</a>
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

<div class="modal fade" id="m-add-facility" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Facility</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form action="<?= URL::to('administrator/facility/insert') ?>" enctype="multipart/form-data" method="post">
      @csrf
      <div class="modal-body">
        <div class="edit-body">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Facility Name" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Add Facility</button>
  </form>
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

@endsection