	<?php
	session_start();
	global $conn;
	$conn = new mysqli('localhost', 'root', '', 'msalon');
	if(!$conn){
		die("database connection problem");
	}
	$db_use = mysqli_select_db($conn,"msalon") or die("select db problem");


	
	function execQ($strQ){
		global $conn;
		$res = mysqli_query($conn, $strQ);

		return $res;	
	}

	function Register(){
		global $conn;
		$role 	= 2;
		$nama 	= $_POST['nama'];
        $username 	= $_POST['username'];
        $email 	= $_POST['email'];
        $password 	= $_POST['password'];
        $jenis = $_POST['jenisKelamin'];
        $alamat = $_POST['alamat'];
        $nomor 	= $_POST['nomorHandphone'];
    	$usernameku = "";
    	$passwordku = "";
    	$emailku = "";

    	$queryQ    = "SELECT * FROM member WHERE username='$username' AND password='$password'";
		$resultQ = mysqli_query($conn, $queryQ);
		while($row = mysqli_fetch_array($resultQ)){
			$usernameku = $row['username'];
			$passwordku = $row['password'];
		}

		// $queryE    = "SELECT * FROM pengguna WHERE email='$email'";
		// $resultE = mysqli_query($conn, $queryE);   
		// while($rows = mysqli_fetch_array($resultE)){
		// 	$emailV = $rows['email'];
		// } 	

		if($usernameku == $username && $passwordku == $password){
			echo '
				<script language = "javascript">
					document.location="sign up.php?salah";
				</script>
				';
		}/*else if($emailV == $email){
				echo '
				<script language = "javascript">
					alert("Email telah ada!");
					document.location="sign up.php?";
				</script>
				';
			}*/else{
				$strQ = "INSERT INTO member(nama_member,username,password,email,alamat,nomor_handphone,jenis_kelamin,role) VALUES('$nama', '$username', '$password', '$email', '$alamat', '$nomor', '$jenis', '$role')";
	    		$result = mysqli_query($conn, $strQ);	

				if($result) {
				    echo '
					<script language = "javascript">
						alert("Anda telah terdaftar, silahkan login!");
						document.location="index.php";
					</script>
					';
				}
				else {
				    echo '
				    	<script language = "javascript">
							alert("Anda gagal mendaftar!");
							document.location="registrasi.php";
						</script>
				    ';
				}	
		}
	}
/*
		function login(){
		global $conn;
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query    = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn, $query);

		while($row = mysqli_fetch_array($result)){
			$uname = $row['username'];
			$passw = $row['password'];
			$role = $row['id_role'];
			$id = $row['id_pengguna'];
		}

		if($username == $uname && $password == $passw){
			$_SESSION['flag'] = 1;
			$_SESSION['user_role'] = $role;
			$_SESSION['user_id'] = $id;
				if($role == 1){//jika admin
					date_default_timezone_set('Asia/Jakarta');
						$tgl_sekarang = date("Y-m-d");
						//untuk update status jika telah expired(2 hari tidak ada konfirmasi pembayaran)

						$query = "SELECT * FROM transaksi WHERE Status = 'Request'";
						$res = mysqli_query($conn, $query);
						while($data = mysqli_fetch_array($res)){
							$tgl = $data['Tgl_Pesan'];
							$datang = strtotime($data['Tgl_Datang']);
							$ID = $data['ID_Transaksi'];

							$KurangTigaHari = date('Y-m-d', strtotime('-2 day', $datang));
							if($tgl_sekarang >= $KurangTigaHari){
									$Query = "UPDATE transaksi SET Status = 'Cancel'  WHERE ID_Transaksi = '$ID'";
									$resKon = execQ($Query);
									//Untuk mengembalikan stok ke stok awal. Fungsi ini terdapat paling bawah.
									KonfirmasiRequest($ID, 3);
								}
						}
					header("location: daftar_pemesanan.php");		
				}else{//jika member
					date_default_timezone_set('Asia/Jakarta');
						$tgl_sekarang = date("Y-m-d");
						//untuk update status jika telah expired(2 hari tidak ada konfirmasi pembayaran)

						$query = "SELECT * FROM transaksi WHERE Status = 'Request' AND ID_User = '$id'";
						$res = mysqli_query($conn, $query);
						while($data = mysqli_fetch_array($res)){
							$tgl = $data['Tgl_Pesan'];
							$datang = strtotime($data['Tgl_Datang']);
							$ID = $data['ID_Transaksi'];

							$KurangTigaHari = date('Y-m-d', strtotime('-2 day', $datang));
							if($tgl_sekarang >= $KurangTigaHari){
									$Query = "UPDATE transaksi SET Status = 'Cancel'  WHERE ID_Transaksi = '$ID'";
									$resKon = execQ($Query);
									//Untuk mengembalikan stok ke stok awal. Fungsi ini terdapat paling bawah.
									KonfirmasiRequest($ID, 3);
								}
						}
					header("location: browseAll.php");
				}
			
		} else {
			$_SESSION['flag'] = 0;
			header("location:index.php");
		}
	}

	?>