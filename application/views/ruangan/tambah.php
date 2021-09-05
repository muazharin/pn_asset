<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">

            <!-- Input Alignment card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Ruangan</h5>
                    <a href="<?= base_url(); ?>ruangan">
                        <button style="float: right;" class="btn waves-effect waves-light btn-success">
                            <i class="icofont icofont-reply"></i> Kembali
                        </button>
                    </a>
                </div>
                <div class="card-block">
                    <form method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Ruangan</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_ruangan" class="form-control form-control-capitalize"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea type="text" name="deskripsi"
                                    class="form-control form-control-normal"></textarea>
                            </div>
                        </div>
                        <button type="submit" style="float: right;" class="btn waves-effect waves-light btn-primary">
                            <i class="icofont icofont-paper-plane"></i> Simpan
                        </button>
                    </form>
                </div>
            </div>
            <!-- Input Alignment card end -->
        </div>
    </div>






</div>