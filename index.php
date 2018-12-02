<?php 
	require_once('config.php');
	include 'stats.php'; 
	
	if( $user->is_logged_in() ){
		header('Location: main.php');
	}
?>
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
            <a href="register.php" id="registerButton" class="primary-button">Zarejestruj</a>
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
                    <h2 class="title">Opis systemu</h2>
                    <p>SUW - System Udostępniania Wykładów</p>
                    <p>System służy do udostępniania wykładów Studentom. Wszystkie pliki są zabezpieczone przed kopiowaniem i drukowaniem.</p>
                </div>
                <div class="column is-6">
                    <h2 class="title">Statystyki</h2>
                    <h3 class="subtitle"><i class="fa fa-users fa-fw"></i>Liczba użytkowników</h3>
                    <ul class="list-items">
                        <li class="items">Razem<br><?php echo $users[0] ?></li>
                    </ul>
                    <h3 class="subtitle"><i class="fa fa-download fa-fw"></i>Pobrania</h3>
                    <ul class="list-items">
                        <li class="items">Dzień<br>
                            <?php echo $download_today[0]; ?>
                        </li>
                        <li class="items">Tydzień<br><?php echo $download_week[0]; ?></li>
                        <li class="items">Miesiąc<br><?php echo $download_month[0]; ?></li>
                        <li class="items">Semestr<br><?php echo $download_semestr[0]; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</section>

<?php include 'includes/footer.html'; ?>

</body>
</html>