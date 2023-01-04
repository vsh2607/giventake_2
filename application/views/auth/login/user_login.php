<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <p class="h1"><b>Support</b>System</p>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?= $this->session->flashdata('message'); ?>

  


        <form action="<?= base_url("user_login") ?>" method="post">




          <div class="input-group mb-3">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email or Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>



          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">


            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block float-end">Sign In</button>
            </div>

          </div>
        </form>


        <p></p>
        <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
        <p class="mb-0">
          <a href="<?= base_url("user_register") ?>" class="text-center">Register a new account</a>
        </p>
      </div>
      <!-- /.card-body -->

    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->