<div id="content" class="app-content">
<div class="col-xl-12 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">KELOLA DATA SPAL</h4>
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
	    <tr><td  style="vertical-align: middle;" >NO SPAL </td><td><input type="text" readonly="" class="form-control" name="no_spal" id="no_spal" placeholder="Pilih Customer Untuk Generate No Spal" value="<?php echo $no_spal; ?>" />
	    <?php echo form_error('no_spal') ?></td></tr>

	    <?php if ($this->uri->segment(2) =="update" || $this->uri->segment(2) =="update_action") { ?>
	    	<tr><td  style="vertical-align: middle;" >Tanggal <?php echo form_error('tanggal') ?></td><td><input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td></tr>
	    <?php }else{ ?>
	    	<tr><td  style="vertical-align: middle;" >Tanggal <?php echo form_error('tanggal') ?></td><td><input type="date" class="form-control" name="tanggal" id="tanggal" readonly="" placeholder="Tanggal" value="<?= date('Y-m-d')?>" /></td></tr>

	    <?php } ?>

	    
	    <tr>
                                <td style="vertical-align: middle;" width="30%">
                                   Customer 
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <select class="form-control theSelect berubah_customer" name="pelanggan_id" id="pelanggan_id">
                                                <option value="">-- Pilih -- </option>
						                        <?php foreach ($pelanggan as $key => $data) { ?>
						                          <?php if ($pelanggan_id == $data->pelanggan_id) { ?>
						                            <option  value="<?php echo $data->pelanggan_id ?>" selected><?php echo $data->nama_pelanggan ?></option>
						                          <?php } else { ?>
						                            <option value="<?php echo $data->pelanggan_id ?>"><?php echo $data->nama_pelanggan ?></option>
						                          <?php } ?>
						                        <?php } ?>
                                              </select>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-customer">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <?php echo form_error('pelanggan_id') ?>
                                </td>
                            </tr>


	    <tr><td  style="vertical-align: middle;">Attn</td><td><input type="text" class="form-control" name="attn" id="attn" placeholder="Attn" value="<?php echo $attn; ?>" />
	     <?php echo form_error('attn') ?></td></tr>

	    <tr><td  style="vertical-align: middle;" id="tengah" >Informasi Kapal & Tongkang</td><td>
                                    <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <input type="text" class="form-control" name="kapal" id="kapal" placeholder="Nama Kapal" value="<?php echo $kapal; ?>" />
                                        <?php echo form_error('kapal') ?>
                                      </div>
                                      <div class="col-md-6">
                                        <input type="text" class="form-control" name="tongkang" id="tongkang" placeholder="Nama Tongkang" value="<?php echo $tongkang; ?>" />
                                        <?php echo form_error('tongkang') ?>
                                      </div>
                                    </div>
                                  </div>
                                </td></tr>
         <tr><td  style="vertical-align: middle;" id="tengah" >Informasi Pelabuhan</td><td>
                                    <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <input type="text" class="form-control" name="pelabuhan_muat" id="pelabuhan_muat" placeholder="Pelabuhan Muat" value="<?php echo $pelabuhan_muat; ?>" />
                                        <?php echo form_error('pelabuhan_muat') ?>
                                      </div>
                                      <div class="col-md-6">
                                        <input type="text" class="form-control" name="pelabuhan_bongkar" id="pelabuhan_bongkar" placeholder="Pelabuhan Bongkar" value="<?php echo $pelabuhan_bongkar; ?>" />
                                        <?php echo form_error('pelabuhan_bongkar') ?>
                                      </div>
                                    </div>
                                  </div>
                                </td></tr>

        <tr><td  style="vertical-align: middle;" id="tengah" >Informasi Muatan</td><td>
                                    <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-4">
                                        <input type="text" class="form-control" name="nama_muatan" id="nama_muatan" placeholder="Nama Muatan" value="<?php echo $nama_muatan; ?>" />
                                        <?php echo form_error('nama_muatan') ?>
                                      </div>
                                      <div class="col-md-4">
                                        <input type="number" class="form-control" name="jumlah_muatan" id="jumlah_muatan" placeholder="Jumlah muatan" value="<?php echo $jumlah_muatan; ?>" />
                                        <?php echo form_error('jumlah_muatan') ?>
                                      </div>
                                      <div class="col-md-4">
                                        <input type="number" class="form-control" name="harga_muatan" id="harga_muatan" placeholder="Harga Muatan" value="<?php echo $harga_muatan; ?>" />
                                        <?php echo form_error('harga_muatan') ?>
                                      </div>
                                    </div>
                                  </div>
                                </td></tr>
        
	    <tr><td  style="vertical-align: middle;" >Metode Pembayaran</td><td><input type="text" class="form-control" name="metode_pembayaran" id="metode_pembayaran" placeholder="Metode Pembayaran" value="<?php echo $metode_pembayaran; ?>" />
	     <?php echo form_error('metode_pembayaran') ?></td></tr>

	    	<?php if ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'create_action' ) { ?>
                     <tr><td >Dokumen SPAL <?php echo form_error('dokumen') ?></td><td><input type="file" class="form-control" name="dokumen" id="dokumen" placeholder="dokumen" required="" value="" onchange="return validasiEkstensi()" />
                        <div id="preview"></div>
                     </td></tr>
                  <?php }else{ ?>
                  <div class="form-group">
                    <tr>
                        <td >dokumen <?php echo form_error('dokumen') ?></td>
                        <td>
                            <iframe style="width: 100%; height: 450px" src="<?php echo base_url();?>assets/assets/img/spal/<?=$dokumen?>" \></iframe>
                            <input type="hidden" name="dokumen_lama" value="<?=$dokumen?>">
                            <p style="color: red">Note :Pilih dokumen Jika Ingin Merubah dokumen</p>
                            <input type="file" class="form-control" name="dokumen" id="dokumen" placeholder="dokumen" value="" onchange="return validasiEkstensi()" />
                        </td>

                    </tr>

                    
                  </div>
                  <?php } ?>


	    <?php echo form_error('dokumen') ?></td></tr>
	    <tr><td></td><td><input type="hidden" name="spal_id" value="<?php echo $spal_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('spal') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a></td></tr>
</thead>
	</table></form>        </div>
</div>
</div>
</div>

<script type="text/javascript">
	$(".theSelect").select2();

function validasiEkstensi(){
    var inputFile = document.getElementById('dokumen');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.pdf|\.doc|\.docx)$/i;
    if(!ekstensiOk.exec(pathFile)){
        alert('Silakan upload file yang memiliki ekstensi .pdf/.doc/.docx');
        inputFile.value = '';
        return false;
    }else{
        // Preview dokumen
        if (inputFile.files && inputFile.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').innerHTML = '<iframe src="'+e.target.result+'" style="height:450px; width:100%"/>';
            };
            reader.readAsDataURL(inputFile.files[0]);
        }
    }
}



	$( ".berubah_customer" ).change(function() {
  		var kode=$('#pelanggan_id').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('Spal/gen_no_spal')?>",
            dataType : "",
            data : {kode: kode},
                    success: function(data){
                        var json = data,
                        obj = JSON.parse(json);
                        $('#no_spal').val(obj);
                      }
                });

                return false;
    });


</script>