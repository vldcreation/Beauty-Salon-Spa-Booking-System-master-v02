<?php 
	//mulai proses tambah data
	//cek dahulu, jika tombol tambah di klik
	if(isset($_POST['tambah'])){
		//inlcude atau memasukkan file koneksi ke database
		include('db.php');
		//jika tombol tambah benar di klik maka lanjut prosesnya
		$idAdmin = 1;
		$nama = $_POST['nama'];
		$harga = $_POST['harga'];
		//$id_admin = $_POST['id_admin'];
		if($_FILES['gambar']['name']){
			move_uploaded_file($_FILES['gambar']['tmp_name'], 'images/'.$nama.'.jpg'); 
			//proses menyimpan gambar ke dalam direktori
			$gambar = ''.$nama.'.jpg'; //membuat variabel $profile untuk disimpan sebagai url gambar ke dalam database
		}
		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
		$input = mysqli_query($conn, "INSERT INTO layanan VALUES('','$idAdmin','$nama','$harga','$gambar')") or die(mysqli_error($conn));
		//jika query input sukses
		if($input){
			echo"<script>alert('Tambah Layanan Berhasil');</script>";
			header("Refresh:0 url=layanan_admin.php");
		}
		else{
			echo 'Gagal menambahkan data '; //Pesan jika proses tambah	gagal
			header("location:tambah_layanan.php");//membuat Link untuk kembali ke halaman tambah
		}
	}
	else{ //jika tidak terdeteksi tombol tambah di klik
		//redirect atau dikembalikan ke halaman tambah
		echo '<script>window.history.back()</script>';
	}
?>


