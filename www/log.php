<?php require_once('config.php'); 

	if( $user->is_logged_in() ){
		if ($_SESSION["type_account"] != "admin") 
	{
		header('Location: main.php');
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
                
                <table class="table is-hoverable is-striped">
                        <thead>
                           <tr>
                                <th>Plik</th>
                                <th>Logn</th>
								<th>Data</th>
								<th>Adres IP</th>
                            </tr>
                        </thead>
                        <?php
                            $users = $db->query("SELECT * FROM users WHERE type_account = 'user'")->fetchAll(PDO::FETCH_OBJ);
							
                            foreach ($users as $row)
                            {
                                echo "<tr>";
								echo "<td> </td>";
                                echo "<td>".$row->login."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
				
                
            </div>
        </div>
    </main>
</section>

<?php include 'includes/footer.html'; ?>

</body>
</html>