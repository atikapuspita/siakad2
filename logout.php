<?php

session_start();
session_destroy();

echo "<script>alert('Anda berhasil Log Out'); window.location = 'index.php'</script>";
?>