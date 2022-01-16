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
						<form action="" method="post">
							
							<table class="centered">
								<tr> <td>Login:</td> <td><input type="text" name="login" value="<?php echo $login; ?>"></td> </tr>
								<tr> <td>Hasło:</td> <td><input type="password" name="password" value="<?php echo $password; ?>"></td> </tr>
								<tr> <td colspan="2"><input class="stretched" type="submit" value="Zaloguj"></td> </tr>
							</table>

							

						</form>
					</div>

					<div class="contentCentered">
						</br>					
						Nie masz jeszcze konta? <a href="/account/register.php">Zarejestruj się!</a>
					</div>


			
            </div>
		</section>
		

	</body>
</html>