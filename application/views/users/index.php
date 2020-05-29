<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="m-0 text-dark">Users</h1>
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
                            <h5>Data users</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-right">
                                <a href="<?= base_url('users/addUser') ?>" class="btn btn-primary btn-flat m-2"><i class="fas fa-user-plus"></i>Create</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Address</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($users->result() as $user => $data) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data->user; ?></td>
                                                <td><?= $data->nama; ?></td>
                                                <td><?= $data->addres; ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('users/edit_user/' . $data->id_user); ?>" class="btn btn-success btn-xs" width="200px"><i class="fas fa-edit"></i> Update</a>
                                                    <button data-delete="<?= $data->id_user; ?>" class="btn btn-danger btn-xs deleteUser" width="200px"><i class="fas fa-trash"></i> Delete</button>
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