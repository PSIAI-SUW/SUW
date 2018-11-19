<?php require_once('config.php'); ?>
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
			
			
				<a href="<?php 	
				if( $user->is_logged_in() ){
			
					if ($_SESSION["type_account"] == "admin") 
					{
						echo "settings_admin.php";
					}
					else
					{
						echo "settings_user.php";
					}
				}
				?>" id="settingsButton"><i class="fa fa-cog fa-3x" title="Ustawienia"></i></a>
				

            <a href="logout.php" id="logoutButton" class="primary-button">Wyloguj</a>
            </div>
        </div>
    </div>
</header>

<section class="section is-medium">
    <main>
        <div class="container">
			<?php
				if (isset($_GET['error'])){
					if ($_GET['error'] == 1 ) echo $error[] = "Brak uprawnień administratora";			
				}
			?>
            <div class="columns">
                <div class="column is-6">
                    <h2 class="title">Kursy</h2>
                    <ul class="list-items">
                        <li class="items"><a href="">Kurs 1</a></li>
                        <li class="items"><a href="">Kurs 2</a></li>
                        <li class="items"><a href="">kurs 3</a></li>
                        <li class="items"><a href="">Kurs 4</a></li>
                        <li class="items"><a href="">Kurs 5</a></li>
                        <li class="items"><a href="">Kurs 6</a></li>
                    </ul>
                </div>
                <div class="column is-6">
                    <h2 class="title">Wykłady</h2>
                    <ul class="list-items">
                        <li class="items"><a href="download.php">Wykład 1</a></li>
                        <li class="items"><a href="download.php">Wykład 2</a></li>
                        <li class="items"><a href="download.php">Wykład 3</a></li>
                        <li class="items"><a href="download.php">Wykład 4</a></li>
                        <li class="items"><a href="download.php">Wykład 5</a></li>
                        <li class="items"><a href="download.php">Wykład 6</a></li>
                        <li class="items"><a href="download.php">Wykład 7</a></li>
                        <li class="items"><a href="download.php">Wykład 8</a></li>
                        <li class="items"><a href="download.php">Wykład 9</a></li>
                        <li class="items"><a href="download.php">Wykład 10</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</section>

<?php include 'includes/footer.html'; ?>

</body>
</html>