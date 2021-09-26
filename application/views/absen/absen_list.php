
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
        <div class="box-body" id="tabel-absensi-wrapper" style="overflow-x: scroll; height: 56vh; ">
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
            })

            $(document).on('change','.select_status', function() {
                const this_el = $(this)

                const val = this_el.val()

                const tbalasan = this_el.parents('td').next('td')
                const tblampiran = this_el.parents('td').next('td').next('td')
                
                if (val === 'Sakit' || val === 'Izin') {

                    tbalasan.html(`
                        <input type="text" name="alasan[]" class="alasan" placeholder="Masukan alasan..." required="" value="">
                        `)

                    tblampiran.html(`
                        <input type="file" name="lampiran" accept="image/*,.pdf" class="lampiran"  required="">
                        `)

                } else {
                    tbalasan.html(`N/A`)

                    tblampiran.html(`N/A`)                    
                }

            })

            $(document).on('click','#btn-save-absen', function(e){
                e.preventDefault()

                const thisel = $(this)
                thisel.attr('disabled', true)
                thisel.prev('a.btn-info').addClass('disabled')
                thisel.html('<i class="fas fa-sync fa-spin" style="margin: auto;"></i>')
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    
                    // try async method

                    var bar = new Promise((resolve, reject) => {

                        const elemrowowo = $('table#tbl-absen-list > tbody > tr')

                        elemrowowo.each(function(index) {

                            var karyawan_id = $(this).find('td').eq(9).find('input#karyawan_id').val()
                            var status = $(this).find('td').eq(4).children('div.form-group').children('select.select_status').val()
                            var alasan = $(this).find('td').eq(5).children('input').val()
                            var photo
                            if ($(this).find('td').eq(6).children('input.lampiran').length > 0) {
                                photo = $(this).find('td').eq(6).children('input').prop('files')[0];
                            } else {
                                photo = $(this).find('td').eq(6).children('input#photolama').val()
                            }

                            var tanggal = $('#tanggal_filter').val()
                            var jam_masuk = '08:00:00'
                            var jam_keluar = '18:00:00'

                            var form_data = new FormData();

                            form_data.append('karyawan_id', karyawan_id)
                            form_data.append('status', status)
                            form_data.append('alasan', alasan)
                            form_data.append('photo', photo);
                            form_data.append('tanggal', tanggal)
                            form_data.append('jam_masuk', jam_masuk)
                            form_data.append('jam_keluar', jam_keluar)

                            $.ajax({
                                url: '<?php echo site_url("Absen/save_absensi_data") ?>',
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,
                                type: 'post',
                                success: function(data){
                                    var dt = JSON.parse(data)
                                    console.log(dt.msg + ' | ' + dt.msgscnd)
                                }
                            });

                            if (index === elemrowowo.length -1) resolve();
                            
                        })
                    });

                    bar.then(() => {
                        thisel.attr('disabled', false)
                        thisel.prev('a.btn-info').removeClass('disabled')
                        thisel.html('<i class="fas fa-save"></i>')
                        Swal.fire({
                          title: 'Berhasil',
                          text: "Simpan data absensi berhasil!",
                          icon: 'success',
                        })
                        $('#btn-filter-date').click()
                    });
                  } else {
                    thisel.attr('disabled', false)
                    thisel.prev('a.btn-info').removeClass('disabled')
                    thisel.html('<i class="fas fa-save"></i>')
                  }
                })

            });



        </script>