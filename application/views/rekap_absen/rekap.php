
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
							        	<div class="box-body" id="tabel-absensi-wrapper" style="overflow-x: scroll; height: 56vh; ">
							        		<table id="tabel-rekap-absensi" class="table table-bordered table-hover table-td-valign-middle">
							        			<thead>
							        				<tr>
							        					<th rowspan="2">Karyawan</th>
								        				<th colspan="5">Jan</th>
								        				<th colspan="5">Feb</th>
								        				<th colspan="5">Mar</th>
								        				<th colspan="5">Apr</th>
								        				<th colspan="5">Mei</th>
								        				<th colspan="5">Jun</th>
								        				<th colspan="5">Jul</th>
								        				<th colspan="5">Aug</th>
								        				<th colspan="5">Sept</th>
								        				<th colspan="5">Okt</th>
								        				<th colspan="5">Nov</th>
								        				<th colspan="5">Des</th>
							        				</tr>
							        				<tr>
							        					<th>M</th>
							        					<th>S</th>
							        					<th>I</th>
							        					<th>A</th>
							        					<th>C</th>
							        					<th>M</th>
							        					<th>S</th>
							        					<th>I</th>
							        					<th>A</th>
							        					<th>C</th>
							        					<th>M</th>
							        					<th>S</th>
							        					<th>I</th>
							        					<th>A</th>
							        					<th>C</th>
							        					<th>M</th>
							        					<th>S</th>
							        					<th>I</th>
							        					<th>A</th>
							        					<th>C</th>
							        					<th>M</th>
							        					<th>S</th>
							        					<th>I</th>
							        					<th>A</th>
							        					<th>C</th>
							        					<th>M</th>
							        					<th>S</th>
							        					<th>I</th>
							        					<th>A</th>
							        					<th>C</th>
							        					<th>M</th>
							        					<th>S</th>
							        					<th>I</th>
							        					<th>A</th>
							        					<th>C</th>
							        					<th>M</th>
							        					<th>S</th>
							        					<th>I</th>
							        					<th>A</th>
							        					<th>C</th>
							        					<th>M</th>
							        					<th>S</th>
							        					<th>I</th>
							        					<th>A</th>
							        					<th>C</th>
							        					<th>M</th>
							        					<th>S</th>
							        					<th>I</th>
							        					<th>A</th>
							        					<th>C</th>
							        					<th>M</th>
							        					<th>S</th>
							        					<th>I</th>
							        					<th>A</th>
							        					<th>C</th>
							        					<th>M</th>
							        					<th>S</th>
							        					<th>I</th>
							        					<th>A</th>
							        					<th>C</th>
							        				</tr>
							        			</thead>
							        			<tbody id="list-data">
							        				
							        			</tbody>
							        		</table>
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

<script src="<?= base_url() ?>assets/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/jszip/dist/jszip.min.js"></script>

        <script type="text/javascript">
  		

		 	$(document).ready(function(){

		 		//it's not posible to see this in mobile version!
		 		var tabel = $('#tabel-rekap-absensi').DataTable({
							    dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
							    buttons: [
							      { 
							      	extend: 'copy', 
							      	className: 'btn-sm'
							      },
							      { 
							      	extend: 'csv', 
							      	className: 'btn-sm',
							      	title: 'Export data rekap absensi'
							      },
							      { 
							      	extend: 'excel', 
							      	className: 'btn-sm',
							      	title: 'Export data rekap absensi'
							      },
							      { 
							      	extend: 'pdf', 
							      	className: 'btn-sm',
							      	title: 'Export data rekap absensi'
							      },
							      { 
							      	extend: 'print', 
							      	className: 'btn-sm'
							      }
							    ],
							    processing: true,
							    language: {
							        'loadingRecords': '',
							        'processing': '<i class="fas fa-sync fa-spin"></i>'
							    },
							    "ajax": {
							    	type: "POST",
								    url: "<?php echo base_url() ?>Rekap_absen/get_data",
								    data: {
								        id_lokasi:'<?php echo $lokasi_id ?>'
									},
								},
							 });


	        	$('#btn-filter-date').click(function() {
	        		tabel.ajax.reload();
	        	})
		 	})



        </script>