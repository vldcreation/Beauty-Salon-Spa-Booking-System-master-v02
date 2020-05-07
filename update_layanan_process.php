
<?php
	if(isset($_POST['edit'])){
		include 'db.php';

		$id_layanan = $_GET['id_layanan'];
		$nama = $_POST['nama'];
		$harga = $_POST['harga'];
		
		
		if($_FILES['gambar']['name']){
			move_uploaded_file($_FILES['gambar']['tmp_name'], 'images/'.$nama.'.jpg');
			$gambar = ''.$nama.'.jpg';
		}

		 $hasil = mysqli_query($conn, "UPDATE layanan SET nama='$nama', harga='$harga', gambar='$gambar' WHERE id_layanan='$id_layanan'");
		 		
		if($hasil){
			echo"<script>alert('Edit layanan Berhasil');</script>";
			header("Refresh:0 url=layanan_admin.php");
		}
		else{
			echo 'Gagal menyimpan data! '; 
			header("locationlayanan_admin.php"); 
		}
	}
	else{ 
		echo '<script>window.history.back()</script>';
	}
?>
