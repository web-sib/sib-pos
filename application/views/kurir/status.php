<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="m-0 text-dark">Status kurir</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php foreach ($kurirs as $kurir => $data) : ?>
                <?php if ($data->status != 0) { ?>
                    <div class="col-md-3 text-center">
                        <div class="alert alert-info" role="alert">
                            <span>Kurir <?= ucfirst($data->name) ?> <i class="fas fa-truck-moving fa-lg text-dark"></i> Pengiriman</span>
                        </div>
                    </div>
                    <!-- ./col -->
                <?php } ?>
            <?php endforeach; ?>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col">
                <div class="card text-center">
                    <div class="card-header">
                        <h5 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><b>KODE</b></h5>
                        <h5 class="mb-3">Masukan kode kurir untuk otomatis mematikan status aktif jika kurir sudah selesai pengiriman dan kembali</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><input id="inputKode" placeholder="Tekan enter untuk process" style="width:300px;height:50px;" type="text"></p>
                        <a href="#" data-toggle="modal" data-target="#kodeAnggota" class="btn btn-primary"><i class="fas fa-user"></i> KODE ANGGOTA</a>
                    </div>
                    <div class="card-footer text-muted">
                        #KURIR
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>

<!-- Modal -->
<div class="modal fade" id="kodeAnggota" tabindex="-1" role="dialog" aria-labelledby="kodeAnggotaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kodeAnggotaTitle">Status anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Kode</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kurirs as $kurir => $data) :  ?>
                            <tr>
                                <td><?= $data->name; ?></td>
                                <td><?= $data->kode; ?></td>
                                <td>
                                    <?php if ($data->status == 0) : ?>
                                        <button class="btn btn-danger btn-xs">Tidak aktif</button>
                                    <?php else : ?>
                                        <button class="btn btn-success btn-xs">Aktif</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>