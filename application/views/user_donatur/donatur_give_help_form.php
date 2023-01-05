<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Isi Form Beri Bantuan</h3>
                    </div>

                    <div class="card-body">
                        <form action="<?= base_url('donatur_beri_bantuan') ?>" method="POST">

                            <div class="form-group">
                                <label for="bantuan_type">Tipe Bantuan</label>
                                <select name="bantuan_type" id="bantuan_type" class="form-control" required>
                                    <option selected disabled>Pilih Jenis Bantuan...</option>
                                    <option value="Barang">Barang</option>
                                    <option value="Uang Tunai">Uang Tunai</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bb_jenis">Jenis Barang</label>
                                <select class="js-example-basic-single form-control" name="bb_jenis" id="bb_jenis" required>
                                    <option disabled selected>Pilih Jenis...</option>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                    <option value="Obat">Obat</option>
                                    <option value="Pakaian">Pakaian</option>
                                    <option value="Uang Tunai">Uang Tunai</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="bb_nama">Nama Barang</label>
                                <input type="text" id="bb_nama" name="bb_nama" class="form-control" value="<?= set_value('bb_nama') ?>">
                                <?= form_error('pb_barang_kebutuhan', '<small class="text-danger pl-3" style="margin-top: 0px;">', '</small>') ?>

                            </div>

                            <div class="form-group">
                                <label for="bb_jumlah">Jumlah Barang</label>
                                <input type="number" id="bb_jumlah" name="bb_jumlah" class="form-control" value="<?= set_value('bb_jumlah') ?>">
                                <?= form_error('pb_jumlah_barang', '<small class="text-danger pl-3" style="margin-top: 0px;">', '</small>') ?>

                            </div>

                            <div class="form-group">
                                <label for="bb_satuan">Satuan Barang</label>
                                <select class="js-example-basic-single form-control" name="bb_satuan" id="bb_satuan" required>
                                    <option disabled selected>Pilih Satuan...</option>
                                    <option value="KG">KG</option>
                                    <option value="Cup">Cup</option>
                                    <option value="Gelas">Gelas</option>
                                    <option value="Botol">Botol</option>
                                    <option value="Karung">Karung</option>
                                    <option value="Kardus">Kardus</option>
                                    <option value="Helai">Helai</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bb_pickup_loc">Alamat Lengkap Pick Up Barang</label>
                                <input type="text" id="bb_pickup_loc" name="bb_pickup_loc" class="form-control" value="<?= set_value('bb_pickup_loc') ?>">
                                <?= form_error('pb_drop_loc', '<small class="text-danger pl-3" style="margin-top: 0px;">', '</small>') ?>
                                
                            </div>

                      
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="button btn btn-sm btn-success float-right">Apply Bantuan</button>
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