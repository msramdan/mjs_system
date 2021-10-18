<div id="content" class="app-content">
<div class="col-xl-12 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" data-init="true">
<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">T_purchase Read</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">
<table id="data-table-default" class="table table-hover table-bordered table-td-valign-middle">
	    <tr><td style="vertical-align: middle;">No Purchase</td><td><?php echo $no_purchase; ?></td></tr>
	    <tr><td style="vertical-align: middle;">User Penginput</td><td><?php echo $nama_user; ?></td></tr>
	    <tr><td style="vertical-align: middle;">Tanggal Input</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td style="vertical-align: middle;">Order Deadline</td><td><?php echo $order_deadline; ?></td></tr>
	    <tr><td style="vertical-align: middle;">Estimasi Penerimaan</td><td><?php echo $receipt_date; ?></td></tr>
	    <tr><td style="vertical-align: middle;">Final Price</td><td><?php echo rupiah($grandtotal) ?></td></tr>
	    <tr><td style="vertical-align: middle;">Note</td><td><?php echo $note; ?></td></tr>

	    <tr><td style="vertical-align: middle;">Detail PO</td><td>
	    	<table class="table table-sm table-bordered">
	    		<tr>
	    			<td>No</td>
	    			<td>Barang / Jasa</td>
	    			<td>Satuan</td>
	    			<td>Harga</td>
	    			<td>QTY</td>
	    			<td>Total</td>
	    		</tr>
	    		<?php $no = 1;
		            foreach ($detail as $row) { ?>
		                <tr>
		                	<td><?= $no++?></td>
		                	<td><?php echo $row->nama_item ?></td>
		                	<td><?php echo $row->nama_unit ?></td>
		                	<td><?php echo rupiah($row->price) ?></td>
		                	<td><?php echo $row->qty ?></td>
		                	<td><?php echo rupiah($row->total) ?></td>
		                </tr>
                <?php } ?>
	    	</table>
	    	

	    </td></tr>


	    <tr><td></td><td>
	    	<a href="<?php echo site_url('t_purchase/pdf/'.encrypt_url($purchase_id)) ?>" class="btn btn-warning" target="_blank"><i class="fas fa-print" aria-hidden="true"></i> Print</a>
	    	<a href="<?php echo site_url('t_purchase') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
			</div>
        </div>
    </div>
</div>