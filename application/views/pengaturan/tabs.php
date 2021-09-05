<!-- Page-header end -->
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Bootstrap tab card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Pengaturan</h5>

                            </div>
                            <div class="card-block">
                                <!-- Row start -->
                                <div class="row">
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="sub-title">Info</div>
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs  tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#detail"
                                                    role="tab">Detail</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#ubah" role="tab">Ubah
                                                    Password</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs card-block">
                                            <div class="tab-pane active" id="detail" role="tabpanel">
                                                <p class="m-0">

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Nama Lengkap</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="name"
                                                            class="form-control form-control-capitalize"
                                                            value="<?= $this->session->userdata('name'); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Username</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="username"
                                                            class="form-control form-control-normal"
                                                            value="<?= $this->session->userdata('username'); ?>"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" name="email"
                                                            class="form-control form-control-normal"
                                                            value="<?= $this->session->userdata('email'); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">No HP</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="nohp"
                                                            class="form-control form-control-normal"
                                                            value="<?= $this->session->userdata('nohp'); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Gender</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="nohp"
                                                            class="form-control form-control-normal" value="<?php if ($this->session->userdata('gender') == 'L') echo 'Laki-laki';
																																		else echo 'Perempuan'; ?>" readonly>
                                                    </div>
                                                </div>
                                                </p>
                                            </div>
                                            <div class="tab-pane" id="ubah" role="tabpanel">
                                                <p class="m-0">
                                                    <?= $this->session->flashdata('msg'); ?>
                                                <form method="post">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Password Baru</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" name="password"
                                                                class="form-control form-control-normal" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Konfirmasi
                                                            Password Baru</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" name="newpassword"
                                                                class="form-control form-control-normal" required>
                                                        </div>
                                                    </div>
                                                    <button type="submit" style="float: right;"
                                                        class="btn waves-effect waves-light btn-success">
                                                        <i class="icofont icofont-paper-plane"></i> Simpan
                                                    </button>
                                                </form>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="sub-title">Avatar Profile</div>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs card-block">
                                            <div class="tab-pane active" id="home2" role="tabpanel">
                                                <p class="m-0">
                                                    <center>
                                                        <?php if ($this->session->userdata('gender') == 'L') { ?>
                                                        <img src="<?= base_url() ?>assets_temp/images/avatar-6.png"
                                                            class="img-radius" alt="User-Profile-Image">
                                                        <?php } else { ?>
                                                        <img src="<?= base_url() ?>assets_temp/images/avatar-7.png"
                                                            class="img-radius" alt="User-Profile-Image">
                                                        <?php } ?>
                                                    </center>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs tab-below tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">
                                                    <?php if ($this->session->userdata('gender') == 'L') echo 'Laki-Laki';
													else echo 'Perempuan'; ?>
      
                                          </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
                        </div>


                        <!-- Bootstrap tab card end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>