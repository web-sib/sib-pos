<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="m-0 text-dark">Suplier</h1>
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
                            <h5>Data suplier</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-right">
                                <a href="<?= base_url('suplier/addSuplier') ?>" class="btn btn-primary btn-flat m-2"><i class="fas fa-plus"></i>Create</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Description</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($supliers as $suplier => $data) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data->name; ?></td>
                                                <td><?= $data->phone; ?></td>
                                                <td><?= $data->address; ?></td>
                                                <td><?= $data->description; ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('suplier/updateSuplier/' . $data->id_suplier); ?>" class="btn btn-success btn-xs" width="200px"><i class="fas fa-edit"></i> Update</a>
                                                    <button data-delete="<?= $data->id_suplier; ?>" class="btn btn-danger btn-xs deleteSuplier" width="200px"><i class="fas fa-trash"></i> Delete</button>
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