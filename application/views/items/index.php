<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="m-0 text-dark">Items</h1>
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
                            <h5>Data Items</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-right">
                                <a href="<?= base_url('items/addItems') ?>" class="btn btn-primary btn-flat m-2"><i class="fas fa-plus"></i>Create</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>BarcodeQRcode</th>
                                            <th>Name</th>
                                            <th>Categories</th>
                                            <th>Units</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Image</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($items as $item => $data) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-secondary btn-xs" href="<?= base_url('items/view_barcode/') . $data->barcode; ?>">Generate <i class="fas fa-barcode"></i></a>
                                                </td>
                                                <td class="text-left"><?= $data->name; ?></td>
                                                <td><?= $data->categoriesName; ?></td>
                                                <td><?= $data->unitsName; ?></td>
                                                <td><?= $data->price; ?></td>
                                                <td><?= $data->stock; ?></td>
                                                <td>
                                                    <?php if ($data->image != null) : ?>
                                                        <img src="<?= base_url('uploads/product/') . $data->image ?>" style="width: 50px; height: 50px">
                                                    <?php else : ?>
                                                        <img src="<?= base_url('uploads/product/default.png') ?>" style="width: 50px; height: 50px">
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('items/updateItems/' . $data->id_items); ?>" class="btn btn-success btn-xs" width="200px"><i class="fas fa-edit"></i> Update</a>
                                                    <button data-delete="<?= $data->id_items; ?>" class="btn btn-danger btn-xs deleteItem" width="200px"><i class="fas fa-trash"></i> Delete</button>
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