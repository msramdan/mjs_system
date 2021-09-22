
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
                                        <div class='col-md-12'>
                                             <div class='col-md-3' style="float: left;margin-left: 5px; margin-right: 5px; margin-top: 5px; margin-bottom: 20px">
                                                <input type="date" name="" class="form-control" id="tanggal_filter" value="<?php echo date("d/m/Y") ?>">
                                            </div>
                                            <div class='col-md-3' style="float: left;margin-left: 5px; margin-right: 5px; margin-top: 5px; margin-bottom: 20px">
                                                <button class="btn btn-success" id="btn-filter-date">Filter</button>
                                        </div>
        </div>    
        <div class="box-body" id="tabel-absensi-wrapper" style="overflow-x: scroll; ">
            <div style="display: flex; height: 50vh; justify-content: center; flex-direction: column;">
              
              <i class="fas fa-sync fa-spin fa-3x" style="margin: auto;"></i>
              <p>Mempersiapkan data...</p>
                
            </div>
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

        <script type="text/javascript">

            $(document).ready(function() {
                var now = new Date();

                //asw besok ae lah

                var day = ("0" + now.getDate()).slice(-2)
                var month = ("0" + (now.getMonth() + 1)).slice(-2)

                var today = now.getFullYear()+"-"+(month)+"-"+(day)

                $('#tanggal_filter').val(today)
                $('#btn-filter-date').click()

            })
            
            $('#btn-filter-date').click(function() {
                const date = $('#tanggal_filter').val()
                const lokasi = "<?php echo $lokasi_id ?>"

                //$('#tabel-absensi-wrapper').html('Loading...')

                const karyawan_id = $(this).attr('id')

                const elem_tbl = $('#tabel-absensi-wrapper')

                elem_tbl.html(`<div style="display: flex; height: 50vh; justify-content: center; flex-direction: column;">
              
              <i class="fas fa-sync fa-spin fa-3x" style="margin: auto;"></i>
              <p>Mempersiapkan data...</p>
                
            </div>`)


                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>absen/refreshtabelabsen",
                    data: {
                        id_lokasi:lokasi,
                        date:date
                    },
                    success: function(data){
                        elem_tbl.html(data)
                    },
                    error: function(e) {
                        elem_tbl.html(`<div style="display: flex; height: 50vh; justify-content: center; flex-direction: column;">
              
              <i class="fas fa-sync fa-spin fa-3x" style="margin: auto;"></i>
              <p>Terjadi Masalah tersambung dengan server, cek koneksi internet anda, pastikan rekan dapat mengaksesnya, jika masih terjadi, hubungi admin IT</p>
                
            </div>`)
                    }
                });

                // $('table#tbl-absen-list > tbody > tr').each(function(index) {
                    
                // })
            })

            $(document).on('click','#btn-save-absen', function() {
                alert('ayyy')
            })


        </script>