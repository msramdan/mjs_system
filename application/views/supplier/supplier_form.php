<div id="content" class="app-content">
<div class="col-xl-12 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">KELOLA DATA SUPPLIER</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">
        
            <form action="<?php echo $action; ?>" method="post">
            
            <table class="table  table-bordered table-hover table-td-valign-middle">
            <thead>
	    <tr><td >Kode Supplier <?php echo form_error('kode_supplier') ?></td><td><input type="text" class="form-control" name="kode_supplier" id="kode_supplier" placeholder="Kode Supplier" value="<?php echo $kode_supplier; ?>" /></td></tr>
	    <tr><td >Nama Supplier <?php echo form_error('nama_supplier') ?></td><td><input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="Nama Supplier" value="<?php echo $nama_supplier; ?>" /></td></tr>
	    
        <tr><td >Alamat <?php echo form_error('alamat') ?></td><td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td></tr>
	    <tr><td >Kota <?php echo form_error('kota') ?></td><td><input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" /></td></tr>
	    <tr><td >Provinsi <?php echo form_error('provinsi') ?></td><td><input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" /></td></tr>
	    <tr><td >Kode Pos <?php echo form_error('kode_pos') ?></td><td><input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="<?php echo $kode_pos; ?>" /></td></tr>
	    <tr><td >Telepon <?php echo form_error('telepon') ?></td><td><input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" /></td></tr>
	    <tr><td >Personal Kontak <?php echo form_error('personal_kontak') ?></td><td><input type="text" class="form-control" name="personal_kontak" id="personal_kontak" placeholder="Personal Kontak" value="<?php echo $personal_kontak; ?>" /></td></tr>
	    <tr><td >Email <?php echo form_error('email') ?></td><td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td></tr>
	    <tr><td >Halaman Web <?php echo form_error('halaman_web') ?></td><td><input type="text" class="form-control" name="halaman_web" id="halaman_web" placeholder="Halaman Web" value="<?php echo $halaman_web; ?>" /></td></tr>
	    
        <tr><td >Catatan <?php echo form_error('catatan') ?></td><td> <textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Catatan"><?php echo $catatan; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="supplier_id" value="<?php echo $supplier_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('supplier') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a></td></tr>
</thead>
	</table></form>        </div>
</div>
</div>
</div>