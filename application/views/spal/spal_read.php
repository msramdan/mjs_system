<div id="content" class="app-content">
<div class="col-xl-12 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" data-init="true">
<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">Spal Read</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">
<table id="data-table-default" class="table table-hover table-bordered table-td-valign-middle">
	    <tr><td>No Spal</td><td><?php echo $no_spal; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Customer</td><td><?php echo $pelanggan_id; ?></td></tr>
	    <tr><td>Attn</td><td><?php echo $attn; ?></td></tr>
	    <tr><td>Kapal</td><td><?php echo $kapal; ?></td></tr>
	    <tr><td>Tongkang</td><td><?php echo $tongkang; ?></td></tr>
	    <tr><td>Nama Muatan</td><td><?php echo $nama_muatan; ?></td></tr>
	    <tr><td>Jumlah Muatan</td><td><?php echo $jumlah_muatan; ?></td></tr>
	    <tr><td>Harga Muatan</td><td><?php echo rupiah($harga_muatan) ; ?></td></tr>
	    <tr><td>Pelabuhan Muat</td><td><?php echo $pelabuhan_muat; ?></td></tr>
	    <tr><td>Pelabuhan Bongkar</td><td><?php echo $pelabuhan_bongkar; ?></td></tr>
	    <tr><td>Metode Pembayaran</td><td><?php echo $metode_pembayaran; ?></td></tr>
	    <tr><td>Dokumen</td><td><?php echo $dokumen; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('spal') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
			</div>
        </div>
    </div>
</div>