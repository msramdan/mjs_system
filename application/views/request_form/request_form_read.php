<div id="content" class="app-content">
	<div class="col-xl-12 ui-sortable">
		<div class="panel panel-inverse" data-sortable-id="form-stuff-1" data-init="true">
			<div class="panel-heading ui-sortable-handle">
				<h4 class="panel-title">Request_form Read</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="panel-body">

				<div style="display: flex;justify-content: center;text-align: center;">
				<?php 
					$wh = json_decode($whoisreviewing, true);
					foreach ($wh as $key => $value) {
						if ($value == '-') {
							?>
							<div style="width: 25%;">
								<div style="position: relative;">
									<i class="fa fa-users" style="font-size: 67px;"></i>
									<i class="fa fa-minus" style="font-size: 27px; position: absolute; bottom: 0;"></i>
								</div>
								<h3><?php echo $key ?></h3>

								<p><label class="label label-default">Dalam Review</label></p>
							</div>
							<?php
						}

						if ($value == 'true') {
							?>
							<div style="width: 25%;">
								<div style="position: relative;">
									<i class="fa fa-users" style="font-size: 67px;"></i>
									<i class="fa fa-check-circle" style="font-size: 27px; color: green; position: absolute; bottom: 0;"></i>
								</div>
								<h3><?php echo $key ?></h3>

								<p><label class="label label-success">Disetujui</label></p>
							</div>
							<?php
						}

						if ($value == 'false') {
							?>
							<div style="width: 25%;">
								<div style="position: relative;">
									<i class="fa fa-users" style="font-size: 67px;"></i>
									<i class="fa fa-times-circle" style="font-size: 27px; color: red; position: absolute; bottom: 0;"></i>
								</div>
								<h3><?php echo $key ?></h3>

								<p><label class="label label-danger">Ditolak</label></p>
							</div>
							<?php
						}
					}
				?>
			</div>

				<table id="data-table-default" class="table table-hover table-bordered table-td-valign-middle">
				    <tr><td>Kode Request Form</td><td><?php echo $kode_request_form; ?></td></tr>
				    <tr><td>User Id</td><td><?php echo $user_id; ?></td></tr>
				    <tr><td>Tanggal Request</td><td><?php echo $tanggal_request; ?></td></tr>
				    <tr><td>Categori Request Id</td><td><?php echo $categori_request_id; ?></td></tr>
				    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
				    <tr><td></td><td><a href="<?php echo site_url('request_form') ?>" class="btn btn-default">Cancel</a></td></tr>
				</table>
			</div>
        </div>
    </div>
</div>