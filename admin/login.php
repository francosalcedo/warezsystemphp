<?php
session_start();

if(!empty($_SESSION['loginz'])) header('Location: index.php');

$error = false;

if($_POST){
	if($_POST['key']=='comida2017'){
		$_SESSION['loginz'] = 1;
		header('Location: login.php');
	}else{
		$error = true;
		$msg   = 'no valido';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="../css/materialize.min.css">
	<link rel="stylesheet" href="main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<div class="container login">
	<div class="row">
		<form action="login.php" method="post">
			<?php
			if($error){
				echo "<div class='col s12'><h2 class='logn-error'>{$msg}<h2></div>";
			}
			?>
			<div class="input-field col s12">
				<input name="key" type="password" class="valudate">
			</div>
			<div class="col s12 center">
				<button class="btn waves-effect">go</button>
			</div>
		</form>
	</div>
</div>
	
</body>
</html>