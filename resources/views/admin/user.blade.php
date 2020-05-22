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
                <h4 class="page-title">User</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
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
                            <h4 class="card-title">User List</h4>
                            <h6 class="card-subtitle">Manage your User List</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered display dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach($user as $row) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row->user ?></td>
                                            <td><?= $row->email ?></td>
                                            <td><?= $row->phone ?></td>
                                            <td><?= $row->role ?></td>
                                            <td style="text-align: center">
                                                <a class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle waves-effect waves-dark btn btn-secondary btn-sm" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choose </a>
                                                    <div class="dropdown-menu dropdown-menu-center user-dd animated">
                                                        <a class="dropdown-item edit-user" href="#" data-toggle="modal" data-id="<?= $row->id ?>" data-target="#m-edit-user"><i class="ti-pencil m-r-5 m-l-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="<?= URL::to('administrator/user/delete/'.$row->id) ?>"><i class="ti-trash m-r-5 m-l-5"></i> Delete</a>
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
    <div class="modal fade" id="m-edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <form action="<?= URL::to('administrator/user/update') ?>" enctype="multipart/form-data" method="post">
          @csrf
          <div class="modal-body">
            <div class="edit-body">
                
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update User</button>
      </form>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>

@endsection