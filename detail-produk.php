<?php 
error_reporting(0);
 include 'db.php';
 $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");

 $a = mysqli_fetch_object($kontak);

 $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
 $p = mysqli_fetch_object($produk);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ir. Gayo Vapor</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
	<!-- header -->
	<nav class="navbar navbar-expand-md navbar-dark bg-[#7C3C21]">
  <div class="container-fluid">
    <a class="navbar-brand d-md-none" href="#">
      <img src="https://via.placeholder.com/200x108.png?text=Logo" width="70px"  alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <a class="navbar-brand d-none d-md-block" href="#">
          <img src="https://via.placeholder.com/200x108.png?text=Logo" width="70px" alt="">
        </a>
        <li class="nav-item">
          <a class="nav-link active" href="about.php">About</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php" class="input-group">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>" class="form-control" >
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="cari" value="Cari Produk" class="btn btn-danger">
			</form>
		</div>
	</div>

	<!-- product detail -->
	<div class="section">
		<div class="container"> 
			<h3>Detail Produk</h3>
			<div class="box">
				<div class="col-5">
					<img class="border border-5" src="produk/<?php echo $p->product_image ?>" >
				</div>
				<div class="row">
					<h3><?php echo $p->product_name ?></h3>
					<h4>Rp. <?php echo number_format($p->product_price) ?></h4>
					<p> Deskripsi :<br>
						<?php echo $p->product_description ?>
					</p>
					<span class="input-group gap-2">
					<a class="text-end" href="/bukawarung"><button class="btn btn-danger btn-md">Back</button></a>
					<a class="text-end" href="https://wa.me/6287885059096?text=Halo%20saya%20mau%20order" target="_blank"><button class="btn btn-success btn-md">Order Now</button></a>
					</span>
				</div>
			</div>
		</div>
	</div>

		<!-- footer -->
	<div class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p><?php echo $a->admin_address ?></p>

			<h4>Email</h4>
			<p><?php echo $a->admin_email ?></p>

			<h4>No telp</h4>
			<p><?php echo $a->admin_telp ?></p>

			<small>Copyright &copy; 2023 - Ir. Gayo Vapor.</small>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>