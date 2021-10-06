<div id="content" class="app-content">
            <h1 class="page-header">KELOLA DATA SPAL</h1>  
            <div class="panel panel-inverse">
              <div class="panel-heading">
                <h4 class="panel-title">List Data spal </h4>
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
                                        <div class='col-md-9'>
                                            <div style="padding-bottom: 10px;">
        <?php echo anchor(site_url('spal/create'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
		<?php echo anchor(site_url('spal/excel'), '<i class="far fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm export_data"'); ?>
                </div>
            </div>
        </div>    
        <div class="box-body" style="overflow-x: scroll; ">
        <table id="data-table-default" class="table table-bordered table-hover table-td-valign-middle text-white">
         <thead>
            <tr>
                <th>No</th>
		<th>No Spal</th>
		<th>Tanggal</th>
		<th>Customer</th>
		<th>Attn</th>
		<th>Kapal</th>
		<th>Tongkang</th>
		<th>Nama Muatan</th>
		<th>Jumlah Muatan</th>
		<th>Harga Muatan</th>
		<th>Pelabuhan Muat</th>
		<th>Pelabuhan Bongkar</th>
		<th>Metode Pembayaran</th>
		<th>Dokumen</th>
		<th>Action</th>
            </tr></thead><tbody><?php $no = 1;
            foreach ($spal_data as $spal)
            {
                ?>
                <tr>
			<td><?= $no++?></td>
			<td><?php echo $spal->no_spal ?></td>
			<td><?php echo $spal->tanggal ?></td>
			<td><?php echo $spal->nama_pelanggan ?></td>
			<td><?php echo $spal->attn ?></td>
			<td><?php echo $spal->kapal ?></td>
			<td><?php echo $spal->tongkang ?></td>
			<td><?php echo $spal->nama_muatan ?></td>
			<td><?php echo $spal->jumlah_muatan ?></td>
			<td><?php echo rupiah($spal->harga_muatan) ?></td>
			<td><?php echo $spal->pelabuhan_muat ?></td>
			<td><?php echo $spal->pelabuhan_bongkar ?></td>
			<td><?php echo $spal->metode_pembayaran ?></td>
			<td><?php echo $spal->dokumen ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('spal/read/'.encrypt_url($spal->spal_id)),'<i class="fas fa-eye" aria-hidden="true"></i>','class="btn btn-success btn-sm read_data"'); 
				echo '  '; 
				echo anchor(site_url('spal/update/'.encrypt_url($spal->spal_id)),'<i class="fas fa-pencil-alt" aria-hidden="true"></i>','class="btn btn-primary btn-sm update_data"'); 
				echo '  '; 
				echo anchor(site_url('spal/delete/'.encrypt_url($spal->spal_id)),'<i class="fas fa-trash-alt" aria-hidden="true"></i>','class="btn btn-danger btn-sm delete_data" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php } ?>
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