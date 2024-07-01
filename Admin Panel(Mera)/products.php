<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aptech Ecommerce | Products</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php include_once ('components/navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include_once ('components/sidebar.php'); ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Products</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Products</h3>

            <div class="card-tools">
              <a href="addProduct.php" class="btn btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Add Product
              </a>
            </div>
          </div>
          <div class="card-body">
            <!-- Table Start From Here -->
            <?php
            require_once ('db.php');
            ?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Product Id</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product Stock</th>
                  <th>Added By</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $query = "SELECT products.*,users.`username` FROM products INNER JOIN users ON products.`added_by` = users.`id`";
                $result = mysqli_query($connection, $query);
                if ($result->num_rows > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {?>
                  <tr>
                    <td><?php echo $row['prod_id']; ?></td>
                    <td><?php echo $row['prod_name']; ?></td>
                    <td><?php echo $row['prod_price']; ?></td>
                    <td><?php echo $row['prod_stock']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo date("d-m-Y | h:i:s a", strtotime($row['created_at'])); ?></td>
                    <td><a href="editProduct.php?prod_id=<?php echo $row['prod_id']; ?>"
                        class="btn btn-warning btn-sm">Edit</a>|
                      <a href="deleteProduct.php?prod_id=<?php echo $row['prod_id']; ?>"
                        class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  <?php
                }
              }else{
                ?>
                <tr>
                  <td colspan="5">No Record Found</td>
                </tr><?php
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include_once ('components/footer.php'); ?>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>


  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      /*     $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          }); */
    });
  </script>
</body>

</html>