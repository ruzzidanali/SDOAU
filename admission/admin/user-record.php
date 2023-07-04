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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rekod Permohonan | SDOAU</title>
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

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/select/1.6.2/css/select.dataTables.min.css">

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
    </form>-->

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
      </div>-->

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
            <a href="#" class="nav-link active">
              <i class="fas fa-database"></i>
              <p>
                Rekod
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user-record.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekod Permohonan</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <i class="fas fa-database"></i>
              <p>
                Program
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="senarai_program.php" class="nav-link ">
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
              <li class="breadcrumb-item"><a href="user-record.php">Rekod</a></li>
              <li class="breadcrumb-item active">Rekod Permohonan</li>
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
          <table width="1161" border="0" align="center">
            <tr>
              <td width="1155">
                <div class="card">
                  <div class="card-header">
                    <h2>Maklumat Pemohon</h2>
                    <h3 class="card-title">&nbsp;</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table width="85%" align="center" class="table table-bordered table-striped" id="example1">
                      <thead>
                        <tr>
                          <th width="3%">#</th>

                          <th width="7%">No. IC</th>
                          <th width="13%">Nama Pemohon</th>
                          <th width="7%">Jantina</th>
                          <th width="7%">Sejarah Pendidikan</th>
                          <th width="9%">CGPA</th>
                          <th width="7%">Muet</th>
                          <th width="8%">Gambar</th>
                          <th width="8%">Status</th>
                          <th width="16%">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT 
                        tbl_pemohon.*,
                        tbl_pendidikan.*,
                        tbl_ibubapawaris.*,
                        tbl_pilihan.*,
                        p1.nama_program AS pilihan_1_program,
                        p2.nama_program AS pilihan_2_program,
                        p3.nama_program AS pilihan_3_program,
                        p4.nama_program AS pilihan_4_program,
                        p5.nama_program AS pilihan_5_program,
                        rp.nama_program AS kod_status
                    FROM tbl_pemohon 
                    JOIN tbl_pendidikan ON tbl_pemohon.matricID = tbl_pendidikan.matricID 
                    JOIN tbl_ibubapawaris ON tbl_pemohon.matricID = tbl_ibubapawaris.matricID 
                    JOIN tbl_pilihan ON tbl_pemohon.matricID = tbl_pilihan.matricID 
                    JOIN tbl_r_program p1 ON tbl_pilihan.pilihan_1 = p1.kod_program 
                    JOIN tbl_r_program p2 ON tbl_pilihan.pilihan_2 = p2.kod_program 
                    JOIN tbl_r_program p3 ON tbl_pilihan.pilihan_3 = p3.kod_program 
                    JOIN tbl_r_program p4 ON tbl_pilihan.pilihan_4 = p4.kod_program 
                    JOIN tbl_r_program p5 ON tbl_pilihan.pilihan_5 = p5.kod_program 
                    LEFT JOIN tbl_r_program rp ON tbl_pemohon.status = rp.kod_program
                    ORDER BY tbl_pemohon.application_date ASC;
                    ;
                    ";
                        $result = $conn->query($sql);
                        $cnt = 1;
                        while ($row = $result->fetch_assoc()) {
                        ?>
                          <tr class="gradeX">
                            <td height="47">
                              <div align="center"><?php echo $cnt; ?></div>
                            </td>
                            <td>
                              <div align="center"><?php echo $row['icno']; ?></div>
                            </td>
                            <td>
                              <div align="center"><?php echo $row['fullname']; ?></div>
                            </td>
                            <td>
                              <div align="center"><?php echo $row['gender']; ?></div>
                            </td>
                            <td>
                              <div align="center"><?php echo $row['pendidikan']; ?></div>
                            </td>
                            <td>
                              <div align="center"><?php echo $row['cgpa']; ?></div>
                            </td>
                            <td>
                              <div align="center"><?php echo $row['muet']; ?></div>
                            </td>

                            <td>
                              <div align="center"><span class="controls"><img src="../upload/<?php echo $row['picture']; ?>" width="100" height="90" border="2" /></span></div>
                            </td>
                            <td style=""><?php if (($row['status']) != "" and (($row['status']) != "0")) { ?>
                                <span class="badge badge-primary">Tawaran Kemasukan</span> <br>
                                <span class="badge badge-primary">Kod Program: <?php echo $status = $row['status']; ?> </span><br>
                                <span class="badge badge-primary">Nama Program: <?php

                                                                                $kod_status = $row['kod_status'];
                                                                                echo strstr($kod_status, '/', true);

                                                                                ?> </span>

                              <?php } else if (($row['status']) == '0') { ?>
                                <span class="badge badge-danger">Tidak Ditawarkan. Sila kemukakan permohonan</span>
                              <?php } else { ?>
                                <span class="badge badge-danger">Tawaran Tidak Disediakan</span>
                              <?php } ?>
                            </td>
                            <td>
                              <span class="style6">
                                <button type="button" data-toggle="modal" data-target="#applicantModal-<?php echo $row['matricID']; ?>">Papar Maklumat</button>


                                <button type="button" data-toggle="modal" data-target="#programModal-<?php echo $row['matricID']; ?>">Pilih Program</button>

                                <!-- Modal for Program Selection -->


                                <script>
                                  function validateForm(form) {
                                    var radioButtons = form.elements["admitProgram"];
                                    var checked = false;
                                    for (var i = 0; i < radioButtons.length; i++) {
                                      if (radioButtons[i].checked) {
                                        checked = true;
                                        break;
                                      }
                                    }
                                    if (!checked) {
                                      alert("Sila pilih untuk proses kemasukan.");
                                      return false;
                                    }
                                    return true;
                                  }
                                </script>


                              </span>
                            </td>
                          </tr>


                          <!-- Modal for Applicant Information -->
                          <div class="modal fade" id="applicantModal-<?php echo $row['matricID']; ?>" tabindex="-1" role="dialog" aria-labelledby="applicantModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">

                                <div class="modal-body">

                                  <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                      <a class="nav-link active" data-bs-toggle="tab" href="#applicant-info<?php echo $row['matricID']; ?>">Maklumat Pemohon</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-bs-toggle="tab" href="#parents-info<?php echo $row['matricID']; ?>">Maklumat Ibu Bapa</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-bs-toggle="tab" href="#education-background<?php echo $row['matricID']; ?>">Pendidikan</a>
                                    </li>
                                  </ul>

                                  <div class="tab-content">
                                    <div id="applicant-info<?php echo $row['matricID']; ?>" class="tab-pane fade show active">

                                      <h6>Maklumat Pemohon</h6>
                                      <ul class="list-unstyled">
                                        <li><strong>ID Permohonan</strong>: <?php echo $row['applicationID']; ?></li>
                                        <li><strong>ID Matrik</strong>: <?php echo $row['matricID']; ?></li>
                                        <li><strong>No. Kad Pengenalan</strong>: <?php echo $row['icno']; ?></li>
                                        <li><strong>Nama Pemohon</strong>: <?php echo $row['fullname']; ?></li>
                                        <li><strong>Jantina</strong>: <?php echo $row['gender']; ?></li>
                                        <li><strong>No. Telefon</strong>: <?php echo $row['phone']; ?></li>
                                        <li><strong>E-mel</strong>: <?php echo $row['email']; ?></li>
                                        <li><strong>Alamat</strong>: <?php echo $row['address']; ?></li>
                                        <li><strong>Bandar</strong>: <?php echo $row['city']; ?></li>
                                        <li><strong>Negeri</strong>: <?php echo $row['state']; ?></li>
                                        <li><strong>Poskod</strong>: <?php echo $row['postcode']; ?></li>
                                      </ul>
                                    </div>
                                    <div id="parents-info<?php echo $row['matricID']; ?>" class="tab-pane fade">
                                      <h6>Maklumat Ibu Bapa/Waris</h6>
                                      <ul class="list-unstyled">
                                        <li><strong>No. Kad Pengenalan Ibu</strong>: <?php echo $row['icno_ibu']; ?></li>
                                        <li><strong>Nama Ibu</strong>: <?php echo $row['nama_ibu']; ?></li>
                                        <li><strong>No. Kad Pengenalan Bapa</strong>: <?php echo $row['icno_bapa']; ?></li>
                                        <li><strong>Nama Bapa</strong>: <?php echo $row['nama_bapa']; ?></li>
                                        <li><strong>Nama Waris</strong>: <?php echo $row['nama_waris']; ?></li>
                                        <li><strong>Alamat Waris</strong>: <?php echo $row['address_waris']; ?></li>
                                        <li><strong>Bandar</strong>: <?php echo $row['city_waris']; ?></li>
                                        <li><strong>Negeri</strong>: <?php echo $row['state_waris']; ?></li>
                                        <li><strong>Poskod</strong>: <?php echo $row['postcode_waris']; ?></li>
                                        <li><strong>No. Telefon</strong>: <?php echo $row['phone_waris']; ?></li>
                                      </ul>
                                    </div>
                                    <div id="education-background<?php echo $row['matricID']; ?>" class="tab-pane fade">
                                      <h6>Latar Belakang Pendidikan</h6>
                                      <ul class="list-unstyled">
                                        <li><strong>Program: </strong>: <?php echo $row['pendidikan']; ?></li>
                                        <li><strong>CGPA</strong>: <?php echo $row['cgpa']; ?></li>
                                        <li><strong>MUET</strong>: <?php echo $row['muet']; ?></li>

                                      </ul>
                                    </div>
                                  </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="modal fade" id="programModal-<?php echo $row['matricID']; ?>" tabindex="-1" role="dialog" aria-labelledby="programModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form action="admit_exec.php" method="GET" onsubmit="return validateForm(this);">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pilihan Program</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <input type="hidden" name="userID" value="<?php echo $row['matricID']; ?>">
                                    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                    <li class="list-group-item">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="admitProgram" id="program-<?php echo  $row['pilihan_1']; ?>" value="<?php echo $row['pilihan_1']; ?>" <?php echo ($row['pilihan_1'] == $status) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="program-<?php echo $row['pilihan_1']; ?>">
                                          <?php echo $row['pilihan_1'];
                                          echo " (";
                                          echo $row['pilihan_1_program'];
                                          echo ")"; ?>
                                        </label>
                                      </div>
                                    </li>
                                    <li class="list-group-item">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="admitProgram" id="program-<?php echo $row['pilihan_2']; ?>" value="<?php echo $row['pilihan_2']; ?>" <?php echo ($row['pilihan_2'] == $status) ? 'checked' : ''; ?>>

                                        <label class="form-check-label" for="program-<?php echo $row['pilihan_2']; ?>">
                                          <?php echo $row['pilihan_2'];
                                          echo " (";
                                          echo $row['pilihan_2_program'];
                                          echo ")"; ?>
                                        </label>
                                      </div>
                                    </li>

                                    <li class="list-group-item">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="admitProgram" id="program-<?php echo  $row['pilihan_3']; ?>" value="<?php echo $row['pilihan_3']; ?>" <?php echo ($row['pilihan_3'] == $status) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="program-<?php echo $row['pilihan_3']; ?>">
                                          <?php echo $row['pilihan_3'];
                                          echo " (";
                                          echo $row['pilihan_3_program'];
                                          echo ")"; ?>
                                        </label>
                                      </div>
                                    </li>

                                    <li class="list-group-item">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="admitProgram" id="program-<?php echo  $row['pilihan_4']; ?>" value="<?php echo $row['pilihan_4']; ?>" <?php echo ($row['pilihan_4'] == $status) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="program-<?php echo $row['pilihan_4']; ?>">
                                          <?php echo $row['pilihan_4'];
                                          echo " (";
                                          echo $row['pilihan_4_program'];
                                          echo ")"; ?>
                                        </label>
                                      </div>
                                    </li>

                                    <li class="list-group-item">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="admitProgram" id="program-<?php echo  $row['pilihan_5']; ?>" value="<?php echo $row['pilihan_5']; ?>" <?php echo ($row['pilihan_5'] == $status) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="program-<?php echo $row['pilihan_5']; ?>">
                                          <?php echo $row['pilihan_5'];
                                          echo " (";
                                          echo $row['pilihan_5_program'];
                                          echo ")"; ?>
                                        </label>
                                      </div>
                                    </li>

                                    <li class="list-group-item">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="admitProgram" id="program-none" value="0" <?php if ($row['status'] == '0') {
                                                                                                                                        echo 'checked';
                                                                                                                                      } ?>>
                                        <label class="form-check-label" for="program-none">
                                          <?php echo "Tiada Program Ditawarkan";
                                          ?>
                                        </label>
                                      </div>
                                    </li>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Sahkan</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>

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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.69/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.69/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

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
  </body>

</html>