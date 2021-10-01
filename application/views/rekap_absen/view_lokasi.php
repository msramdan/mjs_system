<style>
    
    .buttonnya {
        position: absolute;
        height: 100%;
        display: inline-block;
        right: 52%;
        transition: 250ms all ease-in-out;
    }

    .select-form-nya {
        flex: 0 1 30% !important;
    }

    .input-group-button {
        position: absolute;
        display: contents;
    }

    .btn-confirm {
        right: 0%;
    }

    .btn-select-taun
    {
        right: 30%;
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
			<td style="text-align:center" width="200px">
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
            <td>
                <button class="btn btn-primary">
                    <i class="fas fa-list" aria-hidden="true"></i> Bulan
                </button>
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
            
                $('.input-group-button').on('click','.btn-select-taun', function(e) {

                    e.preventDefault()

                    $('.btn-confirm').replaceWith('<button class="btn btn-danger buttonnya btn-select-taun"><i class="fas fa-list" aria-hidden="true"></i> Tahun</button>')
                    $(this).replaceWith('<button class="btn btn-confirm buttonnya btn-success"><i class="fas fa-check"></i></button>')
                })

                $(document).on('click','.btn-confirm', function() {

                    var lokasi_id = $(this).parents('td').find('.lokasi_id').val()
                    var tahun = $(this).parents('td').children('.input-group').find('.select-form-nya').val()

                    const url = "<?php echo base_url() ?>Rekap_absen/rekap/" + lokasi_id + '/' + tahun

                    //alert(url)
                    window.location.href = url
                })
            })


        </script>

<div id="recap-calendar" class="bootstrap-calendar"></div>
<hr class="m-0 bg-gray-500" />
<div class="list-group list-group-flush">
<a href="javascript:;" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center text-ellipsis">
Sales Reporting
<span class="badge bg-teal fs-10px">9:00 am</span>
</a>
<a href="javascript:;" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center text-ellipsis rounded-bottom">
Have a meeting with sales team
<span class="badge bg-blue fs-10px">2:45 pm</span>
</a>
</div>

