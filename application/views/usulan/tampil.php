<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">

            <!-- Input Alignment card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Asset</h5>
                    <a href="<?= base_url(); ?>assets">
                        <button style="float: right;" class="btn waves-effect waves-light btn-success">
                            <i class="icofont icofont-reply"></i> Kembali
                        </button>
                    </a>
                </div>
                <div class="card-block">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Diajukan Oleh</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_asset" value="<?= $detail->name; ?>"
                                class="form-control form-control-capitalize" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Asset</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_asset" value="<?= $detail->nama_usulan; ?>"
                                class="form-control form-control-capitalize" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Merk</label>
                        <div class="col-sm-10">
                            <input type="text" name="merk" value="<?= $detail->merk; ?>"
                                class="form-control form-control-normal" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <input type="text" name="type" value="<?= $detail->type; ?>"
                                class="form-control form-control-normal" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea type="text" disabled name="deskripsi" class="form-control form-control-normal"><?= $detail->deskripsi; ?>
								</textarea>
                        </div>
                    </div>
                    <a href="<?= base_url();?>usulan/terima/<?= $detail->id_usulan; ?>"> <button type="submit"
                            class="btn waves-effect waves-light btn-success">
                            <i class="icofont icofont-paper-plane"></i> Terima
                        </button></a>
                    <button type="submit" onclick="confirm()" class="btn waves-effect waves-light btn-danger">
                        <i class="icofont icofont-close-line"></i> Tolak
                    </button>
                </div>
            </div>
            <!-- Input Alignment card end -->
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets_temp/js/jquery/jquery.min.js"></script>
<script>
function confirm() {
    var id = <?= $detail->id_usulan;?>;
    Swal.fire({
        text: 'Anda yakin ingin menolak usulan ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!',
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = "<?= base_url(); ?>usulan/confirm/" + id;
        }
    })
}
</script>
