<?php	
	include "koneksi.php";

	// mengambil nilai dari yang di input di form login
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	// perintah untuk mendapatkan user dari db berdasarkan nama yang di input di form login
	$get_user = "INSERT INTO users(username, email, password) VALUES('$username' ,'$email', '$password')";
	$result = mysqli_query($konek,$get_user);
	
	if($result){
		Header("Location: index.html");
	}
?>