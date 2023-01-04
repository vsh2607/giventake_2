<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
            <p class="h1"><b>Support</b>System</p>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="<?= base_url("user_register") ?>" method="post">


                    <div class="input-group mb-3">
                        <select name="identity_role" id="identity_role" style="appearance: none;" class="form-control" required>
                            <option value="" selected disabled>Pilih Role</option>
                            <option value="donatur">Donatur</option>
                            <option value="relawan">Relawan</option>
                            <option value="penyintas">Penyintas</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                </svg>
                            </div>
                        </div>
                    </div>




                    <?= form_error('identity_name', '<small class="text-danger pl-3" style="margin-top: 0px;">', '</small>') ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="identity_name" id="identity_name" placeholder="Full name" value="<?=set_value("identity_name")?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>


                    <?= form_error('identity_email', '<small class="text-danger pl-3" style="margin-top: 0px;">', '</small>') ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="identity_email" id="identity_email" value="<?=set_value("identity_email")?>" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <?= form_error('identity_address', '<small class="text-danger pl-3" style="margin-top: 0px;">', '</small>') ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="identity_address" name="identity_address" placeholder="Address" value="<?=set_value("identity_address")?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <?= form_error('identity_phone_number', '<small class="text-danger pl-3" style="margin-top: 0px;">', '</small>') ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="identity_phone_number" name="identity_phone_number" placeholder="Phone Number" value="<?=set_value("identity_phone_number")?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    

                    <?= form_error('identity_password1', '<small class="text-danger pl-3" style="margin-top: 0px;">', '</small>') ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="identity_password1" name="identity_password1" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="identity_password2" name="identity_password2" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary btn-block">Register</button>

                </form>

                <br>

                <p>Already have an account? <a href="<?= base_url("user_login") ?>" class="text-center">Clik here</a></p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->