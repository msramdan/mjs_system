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
                <!-- Tannggal dan Jam -->
                <h2>No. <b><font id="no_po"><?= $no_po ?></font></b></h2>
              </div>
            </div>
        </div>


    </div>
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
                      <input type="tanggal" id="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>">
                    </div>
                  </td>
                </tr>
                            <tr>
                                <td style="vertical-align: top" width="30%">
                                    <label for="customer">Supplier</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                         <select name="supplier_id" id="supplier_id" class="form-control theSelect" >
                                          <option value="">-- Pilih -- </option>
                                          <?php foreach ($supplier as $key => $data) { ?>
                                            <?php if ($supplier_id == $data->supplier_id) { ?>
                                              <option value="<?php echo $data->supplier_id ?>" selected><?php echo $data->nama_supplier ?></option>
                                            <?php } else { ?>
                                              <option value="<?php echo $data->supplier_id ?>"><?php echo $data->nama_supplier ?></option>
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
                    <label for="date">Order Deadline</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="date" id="order_deadline" class="form-control" value="<?php echo date('Y-m-d') ?>">
                    </div>
                  </td>
                </tr>

                <tr>
                  <td style="vertical-align: top">
                    <label for="date">Receipt Date</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="date" id="receipt_date" class="form-control" value="<?php echo date('Y-m-d') ?>">
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
                      <select name="item_id" id="item_id" class="form-control berubah_item theSelect">
                        <option value="">-- Pilih -- </option>
                        <?php foreach ($item as $key => $data) { ?>
                          <?php if ($item_id == $data->item_id) { ?>
                            <option value="<?php echo $data->item_id ?>" selected><?php echo $data->nama_item ?></option>
                          <?php } else { ?>
                            <option value="<?php echo $data->item_id ?>"><?php echo $data->nama_item ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                      <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-customer">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span                   
                    </div>
                  </td>   
                </tr>
                <tr>
                  <td style="vertical-align: top">
                    <label for="qty">Initial Stock</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" id="stok" name="stok" value="" class="form-control" readonly="">
                    </div>
                  </td>
                </tr

                <tr>
                  <td style="vertical-align: top">
                    <label for="qty">Harga</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" id="estimasi_harga" name="estimasi_harga" value="" class="form-control">
                    </div>
                  </td>
                </tr>             
                                        
  
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
                    <th>Kode Item</th>
                    <th>Product Item</th>
                    <th>Deksripsi</th>
                    <th>Price</th>
                    <th>QTY</th>
                    <th>Unit</th>
                    <th width="15%">Total</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="cart_table">
                  <?php $this->view('T_purchase/cart_data') ?>      
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

        <div class="col-lg-6">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align: top">
                    <label for="note">Note</label>
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
              <i class="fa fa-paper-plane-o"></i>Proccess Payment
            </button>
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
            <script type="text/javascript">
              $(".theSelect").select2();

              $( ".berubah_item" ).change(function() {
              var item_id=$('#item_id').val();
              if (item_id=='' || item_id==null) {
                  $('#item_id').val('')
                  $('#stok').val('') 
                  $('#estimasi_harga').val('') 
              }else{
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('T_purchase/get_item_by_id')?>",
                    dataType : "JSON",
                    data : {item_id: item_id},
                            success: function(data){
                                $('#stok').val(data.stok);   
                                $('#estimasi_harga').val(data.estimasi_harga);       
                              }
                        });
                        return false;

              }
                    
            });

              //Add_cart
                $(document).on('click','#add_cart', function(){
                  var item_id = $('#item_id').val()
                  var qty = $('#qty').val()
                  var estimasi_harga = $('#estimasi_harga').val()
                  if (item_id == '') {
                    alert('Barang / Jasa Belum dipilih')
                    $('#item_id').focus()
                  }else if (estimasi_harga=='' || estimasi_harga==null){
                    alert('Masukan harga item')
                    $('#estimasi_harga').focus()
                  }else if(qty < 1){
                    alert('QTY minimal 1')
                    $('#qty').focus()
                  }else{
                    $.ajax({
                        type:'POST',
                        url : '<?=site_url('T_purchase/process') ?>',
                        data :{'add_cart' : true, 'item_id' : item_id, 'estimasi_harga' : estimasi_harga,'qty' : qty},
                        dataType : 'json',
                        success: function(result){
                            if (result.success == true) {
                            $('#estimasi_harga').val(0)
                            
                            $('#item_id').val('')

                            $('#stok').val('') 
                            $('#estimasi_harga').val('') 
                            $('#cart_table').load('<?=site_url('T_purchase/cart_data') ?>',function(){
                                calculate()
                            })
                            }else{
                                alert('Gagal tambah item cart')
                            }

                        }
                    })
                  }
                })

                // del cart purchase
                $(document).on('click', '#del_cart', function(){
                        if (confirm('Apakah anda yakin ?')) {
                            var cart_id = $(this).data('cartid')
                            $.ajax({
                                type:'POST',
                                url : '<?=site_url('T_purchase/del_cart') ?>',
                                data :{'cart_id' : cart_id},
                                dataType : 'json',
                                success:function(result){
                                    if (result.success == true) {
                                        $('#cart_table').load('<?=site_url('T_purchase/cart_data') ?>',function(){
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
                                url : '<?=site_url('T_purchase/process') ?>',
                                data :{'edit_cart' : true, 'cart_id' : cart_id, 'price' : price, 'qty' : qty,'total': total},
                                dataType : 'json',
                                success: function(result){
                                    if (result.success) {
                                    $('#cart_table').load('<?=site_url('T_purchase/cart_data') ?>',function(){
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
                        if (confirm('Apakah Anda yakin cancel PO ?')) {
                            $.ajax({
                            type:'POST',
                            url : '<?=site_url('T_purchase/del_cart') ?>',
                            data :{'cancel_payment': true},
                            dataType : 'json',
                            success: function(result){
                                if (result.success == true) {
                                     $('#cart_table').load('<?=site_url('T_purchase/cart_data') ?>',function(){
                                            calculate()
                                        })
                                }
                            }
                        })
                            location.href='<?=site_url('T_purchase') ?>'

                        }
                    })

                    // Proses PO
                    $(document).on('click','#process_payment', function(){
                      var supplier_id = $('#supplier_id').val()
                      var no_po = $('#no_po').html()
                      var subtotal = $('#sub_total').val()
                      var discount = $('#discount').val()
                      var grandtotal = $('#grand_total').val()
                      var note = $('#note').val()
                      var tanggal = $('#tanggal').val()
                      var order_deadline = $('#order_deadline').val()
                      var receipt_date = $('#receipt_date').val()

                      if (supplier_id =='' || supplier_id==null) {
                        alert('Pilih Supplier terlebih dahulu')
                        $('#supplier_id').focus()

                      }else if (subtotal <1){
                        alert('Belum ada barang / jasa yang dipilih')
                        $('#item_id').focus()
                      }else {
                        if (confirm('Yakin proses transaksi ini ?')) {
                            $.ajax({
                            type:'POST',
                            url : '<?=site_url('T_purchase/process') ?>',
                            data :{'process_payment' : true,'subtotal' : subtotal,'no_po' : no_po, 'discount' : discount, 'grandtotal': grandtotal,'note': note, 'tanggal': tanggal,'order_deadline': order_deadline,'receipt_date': receipt_date},
                            dataType : 'json',
                            success: function(result){
                                if (result.success) {
                                    alert('Transaksi berhasil');
                                }else{
                                    alert('Transaksi gagal');
                                }
                                location.href='<?=site_url('T_purchase') ?>'

                            }
                        })

                        }
                      }
                    })

            </script>


