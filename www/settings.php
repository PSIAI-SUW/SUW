<?php
  if( $user->is_logged_in() ){
    if ($_SESSION["type_account"] == "admin"){
      echo "settings_admin.php";
    }
    else{
      echo "settings_user.php";
    }
  }
?>
