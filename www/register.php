<?php require('config.php'); 

if( $user->is_logged_in() ){ header('Location: main.php'); }

if(isset($_POST['register'])){

	if(strlen($_POST['nrIndex']) < 7){
		$error[] = 'Nazwa użytkownika jest za krótka.';
	} else {
		$stmt = $db->prepare('SELECT login FROM users WHERE login = :nrIndex');
		$stmt->execute(array(':nrIndex' => $_POST['nrIndex']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['login'])){
			$error[] = 'Podana nazwa użytkownika jest już zajęta';
		}
	}

	if(strlen($_POST['userPassword']) < 5){
		$error[] = 'Hasło jest za krótkie.';
	}
	
	if(!isset($error)){
		$hashedpassword = md5($_POST['userPassword']);

			$stmt = $db->prepare('INSERT INTO users (login,password,type_account) VALUES (:nrIndex, :userPassword, "user")');
			$stmt->execute(array(
				':nrIndex' => $_POST['nrIndex'],
				':userPassword' => $hashedpassword
			));

			$id = $db->lastInsertId('ID_USER');

			header('Location: login.php');
			exit;
	}
}

?>


<!DOCTYPE html>
<html>
<head>

<title>Rejestracja - System Udostępniania Wykładów</title>
<?php include 'includes/head-meta.html'; ?>
</head>

<body>

<header>
    <div class="container">
        <div class="columns">
            <div class="column is-6">
            <?php include 'includes/logo.html'; ?>
            </div>  
            <div class="column is-6">
            <a href="login.php" id="loginButton" class="primary-button">Zaloguj</a>
            </div>     
        </div>
    </div>
</header>

<section class="section is-medium">
    <main>
        <div class="container">
            <div class="columns">
                <div class="column is-6">
                    <h2 class="title">Rejestracja</h2>
					
					<?php
						if(isset($error)){
							foreach($error as $err){
							echo '<p>'.$err.'</p>';
							}
						}
					?>
					
					
                    <form action="register.php" method="post" class="primary-form">
                        <label for="nrIndex">Nr Indeksu: </label>
                        <input type="text" name="nrIndex" class="input is-large">
                        <label for="userPassword">Hasło: </label>
                        <input type="password" name="userPassword" class="input is-large">
                        <input type="submit" value="Zarejestruj" name="register" class="primary-button">
                    </form>
                </div>
            </div>
        </div>
    </main>
</section>

<?php include 'includes/footer.html'; ?>

</body>
</html>