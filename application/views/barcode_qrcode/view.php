<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="m-0 text-dark">BarcodeQRcode</h1>
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

            <div class="row mb-3">
                <div class="col text-right">
                    <a href="<?= base_url('items') ?>" style="width:60px" class="btn btn-warning btn-xs"><i class="fas fa-undo"></i> Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <section>
                        <div class="row">
                            <div class="col">
                                <div class="card" style="height:300px;">
                                    <div class="card-header bg-dark">
                                        <h5 class="text-light"> Barcode</h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="row">
                                            <div class="col">
                                                <?php
                                                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                                echo '<img style="margin-top:15%;" height="30px"; src="data:image/png;base64,' . base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128)) . '">';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <a style="margin-top: 35px;" target="_blank" class="btn btn-default btn-sm" href="<?= base_url('items/previewBarcode/') . $code ?>"><i class="fas fa-print"></i> Print</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-6">
                    <section>
                        <div class="row">
                            <div class="col">
                                <div class="card" style="height:300px;">
                                    <div class="card-header bg-dark">
                                        <h5 class="text-light"> Qrcode</h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="row">
                                            <div class="col">
                                                <?php
                                                $params['data'] = $code;
                                                $params['level'] = 'H';
                                                $params['size'] = 10;
                                                $params['savename'] = FCPATH . 'tes.png';
                                                $this->ciqrcode->generate($params);

                                                echo '<img width="170px" src="' . base_url() . 'tes.png" />';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col">
                                                <a target="_blank" class="btn btn-default btn-sm" href="<?= base_url('items/previewQrcode/') . $code ?>"><i class="fas fa-print"></i> Print</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>