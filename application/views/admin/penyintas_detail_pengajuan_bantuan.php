<style type="text/css">
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg th {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg .tg-oe15 {
        background-color: #ffffff;
        border-color: #ffffff;
        text-align: left;
        vertical-align: top
    }

    .tg .tg-3m6e {
        background-color: #ffffff;
        border-color: #ffffff;
        font-weight: bold;
        text-align: left;
        vertical-align: top
    }

    .tg .tg-c1kk {
        background-color: #ffffff;
        border-color: #ffffff;
        text-align: right;
        vertical-align: top
    }
</style>



<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Permohonan</h3>
                    </div>

                    <div class="card-body">

                        <table class="tg">
                            <thead>
                                <tr>
                                    <th class="tg-3m6e">Nama Pemohon</th>
                                    <th class="tg-c1kk">:</th>
                                    <th class="tg-oe15"><?= $list_pengajuan_bantuan_penyintas->identity_name ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tg-3m6e">Jenis Bantuan</td>
                                    <td class="tg-c1kk">:</td>
                                    <td class="tg-oe15"><?= $list_pengajuan_bantuan_penyintas->pb_jenis_bantuan ?></td>
                                </tr>
                                <tr>
                                    <td class="tg-3m6e">Tanggal Apply</td>
                                    <td class="tg-c1kk">:</td>
                                    <td class="tg-oe15"><?= date('d F Y',  $list_pengajuan_bantuan_penyintas->pb_created) ?></td>
                                </tr>
                                <tr>
                                    <td class="tg-3m6e">Barang Bantuan</td>
                                    <td class="tg-c1kk">:</td>
                                    <input type="hidden" value="<?= $list_pengajuan_bantuan_penyintas->pb_barang_kebutuhan ?>" id="barang_kebutuhan">
                                    <td class="tg-oe15"><b><?= $list_pengajuan_bantuan_penyintas->pb_barang_kebutuhan ?></b></td>
                                </tr>
                                <tr>
                                    <td class="tg-3m6e">Jumlah</td>
                                    <td class="tg-c1kk">:</td>
                                    <td class="tg-oe15"><b><?= $list_pengajuan_bantuan_penyintas->pb_jumlah_barang . ' ' . $list_pengajuan_bantuan_penyintas->pb_satuan_barang ?></b></td>
                                </tr>
                                <tr>
                                    <td class="tg-3m6e">Lokasi Drop</td>
                                    <td class="tg-c1kk">:</td>
                                    <td class="tg-oe15"><?= $list_pengajuan_bantuan_penyintas->pb_drop_loc ?></td>
                                </tr>
                                <tr>
                                    <td class="tg-3m6e">Deskripsi Tambahan</td>
                                    <td class="tg-c1kk">:</td>
                                    <td class="tg-oe15"><?= $list_pengajuan_bantuan_penyintas->pb_deskripsi_tambahan ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <br>
                        <br>

                        <form action="<?= base_url('admin_reject_permohonan') ?>" method="post">
                            <div class="form-group">
                                <label for="">Respon</label>
                                <input type="text" class="form-control" name="admin_respon" placeholder="Isi Respon...">
                                <input type="hidden" name="permohonan_id" value="<?= $list_pengajuan_bantuan_penyintas->pb_id ?>">
                            </div>


                    </div>


                    <div class="card-footer">

                        <a href="#" id="cek_btn" class="btn btn-primary btn-sm">Cek Ketersediaan Barang</a>
                        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                        <a href="#" id="create_task" data-toggle="modal" data-target="#create_task_modal" class="btn btn-success btn-sm">Buat Task</a>
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


<!-- Buat Task Modal-->
<div class="modal fade" id="create_task_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List Bantuan</h5>
                <button class="close" type="button" data-dismiss="modal" id="dismiss_button" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body" id="list_bantuan">
                <form action="<?=base_url('admin_create_task')?>" method="post">
                    <div class="form-group">
                        <label for="identity_name">Nama Pemohon</label>
                        <input type="text" class="form-control" id="identity_name" name="identity_name" value="<?= $list_pengajuan_bantuan_penyintas->identity_name ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="pb_drop_loc">Lokasi Drop Bantuan</label>
                        <input type="text" class="form-control" id="pb_drop_loc" name="pb_drop_loc" value="<?= $list_pengajuan_bantuan_penyintas->pb_drop_loc ?>" readonly>
                    </div>


                    <input type="hidden" id="pb_id" name="pb_id" value="<?= $list_pengajuan_bantuan_penyintas->pb_id ?>">
                    
                    <div class="form-group">
                        <label for="bantuan_id">List Bantuan</label>
                        <div id="list_bantuan_tersedia">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="donatur">Nama Donatur</label>
                        <input type="text" id="donatur_name"  name="donatur_name" value="" class="form-control" readonly>
                    </div>


                    <div class="form-group">
                        <label for="donatur">Lokasi Pick Up Bantuan</label>
                        <input type="text" id="donatur_pickup_loc" name="donatur_pickup_loc"value="" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="relawan_id">Relawan</label>
                        <select class="form-control" name="relawan_id" id="relawan_id">
                            <option disabled selected>Pilih Relawan...</option>
                            <?php foreach ($active_relawan as $ar) : ?>
                                <option value="<?= $ar['relawan_id'] ?>"><?= $ar['identity_name'] ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>



            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary btn-sm" type="button" id="dismiss_button2" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success btn-sm" id="create_task_btn" type="submit">Create Task</button>
            </div>
            </form>

            </form>

        </div>
    </div>
</div>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>
    $(document).ready(function() {
        $("#cek_btn").on('click', function() {
            var barang = document.getElementById('barang_kebutuhan').value;
            $.post('<?= base_url('admin_get_cek_bantuan') ?>', {
                    barang: barang
                },
                function(data, status) {
                    alert(data);
                });
        });


        $("#create_task").on('click', function() {
            var barang = document.getElementById('barang_kebutuhan').value;
            $.post('<?= base_url('admin_get_list_bantuan_penyintas') ?>', {
                    barang: barang
                },
                function(data, status) {
                    $("#list_bantuan_tersedia").html(data);
                });
        });


        $("#dismiss_button").on('click', function(){
            document.getElementById('donatur_name').value = '';
            document.getElementById('donatur_pickup_loc').value = '';
        });
        $("#dismiss_button2").on('click', function(){
            document.getElementById('donatur_name').value = '';
            document.getElementById('donatur_pickup_loc').value = '';
        });



    });
</script>


<script>
    function getSelected() {
        var select = document.getElementById('bantuan_id');
        var value = select.options[select.selectedIndex].value;


        $.post('<?= base_url('admin_get_donatur_bantuan_bb') ?>', {
            id_bantuan: value
        }, function(data, status) {
            document.getElementById('donatur_name').value = data['data'].identity_name;
            document.getElementById('donatur_pickup_loc').value = data['data'].bb_pickup_loc;
        });
    }
</script>



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->