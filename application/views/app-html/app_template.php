<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

$session = $this->session->userdata('login'); 
$data_user = $this->db->query("SELECT * FROM tb_users WHERE username = '{$session['username']}'")->row();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo (isset($data['title']) ? $data['title'] : "Sistem Informasi Pendataan Bencana") ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/images/logo-icon.png"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bpn.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/skin-black.css">   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/validation/css/formValidation.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fancybox/source/jquery.fancybox.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/snippets/snippets.css">
    <!--<link rel="stylesheet" href="< ?php echo base_url(); ?>assets/plugins/thumbnail/thumbnail.css">-->
    <style>
  #load { height: 100%; width: 100%; }
  #load { position:fixed; z-index:99; top: 0; left: 0; overflow: hidden; text-indent: 100%; font-size: 0; display: none; background: white  url(<?php echo base_url('assets/images/loading.gif'); ?>) center no-repeat; }
    </style>
  </head>
  <body class="skin-black sidebar-collapse sidebar-mini">
      <div id="load"></div>
    <div class="wrapper fixed">
      <header class="main-header">
        <a href="<?php echo base_url(); ?>" class="logo">
          <span class="logo-mini"><img src="<?php echo base_url(); ?>assets/images/logo-xs.png" alt=""></span>
          <span class="logo-lg"><img src="<?php echo base_url(); ?>assets/images/brand.png" alt=""></span>
        </a>
        <nav class="navbar" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="<?php echo site_url("setting/profile?data=update"); ?>" class="dropdown-toggle" title="Pengaturan Akun"> <i style="font-size:17px;" class="fa fa-user"></i></a>
              </li>
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#logout" title="Keluar Aplikasi"> <i style="font-size:17px;" class="fa fa-power-off"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php if($data_user->foto !='') : echo base_url("assets/user/{$data_user->foto}");  else : echo base_url('assets/dist/img/no-images.PNG'); endif; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $session['nama_lengkap'] ?></p>
              <a href="#" title="Status User"><i class="fa fa-user text-white"></i> Log in - <?php echo level_akses($session['level_akses']); ?></a>
              <p><small></small></p>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="<?= active_link_controller('utama'); ?>"><a href="<?php echo site_url(); ?>/"><i class="fa fa-dashboard"></i> <span>Halaman Utama</span></a></li>
          <?php if($session['level_akses'] == 'viewer') : ?>
            <li class="header">Laporan Informasi</li>
            <li class="treeview <?= active_link_controller('laporan');?> <?= active_link_controller('laporan_history');?> <?= active_link_controller('informasi');?>">
              <a href="#"><i class="fa fa-line-chart"></i> <span>Laporan Informasi</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li class="<?= active_link_controller('laporan');  ?>">
                  <a href="<?php echo site_url('laporan') ?>"><i class="fa fa-file-o"></i> <span>Laporan Bencana</span></a>
                </li>
                <?php if($session['level_akses']=='viewer' OR $session['level_akses']=='super_admin') : ?>
                <li class="<?= active_link_controller('laporan_history');?>">
                  <a href="<?php echo site_url('laporan_history') ?>"><i class="fa fa-history"></i> <span>Laporan Bulanan</span></a>
                </li>
                <?php endif; ?>
              </ul>
            </li>
            <!--<li><a href="< ?php echo site_url('buku/search') ?>"><i class="fa fa-search"></i> <span>Cari Data Bencana</span></a></li>-->
          <?php else : ?>
            <li class="header">Menu Data Bencana</li>
            <li class="treeview <?= active_link_controller('app_buku'); ?>">
              <a href="#"><i class="fa fa-plus"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li class="<?= active_link_controller('app_buku');?>">
                  <a href="<?php echo site_url('buku/create'); ?>"><i class="fa fa-plus"></i> <span>Tambah Data Bencana</span></a>
                </li>
              </ul>
            </li>
            <li class="treeview <?= active_link_controller('ctim'); ?> <?= active_link_controller('chak'); ?> <?= active_link_controller('cwilayah'); ?>">
              <a href="#"><i class="fa fa-book"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
<!--                <li class="< ?= active_link_controller('app_buku');?>">
                  <a href="< ?php echo site_url('buku/create'); ?>"><i class="fa fa-plus"></i> <span>Tambah Data Bencana</span></a>
                </li>-->
                <li class="<?= active_link_controller('ctim');?>">
                  <a href="<?php echo site_url('setting/ctim') ?>"><i class="fa fa-user"></i> <span>Tim Petugas Lapangan</span></a>
                </li>
                <li class="<?= active_link_controller('chak');?>">
                  <a href="<?php echo site_url('setting/chak') ?>"><i class="fa fa-search"></i> <span>Jenis Bencana</span></a>
                </li>
                <li class="<?= active_link_controller('cwilayah');?>">
                  <a href="<?php echo site_url('setting/cwilayah'); ?>"><i class="fa fa-map-o"></i> <span>Manajemen Wilayah</span></a>
                </li>
              </ul>
            </li>
            <?php if($session['level_akses']=='admin' OR $session['level_akses']=='super_admin') : ?>
            <li class="treeview <?= active_link_controller('import');?> <?= active_link_controller('export');?>">
              <a href="#"><i class="fa fa-database"></i> <span>Export / Import</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
<!--                <li class="< ?= active_link_controller('import'); ?>">
                  <a href="< ?php echo site_url('apps/import') ?>"><i class="fa fa-circle-o"></i> <span>Import Dokumen</span></a>
                </li>
                <li class="< ?php echo (current_url()==site_url('apps/export')) ? 'active' : '';?>">
                  <a href="< ?php echo site_url('apps/export/') ?>"><i class="fa fa-circle-o"></i> <span>Export Dokumen</span></a>
                </li>-->
                <li class="<?= active_link_function('import_database');?>">
                  <a href="<?php echo site_url('apps/export/import_database') ?>"><i class="fa fa-upload"></i> <span>Import Database</span></a>
                </li>
                <li><a href="<?php echo site_url('apps/export/backup') ?>"><i class="fa fa-download"></i> <span>Export Database</span></a></li>
              </ul>
            </li>
             <?php endif; ?>
            <?php if($session['level_akses'] != 'viewer') : ?>
            <li class="header">Laporan Informasi</li>
            <li class="treeview <?= active_link_controller('laporan');?> <?= active_link_controller('laporan_history');?> <?= active_link_controller('informasi');?>">
              <a href="#"><i class="fa fa-line-chart"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li class="<?= active_link_controller('laporan');  ?>">
                  <a href="<?php echo base_url('laporan') ?>"><i class="fa fa-file-o"></i> <span>Laporan Bencana</span></a>
                </li>
                <?php if($session['level_akses']=='admin' OR $session['level_akses']=='super_admin') : ?>
                <li class="<?= active_link_controller('laporan_history');?>">
                  <a href="<?php echo site_url('laporan_history') ?>"><i class="fa fa-history"></i> <span>Laporan Bulanan</span></a>
                </li>
                <?php endif; ?>
<!--                <li class="< ?= active_link_controller('informasi');?>">
                  <a href="< ?php echo site_url('informasi') ?>"><i class="fa fa-question-circle"></i> <span>Informasi</span></a>
                </li>-->
              </ul>
            </li>
            <?php endif; if($session['level_akses']=='admin' OR $session['level_akses']=='super_admin') : ?>
            <!--management user-->
            <li class="header">Pengaturan</li>
            <!--<li class="treeview < ?php echo ($this->uri->segment(1)=='setting') ? 'active': '';?>">-->
            <li class="treeview <?= active_link_controller('cusers'); ?>">
              <a href="#"><i class="fa fa-wrench"></i> <span>Pengaturan</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
<!--                <li class="<? = active_link_controller('clemari');?>">
                  <a href="<? php echo site_url('setting/clemari'); ?>"><i class="fa fa-folder-o"></i> <span>Manajemen Lemari</span></a>
                </li>-->
                <li class="<?= active_link_controller('cusers');?>">
                  <a href="<?php echo site_url('setting/cusers'); ?>"><i class="fa fa-users"></i> <span>Manajemen Users</span></a>
                </li>
              </ul>
            </li>
            <?php endif; endif; ?>
<!--            <li class="header">Nominal</li>
            <li class="treeview < ?= active_link_controller('nominal');?> < ?= active_link_controller('nominal');?>">
              <a href="#"><i class="fa fa-dollar"></i> <span>Nominal</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li class="< ?= active_link_controller('nominal');?>">
                  <a href="< ?= site_url('nominal') ?>"><i class="fa fa-dollar"></i> <span>Nominal</span></a>
                </li>
              </ul>
            </li>-->
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
      <?php $this->load->view($view, $data); ?>
      </div>
      <footer class="main-footer no-print fixed">
        <div class="pull-right hidden-xs">
          <b><?php echo tgl_indo(date('Y-m-d')).' - '.date('H:i A'); ?></b>
        </div>
        <small>Sistem Informasi Pendataan Bencana BPBD Kota Banjarbaru  &copy; 2019</small>
      </footer>
    </div>
    <div class="modal" id="modal-buku_masuk">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="fa fa-bell-o"></i> Data Bencana.</h4>
          </div>
          <div class="modal-body">
            <table width="100%"><tbody id="data_buku_notif"></tbody></table>
          </div>
          <div class="modal-footer" id="button_approve">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade modal-danger" id="logout" tabindex="-1" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-question-circle"></i> Question!</h4>
            <small><?php echo $session['nama_lengkap']; ?>, Yakin anda akan Keluar dari Aplikasi ini?</small>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
            <a href="<?php echo site_url(); ?>/login/logout" type="button" class="btn btn-outline"> Iya </a>
          </div>
        </div>
      </div>
    </div>
    <?php if($session['level_akses']=='super_admin') : ?>
    <div class="modal" id="modal-persetujuan">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="fa fa-bell-o"></i> Pemberitahuan Persetujuan.</h4>
          </div>
          <div class="modal-body">
            <div class="col-md-12"><p id="pesan_persetujuan"></div>
            <div class="col-md-12" id="data_persetujuan"></div>
          </div>
          <div class="modal-header text-center">
            <h5 class="modal-title">Terima persetujuan tindakan ini?</h5>
          </div>
          <div class="modal-footer" id="data_button">
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jQuerymask/jquery.mask.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jQuerymask/jquery.mask.min.js'); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/app.js"></script>
    <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/validation/js/formValidation.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugins/validation/js/framework/bootstrap.js') ?>"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/jquery.timeago.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/morris/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/morris/morris.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
    <script src="<?php echo base_url('assets/plugins/notif/notify.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugins/fancybox/source/jquery.fancybox.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugins/select2/select2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/jquery.tableCheckbox.js') ?>"></script>
    <script src="<?php echo base_url('assets/app_js/ajaxFileUpload.js'); ?>"></script>
    <script src="<?php echo base_url('assets/app_js/jquery.form.js'); ?>"></script>
    <script type="text/javascript">var base_domain = '<?php echo site_url(); ?>'; var current_url = '<?php echo current_url(); ?>'; var base_path = '<?php echo base_url(); ?>';</script>
    <?php if(site_url()==current_url()) : ?>
    <script src="<?php echo base_url('assets/app_js/app_utama.js'); ?>"></script>
    <?php endif; ?>
    <script src="<?php echo base_url('assets/app_js/app_buku.js'); ?>"></script>
    <script src="<?php echo base_url('assets/app_js/app_api.js'); ?>"></script>
    <script src="<?php echo base_url('assets/app_js/app_notification.js'); ?>"></script>
    <script src="<?php echo base_url('assets/app_js/setting.js'); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/snippets/snippets.js"></script>
    <!--<script src="< ?php echo base_url(); ?>assets/plugins/thumbnail/thumbnail.js"></script>-->
  </body>
</html>
