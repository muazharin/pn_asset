<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <!-- task, page, download counter  start -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-block">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="text-c-purple"><?= $jml_asset; ?></h4>
                                        <h6 class="text-muted m-b-0">Asset</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="fa fa-server f-28"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-purple">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0">Total</p>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="fa fa-check text-white f-16"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-block">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="text-c-green"><?= $jml_pengajuan; ?></h4>
                                        <h6 class="text-muted m-b-0">Pengajuan Permintaan</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="fa fa-download f-28"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-green">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0">Total</p>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="fa fa-check text-white f-16"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-block">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="text-c-blue"><?= $jml_disetujui; ?></h4>
                                        <h6 class="text-muted m-b-0">Permintaan Diterima</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="fa fa-check-circle-o f-28"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-blue">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0">Total</p>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="fa fa-check text-white f-16"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-block">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="text-c-red"><?= $jml_ditolak; ?></h4>
                                        <h6 class="text-muted m-b-0">Permintaan Ditolak</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="fa fa-window-close-o f-28"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-red">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0">Total</p>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="fa fa-check text-white f-16"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- task, page, download counter  end -->
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Zero config.table start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Grafik Total Pengajuan</h5>
                                <form action="" method="post">
                                    <div class="form-group" style="float: right;">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-3">
                                                <select name="ruang" class="form-control">
                                                    <option value="0">Semua Ruangan</option>
                                                    <?php foreach ($ruangan as $s) : ?>
                                                    <?php if($this->input->post('ruang')==$s->id_ruangan){ ?>
                                                    <option value="<?= $s->id_ruangan; ?>" selected>
                                                        <?= $s->nama_ruangan; ?>
                                                        <?php } else{?>
                                                    <option value="<?= $s->id_ruangan; ?>"><?= $s->nama_ruangan; ?>
                                                        <?php } ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn waves-effect waves-light btn-primary"
                                                        type="submit"><i
                                                            class="icofont icofont-paper-plane"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <span></span>
                            </div>
                            <div class="card-block">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page-body end -->
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url() ?>assets_temp/js/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<?php
	$jml = null;
	$nama_brg = "";
	$rgb = "";
	foreach ($grafik_total as $gt) {
		if(strlen($gt->nama_asset) >= 20 ){
			$nb = substr($gt->nama_asset, 0, 20)."... (".$gt->nama_satuan.")";
		}else{
			$nb = $gt->nama_asset." (".$gt->nama_satuan.")";
		}
		$r = randomColor();
		$jm = $gt->jml_pengajuan;
		$nama_brg .= "'$nb'". ", ";
		$jml .= "$jm". ", ";
		$rgb .= "'$r'". ", ";
	}

	function randomColor(){
		$rcolor = 'rgba(';
		for($i=0;$i<3;$i++){
			$rNumber = rand(0,255);
			$rcolor .= $rNumber.",";
		}
		return $rcolor."1)";
	}
?>
<script>
console.log(<?= $nama_brg;?>);
console.log(<?= $jml;?>);
console.log(<?= $rgb;?>);
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?= $nama_brg; ?>],
        datasets: [{
            label: 'Total Pengajuan ',
            backgroundColor: [<?= $rgb; ?>],
            borderColor: ['rgb(255, 99, 132)'],
            data: [<?= $jml;?>],
        }]
    },
    // Configuration options go here
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
