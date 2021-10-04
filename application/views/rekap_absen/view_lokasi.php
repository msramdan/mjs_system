<style>
    
    .select-form-bulanan-1, .select-form-bulanan-2, .select-form-nya
    {
        display: none;
    }

    .showed
    {
        display: inline-block !important;
    }

</style>

<div id="content" class="app-content">
            <div class="panel panel-inverse">
              <div class="panel-heading">
                <h4 class="panel-title">List Data lokasi </h4>
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

        </div>    
        <div class="box-body" style="overflow-x: scroll; ">
        <table id="data-table-default" class="table table-bordered table-hover table-td-valign-middle text-white">
         <thead>
            <tr>
        <th width="1%">No</th>
		<th>Nama Categori Benefit</th>
		<th>Tahun</th>
        <th>Bulan</th>
            </tr></thead><tbody><?php $no = 1;
            foreach ($lokasi as $lokasi)
            {
                ?>
                <tr>
			<td><?= $no++?></td>
			<td><?php echo $lokasi->nama_lokasi ?></td>
			<td width="100px">
                <input type="hidden" name="lokasi_id" class="lokasi_id" value="<?php echo encrypt_url($lokasi->lokasi_id) ?>">
                <div class="input-group">
                    <?php
                        $arrtaun = [2019,2020,2021,2022,2023];
                    ?>
                    <select class="form-control select-form-nya" name="year">
                        <?php
                        foreach($arrtaun as $v) {
                            ?>
                                <option value="<?php echo $v ?>"><?php echo $v ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <div class="input-group-button">
                       <button class="btn btn-danger buttonnya btn-select-taun">
                           <i class="fas fa-list" aria-hidden="true"></i> Tahun
                       </button> 
                        <?php 
                        //    echo anchor(site_url('rekap_absen/rekap/'.encrypt_url($lokasi->lokasi_id)),'<i class="fas fa-list" aria-hidden="true"></i> Tahun','class="btn btn-success read_data"'); 
                        ?>
                    </div>
                </div>
			</td>
            <td width="200px">
                <input type="hidden" name="lokasi_id" class="lokasi_id" value="<?php echo encrypt_url($lokasi->lokasi_id) ?>">
                <div class="input-group">
                    <?php
                        $arrtaun = [2019,2020,2021,2022,2023];
                        $arrbulan = array(
                            'Januari' => 1,
                            'Februari' => 2,
                            'Maret' => 3,
                            'April' => 4,
                            'Mei' => 5,
                            'Juni' => 6,
                            'Juli' => 7,
                            'Agustus' => 8,
                            'September' => 9,
                            'Oktober' => 10,
                            'November' => 11,
                            'Desember' => 12
                        );
                    ?>
                    <select class="form-control select-form-bulanan-1" name="month">
                        <?php
                        foreach($arrbulan as $key => $v) {
                            ?>
                                <option value="<?php echo $v ?>"><?php echo $key ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select class="form-control select-form-bulanan-2" name="year">
                        <?php
                        foreach($arrtaun as $v) {
                            ?>
                                <option value="<?php echo $v ?>"><?php echo $v ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <div class="input-group-button">
                       <button class="btn btn-primary buttonnya btn-select-bulan">
                           <i class="fas fa-list" aria-hidden="true"></i> Bulan
                       </button> 
                        <?php 
                        //    echo anchor(site_url('rekap_absen/rekap/'.encrypt_url($lokasi->lokasi_id)),'<i class="fas fa-list" aria-hidden="true"></i> Tahun','class="btn btn-success read_data"'); 
                        ?>
                    </div>
                </div>
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

        <script type="text/javascript">
            
            $(document).ready(function() {
            
                $(document).on('click','.btn-select-taun', function(e) {

                    e.preventDefault()
                    $('.select-form-nya').removeClass('showed')
                    $('.select-form-bulanan-1').removeClass('showed')
                    $('.select-form-bulanan-2').removeClass('showed')

                    $('.btn-confirm-taun').replaceWith('<button class="btn btn-danger buttonnya btn-select-taun"><i class="fas fa-list" aria-hidden="true"></i> Tahun</button>')
                    $('.btn-confirm-bulan').replaceWith('<button class="btn btn-primary buttonnya btn-select-bulan"><i class="fas fa-list" aria-hidden="true"></i> Bulan</button> ')
                    $(this).parents('td').children('.input-group').find('.select-form-nya').addClass('showed')
                    $(this).replaceWith('<button class="btn btn-confirm-taun buttonnya btn-success"><i class="fas fa-check"></i></button>')
                })

                $(document).on('click','.btn-select-bulan', function(e) {

                    e.preventDefault()
                    $('.select-form-nya').removeClass('showed')
                    $('.select-form-bulanan-1').removeClass('showed')
                    $('.select-form-bulanan-2').removeClass('showed')


                    $('.btn-confirm-taun').replaceWith('<button class="btn btn-danger buttonnya btn-select-taun"><i class="fas fa-list" aria-hidden="true"></i> Tahun</button>')
                    $('.btn-confirm-bulan').replaceWith('<button class="btn btn-primary buttonnya btn-select-bulan"><i class="fas fa-list" aria-hidden="true"></i> Bulan</button> ')
                    $(this).parents('td').children('.input-group').find('.select-form-bulanan-1').addClass('showed')
                    $(this).parents('td').children('.input-group').find('.select-form-bulanan-2').addClass('showed')
                    $(this).replaceWith('<button class="btn btn-confirm-bulan buttonnya btn-success"><i class="fas fa-check"></i></button>')
                })

                $(document).on('click','.btn-confirm-taun', function() {

                    var lokasi_id = $(this).parents('td').find('.lokasi_id').val()
                    var tahun = $(this).parents('td').children('.input-group').find('.select-form-nya').val()

                    const url = "<?php echo base_url() ?>Rekap_absen/rekap_tahunan/" + lokasi_id + '/' + tahun

                    //alert(url)
                    window.location.href = url
                })

                $(document).on('click','.btn-confirm-bulan', function() {

                    var lokasi_id = $(this).parents('td').find('.lokasi_id').val()
                    var bulan = $(this).parents('td').children('.input-group').find('.select-form-bulanan-1').val()
                    var tahun = $(this).parents('td').children('.input-group').find('.select-form-bulanan-2').val()

                    const url = "<?php echo base_url() ?>Rekap_absen/rekap_bulanan/" + lokasi_id + '/' + bulan + '/' + tahun

                    //alert(url)
                    window.location.href = url
                })
            })


        </script>

