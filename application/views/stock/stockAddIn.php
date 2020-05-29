<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="m-0 text-dark">Stock <small>barang masuk</small></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="container">

            <section>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h5 class="text-light">Add Stock</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="<?= base_url('stock/in/stock_data') ?>" style="width:60px" class="btn btn-warning btn-xs"><i class="fas fa-undo"></i> Back</a>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-3">
                                    <form action="<?= base_url('stock/process') ?>" method="post">
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="date">Date *</label>
                                                            <input type="date" id="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="barcode">Barcode *</label>
                                                        <div class="input-group">
                                                            <input type="text" name="barcode" class="form-control" id="barcode" required>
                                                            <div class="input-group-prepend">
                                                                <span data-toggle="modal" data-target="#exampleModalCenter" class="input-group-text" id="search"><i class="text-primary fas fa-search"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="id_item" name="id_item">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="nama_item">Nama item *</label>
                                                            <input type="text" id="nama_item" name="nama_item" class="form-control" required readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="item_unit">item unit *</label>
                                                            <input type="text" id="item_unit" name="item_unit" class="form-control" value="-" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="stock_awal">Stock awal *</label>
                                                            <input type="text" id="stock_awal" name="stock_awal" class="form-control" value="-" required readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="detail">Detail *</label>
                                                            <input type="text" id="detail" placeholder="contoh: tambah/stock baru masuk" name="detail" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="suplier">Suplier *</label>
                                                    <select class="form-control" name="suplier" id="suplier">
                                                        <option value="" selected disabled>-- pilih --</option>
                                                        <?php foreach ($suplier as $sup => $data) : ?>
                                                            <option value="<?= $data->id_suplier ?>"><?= $data->name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="qty">Qty *</label>
                                                    <input type="number" id="qty" name="qty" class="form-control" value="-" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-flat" name="add_in"><i class="fas fa-plus"></i> Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">product item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
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
                                <td><?= $data->stock; ?></td>
                                <td>
                                    <button data-name="<?= $data->name ?>" data-barcode="<?= $data->barcode ?>" data-units="<?= $data->unitsName ?>" data-id_item="<?= $data->id_items; ?>" data-stock="<?= $data->stock ?>" data-dismiss="modal" class="btn btn-primary btn-xs pilih"><i class="fas fa-check"></i> select</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>