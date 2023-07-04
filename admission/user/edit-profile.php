<?php
session_start();
error_reporting(0);
include('../connect.php');

if (strlen($_SESSION['uemail']) == "") {
    header("Location: login.php");
} else {
}

$email = $_SESSION["uemail"];


$current_date = date('Y-m-d ');


$sql = "sELECT 
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

if (isset($_POST["btnedit"])) {

    $fullname = mysqli_real_escape_string($conn, $_POST['txtfullname']);
    $sex = mysqli_real_escape_string($conn, $_POST['cmdsex']);
    $jamb = mysqli_real_escape_string($conn, $_POST['txtjamb']);
    $score = mysqli_real_escape_string($conn, $_POST['txtscore']);
    $exam = mysqli_real_escape_string($conn, $_POST['txtexam']);
    $phone = mysqli_real_escape_string($conn, $_POST['txtphone']);
    $lga = mysqli_real_escape_string($conn, $_POST['txtlga']);
    $state = mysqli_real_escape_string($conn, $_POST['txtstate']);
    $dept = mysqli_real_escape_string($conn, $_POST['txtdept']);
    $faculty = mysqli_real_escape_string($conn, $_POST['txtfaculty']);


    $image = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
    $image_name = addslashes($_FILES['userImage']['name']);
    $image_size = getimagesize($_FILES['userImage']['tmp_name']);
    move_uploaded_file($_FILES["userImage"]["tmp_name"], "../upload/" . $_FILES["userImage"]["name"]);
    $location = "upload/" . $_FILES["userImage"]["name"];


    $sql1 = " update admission set fullname='$fullname',sex='$sex',jamb_number='$jamb',jamb_score='$score', photo='$location',state='$state',faculty='$faculty',dept='$dept',ssce_details='$exam' where email='$email'";

    if (mysqli_query($conn, $sql1)) {

        header("Location: profile.php");
    } else {
        $_SESSION['error'] = 'Editing Was Not Successful';
    }
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kemaskini Profil | SDOAU</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

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

                            <span class="m-r-sm text-muted welcome-message">Kemaskini Profil</span>

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
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="profile.php">Profil</a>
                        </li>

                        <li class="active">
                            <strong>Kemaskini Profil</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h3>Kemaskini Maklumat</h3>
                            </div>
                            <div class="ibox-content">

                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#personal-details">Maklumat Peribadi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#parent-details">Maklumat Ibubapa/Penjaga</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#background-education">Latar Belakang Pendidikan</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="personal-details" class="tab-pane fade show active">
                                        <form action="updateprofile.php" method="POST" enctype="multipart/form-data">


                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="assets_form/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                    <input type="file" name="picture" id="wizard-picture" accept=".jpeg, .jpg">
                                                </div>
                                                <h6>Choose Picture</h6>
                                            </div>


                                            <div class="form-group">
                                                <label>ID Matrik:</label>
                                                <input type="text" class="form-control" name="txtmatricID" value="<?php echo $rowaccess['matricID']; ?>" required="" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>No Kad Pengenalan:</label>
                                                <input type="text" class="form-control" name="txticno" value="<?php echo $rowaccess['icno']; ?>" required="" readonly>
                                            </div>


                                            <div class="form-group">
                                                <label>Nama:</label>
                                                <input type="text" class="form-control" name="txtfullname" value="<?php echo $rowaccess['fullname']; ?>" required="">
                                            </div>



                                            <div class="form-group">
                                                <label>Jantina:</label>
                                                <select name="gender" id="gender" class="form-control" required="">
                                                    <?php $gender = $rowaccess['gender']; ?>
                                                    <option value="">Sila Pilih</option>
                                                    <option value="Lelaki" <?php if ($gender === 'Lelaki') {
                                                                                echo "Selected";
                                                                            } ?>>Lelaki</option>
                                                    <option value="Perempuan" <?php if ($gender === 'Perempuan') {
                                                                                    echo "Selected";
                                                                                } ?>>Perempuan</option>
                                                </select>
                                            </div>



                                            <div class="form-group">
                                                <label>No. Telefon:</label>
                                                <input type="text" class="form-control" name="txtphone" value="<?php echo $rowaccess['phone']; ?>" required="">
                                            </div>


                                            <div class="form-group">
                                                <label>E-mel :</label>
                                                <input type="email" class="form-control" name="txtemail" value="<?php echo $rowaccess['email']; ?>" required="">
                                            </div>



                                            <div class="form-group">
                                                <label>Alamat :</label>
                                                <input type="text" class="form-control" name="txtaddress" value="<?php echo $rowaccess['address']; ?>" required="">
                                            </div>



                                            <div class="form-group">
                                                <label>Bandar :</label>
                                                <input type="text" class="form-control" name="txtcity" value="<?php echo $rowaccess['city']; ?>" required="">
                                            </div>



                                            <div class="form-group">
                                                <label>Negeri :</label>
                                                <?php $state = $rowaccess['state']; ?>
                                                <select id="state" name="state" class="form-control" required>
                                                    <option value="Johor" <?php if ($state === 'Johor') {
                                                                                echo "Selected";
                                                                            } ?>>Johor</option>
                                                    <option value="Kedah" <?php if ($state === 'Kedah') {
                                                                                echo "Selected";
                                                                            } ?>>Kedah</option>
                                                    <option value="Kelantan" <?php if ($state === 'Kelantan') {
                                                                                    echo "Selected";
                                                                                } ?>>Kelantan</option>
                                                    <option value="Melaka" <?php if ($state === 'Melaka') {
                                                                                echo "Selected";
                                                                            } ?>>Melaka</option>
                                                    <option value="Negeri Sembilan" <?php if ($state === 'Negeri Sembilan') {
                                                                                        echo "Selected";
                                                                                    } ?>>Negeri Sembilan</option>
                                                    <option value="Pahang" <?php if ($state === 'Pahang') {
                                                                                echo "Selected";
                                                                            } ?>>Pahang</option>
                                                    <option value="Pulau Pinang" <?php if ($state === 'Pulau Pinang') {
                                                                                        echo "Selected";
                                                                                    } ?>>Penang</option>
                                                    <option value="Perak" <?php if ($state === 'Perak') {
                                                                                echo "Selected";
                                                                            } ?>>Perak</option>
                                                    <option value="Perlis" <?php if ($state === 'Perlis') {
                                                                                echo "Selected";
                                                                            } ?>>Perlis</option>
                                                    <option value="Sabah" <?php if ($state === 'Sabah') {
                                                                                echo "Selected";
                                                                            } ?>>Sabah</option>
                                                    <option value="Sarawak" <?php if ($state === 'Sarawak') {
                                                                                echo "Selected";
                                                                            } ?>>Sarawak</option>
                                                    <option value="Selangor" <?php if ($state === 'Selangor') {
                                                                                    echo "Selected";
                                                                                } ?>>Selangor</option>
                                                    <option value="Terengganu" <?php if ($state === 'Terengganu') {
                                                                                    echo "Selected";
                                                                                } ?>>Terengganu</option>
                                                    <option value="Wilayah Perseketuan Kuala Lumpur" <?php if ($state === 'Wilayah Perseketuan Kuala Lumpur') {
                                                                                                            echo "Selected";
                                                                                                        } ?>>Wilayah Perseketuan Kuala Lumpur</option>
                                                    <option value="Wilayah Perseketuan Labuan" <?php if ($state === 'Wilayah Perseketuan Labuan') {
                                                                                                    echo "Selected";
                                                                                                } ?>>Wilayah Perseketuan Labuan</option>
                                                    <option value="Wilayah Perseketuan Putrajaya" <?php if ($state === 'Wilayah Perseketuan Putrajaya') {
                                                                                                        echo "Selected";
                                                                                                    } ?>>Wilayah Perseketuan Putrajaya</option>
                                                </select>
                                            </div>



                                            <div class="form-group">
                                                <label>Poskod :</label>
                                                <input type="text" class="form-control" name="txtpostcode" value="<?php echo $rowaccess['postcode']; ?>" required="">
                                            </div>
                                            <button type="submit" name="peribadi" class="btn btn-primary">Hantar</button>
                                        </form>


                                    </div>

                                    <div id="parent-details" class="tab-pane fade">
                                        <form action="updateprofile.php" method="POST" enctype="multipart/form-data">
                                            <!-- Parent Details Form Fields -->

                                            <input type="hidden" id="txtmatricID" name="txtmatricID" value="<?php echo $rowaccess['matricID']; ?>">
                                            <div class="form-group">
                                                <label>No Kad Pengenalan Ibu:</label>
                                                <input type="text" name="txticnoibu" value="<?php echo $rowaccess['icno_ibu']; ?>" class="form-control" required="">
                                            </div>



                                            <div class="form-group">
                                                <label>Nama Ibu:</label>
                                                <input type="text" name="txtnamaibu" value="<?php echo $rowaccess['nama_ibu']; ?>" class="form-control" required="">
                                            </div>



                                            <div class="form-group">
                                                <label>No Kad Pengenalan Bapa:</label>
                                                <input type="text" name="txticnobapa" value="<?php echo $rowaccess['icno_bapa']; ?>" class="form-control" required="">
                                            </div>



                                            <div class="form-group">
                                                <label>Nama Bapa:</label>
                                                <input type="text" name="txtnamabapa" value="<?php echo $rowaccess['nama_bapa']; ?>" class="form-control" required="">
                                            </div>



                                            <div class="form-group">
                                                <label>Nama Waris:</label>
                                                <input type="text" name="txtnamawaris" value="<?php echo $rowaccess['nama_waris']; ?>" class="form-control" required="">
                                            </div>



                                            <div class="form-group">
                                                <label>Alamat Waris:</label>
                                                <input type="text" class="form-control" value="<?php echo $rowaccess['address_waris']; ?>" name="txtaddress_waris" value="" required="">
                                            </div>



                                            <div class="form-group">
                                                <label>Bandar :</label>
                                                <input type="text" class="form-control" value="<?php echo $rowaccess['city_waris']; ?>" name="txtcity_waris" value="" required="">
                                            </div>



                                            <div class="form-group">
                                                <label>Negeri :</label>
                                                <select id="state" name="state_waris" class="form-control" required>
                                                    <?php $state_waris = $rowaccess['state_waris']; ?>
                                                    <option value="Johor" <?php if ($state_waris === 'Johor') {
                                                                                echo "selected";
                                                                            } ?>>Johor</option>
                                                    <option value="Kedah" <?php if ($state_waris === 'Kedah') {
                                                                                echo "selected";
                                                                            } ?>>Kedah</option>
                                                    <option value="Kelantan" <?php if ($state_waris === 'Kelantan') {
                                                                                    echo "selected";
                                                                                } ?>>Kelantan</option>
                                                    <option value="Melaka" <?php if ($state_waris === 'Melaka') {
                                                                                echo "selected";
                                                                            } ?>>Melaka</option>
                                                    <option value="Negeri Sembilan" <?php if ($state_waris === 'Negeri Sembilan') {
                                                                                        echo "selected";
                                                                                    } ?>>Negeri Sembilan</option>
                                                    <option value="Pahang" <?php if ($state_waris === 'Pahang') {
                                                                                echo "selected";
                                                                            } ?>>Pahang</option>
                                                    <option value="Pulau Pinang" <?php if ($state_waris === 'Pulau Pinang') {
                                                                                        echo "selected";
                                                                                    } ?>>Penang</option>
                                                    <option value="Perak" <?php if ($state_waris === 'Perak') {
                                                                                echo "selected";
                                                                            } ?>>Perak</option>
                                                    <option value="Perlis" <?php if ($state_waris === 'Perlis') {
                                                                                echo "selected";
                                                                            } ?>>Perlis</option>
                                                    <option value="Sabah" <?php if ($state_waris === 'Sabah') {
                                                                                echo "selected";
                                                                            } ?>>Sabah</option>
                                                    <option value="Sarawak" <?php if ($state_waris === 'Sarawak') {
                                                                                echo "selected";
                                                                            } ?>>Sarawak</option>
                                                    <option value="Selangor" <?php if ($state_waris === 'Selangor') {
                                                                                    echo "selected";
                                                                                } ?>>Selangor</option>
                                                    <option value="Terengganu" <?php if ($state_waris === 'Terengganu') {
                                                                                    echo "selected";
                                                                                } ?>>Terengganu</option>
                                                    <option value="Wilayah Perseketuan Kuala Lumpur" <?php if ($state_waris === 'Wilayah Perseketuan Kuala Lumpur') {
                                                                                                            echo "selected";
                                                                                                        } ?>>Wilayah Perseketuan Kuala Lumpur</option>
                                                    <option value="Wilayah Perseketuan Labuan" <?php if ($state_waris === 'Wilayah Perseketuan Labuan') {
                                                                                                    echo "selected";
                                                                                                } ?>>Wilayah Perseketuan Labuan</option>
                                                    <option value="Wilayah Perseketuan Putrajaya" <?php if ($state_waris === 'Wilayah Perseketuan Putrajaya') {
                                                                                                        echo "selected";
                                                                                                    } ?>>Wilayah Perseketuan Putrajaya</option>

                                                </select>
                                            </div>



                                            <div class="form-group">
                                                <label>Poskod :</label>
                                                <input type="text" class="form-control" name="txtpostcode_waris" value="<?php echo $rowaccess['postcode_waris']; ?>" required="">
                                            </div>



                                            <div class="form-group">
                                                <label>No. Telefon Waris :</label>
                                                <input type="text" class="form-control" name="txtphone_waris" value="<?php echo $rowaccess['phone_waris']; ?>" required="">
                                            </div>

                                            <button type="submit" name="parents" class="btn btn-primary">Hantar</button>
                                        </form>
                                    </div>

                                    <div id="background-education" class="tab-pane fade">
                                        <form action="updateprofile.php" method="POST" enctype="multipart/form-data">
                                            <!-- Background Education Form Fields -->
                                            <input type="hidden" id="txtmatricID" name="txtmatricID" value="<?php echo $rowaccess['matricID']; ?>">
                                            <div class="form-group">
                                                <label>Pendidikan:</label>
                                                <div>
                                                    <label class="radio-inline">
                                                        <?php $pendidikan = $rowaccess['pendidikan']; ?>
                                                        <input type="radio" name="pendidikan" value="Asasi Stem" required="" <?php if ($pendidikan === 'Asasi Stem') {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>> Asasi STEM
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="pendidikan" value="Diploma Perikanan" required="" <?php if ($pendidikan === 'Diploma Perikanan') {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>> Diploma Perikanan
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>CGPA</label>
                                                <input type="number" name=cgpa class="form-control" value="<?php echo $rowaccess['cgpa']; ?>" placeholder=" 0.00">
                                            </div>

                                            <div class="form-group">
                                                <label>Muet</label>
                                                <select name="muet" class="form-control">
                                                    <?php $muet = $rowaccess['muet']; ?>
                                                    <option value="Band 1" <?php if ($muet === 'Band 1') {
                                                                                echo "selected";
                                                                            } ?>> Band 1</option>
                                                    <option value="Band 2" <?php if ($muet === 'Band 2') {
                                                                                echo "selected";
                                                                            } ?>> Band 2 </option>
                                                    <option value="Band 3" <?php if ($muet === 'Band 3') {
                                                                                echo "selected";
                                                                            } ?>> Band 3 </option>
                                                    <option value="Band 4" <?php if ($muet === 'Band 4') {
                                                                                echo "selected";
                                                                            } ?>> Band 4 </option>

                                                </select>
                                            </div>

                                            <button type="submit" name="pendidikan" class="btn btn-primary">Hantar</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer">
            <div class="pull-right"></div>
            <div><?php include('footer.php'); ?></div>
        </div>

    </div>
    </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
    <link rel="stylesheet" href="popup_style.css">
    <?php if (!empty($_SESSION['success'])) {  ?>
        <div class="popup popup--icon -success js_success-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title">
                    <strong>Success</strong>
                    </h1>
                    <p><?php echo $_SESSION['success']; ?></p>
                    <p>
                        <button class="button button--success" data-for="js_success-popup">Close</button>
                    </p>
            </div>
        </div>
    <?php unset($_SESSION["success"]);
    } ?>
    <?php if (!empty($_SESSION['error'])) {  ?>
        <div class="popup popup--icon -error js_error-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title">
                    <strong>Error</strong>
                    </h1>
                    <p><?php echo $_SESSION['error']; ?></p>
                    <p>
                        <button class="button button--error" data-for="js_error-popup">Close</button>
                    </p>
            </div>
        </div>
    <?php unset($_SESSION["error"]);
    } ?>
    <script>
        var addButtonTrigger = function addButtonTrigger(el) {
            el.addEventListener('click', function() {
                var popupEl = document.querySelector('.' + el.dataset.for);
                popupEl.classList.toggle('popup--visible');
            });
        };

        Array.from(document.querySelectorAll('button[data-for]')).
        forEach(addButtonTrigger);
    </script>


</body>

</html>