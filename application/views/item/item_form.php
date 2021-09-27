
<style type="text/css">
    #tengah {
    vertical-align: middle;
}
</style>
<div id="content" class="app-content">
            <h1 class="page-header">KELOLA DATA BARANG & JASA</h1>  
            <div class="panel panel-inverse">
              <div class="panel-heading">
                <h4 class="panel-title"></h4>
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
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                                                <span class="d-sm-none">Umum</span>
                                                <span class="d-sm-block d-none">Umum</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                                                <span class="d-sm-none">Penjualan / Pembelian</span>
                                                <span class="d-sm-block d-none">Penjualan / Pembelian</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">
                                                <span class="d-sm-none">Akun COA</span>
                                                <span class="d-sm-block d-none">Akun COA</span>
                                                </a>
                                            </li>                                            
                                        </ul>


    <div class="tab-content bg-white-transparent-2 p-3">
    
        <div class="tab-pane fade active show" id="default-tab-1">
                <div class="accordion" id="accordion">
                    <div class="panel-body">
                        <div class="table-responsive">
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
                <tr><td>Type <?php echo form_error('type') ?></td>
                <td>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input detail" type="radio" id="type2" name="type" value="Non Persediaan" <?php echo $type == 'Non Persediaan' ? 'checked' : 'null' ?>>
                    <label class="form-check-label" for="type2">Non Persediaan / Consumable</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input detail" type="radio" id="type3" name="type" value="Service" <?php echo $type == 'Service' ? 'checked' : 'null' ?>>
                    <label class="form-check-label" for="type3">Service / Jasa</label>
                  </div>
                </td>
              </tr>


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
                <!-- <tr><td >Estimasi Harga <?php echo form_error('estimasi_harga') ?></td><td>
              <input type="hidden" class="form-control" name="estimasi_harga" id="estimasi_harga" placeholder="Estimasi Harga" value="<?php echo $estimasi_harga; ?>" />
              <input type="text" class="form-control" name="estimasi_harga_txt" id="estimasi_harga_txt" placeholder="Estimasi Harga" value="<?php echo $estimasi_harga; ?>" />
            </td></tr> -->
            </thead>
            </table>
        
                    </div>
                </div>
            </div>
        </div>

    <div class="tab-pane fade" id="default-tab-2">
        <div class="accordion" id="accordion">
            <div class="panel-body">
                <h4 style="text-align: left;">Informasi Penjualan</h4>
                <div class="table-responsive">
                    <table class="table  table-bordered table-hover table-td-valign-middle">
                        <thead>
                        <tr><td >Harga Jual <?php echo form_error('estimasi_harga') ?></td><td>
                            <input type="hidden" class="form-control" name="estimasi_harga" id="estimasi_harga" placeholder="Estimasi Harga" value="<?php echo $estimasi_harga; ?>" />
                            
                          <input type="text" class="form-control" name="estimasi_harga_txt" id="estimasi_harga_txt" placeholder="Harga Jual" value="<?php echo $estimasi_harga; ?>" />
                        </td></tr>
                        <tr><td >Diskon <?php echo form_error('diskon') ?></td><td>
                          <input type="text" class="form-control" name="estimasi_harga_txt" id="estimasi_harga_txt" placeholder="Diskon dalam %" value="" />
                        </td></tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="panel-body">
                <h4 style="text-align: left;">Informasi Pembelian</h4>
                <div class="box-body" style="overflow-x: scroll; ">
                    <table class="table table-bordered table-hover table-td-valign-middle text-white">
                         <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Supplier</th>
                                <th>Estimasi Harga</th>
                            </tr>
                        </thead>
                    </table>    
                </div>
            </div>            
        </div>
    </div>

    <div class="tab-pane fade" id="default-tab-3">
        <div class="accordion" id="accordion">
            <div class="panel-body">
                <h4 style="text-align: center;" id="note">Untuk menampilkan data akun COA silahkan pilih type barang & jasa</h4>
                <div class="table-responsive">
                    <table class="table  table-bordered table-hover table-td-valign-middle">
                        <thead>
                            <tr id="akun_beban">
                                <td >Akun Beban <?php echo form_error('estimasi_harga') ?></td>
                                <td>
                                   
                                </td>
                                <td>
                                  <input type="text" class="form-control" name="estimasi_harga_txt" id="estimasi_harga_txt" placeholder="Nama COA" value="" readonly="" />
                                </td>
                            </tr>

                            <tr id="akun_return_pembelian">
                                <td >Akun Return Pembelian <?php echo form_error('estimasi_harga') ?></td>
                                <td>
                                   
                                </td>
                                <td>
                                  <input type="text" class="form-control" name="estimasi_harga_txt" id="estimasi_harga_txt" placeholder="Nama COA" value="" readonly=""/>
                                </td>
                            </tr>

                            <tr id="akun_penjualan">
                                <td >Akun Penjualan <?php echo form_error('estimasi_harga') ?></td>
                                <td>
                                   
                                </td>
                                <td>
                                  <input type="text" class="form-control" name="estimasi_harga_txt" id="estimasi_harga_txt" placeholder="Nama COA" value="" readonly="" />
                                </td>
                            </tr>

                            <tr id="akun_return_penjualan">
                                <td >Akun Return Penjualan <?php echo form_error('estimasi_harga') ?></td>
                                <td>
                                   
                                </td>
                                <td>
                                  <input type="text" class="form-control" name="estimasi_harga_txt" id="estimasi_harga_txt" placeholder="Nama COA" value="" readonly="" />
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div style="float: right;">
        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>" /> 
        <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button> 
        <a href="<?php echo site_url('item') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
    </form>
    </div>


    </div>
        </div>
    </div>
    </div>
</div>


        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
<script>
  $(document).ready(function() {
    //Regex nilai uang
    $('#estimasi_harga_txt').keyup(function() {
      var jumlah = $(this).val();
      $('#estimasi_harga').val(jumlah.replace(/\,/g, '', ));
      $('#estimasi_harga_txt').val(number_format(jumlah));
    });
    // Show dan hidden akun coa
        $('#note').show(); 
        $('#akun_beban').hide(); 
        $('#akun_return_pembelian').hide();
        $('#akun_penjualan').hide();
        $('#akun_return_penjualan').hide();
        $(".detail").click(function(){
                if ($("input[name='type']:checked").val() == "Non Persediaan" ) { 
                    $('#note').hide(); 
                    $('#akun_beban').show(); 
                    $('#akun_return_pembelian').show();
                    $('#akun_penjualan').hide();
                    $('#akun_return_penjualan').hide();
                } else {
                    $('#note').hide(); 
                    $('#akun_beban').hide(); 
                    $('#akun_return_pembelian').hide();
                    $('#akun_penjualan').show();
                    $('#akun_return_penjualan').show();
                }
            });



  });
</script>