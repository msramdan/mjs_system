<div id="content" class="app-content">
            <div class="panel panel-inverse">
              <div class="panel-heading">
                <h4 class="panel-title">Rekap Absensi Bulanan</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">        
                                <div class="box-body">
                                    <div class="row">
                                    	<?php

									$first_day_this_month = 1; // hard-coded '01' for first day
									$last_day_this_month  = date('t',strtotime($year.'-'.$month.'-01'));

									// echo 'firstday = '.$first_day_this_month. ' and last day = '.$last_day_this_month;

									$tanggal_arr = array();
									$statusnya = array();

									$statustocount = '';
									$a = $this->Absen_model->getdatabystatus($karyawan_id,$statustocount,$year,$month);

									foreach ($a as $key => $value) {
									    $tanggal = date('d', strtotime($value->tanggal));
									    $status = $value->status;
									    $tanggal_arr[] = $tanggal;
									    $statusnya[] = $status;
									}


									$monthNum  = $month;
									$dateObj   = DateTime::createFromFormat('!m', $monthNum);
									$monthName = $dateObj->format('F'); // March


									?>
										<div style="overflow-y: scroll;">
											
											<table id="tabel-rekap-absensi" class="table table-bordered table-hover table-td-valign-middle">
												<thead>
													<tr>
														<th rowspan="2">Nama Karyawan</th>
											         	<th colspan="<?php echo $last_day_this_month ?>">Bulan <?php echo $monthName ?></th>
													</tr>
											        <tr>
											         	
													<?php
													for ($i = $first_day_this_month; $i <= $last_day_this_month; $i++) { 
											            ?>
											             	<th><?php echo $i ?></th>
											            <?php
											        }
													?>
											        </tr>
												</thead>
												<tbody>

											        <tr>
											        	<td><?php echo $nama_karyawan ?></td>
													<?php
													for ($i = $first_day_this_month; $i <= $last_day_this_month; $i++) {    
														if (in_array($i, $tanggal_arr)) {
												            $indexfromtglarray = array_search($i, $tanggal_arr);

												            $getstatusbasedontglarray = $statusnya[$indexfromtglarray];
												            ?>
																<td><?php echo $getstatusbasedontglarray ?></td>
												            <?php
												        } else {
												            ?>
																<td>N/A</td>
												            <?php
												        }
											        }
													?>
														</tr>
												</tbody>
											</table>
										</div>
                                    </div>
	        					</div>
        					</div>
        				</div>
        			</div>
        		</div>
            </div>
        </div>

        <?php
        if (is_allowed_button($this->uri->segment(1),'read')<1) { ?>
            <script>
                    $('.read_data').css('display','none')
            </script>
        <?php } ?>

        <?php
        if (is_allowed_button($this->uri->segment(1),'create')<1) { ?>
            <script>
                    $('.tambah_data').css('display','none')
            </script>
        <?php } ?>

        <?php
        if (is_allowed_button($this->uri->segment(1),'export')<1) { ?>
            <script>
                    $('.export_data').css('display','none')
            </script>
        <?php } ?>

        <?php
        if (is_allowed_button($this->uri->segment(1),'update')<1) { ?>
            <script>
                    $('.update_data').css('display','none')
            </script>
        <?php } ?>

        <?php
        if (is_allowed_button($this->uri->segment(1),'delete')<1) { ?>
            <script>
                    $('.delete_data').css('display','none')
            </script>
        <?php } ?>


<!-- TESTING AREA -->