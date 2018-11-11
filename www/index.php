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
                        <li class="items">Razem<br>26</li>
                    </ul>
                    <h3 class="subtitle"><i class="fa fa-download fa-fw"></i>Pobrania</h3>
                    <ul class="list-items">
                        <li class="items">Dzień<br>36</li>
                        <li class="items">Tydzień<br>36</li>
                        <li class="items">Miesiąc<br>36</li>
                        <li class="items">Semestr<br>36</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</section>

<?php include 'includes/footer.html'; ?>

</body>
</html>