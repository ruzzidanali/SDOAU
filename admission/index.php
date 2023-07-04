<?php
session_start();
error_reporting(0);
include('connect.php');

$current_date = date('Y-m-d H:i:s');

if (isset($_POST['btnsubmit'])) {

	$txtmatricID = $_POST['txtmatricID'];
	$txticno = $_POST['txticno'];
	$txtfullname = $_POST['txtfullname'];
	$gender = $_POST['gender'];
	$txtphone = $_POST['txtphone'];


	$sql = "SELECT * FROM tbl_pemohon WHERE matricID='" . $txtmatricID . "' or icno = '" . $txticno . "'";
	$result = mysqli_query($conn, $sql);


	if (mysqli_num_rows($result) == 0) {
		// output data of each row
		($row = mysqli_fetch_assoc($result));
		$_SESSION["txtmatricID"] = $txtmatricID;
		$_SESSION["txticno"] = $txticno;
		$_SESSION["txtfullname"] = $txtfullname;
		$_SESSION["gender"] = $gender;
		$_SESSION["txtphone"] = $txtphone;

		header("Location: apply/admission.php");
	} else {
?>
		<script>
			alert('Akaun sudah didaftar!');
		</script>
<?php
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Site Metas -->
<title>Universiti Malaysia Terengganu | SDOAU</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<!-- Site Icons -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/apple-touch-icon.jpg">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Site CSS -->
<link rel="stylesheet" href="style.css">
<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="css/versions.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="css/responsive.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="css/custom.css">

<!-- Modernizer for Portfolio -->
<script src="js/modernizer.js"></script>

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style type="text/css">
	<!--
	.style1 {
		color: #000000
	}
	-->
</style>

<style>
  .nav.nav-tabs {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
</style>

</head>

<body class="host_version">

	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header tit-up">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Daftar Akaun Di sini </h4>
				</div>
				<div class="modal-body customer-box">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">

						<img src="images/logo.png" alt="" height="150" width="200" />

					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="Login">
							<?php
							include('form.php');
							?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->

	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo.png" alt="" height="80" width="auto" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
				<p style="margin-top: 15px;"> Selamat Datang ke SDOAU <br> Mulakan Permohonan anda dengan klik butang "Mohon"</p>
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php">Utama</a></li>
						<li class="nav-item"><a class="nav-link" href="SENARAI-PROGRAM.pdf" target="_blank">Senarai program</a></li>
						<li class="nav-item"><a class="nav-link" href="REQUIREMENT.pdf" target="_blank">Syarat kelayakan</a></li>
						<ul class="nav navbar-nav navbar-right">
							<li style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
							<a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Mohon</span></a></li>
						</ul>
						<li class="nav-item"><a class="nav-link" href="user/index.php" target="_blank">Log Masuk Pelajar</a></li>
						<li class="nav-item"><a class="nav-link" href="admin/index.php" target="_blank">Admin</a></li>


					</ul>

				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div id="home" class="first-section" style="background-image:url('images/slider-01.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-sm-5 text-center" style="left: 180px; bottom: 150;">
									<div class="big-tagline">
									<img src="images/logo.png" alt="" height="auto" width="auto" />
										<h2>UNIVERSITI MALAYSIA TERENGGANU</h2>
										<p class="lead">Terokaan Seluas Lautan, Demi Kelestarian Sejagat. </p>
										<a href="https://www.umt.edu.my/" class="hover-btn-new orange" target="_blank"><span>LAMAN WEB UMT</span></a>
									</div>
								</div>
							</div><!-- end row -->
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slider-03.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2><img src="images/logo.png" alt="" height="auto" width="auto" /></h2>
										<p class="lead" data-animation="animated fadeInLeft">Follow Media Sosial UMT</p>
										<a href="https://www.facebook.com/OfficialUMT/" class="hover-btn-new orange" target="_blank"><span>Facebook UMT</span></a>
										<a href="https://www.instagram.com/officialumt/" class="hover-btn-new orange" target="_blank"><span>Instagram UMT</span></a>
										

									</div>
								</div>
							</div><!-- end row -->
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<div id="overviews" class="section wb">
		<div class="container">
			<div class="section-title row text-center">
				<div class="col-md-8 offset-md-2">
					<h2><strong>TENTANG UMT </strong></h2>
					<p align="center" class="lead style1">Ilmu dan amal yang berpadu berlandaskan keimanan kepada Allah adalah tonggak kepada usaha universiti menyediakan modal insan yang berwibawa untuk kesejahteraan sejagat.</p>
					<p>&nbsp;</p>
					<h4><strong>VISI</strong></h4>
					<p>Universiti berfokus marin terunggul dalam negara dan disegani di peringkat global.</p>
					<p>&nbsp;</p>
					<h5><strong>MISI</strong></h5>
					<p>Menjana ilmu untuk kesejahteraan masyarakat dan kelestarian alam.</p>
				</div>
			</div><!-- end title -->

			<div class="section-title row text-center">
				<div class="col-md-8 offset-md-2">
					<div class="message-box">
					<p>&nbsp;</p>
						<h4 align="center">UNIVERSITI MALAYSIA TERENGGANU </h4>
						<br>
						<h2 align="center">Selamat Datang ke<br>Sistem Permohonan Secara Dalam Talian Calon <br>Lepasan Diploma dan Asasi UMT ke Program Sarjana Muda UMT </h2>
						<p>&nbsp;</p>
						<a href="SENARAI-PROGRAM.pdf" class="hover-btn-new orange" target="_blank"><span>Senarai Program</span></a>
						<a href="REQUIREMENT.pdf" class="hover-btn-new orange" target="_blank"><span>Syarat Kelayakan</span></a>
						<a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Mulakan Permohonan Di sini</span></a></li>
					</div><!-- end messagebox -->
				</div><!-- end col -->

				<div class="col-md-8 offset-md-2">
					<div class="post-media wow fadeIn">
					<p>&nbsp;</p>
						<img src="images/blog_6.jpg" alt="" width="auto" height="auto" class="img-fluid img-rounded">
					</div>
					<!-- end media -->
				</div><!-- end col -->
			</div>
			<!--<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="post-media wow fadeIn"></div>-->
					<!-- end media -->
				</div><!-- end col -->
				<!-- end col -->
			</div>
			<!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->
	<!-- end section -->
	<!-- end section -->
	<!-- end section -->
	<!-- end section -->
	<!--<footer class="footer">
		<div class="container">
			<div class="row"> -->
				<!-- end col -->
				<!-- end col -->
				<!-- end col -->
			</div>
			<!-- end row -->
		</div><!-- end container -->
	</footer><!-- end footer -->

	<?php

	include('footer.php');
	?>

	<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/all.js"></script>
	<!-- ALL PLUGINS -->
	<script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
</body>

</html>