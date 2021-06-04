<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>SISTA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
	<meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
	<meta content="Themesdesign" name="author" />
	<!-- favicon -->
	<link rel="shortcut icon" href="<?= base_url('assets/img/nodify/favicon.ico') ?>">

	<!-- Pe-7 icon -->
	<link href="<?= base_url('assets/css/nodify/pe-icon-7.css') ?>" rel="stylesheet" type="text/css" />

	<!--Slider-->
	<link rel="stylesheet" href="<?= base_url('assets/css/owl/owl.carousel.min.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/owl/owl.theme.default.min.css') ?>" />

	<!-- css -->
	<link href="<?= base_url('assets/css/bootstrap/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/css/nodify/style.min.css" rel="stylesheet" type="text/css') ?>" />

	<link href="<?= base_url('assets/css/fontawesome/all.min.css" rel="stylesheet" type="text/css') ?>">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<!-- <link href="css/assets/css/sbadmin2/sb-admin-2.min.css" rel="stylesheet"> -->
	<!-- <link href="css/assets/css/sweetalert/sweetalert2.min.css" rel="stylesheet"> -->

</head>

<body>

	<!-- Loader -->
	<div id="preloader">
		<div id="status">
			<div class="spinner">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>
	</div>

	<!--Navbar Start-->
	<nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark align-items-center">
		<div class="container">
			<!-- LOGO -->
			<a class="logo mr-3" href="layout-one-1.html">
				<img src="<?= base_url('assets/img/nodify/sista.png') ?>" alt="" class="" height="26">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<i class="" data-feather="menu"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav navbar-center" id="mySidenav">
					<li class="nav-item active">
						<a href="#home" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="jadwal.html" class="nav-link">Jadwal</a>
					</li>
					<li class="nav-item">
						<a href="daftarseminar.html" class="nav-link">Daftar Seminar</a>
					</li>
					<!-- <li class="nav-item">
                        <a href="#features" class="nav-link">Berita</a>
                    </li> -->
					</li>
					<li class="nav-item">
						<a href="about.html" class="nav-link">About</a>
					</li>

				</ul>

				<ul class="list-inline ml-auto menu-social-icon mb-0 py-2 py-lg-0">
					<li class="list-inline-item ml-0">
						<button type="submit" id="submit" name="send" class="btn btn-primary" onClick="
                            window.location.href='./login.html'">Login</button>
					</li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- Navbar End -->

	<!-- Hero Start -->
	<section class="hero-1-bg bg-light" style="background-image: url(<?= base_url('assets/img/nodify/hero-1-bg-img.png)') ?>" id="home">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-6">
					<h1 class="display-4 font-weight-medium mb-4">Hello,</h1>
					<h1 class="hero-1-title font-weight-normal text-dark mb-4">Apa sih itu sista?</h1>
					<p class="text-muted mb-4 pb-3">Sista adalah Sistem informasi seminar tugas akhir yang di sediakan
						oleh kampus untuk mahasiswa agar mudah dalam menjalanin tugas seminar tugas akhir.</p>
					<a href="jadwal.html" class="btn btn-primary">Lihat Jadwal <span class="ml-2 right-icon">&#8594;</span></a>
				</div>
				<div class="col-lg-6 col-md-10">
					<div class=" mt-5 mt-lg-0">
						<img src="<?= base_url('assets/img/nodify/hero-img.png') ?>" alt="" class="img-fluid d-block mx-auto">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero End -->

	<!-- About us Start -->

	<!-- About us End -->

	<!-- Services Start -->

	<!-- Services End -->

	<!-- Features Start -->

	<!-- Features End -->

	<!-- Project Start -->

	<!-- Project End -->

	<!-- Testimonial Start -->

	<!-- Latest News End -->

	<!-- Contact Us Start -->

	<!-- Footer End -->

	<!-- javascript -->
	<script src="<?= base_url('assets/js/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/scrollspy/scrollspy.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery-easing/jquery.easing.min.js') ?>"></script>
	<!-- feather icons -->
	<script src="https://unpkg.com/feather-icons"></script>

	<!-- carousel -->
	<script src="<?= base_url('assets/js/owl/owl.carousel.min.js') ?>"></script>

	<!-- Main Js -->
	<script src="<?= base_url('assets/js/nodify/app.js') ?>"></script>

	<script>
		// Fether icon
		feather.replace()

		// Testimonial
		$('#testi-clients').owlCarousel({
			loop: true,
			center: true,
			autoplay: true,
			autoplayTimeout: 3000,
			margin: 20,
			nav: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 3
				}
			}
		});
	</script>

</body>

</html>