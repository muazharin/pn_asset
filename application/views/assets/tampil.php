<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">

            <!-- Input Alignment card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Detail Asset</h5>
                    <a href="<?= base_url(); ?>assets">
                        <button style="float: right;" class="btn waves-effect waves-light btn-success">
                            <i class="icofont icofont-reply"></i> Kembali
                        </button>
                    </a>
                </div>
                <div class="card-block">
                    <form method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Asset</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_asset" value="<?= $detail->nama_asset; ?>"
                                    class="form-control form-control-capitalize" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Merk</label>
                            <div class="col-sm-10">
                                <input type="text" name="merk" value="<?= $detail->merk; ?>"
                                    class="form-control form-control-normal" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <input type="text" name="type" value="<?= $detail->type; ?>"
                                    class="form-control form-control-normal" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="number" name="jumlah" value="<?= $detail->jml; ?>"
                                    class="form-control form-control-normal" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Satuan</label>
                            <div class="col-sm-10">
                                <input type="text" name="satuan" value="<?= $detail->nama_satuan; ?>"
                                    class="form-control form-control-normal" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea type="text" name="deskripsi" class="form-control form-control-normal"
                                    readonly><?= $detail->deskripsi; ?> </textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Input Alignment card end -->
        </div>





    </div>
























</div>