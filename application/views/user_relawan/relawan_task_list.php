<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <b>Task Ditugaskan</b>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Deskripsi Task</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($list_task_relawan_ditugaskan as $ltrd) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $ltrd['task_description'] ?></td>
                                        <td>
                                            <span class="badge bg-warning"><?= $ltrd['task_status'] ?></span>

                                        </td>
                                        <td>

                                            <a href="<?= base_url('user_set_bantuan_taken_relawan') ?>/<?= $ltrd['task_id'] ?>" class="btn btn-sm btn-primary">Ambil Bantuan</a>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <b>Task Sedang Dikerjakan</b>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                    <tr>
                                        <th>Tahap</th> 
                                        <th>Lokasi Pickup</th> 
                                        <th>Lokasi Drop</th> 
                                        <th>Cek Tujuan</th> 
                                        <th>Aksi</th> 

                                    </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_task_relawan_sedangproses as $ltrs) : ?>
                                        <tr>
                                            <td>Tahap 1 : Mengambil barang dari donatur</td>
                                            <td id="pickup_loc"><?=$ltrs['task_pickup_loc']?></td>
                                            <td>-</td>
                                            <td><a id="cek_direksi_btn" data-toggle ="modal" data-target="#cek_direksi_modal" class="btn btn-sm btn-primary">Cek Direksi Tujuan</a></td>
                                            <td><a href="<?=base_url('admin_set_all_status_telahambil')?>/<?=$ltrs['task_id']?>" class="btn btn-sm btn-success">Konfirmasi Barang Sudah Diambil</a></td>
                                        </tr>
                                        <tr>
                                            <td>Tahap 2 : Mengantar barang ke pemohon</td>
                                            <td>-</td>
                                            <td id="drop_loc"><?=$ltrs['task_drop_loc']?></td>
                                            <td><a id="cek_direksi_btn_2" data-toggle ="modal" data-target="#cek_direksi_modal_2" class="btn btn-sm btn-primary">Cek Direksi Tujuan</a></td>
                                            <td><a href="<?=base_url('admin_set_all_status_telahtiba')?>/<?=$ltrs['task_id']?>"class="btn btn-sm btn-success">Konfirmasi Barang Sudah Sampai</a></td>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <b>Task Selesai</b>
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
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- Cek Direksi Modal-->
<div class="modal fade" id="cek_direksi_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cek Direksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
              <div class="form-group">
                <label for="">Lokasi Anda Saat Ini</label>
                <input type="text" id="my_loc" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Lokasi Pick Up</label>
                <input type="text" id="donatur_loc" class="form-control">
              </div>
            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary btn-sm" id="img_msg_send_button" type="button" data-dismiss="modal">Cancel</button>
                <a href="" class="btn btn-success btn-sm" id="direksi_btn">Cek Direksi</a>
                <!-- <button class="btn btn-success btn-sm" type="submit" id="uploadModalButton" href="">Send</button> -->
            </div>

            </form>

        </div>
    </div>
</div>




<!-- Cek Direksi Modal-->
<div class="modal fade" id="cek_direksi_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cek Direksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
              <div class="form-group">
                <label for="">Lokasi Anda Saat Ini</label>
                <input type="text" id="my_loc_2" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Lokasi Pick Up</label>
                <input type="text" id="penyintas_loc" class="form-control">
              </div>
            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary btn-sm" id="img_msg_send_button" type="button" data-dismiss="modal">Cancel</button>
                <a href="" class="btn btn-success btn-sm" id="direksi_btn_2">Cek Direksi</a>
                <!-- <button class="btn btn-success btn-sm" type="submit" id="uploadModalButton" href="">Send</button> -->
            </div>

            </form>

        </div>
    </div>
</div>





<script>
    $("#cek_direksi_btn").on('click', function(){
        var donatur_loc = document.getElementById('pickup_loc').innerText;
        document.getElementById('donatur_loc').value = donatur_loc;

    });

    $("#cek_direksi_btn_2").on('click', function(){

        var donatur_loc = document.getElementById('pickup_loc').innerText;
        var penyintas_loc = document.getElementById('drop_loc').innerText;
        
        document.getElementById('my_loc_2').value = donatur_loc;
        document.getElementById('penyintas_loc').value = penyintas_loc;

    });
    
    
    $("#direksi_btn").on('click', function(){
        var start = document.getElementById('my_loc').value;
        var end = document.getElementById('donatur_loc').value;
        
        window.open("http://maps.google.com/maps?saddr=" + start+"&daddr="+end+"", "_blank");

    });
    $("#direksi_btn_2").on('click', function(){
        var start = document.getElementById('my_loc_2').value;
        var end = document.getElementById('penyintas_loc').value;
        
        window.open("http://maps.google.com/maps?saddr=" + start+"&daddr="+end+"", "_blank");

    });



</script>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->