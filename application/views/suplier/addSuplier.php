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

            <section>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h5 class="text-light"><?= ucfirst($page); ?> Suplier</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="<?= base_url('suplier/index') ?>" style="width:60px" class="btn btn-warning btn-xs"><i class="fas fa-undo"></i> Back</a>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-3">
                                    <form action="<?= base_url('suplier/proccess') ?>" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name *</label>
                                                    <input type="hidden" name="id" value="<?= $this->input->post('id') ?? $value->id_suplier ?>">
                                                    <input type="text" required name="name" id="name" value="<?= $this->input->post('name') ?? $value->name; ?>" class="form-control <?= form_error('name') == true ? 'is-invalid' : null; ?>">
                                                    <?= form_error('name'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Phone *</label>
                                                    <input type="text" name="phone" id="phone" value="<?= $this->input->post('phone') ?? $value->phone; ?>" class="form-control <?= form_error('phone') == true ? 'is-invalid' : null; ?>">
                                                    <?= form_error('phone'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="address">Address *</label>
                                                    <textarea name="address" id="address" cols="30" rows="5" class="form-control <?= form_error('address') == true ? 'is-invalid' : null; ?>"><?= $this->input->post('address') ?? $value->address; ?></textarea>
                                                    <?= form_error('address'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="description">description(optional)</label>
                                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control <?= form_error('description') == true ? 'is-invalid' : null; ?>"><?= $this->input->post('description') ?? $value->description; ?></textarea>
                                                    <?= form_error('description'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
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