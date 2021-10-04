
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
                                            <li class="nav-item informasi_penjualan_pembelian">
                                                <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                                                <span class="d-sm-none">Penjualan / Pembelian</span>
                                                <span class="d-sm-block d-none">Penjualan / Pembelian</span>
                                                </a>
                                            </li>
                                            <li class="nav-item daftar_coa">
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
                <tr><td style="vertical-align: middle;" >Kode Internal Item <?php echo form_error('kd_internal_item') ?></td><td>
                <?php if ($button=='Create') { ?>
                            <input type="text" readonly="" class="form-control" name="kd_internal_item" id="kd_internal_item" placeholder="Kd Internal Item" value="<?= $kodeunik ?>"  />
                          <?php }else{ ?>
                            <input type="text" readonly="" class="form-control" name="kd_internal_item" id="kd_internal_item" placeholder="Kd Internal Item" value="<?php echo $kd_internal_item; ?>" />
                          <?php } ?>
              </td></tr>
                <tr><td style="vertical-align: middle;" >Type <?php echo form_error('type') ?></td>
                <td>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input detail" type="radio" id="type2" name="type" value="Non Persediaan" <?php echo $type == 'Non Persediaan' ? 'checked' : 'checked' ?>>
                    <label class="form-check-label" for="type2">Non Persediaan / Consumable</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input detail" type="radio" id="type3" name="type" value="Service" <?php echo $type == 'Service' ? 'checked' : 'null' ?>>
                    <label class="form-check-label" for="type3">Service / Jasa</label>
                  </div>
                </td>
              </tr>


                <tr><td  style="vertical-align: middle;" >Nama Item <?php echo form_error('nama_item') ?></td><td><input type="text" class="form-control" name="nama_item" id="nama_item" placeholder="Nama Item" value="<?php echo $nama_item; ?>" /></td></tr>
                <tr>
                    <td  style="vertical-align: middle;" >Kategori <?php echo form_error('kategori_id') ?></td>
                    <td>
                        <div class="col-md-4">
                        <select name="kategori_id" class="form-control theSelect">
                        <option value="">-- Pilih -- </option>
                        <?php foreach ($kategori as $key => $data) { ?>
                          <?php if ($kategori_id == $data->kategori_id) { ?>
                            <option value="<?php echo $data->kategori_id ?>" selected><?php echo $data->nama_kategori ?></option>
                          <?php } else { ?>
                            <option value="<?php echo $data->kategori_id ?>"><?php echo $data->nama_kategori ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                  </div></td>
                  </tr>
                 <tr>
                    <td  style="vertical-align: middle;" >Unit <?php echo form_error('unit_id') ?></td>
                    <td><div class="col-md-4">
                        <select name="unit_id" class="form-control theSelect">
                        <option value="">-- Pilih -- </option>
                        <?php foreach ($unit as $key => $data) { ?>
                          <?php if ($unit_id == $data->unit_id) { ?>
                            <option  value="<?php echo $data->unit_id ?>" selected><?php echo $data->nama_unit ?></option>
                          <?php } else { ?>
                            <option value="<?php echo $data->unit_id ?>"><?php echo $data->nama_unit ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                  </div></td>
                  </tr>
                <tr><td  style="vertical-align: middle;"  >Deskripsi <?php echo form_error('deskripsi') ?></td><td> <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea></td></tr>
            </thead>
            </table>
        
                    </div>
                </div>
            </div>
        </div>

    <div class="tab-pane fade" id="default-tab-2">
        <div class="accordion" id="accordion">
            <div class="panel-body" id="informasi_penjualan">
                <h4 style="text-align: left;">Informasi Penjualan</h4>
                <div class="table-responsive">
                    <table class="table  table-bordered table-hover table-td-valign-middle">
                        <thead>
                        <tr><td style="width: 40%" >Estimasi Harga Jual <?php echo form_error('estimasi_harga') ?></td><td>
                            <input type="hidden" class="form-control" name="estimasi_harga" id="estimasi_harga" placeholder="Estimasi Harga" value="<?php echo $estimasi_harga; ?>" />
                            
                          <input type="text" class="form-control" name="estimasi_harga_txt" id="estimasi_harga_txt" placeholder="Harga Jual" value="<?php echo $estimasi_harga; ?>" />
                        </td></tr>
                        <tr><td style="width: 40%" >Default Diskon (%) <?php echo form_error('diskon') ?></td><td>
                          <input type="number" class="form-control" name="diskon" step="any" id="diskon" placeholder="Diskon dalam %" value="<?php echo $diskon; ?>" />
                        </td></tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="panel-body" id="informasi_pembelian">
                <h4 style="text-align: left;">Informasi Pembelian</h4>
                <div class="box-body" style="overflow-x: scroll; ">
                    
                    <!-- jika action update -->
                    <?php if ($this->uri->segment(2)=='update' || $this->uri->segment(2)=='update_action' ) { ?>
                        <div style="padding-bottom: 10px;">
                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah</a>
                    </div> 
                    <table class="table table-bordered" id="mydata">
                        <thead>
                            <tr>
                                <th style="width: 22%">Nama Supplier</th>
                                <th style="width: 22%">Kode Eksternal Supplier</th>
                                <th  style="width: 22%">Estimasi Harga</th>
                                <th  style="width: 22%">Update Tanggal</th>
                                <th  style="width: 12%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        </tbody>
                    </table>
                    <?php } else{ ?>
                        <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <td style="width: 22%">
                                            <select class="form-control" name="supplier_id[]">
                                                <option style="color: black" value="">-- Pilih -- </option>
                                                <?php  foreach ($supplier as $key => $data) { ?>
                                                    <option style="color: black" value="<?php echo $data->supplier_id ?>"><?php echo $data->nama_supplier ?></option>
                                                <?php } ?>
                                              </select>
                                        </td>
                                        <td style="width: 22%">
                                            <input type="text" name="kd_eksternal[]" class="form-control" placeholder="Kode barang supplier" />
                                        </td>
                                        <td style="width: 22%">
                                            <input type="number" name="estimasi_harga_supplier[]" class="form-control" placeholder="Estimasi Harga" />
                                        </td>
                                        <td style="width: 22%">
                                            <input type="date" name="update_tgl[]" class="form-control" placeholder="Tanngal Update" />
                                        </td>
                                        <td style="width: 12%"><button type="button" name="add_supplier_data" id="add_supplier_data" class="btn btn-success">Add</button></td>
                                     </tr>
                        </table>

                    <?php } ?>

                         
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
                            <tr id="akun_beban2">
                                <td  style="vertical-align: middle;"  >Akun Beban <?php echo form_error('akun_beban') ?></td>
                                <td>
                                  <select  class="form-control theSelect" name="akun_beban" id="akun_beban">
                                    <option value="">-- Pilih -- </option>
                                    <?php foreach ($coa as $key => $data) { ?>
                                      <?php if ($akun_beban == $data->coa_id) { ?>
                                        <option value="<?php echo $data->coa_id ?>" selected><?php echo $data->coa_name ?></option>
                                      <?php } else { ?>
                                        <option value="<?php echo $data->coa_id ?>"><?php echo $data->coa_name ?></option>
                                      <?php } ?>
                                    <?php } ?>
                                  </select>
                                </td>
                            </tr>

                            <tr id="akun_return_pembelian2">
                                <td  style="vertical-align: middle;"  >Akun Return Pembelian <?php echo form_error('akun_return_pembelian') ?></td>
                                <td>
                                  <select  class="form-control theSelect" name="akun_return_pembelian" id="akun_return_pembelian">
                                    <option value="">-- Pilih -- </option>
                                    <?php foreach ($coa as $key => $data) { ?>
                                      <?php if ($akun_return_pembelian == $data->coa_id) { ?>
                                        <option value="<?php echo $data->coa_id ?>" selected><?php echo $data->coa_name ?></option>
                                      <?php } else { ?>
                                        <option value="<?php echo $data->coa_id ?>"><?php echo $data->coa_name ?></option>
                                      <?php } ?>
                                    <?php } ?>
                                  </select>
                                </td>
                            </tr>

                            <tr id="akun_penjualan2">
                                <td >Akun Penjualan <?php echo form_error('akun_penjualan') ?></td>
                                <td>

                                <select  class="form-control theSelect" name="akun_penjualan" id="akun_penjualan">
                                    <option value="">-- Pilih -- </option>
                                    <?php foreach ($coa as $key => $data) { ?>
                                      <?php if ($akun_penjualan == $data->coa_id) { ?>
                                        <option value="<?php echo $data->coa_id ?>" selected><?php echo $data->coa_name ?></option>
                                      <?php } else { ?>
                                        <option value="<?php echo $data->coa_id ?>"><?php echo $data->coa_name ?></option>
                                      <?php } ?>
                                    <?php } ?>
                                  </select>

                                </td>
                            </tr>

                            <tr id="akun_return_penjualan2">
                                <td >Akun Return Penjualan <?php echo form_error('akun_return_penjualan') ?></td>
                                <td>
                                <select  class="form-control theSelect" name="akun_return_penjualan" id="akun_return_penjualan">
                                    <option value="">-- Pilih -- </option>
                                    <?php foreach ($coa as $key => $data) { ?>
                                      <?php if ($akun_return_penjualan == $data->coa_id) { ?>
                                        <option value="<?php echo $data->coa_id ?>" selected><?php echo $data->coa_name ?></option>
                                      <?php } else { ?>
                                        <option value="<?php echo $data->coa_id ?>"><?php echo $data->coa_name ?></option>
                                      <?php } ?>
                                    <?php } ?>
                                  </select>
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

        <!--MODAL Tambah-->
            <div class="modal fade" id="ModalaAdd">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Data</h4>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-hidden="true"></button>
                      </div>
                      <div class="modal-body">
                        <table class="table  table-bordered table-hover table-td-valign-middle text-black" style="border-color: #d3d3d3">
                        <thead>
                                <tr><td >Nama Supplier</td><td>
                                    <select style="border-color: #d3d3d3; color: black" class="form-control" name="supplier_id_modal" id="supplier_id_modal">
                                                <option style="color: black" value="">-- Pilih -- </option> 
                                                <?php  foreach ($supplier as $key => $data) { ?>
                                                    <option style="color: black" value="<?php echo $data->supplier_id ?>"><?php echo $data->nama_supplier ?></option>
                                                <?php } ?>
                                              </select>
                                </td></tr>

                                <tr><td >Kode Eksternal</td><td><input style="border-color: #d3d3d3; color: black" type="text" class="form-control" name="kd_eksternal_modal" id="kd_eksternal_modal" placeholder="Kode Eksternal" value="" /></td></tr>

                                <tr><td >Estimasi Harga</td><td><input style="border-color: #d3d3d3; color: black" type="number" class="form-control" name="estimasi_harga_supplier_modal" id="estimasi_harga_supplier_modal" placeholder="Estimasi Harga Supplier" value="" /></td></tr>

                                <tr><td >Update Tanggal</td><td><input style="border-color: #d3d3d3; color: black" type="date" class="form-control" name="update_tgl_modal" id="update_tgl_modal" placeholder="Update Tanggal" value="" /></td></tr>

                                <input style="border-color: #d3d3d3; color: black" type="hidden" class="form-control" name="item_id_modal" id="item_id_modal" placeholder="" value="<?= decrypt_url($this->uri->segment(3) )?>" />
                        </thead>
                </table>

                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-white" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-success" id="btn_simpan"> Simpan</button>
                  </div>
                      </div>

                    </div>
                  </div>
                </div>
        <!--END MODAL Tambah-->

        <!--MODAL EDIT-->
                <div class="modal fade" id="ModalaEdit">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Edit Data</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                      </div>
                      <div class="modal-body">
                        <div class="modal-body">
                        <table class="table  table-bordered table-hover table-td-valign-middle text-black" style="border-color: #d3d3d3">
                        <thead>
                            <tr><td >Nama Supplier</td><td>
                                    <select style="border-color: #d3d3d3; color: black" class="form-control" name="supplier_id_modal_edit" id="supplier_id_modal_edit">
                                                <option style="color: black" value="">-- Pilih -- </option> 
                                                <?php  foreach ($supplier as $key => $data) { ?>
                                                    <option style="color: black" value="<?php echo $data->supplier_id ?>"><?php echo $data->nama_supplier ?></option>
                                                <?php } ?>
                                              </select>
                                </td></tr>

                                <tr><td >Kode Eksternal</td><td><input style="border-color: #d3d3d3; color: black" type="text" class="form-control" name="kd_eksternal_modal_edit" id="kd_eksternal_modal_edit" placeholder="Kode Eksternal" value="" /></td></tr>

                                <tr><td >Estimasi Harga</td><td><input style="border-color: #d3d3d3; color: black" type="number" class="form-control" name="estimasi_harga_supplier_modal_edit" id="estimasi_harga_supplier_modal_edit" placeholder="Estimasi Harga Supplier" value="" /></td></tr>

                                <tr><td >Update Tanggal</td><td><input style="border-color: #d3d3d3; color: black" type="date" class="form-control" name="update_tgl_modal_edit" id="update_tgl_modal_edit" placeholder="Update Tanggal" value="" /></td></tr>

                                <input style="border-color: #d3d3d3; color: black" type="hidden" class="form-control" name="item_supplier_id_model_edit" id="item_supplier_id_model_edit" placeholder="" value="" />                                
                                <input style="border-color: #d3d3d3; color: black" type="hidden" class="form-control" name="item_id_modal_edit" id="item_id_modal_edit" placeholder="" value="" />

                        </thead>
                </table>

                  </div>
                      </div>
                      <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                        <button class="btn btn-success" id="btn_update"> Update</button>
                      </div>
                    </div>
                  </div>
                </div>
        <!--END MODAL EDIT-->



        <!--MODAL HAPUS-->
            <div class="modal fade" id="ModalHapus">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Data Item Supplier</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus item Supplier?</p></div>

                  </div>
                  <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                    <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                  </div>
                </div>
              </div>
            </div>

        <!--END MODAL HAPUS-->

        



<script>
  $(document).ready(function() {

    $(".theSelect").select2();
    $(".theSelect2").select2();
    //Get Hapus supplier item
    //GET HAPUS
        $('#show_data').on('click','.data_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });
    
    //Regex nilai uang
    $('#estimasi_harga_txt').keyup(function() {
      var jumlah = $(this).val();
      $('#estimasi_harga').val(jumlah.replace(/\,/g, '', ));
      $('#estimasi_harga_txt').val(number_format(jumlah));
    });
    // Show dan hidden akun coa
        $('#note').show(); 
        $('#akun_beban2').hide(); 
        $('#akun_return_pembelian2').hide();
        $('#akun_penjualan2').hide();
        $('#akun_return_penjualan2').hide();
        $(".detail").click(function(){
                if ($("input[name='type']:checked").val() == "Non Persediaan" ) { 
                    $('#note').hide(); 
                    $('#akun_beban2').show(); 
                    $('#akun_return_pembelian2').show();
                    $('#akun_penjualan2').hide();
                    $('#akun_return_penjualan2').hide();
                } else {
                    $('#note').hide(); 
                    $('#akun_beban2').hide(); 
                    $('#akun_return_pembelian2').hide();
                    $('#akun_penjualan2').show();
                    $('#akun_return_penjualan2').show();
                }
            });

        $(".daftar_coa").click(function(){
                if ($("input[name='type']:checked").val() == "Non Persediaan" ) { 
                    $('#note').hide(); 
                    $('#akun_beban2').show(); 
                    $('#akun_return_pembelian2').show();
                    $('#akun_penjualan2').hide();
                    $('#akun_return_penjualan2').hide();
                } else {
                    $('#note').hide(); 
                    $('#akun_beban2').hide(); 
                    $('#akun_return_pembelian2').hide();
                    $('#akun_penjualan2').show();
                    $('#akun_return_penjualan2').show();
                }
            });

        $(".informasi_penjualan_pembelian").click(function(){
                if ($("input[name='type']:checked").val() == "Non Persediaan" ) { 
                    $('#informasi_penjualan').hide();
                    $('#informasi_pembelian').show();
                } else {
                    $('#informasi_penjualan').show();
                    $('#informasi_pembelian').hide();
                }
            });



  });
</script>
<script>
$(document).ready(function() {
    var i = 1;
    $('#add_supplier_data').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' + i +
            '"><td style="width:22%"><select class="form-control" name="supplier_id[]"><option style="color: black" value="">-- Pilih -- </option><?php foreach ($supplier as $key => $data) { ?><option style="color: black" value="<?php echo $data->supplier_id ?>"><?php echo $data->nama_supplier ?></option><?php } ?>
                </select></td><td style="width: 22%"><input type="text" name="kd_eksternal[]" class="form-control" placeholder="Kode barang supplier" /></td><td style="width: 22%"><input type="number" name="estimasi_harga_supplier[]" class="form-control" placeholder="Estimasi Harga" /></td><td style="width: 22%"><input type="date" name="update_tgl[]" class="form-control" placeholder="Tanngal Update" /></td><td style="width: 12%"><button type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });

});


</script>




<script type="text/javascript">
    $(document).ready(function(){

        tampilkan_data();   
          
        //fungsi tampil data
        function tampilkan_data(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url()?>Item_supplier/data/<?= decrypt_url($this->uri->segment(3) )?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].nama_supplier+'</td>'+
                                '<td>'+data[i].kd_eksternal+'</td>'+
                                '<td>'+data[i].estimasi_harga_supplier+'</td>'+
                                '<td>'+data[i].update_tgl+'</td>'+
                                '<td>'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].item_supplier_id+'"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs data_hapus" data="'+data[i].item_supplier_id+'"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }

        //Simpan Barang
        $('#btn_simpan').on('click',function(){
            var supplier_id_modal=$('#supplier_id_modal').val();
            var kd_eksternal_modal=$('#kd_eksternal_modal').val();
            var estimasi_harga_supplier_modal=$('#estimasi_harga_supplier_modal').val();
            var update_tgl_modal=$('#update_tgl_modal').val();
            var item_id_modal=$('#item_id_modal').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Item_supplier/simpan_data')?>",
                dataType : "JSON",
                data : {item_id_modal:item_id_modal,update_tgl_modal:update_tgl_modal , estimasi_harga_supplier_modal:estimasi_harga_supplier_modal, kd_eksternal_modal:kd_eksternal_modal,supplier_id_modal:supplier_id_modal},
                success: function(data){
                    // $('[name="pelanggan_id"]').val("");
                    $('[name="supplier_id_modal"]').val("");
                    $('[name="kd_eksternal_modal"]').val("");
                    $('[name="estimasi_harga_supplier_modal"]').val("");
                    $('[name="update_tgl_modal"]').val("");
                    // $('[name="item_id_modal"]').val("");
                    $('#ModalaAdd > div > div > div.modal-header > button').click();
                    tampilkan_data();
                }
            });
            return false;
        });


        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('Item_supplier/get_data')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(item_supplier_id,item_id,supplier_id,kd_eksternal,estimasi_harga_supplier,update_tgl){
                        $('#ModalaEdit').modal('show');
                        $('[name="item_supplier_id_model_edit"]').val(data.item_supplier_id);
                        $('[name="item_id_modal_edit"]').val(data.item_id);
                        $('[name="supplier_id_modal_edit"]').val(data.supplier_id);
                        $('[name="kd_eksternal_modal_edit"]').val(data.kd_eksternal);
                        $('[name="estimasi_harga_supplier_modal_edit"]').val(data.estimasi_harga_supplier);
                        $('[name="update_tgl_modal_edit"]').val(data.update_tgl);
                        
                    });
                }
            });
            return false;
        });

        //Update data
        $('#btn_update').on('click',function(){
            var item_supplier_id_model_edit=$('#item_supplier_id_model_edit').val();
            var supplier_id_modal_edit=$('#supplier_id_modal_edit').val();
            var item_id_modal_edit=$('#item_id_modal_edit').val();
            var kd_eksternal_modal_edit=$('#kd_eksternal_modal_edit').val();
            var estimasi_harga_supplier_modal_edit=$('#estimasi_harga_supplier_modal_edit').val();
            var update_tgl_modal_edit=$('#update_tgl_modal_edit').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Item_supplier/update_data')?>",
                data : {
                    item_supplier_id_model_edit:item_supplier_id_model_edit,
                    supplier_id_modal_edit:supplier_id_modal_edit,
                    item_id_modal_edit:item_id_modal_edit,
                    kd_eksternal_modal_edit:kd_eksternal_modal_edit,
                    estimasi_harga_supplier_modal_edit:estimasi_harga_supplier_modal_edit,
                    update_tgl_modal_edit:update_tgl_modal_edit
                },
                success: function(data){
                    $('[name="item_supplier_id_model_edit"]').val("");
                    $('[name="supplier_id_modal_edit"]').val("");
                    $('[name="item_id_modal_edit"]').val("");
                    $('[name="kd_eksternal_modal_edit"]').val("");
                    $('[name="estimasi_harga_supplier_modal_edit"]').val("");
                    $('[name="update_tgl_modal_edit"]').val("");

                    $('#ModalaEdit').modal('hide');
                    tampilkan_data();
                }
            });
            return false;
        });


        //GET HAPUS
        $('#show_data').on('click','.data_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('Item_supplier/hapus')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){

                            $('#ModalHapus > div > div > div.modal-header > button').click();
                            tampilkan_data();
                    }
                });
                return false;
            });
 
    });
 
</script>
