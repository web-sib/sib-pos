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
                                <h5 class="text-light">Add User</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="<?= base_url('users/index') ?>" style="width:60px" class="btn btn-warning btn-xs"><i class="fas fa-undo"></i> Back</a>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-3">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="name">Name *</label>
                                                    <input type="text" name="name" id="name" value="<?= set_value('name'); ?>" class="form-control <?= form_error('name') == true ? 'is-invalid' : null; ?>">
                                                    <?= form_error('name'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Username *</label>
                                                    <input type="text" name="username" id="username" value="<?= set_value('username'); ?>" class="form-control <?= form_error('username') == true ? 'is-invalid' : null; ?>">
                                                    <?= form_error('username'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password *</label>
                                                    <input type="password" name="password" id="password" class="form-control <?= form_error('password') == true ? 'is-invalid' : null; ?>">
                                                    <?= form_error('password'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password_confirm">Password Confirmation *</label>
                                                    <input id="password_confirm" type="password" name="password_confirm" class="form-control <?= form_error('password_confirm') == true ? 'is-invalid' : null; ?>">
                                                    <?= form_error('password_confirm'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="address">Address(optional)</label>
                                                    <textarea name="address" value="<?= set_value('address'); ?>" id="address" cols="30" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="level">Level *</label>
                                                    <select name="level" id="level" value="<?= set_value('level'); ?>" class="form-control <?= form_error('level') == true ? 'is-invalid' : null; ?>">
                                                        <option selected disabled value="">--pilih--</option>
                                                        <option value="1" <?= set_value('level') == 1 ? "selected" : null; ?>>Admin</option>
                                                        <option value="2" <?= set_value('level') == 2 ? "selected" : null; ?>>Kasir</option>
                                                    </select>
                                                    <?= form_error('level'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-flat"><i class="fas fa-user-plus"></i> Add User</button>
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