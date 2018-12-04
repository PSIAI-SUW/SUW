<?php require_once 'config.php'; 

if( $user->is_logged_in() ){
	if ($_SESSION["type_account"] != "user") 
	{
		header('Location: settings_admin.php');
	}
}
else
{
	header('Location: login.php?error=2');
}?>

<!DOCTYPE html>
<html>
<head>

<title>System Udostępniania Wykładów</title>
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
            <a href="settings_user.php" id="settingsButton"><i class="fa fa-cog fa-3x" title="Ustawienia"></i></a>
            <a href="logout.php" id="logoutButton" class="primary-button">Wyloguj</a>
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
					if (isset($_GET['not'])){
                            echo "<div class=\"notification is-success\">";
							if ($_GET['not'] == 5 ) echo $not[] = "Hasło zostało zmienione!";
                            echo "</div>";
                        }
					if (isset($_GET['error']))
                    {
                        echo "<div class=\"notification is-danger\">";
                        if ($_GET['error'] == 5 ) echo $error[] = "Podajesz błędne hasło!";
						if ($_GET['error'] == 6 ) echo $error[] = "Podane hasła nie są jednakowe!";
						if ($_GET['error'] == 7 ) echo $error[] = "Nowe hasło nie rózni się od starego!";
						if ($_GET['error'] == 8 ) echo $error[] = "Wypełnij wszystkie pola!";
                        echo "</div>";
                    }
					?>
                    <h2 class="title">Panel użytkownika</h2>
                    
					<form action="forms/changepassword.php" method="post" class="primary-form">
                            <label for="changepassword">Podaj stare hasło</label>
                            <input type="password" name="oldpassword" placeholder="Wpisz obecne hasło" class="input is-large">
							<label for="changepassword">Podaj nowe hasło</label>
							<input type="password" name="newpassword" placeholder="Wpisz nowe hasło" class="input is-large">
							<label for="changepassword">Powtórz nowe hasło</label>
							<input type="password" name="newpassword2" placeholder="Wpisz nowe hasło" class="input is-large">
                            <input type="submit" value="Zmień" name="changeButton" class="primary-button">
                    </form>
					
                </div>
                <div class="column is-6">
                    
                </div>
            </div>
        </div>
    </main>
</section>

<?php include 'includes/footer.html'; ?>

</body>
</html>