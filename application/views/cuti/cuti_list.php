<div id="content" class="app-content">
            <h1 class="page-header">KELOLA DATA CUTI</h1>  
            <div class="panel panel-inverse">
              <div class="panel-heading">
                <h4 class="panel-title">List Data cuti </h4>
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
        <?php echo anchor(site_url('cuti/create'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
		<?php echo anchor(site_url('cuti/excel'), '<i class="far fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm export_data"'); ?>
                </div>
            </div>
        </div>    
        <div class="box-body" style="overflow-x: scroll; ">
        <table id="data-table-default" class="table table-bordered table-hover table-td-valign-middle text-white">
         <thead>
            <tr>
                <th>No</th>
		<th>Karyawan</th>
		<th>Tanggal</th>
		<th>Alasan</th>
		<th>File Attachment</th>
		<th>Status Cuti</th>
		<th>Action</th>
            </tr></thead><tbody><?php $no = 1;
            foreach ($cuti_data as $cuti)
            {
                ?>
                <tr>
			<td><?= $no++?></td>
			<td><?php echo $cuti->nama_karyawan ?></td>
			<td><?php echo $cuti->tanggal ?></td>
			<td><?php echo $cuti->alasan ?></td>
			<td><a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>cuti/download/<?php echo $cuti->photo?>"><i class="ace-icon fa fa-download"></i> Download</a>
            </td>
            <td>

            <?php if ($cuti->status_cuti=="Approved") { ?>

                <button class="btn btn-success btn-xs" href="<?php echo base_url(); ?>cuti/download/<?php echo $cuti->photo?>"><i class="ace-icon fa fa-info"></i> <?php echo $cuti->status_cuti ?></button>

            <?php }else if ($cuti->status_cuti=="Reject") { ?>

                <button class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>cuti/download/<?php echo $cuti->photo?>"><i class="ace-icon fa fa-info"></i> <?php echo $cuti->status_cuti ?></button>

            <?php }else{ ?>

                <button class="btn btn-default btn-xs" href="<?php echo base_url(); ?>cuti/download/<?php echo $cuti->photo?>"><i class="ace-icon fa fa-info"></i> <?php echo $cuti->status_cuti ?></button>

            <?php } ?>
        </td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('cuti/read/'.encrypt_url($cuti->cuti_id)),'<i class="fas fa-eye" aria-hidden="true"></i>','class="btn btn-success btn-sm read_data"'); 
				echo '  '; 
				echo anchor(site_url('cuti/update/'.encrypt_url($cuti->cuti_id)),'<i class="fas fa-pencil-alt" aria-hidden="true"></i>','class="btn btn-primary btn-sm update_data"'); 
				echo '  '; 
				echo anchor(site_url('cuti/delete/'.encrypt_url($cuti->cuti_id)),'<i class="fas fa-trash-alt" aria-hidden="true"></i>','class="btn btn-danger btn-sm delete_data" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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