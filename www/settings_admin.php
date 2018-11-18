<?php require_once 'config.php'; ?>
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
            <a href="settings_admin.php" id="settingsButton"><i class="fa fa-cog fa-3x" title="Ustawienia"></i></a>
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
                    <h2 class="title">Panel administratora</h2>
                    <table class="table is-hoverable is-striped">
                        <thead>
                           <tr>
                                <th>Login</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <?php
                            $users = $db->query("SELECT * FROM users WHERE type_account = 'user'")->fetchAll(PDO::FETCH_OBJ);
                            foreach ($users as $row)
                            {
                                echo "<tr>";
                                echo "<td>".$row->login."</td>";
                                echo "<td>".$row->active."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                    <form action="forms/activate.php" method="post" class="primary-form">
                            <label for="activate">Aktywacja konta</label>
                            <input type="text" name="activate" placeholder="Wpisz login" class="input is-large">
                            <input type="submit" value="Aktywuj" name="activateButton" class="primary-button">
                    </form>
                    <form action="forms/deactivate.php" method="post" class="primary-form">
                            <label for="deactivate">Dezaktywacja konta</label>
                            <input type="text" name="deactivate" placeholder="Wpisz login" class="input is-large">
                            <input type="submit" value="Dezaktywuj" name="deactivateButton" class="primary-button">
                    </form>
                    <form action="forms/delete.php" method="post" class="primary-form">
                            <label for="delete">Usunięcie konta</label>
                            <input type="text" name="delete" placeholder="Wpisz login" class="input is-large">
                            <input type="submit" value="Usuń" name="deleteButton" class="primary-button">
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