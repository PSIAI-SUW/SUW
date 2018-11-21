<?php require_once('config.php');

if( $user->is_logged_in() ){
    if ($_SESSION["type_account"] != "admin")
    {
        header('Location: main_user.php');
    }
}
else
{
    header('Location: index.php');
}

if(isset($_POST['insertCourse']))
{
    $insert = $_POST['nameCourse'];
    if(strlen($insert) < 4)
    {
        $error[] = "Nazwa kursu jest za krótka - (minimum 4 znaki)";
    }
    elseif(strlen($insert) > 100)
    {
        $error[] = "Nazwa kursu jest za długa - (max 100 znaków)";
    }
    else
    {
        $sql = "INSERT INTO kurs (nazwa) VALUES ('$insert')";
        $result = $courses->insertDeleteCourse($sql);
        $success[] = "Pomyślnie dodano kurs o nazwie: ".$insert;
    }
}
if(isset($_POST['deleteCourse']))
{
    $delete = $_POST['idCourse'];
    $sql = "DELETE FROM kurs WHERE ID_Kurs = '$delete'";
    $sql2 = "SELECT * FROM kurs WHERE ID_Kurs = '$delete'";
    if($sql2) {
        $result = $courses->insertDeleteCourse($sql);
        $success[] = "Pomyślnie usunięto kurs o ID: ".$delete;
    }
    else
    {
        $error[] = "Podany ID kursu nie istnieje: ".$delete;
    }
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
                if ($_GET['error'] == 1 ) $error[] = "Brak uprawnień administratora";
            }
            if(isset($error))
            {
                foreach($error as $row)
                {
                    echo "<div class=\"notification is-danger\">".$row."</div>";
                }
            }
            if(isset($success))
            {
                foreach($success as $row)
                {
                    echo "<div class=\"notification is-success\">".$row."</div>";
                }
            }
            ?>
            <div class="columns">
                
                <div class="column is-6">
                    <h2 class="title">Kursy</h2>
                    <ul class="list-items">
                    <?php
                    $sql = "SELECT * FROM kurs ORDER BY ID_Kurs";
                    $result = $courses->getCourseName($sql);
                    foreach($result as $row)
                    {
                        echo "<li><a href=\"\" title=\"ID: ".$row->ID_Kurs."\" class=\"items\">".$row->nazwa."</a></li>";
                    }
                    ?>
                    </ul>

                    <form action="main.php" method="post" class="primary-form">
                        <label for="nameCourse">Utwórz kurs</label>
                        <input type="text" name="nameCourse" placeholder="Podaj nazwę [4-100]" class="input is-large">
                        <input type="submit" name="insertCourse" value="Utwórz" class="primary-button">
                    </form>

                    <form action="main.php" method="post" class="primary-form">
                        <label for="idCourse">Usuń kurs</label>
                        <input type="text" name="idCourse" placeholder="Podaj nr ID" class="input is-large">
                        <input type="submit" name="deleteCourse" value="Usuń" class="primary-button">
                    </form>
				
                </div>
                <div class="column is-6">
                    <h2 class="title">Wykłady</h2>
                    <ul class="list-items">
                        <li><a href="download.php" class="items">Wykład 1</a></li>
                        <li><a href="download.php" class="items">Wykład 2</a></li>
                        <li><a href="download.php" class="items">Wykład 3</a></li>
                        <li><a href="download.php" class="items">Wykład 4</a></li>
                        <li><a href="download.php" class="items">Wykład 5</a></li>
                        <li><a href="download.php" class="items">Wykład 6</a></li>
                        <li><a href="download.php" class="items">Wykład 7</a></li>
                        <li><a href="download.php" class="items">Wykład 8</a></li>
                        <li><a href="download.php" class="items">Wykład 9</a></li>
                        <li><a href="download.php" class="items">Wykład 10</a></li>
                    </ul>
                
					<div> 
					<form enctype="multipart/form-data" action="sendwyklad.php" method="POST"> 
					Dodaj wyklad:<br/>
					<input type="hidden" name="MAX_FILE_SIZE" value="500000" /> 
					<input name="plik" type="file" /> 
					<input type="submit" value="Wyślij wyklad" /> 
					</form> 
					</div>
					<div>
					<form method="post" action="delete.php">
					Usuń wykład:<br/>
					<input type="text" name="filename1"> - Nazwa pliku(wraz z rozszerzeniem)<br>
					<input type="submit" value="OK!">
					</form>
					</div>
				</div>
            </div>
        </div>
    </main>
</section>

<?php include 'includes/footer.html'; ?>

</body>
</html>