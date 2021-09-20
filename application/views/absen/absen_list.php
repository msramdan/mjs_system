<div id="content" class="app-content">
            <div class="panel panel-inverse">
              <div class="panel-heading">
                <h4 class="panel-title">List Data Absen </h4>
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
                                        <h4 style="color: red">Data absen tanggal : </h4>
                                        <div class='col-md-12 pull-right'>
                                             <div class='col-md-2' style="float: left;margin-left: 5px; margin-right: 5px; margin-top: 5px; margin-bottom: 20px">
                                                <select name='tgl' class='form-control'>
                                                    <option>-- Pilih --</option>
                                                </select>
                                            </div>
                                            <div class='col-md-3' style="float: left;margin-left: 5px; margin-right: 5px; margin-top: 5px; margin-bottom: 20px">
                                                <select name='tgl' class='form-control'>
                                                    <option>-- Pilih --</option>
                                                </select>
                                            </div>
                                            <div class='col-md-2' style="float: left;margin-left: 5px; margin-right: 5px; margin-top: 5px; margin-bottom: 20px">
                                                <select name='tgl' class='form-control'>
                                                    <option>-- Pilih --</option>
                                                </select>
                                            </div>
                                            <div class='col-md-2' style="float: left;margin-left: 5px; margin-right: 5px; margin-top: 5px; margin-bottom: 20px">
                                                <input name='lihat' class='btn btn-success' type='submit' value='Lihat Absen'>
                                        </div>
        </div>    
        <div class="box-body" style="overflow-x: scroll; ">
        <table id="" class="table table-bordered table-hover table-td-valign-middle text-white">
         <thead>
            <tr>
        <th width="1%">No</th>
        <th>NIK</th>
		<th>Nama Karyawan</th>
        <th>No Hp</th>
		<th>Action</th>
            </tr></thead><tbody><?php $no = 1;
            foreach ($karyawan as $karyawan)
            {
                ?>
                <tr>
			<td><?= $no++?></td>
            <td><?php echo $karyawan->nik ?></td>
			<td><?php echo $karyawan->nama_karyawan ?></td>
            <td><?php echo $karyawan->no_hp ?></td>
			<td style="text-align:center">
                <div class="form-group">
                    <select class="form-control">
                      <option  style="color: black">Masuk</option>
                      <option  style="color: black">Sakit</option>
                      <option  style="color: black">Izin</option>
                      <option  style="color: black">Cuti</option>
                      <option  style="color: black">Alfa</option>
                    </select>
                  </div>

			</td>
		</tr>
                <?php } ?>
            </tbody>
        </table>
        <a style="margin: 5px; float: right;" href="<?php echo site_url('absen') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a></td></tr>
         <button type="submit" class="btn btn-danger" style="margin: 5px; float: right;"><i class="fas fa-save"></i> Simpan Data</button>
                
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