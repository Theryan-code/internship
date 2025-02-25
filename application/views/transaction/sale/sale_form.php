<section class="content-header">
    <h1><?=ucwords($title)?>
        <small>Penjualan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i></a></li>
        <li><a>Transaction</a></li>
        <li class="active"><?=ucwords($title)?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="date">Date</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="date" value="<?=date('Y-m-d')?>" class="form-control" readonly>
                                </div>
                            </td>
                        <input type="text" id="level" value="<?=$this->fungsi->user_login()->level?>" class="form-control" style="display: none;">
                        <?php 
                            $nama = $this->fungsi->user_login()->name;
                            $level = $this->fungsi->user_login()->level;
                            if($level==1){
                        ?>
                        </tr>
                            <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="user">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="user" value="<?=$this->fungsi->user_login()->name?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="customer">Customer</label>
                            </td>
                            <td>
                                <div>
                                    <?php 
                                        $nama = $this->fungsi->user_login()->name;
                                        $level = $this->fungsi->user_login()->level;

                                        if($level==1){
                                            echo '<select id="customer" class="form-control">';
                                        }else if($level==2){
                                            echo '<select id="customer" class="form-control" disabled>';
                                        }

                                        
                                    ?>
                                        <option value="">Umum</option>
                                        <?php 
                                        foreach($customer as $cst => $data) {
                                            if($this->fungsi->user_login()->customer_id == $data->customer_id){
                                                echo '<option value="'.$data->customer_id.'" selected>'.$data->name.'</option>';
                                            }else{
                                                echo '<option value="'.$data->customer_id.'">'.$data->name.'</option>';
                                            }
                                            
                                        } 
                                        ?>
                                    </select>
                                </div>    
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="barcode">Barcode</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="item_id">
                                    <input type="hidden" id="price">
                                    <input type="hidden" id="stock">
                                    <input type="text" id="barcode" class="form-control" autofocus readonly>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="qty">Qty</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="qty" value="1" min="1" class="form-control">
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
        </div> -->

        <div class="col-lg-6">
            <div class="box box-widget">
                <div class="box-body">
                    <div align="right">
                        <h3>Total Harga</span></h3>
                        <h1><b><span style="font-size:38pt" align="left">Rp. </span><span id="grand_total2" style="font-size:38pt">0</span></b></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Barcode</label>
                                        <div class="col-sm-9">
                                           <input type="hidden" id="item_id">
                                            <input type="hidden" id="price">
                                            <input type="hidden" id="stock">
                                            <input type="text" id="barcode" class="form-control" readonly autofocus>
                                            <input type="text" id="name" class="form-control" readonly autofocus style="display: none;">       
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-4">
                                        
                                          <input type="text" id="myInputTextField">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Qty</label>
                                        <div class="col-sm-4">
                                          <input type="number" id="qty" value="1" min="1" class="form-control">
                        
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                       
                                        <div class="col-sm-9">
                                       <button type="button" id="add_cart" class="btn btn-primary">
                                        <i class="fa fa-cart-plus"></i> Add
                                    </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                </div>
                            <!-- <td style="vertical-align:top; width:5% padding-left: 0px; ">
                         <label for="qty">Qty</label>
                            </td>
                            <td style="width: 5% padding-left: 0px;">
                                <div class="form-group">
                                    <input type="number" id="qty" value="1" min="1" class="form-control">
                                </div>
                            </td> -->

                        
                    

                    <table id="table1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($item as $i => $data) { ?>
                            <tr>
                                <td><?=$data->barcode?></td>
                                <td><?=$data->name?></td>
                                <td><?=$data->unit_name?></td>
                                <td class="text-right">Rp.<?=indo_currency($data->price)?></td>
                                <td class="text-right"><?=$data->stock?></td>
                                <td class="text-center">
                                    <button id="select" 
                                    data-barcode="<?=$data->barcode?>" 
                                    data-name="<?=$data->name?>" 
                                    data-itemid="<?=$data->item_id?>" 
                                    data-price="<?=$data->price?>" 
                                    data-stock="<?=$data->stock?>" 
                                    class="btn btn-xs btn-info">
                                        <i class="fa fa-check"></i> Select
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                    
    
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Product Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th width="10%">Discount Item (%)</th>
                                <th width="15%">Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="cart_table">
                            <?php $this->view('transaction/sale/cart_data'); ?>
                            
                            <?php $subtotal = 0;
                            foreach ($cart->result() as $c => $data) {
                                $subtotal += $data->total;
                            } ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>



    <div class="row">
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="sub_total">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="row" style="font-size:12pt;">
                                        <div class="col-md-2 text-left">Rp.</div>
                                        <div class="col-md-10 text-right" id="tampilan_sub_total"><?=number_format($subtotal)?></div>
                                    </div>

                                    <input type="number" id="sub_total" value=<?=$subtotal?> class="form-control" readonly style="display:none;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="discount">Discount</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="discount" value="0" min="0" max="100" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="grand_total">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="row" style="font-size:12pt;">
                                        <div class="col-md-2 text-left">Rp.</div>
                                        <div class="col-md-10 text-right" id="tampilan_grand_total"></div>
                                    </div>
                                    <input type="number" id="grand_total" class="form-control" readonly style="display:none;">
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
                            <td style="vertical-align:top; width:30%">
                                <label for="cash">Cash</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="cash" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="change">Change</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="row" style="font-size:12pt;">
                                        <div class="col-md-2 text-left">Rp.</div>
                                        <div class="col-md-10 text-right" id="tampilan_change"></div>
                                    </div>
                                    <input type="number" id="change" class="form-control" readonly style="display:none;">
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
                            <td style="vertical-align:top">
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
                    <i class="fa fa-refresh"></i> Cancel
                </button><br><br>
                <button id="process_payment" class="btn btn-flat btn-lg btn-success">
                    <i class="fa fa-paper-plane-o"></i> Process Payment
                </button> 
            </div>
        </div>
    </div>
</section>

<!-- <div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add Product Item</h4>
            </div>
            <div class="modal-body table-responsive">
                <table id="table1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($item as $i => $data) { ?>
                            <tr>
                                <td><?=$data->barcode?></td>
                                <td><?=$data->name?></td>
                                <td><?=$data->unit_name?></td>
                                <td class="text-right">Rp.<?=indo_currency($data->price)?></td>
                                <td class="text-right"><?=$data->stock?></td>
                                <td class="text-center">
                                    <button id="select" 
                                    data-barcode="<?=$data->barcode?>" 
                                    data-name="<?=$data->name?>" 
                                    data-itemid="<?=$data->item_id?>" 
                                    data-price="<?=$data->price?>" 
                                    data-stock="<?=$data->stock?>" 
                                    class="btn btn-xs btn-info">
                                        <i class="fa fa-check"></i> Select
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div> -->

<div class="modal fade" id="modal-item-edit">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Update Product Item</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="product_item">Product Item</label>
                    <input type="hidden" id="cartid_item">
                    <input type="text" id="barcode_item" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <input type="text" id="product_item" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="price_item">Price</label>
                    <input type="number" id="price_item" min="0" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="qty_item">Qty</label>
                    <input type="number" id="qty_item" min="1" class="form-control">
                </div>
                <div class="form-group">
                    <label for="discount_item">Discount Item</label>
                    <input type="number"" id="discount_item" min="0" max="100" class="form-control">
                </div>
                <div class="form-group">
                    <label for="total_item">Total</label>
                    <input type="number" id="total_item" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button type="button" id="edit_cart" class="btn btn-flat btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function addCommas(nStr){
    nStr += '';
    x = nStr.split(',');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

$(document).ready(function() {
    oTable = $('#table1').DataTable();   
        $('#myInputTextField').keyup(function(){
              oTable.search($(this).val()).draw() ;
        })

    if($('#level').val()==1){
        $('#customer').select2();
    }
    // $('#customer').select2();
    count();
})

// choose item
$(document).on('click', '#select', function() {
    var barcode = $(this).data('barcode')
    $('#barcode').val(barcode)
    $('#item_id').val($(this).data('itemid'))
    $('#price').val($(this).data('price'))
    $('#name').val($(this).data('name'))
    $('#stock').val($(this).data('stock'))
    $('#modal-item').modal('hide')
})

function count() {
    var subtotal = 0
    $('#cart_table tr').each(function() {
        var sub = $(this).find('#total').text();
        sub = sub.replace(/\./g, '');
        subtotal += parseInt(sub);
        // subtotal += parseInt($(this).find('#total').text())
    })
    // isNaN(subtotal) ? $("#sub_total").val(0); : $("#sub_total").val(subtotal);

    if(isNaN(subtotal)){
        $("#sub_total").val(0);
        $("#tampilan_sub_total").html(0);
    }else{
        $("#sub_total").val(subtotal);
        $("#tampilan_sub_total").html(addCommas(subtotal));
    }

    var discount = $('#discount').val()
    var grand_total = subtotal * (('100' - discount) / '100')

    if(isNaN(grand_total)) {
        $('#grand_total').val(0)
        $('#tampilan_grand_total').html(0)
        $('#grand_total2').text(0)
    } else {
        $('#grand_total').val(grand_total)
        $('#grand_total2').text(addCommas(grand_total))
        $('#tampilan_grand_total').text(addCommas(grand_total))
    }

   var cash = $('#cash').val()
    cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)
    if (isNaN(cash - grand_total)){
        $('#tampilan_change').html("0")
    }else if((cash - grand_total) < 0){
         $('#tampilan_change').html("Uang masih kurang")
    }   else{
    $('#tampilan_change').text(addCommas((cash - grand_total)))
    }
}

// add item to cart table
$(document).on('click', '#add_cart', function() {
    var item_id = $('#item_id').val()
    var stock = $('#stock').val()
    var price = $('#price').val()
    var qty = $('#qty').val()
    if(item_id == '') {
        alert('Product belum dipilih')
        $('#barcode').focus()
    } else if(stock < 1) {
        alert('Stock tidak mencukupi')
        $('#item_id').val('')
        $('#barcode').val('')
        $('#name').val('')
        $('#barcode').focus()
    } else {
        $.ajax({
            type: 'POST',
            url: '<?=site_url('sale/process')?>',
            data: {'add_cart': true, 'item_id': item_id, 'price': price, 'qty': qty},
            dataType: 'json',
            success: function(result) {
                if(result.success == true) {
                    $('#cart_table').load('<?=site_url('sale/cart_data')?>', function() {
                        count()
                    })
                    $('#item_id').val('')
                     $('#name').val('')
                    $('#barcode').val('')
                    $('#barcode').focus()
                } else {
                    alert('Gagal tambah item cart')
                }
            }
        })
    }
})

// del cart item
$(document).on('click', '#del_cart', function() {
    if(confirm('Apakah Anda yakin?')) {
        var cart_id = $(this).data('cartid')
        $.ajax({
            type: 'POST',
            url: '<?=site_url('sale/cart_del')?>',
            data: {'cart_id': cart_id},
            dataType: 'json',
            success: function(result) {
                if(result.success == true) {
                    $('#cart_table').load('<?=site_url('sale/cart_data')?>', function() {
                        count();
                    })
                } else {
                    alert('Gagal hapus item cart')
                }
            }
        })
    }
})

$(document).on('keyup mouseup', '#discount, #cash', function() {
    count()
})

// on modal cart
$(document).on('click', '#update_cart', function() {
    $('#cartid_item').val($(this).data('cartid'))
    $('#barcode_item').val($(this).data('barcode'))
    $('#product_item').val($(this).data('product'))
    $('#price_item').val($(this).data('price'))
    $('#qty_item').val($(this).data('qty'))
    $('#discount_item').val($(this).data('discount'))
    $('#total_item').val($(this).data('total'))
})

function count_on_modal() {
    var price = $('#price_item').val()
    var qty = $('#qty_item').val()
    var discount = $('#discount_item').val()
    total = ( (price * ('100' - discount)) / '100' ) * qty
    $('#total_item').val(total)
}

// edit cart item
$(document).on('click', '#edit_cart', function() {
    var cart_id = $('#cartid_item').val()
    var price = $('#price_item').val()
    var qty = $('#qty_item').val()
    var discount = $('#discount_item').val()
    var total = $('#total_item').val()
    if(price == '') {
        alert('Harga tidak boleh kosong')
        $('#price_item').focus()
    } else if(qty == '') {
        alert('Qty tidak boleh kosong')
        $('#qty_item').focus()
    } else if(discount == '') {
        alert('Diskon tidak boleh kosong')
        $('#discount_item').focus()
    } else if(discount > '100') {
        alert('Diskon tidak boleh lebih dari 100 %')
        $('#discount_item').focus()
    } else {
        $.ajax({
            type: 'POST',
            url: '<?=site_url('sale/process')?>',
            data: {'edit_cart': true, 'cart_id': cart_id, 'price': price, 'qty': qty, 'discount': discount, 'total': total},
            dataType: 'json',
            success: function(result) {
                if(result.success == true) {
                    $('#cart_table').load('<?=site_url('sale/cart_data')?>', function() {
                        count();
                    })
                    $('#modal-item-edit').modal('hide')
                } else {
                    alert('Gagal update item cart')
                }
            }
        })
    }
})

$(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function() {
    count_on_modal()
})

// cancel payment
$(document).on('click', '#cancel_payment', function() {
    if(confirm('Apakah Anda yakin?')) {
        $.ajax({
            type: 'POST',
            url: '<?=site_url('sale/cart_del')?>',
            dataType: 'json',
            success: function(result) {
                if(result.success == true) {
                    $('#cart_table').load('<?=site_url('sale/cart_data')?>', function() {
                        count()
                    })
                }
            }
        })
        $('#discount').val(0)
        $('#cash').val(0)
        // $('#customer').val(0).change()
        $('#barcode').val('')
        $('#barcode').focus()
        $('#name').val('')
    }
})

// process payment
$(document).on('click', '#process_payment', function() {
    if($('#sub_total').val() < 1) {
        alert('Belum ada product item yang dipilih')
        $('#barcode').focus()
    } else if($('#cash').val() < 1) {
        alert('Jumlah uang cash belum diinput')
        $('#cash').focus()
    } else if($('#change').val() < 1) {
        alert('Uang kurang')
        $('#cash').focus()
    } else if($('#discount').val() > 100) {
        alert('Diskon tidak boleh lebih dari 100 %')
        $('#discount').focus()
    } else {
        if(confirm('Yakin proses transaksi ini?')) {
            var customer_id = $('#customer').val()
            var subtotal = $('#sub_total').val()
            var discount = $('#discount').val()
            var grandtotal = $('#grand_total').val()
            var cash = $('#cash').val()
            var change = $('#change').val()
            var note = $('#note').val()
            var date = $('#date').val()
            $.ajax({
                type: 'POST',
                url: '<?=site_url('sale/process')?>',
                data: {'process_payment': true, 'customer_id': customer_id, 'subtotal': subtotal, 'discount': discount, 'grandtotal': grandtotal, 'cash': cash, 'change': change, 'note': note, 'date': date},
                dataType: 'json',
                success: function(result) {
                    if(result.success == true) {
                        alert('Transaksi berhasil')
                        window.open('<?=site_url('sale/print/')?>'+result.sale_id, '_blank')
                    } else {
                        alert('Transaksi gagal')
                    }
                    location.href='<?=site_url('sale')?>'
                }
            })
        }
    }
})
</script>