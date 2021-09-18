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
                                        <input type="text" onclick="modalPilihAsset()" id="id_asset"
                                            class="form-control form-control-normal" required>
                                        <input type="hidden" id="id_asset_hide" name="id_asset"
                                            class="form-control form-control-normal" required>
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
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modalProduct">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Asset</h4>
                <div style="float: right;">
                    <button type="button" target="_blank" class="btn btn-default" onclick="tabel_asset()"
                        aria-label="Close">
                        <i class="fa fa-refresh"></i>
                    </button>
                    <a type="button" target="_blank" class="btn btn-primary" href="<?= base_url() ?>usulan/tambah"
                        data-dismiss="" aria-label="Close">
                        <i class="fa fa-plus"></i>Usulkan Asset
                    </a>
                </div>

            </div>
            <div class="modal-body">
                <table id="simpletable" class="table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Merk</th>
                            <th>Type</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript" src="<?= base_url() ?>assets_temp/js/jquery/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#div_ruangan').hide();
});
var nilai;
$('#id_asset').on('change', function() {
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

function cekStok(id_asset) {
    console.log(id_asset);
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('transaksi/get_stok'); ?>",
        dataType: "JSON",
        beforeSend: function() {},
        cache: false,
        data: {
            'id_asset': id_asset,
        },
        success: function(data) {
            console.log(data);
            nilai = data;
            if (data == 0) {
                $('#div_ruangan').hide();
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
}

function modalPilihAsset() {
    console.log("klik");
    $('#modalProduct').modal('show');
    tabel_asset();
}

$('#id_asset').keydown(function() {
    console.log("klik");
    $('#modalProduct').modal('show');
    tabel_asset();
});


function tabel_asset() {
    $('#simpletable').DataTable().destroy();
    $('#simpletable').DataTable({
        "paging": true,
        "scrollY": true,
        "scrollX": true,
        "searching": true,
        "select": false,
        "bLengthChange": true,
        "scrollCollapse": true,
        "bPaginate": true,
        "bInfo": true,
        "bSort": false,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('assets/list_assets'); ?>",
            "type": "POST",
            "data": {
                "from": "pengajuan",
            },
            "error": function(request) {
                console.log(request.responseText);
            }
        },
    });
    var rel = setInterval(function() {
        $('#simpletable').DataTable().ajax.reload();
        clearInterval(rel);
    }, 100);
}

$('#simpletable tbody').on('click', 'tr', function() {
    var data = $('#simpletable').DataTable().row(this).data();
    var id_asset = data[1].split("|")[0].trim();
    id_asset = id_asset.replaceAll('<label style="color: white;">', '');
    var asset = data[1].split("|")[1].trim();
    asset = asset.replaceAll('</label>', '');
    $('#id_asset').val(asset);
    $('#id_asset_hide').val(id_asset);
    $('#modalProduct').modal('hide');
    cekStok(id_asset);
});
</script>




















































































































































</div>
</div>
