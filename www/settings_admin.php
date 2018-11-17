<?php require_once 'config.php' ?>
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
                                <th>Operacja</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                            $users = $db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_OBJ);
                            foreach ($users as $row) {
                                echo "<tr>";
                                echo "<td>".$row->login."</td>";
                                echo "<td>".$row->active."</td>";
                                echo "<td><form action=\"settings_admin.php\" method=\"post\"><div class=\"control\"><div class=\"select\"><select name=\"activeButton\"><option>Aktywuj</option>
                                <option>Dezaktywuj</option>
                                <option>Usuń</option></select></div></div></td>";
                                echo "<td><input type=\"submit\" value=\"Zatwierdź\" name=\"insertActive\" class=\"primary-button\"></form></td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
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