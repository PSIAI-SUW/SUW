<?php
require_once('config.php');

	if( $user->is_logged_in() )
	{
		if ($_SESSION["active"] == "aktywny") 
		{
			header('Location: main_user.php');
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
				$error[] = "Konto jest nieaktywne";
				
				if(isset($error))
				{
					foreach($error as $row)
					{
						echo "<div class=\"notification is-danger\">".$row."</div>";
					}
				}
			?>
              
        </div>
    </main>
</section>

<?php include 'includes/footer.html'; ?>

</body>
</html>