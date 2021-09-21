<style type="text/css">

.need-attention {
	animation: glow 1s infinite alternate;
}

@keyframes glow {
  from {
    box-shadow: 0 0 5px -5px #ff7b01;
  }
  to {
    box-shadow: 0 0 5px 5px #ff7b01;
  }
}

.hori-timeline .events {
    border-top: 3px solid #e9ecef;
    display: block;
}
.hori-timeline .events .event-list {
    display: block;
    position: relative;
    text-align: center;
    padding-top: 70px;
    margin-right: 0;
}
.hori-timeline .events .event-list:before {
    content: "";
    position: absolute;
    height: 36px;
    border-right: 2px dashed #dee2e6;
    top: 0;
}
.hori-timeline .events .event-list .event-date {
    position: absolute;
    top: 38px;
    left: 0;
    right: 0;
    width: 75px;
    margin: 0 auto;
    border-radius: 4px;
    padding: 2px 4px;
}
@media (min-width: 768px) {
	
	.hori-timeline .events {
	    display: flex !important;
		justify-content: center;
		align-items: center;
	}

    .hori-timeline .events .event-list {
        display: inline-block !important;
        width: 24%;
        padding-top: 45px;
    }
    .hori-timeline .events .event-list .event-date {
        top: -12px;
    }
}
.bg-soft-primary {
    background-color: rgba(64,144,203,.3)!important;
}
.bg-soft-success {
    background-color: rgba(71,189,154,.3)!important;
}
.bg-soft-danger {
    background-color: rgba(231,76,94,.3)!important;
}
.bg-soft-warning {
    background-color: rgba(249,213,112,.3)!important;
}
</style>

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


				<div class="hori-timeline" dir="ltr">
                            <ul class="list-inline events">

				<?php 
					$wh = json_decode($whoisreviewing, true);
					//print_r($wh);
					foreach ($wh as $key => $value) {
						if ($value['status'] == '-') {
							?>
							<li class="list-inline-item event-list">
								<div class="px-4">

									<?php

									if ($value['tanda_tangan'] == 'sekarang') {
										?>
										<div class="event-date bg-warning need-attention">
											In Review
	                                    </div>
										<?php
									}
									else
									{
										?>
										<div class="event-date bg-primary">
											Pending
	                                    </div>
										<?php	
									}

									?>
                                    <h5 class="font-size-13"><?php echo explode(' ',$classnyak->getusername($value['user_id'])[0]->nama_user)[0] ?></h5>
                                </div>
							</li>
							<?php
						}

						if ($value['status'] == 'true') {
							?>
							<li class="list-inline-item event-list">
								<div class="px-4">
                                    <div class="event-date bg-success">
										Approved
                                    </div>
                                    <h5 class="font-size-13"><?php echo explode(' ',$classnyak->getusername($value['user_id'])[0]->nama_user)[0] ?></h5>
                                </div>
							</li>
							<?php
						}

						if ($value['status'] == 'false') {
							?>
							<li class="list-inline-item event-list">
								<div class="px-4">
                                    <a class="btn btn-danger event-date" data-bs-toggle="modal" href="#message-disapproved-dialog">
										Dissaproved
                                    </a>
                                    <h5 class="font-size-13"><?php echo explode(' ',$classnyak->getusername($value['user_id'])[0]->nama_user)[0] ?></h5>
                                </div>
							</li>
                                
							<?php
						}
					}
				?>
					</ul>
				</div>


				<table id="data-table-default" class="table table-hover table-bordered table-td-valign-middle">
				    <tr><td>Kode Request Form</td><td><?php echo $kode_request_form; ?></td></tr>
				    <tr><td>User Penginput</td><td><?php echo $nama_user; ?></td></tr>
				    <tr><td>Tanggal Request</td><td><?php echo $tanggal_request; ?></td></tr>
				    <tr><td>Categori Request</td><td><?php echo $request; ?></td></tr>
				    <tr><td>Status Request</td><td><?php 
				    if ($status == 'Dalam Review') {
				    	?>
				    	<button class="btn btn-xs btn-primary"><?php echo $status; ?></button>
				    	<?php
				    }

				    if ($status == 'Ditolak') {
				    	?>
				    	<button class="btn btn-xs btn-danger" data-bs-toggle="modal" href="#message-disapproved-dialog"><?php echo $status; ?></button>
				    	<?php
				    }

				    if ($status == 'Diterima') {
				    	?>
				    	<button class="btn btn-xs btn-success"><?php echo $status; ?></button>
				    	<?php
				    }
					?></td></tr>
				    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
				    <tr>
				    	<td>Attachment File</td>
				    	<td>
				    		<table class="table table-sm table-bordered">	    		
				    			
				    				<tr>
					                  <th>Nama File</th>
					                  <th>Tindakan</th>
					                </tr>
					                <?php

						        	$lo = $classnyak->find_berkas_for_this_request_form($request_form_id);

						        	if ($lo) {
						        		$num = 1;
						        		foreach($lo as $k) {
						        			?>
						        				<tr id="<?php echo encrypt_url($k->file_rf_id) ?>">
									                <td><?php echo $k->nama_berkas ?></td>
									                <td><a class="btn btn-primary" target="_blank" rel="noopener noreferrer" href="<?php echo base_url().'assets/assets/img/berkas/'.$k->photo ?>" style="display: block;">Download</a></td>
									            </tr>
						        			<?php
						        			$num++;
						        		}
						        	}
						        	?>
				    		</table>  		
				    	</td>
	    			</tr>

				    <tr><td>Keterangan Tolak Sebelumnya</td><td><?php echo $keterangan_tolak; ?></td></tr>  
				    <tr><td></td><td>
				    	<?php echo anchor(site_url('request_form/update/'.encrypt_url($request_form_id)),'<i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit','class="btn btn-primary update_data"');  ?>
				    	<a href="<?php echo site_url('karyawan/pdf/'.encrypt_url($request_form_id)) ?>" class="btn btn-warning" target="_blank"><i class="fas fa-print" aria-hidden="true"></i> Print</a>
				    	<a href="<?php echo site_url('request_form') ?>" class="btn btn-default">Cancel</a>

				    </td></tr>
				</table>
			</div>
        </div>
    </div>
</div>