<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
	require('connect.php');

	if (isset($_POST['username']) && ($_POST['password'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$name = $_POST['name'];
	if(!empty($username) && !empty($password) && !empty($password2) && ($password == $password2)  && !empty($email) && !empty($name)) {
			$query = "SELECT * FROM users WHERE 'username' == '$username'";
 			$data = mysqli_query ($connection, $query);  // отправили запрос в бд

		$query = "INSERT INTO users (username, email, password, name) VALUES ('$username', '$email', sha('$password'), '$name')";
		 $result = mysqli_query ($connection, $query);
		 if ($result){
		 	$smsg = "регистрация прошла успешно";
		 } else{
		 	$fmsg = "ошибка";		 
		 }
}

}
	?>
	<div class="container">
		<form class="form_signin" method="POST">
			<h2>Registration</h2>
<?php if (isset($smsg)){ ?><div class="allert allert-success" role="allert"> <?php echo $smsg; ?> </div><?php }?>
<?php if (isset($fmsg)){ ?><div class="allert allert-danger" role="allert"> <?php echo $fmsg; ?> </div><?php }?>			
			<input type="text" name="username" class="form-control" placeholder="Username" required></br>
			<input type="email" name="email" class="form-control" placeholder="email" required></br>
			<input type="password" name="password" class="form-control" placeholder="password" required></br>
			<input type="password" name="password2" class="form-control" placeholder="confirm password" required></br>
			<input type="text" name="name" class="form-control" placeholder="name" required></br>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
			<!-- btn- определить кнопнки btn lg- размер btn-primary-цвет block- на всю ширину блока-->
<a href="login.php">Войти</a>
		</form>
	</div>
</body>
	</html>