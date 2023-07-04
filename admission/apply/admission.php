<?php
session_start();
error_reporting(1);
include('../connect.php');

$txtmatricID = $_SESSION["txtmatricID"];
$txticno = $_SESSION["txticno"];
$txtfullname = $_SESSION["txtfullname"];
$txtphone = $_SESSION["txtphone"];
$gender = $_SESSION["gender"];

$current_date = date('Y-m-d');

if (isset($_POST["btnsubmit"])) {

    //Get application ID
    function applicationID()
    {
        $string = (uniqid(rand(), true));
        return substr($string, 0, 5);
    }

    $applicationID = "ADM/" . date("Y") . "/" . applicationID();

    $txtmatricID = mysqli_real_escape_string($conn, $_POST['txtmatricID']);
    $fullname = mysqli_real_escape_string($conn, $_POST['txtmatricID']);
    $sex = mysqli_real_escape_string($conn, $_POST['cmdsex']);
    $phone = mysqli_real_escape_string($conn, $_POST['txtphone']);
    $email = mysqli_real_escape_string($conn, $_POST['txtemail']);
    $lga = mysqli_real_escape_string($conn, $_POST['txtlga']);
    $state = mysqli_real_escape_string($conn, $_POST['txtstate']);
    $jambno = mysqli_real_escape_string($conn, $_POST['txtjambno']);
    $jambscore = mysqli_real_escape_string($conn, $_POST['txtjambscore']);
    $faculty = mysqli_real_escape_string($conn, $_POST['txtfaculty']);
    $dept = mysqli_real_escape_string($conn, $_POST['txtdept']);
    $exam = mysqli_real_escape_string($conn, $_POST['txtexam']);

    $photo = 'upload/default.jpg';
    $credential = 'upload/Result-Report-card-software.png';

    $status = '0';
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets_form/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="assets_form/img/favicon copy.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Borang Permohonan | SDOAU</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="assets_form/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets_form/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets_form/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="image-container set-full-height">
        <!-- Creative Tim Branding  
        <a href="http://creative-tim.com">
            <div class="logo-container">
                <div class="logo">
                    <img src="assets_form/img/new_logo.png">
                </div>
                <div class="brand">
                    Creative Tim
                </div>
            </div>
        </a> -->

        <!--  Made With Get Shit Done Kit  -->
        <!-- <a href="http://demos.creative-tim.com/get-shit-done/index.html?ref=get-shit-done-bootstrap-wizard" class="made-with-mk">
            <div class="brand">GK</div>
            <div class="made-with">Made with <strong>GSDK</strong></div>
        </a> -->

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">

                        <div class="card wizard-card" data-color="orange" id="wizardProfile">
                            <form action="submit_admission.php" method="post" enctype="multipart/form-data">

                                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->



                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#personal" data-toggle="tab">Maklumat Peribadi</a></li>
                                        <li><a href="#waris" data-toggle="tab">Maklumat Ibu Bapa/Waris</a></li>
                                        <li><a href="#akademik" data-toggle="tab">Maklumat Akademik</a></li>
                                        <li><a href="#program" data-toggle="tab">Pilihan Program</a></li>
                                    </ul>

                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="personal">
                                        <div class="row">

                                            <div class="col-sm-4 col-sm-offset-1">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                        <img src="assets_form/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                        <input type="file" name="picture" id="wizard-picture" required>
                                                    </div>
                                                    <h6>Choose Picture</h6>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>ID Matrik:</label>
                                                    <input type="text" class="form-control" name="txtmatricID" value="<?php echo $txtmatricID; ?>" required="" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>No IC:</label>
                                                    <input type="text" class="form-control" name="txticno" value="<?php echo $txticno; ?>" required="" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Nama:</label>
                                                    <input type="text" class="form-control" name="txtfullname" value="<?php echo $txtfullname; ?>" required="" readonly>
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Jantina:</label>
                                                    <select name="gender" id="gender" class="form-control" required="">
                                                        <option value="">Sila Pilih</option>
                                                        <option value="Lelaki" <?php if ($gender == 'Lelaki') {
                                                                                    echo "Selected";
                                                                                } ?>>Lelaki</option>
                                                        <option value="Perempuan" <?php if ($gender == 'Perempuan') {
                                                                                        echo "Selected";
                                                                                    } ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>No. Telefon:</label>
                                                    <input type="text" class="form-control" name="txtphone" value="<?php echo $txtphone; ?>" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>E-mel :</label>
                                                    <input type="email" class="form-control" name="txtemail" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Alamat :</label>
                                                    <input type="text" class="form-control" name="txtaddress" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Bandar :</label>
                                                    <input type="text" class="form-control" name="txtcity" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Negeri :</label>
                                                    <select id="state" name="state" class="form-control" required>
                                                        <option value="">Sila Pilih</option>
                                                        <option value="Johor">Johor</option>
                                                        <option value="Kedah">Kedah</option>
                                                        <option value="Kelantan">Kelantan</option>
                                                        <option value="Melaka">Melaka</option>
                                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                        <option value="Pahang">Pahang</option>
                                                        <option value="Penang">Penang</option>
                                                        <option value="Perak">Perak</option>
                                                        <option value="Perlis">Perlis</option>
                                                        <option value="Sabah">Sabah</option>
                                                        <option value="Sarawak">Sarawak</option>
                                                        <option value="Selangor">Selangor</option>
                                                        <option value="Terengganu">Terengganu</option>
                                                        <option value="Wilayah Perseketuan Kuala Lumpur">Wilayah Perseketuan Kuala Lumpur</option>
                                                        <option value="Wilayah Perseketuan Labuan">Wilayah Perseketuan Labuan</option>
                                                        <option value="Wilayah Perseketuan Putrajaya">Wilayah Perseketuan Putrajaya</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Poskod :</label>
                                                    <input type="text" class="form-control" name="txtpostcode" value="" required="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="waris">
                                        <!-- <h4 class="info-text"> What are you doing? (checkboxes) </h4> -->
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>No. IC Ibu:</label>
                                                    <input type="text" name="txticnoibu" class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Nama Ibu:</label>
                                                    <input type="text" name="txtnamaibu" class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>No. IC Bapa:</label>
                                                    <input type="text" name="txticnobapa" class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Nama Bapa:</label>
                                                    <input type="text" name="txtnamabapa" class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Nama Waris:</label>
                                                    <input type="text" name="txtnamawaris" class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Alamat Waris:</label>
                                                    <input type="text" class="form-control" name="txtaddress_waris" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Bandar :</label>
                                                    <input type="text" class="form-control" name="txtcity_waris" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Negeri :</label>
                                                    <select id="state" name="state_waris" class="form-control" required>
                                                        <option value="">Sila Pilih</option>
                                                        <option value="Johor">Johor</option>
                                                        <option value="Kedah">Kedah</option>
                                                        <option value="Kelantan">Kelantan</option>
                                                        <option value="Melaka">Melaka</option>
                                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                        <option value="Pahang">Pahang</option>
                                                        <option value="Penang">Penang</option>
                                                        <option value="Perak">Perak</option>
                                                        <option value="Perlis">Perlis</option>
                                                        <option value="Sabah">Sabah</option>
                                                        <option value="Sarawak">Sarawak</option>
                                                        <option value="Selangor">Selangor</option>
                                                        <option value="Terengganu">Terengganu</option>
                                                        <option value="Wilayah Perseketuan Kuala Lumpur">Wilayah Perseketuan Kuala Lumpur</option>
                                                        <option value="Wilayah Perseketuan Labuan">Wilayah Perseketuan Labuan</option>
                                                        <option value="Wilayah Perseketuan Putrajaya">Wilayah Perseketuan Putrajaya</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Poskod :</label>
                                                    <input type="text" class="form-control" name="txtpostcode_waris" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>No. Telefon Waris :</label>
                                                    <input type="text" class="form-control" name="txtphone_waris" value="" required="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="akademik">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Pendidikan:</label>
                                                    <div>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="pendidikan" value="Asasi Stem" required=""> Asasi STEM
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="pendidikan" value="Diploma Perikanan" required=""> Diploma Perikanan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>CGPA</label>
                                                    <input type="number" name=cgpa class="form-control" placeholder="0.00">
                                                </div>
                                            </div>

                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>MUET</label><br>
                                                    <select name="muet" class="form-control">
                                                        <option value="Band 1"> Band 1</option>
                                                        <option value="Band 2"> Band 2 </option>
                                                        <option value="Band 3"> Band 3 </option>
                                                        <option value="Band 4"> Band 4 </option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="program">
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Pilihan 1:</label>
                                                    <select name="pilihan_1" id="pilihan_1" class="form-control" required="">
                                                        <option value="">Sila Pilih</option>
                                                        <?php
                                                        $sql_program = "SELECT * from tbl_r_program";

                                                        // Execute the query
                                                        $result_program = mysqli_query($conn, $sql_program); // For mysqli

                                                        while ($row_program = mysqli_fetch_assoc($result_program)) { ?>
                                                            <option value="<?php echo $row_program['kod_program']; ?>"><?php echo $row_program['nama_program']; ?></option>

                                                        <?php
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Pilihan 2:</label>
                                                    <select name="pilihan_2" id="pilihan_2" class="form-control" required="">
                                                        <option value="">Sila Pilih</option>
                                                        <?php
                                                        $sql_program = "SELECT * from tbl_r_program";

                                                        // Execute the query
                                                        $result_program = mysqli_query($conn, $sql_program); // For mysqli

                                                        while ($row_program = mysqli_fetch_assoc($result_program)) { ?>
                                                            <option value="<?php echo $row_program['kod_program']; ?>"><?php echo $row_program['nama_program']; ?></option>

                                                        <?php
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Pilihan 3:</label>
                                                    <select name="pilihan_3" id="pilihan_3" class="form-control" required="">
                                                        <option value="">Sila Pilih</option>
                                                        <?php
                                                        $sql_program = "SELECT * from tbl_r_program";

                                                        // Execute the query
                                                        $result_program = mysqli_query($conn, $sql_program); // For mysqli

                                                        while ($row_program = mysqli_fetch_assoc($result_program)) { ?>
                                                            <option value="<?php echo $row_program['kod_program']; ?>"><?php echo $row_program['nama_program']; ?></option>

                                                        <?php
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Pilihan 4:</label>
                                                    <select name="pilihan_4" id="pilihan_4" class="form-control" required="">
                                                        <option value="">Sila Pilih</option>
                                                        <?php
                                                        $sql_program = "SELECT * from tbl_r_program";

                                                        // Execute the query
                                                        $result_program = mysqli_query($conn, $sql_program); // For mysqli

                                                        while ($row_program = mysqli_fetch_assoc($result_program)) { ?>
                                                            <option value="<?php echo $row_program['kod_program']; ?>"><?php echo $row_program['nama_program']; ?></option>

                                                        <?php
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Pilihan 5:</label>
                                                    <select name="pilihan_5" id="pilihan_5" class="form-control" required="">
                                                        <option value="">Sila Pilih</option>
                                                        <?php
                                                        $sql_program = "SELECT * from tbl_r_program";

                                                        // Execute the query
                                                        $result_program = mysqli_query($conn, $sql_program); // For mysqli

                                                        while ($row_program = mysqli_fetch_assoc($result_program)) { ?>
                                                            <option value="<?php echo $row_program['kod_program']; ?>"><?php echo $row_program['nama_program']; ?></option>

                                                        <?php
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer height-wizard">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Seterusnya' />
                                        <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Hantar' />
                                        <
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Kembali' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->

        <!-- <div class="footer">
            <div class="container">
                Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>
            </div>
        </div> -->

    </div>

</body>

<!--   Core JS Files   -->
<script src="assets_form/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="assets_form/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets_form/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="assets_form/js/gsdk-bootstrap-wizard.js"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="assets_form/js/jquery.validate.min.js"></script>

</html>