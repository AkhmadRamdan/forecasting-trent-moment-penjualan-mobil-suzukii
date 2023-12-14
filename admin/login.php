<?php

session_start();
include 'koneksi.php';
$alert = '';

if(isset($_SESSION['role'])){
	$role = $_SESSION['role'];

	if($role=='Admin'){
		header("location:index.php");
	}
}


if(isset($_POST['submit']))
{
 $username = mysqli_real_escape_string($conn,$_POST['username']);
 $password = mysqli_real_escape_string($conn,$_POST['password']);

 // menyeleksi data user dengan username dan password yang sesuai
$cariadmin = mysqli_query($conn,"select * from user where username='$username' and password='$password';");

// menghitung jumlah data yang ditemukan
$cekadmin = mysqli_num_rows($cariadmin);
 
// cek apakah username dan password di temukan pada database
	if($cekadmin > 0){
		// echo $cekadmin;
	
	//jika admin
	$data = mysqli_fetch_assoc($cariadmin);
 
		// buat session login dan username
		$_SESSION['username'] = $data['username'];
		$_SESSION['role'] = "Admin";
		header("location:index.php");
 	}  else {
	//jika user tidak ditemukan
		echo "<script>alert('Username & Password Salah \n atau \n Tidak Ditemukan !')</script>
			<meta http-equiv='refresh' content='2; url= login.php'/>";
    // echo "$cekadmin";
	}
 
}

?>


<!DOCTYPE html>
<html>

<head>
	<title>FORECASTING</title>
	  <meta content="" name="description">
	  <meta content="" name="keywords">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
 	<!-- Favicons -->
  	<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  	<!-- Google Fonts -->
  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  	<!-- Vendor CSS Files -->
	<link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="../assets/css/style.css" rel="stylesheet">
	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="../CSS/login.css">

</head>

<body>
	<!-- ======= Top Bar ======= -->
  <section id="topbar" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a class="navbar-brand" href="login.php">
          <img src="../IMG/s.png" class="logo1" alt="" width="40" height="34" class="d-inline-block align-text-top">
          Forecasting Penjualan Mobil Suzuki
        </a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
    </div>
  </header><!-- End Header -->

	<div class="wrap">
		<form action="" method="POST">
			<div class="avatar">
				<img src="../IMG/s.png">
			</div>
			<input type="text" name="username" placeholder="username" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="password" placeholder="password" required>
			<button type="submit" name="submit">LOGIN</button>
		</form>
	</div>

	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>