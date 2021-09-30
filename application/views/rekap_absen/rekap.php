
<div id="content" class="app-content">
            <div class="panel panel-inverse">
              <div class="panel-heading">
                <h4 class="panel-title">Rekap Absensi </h4>
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
                                    <div class='row'>
                                        <div class='col-md-12'>
                                        	<div class="container d-flex justify-content-center" style="margin: 15px 0;">
                                        		<div class="col-sm-12 col-md-8 col-xs-6">
	                                            	<div class="input-group input-daterange">
														<input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control datepicker-autoClose" name="start" placeholder="Tanggal Awal" />
														<span class="input-group-text input-group-addon">ke</span>
														<input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control datepicker-autoClose" name="end" placeholder="Tanggal Akhir" />
														<span class="input-group-button input-group-addon"><button class="btn btn-success" id="btn-filter-date"><i class="fas fa-eye" aria-hidden="true"></i></button></span>
													</div>
                                        		</div>
                                        	</div>
						        		</div>    
							        	<div class="box-body" id="tabel-absensi-wrapper" style="overflow-x: scroll; height: 56vh; ">
							        		<table id="data-table-default" class="table table-bordered table-hover table-td-valign-middle">
							        			<thead>
							        				<tr>
							        					<th>Karyawan</th>
								        				<th>Jan</th>
								        				<th>Feb</th>
								        				<th>Mar</th>
								        				<th>Apr</th>
								        				<th>Mei</th>
								        				<th>Jun</th>
								        				<th>Jul</th>
								        				<th>Aug</th>
								        				<th>Sept</th>
								        				<th>Okt</th>
								        				<th>Nov</th>
								        				<th>Des</th>
							        				</tr>
							        			</thead>
							        			<tbody>
								        			<?php
								        			foreach ($recap_data as $key => $value) {
								        				?>
								        				<tr>
								        					<td>
								        						<?php echo $value->nama_karyawan ?>
								        					</td>
								        					<td><?php echo $value->Januari ?></td>
									        				<td><?php echo $value->Februari ?></td>
									        				<td><?php echo $value->Maret ?></td>
									        				<td><?php echo $value->April ?></td>
									        				<td><?php echo $value->Mei ?></td>
									        				<td><?php echo $value->Juni ?></td>
									        				<td><?php echo $value->Juli ?></td>
									        				<td><?php echo $value->Agustus ?></td>
									        				<td><?php echo $value->September ?></td>
									        				<td><?php echo $value->Oktober ?></td>
									        				<td><?php echo $value->November ?></td>
									        				<td><?php echo $value->Desember ?></td>
							        					</tr>
								        				
								        				<?php	
								        			}

								        			?>
							        			</tbody>
							        		</table>
							            	<div style="display: flex; height: 50vh; justify-content: center; flex-direction: column;">
								              	<i class="fas fa-sync fa-spin fa-3x" style="margin: auto;"></i>
								              	<p>Mempersiapkan data...</p>
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

        <script type="text/javascript">
        	
        	$('#btn-filter').click(function() {

        		$.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>absen/refreshtabelabsen",
                    data: {
                        id_lokasi:lokasi,
                        date:date
                    },
                    success: function(data){
                        elem_tbl.html(data)
                    },
                    error: function(e) {
                        elem_tbl.html(`<div style="display: flex; height: 50vh; justify-content: center; flex-direction: column;">
              
              <i class="fas fa-sync fa-spin fa-3x" style="margin: auto;"></i>
              <p>Terjadi Masalah tersambung dengan server, cek koneksi internet anda, pastikan rekan dapat mengaksesnya, jika masih terjadi, hubungi admin IT</p>
                
            </div>`)
                    }
                })

        	})

        </script>