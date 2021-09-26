<div id="content" class="app-content">
<div class="col-xl-12 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" data-init="true">
<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">Cuti Read</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">
<table id="data-table-default" class="table table-hover table-bordered table-td-valign-middle">
	    <tr><td>Karyawan</td><td><?php echo $nama_karyawan; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Alasan</td><td><?php echo $alasan; ?></td></tr>
	    <tr><td>File Attachment</td>
	    	<td>
	    		<iframe  src="<?php echo base_url().'/assets/assets/img/absen/'.$photo ?>" width="100%" height="350"></iframe >
	    	</td>
	   	</tr>

	    <tr><td>Status Cuti</td><td><?php echo $status_cuti; ?></td></tr>
	    <tr><td></td><td>
	    	<a href="<?php echo site_url('cuti/pdf') ?>" class="btn btn-success" target="_blank"><i class="fas fa-check" aria-hidden="true"></i> Approved</a>
	    	<a href="<?php echo site_url('cuti/pdf') ?>" class="btn btn-danger" target="_blank"><i class="fas fa-times" aria-hidden="true"></i> Disapproved</a>
	    	<a href="<?php echo site_url('cuti') ?>" class="btn btn-default">Cancel</a></td></tr>
</table>
			</div>
        </div>
    </div>
</div>x