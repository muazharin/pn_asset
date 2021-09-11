<!DOCTYPE html>
<html lang="en">

<head>
    <title>PN Assets Management </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url() ?>assets_temp/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets_temp/pages/waves/css/waves.min.css" type="text/css"
        media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_temp/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets_temp/pages/waves/css/waves.min.css" type="text/css"
        media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_temp/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_temp/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets_temp/icon/font-awesome/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_temp/css/jquery.mCustomScrollbar.css">
    <!-- am chart export.css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_temp/css/style.css">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url(); ?>">
                            <img class="img-fluid" src="<?= base_url() ?>assets_temp/images/logo.png"
                                alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <?php if ($this->session->userdata('gender') == 'L') { ?>
                                    <img src="<?= base_url() ?>assets_temp/images/avatar-6.png" class="img-radius"
                                        alt="User-Profile-Image">
                                    <?php } else { ?>
                                    <img src="<?= base_url() ?>assets_temp/images/avatar-7.png" class="img-radius"
                                        alt="User-Profile-Image">
                                    <?php } ?>
                                    <span><?= $this->session->userdata("name"); ?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li class="waves-effect waves-light">
                                        <a href="<?= base_url(); ?>pengaturan">
                                            <i class="ti-settings"></i> Pengaturan
                                        </a>
                                    </li>
                                    <li onclick="buttonKeluar();" class="waves-effect waves-light">
                                        <a>
                                            <i class="ti-layout-sidebar-left"></i> Keluar
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <?php if ($this->session->userdata('gender') == 'L') { ?>
                                    <img src="<?= base_url() ?>assets_temp/images/avatar-6.png"
                                        class="img-80 img-radius" alt="User-Profile-Image">
                                    <?php } else { ?>
                                    <img src="<?= base_url() ?>assets_temp/images/avatar-7.png"
                                        class="img-80 img-radius" alt="User-Profile-Image">
                                    <?php } ?>
                                    <!-- <img class="img-80 img-radius"
                                        src="<?= base_url() ?>assets_temp/images/avatar-7.png" alt="User-Profile-Image"> -->
                                    <div class="user-details">
                                        <span id="more-details"><?= $this->session->userdata("name"); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">All Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li id="Dashboard">
                                    <a href="<?= base_url(); ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <?php if ($this->session->userdata('role') == '0') { ?>
                                <li class="pcoded-hasmenu" id="Assets">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-server"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Assets</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="<?= base_url(); ?>assets" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">
                                                    Asset</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?= base_url(); ?>satuan" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.alert">Satuan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <li id="Transaksi">
                                    <a href="<?= base_url(); ?>transaksi" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-bookmark-alt"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Transaksi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <?php if ($this->session->userdata('role') == '0') { ?>
                                <li id="Ruangan">
                                    <a href="<?= base_url(); ?>ruangan" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Ruangan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li id="User">
                                    <a href="<?= base_url(); ?>user" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">User</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <?php } ?>
                                <li id="Pengaturan">
                                    <a href="<?= base_url(); ?>pengaturan" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-settings"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Pengaturan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10"><?= $title; ?></h5>
                                            <p class="m-b-0">Selamat Datang di PN Assets
                                                Management</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="<?= base_url(); ?>"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!"><?= $title; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <?= $contents; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
    <div class="flash-data-danger" data-flashdata="<?= $this->session->flashdata('danger'); ?>"></div>
    <!-- Required Jquery -->
    <script type="text/javascript" src="<?= base_url() ?>assets_temp/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets_temp/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="<?= base_url() ?>assets_temp/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets_temp/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="<?= base_url() ?>assets_temp/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="<?= base_url() ?>assets_temp/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?= base_url() ?>assets_temp/js/jquery-slimscroll/jquery.slimscroll.js ">
    </script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?= base_url() ?>assets_temp/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="<?= base_url() ?>assets_temp/js/SmoothScroll.js"></script>
    <script src="<?= base_url() ?>assets_temp/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="<?= base_url() ?>assets_temp/js/chart.js/Chart.js"></script>

    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="<?= base_url() ?>assets_temp/pages/widget/amchart/gauge.js"></script>
    <script src="<?= base_url() ?>assets_temp/pages/widget/amchart/serial.js"></script>
    <script src="<?= base_url() ?>assets_temp/pages/widget/amchart/light.js"></script>
    <script src="<?= base_url() ?>assets_temp/pages/widget/amchart/pie.min.js"></script>
    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <sc ript src="https://www.amcharts.com/lib/3/plugins/export/export.min.js">
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#<?= $title; ?>').addClass("active");
            const flashData = $('.flash-data').data('flashdata')
            if (flashData) {
                Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    text: flashData,
                    confirmButtonColor: '#2196f3',
                    type: 'success'
                })
            }
            const flashData2 = $('.flash-data-danger').data('flashdata')
            if (flashData2) {
                Swal.fire({
                    title: 'Gagal',
                    icon: 'error',
                    text: flashData2,
                    confirmButtonColor: '#2196f3',
                    type: 'success'
                })
            }
        });

        function buttonKeluar(id) {
            Swal.fire({
                text: 'Anda yakin ingin keluar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = "<?= base_url(); ?>auth/logout";
                }
            })
        }
        </script>




        <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>





        <!-- menu js -->
        <script src="<?= base_url() ?>assets_temp/js/pcoded.min.js"></script>
        <script src="<?= base_url() ?>assets_temp/js/vertical-layout.min.js "></script>
        <!-- custom js -->
        <script type="text/javascript" src="<?= base_url() ?>assets_temp/pages/dashboard/custom-dashboard.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets_temp/js/script.js "></script>

</body>


</html>