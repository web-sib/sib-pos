<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="m-0 text-dark">Categories</h1>
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
                            <h5>Data categories</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-right">
                                <a href="<?= base_url('categories/addCategories') ?>" class="btn btn-primary btn-flat m-2"><i class="fas fa-plus"></i> Create</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>Name</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($categories as $suplier => $data) : ?>
                                            <tr>
                                                <td width="5%"><?= $no++; ?></td>
                                                <td><?= $data->name; ?></td>
                                                <td class="text-center" width="160px">
                                                    <a href="<?= base_url('categories/updateCategories/' . $data->id_categories); ?>" class="btn btn-success btn-xs" width="200px"><i class="fas fa-edit"></i> Update</a>
                                                    <button data-delete="<?= $data->id_categories; ?>" class="btn btn-danger btn-xs deleteCategori" width="200px"><i class="fas fa-trash"></i> Delete</button>
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