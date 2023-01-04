<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card card-success card-outline direct-chat direct-chat-success">
            <div class="card-header">
                <h3 class="card-title">Direct Chat to Admin</h3>
                <h1 id="halo"></h1>


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


                <!-- <form> -->
                <div class="input-group">
                    <input type="text" id="msg_body" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                        <input type="button" id="txt_msg_send_button" class="btn btn-success" value="Send"></input>
                    </span>
                    <!-- </form> -->
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
                <form action="<?= base_url("user_chat_img_send") ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="msg_attachement">Image Upload</label>
                        <input type="file" class="form-control" style="width: 100%;" id="msg_attachement" name="msg_attachement" required>
                    </div>
            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary btn-sm" id="img_msg_send_button" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success btn-sm" type="submit" id="uploadModalButton" href="">Send</button>
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

                if (timer == 0) {
                    $("#message_card").load("<?= base_url("user_get_chat") ?>");
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

        var msg = document.getElementById("msg_body").value;
        $.post("<?= base_url("user_chat_text_send") ?>", {
            message: msg
        }, function(data, status) {
            $("#message_card").load("<?= base_url("user_get_chat") ?>");

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