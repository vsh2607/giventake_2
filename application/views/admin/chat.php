<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card card-success card-outline direct-chat direct-chat-success">
            <div class="card-header">
                <h3 class="card-title"><b><?= $user_name ?></b></h3>
                <h1 id="test_text"></h1>

                <div class="card-tools">
                    <a class="btn btn-tool btn-sm" href="#">
                        <i class="fas fa-times"></i>
                        <input type="hidden" id="identity_role" value="<?= $user_data['identity_role'] ?>">
                        <input type="hidden" id="user_role" value="<?= $user_data[$user_role . '_id'] ?>">
                        <input type="hidden" id="identity_name" value="<?= $user_data['identity_name'] ?>">
                        <input type="hidden" id="role" value="<?= $user_role ?>">
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" id="message_card" style="height: 400px;">


                </div>
                <!--/.direct-chat-messages-->

            </div>
            <!-- /.card-body -->
            <div class="card-footer">


                <form>
                    <div class="input-group">
                        <input type="text" id="msg_body" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                            <input type="button" id="txt_msg_send_button" class="btn btn-success" value="Send"></input>

                        </span>
                </form>
                <a href="#" class="btn" data-toggle="modal" data-target="#attach_modal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                        <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
                    </svg></a>

            </div>
        </div>
        <!-- /.card-footer-->
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->




<!-- Attach Modal-->
<div class="modal fade" id="attach_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Gambar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?= base_url("Admin/admin_chat_img_send" . '/' . $user_data['identity_role'] . '/' . $user_data[$user_role . '_id'] . '/' . $user_data['identity_name']) ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="msg_attachement">Image Upload</label>
                        <input type="file" class="form-control" style="width: 100%;" id="msg_attachement"  required>
                    </div>
            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary btn-sm" id="img_msg_send_button" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success btn-sm" type="submit" id="deleteModalButton" href="">Send</button>
                <input type="button" class="btn btn-sm btn-success" id="testButton" value="Test">
            </div>

            </form>
        </div>
    </div>
</div>





<script>
    $(document).ready(function() {



        $(function() {
            var timer = 1;
            var t = 2;

            function time() {
                setTimeout(time, 100);
                var identity_role = document.getElementById("identity_role").value;
                var identity_id = document.getElementById("user_role").value;
                var identity_name = document.getElementById("identity_name").value;
                var role = document.getElementById("role").value;
                if (timer == 0) {

                    $("#message_card").load("<?= base_url("admin_get_chat") ?>", {
                        identity_id: identity_id,
                        identity_role: identity_role,
                        role: role
                    });
                    clearTimeout(time);
                    timer = 1;
                }
                timer--;
            };

            function time2() {
                setTimeout(time2, 200);

                if (t == 0) {
                    clearTimeout(time2);
                    var element = document.getElementById('message_card');
                    element.scrollTop = element.scrollHeight;
                }
                t--;
            }
            time();

            window.onload = function() {
                time2();
            };
        });

    });


    $("#txt_msg_send_button").on('click', function() {

        var identity_role = document.getElementById("identity_role").value;
        var identity_id = document.getElementById("user_role").value;
        var identity_name = document.getElementById("identity_name").value;
        var role = document.getElementById("role").value;
        var msg = document.getElementById("msg_body").value;

        $.post("<?= base_url("admin_chat_text_send") ?>", {
            identity_role: identity_role,
            identity_name: identity_name,
            identity_id: identity_id,
            message: msg

        }, function(data, status) {



            $("#message_card").load("<?= base_url("admin_get_chat") ?>", {
                identity_id: identity_id,
                identity_role: identity_role,
                role : role
            });
        });

        $("#msg_body").val("");

        $(function() {

            var t = 2;

            function time2() {
                setTimeout(time2, 200);

                if (t == 0) {
                    clearTimeout(time2);
                    var element = document.getElementById('message_card');
                    element.scrollTop = element.scrollHeight;
                }
                t--;
            }
            time2();
        });


    });
</script>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->