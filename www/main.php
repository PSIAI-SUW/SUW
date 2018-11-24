<?php require_once('config.php');

if( $user->is_logged_in() ){
    if ($_SESSION["type_account"] != "admin")
    {
        header('Location: main_deactivate.php');
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
            if (isset($_GET['errors']))
            {
                echo "<div class=\"notification is-danger\">";
                if ($_GET['errors'] == 11 ) echo $errors[] = "Podaj ID kursu!";
                if ($_GET['errors'] == 12 ) echo $errors[] = "Podane ID nie jstnieje!";
                echo "</div>";
            }

            if (isset($_GET['not']))
            {
                echo "<div class=\"notification is-success\">";
                if ($_GET['not'] == 11 ) echo $not[] = "Pomyślnie usunięto kurs";
                echo "</div>";
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

if(isset($_POST['deleteCourse']))
{
    $delete = $_POST['idCourse'];
    $sql = "DELETE FROM kurs WHERE ID_Kurs = '$delete'";
    $sql2 = "SELECT * FROM kurs WHERE ID_Kurs = '$delete'";
    if($sql2) {
        $result = $course->insertDeleteCourse($sql);
        $success[] = "Pomyślnie usunięto kurs o ID: ".$delete;
    }
    else
    {
        $error[] = "Podany ID kursu nie istnieje: ".$delete;
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
                            echo "<li><a href=\"\" class=\"items\">ID: ".$row->ID_Kurs." ".$row->nazwa."</a></li>";
                        }
                        ?>
                    </ul>

                    <form action="main.php" method="post" class="primary-form">
                        <label for="nameCourse">Utwórz kurs</label>
                        <input type="text" name="nameCourse" placeholder="Podaj nazwę [4-100]" class="input is-large">
                        <input type="submit" name="insertCourse" value="Utwórz" class="primary-button">
                    </form>

                    <form action="forms/deletecourse.php" method="post" class="primary-form">
                        <label for="idCourse">Usuń kurs</label>
                        <input type="text" name="idCourse" placeholder="Podaj nr ID" class="input is-large">
                        <input type="submit" name="deleteCourse" value="Usuń" class="primary-button">
                    </form>

                </div>
                <div class="column is-6">
                    <h2 class="title">Wykłady</h2>
                    <ul class="list-items">
                      <?php
                        $sql = "SELECT * FROM Plik ORDER BY ID_Plik";
                        $result = $file->getFileName($sql);
                        foreach($result as $row)
                        {
                            echo "<li><a href=\"\" class=\"items\">".$row->nazwa."</a></li>";
                        }
                        ?>
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