<?php
include 'config.php';


if(!isset($_POST['submit'])) {
?>

<h1>Login:</h1>
<form method="POST">
Username:
<input type="text" name="username" />
Password:
<input type="password" name="password" />
<input type="submit" name="submit" />
</form>	


<?php
}else{
	$userdata = null;
	$username = mysql_escape_string($_POST['username']);
	$password = md5($_POST['password']);
	$sql = "SELECT login FROM users WHERE login = '$username' AND pass = '$password'";
	$r = mysql_query($sql);
	if (mysql_num_rows($r)) {
	   $r = mysql_query("SELECT * FROM users WHERE login = '$username'");
	   $userdata = mysql_fetch_array($r);
	   echo "Hello, ".$userdata["status"];
           if ($username=='root') {
               echo ",your flag is iset{K0LUmn_TRUNc4t10N_1z_4W350m3}";
           }
	} else {
		die("Login error!");
	}
}
?>
