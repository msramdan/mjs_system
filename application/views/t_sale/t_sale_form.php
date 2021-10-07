<div id="content" class="app-content">
<div class="col-xl-12 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">KELOLA DATA TRANSAKSI</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">

	<section class="content">
    <div class="row">

          <div class="box box-widget">
            <div class="box-body">
              <div align="right">
             

<script type="text/javascript">    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function tampilkanwaktu(){
        //buat dataect date berdasarkan waktu saat ini
        var waktu = new Date();
        //ambil nilai jam, 
        //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
        var sh = waktu.getHours() + ""; 
        //ambil nilai menit
        var sm = waktu.getMinutes() + "";
        //ambil nilai detik
        var ss = waktu.getSeconds() + "";
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);"> 
<h1>              
<span id="clock"></span></h1> 
<?php
$hari = date('l');
/*$new = date('l, F d, Y', strtotime($Today));*/
if ($hari=="Sunday") {
  echo "Minggu";
}elseif ($hari=="Monday") {
  echo "Senin";
}elseif ($hari=="Tuesday") {
  echo "Selasa";
}elseif ($hari=="Wednesday") {
  echo "Rabu";
}elseif ($hari=="Thursday") {
  echo("Kamis");
}elseif ($hari=="Friday") {
  echo "Jum'at";
}elseif ($hari=="Saturday") {
  echo "Sabtu";
}
?>,
<?php
$tgl =date('d');
echo $tgl;
$bulan =date('F');
if ($bulan=="January") {
  echo " Januari ";
}elseif ($bulan=="February") {
  echo " Februari ";
}elseif ($bulan=="March") {
  echo " Maret ";
}elseif ($bulan=="April") {
  echo " April ";
}elseif ($bulan=="May") {
  echo " Mei ";
}elseif ($bulan=="June") {
  echo " Juni ";
}elseif ($bulan=="July") {
  echo " Juli ";
}elseif ($bulan=="August") {
  echo " Agustus ";
}elseif ($bulan=="September") {
  echo " September ";
}elseif ($bulan=="October") {
  echo " Oktober ";
}elseif ($bulan=="November") {
  echo " November ";
}elseif ($bulan=="December") {
  echo " Desember ";
}
$tahun=date('Y');
echo $tahun;
?>     <h2>No. <b><font id="no_so"></font></b></h2>
              </div>
            </div>
        </div>


    </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <input type="hidden" id="date" class="form-control" value="<?php echo date('Y-m-d') ?>">

                <tr>
                  <td style="vertical-align: top" width="30%">
                    <label for="barcode">No SPAL</label>
                  </td>
                  <td>
                    <div class="form-group input-group">
                      <select class="form-control berubah_spal theSelect" name="spal_id" id="spal_id">
                         <option value="">-- Pilih -- </option>
                                    <?php foreach ($spal as $key => $data) { ?>
                                      <?php if ($spal_id == $data->spal_id) { ?>
                                        <option  value="<?php echo $data->spal_id ?>" selected><?php echo $data->no_spal ?></option>
                                      <?php } else { ?>
                                        <option value="<?php echo $data->spal_id ?>"><?php echo $data->no_spal ?></option>
                                      <?php } ?>
                                    <?php } ?>
                              </select>
                    </div>

                  </td>
                </tr>

                <tr>
                  <td style="vertical-align: top" width="30%">
                    <label for="barcode">Dokumen SPAL</label>
                  </td>
                  <td>
                    <div class="form-group input-group">
                      <input type="text" id="dokumen" name="dokumen" class="form-control" value="" readonly="" >    
                      <span class="input-group-btn">
                        <a href="#modal-spal-dokumen" data-toggle="modal" id="view_gambar" class="btn btn-success btn-flat">
                          <i class="fa fa-eye"></i>
                        </a>
                      </span>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td style="vertical-align: top" width="30%">
                    <label for="barcode">Customer</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" id="customer" name="customer" class="form-control" value="" readonly="" >
                      <input type="hidden" id="pelanggan_id" name="pelanggan_id" class="form-control" value="">
                    </div>
                  </td>
                </tr>

                <tr>
                  <td style="vertical-align: top" width="30%">
                    <label for="barcode">Attn.</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" id="attn" name="attn" class="form-control" readonly="" value="" >
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        
        <div class="col-lg-4">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align: top">
                    <label for="qty">Nama Kapal</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" id="kapal" name="kapal" value="" class="form-control" readonly="">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top">
                    <label for="qty">Nama Muatan</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" id="tongkang" name="tongkang" value="" class="form-control" readonly="">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top">
                    <label for="qty">Pelabuhan Muat</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" id="pelabuhan_muat" name="pelabuhan_muat" value="" class="form-control" readonly="">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top">
                    <label for="qty">Pelabungan Bongkar</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" id="pelabuhan_bongkar" name="pelabuhan_bongkar" value="" class="form-control" readonly="">
                    </div>
                  </td>
                </tr>


              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align: top" width="30%">
                    <label for="barcode">Barang / Jasa</label>
                  </td>
                  <td>
                    <div class="form-group input-group">
                      <select class="form-control theSelect" name="item_id" id="item_id">
                         <option value="">-- Pilih -- </option>
                                    <?php foreach ($jasa as $key => $data) { ?>
                                      <?php if ($item_id == $data->item_id) { ?>
                                        <option  value="<?php echo $data->item_id ?>" selected><?php echo $data->nama_item ?></option>
                                      <?php } else { ?>
                                        <option value="<?php echo $data->item_id ?>"><?php echo $data->nama_item ?></option>
                                      <?php } ?>
                                    <?php } ?>
                              </select>
                    </div>
                  </td>   
                </tr>

                <tr>
                  <td style="vertical-align: top">
                    <label for="qty">Harga Muatan</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" id="estimasi_harga" name="estimasi_harga" value="" class="form-control">
                    </div>
                  </td>
                </tr>

        
                <tr>
                  <td style="vertical-align: top">
                    <label for="qty">Jumlah Muatan</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" id="qty" name="" value="1" min="1" class="form-control">
                    </div>
                  </td>
                </tr>

                <tr>
                  <td></td>
                  <td>
                    <div>
                      <button type="button" id="add_cart" class="btn btn-primary">
                        <i class="fa fa-cart-plus"></i> Add
                      </button>
                    </div>
                  </td>
                </tr>
              </table>


              
            </div>
          </div>          
        </div>

      </div>
      <br>
      <div class="row">
        <div class="col-lg-12">
          <div class="box box-widget">
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped table-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kode Internal</th>
                    <th>Barang / Jasa</th>
                    <th>Estimasi Harga</th>
                    <th>QTY</th>
                    <th width="15%">Subtotal </th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="cart_table">
                  <?php $this->view('T_sale/cart_data') ?>           
                </tbody>
              </table>
            </div>
          </div>          
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-3">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align: top; width: 30%">
                    <label for="sub_total">Sub Total</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" id="sub_total" value="" class="form-control" readonly="">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top">
                    <label for="discount">Discount</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" id="discount"  value="0" min="0" class="form-control">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top">
                    <label for="grand_total">Grand Total</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" id="grand_total" name="grand_total" class="form-control" readonly="">
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align: top">
                    <label for="note" style="vertical-align: middle;">Note</label>
                  </td>
                  <td>
                    <div>
                      <textarea id="note" rows="5" class="form-control"></textarea>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div>
            <button id="cancel_payment" class="btn btn-flat btn-warning">
              <i class="fa fa-refresh"></i>Cancel
            </button><br><br>
            <button id="process_payment" class="btn btn-flat btn-lg btn-success">
              <i class="fa fa-paper-plane-o"></i>Proccess </button>
          </div>
        </div>
      </div>
    </section>


</div>
</div>
</div>
</div>

<div class="modal fade" id="modal-item-edit">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Update Cart Data</h4>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-hidden="true"></button>
                      </div>
                      <div class="modal-body">
                        <table class="table  table-bordered table-hover table-td-valign-middle text-black" style="border-color: #d3d3d3">
                        <thead>
                                <input style="border-color: #d3d3d3; color: black" type="hidden" class="form-control" name="cartid_item_modal" id="cartid_item_modal" placeholder="EStimasi Harga" value="" />

                                <tr><td >Kode Internal</td><td><input style="border-color: #d3d3d3; color: black" type="text" class="form-control" name="kd_internal_item_modal" id="kd_internal_item_modal" placeholder="kd_internal_item_modal" value="" readonly="" /></td></tr>
                                <tr><td >Barang / Jasa</td><td><input style="border-color: #d3d3d3; color: black" type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="nama_barang" value="" readonly="" /></td></tr>

                                <tr><td >Estimasi Harga</td><td><input style="border-color: #d3d3d3; color: black" type="text" class="form-control" name="estimasi_harga_modal" id="estimasi_harga_modal" placeholder="EStimasi Harga" value="" /></td></tr>

                                <tr><td >QTY</td><td><input style="border-color: #d3d3d3; color: black" type="text" class="form-control" name="qty_modal" id="qty_modal" placeholder="QTY" value="" /></td></tr>

                                <tr><td >Subtotal</td><td><input style="border-color: #d3d3d3; color: black" type="text" class="form-control" name="total_item_modal" id="total_item_modal" placeholder="total_item_modal" value="" readonly="" /></td></tr>

                                <input style="border-color: #d3d3d3; color: black" type="hidden" class="form-control" name="supplier_id" id="supplier_id" placeholder="Telepon" value="<?= decrypt_url($this->uri->segment(3) )?>" />
                        </thead>
                </table>

                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-white" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-primary" id="edit_cart"> Update</button>
                  </div>
                      </div>

                    </div>
                  </div>

        <!-- #modal-dialog -->
            <div class="modal fade" id="modal-spal-dokumen">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">SPAL <span id="dokumen_nama"></span></h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-hidden="true"></button>
                  </div>
                  <div class="modal-body">
                    <embed src="" id="data_dokumen" width="100%" frameborder="0" width="100%" height="400px" />
                  </div>
                  <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                    <!-- <a class="btn btn-primary" id="download" href=""><i class="ace-icon fa fa-download"></i> Download</a> -->`
                  </div>
                </div>
              </div>
            </div>



<script>
  $(document).ready(function() {
  $(".theSelect").select2();

  // $(document).on('click','#view_gambar',function(){
  //         var dokumen=$('#dokumen').val();
  //         console.log(dokumen)
  //         // var dokumen = 'No';
  //         if (dokumen=='' || dokumen==null ) {
  //           $('#modal-spal-dokumen #dokumen_nama').text('');
  //         }else{
  //           $('#modal-spal-dokumen #dokumen_nama').text(dokumen);
  //           $('#modal-spal-dokumen #data_dokumen').attr("src", "../assets/assets/img/spal/"+dokumen);
  //         }
          
  //   })


  $( ".berubah_spal" ).change(function() {
      var spal_id=$('#spal_id').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('T_sale/gey_by_spal')?>",
            dataType : "",
            data : {spal_id: spal_id},
                    success: function(data){
                        var json = data,
                        obj = JSON.parse(json);
                        if (obj.dokumen=='' || obj.dokumen==null ) {
                          $('#modal-spal-dokumen #dokumen_nama').text('');
                        }else{
                          $('#modal-spal-dokumen #dokumen_nama').text(obj.dokumen);
                          $('#modal-spal-dokumen #data_dokumen').attr("src", "../assets/assets/img/spal/"+obj.dokumen);
                        }


                      }
                });

                return false;
    });

    //autofill data dari spal
    $( ".berubah_spal" ).change(function() {
  		var spal_id=$('#spal_id').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('T_sale/gey_by_spal')?>",
            dataType : "JSON",
            data : {spal_id: spal_id},
                    success: function(data){
                        $('#attn').val(data.attn);
                        $('#nama_barang').val(data.nama_barang);
                        $('#kapal').val(data.kapal);
                        $('#tongkang').val(data.tongkang);
                        $('#pelabuhan_muat').val(data.pelabuhan_muat);
                        $('#pelabuhan_bongkar').val(data.pelabuhan_bongkar);
                        $('#customer').val(data.nama_pelanggan);
                        $('#dokumen').val(data.dokumen);
                        $('#estimasi_harga').val(data.harga_muatan);
                        $('#qty').val(data.jumlah_muatan);
                        $('#pelanggan_id').val(data.pelanggan_id);                      
                      }
                });

                return false;
    });
    //Generate auto SO
    $( ".berubah_spal" ).change(function() {
      var spal_id=$('#spal_id').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('T_sale/gen_no_so')?>",
            dataType : "",
            data : {spal_id: spal_id},
                    success: function(data){
                        var json = data,
                        obj = JSON.parse(json);
                        $('#no_so').html(obj);

                      }
                });

                return false;
    });

    //Add_cart
        $(document).on('click','#add_cart', function(){
          var item_id = $('#item_id').val()
          var qty = $('#qty').val()
          var estimasi_harga = $('#estimasi_harga').val()
          if (item_id == '') {
            alert('Barang / Jasa Belum dipilih')
            $('#item_id').focus()
          }else if(qty < 1){
            alert('QTY minimal 1')
            $('#qty').focus()
          }else{
            $.ajax({
                type:'POST',
                url : '<?=site_url('T_sale/process') ?>',
                data :{'add_cart' : true, 'item_id' : item_id, 'estimasi_harga' : estimasi_harga,'qty' : qty},
                dataType : 'json',
                success: function(result){
                    if (result.success == true) {
                    $('#cart_table').load('<?=site_url('T_sale/cart_data') ?>',function(){
                        calculate()
                    })
                    }else{
                        alert('Gagal tambah item cart')
                    }

                }
            })
          }
        })
    //Del chart
    $(document).on('click', '#del_cart', function(){
            if (confirm('Apakah anda yakin ?')) {
                var cart_id = $(this).data('cartid')
                $.ajax({
                    type:'POST',
                    url : '<?=site_url('T_sale/del_cart') ?>',
                    data :{'cart_id' : cart_id},
                    dataType : 'json',
                    success:function(result){
                        if (result.success == true) {
                            $('#cart_table').load('<?=site_url('T_sale/cart_data') ?>',function(){
                                calculate()
                            })
                        }else{
                            alert('Gagal hapus item cart');
                        }

                    }


                    })
            }
        })
  //Get data update
  $(document).on('click','#update_cart',function(){
          $('#cartid_item_modal').val($(this).data('cartid'))
          $('#kd_internal_item_modal').val($(this).data('kd_internal_item'))
          $('#nama_barang').val($(this).data('product'))
          $('#estimasi_harga_modal').val($(this).data('price'))
          $('#qty_modal').val($(this).data('qty'))
          $('#total_item_modal').val($(this).data('total'))
        })
  $(document).on('keyup mouseup','#estimasi_harga_modal,#qty_modal',function(){
            count_edit_modal()
        })

  //simpan edit data
  $(document).on('click','#edit_cart', function(){
          var cart_id = $('#cartid_item_modal').val()
          var price = $('#estimasi_harga_modal').val()
          var qty = $('#qty_modal').val()
          var total = $('#total_item_modal').val()

          if (price == '' || price <1) {
            alert('Harga tidak boleh kosong')
            $('#estimasi_harga_modal').focus()
          }else if(qty == '' || qty <1){
            alert('QTY minimal 1')
            $('#qty_modal').focus()
          }else {
            $.ajax({
                type:'POST',
                url : '<?=site_url('T_sale/process') ?>',
                data :{'edit_cart' : true, 'cart_id' : cart_id, 'price' : price, 'qty' : qty,'total': total},
                dataType : 'json',
                success: function(result){
                    if (result.success) {
                    $('#cart_table').load('<?=site_url('T_sale/cart_data') ?>',function(){
                        calculate()
                    })
                    alert('Item cart berhasil ter-Update');
                    $('#modal-item-edit > div > div > div.modal-header > button').click();
                    }else{
                        alert('Data Item Cart tidak terupdate')
                    }

                }
            })
          }
        })

  function count_edit_modal(){
            var price = $('#estimasi_harga_modal').val();
            var qty = $('#qty_modal').val();


            total_before = price * qty
            $('#total_item_modal').val(total_before)
        }
  //hitung sub total dan total
  function calculate(){
            var subtotal = 0;
            $('#cart_table tr').each(function(){
                subtotal += parseInt($(this).find('#total123').text())
            })
            isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)
            var discount = $('#discount').val()
            var grand_total = subtotal - discount
            if (isNaN(grand_total)) {
                $('#grand_total').val(0) 
            }else{
                $('#grand_total').val(grand_total) 
            }
        }
        $(document).ready(function(){ //pertamakan document di load function ini d panggil
            calculate()
        })

        $(document).on('keyup mouseup','#discount',function(){
            calculate()
        })

        //cancel payment
        $(document).on('click','#cancel_payment', function(){
            if (confirm('Apakah Anda yakin cancel SO ?')) {
                $.ajax({
                type:'POST',
                url : '<?=site_url('T_sale/del_cart') ?>',
                data :{'cancel_payment': true},
                dataType : 'json',
                success: function(result){
                    if (result.success == true) {
                         $('#cart_table').load('<?=site_url('T_sale/cart_data') ?>',function(){
                                calculate()
                            })
                    }
                }
            })
                $('#discount').val(0)
                $('#spal_id').val(0)
                $('#spal_id').focus()

            }
        })

        //proses SO

          $(document).on('click','#process_payment', function(){
          var spal_id = $('#spal_id').val()
          var no_so = $('#no_so').html()
          var subtotal = $('#sub_total').val()
          var discount = $('#discount').val()
          var grandtotal = $('#grand_total').val()
          var note = $('#note').val()
          var date = $('#date').val()

          if (spal_id =='' || spal_id==null) {
            alert('Pilih spal terlebih dahulu')
            $('#spal_id').focus()

          }else if (subtotal <1){
            alert('Belum ada barang / jasa yang dipilih')
            $('#item_id').focus()
          }else {
            if (confirm('Yakin proses transaksi ini ?')) {
                $.ajax({
                type:'POST',
                url : '<?=site_url('T_sale/process') ?>',
                data :{'process_payment' : true,'subtotal' : subtotal,'no_so' : no_so, 'discount' : discount, 'grandtotal': grandtotal,'note': note, 'date': date,'spal_id': spal_id  },
                dataType : 'json',
                success: function(result){
                    if (result.success) {
                        alert('Transaksi berhasil');
                    }else{
                        alert('Transaksi gagal');
                    }
                    location.href='<?=site_url('T_sale') ?>'

                }
            })

            }
          }
        })



  });
</script>