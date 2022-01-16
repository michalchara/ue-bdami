<?php
	session_start();


	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: index.php");
		exit;
	}


	require_once "../db.php";


	$login = $name = $surname = $email = $password = $confirm_password = "";
	$error = "";


	if($_SERVER["REQUEST_METHOD"] == "POST")
	{

		

		if(empty($_POST["login"]))
		{
			$error = "Proszę podać login.";
		} 
		elseif(strlen($_POST["login"]) < 3)
		{
			$error = "Login musi posiadać przynajmniej 3 znaki";
		} 
		else 
		{
			
			$sql = "SELECT id FROM uzytkownicy WHERE login = '$_POST["login"]'";

			$stmt = $conn->query($sql);
    		$rows = $stmt->fetchAll();
    		$num_rows = count($rows);

			if ($num_rows > 0) 
			{
				$error = "Ten login został już wcześniej użyty.";
			} 
			else
			{
				$login = $_POST["login"];
			}			
		}

		

		if(empty($_POST["email"]))
		{
			$error = "Proszę podać e-mail.";
		} 
		elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
		{
			$error = "Wprowadzono nieprawidłowy format e-mail.";
			$email = $_POST["email"];
		} 
		else 
		{

			$sql = "SELECT id FROM users WHERE email = ?";
			if($stmt = $mysqli->prepare($sql)){

				$stmt->bind_param("s", $param_email);
				$param_email = $_POST["email"];

				if($stmt->execute())
				{
					$stmt->store_result();

					if($stmt->num_rows == 1)
					{
						$error = "Ten e-mail został już wcześniej użyty.";
					} 
					else
					{
						$email = $_POST["email"];
					}
				}
				else
				{
					echo "Coś poszło nie tak... Spróbuj ponownie później.";
				}
			}

			$stmt->close();
		}


		if(empty($_POST["password"]))
		{
			$error = "Proszę podać hasło.";
		} 
		elseif(strlen($_POST["password"]) < 5)
		{
			$error = "Hasło musi posiadać przynajmniej 5 znaków";
		} 
		else
		{
			$password = $_POST["password"];
		}


		if(empty($_POST["confirm_password"]))
		{
			$error = "Proszę potwierdzić hasło.";
		} 
		else
		{
			$confirm_password = $_POST["confirm_password"];
			if(empty($error) && ($password != $confirm_password))
			{
				$error = "Podane hasła nie są takie same.";
			}
		}


		if(empty($error))
		{
			$sql = "INSERT INTO users (email, password) VALUES (?, ?)";

			if($stmt = $mysqli->prepare($sql)){

				$stmt->bind_param("ss", $param_email, $param_password);
				$param_email = $email;
				$param_password = password_hash($password, PASSWORD_DEFAULT);


				if($stmt->execute())
				{
					header("location: login.php");
				} 
				else
				{
					echo "Coś poszło nie tak... Spróbuj ponownie później.";
				}
			}

			$stmt->close();
		}


		

		$mysqli->close();
	}

?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>180430</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="/css/main.css?v=<?=time();?>" />
	</head>
	<body>

		<?php 
            require_once($_SERVER['DOCUMENT_ROOT'].'/header.php');
        ?>

		<!- Main -->
		<section id="main">
            <div class="inner">                                    
 
				<div class="centered">

					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							
						<table class="centered">
								<tr> <td>Login:</td> <td><input type="text" name="login" value="<?php echo $login; ?>"></td> </tr>
								<tr> <td>Hasło:</td> <td><input type="password" name="password" value="<?php echo $password; ?>"></td> </tr>
								<tr> <td>Powtórz hasło:</td> <td><input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>"></td> </tr>

								<tr> <td>Imię:</td> <td><input type="text" name="name" value="<?php echo $name; ?>"></td> </tr>
								<tr> <td>Nazwisko:</td> <td><input type="text" name="surname" value="<?php echo $surname; ?>"></td> </tr>
								<tr> <td>e-mail:</td> <td><input type="text" name="email" value="<?php echo $email; ?>"></td> </tr>

								<tr> <td colspan="2"><input class="stretched" type="submit" value="Zarejestruj"></td> </tr>
						</table>

					</form>
				</div>

				<div class="contentCentered">
					</br>					
					<?php echo $error ?>
				</div>
			
            </div>
		</section>
		

	</body>
</html>