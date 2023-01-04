<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <?php

            use PHPUnit\Framework\MockObject\Builder\Identity;

            foreach ($data_donatur as $dd) : ?>

                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">

                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b><?= $dd['identity_name'] ?></b></h2>
                                    <p class="text-muted text-sm">Username : <?= $dd['identity_username'] ?></p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?= $dd['identity_address'] ?></li>
                                        <p></p>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?= $dd['identity_phone_number'] ?></li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="https://img.freepik.com/premium-vector/person-avatar-design_24877-38137.jpg?w=2000" alt="user-avatar" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <input type="hidden" id="role" value="<?= $dd['identity_role'] ?>">
                                <input type="hidden" id="id" value="<?= $dd['donatur_id'] ?>">
                                <input type="hidden" id="name" value="<?= $dd['identity_name'] ?>">
                                <a href="<?= base_url() ?>Admin/admin_get_user_data?role=<?=$dd['identity_role']?>&id=<?=$dd['donatur_id']?>&name=<?=$dd['identity_name']?>" class="btn btn-sm bg-teal"><i class="fas fa-comments"></i></a>
                            
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
<script>
    $(document).ready(function() {
        $("#user_chat").click(function() {
            var role = document.getElementById("role").value;
            var id = document.getElementById("id").value;
            var name = document.getElementById("name").value;
            alert(id);
            $.post("<?= base_url('Admin/admin_chat') ?>", {
                user_role: role,
                user_id: id,
                user_name: name
            });
        });


    });
</script>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->