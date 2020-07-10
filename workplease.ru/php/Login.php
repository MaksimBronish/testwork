<?php 
if(!isset($_COOKIE['id'])) { // если не существуют куки id
	if(isset($_POST['submit'])) {
		$user_username = $_POST['username'];
		$user_password = $_POST['password'];
		if (!empty($user_username) && !empty($user_password)) { // проверяем на пустые значения в строчках
			$query = "SELECT id , username from practice WHERE username ='$user_username' && password = SHA('user_password')";
			$data = mysqli_query ($connection, $query); // отправляем запрос в бд
			if(mysqli_num_rows($data) == 1){   // еслм нашло хотябы 1 запись тода выполняем первое
					$row = mysqli_fetch_assoc ($data); // Присваиваем переменной row данные переменной data
					setcookie('id', $row['id'], time() + (60*60*24*30));
					setcookie('username', $row['username'], time() + (60*60*24*30));
					$home_url = 'http://' . $_SERVER['HTTP_HOST'];
					header ('Location: ' . $home_url);
			} else {
				echo 'Неправильный логин или пароль';

			}
		}
	}
}

 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
<body>
	<section>
		<?php 
if(empty ($_COOKIE['username'])) {    // если пустое значение у куки юзер нэйм выводит текс ниже
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			 <input type="text" name="username" class="form-control" placeholder="Username" required></br>
			 <input type="password" name="password" class="form-control" placeholder="password" required></br>
			<button class="btn btn-lg btn-primary btn-block" type="submit"><a href="startpage.php">Вход</a></button>
			
<a href="index.php">Регистрация</a>
<p><a href="startpage.php">Личный кабинет</a></p>
<p><a href="exit.php">выйти и удалить куки</a></p>
		</form>
		<?php
} else {
	echo 'куки существуют.';
}
		?>

	</section>
	
</body>

</html>