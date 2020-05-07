<?php
  session_start(); 
  $usernameku = $_POST['username'];
  $passwordku = $_POST['password'];

  include 'db.php';

  $query = "SELECT * FROM member WHERE username = '$usernameku' and password = '$passwordku'";
	$exect = mysqli_query($conn,$query);

	$user_konfirmasi = "";
	$pass_konfirmasi = "";

	while($row=mysqli_fetch_array($exect))
	{
		$user_konfirmasi = $row['username'];
		$pass_konfirmasi = $row['PASSWORD'];
		$name = $row['username'];
		$id = $row['id_member'];
		$role = $row['role'];
  	}
  
  	
	if($usernameku == $user_konfirmasi && $passwordku == $pass_konfirmasi)
	{
    $_SESSION['is_logged_in'] = TRUE;
    $_SESSION['nama'] = $name;
    $_SESSION['id'] = $id;
    $_SESSION['role'] = $role;
    if($role == 2)
    {
      echo "<script>alert('Selamat datang $usernameku'); window.location = 'index.php'</script>";
    }
 //    else if($role==1){
 //      header("Location:admin.php");
 //    }
	// else if($role==3){
 //      header("Location:gudang.php");
 //    }

	// }
	else
	{
	  echo"<script>alert('Maaf Anda Tidak Terdaftar!');</script>";
      header("Refresh:0 url=loginMember.php");
	}
	}
	
	
?>
