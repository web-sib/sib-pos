<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="m-0 text-dark">Sale/penjualan barang</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="container">
            <section class="content">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-0">
                                    <div class="col-md-4 border">
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" readonly value="<?= date('Y-m-d') ?>" id="date" name="date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="kasir">Kasir</label>
                                            <input id="kasir" readonly value="<?= $this->data->get_data()->user; ?>" name="kasir" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="customer">Customer</label>
                                            <select name="customer" id="customer" class="form-control">
                                                <option value="">umum</option>
                                                <?php foreach ($customers as $customer => $data) : ?>
                                                    <option value="<?= $data->id_customers ?>"><?= $data->name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 border">
                                        <input type="hidden" id="item" name="item">
                                        <input type="hidden" id="price" name="price">
                                        <input type="hidden" id="stock" name="stock">
                                        <div class="form-group">
                                            <div class="col">
                                                <label for="kurir">Kurir</label>
                                                <select name="kurir" id="kurir" class="form-control">
                                                    <option value="">Beli di tempat</option>
                                                    <?php foreach ($kurirs as $kurir => $data) : ?>
                                                        <option <?= $data->status == 0 ? '' : 'disabled' ?> value="<?= $data->id_kurir ?>"><?= $data->name; ?> <?= $data->status == 0 ? '' : '(bertugas)' ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="text-red text-monospace" id="error_kurir"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col">
                                                <label for="barcode" class="detail">Barcode *</label>
                                                <div class="input-group">
                                                    <input type="text" readonly name="barcode" class="form-control" id="barcode" required>
                                                    <div class="input-group-prepend">
                                                        <span data-toggle="modal" data-target="#selectBarcode" class="input-group-text" id="search"><i class="text-primary fas fa-search"></i></span>
                                                    </div>
                                                </div>
                                                <span class="text-red text-monospace" id="error_barcode"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col">
                                                <label for="qty">Qty</label>
                                                <input id="qty" name="qty" type="number" class="form-control">
                                                <span class="text-red text-monospace" id="error_qty"></span>
                                            </div>
                                        </div>
                                        <input id="allQty" name="allQty" type="hidden" class="form-control">
                                        <div class="form-group text-right">
                                            <div class="col">
                                                <span id="add" class="btn btn-success btn-sm"><i class="fas fa-shopping-cart"></i> Add</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 border">
                                        <div class="text-right">
                                            <h4>Invoice<b><span id="invoice"><?= $invoice ?></span></b></h4>
                                            <h1><b><span id="total_bayar2" style="font-size: 30pt">0</span></b></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-0">
                                    <div class="table-responsive">
                                        <table class="table table-bordered m-0 tabel">
                                            <tr>
                                                <th>Barcode</th>
                                                <th>Product Item</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Discount Item</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <form action="">
                                    <div class="form-group row">
                                        <label for="sub_total" class="col-md-4 col-form-label" style="font-size: 10pt">Sub total</label>
                                        <div class="col-md-8">
                                            <input readonly type="text" class="form-control" name="sub_total" id="sub_total">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="discount" class="col-md-4 col-form-label" style="font-size: 10pt">Discount</label>
                                        <div class="col-md-8">
                                            <input type="text" value="0" class="form-control" name="discount" id="discount">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="total_bayar" class="col-md-4 col-form-label" style="font-size: 10pt">Total bayar</label>
                                        <div class="col-md-8">
                                            <input readonly type="text" class="form-control" name="total_bayar" id="total_bayar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="cash" class="col-md-5 col-form-label" style="font-size: 10pt">Uang</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" value="0" name="cash" id="cash">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="change" class="col-md-5 col-form-label" style="font-size: 10pt">
                                        Kembalian</label>
                                    <div class="col-md-7">
                                        <input readonly type="text" value="0" class="form-control" name="change" id="change">
                                        <span style="font-size:10pt" class="text-red text-monospace" id="message"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="note" class="col-md-4 col-form-label" style="font-size: 10pt">Note</label>
                                    <div class="col-md-8">
                                        <textarea style="height: 150px;" class="form-control" name="note" id="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col mb-3">
                        <div class="text-right">
                            <button id="cancel" class="btn btn-warning btn-sm"><i class="fas fa-reply-all"></i> Cancel</button>
                            <button id="bayar" class="btn btn-success btn-sm"><i class="fas fa-credit-card"></i> Bayar</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="selectBarcode" tabindex="-1" role="dialog" aria-labelledby="selectBarcodeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectBarcodeTitle">product item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item => $data) :  ?>
                            <tr>
                                <td><?= $data->barcode; ?></td>
                                <td><?= $data->name; ?></td>
                                <td><?= $data->unitsName; ?></td>
                                <td><?= rupiah($data->price); ?></td>
                                <td id="<?= $data->barcode ?>_Mystock"><?= $data->stock; ?></td>
                                <td>
                                    <button data-name="<?= $data->name ?>" data-barcode="<?= $data->barcode ?>" data-units="<?= $data->unitsName ?>" data-id_item="<?= $data->id_items; ?>" data-stock="<?= $data->stock ?>" data-price="<?= $data->price ?>" data-dismiss="modal" class="btn btn-primary btn-xs masuk"><i class="fas fa-check"></i> select</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal edit -->
<div class="modal fade" id="editTotal" tabindex="-1" role="dialog" aria-labelledby="editTotalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTotalTitle">Edit pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive mb-0">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Discount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden" id="barcode_form">
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="price_form" class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="qty_form" class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="discount_form" class="form-control">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row mb-3 mr-2">
                <div class="col text-right">
                    <button data-dismiss="modal" class="btn btn-danger btn-sm ubah"><i class="fas fa-pen"></i> Ubah</button>
                </div>
            </div>
        </div>
    </div>
</div>