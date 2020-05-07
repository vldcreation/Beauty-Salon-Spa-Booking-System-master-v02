<?php
session_start();
session_destroy();
echo "<script>alert('anda berhasil logout !'); window.location = 'index.php'</script>";
?>
