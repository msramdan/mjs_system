


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title><?= $sett_apps->nama_aplikasi ?> - <?= $sett_apps->company ?> </title>
 <link rel="icon" type="image/png" href="<?php echo base_url('assets') ?>/assets/img/<?= $sett_apps->favicon ?>" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="<?= base_url() ?>assets/assets/css/vendor.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>assets/assets/css/transparent/app.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="<?= base_url() ?>assets/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
<link href="<?= base_url() ?>assets/assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
<link href="<?= base_url() ?>assets/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
<link href="<?= base_url() ?>assets/assets/plugins/select-picker/dist/picker.min.css" rel="stylesheet" />

<!-- data table -->
<link href="<?= base_url() ?>assets/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>assets/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>assets/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>assets/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />

<link href="<?= base_url() ?>assets/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="<?= base_url() ?>assets/assets/ckeditor/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/assets/js/jquery.idle.js"></script>
<script src="<?= base_url() ?>assets/assets/js/jquery.idle.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

<link href="<?= base_url() ?>assets/assets/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>assets/assets/plugins/jstree/dist/jstree.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

  <script>
    $(document).idle({
      onIdle: function() {
        window.location = "<?php echo base_url(); ?>auth/logout";
      },
      idle: 3000000
    });
  </script>

</head>
<body>

	             <!-- #modal-dialog -->
    <div class="modal fade" id="modal-dialog2" >
      <div class="modal-dialog  modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">About Application</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
          </div>
          <div class="modal-body">
            <p style="text-align: justify;">
            	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
          </div>
          <div class="modal-footer">
            <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
          </div>
        </div>
      </div>
    </div>
	 

<div class="app-cover"></div>
<div id="loader" class="app-loader">
<span class="spinner"></span>
</div>



<div id="app" class="app app-header-fixed app-sidebar-fixed">

<div id="header" class="app-header">

<div class="navbar-header">
<a href="<?= base_url() ?>Dashboard" class="navbar-brand"><span class="navbar-logo"></span> <b class="me-1"><?= $sett_apps->nama_aplikasi ?></b></a>
<button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>



<div class="navbar-nav">
	<div class="navbar-item navbar-form">
		<script type="text/javascript">    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function tampilkanwaktu(){
        //buat dataect date berdasarkan waktu saat ini
        var waktu = new Date();
        //ambil nilai jam, 
        //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
        var sh = waktu.getHours() + ""; 
        //ambil nilai menit
        var sm = waktu.getMinutes() + "";
        //ambil nilai detik
        var ss = waktu.getSeconds() + "";
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);"> 
<?php
$hari = date('l');
/*$new = date('l, F d, Y', strtotime($Today));*/
if ($hari=="Sunday") {
  echo "Minggu";
}elseif ($hari=="Monday") {
  echo "Senin";
}elseif ($hari=="Tuesday") {
  echo "Selasa";
}elseif ($hari=="Wednesday") {
  echo "Rabu";
}elseif ($hari=="Thursday") {
  echo("Kamis");
}elseif ($hari=="Friday") {
  echo "Jum'at";
}elseif ($hari=="Saturday") {
  echo "Sabtu";
}
?>,
<?php
$tgl =date('d');
echo $tgl;
$bulan =date('F');
if ($bulan=="January") {
  echo " Januari ";
}elseif ($bulan=="February") {
  echo " Februari ";
}elseif ($bulan=="March") {
  echo " Maret ";
}elseif ($bulan=="April") {
  echo " April ";
}elseif ($bulan=="May") {
  echo " Mei ";
}elseif ($bulan=="June") {
  echo " Juni ";
}elseif ($bulan=="July") {
  echo " Juli ";
}elseif ($bulan=="August") {
  echo " Agustus ";
}elseif ($bulan=="September") {
  echo " September ";
}elseif ($bulan=="October") {
  echo " Oktober ";
}elseif ($bulan=="November") {
  echo " November ";
}elseif ($bulan=="December") {
  echo " Desember ";
}
$tahun=date('Y');
echo $tahun;
?> 
<span id="clock"></span>
</div>


	<div class="navbar-item dropdown">
		<a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
		<i class="fa fa-bell"></i>
		<span class="badge">5</span>
		</a>
		<div class="dropdown-menu media-list dropdown-menu-end">
			<div class="dropdown-header">NOTIFICATIONS (5)</div>
			<a href="javascript:;" class="dropdown-item media">
				<div class="media-left">
				<i class="fa fa-envelope media-object bg-gray-500"></i>
				<i class="fab fa-google text-warning media-object-icon fs-14px"></i>
				</div>
				<div class="media-body">
				<h6 class="media-heading"> New Email From John</h6>
				<div class="text-muted fs-10px">2 hour ago</div>
				</div>
			</a>
			<div class="dropdown-footer text-center">
				<a href="javascript:;" class="text-decoration-none">View more</a>
			</div>
		</div>
	</div>
	<div class="navbar-item navbar-user dropdown">
	<a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
		<?php $this->fungsi->user_login()->photo; ?>
		<img src="<?= base_url() ?>assets/assets/img/user/<?= $this->fungsi->user_login()->photo; ?>" alt="" />
		<span>
			<span class="d-none d-md-inline"><?= ucfirst($this->fungsi->user_login()->nama_user) ?></span>
			<b class="caret"></b>
		</span>
	</a>
		<div class="dropdown-menu dropdown-menu-end me-1">
		<a href="<?= base_url() ?>User/edit_profile" class="dropdown-item">Edit Profile</a>
		<div class="dropdown-divider"></div>
		<a href="<?= base_url() ?>Auth/logout" class="dropdown-item">Log Out</a>
	</div>
	</div>
</div>

</div>


<div id="sidebar" class="app-sidebar">

<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

<div class="menu">
<div class="menu-profile">
<a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
<div class="menu-profile-cover with-shadow"></div>
<div class="menu-profile-image">
<img src="<?= base_url() ?>assets/assets/img/user/<?= $this->fungsi->user_login()->photo?>" alt="" />
</div>
<div class="menu-profile-info">
<div class="d-flex align-items-center">
<div class="flex-grow-1">
<?= ucfirst($this->fungsi->user_login()->nama_user) ?>
</div>
<div class="menu-caret ms-auto"></div>
</div>
<small><?= ucfirst($this->fungsi->user_login()->email) ?></small>
</div>
</a>
</div>
<div id="appSidebarProfileMenu" class="collapse">
<div class="menu-item pt-5px">
<a href="<?= base_url() ?>Setting_app" class="menu-link">
<div class="menu-icon"><i class="fa fa-cog"></i></div>
<div class="menu-text">Settings App</div>
</a>
</div>


<div class="menu-item pb-5px">
<a id="view_gambar"
                href="#modal-dialog2"
                data-bs-toggle="modal"

                class="menu-link">
<div class="menu-icon"><i class="fa fa-question-circle"></i></div>
<div class="menu-text"> About Application</div>
</a>
</div>
<div class="menu-divider m-0"></div>
</div>

<div class="menu-header">Navigation</div>
<div class="menu-item">
	<a href="<?= base_url() ?>Dashboard" class="menu-link">
	<div class="menu-icon">
	<i class="fa fa-home"></i>
	</div>
	<div class="menu-text">Dashboard</div>
	</a>
</div>

	<?php
          $session_level_id = $this->fungsi->user_login()->level_id;
          $queryMenu = "SELECT `user_access_menu`.`user_access_menu_id`,`level_id`,`menu`.`menu`,`menu`.`icon`,`menu`.`menu_id` as menu_id
            FROM `user_access_menu` JOIN `sub_menu` 
              ON `user_access_menu`.`sub_menu_id` = `sub_menu`.`sub_menu_id`
              JOIN `menu` 
              ON `menu`.`menu_id` = `sub_menu`.`menu_id`
           WHERE `user_access_menu`.`level_id` = $session_level_id
           GROUP BY `menu`.`menu_id`
              ORDER BY `menu`.`urutan` ASC";
          $menu = $this->db->query($queryMenu)->result_array(); 
     ?>
          <?php foreach ($menu as $m) : ?>
          	<div class="menu-item has-sub">
			<a href="javascript:;" class="menu-link">
				<div class="menu-icon">
				<i class="<?= $m['icon'] ?>"></i>
				</div>

				<div class="menu-text"><?= $m['menu'] ?></div>
				<div class="menu-caret"></div>
			</a>
			<div class="menu-submenu">
				<div class="menu-item">
				<?php
	                $menuId = $m['menu_id'];
	                $querySubMenu = "SELECT `user_access_menu`.`level_id`,`user_access_menu`.`sub_menu_id`,`sub_menu`.*
	                FROM `user_access_menu` JOIN `sub_menu` 
	                  ON `user_access_menu`.`sub_menu_id` = `sub_menu`.`sub_menu_id`
	               WHERE `sub_menu`.`menu_id` = $menuId
	               AND `user_access_menu`.`level_id` = $session_level_id
	               ";
	                $subMenu = $this->db->query($querySubMenu)->result_array();
	            ?>
	            <?php foreach ($subMenu as $sm) : ?>
                        <a href="<?= base_url($sm['url']) ?>" class="menu-link"><div class="menu-text"><?= $sm['nama_sub_menu'] ?></div></a>
                    <?php endforeach; ?>
				
				</div>
			</div>
			</div>

          <?php endforeach ?>

<div class="menu-item">
	<a href="https://localhost/mjs_system/harviacode" class="menu-link">
	<div class="menu-icon">
	<i class="fa fa-cogs"></i>
	</div>
	<div class="menu-text">Generator</div>
	</a>
</div>

<div class="menu-item d-flex">
<a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
</div>

</div>

</div>

</div>
<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message') ) : ?>
    <?php endif; ?>


<div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('error'); ?>"></div>
    <?php if ($this->session->flashdata('error') ) : ?>
    <?php endif; ?>

<!-- isi -->
<?php echo $contents ?>

<div class="theme-panel">
<a href="javascript:;" data-toggle="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
<div class="theme-panel-content" data-scrollbar="true" data-height="100%">
<h5>App Settings</h5>

<div class="theme-list">
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-red" data-theme="red" data-theme-file="assets/assets/css/transparent/theme/red.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-pink" data-theme="pink" data-theme-file="assets/assets/css/transparent/theme/pink.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-orange" data-theme="orange" data-theme-file="assets/assets/css/transparent/theme/orange.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-yellow" data-theme="yellow" data-theme-file="assets/assets/css/transparent/theme/yellow.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-lime" data-theme="lime" data-theme-file="assets/assets/css/transparent/theme/lime.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-green" data-theme="green" data-theme-file="assets/assets/css/transparent/theme/green.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-teal" data-theme="teal" data-theme-file="assets/assets/css/transparent/theme/teal.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Teal">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-cyan" data-theme="cyan" data-theme-file="assets/assets/css/transparent/theme/cyan.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cyan">&nbsp;</a></div>
<div class="theme-list-item active"><a href="javascript:;" class="theme-list-link bg-blue" data-theme="default" data-theme-file="" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-purple" data-theme="purple" data-theme-file="assets/assets/css/transparent/theme/purple.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-indigo" data-theme="indigo" data-theme-file="assets/assets/css/transparent/theme/indigo.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-black" data-theme="black" data-theme-file="assets/assets/css/transparent/theme/black.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Black">&nbsp;</a></div>
</div>

<div class="theme-panel-divider"></div>

<div class="row mt-10px align-items-center">
<div class="col-8 control-label  fw-bold">Header Fixed</div>
<div class="col-4 d-flex">
<div class="form-check form-switch ms-auto mb-0">
<input type="checkbox" class="form-check-input" name="app-header-fixed" id="appHeaderFixed" value="1" checked />
<label class="form-check-label" for="appHeaderFixed">&nbsp;</label>
</div>
</div>
</div>
<div class="row mt-10px align-items-center">
<div class="col-8 control-label  fw-bold">Sidebar Fixed</div>
<div class="col-4 d-flex">
<div class="form-check form-switch ms-auto mb-0">
<input type="checkbox" class="form-check-input" name="app-sidebar-fixed" id="appSidebarFixed" value="1" checked />
<label class="form-check-label" for="appSidebarFixed">&nbsp;</label>
</div>
</div>
</div>
<div class="row mt-10px align-items-center">
<div class="col-8 control-label  fw-bold">Sidebar Grid</div>
<div class="col-4 d-flex">
<div class="form-check form-switch ms-auto mb-0">
<input type="checkbox" class="form-check-input" name="app-sidebar-grid" id="appSidebarGrid" value="1" />
<label class="form-check-label" for="appSidebarGrid">&nbsp;</label>
</div>
</div>
</div>
<div class="row mt-10px align-items-center">
<div class="col-md-8 control-label  fw-bold">Gradient Enabled</div>
<div class="col-md-4 d-flex">
<div class="form-check form-switch ms-auto mb-0">
<input type="checkbox" class="form-check-input" name="app-gradient-enabled" id="appGradientEnabled" value="1" />
<label class="form-check-label" for="appGradientEnabled">&nbsp;</label>
</div>
</div>
</div>
<div class="theme-panel-divider"></div>


<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

</div>

<script src="<?= base_url() ?>assets/assets/js/vendor.min.js" type="beba54df5f87d24c2458d535-text/javascript"></script>
<script src="<?= base_url() ?>assets/assets/js/app.min.js" type="beba54df5f87d24c2458d535-text/javascript"></script>
<script src="<?= base_url() ?>assets/assets/js/theme/transparent.min.js" type="beba54df5f87d24c2458d535-text/javascript"></script>
<script src="<?= base_url() ?>assets/assets/plugins/d3/d3.min.js" type="beba54df5f87d24c2458d535-text/javascript"></script>
<script src="<?= base_url() ?>assets/assets/plugins/nvd3/build/nv.d3.min.js" type="beba54df5f87d24c2458d535-text/javascript"></script>
<script src="<?= base_url() ?>assets/assets/plugins/jvectormap-next/jquery-jvectormap.min.js" type="beba54df5f87d24c2458d535-text/javascript"></script>
<script src="<?= base_url() ?>assets/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js" type="beba54df5f87d24c2458d535-text/javascript"></script>

<!-- <script src="<?= base_url() ?>assets/assets/plugins/gritter/js/jquery.gritter.js" type="beba54df5f87d24c2458d535-text/javascript"></script> -->
<!-- <script src="<?= base_url() ?>assets/assets/js/demo/dashboard-v2.js" type="beba54df5f87d24c2458d535-text/javascript"></script> -->
<script src="<?= base_url() ?>assets/assets/js/demo/custom-calendar.js" type="beba54df5f87d24c2458d535-text/javascript"></script>
<script src="<?= base_url() ?>assets/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>assets/assets/js/rocket-loader.min.js" data-cf-settings="beba54df5f87d24c2458d535-|49" defer=""></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> <!-- untuk sweet alret -->
<script src="<?php echo base_url();?>assets/assets/js/dataflash.js"></script>
<script src="<?= base_url() ?>assets/assets/js/number_format.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/select-picker/dist/picker.min.js"></script>

<script src="<?= base_url() ?>assets/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script src="<?php echo base_url() ?>assets/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/plugins/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/assets/plugins/jszip/dist/jszip.min.js"></script>
<script>
    
</script>
<script>
    //datatable
  $('#data-table-default').DataTable({
    responsive: true
  });
  $('#data-table-default2').DataTable({
    responsive: true
  });
  //ckeditor
  $('#wysihtml5').wysihtml5();

  $('.datepicker-inline').datepicker({
      todayHighlight:true
  });

  <?php

  if ($this->uri->segment(2) == 'rekap_tahunan') {
  	?>
  		//it's not posible to see this in mobile version!
		 		var tabel = $('#tabel-rekap-absensi').DataTable({
							    dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
							    buttons: [
							      { 
							      	extend: 'copy', 
							      	className: 'btn-sm'
							      },
							      { 
							      	extend: 'csv', 
							      	className: 'btn-sm',
							      	title: 'Export data rekap absensi tahun <?php echo $tahun ?>'
							      },
							      { 
							      	extend: 'excel', 
							      	className: 'btn-sm',
							      	title: 'Export data rekap absensi tahun <?php echo $tahun ?>'
							      },
							      { 
							      	extend: 'pdf', 
							      	className: 'btn-sm',
							      	title: 'Export data rekap absensi tahun <?php echo $tahun ?>'
							      },
							      { 
							      	extend: 'print', 
							      	className: 'btn-sm'
							      }
							    ],
							    processing: true,
							    language: {
							        'loadingRecords': '',
							        'processing': '<i class="fas fa-sync fa-spin"></i>'
							    },
							    "ajax": {
							    	type: "POST",
								    url: "<?php echo base_url() ?>Rekap_absen/get_data_yearly",
								    data: {
								        id_lokasi:'<?php echo $lokasi_id ?>',
								        tahun: '<?php echo $tahun ?>'
									},
								},
							 });


	        	$('#btn-filter-date').click(function() {
	        		tabel.ajax.reload();
	        	})
  	<?php
  }

  if ($this->uri->segment(2) == 'rekap_bulanan' || $this->uri->segment(2) == 'detail_recap') {
  	?>
  		//it's not posible to see this in mobile version!
		 		var tabel = $('#tabel-rekap-absensi').DataTable({
							    dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
							    buttons: [
							      { 
							      	extend: 'copy', 
							      	className: 'btn-sm'
							      },
							      { 
							      	extend: 'csv', 
							      	className: 'btn-sm',
							      	title: 'Export data rekap absensi bulan <?php echo $month ?>'
							      },
							      { 
							      	extend: 'excel', 
							      	className: 'btn-sm',
							      	title: 'Export data rekap absensi bulan <?php echo $month ?>'
							      },
							      { 
							      	extend: 'pdf', 
							      	className: 'btn-sm',
							      	title: 'Export data rekap absensi bulan <?php echo $month ?>'
							      },
							      { 
							      	extend: 'print', 
							      	className: 'btn-sm'
							      }
							    ],
								});


	        	$('#btn-filter-date').click(function() {
	        		tabel.ajax.reload();
	        	})
  	<?php
  }
  ?>
</script>
</body>
</html>

