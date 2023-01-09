<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Deskripsi Task</th>
                                    <th>Nama Relawan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($list_task_relawan as $ltr) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $ltr['task_description'] ?></td>
                                        <td><?= $ltr['identity_name'] ?></td>
                                        <td>
                                            <?php if ($ltr['task_status'] == 'Ditugaskan') { ?>
                                                <span class="badge bg-warning"><?= $ltr['task_status'] ?></span>
                                            <?php } else if ($ltr['task_status'] == 'Sedang Dalam Proses') { ?>
                                                <span class="badge bg-warning"><?= $ltr['task_status'] ?></span>
                                            <?php } else if ($ltr['task_status'] == 'Task Sudah Selesai') { ?>
                                                <span class="badge bg-success"><?= $ltr['task_status'] ?></span>

                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->