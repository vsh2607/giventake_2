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

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Respon</label>
                                <input type="text" class="form-control" placeholder="Isi Respon...">
                            </div>


                    </div>


                    <div class="card-footer">

                        <a href="#" class="btn btn-primary btn-sm">Cek Ketersediaan Barang</a>
                        <a href="#" class="btn btn-danger btn-sm">Tolak</a>
                        <a href="#" class="btn btn-success btn-sm">Buat Task</a>
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

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->