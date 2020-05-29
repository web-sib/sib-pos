<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="m-0 text-dark">Units</h1>
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
                                <h5 class="text-light"><?= ucfirst($page); ?> Units</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="<?= base_url('units/index') ?>" style="width:60px" class="btn btn-warning btn-xs"><i class="fas fa-undo"></i> Back</a>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-3">
                                    <form action="<?= base_url('units/proccess') ?>" method="post">
                                        <div class="row">
                                            <div class="col-md-6 offset-md-3">
                                                <div class="form-group">
                                                    <label for="name">Name *</label>
                                                    <input type="hidden" name="id" value="<?= $this->input->post('id') ?? $value->id_units ?>">
                                                    <input type="text" required name="name" id="name" value="<?= $this->input->post('name') ?? $value->name; ?>" class="form-control <?= form_error('name') == true ? 'is-invalid' : null; ?>">
                                                    <?= form_error('name'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 offset-md-3">
                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-flat" name="<?= $page; ?>"><i class="fas fa-plus"></i> <?= $page ?></button>
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