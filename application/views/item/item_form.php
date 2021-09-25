<div id="content" class="app-content">
<div class="col-xl-12 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">KELOLA DATA ITEM</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">
        
            <form action="<?php echo $action; ?>" method="post">
            
            <table class="table  table-bordered table-hover table-td-valign-middle">
            <thead>
	    <tr><td >Kd Internal Item <?php echo form_error('kd_internal_item') ?></td><td>
        <?php if ($button=='Create') { ?>
                    <input type="text" readonly="" class="form-control" name="kd_internal_item" id="kd_internal_item" placeholder="Kd Internal Item" value="<?= $kodeunik ?>"  />
                  <?php }else{ ?>
                    <input type="text" readonly="" class="form-control" name="kd_internal_item" id="kd_internal_item" placeholder="Kd Internal Item" value="<?php echo $kd_internal_item; ?>" />
                  <?php } ?>



      </td></tr>


	    <tr><td >Kd External Item <?php echo form_error('kd_external_item') ?></td><td><input type="text" class="form-control" name="kd_external_item" id="kd_external_item" placeholder="Kd External Item" value="<?php echo $kd_external_item; ?>" /></td></tr>
	    <tr><td >Nama Item <?php echo form_error('nama_item') ?></td><td><input type="text" class="form-control" name="nama_item" id="nama_item" placeholder="Nama Item" value="<?php echo $nama_item; ?>" /></td></tr>
	    <tr>
            <td >Kategori <?php echo form_error('kategori_id') ?></td>
            <td><select name="kategori_id" class="form-control">
                <option style="color: black" value="">-- Pilih -- </option>
                <?php foreach ($kategori as $key => $data) { ?>
                  <?php if ($kategori_id == $data->kategori_id) { ?>
                    <option style="color: black" value="<?php echo $data->kategori_id ?>" selected><?php echo $data->nama_kategori ?></option>
                  <?php } else { ?>
                    <option style="color: black" value="<?php echo $data->kategori_id ?>"><?php echo $data->nama_kategori ?></option>
                  <?php } ?>
                <?php } ?>
              </select></td>
          </tr>

        <tr><td>Type <?php echo form_error('type') ?></td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="type1" name="type" value="Persediaan" <?php echo $type == 'Persediaan' ? 'checked' : 'null' ?>>
            <label class="form-check-label" for="type1">Persediaan</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="type2" name="type" value="Non Persediaan" <?php echo $type == 'Non Persediaan' ? 'checked' : 'null' ?>>
            <label class="form-check-label" for="type2">Non Persediaan</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="type3" name="type" value="Service" <?php echo $type == 'Service' ? 'checked' : 'null' ?>>
            <label class="form-check-label" for="type3">Service</label>
          </div>
        </td>
      </tr>

         <tr>
            <td >Unit <?php echo form_error('unit_id') ?></td>
            <td><select name="unit_id" class="form-control">
                <option style="color: black" value="">-- Pilih -- </option>
                <?php foreach ($unit as $key => $data) { ?>
                  <?php if ($unit_id == $data->unit_id) { ?>
                    <option style="color: black" value="<?php echo $data->unit_id ?>" selected><?php echo $data->nama_unit ?></option>
                  <?php } else { ?>
                    <option style="color: black" value="<?php echo $data->unit_id ?>"><?php echo $data->nama_unit ?></option>
                  <?php } ?>
                <?php } ?>
              </select></td>
          </tr>	    
        <tr><td >Deskripsi <?php echo form_error('deskripsi') ?></td><td> <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea></td></tr>
		<tr><td >Estimasi Harga <?php echo form_error('estimasi_harga') ?></td><td>
      <input type="hidden" class="form-control" name="estimasi_harga" id="estimasi_harga" placeholder="Estimasi Harga" value="<?php echo $estimasi_harga; ?>" />
      <input type="text" class="form-control" name="estimasi_harga_txt" id="estimasi_harga_txt" placeholder="Estimasi Harga Text" value="<?php echo $estimasi_harga; ?>" />
    </td></tr>




	    <tr><td></td><td><input type="hidden" name="item_id" value="<?php echo $item_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('item') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a></td></tr>
</thead>
	</table></form>        </div>
</div>
</div>
</div>
<script>
  $(document).ready(function() {
    
    // konversi real-time ke number_format dan regex
    $('#estimasi_harga_txt').keyup(function() {
      var jumlah = $(this).val();
      
      $('#estimasi_harga').val(jumlah.replace(/\,/g, '', ));
      $('#estimasi_harga_txt').val(number_format(jumlah));
    });
  });
</script>