
<style type="text/css">
    #tengah {
    vertical-align: middle;
}
</style>
<div id="content" class="app-content">
            <h1 class="page-header">KELOLA DATA PELANGGAN</h1>  
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
                                            <li class="nav-item">
                                                <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">
                                                <span class="d-sm-none">Kontak</span>
                                                <span class="d-sm-block d-none">Kontak</span>
                                                </a>
                                            </li>
                                        </ul>


    <div class="tab-content bg-white-transparent-2 p-3">
    <div class="tab-pane fade active show" id="default-tab-1">
        <div class="accordion" id="accordion">
            <div class="panel-body">
        <div class="table-responsive">
        <form action="<?php echo $action; ?>" method="post">
         <table class="table table-bordered table-hover table-td-valign-middle">
            <thead>
                <tr><td id="tengah" >Kode Pelanggan <?php echo form_error('kode_pelanggan') ?></td><td><input type="text" class="form-control" name="kode_pelanggan" id="kode_pelanggan" placeholder="Kode Pelanggan" value="<?php echo $kode_pelanggan; ?>" /></td></tr>
                <tr><td  id="tengah" >Nama Pelanggan* <?php echo form_error('nama_pelanggan') ?></td><td><input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama Pelanggan" value="<?php echo $nama_pelanggan; ?>" /></td></tr>
                
                <tr><td id="tengah" >Alamat <?php echo form_error('alamat') ?></td><td> <textarea class="form-control" id="wysihtml5" rows="5" name="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td></tr>

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

                <tr><td  id="tengah">Email <?php echo form_error('email') ?></td><td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td></tr>

                <tr><td  id="tengah" >Halaman Web <?php echo form_error('halaman_web') ?></td><td><input type="text" class="form-control" name="halaman_web" id="halaman_web" placeholder="Halaman Web" value="<?php echo $halaman_web; ?>" /></td></tr>
                
                <tr><td >Catatan <?php echo form_error('catatan') ?></td><td> <textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Catatan"><?php echo $catatan; ?></textarea></td></tr>

                <tr><td  id="tengah"></td><td  id="tengah"><input type="hidden" name="pelangan_id" value="<?php echo $pelangan_id; ?>" /> 
                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button> 
                <a href="<?php echo site_url('pelanggan') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a></td></tr>
            </thead>
    </table>
</form>
</div>
</div>
        </div>
    </div>

    <div class="tab-pane fade" id="default-tab-2">
        <div class="accordion" id="accordion">
            2
        </div>
    </div>

    <div class="tab-pane fade" id="default-tab-3">
        <div class="accordion" id="accordion">
                <div class="panel-body">
                    <div style="padding-bottom: 10px;">
                        <button class="btn btn-danger btn-sm tambah_data"><i class="fas fa-plus-square" aria-hidden="true"></i> Create</button>
                </div>
                    
                        <table class="table table-bordered table-sm">
         <thead>
            <tr>
                <th>Nama</th>
                <th>Title Jabatan</th>
                <th>Telepon</th>
            </tr>
        </thead>
            <tbody>
            </tbody>
        </table>
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
        </div>
        </div>