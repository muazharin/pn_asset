<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Input Alignment card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Form Pengajuan</h5>
                            <a href="<?= base_url(); ?>transaksi">
                                <button style="float: right;" class="btn waves-effect waves-light btn-success">
                                    <i class="icofont icofont-reply"></i> Kembali
                                </button>
                            </a>
                        </div>
                        <div class="card-block">
                            <form method="post">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Asset</label>
                                    <div class="col-sm-10">
                                        <select name="id_asset" id="stok_asset" class="form-control" required>
                                            <option value="">Pilih Asset</option>
                                            <?php foreach ($asset as $s) : ?>
                                            <option value="<?= $s->id_asset; ?>"><?= $s->nama_asset; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <!--  -->
                                        <div id="info-stok"></div>
                                    </div>
                                </div>
                                <div id="div_ruangan">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Ruangan</label>
                                        <div class="col-sm-10">
                                            <select name="id_ruangan" id="ruangan" class="form-control" required>
                                                <option value="">Pilih Ruangan</option>
                                                <?php foreach ($ruangan as $s) : ?>
                                                <option value="<?= $s->id_ruangan; ?>"><?= $s->nama_ruangan; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jumlah Pengajuan</label>
                                        <div class="col-sm-10">
                                            <input type="number" min="1" id="jml_pengajuan" name="jml_pengajuan"
                                                class="form-control form-control-normal" value="1" required>
                                        </div>
                                    </div>
                                    <button type="submit" style="float: right;"
                                        class="btn waves-effect waves-light btn-primary">
                                        <i class="icofont icofont-paper-plane"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Input Alignment card end -->
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url() ?>assets_temp/js/jquery/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#div_ruangan').hide();
});
var nilai;
$('#stok_asset').on('change', function() {
    console.log(this.value);
    if (this.value != '') {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('transaksi/get_stok'); ?>",
            dataType: "JSON",
            beforeSend: function() {},
            cache: false,
            data: {
                'id_asset': this.value,
            },
            success: function(data) {
                console.log(data);
                nilai = data;
                if (data == 0) {
                    $('#info-stok').append(
                        '<small class="text-danger element-left pl-3">Stok Habis</small>');
                } else {
                    $('#info-stok').empty();
                    $('#div_ruangan').show();
                    $('#jml_pengajuan').attr('max', data);
                }
            },
            error: function(request) {
                Swal.fire({
                    text: "Maaf, Terjadi kesalahan!",
                    icon: "error"
                });
            }
        });
    } else {
        $('#div_ruangan').hide();
    }
});
</script>




































































</div>