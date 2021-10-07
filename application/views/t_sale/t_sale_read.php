<div id="content" class="app-content">
<div class="col-xl-12 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" data-init="true">
<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">T_sale Read</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">
<table class="table table-hover table-bordered">
	<thead>
		<tr><td>No SO</td><td><?php echo $no_so; ?></td></tr>
		<tr><td>SPAL</td><td>
			<table class="table table-sm table-bordered">
	    		<tr><td>NO SPAL</td><td><?php echo $no_spal; ?></td></tr>
	   			<tr><td>Customer</td><td><?php echo $nama_pelanggan; ?></td></tr>
	   			<tr><td>Attn.</td><td><?php echo $attn; ?></td></tr>
	   			<tr><td>Informasi Tongkang & Kapal</td><td><?php echo $kapal; ?> & <?php echo $tongkang; ?></td></tr>
	   			<tr><td>Informasi Pelabuhan</td><td>Pelabuhan Muat : <?php echo $pelabuhan_muat; ?> - Pelabuhan Bongkar : <?php echo $pelabuhan_bongkar; ?></td></tr>
	   			<tr><td>Nama Muatan</td><td><?php echo $nama_muatan; ?></td></tr>
	   			<tr><td>Dokumen SPAL</td><td><a href="<?= base_url()?>T_sale/download/<?= $dokumen ?>" class="btn btn-success btn-xs"> <i class="fas fa-download" aria-hidden="true"></i> Download</a></tr>
	    	</table>
	    		
		</td></tr>
	    <tr><td>User Penginput</td><td>
	    	<?php echo $nama_user; ?>
	    	</td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Sub Price</td><td><?php echo rupiah($sub_price); ?></td></tr>
	    <tr><td>Discount</td><td><?php echo rupiah($discount); ?></td></tr>
	    <tr><td>Final Price</td><td><?php echo rupiah($final_price); ?></td></tr>
	    <tr><td>Note</td><td><?php echo $note; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_sale') ?>" class="btn btn-default">Cancel</a></td></tr>
	    </thead>
	</table>
			</div>
        </div>
    </div>
</div>