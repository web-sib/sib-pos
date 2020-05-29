<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="m-0 text-dark">sale Report</h1>
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
                            <h5>Data sale report</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-right">
                                <a href="<?= base_url('sale') ?>" class="btn btn-primary btn-flat m-2"><i class="fas fa-shopping-cart"></i>GoTransaksi</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>Invoice</th>
                                            <th>Customer</th>
                                            <th>Kasir</th>
                                            <th>Sub total</th>
                                            <th>Discount</th>
                                            <th>Total</th>
                                            <th>Uang</th>
                                            <th>Kembalian</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($report_sale as $item => $data) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td class="text-center"><?= $data->invoice ?></td>
                                                <td class="text-left"><?= $data->names == null ? 'Umum' : $data->names; ?></td>
                                                <td><?= $data->kasir; ?></td>
                                                <td><?= rupiah($data->sub_total); ?></td>
                                                <td><?= rupiah($data->discount); ?></td>
                                                <td><?= rupiah($data->total); ?></td>
                                                <td><?= rupiah($data->uang); ?></td>
                                                <td><?= rupiah($data->kembalian); ?></td>
                                                <td class="text-center">
                                                    <a target="_blank" href="<?= base_url('report/cetakSaleReport/' . $data->id_sale); ?>" class="btn btn-default btn-xs" width="200px"><i class="fas fa-print"></i> Cetak</a>
                                                    <button data-delete="<?= $data->id_sale; ?>" class="btn btn-danger btn-xs deleteSaleReport" width="200px"><i class="fas fa-trash"></i> Delete</button>
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