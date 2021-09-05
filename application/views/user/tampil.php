<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">

            <!-- Input Alignment card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Ubah User</h5>
                    <a href="<?= base_url(); ?>user">
                        <button style="float: right;" class="btn waves-effect waves-light btn-success">
                            <i class="icofont icofont-reply"></i> Kembali
                        </button>
                    </a>
                </div>
                <div class="card-block">
                    <form method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control form-control-capitalize"
                                    value="<?= $detail->name; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control form-control-normal"
                                    value="<?= $detail->username; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control form-control-normal"
                                    value="<?= $detail->email; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-10">
                                <input type="number" name="nohp" class="form-control form-control-normal"
                                    value="<?= $detail->nohp; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <input type="text" name="nohp" class="form-control form-control-normal" value="<?php if ($detail->gender == 'L') echo 'Laki-laki';
																												else echo 'Perempuan'; ?>" readonly>
                            </div>
                        </div>

                    </form>
                </div>









      
      </div>
            <!-- Input Alignment card end -->
        </div>
    </div>
</div>