<?php
foreach ($chart as $char => $data) :
  $prod[] = ['label' => $data->item_name, 'y' =>  $data->jumlahAll];
endforeach; ?>
<script type="text/javascript">
  window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      theme: "light2",
      title: {
        text: "Barang terlaris pada <?= date('d, m Y') ?>"
      },
      axisY: {
        includeZero: false
      },
      // data: [{
      //   // Change type to "bar", "area", "spline", "pie",etc.
      //   type: "column",
      //   dataPoints: [{
      //       label: "apple",
      //       y: 10
      //     },
      //     {
      //       label: "orange",
      //       y: 15
      //     },
      //     {
      //       label: "banana",
      //       y: 25
      //     },
      //     {
      //       label: "mango",
      //       y: 30
      //     },
      //     {
      //       label: "grape",
      //       y: 28
      //     }
      //   ]
      // }]
      data: [{
        type: "line",
        dataPoints: <?= json_encode($prod, JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart.render();

  }
</script>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col">
        <h1 class="m-0 text-dark">Dashboard</h1>
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
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $this->data->item_count(); ?></h3>

            <p>Items</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="<?= base_url('items') ?>" class="small-box-footer">More data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $this->data->suplier_count(); ?></h3>

            <p>Suplier</p>
          </div>
          <div class="icon">
            <i class="ion ion-cube"></i>
          </div>
          <a href="<?= base_url('suplier') ?>" class="small-box-footer">More data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?= $this->data->customer_count(); ?></h3>

            <p>Customer</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?= base_url('customers') ?>" class="small-box-footer">More data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?= $this->data->user_count(); ?></h3>

            <p>Users</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="<?= base_url('users') ?>" class="small-box-footer">More data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <?php if ($chart != null) : ?>
        <!-- Left col -->
        <section class="col-md-12 connectedSortable">
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </section>
        <!-- right col -->
      <?php else : ?>
        <section class="col-md-12 text-center">
          <div class="card">
            <div class="card-header">
              BARANG TERLARIS
            </div>
            <div class="card-body">
              <h2 style="font-family: roboto;" class="text-danger">BELUM ADA TRANSAKSI BULAN INI !!!!</h2>
            </div>
          </div>
        </section>
      <?php endif; ?>
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>