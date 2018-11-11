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