<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-left"><a href="<?= base_url('donatur_beri_bantuan') ?>" class="btn btn-success btn-sm">Beri Bantuan</a></h3>
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
                                    <th>Barang Bantuan</th>
                                    <th>Jumlah Bantuan</th>
                                    <th>Status</th>
                                    <!-- <th>Detail</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($list_bantuan_donatur as $lbd) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $lbd['bb_nama'] ?></td>
                                        <td><?= $lbd['bb_jumlah'] . ' ' . $lbd['bb_satuan'] ?></td>
                                        <td>
                                            <?php if ($lbd['bantuan_status'] == 'Disimpan') { ?>
                                                <span class="badge bg-warning">Mencari Relawan</span>
                                            <?php } else if ($lbd['bantuan_status'] == 'Diantar') { ?>
                                                <span class="badge bg-success">Sedang Diantar</span>
                                            <?php } else if ($lbd['bantuan_status'] == 'Telah Tiba') { ?>
                                                <span class="badge bg-success">Telah Tiba</span>
                                            <?php } else if ($lbd['bantuan_status'] == 'Mendapatkan Relawan') { ?>
                                                <span class="badge bg-success">Relawan Akan Datang Mengambil Barang</span>
                                            <?php } ?>
                                        </td>
                                        </td>
                                        <!-- <td><a href="<?= base_url('penyintas_minta_bantuan_detail') ?>/<?= $lbd['bantuan_id'] ?>" class="btn btn-primary btn-sm">Detail</a></td> -->
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