<?php
session_start();
error_reporting(0);
include('../connect.php');
if (strlen($_SESSION['uemail']) == "" || !isset($_SESSION["uemail"])) {
    header("Location: login.php");
} else {
}

$email = $_SESSION['uemail'];

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

date_default_timezone_set('Asia/Kuala_Lumpur');
$current_date = date('Y-m-d H:i:s');

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Surat Tawaran | SDOAU</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />

    <style>
        .offer-letter-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .offer-letter-logo img {
            width: 142px;
            height: 153px;
        }

        .offer-letter-content {
            margin-bottom: 20px;
        }

        .print-button {
            text-align: center;
            margin-top: 20px;
        }
        .btn-dark {
            background-color: grey;
            color: white;
        }
    </style>

</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
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


                            <span class="m-r-sm text-muted welcome-message">Surat Tawaran</span>
                        </li>
                        <li class="dropdown">




                        <li>
                            <a href="logout.php">
                                <i class="fa fa-sign-out"></i> Log keluar
                            </a>
                        </li>

                    </ul>

                </nav>
            </div>
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Pengesahan Surat Tawaran</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="offer-letter-logo">
                                    <img src="../upload/<?php echo $rowaccess['picture'];  ?>" alt="image" width="142" height="153" class="img-circle" />
                                </div>
                                <div class="offer-letter-content">
                                    <h3><?php if (($rowaccess['status']) != "" and (($rowaccess['status']) != "0")) { ?>
                                            <p>Tahniah! Permohonan anda telah disahkan! Semoga Berjaya!</p>
                                        <?php } else if (($rowaccess['status']) == '0') { ?>
                                            <p>Permohonan belum disahkan.</p>
                                        <?php } else { ?>
                                            <p>Permohonan belum disahkan.</p>
                                        <?php } ?></h3>
                                    <p><strong>Date:</strong> <?php echo $current_date; ?></p>
                                    <p><strong>Name:</strong> <?php echo $rowaccess['fullname']; ?></p>
                                    <p><strong>Matric Number:</strong> <?php echo $rowaccess['matricID']; ?></p>
                                    <p><strong>IC Number:</strong> <?php echo $rowaccess['icno']; ?></p>
                                    <p><strong>Program Name:</strong> <?php $kod_status = $rowaccess['kod_status']; echo strstr($kod_status, '/', true); ?></p>
                                    <p><strong>Program Code:</strong> <?php echo $status = $rowaccess['status']; ?></p>
                                    <p><strong>Status:</strong>
                                        <?php if (($rowaccess['status']) != "" and (($rowaccess['status']) != "0")) { ?>
                                            <span class="badge badge-primary">Diterima</span>
                                        <?php } else if (($rowaccess['status']) == '0') { ?>
                                            <span class="badge badge-danger">Tawaran Belum Disahkan</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Tawaran Belum Disahkan</span>
                                        <?php } ?>
                                    </p>
                                    <!-- Add more customized fields as needed -->
                                </div>
                            </div>
                            <div class="print-button">
                            <?php if (($rowaccess['status']) != "" and (($rowaccess['status']) != "0")) { ?>
                                <button onclick="printOfferLetter()" class="btn btn-primary">Cetak Surat Tawaran</button>
                                <?php } else if (($rowaccess['status']) == '0') { ?>
                                    <button class="btn btn-dark">Surat Tawaran Belum Dibuka</button>
                                <?php } else { ?>
                                    <button class="btn btn-dark">Surat Tawaran Belum Dibuka</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Morris -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Gitter -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Print Offer Letter Function -->
    <script>
    function printOfferLetter() {
        var printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write('<html><head><title></title>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<p><img src="images/UMT.jpg" alt="University Logo" style="max-width: auto; height: auto;"><p>');
        printWindow.document.write('<p>&nbsp;</p>')
        printWindow.document.write('<p>&nbsp;</p>')
        printWindow.document.write('<p><strong><span style="font-family: arial, helvetica, sans-serif;">KEPADA SESIAPA YANG BERKENAAN</span></strong></p>');
        printWindow.document.write('<p><span style="font-family: arial, helvetica, sans-serif;">Tuan/Puan<br /></span></p>');
        printWindow.document.write('<p><strong><span style="font-family: arial, helvetica, sans-serif;">PERMOHONAN PROGRAM UNTUK SARJANA MUDA</span></strong></p>');
        printWindow.document.write('<p><span style="font-family: arial, helvetica, sans-serif;">Adalah saya dengan hormatnya menarik perhatian kepada perkara di atas.<br /></span></p>');
        printWindow.document.write('<p><span style="font-family: arial, helvetica, sans-serif;">2. &emsp; &emsp; Sukacita dimaklumkan bahawa permohonan penama di bawah telah berjawa ditawarkan untuk Program Sarjana Muda di Universiti Malaysia Terengganu</span></p>');
        printWindow.document.write('<p><span style="font-family: arial, helvetica, sans-serif;">&emsp; &emsp; &emsp; &emsp; Nama :</span> <?php echo $rowaccess['fullname']; ?></p>')
        printWindow.document.write('<p><span style="font-family: arial, helvetica, sans-serif;">&emsp; &emsp; &emsp; &emsp; No. Matrik :</span> <?php echo $rowaccess['matricID']; ?></p>')
        printWindow.document.write('<p><span style="font-family: arial, helvetica, sans-serif;">&emsp; &emsp; &emsp; &emsp; Program :</span> <?php $kod_status = $rowaccess['kod_status']; echo strstr($kod_status, '/', true); ?></p>')
        printWindow.document.write('<p><span style="font-family: arial, helvetica, sans-serif;">&emsp; &emsp; &emsp; &emsp; Kod Program :</span> <?php echo $status = $rowaccess['status']; ?></p>')
        printWindow.document.write('<p><span style="font-family: arial, helvetica, sans-serif;">&emsp; &emsp; &emsp; &emsp; No. IC :&nbsp;</span> <?php echo $rowaccess['icno']; ?></p>')
        printWindow.document.write('<p><span style="font-family: arial, helvetica, sans-serif;">3. &emsp; &emsp; Sila bawa slip surat tawaran ini semasa pendaftaran untuk dijadikan bukti.</span></p>')
        printWindow.document.write('<p><span style="font-family: arial, helvetica, sans-serif;">4. &emsp; &emsp; Dengan ini saya mengucapkan selamat maju jaya dan tahniah kepada penama atas tawaran yang telah diberi.</span></p>')
        printWindow.document.write('<p><span style="font-family: arial, helvetica, sans-serif;">Sekian Terima Kasih</span></p>')
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>



</body>

</html>
