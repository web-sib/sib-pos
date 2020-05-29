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

            <section>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h5 class="text-light"><?= ucfirst($page); ?> Items</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="<?= base_url('items/index') ?>" style="width:60px" class="btn btn-warning btn-xs"><i class="fas fa-undo"></i> Back</a>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-3">
                                    <?= form_open_multipart('items/proccess'); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="barcode">Barcode *</label>
                                                <input type="hidden" name="id" value="<?= $this->input->post('id') ?? $value->id_items ?>">
                                                <?php if ($page == 'add') : ?>
                                                    <input readonly type="text" name="barcode" id="barcode" value="<?= barcodeRender(); ?>" class="form-control <?= form_error('barcode') == true ? 'is-invalid' : null; ?>">
                                                    <?= form_error('barcode'); ?>
                                                <?php else : ?>
                                                    <input readonly type="text" name="barcode" id="barcode" value="<?= $this->input->post('barcode') ?? $value->barcode; ?>" class="form-control <?= form_error('barcode') == true ? 'is-invalid' : null; ?>">
                                                    <?= form_error('barcode'); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name *</label>
                                                <input type="text" required name="name" id="name" value="<?= $this->input->post('name') ?? $value->name; ?>" class="form-control <?= form_error('name') == true ? 'is-invalid' : null; ?>">
                                                <?= form_error('name'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="categories">Categories *</label>
                                                <?= form_dropdown('categories', $categories, $selected, ['class' => 'form-control', 'required' => 'required']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="units">Units *</label>
                                                <?= form_dropdown('units', $units, $selecteds, ['class' => 'form-control', 'required' => 'required']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="price">Price *</label>
                                                <input type="number" required name="price" id="price" value="<?= $this->input->post('price') ?? $value->price; ?>" class="form-control <?= form_error('price') == true ? 'is-invalid' : null; ?>">
                                                <?= form_error('price'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="image">Image (<?= $page == "add" ? 'tidak wajib di isi' : 'image anda saat ini' ?>)</label>
                                                <?php if ($value->image != null) : ?>
                                                    <div class="mb-3">
                                                        <img style="width: 300px; height: 200px;" src="<?= base_url('uploads/product/') . $value->image; ?>" ?>
                                                    </div>
                                                <?php else : ?>
                                                    <i>tidak ada image</i>
                                                <?php endif; ?>
                                                <?php if ($page == "update") : ?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="text-danger text-monospace">*Daerah terlarang (tidak usah ini form dibawah ini jika tidak ingin mengubah foto)</h6>
                                                            <input type="checkbox" id="check_for_edit"> <i class="fas fa-check"></i> untuk ubah foto
                                                        </div>
                                                    </div>
                                                    <div class="border border-danger shadow-sm mb-3">
                                                        <fieldset disabled>
                                                            <input type="file" name="image" id="image" value="<?= $this->input->post('image') ?? $value->image; ?>" class="form-control">
                                                        </fieldset>
                                                    </div>
                                                <?php else : ?>
                                                    <input type="file" name="image" id="image" value="<?= $this->input->post('image') ?? $value->image; ?>" class="form-control">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-flat" name="<?= $page; ?>"><i class="fas fa-plus"></i> <?= $page; ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
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