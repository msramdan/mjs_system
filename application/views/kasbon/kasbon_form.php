<div id="content" class="app-content">
<div class="col-xl-12 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">KELOLA DATA KASBON</h4>
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
	     <tr>
            <td >Karyawan <?php echo form_error('karyawan_id') ?></td>
            <td><select name="karyawan_id" class="form-control">
                <option value="">-- Pilih -- </option>
                <?php foreach ($karyawan as $key => $data) { ?>
                  <?php if ($karyawan_id == $data->karyawan_id) { ?>
                    <option value="<?php echo $data->karyawan_id ?>" selected><?php echo $data->nama_karyawan ?></option>
                  <?php } else { ?>
                    <option value="<?php echo $data->karyawan_id ?>"><?php echo $data->nama_karyawan ?></option>
                  <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
          
	    <tr><td >Besar Kasbon <?php echo form_error('besar_kasbon') ?></td><td><input type="text" class="form-control" name="besar_kasbon" id="besar_kasbon" placeholder="Besar Kasbon" value="<?php echo $besar_kasbon; ?>" /></td></tr>
	    <tr><td >Tanggal <?php echo form_error('tanggal') ?></td><td><input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td></tr>
	    
        <tr><td >Deskripsi <?php echo form_error('deskripsi') ?></td><td> <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="kasbon_id" value="<?php echo $kasbon_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('kasbon') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a></td></tr>
</thead>
	</table></form>        </div>
</div>
</div>
</div>