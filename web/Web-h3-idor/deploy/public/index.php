<?php

function reg(){
  if(strpos($_GET['user'], ' ') || strpos($_GET['pass'], ' ') || strpos($_GET['user'], '  ') || strpos($_GET['pass'], ' ')){
    die();
  }
	$file = fopen("users.txt", "a") or die("lol =)");
  $string = file_get_contents("users.txt");
  $string = explode("\n", $string);

    if(!(in_array($_GET['user'], $string))) {
		fwrite($file, $_GET['user']."\n");
		fclose($file);

		$file = fopen($_GET['user'].".txt", "w");
		fwrite($file,$_GET['user'].' '.$_GET['pass']."\n");
		fclose($file);
		echo "Wow! Success!!";
    } else{
    	echo "lol =)";
    }
}

function login(){

  if(strpos($_GET['user'], ' ') || strpos($_GET['pass'], ' ') || strpos($_GET['user'], '  ') || strpos($_GET['pass'], ' ')){
    die();
  }
  $string = file_get_contents($_GET['user'].".txt");
  $string = explode(" ", $string);

    if( ($string[0] === $_GET['user']) && (explode("\n", $string[1])[0] === $_GET['pass'])) {
    	setcookie("cook", base64_encode($_GET['user']),time()+600);
    	header("Location: /");
    } else{
    	echo "lol =)";
    }
}


  $string = file_get_contents("users.txt");
  $string = explode("\n", $string);

if(isset($_COOKIE['cook']) && (in_array(base64_decode($_COOKIE['cook']), $string))){
	header("Location: /profile.php");
	die();
}

if (isset($_GET['type'],$_GET['user'],$_GET['pass']) && !empty($_GET['type']) && !empty($_GET['user']) && !empty($_GET['pass'])){
	if ($_GET['type'] === 'reg'){
		reg();
		die();
	}
	if ($_GET['type'] === 'log'){
		login();
		die();
	}
	header("Location: /");
}
else{
	echo '
<!DOCTYPE html>
<html>
<body>
<form>
  Register:<br>
  <input class="input100" type="text" name="user" pattern="^((?!\s|\t.)*$"><br>
  <input type="password" name="pass" pattern="^((?!\s|\t.)*$"><br>
  <input type="hidden" name="type" value="reg"><br>
  <input type="submit" value="Register">
</form>
<br>
<br>
<form>
  Login:<br>
  <input type="text" name="user" pattern="^((?!\s|\t.)*$"><br>
  <input type="password" name="pass" pattern="^((?!\s|\t.)*$"><br>
  <input type="hidden" name="type" value="log"><br>
  <input type="submit" value="Login">
</form> 
<br>
<br>
<br>
Our users:<br>
<textarea name="textarea" rows="5" cols="30" disabled>'.file_get_contents("users.txt").'</textarea>
</body>
</html>';

}