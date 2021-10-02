
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
                                    <div class='row'> 
							        	<div class="box-body" id="tabel-absensi-wrapper">
							        		<!-- <div id="recap-calendar" class="bootstrap-calendar"></div> -->
								   		</div>
		        					</div>
                                    <div class="row">
                                        <table id="tabel-rekap-absensi" class="table table-bordered table-hover table-td-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Nama Karyawan</th>
                                                    <th colspan="5" style="text-align: center;"><?php echo date('F', mktime(0, 0, 0, $bulan, 10));  ?></th>
                                                </tr>
                                                <tr>
                                                    <th>M</th>
                                                    <th>S</th>
                                                    <th>I</th>
                                                    <th>A</th>
                                                    <th>C</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php 
                                                    foreach ($datakaryawan as $key => $v) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $v->nama_karyawan ?>
                                                            </td>
                                                            <td><?php echo $classnyak->countMasuk($v->karyawan_id, $bulan, $tahun, $lokasi_id) ?></td>
                                                            <td><?php echo $classnyak->countSakit($v->karyawan_id, $bulan, $tahun, $lokasi_id) ?></td>
                                                            <td><?php echo $classnyak->countIzin($v->karyawan_id, $bulan, $tahun, $lokasi_id) ?></td>
                                                            <td><?php echo $classnyak->countAlpa($v->karyawan_id, $bulan, $tahun, $lokasi_id) ?></td>
                                                            <td><?php echo $classnyak->countCuti($v->karyawan_id, $bulan, $tahun, $lokasi_id) ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
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