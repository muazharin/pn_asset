<?php
date_default_timezone_set("Asia/Makassar");
?>
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
                                <h5>Detail Pengajuan</h5>
                                <a href="<?= base_url(); ?>transaksi">
                                    <button style="float: right;" class="btn waves-effect waves-light btn-success">
                                        <i class="icofont icofont-reply"></i> Kembali
                                    </button>
                                </a>
                            </div>
                            <div class="card-block">
                                <!-- Row start -->
                                <div class="row">
                                    <div class="col-lg-12 col-xl-6">

                                        <!-- Tab panes -->
                                        <div class="tab-content tabs card-block">
                                            <div class="tab-pane active" id="detail" role="tabpanel">
                                                <p class="m-0">

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Nama Asset</label>
                                                    <div class="col-sm-8">
                                                        <label class="form-label"><?= $detail->nama_asset; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Nama Ruangan</label>
                                                    <div class="col-sm-8">
                                                        <label class="form-label"><?= $detail->nama_ruangan; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Jumlah Pengajuan</label>
                                                    <div class="col-sm-8">
                                                        <label
                                                            class="form-label"><?= $detail->jml_pengajuan . ' ' . $detail->nama_satuan; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php if ($detail->status == "Menunggu") { ?>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Jumlah Disetujui</label>
                                                    <div class="col-sm-4">
                                                        <input type="number" id="jml" onchange="jml()"
                                                            onkeypress="jml()" onkeydown="jml()" min="1"
                                                            max="<?= $detail->jml; ?>"
                                                            class="form-control form-control-normal"
                                                            value="<?= $detail->jml_pengajuan; ?>" required>
                                                    </div>
                                                    <label
                                                        class="col-sm-4 col-form-label"><?= $detail->nama_satuan; ?></label>
                                                </div>
                                                <?php } else { ?>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Jumlah Disetujui</label>
                                                    <div class="col-sm-8">
                                                        <label
                                                            class="form-label"><?= $detail->jml_disetujui . ' ' . $detail->nama_satuan; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Tanggal Pengajuan</label>
                                                    <div class="col-sm-8">
                                                        <label
                                                            class="form-label"><?= date_format(date_create($detail->date_request), 'd M Y H:i:s'); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Tanggal Konfirmasi</label>
                                                    <div class="col-sm-8">
                                                        <?php if ($detail->status != 'Menunggu') { ?>
                                                        <label
                                                            class="form-label"><?= date_format(date_create($detail->date_confirm), 'd M Y H:i:s'); ?>
                                                        </label>
                                                        <?php } else { ?>
                                                        <label class="form-label"><?= "-"; ?>
                                                        </label>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Diajukan Oleh</label>
                                                    <div class="col-sm-8">
                                                        <label class="form-label"><?= $detail->name; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Status</label>
                                                    <div class="col-sm-8">
                                                        <?php if ($detail->status == 'Menunggu') { ?>
                                                        <label class="text-primary"> <b><?= $detail->status; ?></b>
                                                        </label>
                                                        <?php } else if ($detail->status == 'Disetujui') { ?>
                                                        <label class="text-success"> <b><?= $detail->status; ?></b>
                                                        </label>
                                                        <?php } else { ?>
                                                        <label class="text-danger"> <b><?= $detail->status; ?></b>
                                                        </label>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <?php if ($detail->status == 'Menunggu') { ?>
                                                <button onclick="buttonConfirm('Ditolak')" type="button"
                                                    style="float: right;"
                                                    class="btn waves-effect waves-light btn-danger">
                                                    <i class="icofont icofont-close-circled"></i> Tolak
                                                </button>&nbsp;
                                                <button onclick="buttonConfirm('Disetujui')" type="button"
                                                    style="float: right;"
                                                    class="btn waves-effect waves-light btn-success">
                                                    <i class="icofont icofont-check-circled"></i> Setuju
                                                </button>
                                                <?php } else { ?>
                                                <button type="button" style="float: right;"
                                                    class="btn waves-effect waves-light btn-default">
                                                    <i class="icofont icofont-check-circled"></i> Telah Dikonfirmasi
                                                </button>
                                                <?php } ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="sub-title">Konfirmasi</div>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs card-block">
                                            <div class="tab-pane active" id="home2" role="tabpanel">
                                                <p class="m-0">
                                                    <center>
                                                        <img style="width: 256px; height: 256px;"
                                                            src="<?= base_url() ?>assets_temp/images/konfirmasi.png"
                                                            class="img-radius" alt="User-Profile-Image">
                                                    </center>
                                                    <br><br><br>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs tab-below tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">
                                                    Silahkan baca detail pengajuan terlebih dahulu
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
<script type="text/javascript" src="<?= base_url() ?>assets_temp/js/jquery/jquery.min.js"></script>
<script>
function buttonConfirm(confirm) {
    console.log(confirm);
    console.log(<?= $detail->id_transaksi; ?>);
    var s = "";
    if (confirm == "Disetujui") {
        s = "menyetujui";
    } else {
        s = "menolak"
    }
    var jml = $('#jml').val();
    Swal.fire({
        text: 'Anda yakin ' + s + ' pengajuan ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.isConfirmed) {
            doConfirm(confirm, <?= $detail->id_transaksi; ?>, jml, <?= $detail->id_asset; ?>);
        }
    });
}

function doConfirm(confirm, id, jml, id_asset) {
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('transaksi/konfirmasi'); ?>",
        dataType: "JSON",
        beforeSend: function() {},
        cache: false,
        data: {
            'id_transaksi': id,
            'id_asset': id_asset,
            'status': confirm,
            'jml': jml,
        },
        success: function(data) {
            console.log(data);
            if (data) {
                location.reload();
            } else {
                Swal.fire({
                    text: "Maaf, Terjadi kesalahan!",
                    icon: "error"
                });
            }
        },
        error: function(request) {
            Swal.fire({
                text: "Maaf, Terjadi kesalahan!",




         
       icon: "error"
            });
        }
    });
}


function jml() {
    var jml = $('#jml').val();
    console.log(jml);
    if (jml == '' || jml <= 0) {
        $('#jml').val(1);
    } else if (jml > <?= $detail->jml; ?>) {
        $('#jml').val(<?= $detail->jml; ?>);
    }
}
</script>