<?php require_once('config.php'); 

if( $user->is_logged_in() ){ header('Location: main.php'); }

if(isset($_POST['login'])){

	$login = $_POST['nrIndex'];
	$password = $_POST['userPassword'];
	
	if($user->login($login,$password))
	{ 
		$_SESSION['login'] = $login;
		header('Location: main.php');
		exit;
	
	} 
	else 
	{
		$notification[] = 'Błędne dane logowania';
	}
}

?>


<!DOCTYPE html>
<html>
<head>

<title>Logowanie - System Udostępniania Wykładów</title>
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
            <a href="register.php" id="registerButton" class="primary-button">Zarejestruj</a>
            </div>     
        </div>
    </div>
</header> 

<section class="section is-medium">
    <main>
        <div class="container">
            <div class="columns">
                <div class="column is-6">
					<?php
						if (isset($_GET['error'])){
                            echo "<div class=\"notification is-info\">";
							if ($_GET['error'] == 2) echo $error[] = "Zaloguj się do swojego konta";
                            echo "</div>";
						}
						
						if (isset($_GET['log'])){
                            echo "<div class=\"notification is-success\">";
							if ($_GET['log'] == 1 ) echo $log[] = "Twoje konto zostało zarejestrowane. Teraz możesz się zalogować!";
                            echo "</div>";
						}
                        if(isset($notification))
                        {
                            foreach($notification as $row)
                            {
                                echo "<div class=\"notification is-danger\">";
                                echo $row;
                                echo "</div>";
                            }
                        }
					
					?>
                    <h2 class="title">Logowanie</h2>
                    <form action="login.php" method="post" class="primary-form">
                        <label for="nrIndex">Nr Indeksu: </label>
                        <input type="text" name="nrIndex" class="input is-large">
                        <label for="userPassword">Hasło: </label>
                        <input type="password" name="userPassword" class="input is-large">
                        <input type="submit" value="Zaloguj" name="login" class="primary-button">
                    </form>
                </div>
            </div>
        </div>
    </main>
</section>

<?php include 'includes/footer.html'; ?>

</body>
</html>