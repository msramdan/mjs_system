<div id="content" class="app-content">
<div class="col-xl-12 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">KELOLA DATA CUTI</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">
        
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            
            <table class="table  table-bordered table-hover table-td-valign-middle">
            <thead>
	    <tr>
            <td >Karyawan <?php echo form_error('karyawan_id') ?></td>
            <td><select name="karyawan_id" class="form-control">
                <option value="">-- Pilih -- </option>
                <?php foreach ($karyawan as $key => $data) { ?>
                  <?php if ($karyawan_id == $data->karyawan_id) { ?>
                    <option value="<?php echo $data->karyawan_id ?>" selected><?php echo $data->nama_karyawan ?></option>
                  <?php } else { ?>
                    <option value="<?php echo $data->karyawan_id ?>"><?php echo $data->nama_karyawan ?></option>
                  <?php } ?>
                <?php } ?>
              </select></td>
          </tr>


	    <tr><td >Tanggal <?php echo form_error('tanggal') ?></td><td><input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td></tr>
	    
        <tr><td >Alasan <?php echo form_error('alasan') ?></td><td> <textarea class="textarea form-control" id="wysihtml5" rows="5" name="alasan" id="alasan" placeholder="Alasan"><?php echo $alasan; ?></textarea></td></tr>

      <?php if ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'create_action' ) { ?>
                     <tr><td >File Attachment <?php echo form_error('photo') ?></td><td><input type="file" class="form-control" name="photo" id="photo" placeholder="photo" required="" value="" onchange="return validasiEkstensi()" />
                        <!-- <div id="preview"></div> -->
                     </td></tr>
                  <?php }else{ ?>
                  <div class="form-group">
                    <tr>
                        <td >File Attachment<?php echo form_error('photo') ?></td>
                        <td>
                            <a href="#modal-dialog" data-bs-toggle="modal"><iframe src="<?php echo base_url();?>assets/assets/img/absen/<?=$photo?>" style="width: 150px;height: 150px;border-radius: 5%;"></iframe></a>
                            <input type="hidden" name="photo_lama" value="<?=$photo?>">
                            <p style="color: red">Note :Pilih photo Jika Ingin Merubah photo</p>
                            <input type="file" class="form-control" name="photo" id="photo" placeholder="photo" value="" onchange="return validasiEkstensi()" />
                        </td>

                    </tr>

                    
                  </div>
                  <?php } ?>

       <tr>
            <td >Status Cuti <?php echo form_error('status_cuti') ?></td>
            <td><select name="status_cuti" class="form-control" value="<?= $status_cuti ?>">
                <option style="color: black" value="">- Pilih -</option>
                <option style="color: black"  value="Waiting Review" <?php echo $status_cuti == 'Waiting Review' ? 'selected' : 'null' ?>>Waiting Review</option>
                <option style="color: black"  value="Approved" <?php echo $status_cuti == 'Approved' ? 'selected' : 'null' ?>>Approved</option>
                <option style="color: black"  value="Reject" <?php echo $status_cuti == 'Reject' ? 'selected' : 'null' ?>>Reject</option>
              </select>
            </td>
          </tr>




	    <tr><td></td><td><input type="hidden" name="cuti_id" value="<?php echo $cuti_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('cuti') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a></td></tr>
</thead>
	</table></form>        </div>
</div>
</div>
</div>