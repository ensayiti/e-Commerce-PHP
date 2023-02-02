<?php 
error_reporting(0);
 include 'db.php';
 $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");

 $a = mysqli_fetch_object($kontak);
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
			<h1><a href="index.php" class="text-decoration-none text-light">Ir. Gayo Vapor</a></h1>
			<ul>
				<li><a href="produk.php" class="text-decoration-none text-light">Produk</a></li>
			</ul>
		</div>
	</header>

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

	<!-- new product -->
	<div class="section"> 
	<div class="container">
		<h3>Produk </h3>
		<div class="box">
			<?php 
				if ($_GET['search'] != '' || $_GET['kat'] !=''){
					$where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
				}

				$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
				if(mysqli_num_rows($produk) > 0){
					while ($p = mysqli_fetch_array($produk)) {
			 ?>
				 <a href="detail-produk.php?id=<?php echo $p['product_id']  ?>">
					<div class="col-2 border">
						<img class="img-fluid" src="produk/<?php echo $p['product_image'] ?>">
						<p class="nama text-center text-decoration-none text-black"><?php echo substr($p['product_name'], 0 , 30) ?></p>
						<p class="harga text-center text-decoration-none text-black">Rp. <?php echo number_format($p['product_price']) ?></p>
					</div>
				</a>	
			<?php }}else{ ?>
				<p>Produk tidak ada</p>
			<?php } ?>
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
			<p>J<?php echo $a->admin_telp ?></p>

			<small>Copyright &copy; 2023 - Ir. Gayo Vapor.</small>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>