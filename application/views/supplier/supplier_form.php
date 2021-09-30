
<style type="text/css">
    #tengah {
    vertical-align: middle;
}
</style>
<div id="content" class="app-content">
            <h1 class="page-header">KELOLA DATA SUPPLIER</h1>  
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
                                                <span class="d-sm-none">Penjualan</span>
                                                <span class="d-sm-block d-none">Penjualan</span>
                                                </a>
                                            </li>
                                            <?php if ($this->uri->segment(2) =="update" || $this->uri->segment(2) =="update_action") { ?>
                                                <li class="nav-item">
                                                    <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">
                                                    <span class="d-sm-none">Kontak</span>
                                                    <span class="d-sm-block d-none">Kontak</span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                            
                                        </ul>


    <div class="tab-content bg-white-transparent-2 p-3">
    <div class="tab-pane fade active show" id="default-tab-1">
        <div class="accordion" id="accordion">
            <div class="panel-body">
                <div class="table-responsive">
                    <!-- form -->
                    <form action="<?php echo $action; ?>" method="post">
                        <table class="table  table-bordered table-hover table-td-valign-middle">
                            <thead>
                                <tr><td id="tengah">Kode Supplier <?php echo form_error('kode_supplier') ?></td><td>
                                      <?php if ($button=='Create') { ?>
                                        <input type="text" readonly="" class="form-control" name="kode_supplier" id="kode_supplier" placeholder="Kode Supplier" value="<?= $kodeunik ?>"  />
                                      <?php }else{ ?>
                                        <input type="text" readonly="" class="form-control" name="kode_supplier" id="kode_supplier" placeholder="Kode Supplier" value="<?php echo $kode_supplier; ?>" />
                                      <?php } ?>                                    
                                    </td></tr>

                                <tr><td  id="tengah" >Nama Supplier <?php echo form_error('nama_supplier') ?></td><td><input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="Nama Supplier" value="<?php echo $nama_supplier; ?>" /></td></tr>
                                
                                <tr><td  id="tengah" >Alamat <?php echo form_error('alamat') ?></td><td> <textarea class="form-control" rows="3" name="alamat" id="wysihtml5" placeholder="Alamat"><?php echo $alamat; ?></textarea></td></tr>

                               <tr><td  id="tengah" >Kota / Provinsi / Kode POS</td><td>
                                    <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-4">
                                        <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
                                        <?php echo form_error('kota') ?>
                                      </div>
                                      <div class="col-md-4">
                                        <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" />
                                        <?php echo form_error('provinsi') ?>
                                      </div>
                                      <div class="col-md-4">
                                        <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="<?php echo $kode_pos; ?>" />
                                        <?php echo form_error('kode_pos') ?>
                                      </div>
                                    </div>
                                  </div>
                                </td></tr>

                                <tr><td  id="tengah" >Telepon <?php echo form_error('telepon') ?></td><td><input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" /></td></tr>

                                <tr><td  id="tengah" >Personal Kontak <?php echo form_error('personal_kontak') ?></td><td><input type="text" class="form-control" name="personal_kontak" id="personal_kontak" placeholder="Personal Kontak" value="<?php echo $personal_kontak; ?>" /></td></tr>

                                <tr><td  id="tengah" >Email <?php echo form_error('email') ?></td><td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td></tr>

                                <tr><td  id="tengah" >Halaman Web <?php echo form_error('halaman_web') ?></td><td><input type="text" class="form-control" name="halaman_web" id="halaman_web" placeholder="Halaman Web" value="<?php echo $halaman_web; ?>" /></td></tr>
                                
                                <tr><td  id="tengah" >Catatan <?php echo form_error('catatan') ?></td><td> <textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Catatan"><?php echo $catatan; ?></textarea></td></tr>
                                <input type="hidden" name="supplier_id" value="<?php echo $supplier_id; ?>" /> 

                            </thead>
                        </table>
                   


                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="default-tab-2">
        <div class="accordion" id="accordion">
            <h4 style="text-align: left;">Informasi Pajak</h4>
            <div class="table-responsive">
                    <table class="table  table-bordered table-hover table-td-valign-middle">
                        <thead>
                        <tr>
                                <td >Pajak <?php echo form_error('pajak_id') ?></td>
                                <td>
                                  <select  class="form-control theSelect" name="pajak_id" id="pajak_id">
                                    <option value="">-- Pilih -- </option>
                                    <?php foreach ($pajak as $key => $data) { ?>
                                      <?php if ($pajak_id == $data->pajak_id) { ?>
                                        <option value="<?php echo $data->pajak_id ?>" selected><?php echo $data->nama ?></option>
                                      <?php } else { ?>
                                        <option value="<?php echo $data->pajak_id ?>"><?php echo $data->nama ?></option>
                                      <?php } ?>
                                    <?php } ?>
                                  </select>
                                </td>
                            </tr>

                        <tr><td >NPWP Pelanggan <?php echo form_error('npwp') ?></td><td>
                          <input type="text" class="form-control" name="npwp" id="npwp" placeholder="NPWP Pelanggan" value="<?php echo $npwp; ?>" />
                        </td></tr>
                        </thead>
                    </table>
                </div>
        </div>
    </div>

    <div class="tab-pane fade" id="default-tab-3">
        <div class="accordion" id="accordion">
            <div class="panel-body">
                <div style="padding-bottom: 10px;">
                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah</a>
                </div>                    
                <table class="table table-striped table-sm" id="mydata">
                     <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Title Jabatan</th>
                            <th>Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">                 
                    </tbody>
                </table>

            </div>
        </div>
        </div>

        <div style="float: right;">
        <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button> 
        <a href="<?php echo site_url('supplier') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
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
                                <tr><td >Nama</td><td><input style="border-color: #d3d3d3; color: black" type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="" /></td></tr>

                                <tr><td >Title Jabatan</td><td><input style="border-color: #d3d3d3; color: black" type="text" class="form-control" name="title_jabatan" id="title_jabatan" placeholder="Title Jabatan" value="" /></td></tr>

                                <tr><td >Telepon</td><td><input style="border-color: #d3d3d3; color: black" type="text" class="form-control" name="telepon_kontak" id="telepon_kontak" placeholder="Telepon" value="" /></td></tr>

                                <input style="border-color: #d3d3d3; color: black" type="hidden" class="form-control" name="supplier_id" id="supplier_id" placeholder="Telepon" value="<?= decrypt_url($this->uri->segment(3) )?>" />
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
                                <input style="border-color: #d3d3d3; color: black" type="hidden" class="form-control" name="kontak_supplier_id2" id="kontak_supplier_id2" placeholder="Nama" value="" />

                                <tr><td >Nama</td><td><input style="border-color: #d3d3d3; color: black" type="text" class="form-control" name="nama2" id="nama2" placeholder="Nama" value="" /></td></tr>

                                <tr><td >Title Jabatan</td><td><input style="border-color: #d3d3d3; color: black" type="text" class="form-control" name="title_jabatan2" id="title_jabatan2" placeholder="Title Jabatan" value="" /></td></tr>

                                <tr><td >Telepon</td><td><input style="border-color: #d3d3d3; color: black" type="text" class="form-control" name="telepon2" id="telepon2" placeholder="Telepon" value="" /></td></tr>

                                <input style="border-color: #d3d3d3; color: black" type="hidden" class="form-control" name="supplier_id2" id="supplier_id2" placeholder="supplier_id2" value="" />

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
                    <h4 class="modal-title">Data Kontak Pelanggan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus kontak ini?</p></div>

                  </div>
                  <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                    <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                  </div>
                </div>
              </div>
            </div>

        <!--END MODAL HAPUS-->




<script type="text/javascript">
    $(document).ready(function(){
        $(".theSelect").select2();
        tampil_data_kontak();   //pemanggilan fungsi tampil data.
         
        // $('#mydata').dataTable();
          
        //fungsi tampil data
        function tampil_data_kontak(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url()?>kontak_supplier/data/<?= decrypt_url($this->uri->segment(3) )?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].title_jabatan+'</td>'+
                                '<td>'+data[i].telepon+'</td>'+
                                '<td>'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].kontak_supplier_id+'"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs data_hapus" data="'+data[i].kontak_supplier_id+'"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }

        //Simpan Barang
        $('#btn_simpan').on('click',function(){
            var supplier_id=$('#supplier_id').val();
            var nama=$('#nama').val();
            var title_jabatan=$('#title_jabatan').val();
            var telepon=$('#telepon_kontak').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('kontak_supplier/simpan_data')?>",
                dataType : "JSON",
                data : {supplier_id:supplier_id,nama:nama , title_jabatan:title_jabatan, telepon:telepon},
                success: function(data){
                    // $('[name="supplier_id"]').val("");
                    $('[name="nama"]').val("");
                    $('[name="title_jabatan"]').val("");
                    $('[name="telepon_kontak"]').val("");
                    $('#ModalaAdd > div > div > div.modal-header > button').click();
                    tampil_data_kontak();
                }
            });
            return false;
        });


        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('kontak_supplier/get_data')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(kontak_supplier_id,supplier_id,nama, title_jabatan, telepon){
                        $('#ModalaEdit').modal('show');
                        $('[name="kontak_supplier_id2"]').val(data.kontak_supplier_id);
                        $('[name="supplier_id2"]').val(data.supplier_id);
                        $('[name="nama2"]').val(data.nama);
                        $('[name="title_jabatan2"]').val(data.title_jabatan);
                        $('[name="telepon2"]').val(data.telepon);
                    });
                }
            });
            return false;
        });

        //Update data
        $('#btn_update').on('click',function(){
            var kontak_supplier_id2=$('#kontak_supplier_id2').val();
            var supplier_id2=$('#supplier_id2').val();
            var nama2=$('#nama2').val();
            var title_jabatan2=$('#title_jabatan2').val();
            var telepon2=$('#telepon2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('kontak_supplier/update_data')?>",
                data : {
                    kontak_supplier_id2:kontak_supplier_id2,
                    supplier_id2:supplier_id2,
                    nama2:nama2,
                    title_jabatan2:title_jabatan2,
                    telepon2:telepon2
                },
                success: function(data){
                    $('[name="kontak_supplier_id2"]').val("");
                    $('[name="nama2"]').val("");
                    $('[name="title_jabatan2"]').val("");
                    $('[name="telepon2"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_kontak();
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
            url  : "<?php echo base_url('kontak_supplier/hapus')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){

                            $('#ModalHapus > div > div > div.modal-header > button').click();
                            tampil_data_kontak();
                    }
                });
                return false;
            });
 
    });
 
</script>