<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($data_penyintas as $dp) : ?>

                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">

                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b><?= $dp['identity_name'] ?></b></h2>
                                    <p class="text-muted text-sm">Username : <?= $dp['identity_username'] ?></p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?= $dp['identity_address'] ?></li>
                                        <p></p>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?= $dp['identity_phone_number'] ?></li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="https://img.freepik.com/premium-vector/person-avatar-design_24877-38137.jpg?w=2000" alt="user-avatar" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="<?=base_url('admin_chat').'/'.$dp['identity_role'].'/'.$dp['penyintas_id'].'/'.$dp['identity_name']?>" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
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