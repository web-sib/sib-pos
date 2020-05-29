<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="m-0 text-dark">Stock</h1>
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
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-dark text-light">
                            <h5>Data stock</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-right">
                                <a href="<?= base_url('stock/out/add_stock') ?>" class="btn btn-primary btn-flat m-2"><i class="fas fa-plus"></i>Create</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>Item</th>
                                            <th>Suplier</th>
                                            <th>User</th>
                                            <th>Detail</th>
                                            <th>Qty</th>
                                            <th>Date</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($stock as $stck => $data) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td class="text-left"><?= $data->itemsName; ?></td>
                                                <td><?= $data->suplierName; ?></td>
                                                <td><?= $data->userName; ?></td>
                                                <td><?= $data->detail; ?></td>
                                                <td><?= $data->qty; ?></td>
                                                <td><?= date_local($data->date); ?></td>
                                                <td class="text-center">
                                                    <a data-toggle="modal" data-target="#seeDetail" href="<?= base_url('stock/out/detailStockOut/' . $data->id_stock); ?>" class="btn btn-warning btn-xs viewDetail" width="200px" data-barcode="<?= $data->barcode ?>" data-item="<?= $data->itemsName ?>" data-detail="<?= $data->detail ?>" data-suplier="<?= $data->suplierName ?>" data-qty="<?= $data->qty ?>" data-date="<?= $data->date ?>"><i class="far fa-eye"></i> Detail</a>
                                                    <button data-delete="<?= $data->id_stock; ?>" class="btn btn-danger btn-xs deleteStockOut" width="200px"><i class="fas fa-trash"></i> Delete</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>

<!-- Modal -->
<div class="modal fade" id="seeDetail" tabindex="-1" role="dialog" aria-labelledby="seeDetailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="seeDetailTitle">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive-sm">
                <table class="table">
                    <tr>
                        <th>Barcode</th>
                        <td><span id="barcode"></span></td>
                    </tr>
                    <tr>
                        <th>Item</th>
                        <td><span id="item"></span></td>
                    </tr>
                    <tr>
                        <th>Detail</th>
                        <td><span id="detail"></span></td>
                    </tr>
                    <tr>
                        <th>Qty</th>
                        <td><span id="qty"></span></td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td><span id="date"></span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>