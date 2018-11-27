<?php require_once('config.php');

	if( $user->is_logged_in() )
	{
        if ($_SESSION["active"] != "aktywny")
        {
            if ($_SESSION["type_account"] != "user")
            {
                header('Location: main.php');
            }
        }
	}
	else
	{
		header('Location: index.php');
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
                    if (isset($_GET['error']))
                    {
                        echo "<div class=\"notification is-danger\">";
                        if ($_GET['error'] == 1 ) echo $error[] = "Brak uprawnień administratora";
                        echo "</div>";
                    }
                    ?>
            <div class="columns">

                <div class="column is-6">
                    <h2 class="title">Kursy</h2>
                    <ul class="list-items">
                        <?php
                        $sql = "SELECT * FROM kurs ORDER BY ID_Kurs";
                        $result = $course->getCourseName($sql);
                        foreach($result as $row)
                        {
                            echo "<li><a href=\"\" class=\"items\">ID: ".$row->ID_Kurs." ".$row->nazwa."</a></li>";
                        }
                        ?>
                    </ul>


			</div>
                <div class="column is-6">
                    <h2 class="title">Wykłady</h2>
                    <ul class="list-items">
                        <?php
                        $sql = "SELECT * FROM Plik ORDER BY ID_Plik";
                        $result = $file->getFileName($sql);
                        foreach($result as $row)
                        {
														echo "<form action='main_user.php' method='post'>";
														echo "<input type='hidden' name='nazwa' value=".$row->nazwa." />";
                            echo "<input type='submit' value=".$row->nazwa." name='download' class=\"items\">";
														echo "</form>";
                        }
                        ?>
		                    <?php
		                    if(isset($_POST['download']))
		                    {
													$date = date('Y-m-d H:i:s');

													$sql_user = "SELECT `ID_USER` FROM `users` WHERE `login`='".$_SESSION['login']."'";
													$id_user = $file->insertDeleteFile($sql_user);

													$sql_plik = "SELECT `ID_Plik` FROM `Plik` WHERE `nazwa`='".$_POST['nazwa']."'";
													$id_plik = $file->insertDeleteFile($sql_plik);

													$sql_kurs = "SELECT `nr_kurs` FROM `Dodanie_Pliku` WHERE `nr_plik`='".$id_plik."'";
													$id_kurs = $file->insertDeleteFile($sql_kurs);

													$sql = "INSERT INTO Pobranie_Pliku (ID_Pobieranie_Pliku, data_dodania, nr_kurs, nr_plik, nr_user) VALUES (NULL, '".$date."' , '".$id_kurs."', '".$id_plik."', '".$id_user."')";
													$result = $file->insertDeleteFile($sql);

													require_once('config.php');
		                      $file->downloadFile($_POST['nazwa'], $_SESSION['login']);
		                    }
		                    ?>
                    </ul>

				</div>
            </div>
        </div>
    </main>
</section>

<?php include 'includes/footer.html'; ?>

</body>
</html>
