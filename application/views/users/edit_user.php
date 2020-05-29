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

            <section>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h5 class="text-light">Edit User</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="<?= base_url('users/index') ?>" style="width:60px" class="btn btn-warning btn-xs"><i class="fas fa-undo"></i> Back</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Name *</label>
                                                        <input type="text" name="name" id="name" value="<?= $this->input->post('name') ?? $user->nama; ?>" class="form-control">
                                                        <?= form_error('name'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="username">Username *</label>
                                                        <input type="hidden" name="id" value="<?= $user->id_user ?>">
                                                        <input type="text" name="username" id="username" value="<?= $this->input->post('username') ?? $user->user; ?>" class="form-control">
                                                        <?= form_error('username'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="address">Address(optional)</label>
                                                        <textarea name="address" id="address" cols="30" rows="5" class="form-control"><?= $this->input->post('address') ?? $user->addres; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="level">Level *</label>
                                                        <select name="level" id="level" class=" form-control">
                                                            <?php $level = $this->input->post('level') ? $this->input->post('level') : $user->level; ?>
                                                            <option value="1">Admin</option>
                                                            <option value="2" <?= $level == 2 ? "selected" : null; ?>>Kasir</option>
                                                        </select>
                                                        <?= form_error('level'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <h6 class="text-danger text-monospace">*Daerah terlarang (tidak usah ini form dibawah ini jika tidak ingin mengubah password)</h6>
                                                    <input type="checkbox" id="check_for_edit"> <i class="fas fa-check"></i> untuk edit password
                                                </div>
                                            </div>
                                            <div class="row border border-danger shadow-sm mb-3">
                                                <div class="col">
                                                    <fieldset disabled>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="newpassword">Password baru</label>
                                                                    <input type="password" id="newpassword" name="newpassword" class="form-control">
                                                                    <?= form_error('newpassword') ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="password_confirm">konfirmasi password</label>
                                                                    <input type="password" id="password_confirm" name="password_confirm" class="form-control">
                                                                    <?= form_error('password_confirm'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary btn-flat"><i class="fas fa-paper-plane"></i> save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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