
<?php

	if(isset($_POST['edit'])){
		include 'db.php';
		$id_product = $_GET['id_product'];
		$nama = $_POST['nama'];
		$harga = $_POST['harga'];
		$stock = $_POST['stock'];
		
		
		if($_FILES['gambar']['name']){
			move_uploaded_file($_FILES['gambar']['tmp_name'], 'images/'.$nama.'.jpg');
			$gambar = ''.$nama.'.jpg'; 
		}

		 $hasil = mysqli_query($conn, "UPDATE product SET nama='$nama', harga='$harga', stock='$stock', gambar='$gambar' WHERE id_product='$id_product'");
		 
		if($hasil){
			echo"<script>alert('Edit Produk Berhasil');</script>";
			header("Refresh:0 url=produk_admin.php");
		}
		else{
			echo 'Gagal menyimpan data! '; 
			header("location:produk_admin.php");
		}
	}
	else{
		echo '<script>window.history.back()</script>';
	}
?>
