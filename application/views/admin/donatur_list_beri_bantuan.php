<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Donatur</th>
                                    <th>Bantuan Pemberian</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody id="table_body">
                                <?php $no = 1;
                                foreach ($list_bantuan_donatur as $lbd) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $lbd['identity_name'] ?></td>
                                        <td><?= $lbd['bb_nama'] ?></td>
                                        <td><?= $lbd['bb_jumlah'] ?>&nbsp;<?= $lbd['bb_satuan'] ?></td>

                                        <td>
                                            <?php if ($lbd['bantuan_status'] == 'Disimpan') { ?>
                                                <span class="badge bg-warning">Mencari Relawan</span>
                                            <?php } else if ($lbd['bantuan_status'] == 'Diantar') { ?>
                                                <span class="badge bg-success">Sedang Diantar</span>
                                            <?php } else if ($lbd['bantuan_status'] == 'Telah Tiba') { ?>
                                                <span class="badge bg-success">Telah Tiba</span>
                                            <?php } else if ($lbd['bantuan_status'] == 'Mendapatkan Relawan') { ?>
                                                <span class="badge bg-success">Relawan Menuju Donatur</span>
                                            <?php } ?>
                                        </td>
                                        <td><a href="<?= base_url('admin_penyintas_detail_pengajuan') ?>/<?= $lbd['bantuan_id'] ?>" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                </svg></a></td>
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