<div id="content" class="app-content">
<div class="col-xl-12 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">KELOLA DATA PAJAK</h4>
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
	    <tr><td >Nama <?php echo form_error('nama') ?></td><td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td></tr>
	    <tr><td >Nilai Tukar ( % ) <?php echo form_error('nilai_tukar') ?></td><td><input type="number" class="form-control" name="nilai_tukar" id="nilai_tukar" placeholder="Nilai Tukar" value="<?php echo $nilai_tukar; ?>"  step="any" /></td></tr>
	    <tr><td >Keterangan <?php echo form_error('keterangan') ?></td><td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td></tr>

	    <tr id="akun_pajak_penjualan2">
                                <td >Akun Pajak Penjualan <?php echo form_error('akun_pajak_penjualan') ?></td>
                                <td style="width: 70%">
                                  <select  class="form-control theSelect" name="akun_pajak_penjualan" id="akun_pajak_penjualan">
                                    <option value="">-- Pilih -- </option>
                                    <?php foreach ($coa as $key => $data) { ?>
                                      <?php if ($akun_pajak_penjualan == $data->coa_id) { ?>
                                        <option value="<?php echo $data->coa_id ?>" selected><?php echo $data->coa_name ?></option>
                                      <?php } else { ?>
                                        <option value="<?php echo $data->coa_id ?>"><?php echo $data->coa_name ?></option>
                                      <?php } ?>
                                    <?php } ?>
                                  </select>
                                </td>
                            </tr>

         <tr id="akun_pajak_pembelian2">
                                <td >Akun Pajak Pembelian <?php echo form_error('akun_pajak_pembelian') ?></td>
                                <td  style="width: 70%">
                                  <select  class="form-control theSelect" name="akun_pajak_pembelian" id="akun_pajak_pembelian">
                                    <option value="">-- Pilih -- </option>
                                    <?php foreach ($coa as $key => $data) { ?>
                                      <?php if ($akun_pajak_pembelian == $data->coa_id) { ?>
                                        <option value="<?php echo $data->coa_id ?>" selected><?php echo $data->coa_name ?></option>
                                      <?php } else { ?>
                                        <option value="<?php echo $data->coa_id ?>"><?php echo $data->coa_name ?></option>
                                      <?php } ?>
                                    <?php } ?>
                                  </select>
                                </td>
                            </tr>
	    <tr><td></td><td><input type="hidden" name="pajak_id" value="<?php echo $pajak_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pajak') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a></td></tr>
</thead>
	</table></form>        </div>
</div>
</div>
</div>


<script>
  $(document).ready(function() {

    $(".theSelect").select2();
  });
</script>
