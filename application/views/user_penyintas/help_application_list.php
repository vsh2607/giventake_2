<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-left"><a href="<?= base_url('penyintas_minta_bantuan') ?>" class="btn btn-success btn-sm">Buat Bantuan</a></h3>

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
                                    <th>Jenis Bantuan</th>
                                    <th>Barang Kebutuhan</th>
                                    <th>Jumlah Barang</th>
                                    <th>Satuan</th>
                                    <th>Tgl Apply</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($list_permohonan_bantuan as $lpb) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $lpb['pb_jenis_bantuan'] ?></td>
                                        <td><?= $lpb['pb_barang_kebutuhan'] ?></td>
                                        <td><?= $lpb['pb_jumlah_barang'] ?></td>
                                        <td><?= $lpb['pb_satuan_barang'] ?></td>
                                        <td><?= date("d F y", $lpb['pb_created']) ?></td>
                                        <?php if ($lpb['pb_status'] == 'Pending') { ?>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                        <?php } else if ($lpb['pb_status'] == 'Accepted') { ?>
                                            <td><span class="badge bg-success">Accepted</span></td>
                                        <?php } else if ($lpb['pb_status'] == 'Denied') { ?>
                                            <td><span class="badge bg-danger">Denied</span></td>
                                        <?php
                                        } ?>
                                        <td><a href="" class="btn btn-primary btn-sm">Detail</a></td>
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