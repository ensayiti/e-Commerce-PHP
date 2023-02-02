<?php 
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
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/6b70e998b9.js" crossorigin="anonymous"></script>
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
				<input type="text" name="search" placeholder="Cari Produk" class="form-control">
				<input type="submit" name="cari" placeholder="Cari Produk" class="btn btn-danger">
			</form>
		</div>
	</div>

	<!-- category -->
		<div class="section">
			<div class="container">
				<h3>Kategori</h3>
				<div class="box text-center">
					<?php 
						$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
						if(mysqli_num_rows($kategori) > 0){
							while($k = mysqli_fetch_array($kategori)){
					 ?>
					 <a href="produk.php?kat=<?php echo $k['category_id'] ?>">
						<div class="col-2">
						<img src="img/icon-kategori.png" width="60px" >
						<p class="text-center text-decoration-none text-black"><?php echo $k['category_name'] ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Katergori tidak ada</p>
				<?php } ?>
			 </div>
		</div>
	</div>

	<!-- new product -->
	<div class="section"> 
	<div class="container">
		<h3>Produk Terbaru</h3>
		<div class="box">
			<?php 
				$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
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
		<small>
			Copyright &copy; 2023 - IR.Gayo Vapor.
		</small>
			<p>Alamat: <?php echo $a->admin_address ?> || Email: <?php echo $a->admin_email ?> || No telp: <?php echo $a->admin_telp ?></p>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>