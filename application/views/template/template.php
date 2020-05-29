<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(''); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url(''); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(''); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url(''); ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('') ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(''); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url(''); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url(''); ?>assets/plugins/summernote/summernote-bs4.css">
  <!--  -->
  <link rel="stylesheet" href="<?= base_url('') ?>assets/DataTables/datatables.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <div class="img">
              <img src="<?= base_url(''); ?>assets/dist/img/user2-160x160.jpg" class="rounded-circle" style="width: 35px;" alt="User Image">
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <h5 class="dropdown-item"><?= $this->data->get_data()->user; ?></h5>
            <img src="<?= base_url(''); ?>assets/dist/img/user2-160x160.jpg" class="rounded-circle" style="margin-left: 35%;width: 100px;">
            <h3 class="text-center mb-0"><?= $this->data->get_data()->nama; ?></h3>
            <h6 class="text-center mt-0"><?= $this->data->get_data()->addres; ?></h6>
            <div class="dropdown-divider"></div>
            <div class="container dropdown-item">
              <div class="row justify-content-right pl-5">
                <div class="col-ms-10 ml-5">
                </div>
                <div class="col-ms-2 mr-0">
                  <a href="<?= base_url('admin/logout'); ?>" class="btn btn-danger ml-2">logout</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <i class="fab fa-stackpath fa-3x" class="brand-image img-circle elevation-3" style="opacity: .8"></i>
        <span class="brand-text font-weight-light">SIB POS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('assets'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="<?= base_url('admin/index') ?>" class="d-block"><?= $this->data->get_data()->nama; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?= base_url('admin/index') ?>" class="nav-link <?= $this->uri->segment(1) == 'admin'  || $this->uri->segment(1) == '' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('suplier') ?>" class="nav-link <?= $this->uri->segment(1) == 'suplier' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                  Supplier
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('customers') ?>" class="nav-link <?= $this->uri->segment(1) == 'customers' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Customers
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link <?= $this->uri->segment(1) == 'kurir' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-box-open"></i>
                <p>
                  Kurir
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <?php if ($this->data->get_data()->level == 1) : ?>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('kurir'); ?>" class="nav-link <?= $this->uri->segment(2) == 'anggota' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Anggota</p>
                    </a>
                  </li>
                </ul>
              <?php endif; ?>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('kurir/status'); ?>" class="nav-link <?= $this->uri->segment(2) == 'status' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Status</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link <?= $this->uri->segment(1) == 'units' || $this->uri->segment(1) == 'categories' || $this->uri->segment(1) == 'items' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-archive"></i>
                <p>
                  Product
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('categories') ?>" class="nav-link <?= $this->uri->segment(1) == 'categories' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('units') ?>" class="nav-link <?= $this->uri->segment(1) == 'units' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Units</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('items') ?>" class="nav-link <?= $this->uri->segment(1) == 'items' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Items</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link <?= $this->uri->segment(1) == 'stock' | $this->uri->segment(1) == 'sale' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Transactions
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('stock/in/stock_data') ?>" class="nav-link <?= $this->uri->segment(2) == 'in' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stock In</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('stock/out/stock_data') ?>" class="nav-link <?= $this->uri->segment(2) == 'out' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stock out</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('sale') ?>" class="nav-link <?= $this->uri->segment(1) == 'sale' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sales</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link <?= $this->uri->segment(1) == 'report' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Reports
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('report/sale_report'); ?>" class="nav-link <?= $this->uri->segment(2) == 'sale_report' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sale</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php if ($this->data->get_data()->level == 1) : ?>
              <li class="nav-header">Setting</li>
              <li class="nav-item">
                <a href="<?= base_url('users/index') ?>" class="nav-link <?= $this->uri->segment(1) == 'users' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Users</p>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?= $contents; ?>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>SIBPOS <a href="#">By Akhmad Aji Febrianto</a>.</strong>
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url(''); ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url(''); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(''); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url(''); ?>assets/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url(''); ?>assets/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url(''); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url(''); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url(''); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url(''); ?>assets/plugins/moment/moment.min.js"></script>
  <script src="<?= base_url(''); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url(''); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url(''); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url(''); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('') ?>assets/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= base_url('') ?>assets/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('') ?>assets/dist/js/demo.js"></script>
  <script src="<?= base_url('') ?>assets/DataTables/datatables.min.js"></script>
  <script src="<?= base_url('') ?>assets/vendor/chart_js/chart.min.js"></script>
  <script src="<?= base_url('assets/sweetalert/dist/') ?>sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(function() {

      $('#table1').DataTable();
      $('#check_for_edit').on('click', function() {
        $('#oldpassword').val('');
        $('#newpassword').val('');
        $('#password_confirm').val('');
        if ($('fieldset').attr('disabled')) {
          $('fieldset').removeAttr('disabled')
        } else {
          $('fieldset').attr('disabled', '')
        }
      });

      $('.deleteKurir').on('click', function() {
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Kamu akan menghapus data ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url('kurir/hapusKurir/') ?>",
              dataType: "json",
              type: "post",
              data: {
                id: $(this).data('delete')
              },
              success: function(data) {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Data terhapus',
                  showConfirmButton: false,
                  timer: 2000
                });
                window.location = "<?= base_url('kurir') ?>"
              }
            })
          }
        })
      });
      $('.deleteSuplier').on('click', function() {
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Kamu akan menghapus data ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url('suplier/hapus_suplier/') ?>",
              dataType: "json",
              type: "post",
              data: {
                id: $(this).data('delete')
              },
              success: function(data) {
                if (data == 'Data tidak bisa di hapus(masih ada relasi dengan stock)') {
                  var iconThis = "error";
                } else {
                  var iconThis = "success";
                  data = "Data berhasil dihapus";
                }
                Swal.fire({
                  icon: iconThis,
                  title: 'Berhasil',
                  text: data,
                  showConfirmButton: false,
                  timer: 2000
                });
                window.location = "<?= base_url('suplier') ?>"
              }
            })
          }
        })
      });
      $('.deleteCustomer').on('click', function() {
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Kamu akan menghapus data ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url('customers/hapusCustomers/') ?>",
              dataType: "json",
              type: "post",
              data: {
                id: $(this).data('delete')
              },
              success: function(data) {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil!',
                  text: 'Data berhasil di hapus',
                  showConfirmButton: false,
                  timer: 2000
                });
                window.location = "<?= base_url('customers') ?>"
              }
            })
          }
        })
      });
      $('.deleteStockOut').on('click', function() {
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Kamu akan menghapus data ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url('stock/hapusStockOut/') ?>",
              dataType: "json",
              type: "post",
              data: {
                id: $(this).data('delete')
              },
              success: function(data) {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil!',
                  text: 'Data berhasil di hapus',
                  showConfirmButton: false,
                  timer: 2000
                });
                window.location = "<?= base_url('stock/out/stock_data') ?>"
              }
            })
          }
        })
      });
      $('.deleteStockIn').on('click', function() {
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Kamu akan menghapus data ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url('stock/hapusStockIn/') ?>",
              dataType: "json",
              type: "post",
              data: {
                id: $(this).data('delete')
              },
              success: function(data) {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil!',
                  text: 'Data berhasil di hapus',
                  showConfirmButton: false,
                  timer: 2000
                });
                window.location = "<?= base_url('stock/in/stock_data') ?>"
              }
            })
          }
        })
      });
      $('.deleteItem').on('click', function() {
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Kamu akan menghapus data ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url('items/hapus_Items/') ?>",
              dataType: "json",
              type: "post",
              data: {
                id: $(this).data('delete')
              },
              success: function(data) {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil!',
                  text: 'Data berhasil di hapus',
                  showConfirmButton: false,
                  timer: 2000
                });
                window.location = "<?= base_url('items') ?>"
              }
            })
          }
        })
      });
      $('.deleteCategori').on('click', function() {
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Kamu akan menghapus data ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url('categories/hapusCategories/') ?>",
              dataType: "json",
              type: "post",
              data: {
                id: $(this).data('delete')
              },
              success: function(data) {
                if (data == 'Data tidak bisa di hapus(masih ada relasi dengan Item)') {
                  var iconThis = "error";
                } else {
                  var iconThis = "success";
                  data = 'Data berhasil dihapus';
                }
                Swal.fire({
                  icon: iconThis,
                  title: 'Alert',
                  text: data,
                  showConfirmButton: false,
                  timer: 2000
                });
                window.location = "<?= base_url('categories') ?>"
              }
            })
          }
        })
      });
      $('.deleteUnit').on('click', function() {
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Kamu akan menghapus data ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url('units/hapusUnits/') ?>",
              dataType: "json",
              type: "post",
              data: {
                id: $(this).data('delete')
              },
              success: function(data) {
                if (data == 'Data tidak bisa di hapus(masih ada relasi dengan Item)') {
                  var iconThis = "error";
                } else {
                  var iconThis = "success";
                  data = 'Data berhasil dihapus';
                }
                Swal.fire({
                  icon: iconThis,
                  title: 'Alert',
                  text: data,
                  showConfirmButton: false,
                  timer: 2000
                });
                window.location = "<?= base_url('units') ?>"
              }
            })
          }
        })
      });
      $('.deleteSaleReport').on('click', function() {
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Kamu akan menghapus data ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url('report/hapusSaleReport/') ?>",
              dataType: "json",
              type: "post",
              data: {
                id: $(this).data('delete')
              },
              success: function(data) {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Data berhasil dihapus',
                  showConfirmButton: false,
                  timer: 2000
                });
                window.location = "<?= base_url('report/sale_report') ?>"
              }
            })
          }
        })
      });
      $('.deleteUser').on('click', function() {
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Kamu akan menghapus data ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url('users/hapus_user/') ?>",
              dataType: "json",
              type: "post",
              data: {
                id: $(this).data('delete')
              },
              success: function(data) {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Data berhasil dihapus',
                  showConfirmButton: false,
                  timer: 2000
                });
                window.location = "<?= base_url('users') ?>"
              }
            })
          }
        })
      });

      $('#inputKode').on('keydown', function(e) {
        if (e.which == 13) {
          e.preventDefault();
          $.ajax({
            url: "<?= base_url('kurir/nonactive') ?>",
            dataType: "json",
            type: "post",
            data: {
              kode: $('#inputKode').val()
            },
            success: function(data) {
              if (data != 1) {
                Swal.fire({
                  icon: 'info',
                  title: 'Oops...',
                  text: data,
                  showConfirmButton: false,
                  timer: 2000
                })
                window.location = '<?= base_url('kurir/status') ?>';
              }
              window.location = '<?= base_url('kurir/status') ?>';
            }
          })
        }
      });

      $('.pilih').on('click', function() {
        const name = $(this).data('name');
        const barcode = $(this).data('barcode');
        const units = $(this).data('units');
        const stock = $(this).data('stock');
        const id_item = $(this).data('id_item');

        $('#barcode').val(barcode);
        $('#nama_item').val(name);
        $('#item_unit').val(units);
        $('#stock_awal').val(stock);
        $('#id_item').val(id_item);
      });

      $('.viewDetail').on('click', function() {
        const barcode = $(this).data('barcode');
        const item = $(this).data('item');
        const detail = $(this).data('detail');
        const suplier = $(this).data('suplier');
        const qty = $(this).data('qty');
        const date = $(this).data('date');

        $('#barcode').text(barcode);
        $('#item').text(item);
        $('#detail').text(detail);
        $('#suplier').text(suplier);
        $('#qty').text(qty);
        $('#date').text(date);
      });

      $('.masuk').on('click', function() {
        const price = $(this).data('price');
        const barcode = $(this).data('barcode');
        const name = $(this).data('name');
        const stock = $(this).data('stock');
        const id_item = $(this).data('id_item');
        $('#add').addClass();

        $('#stockInit').val(stock);
        $('#barcode').val(barcode);
        $('#price').val(price);
        $('#stock').val(stock);
        $('#item').val(id_item);
      });

      $('#add').on('click', function() {
        $('#error_stok').text('');
        $('#error_qty').text('');
        const item = $('#item').val();

        var price = $('#price').val();
        const stock = $('#stock').val();
        const qty = $('#qty').val();
        const barcode = $('#barcode').val();
        if (qty == '') {
          $('#error_qty').text('Qty masih kosong');
        } else {
          if (stock == '0') {
            $('#error_barcode').text('Maaf stock kosong');
          } else {
            var Mybarcode = barcode + '_Mystock';
            var Mybarcode2 = document.getElementById(Mybarcode).innerHTML;
            var hasil = Mybarcode2 - qty;
            if (hasil < 0) {
              $('#qty').val('');
              $('#error_qty').text('Stock tidak mencukupi');
              document.getElementById(Mybarcode).innerHTML = Mybarcode2;
              return;
            }
            document.getElementById(Mybarcode).innerHTML = hasil;


            if ($('#total_bayar2').text() == '0') {
              var price_baru = Number(qty) * price;
              price_baru = rubah(price_baru);
              $('#allQty').val(qty);
              $('#sub_total').val(price_baru);
              $('#total_bayar').val(price_baru);
              $('#total_bayar2').text(price_baru);
            } else {
              const char = String(barcode) + "_sp";
              const allQty = Number($('#allQty').val()) + Number(qty);
              $('#allQty').val(allQty);
              if (document.getElementById(char) != null) {
                var char_ = document.getElementById(char).innerHTML;
                char_ = replace_angka(char_);
                const total = Number(qty) * Number(price);
                var total_ = total + Number(char_);
                total_ = rubah(total_);

                document.getElementById(char).innerHTML = total_;


                $.ajax({
                  url: "<?= base_url('sale/ubahKeranjang') ?>",
                  dataType: "json",
                  type: "post",
                  data: {
                    barcodeBaru: barcode,
                    qtyBaru: allQty,
                    totalBaru: replace_angka(total_)
                  }
                });
              }

              var sub_total = replace_angka($('#sub_total').val());
              var total_bayar = replace_angka($('#total_bayar').val());
              var total_bayar2 = replace_angka($('#total_bayar2').text());

              // replace 
              sub_total = Number(sub_total);
              total_bayar = Number(total_bayar);
              total_bayar2 = Number(total_bayar2);

              // hitung price kali qty
              const kali = Number(qty) * Number(price);
              // setelah di jumlah
              var sub_total_ = sub_total + Number(kali);
              var total_bayar_ = total_bayar + Number(kali);
              var total_bayar2_ = total_bayar2 + Number(kali);


              // rubah
              sub_total_ = rubah(sub_total_);
              total_bayar_ = rubah(total_bayar_);
              total_bayar2_ = rubah(total_bayar2_);

              $('#sub_total').val(sub_total_);
              $('#total_bayar').val(total_bayar_);
              $('#total_bayar2').text(total_bayar2_);


            }

            // add data pada table
            $.ajax({
              url: "<?= base_url('sale/isi_data/'); ?>",
              dataType: 'json',
              type: 'get',
              data: {
                id: item
              },
              success: function(data) {
                const barcode_ = document.getElementById(data.barcode);
                if (barcode_ != null) {
                  var value = barcode_.innerHTML;
                  const isi = Number(value);
                  const isi2 = Number(qty);
                  const val = isi + isi2
                  document.getElementById(data.barcode).innerHTML = val;
                } else {
                  let str = price;
                  let outStr = str.replace(/[^\w\s]/gi, '');
                  var total_rupiah = Number(qty) * Number(outStr);

                  $('.tabel').append(
                    '<tr class="items" data-item="' + item + '" id="' + data.barcode + '_tr"><td id="' + data.barcode + '_barcode">' + data.barcode + '</td><td>' + data.name + '</td><td id="' + data.barcode + '_price">' + rubah(data.price) + '</td><td id=' + data.barcode + '>' + qty + '</td><td id="' + data.barcode + '_discount">' + 0 + '</td><td id="' + data.barcode + '_sp">' + rubah(total_rupiah) + '</td><td><a class="delete_data text-light mr-2 btn btn-danger btn-sm" data-barcode="' + data.barcode + '" data-barcode_trash="' + data.barcode + '_tr"><i class="fas fa-trash"></i> Delete</a><a class="detail btn btn-default btn-sm" data-toggle="modal" data-target="#editTotal" data-barcode="' + data.barcode + '_barcode" data-price="' + data.barcode + '_price" data-qty="' + data.barcode + '" data-discount="' + data.barcode + '_discount"><i class="fas fa-eye"></i>Edit</a></td></tr>'
                  );
                }

                $.ajax({
                  url: "<?= base_url('sale/keranjangAdd'); ?>",
                  dataType: "json",
                  type: "post",
                  data: {
                    barcode: barcode,
                    invoice: $('#invoice').text(),
                    item_name: data.name,
                    price: price,
                    qty: qty,
                    discount: 0,
                    total: total_rupiah
                  }
                });
              }

            });
            $('#barcode').val('');
            $('#price').val('');
            $('#stock').val('');
            $('#item').val('');
            $('#qty').val('');
          }
        }
      });

      $('#bayar').on('click', function() {
        var id_userCek = $('#kasir').val();
        var sub_totalCek = $('#sub_total').val();
        var discountCek = $('#discount').val();
        var totalCek = $('#total_bayar').val();
        var uangCek = $('#cash').val();
        var dateCek = $('#date').val();
        var classCek = document.getElementsByClassName('items')[0];

        if (kurir == '' || id_userCek == '' || sub_totalCek == '' || discountCek == '' || totalCek == '' || uangCek == '0' || dateCek == '' || classCek == null) {
          if (classCek == null) {
            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Pilih barang terlebih dahulu!',
              showConfirmButton: false,
              timer: 2000
            })
            return;
          } else if (uangCek == '0') {
            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Masukkan uang terlebih dahulu!',
              showConfirmButton: false,
              timer: 2000
            });
            return;
          }
          Swal.fire({
            icon: 'warnig',
            title: 'Oops...',
            text: 'Silahkan lengkapi form terlebih dahulu!',
            showConfirmButton: false,
            timer: 2000
          })
          return;
        }
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Anda akan melakukan transaksi!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Go transaksi!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url('sale/add') ?>",
              dataType: "text",
              type: "GET",
              data: {
                invoice: $('#invoice').text(),
                id_customers: $('#customer').val(),
                id_user: $('#kasir').val(),
                sub_total: $('#sub_total').val(),
                discount: $('#discount').val(),
                total: $('#total_bayar').val(),
                uang: $('#cash').val(),
                kembalian: $('#change').val(),
                note: $('#note').val(),
                date: $('#date').val(),
                kurir: $('#kurir').val()
              },
              success: function(data) {
                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Berhasil melakukan transaksi',
                  showConfirmButton: false,
                  timer: 1500
                });
                <?php $params = ['nomor' => '1'];
                $this->session->set_userdata($params); ?>
                window.location = "http://localhost/sib-pos/sale/cetakStruk/" + $('#invoice').text() + "/" + $('#customer').val();
                $('#customer').val('');
                $('#cash').val('0');
                $('#note').val('');
                $('#kurir').val('');
              }
            });
          }
        })
      });

      $('#cancel').on('click', function() {
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Kamu akan membatalkan transaksi ini dan menghapus data barang yang telah di input!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, batalkan!'
        }).then((result) => {
          if (result.value) {
            Swal.fire({
              icon: 'success',
              title: 'Dibatalkan',
              text: 'Transaksi di batalkan!',
              showConfirmButton: false,
              timer: 2000
            })
            window.location = "<?= base_url('sale') ?>";
          }
        })
      });


      $('.tabel').on('click', '.detail', function() {
        const price = $(this).data('price');
        const qty = $(this).data('qty');
        const discount = $(this).data('discount');
        const barcode = $(this).data('barcode');

        const cari_price = document.getElementById(price).innerHTML;
        const cari_qty = document.getElementById(qty).innerHTML;
        const cari_discount = document.getElementById(discount).innerHTML;
        const cari_barcode = document.getElementById(barcode).innerHTML;


        $('#price_form').val(cari_price);
        $('#qty_form').val(cari_qty);
        $('#discount_form').val(cari_discount);
        $('#barcode_form').val(cari_barcode);


      });
      $('.ubah').on('click', function() {
        const price_ubah = $('#price_form').val();

        var price_baru = Number(replace_angka($('#price_form').val()));
        var qty_baru = Number($('#qty_form').val());
        var discount_baru = Number(replace_angka($('#discount_form').val()));
        var barcode_baru = $('#barcode_form').val();

        const price = String(barcode_baru) + '_price';
        const qty = String(barcode_baru) + '_qty';
        const discount = String(barcode_baru) + '_discount';
        const barcode = String(barcode_baru) + '_barcode';
        const total = String(barcode_baru) + '_sp';

        var total_hitung = price_baru * qty_baru;

        if (discount_baru != 0) {
          total_hitung = total_hitung - discount_baru;
        }

        var total_awal = document.getElementById(total).innerHTML;
        total_awal = replace_angka(total_awal);
        total_awal = Number(total_awal);
        var total_bayar2 = Number(replace_angka($('#total_bayar2').text()));
        var sub_total = Number(replace_angka($('#sub_total').val()));
        var total_bayar = Number(replace_angka($('#total_bayar').val()));

        total_bayar2 = (total_bayar2 - total_awal) + total_hitung;
        sub_total = (sub_total - total_awal) + total_hitung;
        total_bayar = (total_bayar - total_awal) + total_hitung;

        $.ajax({
          url: "<?= base_url('sale/ubahKeranjang') ?>",
          dataType: "json",
          type: "post",
          data: {
            barcodeBaru: barcode_baru,
            qtyBaru: qty_baru,
            discountBaru: discount_baru,
            priceBaru: price_baru,
            totalBaru: total_hitung
          },
          success: function(data) {
            var Mybarcode = barcode_baru + '_Mystock';
            var Mybarcode2 = document.getElementById(Mybarcode).innerHTML;
            var stockLama = document.getElementById(barcode_baru).innerHTML
            var stockLast = document.getElementById(Mybarcode).innerHTML = Number(Mybarcode2) + Number(stockLama);
            var hasil = Number(stockLast) - Number(qty_baru);

            if (hasil < 0) {
              Swal.fire({
                title: 'Stock tidak mencukupi',
                showClass: {
                  popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                  popup: 'animate__animated animate__fadeOutUp'
                }
              })

              document.getElementById(Mybarcode).innerHTML = Mybarcode2;
              return;
            }
            document.getElementById(Mybarcode).innerHTML = hasil;


            total_bayar2 = rubah(total_bayar2);
            total_bayar = rubah(total_bayar);
            sub_total = rubah(sub_total);

            $('#total_bayar2').text(total_bayar2);
            $('#sub_total').val(sub_total);
            $('#total_bayar').val(total_bayar);


            // set isi baru
            document.getElementById(price).innerHTML = rubah(price_baru);
            document.getElementById(barcode_baru).innerHTML = qty_baru;
            document.getElementById(discount).innerHTML = rubah(discount_baru);
            document.getElementById(total).innerHTML = rubah(total_hitung);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            //tampilkan kode error
            alert('Error : ' + jqXHR.status);
          }
        })



      });

      $('.tabel').on('click', '.delete_data', function() {
        const confrm = confirm('yakin ingin hapus?');

        if (confrm == false) {
          return;
        }

        var total = $(this).data('barcode');
        var qtyDelete = document.getElementById(total).innerHTML;
        var barcode = document.getElementById(total + "_tr").innerHTML;
        var id = $('.items').data('item');
        var cek = Number(document.getElementById(total).innerHTML);
        var allQty = $('#allQty').val();
        allQty = Number(allQty) - Number(document.getElementById(total).innerHTML);
        if (allQty == 0) {
          allQty = '';
        }


        // mengembalikan stock
        var Mybarcode = total + '_Mystock';
        var Mybarcode2 = document.getElementById(Mybarcode).innerHTML;
        var stockLama = document.getElementById(total).innerHTML
        document.getElementById(Mybarcode).innerHTML = Number(Mybarcode2) + Number(stockLama);

        $.ajax({
          url: "<?= base_url('sale/deleteKeranjang') ?>",
          dataType: "json",
          type: "post",
          data: {
            barcodeDelete: total
          }
        })
        $('#allQty').val(allQty);
        total = total + "_sp";

        var total_awal = document.getElementById(total).innerHTML;
        total_awal = Number(replace_angka(total_awal));

        var total_bayar = Number(replace_angka($('#total_bayar').val()));
        var sub_total = Number(replace_angka($('#sub_total').val()));
        var total_bayar2 = Number(replace_angka($('#total_bayar2').text()));

        total_bayar2 = total_bayar2 - total_awal;
        sub_total = sub_total - total_awal;
        total_bayar = total_bayar - total_awal;

        $('#total_bayar2').text(rubah(total_bayar2));
        $('#sub_total').val(rubah(sub_total));
        $('#total_bayar').val(rubah(total_bayar));

        const tr = $(this).data('barcode_trash');
        document.getElementById(tr).remove();
      });
      $('#discount').focusout(function() {
        if ($(this).val() == '') {
          $(this).val('0');
        }
      });
      $('#discount').focusin(function() {
        if ($(this).val() == 0) {
          $(this).val('');
        }
      });
      $('#discount').keyup(function() {
        if ($(this).val() == 0) {
          $(this).val('');
        }
        const init = formatRupiah($(this).val());
        $(this).val(init);



        var discount = Number(replace_angka($(this).val()));
        const init_bayar = $('#total_bayar').val();
        const init_bayar2 = $('#total_bayar2').text()
        const sub_total = Number(replace_angka($('#sub_total').val()));

        if (discount == '') {
          discount = 0;
        }
        if (init_bayar2 != 0) {
          if (discount != 0 || discount != '') {
            var total_bayar = Number(replace_angka($('#total_bayar').val()));
            var total_bayar2 = Number(replace_angka($('#total_bayar2').text()));

            total_bayar = sub_total - discount;
            total_bayar2 = sub_total - discount;

            total_bayar = rubah(total_bayar);
            total_bayar2 = rubah(total_bayar2);
            $('#total_bayar').val(total_bayar);
            $('#total_bayar2').text(total_bayar2);
          } else {
            $('#total_bayar').val(rubah(sub_total));
            $('#total_bayar2').text(rubah(sub_total));
          }

        }
      });

      $('#cash').focusout(function() {
        if ($(this).val() == '') {
          $(this).val('0');
        }
      });
      $('#cash').focusin(function() {
        if ($(this).val() == 0) {
          $(this).val('');
        }
      });
      $('#cash').keyup(function() {
        if ($(this).val() == 0) {
          $(this).val('');
        }
        $('#message').text('');
        const rupiah = formatRupiah($(this).val());
        $(this).val(rupiah);
        var cash = Number(replace_angka($(this).val()));
        var total = Number(replace_angka($('#total_bayar').val()));

        if (cash != 0) {
          var change = total - cash;

          if (change == 0) {
            change = change * -1;
            const message = $('#message').text('');
          } else if (change > 0) {
            change = 0;
            const message = $('#message').text('uang kurang');
          } else {
            change = change * -1;
          }

          change = rubah(change);

          $('#change').val(change);
        } else {
          $('#change').val('0');
        }
      });


      $('#price_form').keyup(function() {
        const isi = formatRupiah($(this).val());
        $(this).val(isi);
      });

      $('#discount_form').focusout(function() {
        if ($(this).val() == '') {
          $(this).val('0');
        }
      });
      $('#discount_form').focusin(function() {
        if ($(this).val() == 0) {
          $(this).val('');
        }
      });
      $('#discount_form').keyup(function() {
        if ($(this).val() == 0) {
          $(this).val('');
        }
        const isi = formatRupiah($(this).val());
        $(this).val(isi);
      });

      function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split = number_string.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }

      function rubah(angka) {
        var number_string = angka.toString(),
          sisa = number_string.length % 3,
          rupiah = number_string.substr(0, sisa),
          ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
        return rupiah;
      }

      function replace_angka(angka) {
        let str = angka;
        let outStr = str.replace(/[^\w\s]/gi, '');

        return outStr;
      }

      /* Fungsi formatRupiah */
      function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split = number_string.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
    });
  </script>
</body>

</html>