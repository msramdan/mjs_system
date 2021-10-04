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
        <div class="col-lg-4">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align: top">
                    <label for="date">Tanggal</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="date" id="date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                    </div>
                  </td>
                </tr>
                   <input readonly="" type="hidden" id="user" class="form-control" value="<?= ucfirst($this->fungsi->user_login()->nama_user) ?>" >
                            <tr>
                                <td style="vertical-align: top" width="30%">
                                    <label for="customer">Customer</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <select class="form-control theSelect berubah_item" name="customer_id" id="customer_id">
                                                <option value="">-- Pilih -- </option>
						                        <?php foreach ($pelanggan as $key => $data) { ?>
						                          <?php if ($pelanggan_id == $data->pelanggan_id) { ?>
						                            <option  value="<?php echo $data->pelanggan_id ?>" selected><?php echo $data->nama_pelanggan ?></option>
						                          <?php } else { ?>
						                            <option value="<?php echo $data->pelanggan_id ?>"><?php echo $data->nama_pelanggan ?></option>
						                          <?php } ?>
						                        <?php } ?>
                                              </select>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-customer">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </td>
                            </tr>

                  <tr>
                    <td style="vertical-align: top" width="30%">
                      <label for="user">Alamat</label>
                    </td>
                    <td>
                      <div class="form-group">
                        <textarea class="form-control" id="alamat" name="alamat" readonly=""></textarea>
                      </div>
                    </td>
                  </tr>


                <tr>
                  <td style="vertical-align: top" width="30%">
                    <label for="user">Attn.</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" id="attn" name="attn" class="form-control" value="" >
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
                    	<select class="form-control theSelect berubah_customer" name="item_id" id="item_id">
              			     <option value="">-- Pilih -- </option>
						                        <?php foreach ($jasa as $key => $data) { ?>
						                          <?php if ($item_id == $data->item_id) { ?>
						                            <option  value="<?php echo $data->item_id ?>" selected><?php echo $data->nama_item ?></option>
						                          <?php } else { ?>
						                            <option value="<?php echo $data->item_id ?>"><?php echo $data->nama_item ?></option>
						                          <?php } ?>
						                        <?php } ?>
                              </select>

                      <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                          <i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                  </td>   
                </tr>
                <input type="hidden" id="estimasi_harga" name="estimasi_harga" value="" class="form-control">                               
        
                <tr>
                  <td style="vertical-align: top">
                    <label for="qty">QTY</label>
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
        <div class="col-lg-4">
          <div class="box box-widget">
            <div class="box-body">
              <div align="right">
                <h4>Invoice <b><font id="invoice"></font></b></h4>
                <h1><b><span id="grand_total2" style="font-size: 50pt">0</span></b></h1>
              </div>
            </div>
          </div>          
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-12">
          <div class="box box-widget">
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
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
                      <input type="number" id="grand_total" class="form-control" readonly="">
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align: top; width: 30%">
                    <label for="cash">Cash</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="" id="cash" value="0" min="0" class="form-control">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top">
                    <label for="change">Change</label>
                  </td>
                  <td>
                    <div>
                      <input type="number" name="" id="change" class="form-control" readonly="">
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align: top">
                    <label for="note">Note</label>
                  </td>
                  <td>
                    <div>
                      <textarea id="note" rows="3" class="form-control"></textarea>
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


<script>
  $(document).ready(function() {
    $(".theSelect").select2();
    //autifill alamat
    $( ".berubah_item" ).change(function() {      
      var kode=$('#customer_id').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('T_sale/cek_alamat')?>",
            dataType : "",
            data : {kode: kode},
                    success: function(data){
                      $('#alamat').val(data);
                      
                    }
                });

                return false;
    });          
    //autofill invoice
    $( ".berubah_item" ).change(function() {
  		var kode=$('#customer_id').val();
      var item_id=$('#item_id').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('T_sale/coba')?>",
            dataType : "",
            data : {kode: kode, item_id:item_id},
                    success: function(data){
                      $('#invoice').html(data);
                    }
                });

                return false;
    });

    //perubahan invoice berdasarkan klik jasa
    $( ".berubah_customer" ).change(function() {
      var kode=$('#customer_id').val();
      var item_id=$('#item_id').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('T_sale/coba')?>",
            dataType : "",
            data : {kode: kode, item_id:item_id},

                    success: function(data){
                      $('#invoice').html(data);
                      
                    }

                });
                return false;
    });

    //isi data berdasarkan input jasa
    $( ".berubah_customer" ).change(function() {
      var item_id=$('#item_id').val();
          $.ajax({
                    type : "POST",
                    url: "<?php echo base_url('T_sale/data_item')?>",
                    data : {item_id:item_id},
                    success: function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#estimasi_harga').val(obj.estimasi_harga);

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
                        // calculate()
                    })
                    $('#qty').val(1)
                    // $('#item_id').val('') 
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
                                // calculate()
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
          //data kaNaN ini dari data yang ada di button
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
                        // calculate()
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

            if(discount == ''){
            $('#discount_item').val(0)
          }
        }

  });
</script>