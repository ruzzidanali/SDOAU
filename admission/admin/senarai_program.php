<?php


session_start();
error_reporting(0);
include('../connect.php');
if (strlen($_SESSION['admin-username']) == "") {
    header("Location: login.php");
} else {
}
$username = $_SESSION['admin-username'];
$sql = "select * from admin where username='$username'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
<link rel="stylesheet" href=" https://cdn.datatables.net/select/1.6.2/css/select.dataTables.min.css">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senarai Program | SDOAU</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->

    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />

    <style>
        .list-unstyled li {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .list-unstyled li strong {
            margin-right: 5px;
            width: 150px;
        }
    </style>

    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />




    <style type="text/css">
        <!--
        .style6 {
            font-size: 12px
        }

        </style></head><body class="hold-transition sidebar-mini layout-fixed"><div class="wrapper"><!-- Navbar
        -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php" class="nav-link">Utama</a>
            </li>

        </ul>

        <!-- SEARCH FORM -->
        <!--<form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form> -->

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">


        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link">
            <img src="../images/apple-touch-icon.png" alt=" Logo" width="200" height="150" style="opacity: .8">
            <span class="brand-text font-weight-light"> &nbsp;&nbsp;&nbsp;&nbsp; </span> </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../upload/pppa.jpg" alt="User Image" width="188" height="181" class="img-circle elevation-2">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $row['username'];  ?></a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <!--<div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div> -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

                    <li class="nav-item menu-open">
                        <a href="index.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Admin Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <i class="fas fa-database"></i>
                            <p>
                                Rekod
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="user-record.php" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Rekod Permohonan</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="fas fa-database"></i>
                            <p>
                                Program
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="senarai_program.php" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Senarai Program</p>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class='fas fa-sign-out-alt' style='font-size:18px;color:red'></i>
                            <p class="text">Log Keluar</p>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">&nbsp;</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="senarai_program.php">Program</a></li>
                            <li class="breadcrumb-item active">Senarai Program</li>
                        </ol>
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
                    <p>&nbsp;</p>
                    <table id="example" class="display" width="1161" border="0" align="center">

                        <tr>
                            <td width="1155">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Senarai Program</h2>
                                        <h3 class="card-title">&nbsp;</h3>
                                    </div>

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProgramModal">Tambah Program</button>

                                    <!-- Modal for Adding Program -->
                                    <div class="modal fade" id="addProgramModal" tabindex="-1" role="dialog" aria-labelledby="addProgramModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="update_exec.php" method="POST">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addProgramModalLabel">Tambah Program Baru</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form fields for adding program -->
                                                        <div class="form-group">
                                                            <label for="kod_program">Kod Program:</label>
                                                            <input type="text" class="form-control" id="kod_program" name="kod_program" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama_program">Nama Program:</label>
                                                            <input type="text" class="form-control" id="nama_program" name="nama_program" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" name="tambah_program" class="btn btn-primary">Tambah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table width="85%" align="center" class="table table-bordered table-striped" id="example1">
                                            <thead>
                                                <tr>
                                                    <th width="3%">#</th>
                                                    <th width="7%">Kod Program</th>
                                                    <th width="13%">Nama Program</th>
                                                    <th width="13%">Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * from tbl_r_program ";
                                                $result = $conn->query($sql);
                                                $cnt = 1;
                                                while ($row = $result->fetch_assoc()) {
                                                ?>
                                                    <tr class="gradeX">
                                                        <td height="47">
                                                            <div align="center"><?php echo $cnt; ?></div>
                                                        </td>
                                                        <td>
                                                            <div align="center"><?php echo $row['kod_program']; ?></div>
                                                        </td>
                                                        <td>
                                                            <div align="center"><?php echo $row['nama_program']; ?></div>
                                                        </td>
                                                        <td>
                                                            <span class="style6">
                                                                <button type="button" data-toggle="modal" data-target="#editModal-<?php echo $row['kod_program']; ?>">Kemaskini</button>

                                                                <!-- Modal for Editing Information -->
                                                                <div class="modal fade" id="editModal-<?php echo $row['kod_program']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <form action="update_exec.php" method="POST" onsubmit="return validateForm(this);">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="editModalLabel">Kemaskini Maklumat Program</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <!-- Form fields for editing information -->
                                                                                    <div class="form-group">
                                                                                        <label for="kod_program">Kod Program:</label>
                                                                                        <input type="text" class="form-control" id="kod_program" name="kod_program" value="<?php echo $row['kod_program']; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="nama_program">Nama Program:</label>
                                                                                        <input type="text" class="form-control" id="nama_program" name="nama_program" value="<?php echo $row['nama_program']; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                                    <button type="submit" name="update_program" class="btn btn-primary">Simpan Perubahan</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <button type="button" data-toggle="modal" data-target="#deleteModal-<?php echo $row['kod_program']; ?>">Hapus Program</button>

                                                                <!-- Modal for Program Deletion Confirmation -->
                                                                <div class="modal fade" id="deleteModal-<?php echo $row['kod_program']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <form action="update_exec.php" method="POST" onsubmit="return validateForm(this);">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="deleteModalLabel">Hapus Program</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <input type="hidden" name="kod_program" value="<?php echo $row['kod_program']; ?>">
                                                                                    <p>Anda pasti ingin menghapus program ini?</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                                    <button type="submit" name="delete_program" class="btn btn-danger">Hapus</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                <?php $cnt = $cnt + 1;
                                                } ?>
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </td>
                        </tr>
                    </table>
                    <p>
                        <!-- /.card -->
                    </p>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div>
    <!-- /.container-fluid --><!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">

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
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- Bootstrap and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({

                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    'csv',
                    'excel',

                    {
                        extend: 'print',
                        text: 'Print',
                        exportOptions: {
                            columns: ':not(:last-child)'

                        },
                        customize: function(win) {
                            $(win.document.body).addClass('landscape');
                            $(win.document.head).append('<style>@media print { body { zoom: 75%; } }</style>');
                            $(win.document.body).find('table').addClass('no-last-column');
                        }
                    },


                ],
                select: true
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });


        });
    </script>

    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.69/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.69/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

    <script>
        $(function() {
            // Initialize DataTables and add export buttons
            // var table = $("#example1").DataTable({

            //     "responsive": true,
            //     "lengthChange": false,
            //     "autoWidth": false,
            //     "buttons": ["copy", "csv", "excel", "pdf", "print"]
            // });
            // table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            // Add button to upload Excel file
            var uploadButton = $('<button/>')
                .addClass('btn btn-success')
                .html('<i class="fa fa-upload"></i> Upload Excel')
                .click(function() {
                    $('#uploadModal').modal('show');
                });
            table.buttons().container().append(uploadButton);

            // Handle file upload
            $('#uploadForm').submit(function(e) {
                e.preventDefault();
                var fileInput = $('#excelFile')[0];
                if (fileInput.files.length > 0) {
                    var file = fileInput.files[0];
                    var formData = new FormData();
                    formData.append('excelFile', file);

                    $.ajax({
                        url: '../data/usr.php',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response);
                            var response = JSON.parse(response);
                            console.log('Message: ' + response.message);
                            if (response.success) {
                                alert(response.message);
                                $('#uploadModal').modal('hide');
                                location.reload();
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function() {
                            alert('Error uploading file.');
                        }
                    });
                } else {
                    alert('Please select a file to upload.');
                }
            });
        });
    </script>
    </body>

</html>