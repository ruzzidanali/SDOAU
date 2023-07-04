<?php
session_start();
error_reporting(0);
include('../connect.php');

if (strlen($_SESSION['uemail']) == "") {
    header("Location: login.php");
} else {
}

$email = $_SESSION["uemail"];
//Get Date
$current_date = date('Y-m-d');


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
LEFT JOIN tbl_r_program rp ON tbl_pemohon.status = rp.kod_program where email='$email'";
$result = $conn->query($sql);
$rowaccess = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Pelajar | SDOAU</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
</head>

<body>
    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <img src="../upload/<?php echo $rowaccess['picture'];  ?>" alt="image" width="142" height="153" class="img-circle" />
                            </span>


                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"><span class="text-muted text-xs block"><?php echo $rowaccess['email'];  ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">

                                <li><a href="logout.php">Log Keluar</a></li>
                            </ul>
                        </div>

                        <?php
                        include('sidebar.php');

                        ?>

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Laman Utama</span>
                        </li>
                        <li class="dropdown">




                        <li>
                            <a href="logout.php">
                                <i class="fa fa-sign-out"></i> Log Keluar
                            </a>
                        </li>

                    </ul>

                </nav>
            </div>

            <div class="wrapper wrapper-content">
                <div class="row animated fadeInRight">
                    <div class="col-md-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Profil Maklumat</h5>
                            </div>
                            <div>
                                <div class="ibox-content no-padding border-left-right">
                                    <img src="../upload/<?php echo $rowaccess['picture'];   ?>" alt="image" width="200" height="auto" style="margin-left: 55px;">
                                </div>
                                <div class="ibox-content profile-content">
                                    <h4><strong><?php echo $rowaccess['fullname'];   ?> </strong></h4>

                                    <h5><strong>Application ID</strong>: <?php echo $rowaccess['applicationID'];   ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h3>Maklumat Peribadi</h3>

                            </div>
                            <div class="ibox-content">

                                <div>
                                    <div class="feed-activity-list">

                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy"></small>
                                                <strong>Nama :</strong> <strong><?php echo $rowaccess['fullname'];   ?> <br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy"></small>
                                                <strong>ID Matrik :</strong> <strong><?php echo $rowaccess['matricID']; ?>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy"></small>
                                                <strong>No. Kad Pengenalan :</strong> <strong><?php echo $rowaccess['icno']; ?>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy"></small>
                                                <strong>Jantina :</strong> <strong><?php echo $rowaccess['gender'];   ?><strong> <br>
                                            </div>
                                        </div>


                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy"></small>
                                                <strong>No. Telefon :</strong> <strong><?php echo $rowaccess['phone'];   ?> <strong> <br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy"></small>
                                                <strong>E-mel :</strong> <strong><?php echo $rowaccess['email'];   ?> <strong> <br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy"></small>
                                                <strong>Alamat :</strong> <?php echo $rowaccess['address'];   ?><strong> <br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy"></small>
                                                <strong>Bandar :</strong> <?php echo $rowaccess['city'];   ?> <strong> <br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy"></small>
                                                <strong>Negeri :</strong> <?php echo $rowaccess['state'];   ?><strong> <br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy"></small>
                                                <strong>Poskod :</strong> <?php echo $rowaccess['postcode'];   ?> <br>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="post" action="edit-profile.php">

                                    </form>

                                </div>

                            </div>

                            <div class="ibox-title">
                                <h3>Maklumat Ibu Bapa/Waris</h3>

                            </div>
                            <div class="ibox-content">

                                <div>
                                    <div class="feed-activity-list">

                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy"></small>
                                                <strong>No. Kad Pengenalan Ibu :</strong> <?php echo $rowaccess['icno_ibu'];   ?><strong> <br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left"></a>
                                            <div class="media-body">
                                                <small class="pull-right text-navy"></small>

                                                <strong>Nama Ibu :</strong> <?php echo $rowaccess['nama_ibu']; ?>

                                            </div>
                                        </div>

                                        <div class="feed-element">
                                            <a href="#" class="pull-left"></a>
                                            <div class="media-body">
                                                <small class="pull-right text-navy"></small>

                                                <strong>No. Kad Pengenalan Bapa :</strong> <?php echo $rowaccess['icno_bapa']; ?>

                                            </div>
                                        </div>

                                        <div class="feed-element">
                                            <a href="#" class="pull-left"></a>
                                            <div class="media-body">
                                                <small class="pull-right text-navy"></small>
                                                <strong>Nama Bapa :</strong> <?php echo $rowaccess['nama_bapa']; ?><br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left"></a>
                                            <div class="media-body">
                                                <small class="pull-right text-navy"></small>
                                                <strong>Nama Waris :</strong> <?php echo $rowaccess['nama_waris']; ?><br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left"></a>
                                            <div class="media-body">
                                                <small class="pull-right text-navy"></small>
                                                <strong>Alamat Waris :</strong> <?php echo $rowaccess['address_waris']; ?><br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left"></a>
                                            <div class="media-body">
                                                <small class="pull-right text-navy"></small>
                                                <strong>Bandar :</strong> <?php echo $rowaccess['city_waris']; ?><br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left"></a>
                                            <div class="media-body">
                                                <small class="pull-right text-navy"></small>
                                                <strong>Negeri :</strong> <?php echo $rowaccess['state_waris']; ?><br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left"></a>
                                            <div class="media-body">
                                                <small class="pull-right text-navy"></small>
                                                <strong>Poskod :</strong> <?php echo $rowaccess['postcode_waris']; ?><br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left"></a>
                                            <div class="media-body">
                                                <small class="pull-right text-navy"></small>
                                                <strong>No. Telefon :</strong> <?php echo $rowaccess['phone_waris']; ?><br>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="post" action="edit-profile.php">

                                    </form>

                                </div>

                            </div>

                            <div class="ibox-title">
                                <h3>Maklumat Pendidikan</h3>

                            </div>
                            <div class="ibox-content">

                                <div>
                                    <div class="feed-activity-list">

                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy"></small>
                                                <strong>Program :</strong> <?php echo $rowaccess['pendidikan']; ?> <br>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left"></a>
                                            <div class="media-body">
                                                <small class="pull-right text-navy"></small>

                                                <strong>CGPA :</strong> <?php echo $rowaccess['cgpa']; ?> <br>

                                            </div>
                                        </div>

                                        <div class="feed-element">
                                            <a href="#" class="pull-left"></a>
                                            <div class="media-body">
                                                <small class="pull-right text-navy"></small>

                                                <strong>CGPA :</strong> <?php echo $rowaccess['muet']; ?> <br>

                                            </div>
                                        </div>


                                    </div>
                                    <form method="post" action="edit-profile.php">

                                    </form>

                                </div>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <div class="footer">
                <div class="pull-right">
                </div>
                <div>
                    <?php include('footer.php'); ?>
                </div>
            </div>

        </div>
    </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>

    <!-- Peity -->
    <script src="js/demo/peity-demo.js"></script>

</body>

</html>