<?php 
	session_start();
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ir. Gayo Vapor</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
	<!-- header -->
	<header>
		<div class= "container">
			<h1><a href="dashboard.php" class="text-decoration-none text-light">Ir. Gayo Vapor</a></h1>
			<ul>
				<li><a href="dashboard.php" class="text-decoration-none text-light">Dashboard</a></li>
				<li><a href="profil.php" class="text-decoration-none text-light">Profile</a></li>
				<li><a href="data-kategori.php" class="text-decoration-none text-light">Category</a></li>
				<li><a href="data-produk.php" class="text-decoration-none text-light">Data Product</a></li>
				<li><a href="keluar.php" class="text-decoration-none text-light">Logout</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
		<div class="section">
			<div class="container">
				<h3>Dashboard</h3>
				<div class="box rounded-3">
				<h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?> di Toko Ir. Gayo Vapor</h4>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			<small>Copyright &copy; 2023 - IR.Gayo Vapor.</small>
		</div>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>