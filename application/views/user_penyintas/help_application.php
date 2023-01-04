<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Isi Form Pengajuan Bantuan</h3>
                    </div>

                    <div class="card-body">
                        <form action="<?= base_url('penyintas_minta_bantuan') ?>" method="POST">

                            <div class="form-group">
                                <label for="pb_jenis_bantuan">Jenis Bantuan</label>
                                <select name="pb_jenis_bantuan" id="pb_jenis_bantuan" class="form-control" required>
                                    <option selected disabled>Pilih Jenis Bantuan...</option>
                                    <option value="Barang">Barang</option>
                                    <option value="Uang Tunai">Uang Tunai</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pb_barang_kebutuhan">Barang Kebutuhan</label>
                                <input type="text" id="pb_barang_kebutuhan" name="pb_barang_kebutuhan" class="form-control" value="<?= set_value('pb_barang_kebutuhan') ?>">
                                <?= form_error('pb_barang_kebutuhan', '<small class="text-danger pl-3" style="margin-top: 0px;">', '</small>') ?>

                            </div>

                            <div class="form-group">
                                <label for="pb_jumlah_barang">Jumlah Barang</label>
                                <input type="number" id="pb_jumlah_barang" name="pb_jumlah_barang" class="form-control" value="<?= set_value('pb_jumlah_barang') ?>">
                                <?= form_error('pb_jumlah_barang', '<small class="text-danger pl-3" style="margin-top: 0px;">', '</small>') ?>

                            </div>

                            <div class="form-group">
                                <label for="pb_satuan_barang">Satuan Barang</label>
                                <select class="js-example-basic-single form-control" name="pb_satuan_barang" id="pb_satuan_barang" required>
                                    <option disabled selected>Pilih Satuan...</option>
                                    <option value="KG">KG</option>
                                    <option value="Cup">Cup</option>
                                    <option value="Gelas">Gelas</option>
                                    <option value="Botol">Botol</option>
                                    <option value="Karung">Karung</option>
                                    <option value="Kardus">Kardus</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pb_drop_loc">Alamat Lengkap Drop Barang</label>
                                <input type="text" id="pb_drop_loc" name="pb_drop_loc" class="form-control" value="<?= set_value('pb_drop_loc') ?>">
                                <?= form_error('pb_drop_loc', '<small class="text-danger pl-3" style="margin-top: 0px;">', '</small>') ?>
                                
                            </div>

                            <div class="form-group">
                                <label for="pb_deskripsi_tambahan">Catatan Tambahan</label>
                                <input type="text" id="pb_deskripsi_tambahan" name="pb_deskripsi_tambahan" class="form-control" value="<?= set_value('pb_deskripsi_tambahan') ?>">
                                <?= form_error('pb_deskripsi_tambahan', '<small class="text-danger pl-3" style="margin-top: 0px;">', '</small>') ?>

                            </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="button btn btn-sm btn-success float-right">Apply Pengajuan</button>
                    </div>

                    </form>
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
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->