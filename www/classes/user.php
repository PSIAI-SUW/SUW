<?php

class User{

    private $_db;

    function __construct($db){
    	$this->_db = $db;
    }

	private function get_user_hash($login){

			$stmt = $this->_db->prepare("SELECT password,login,ID_USER FROM users WHERE login=:nrIndex");
			$stmt->execute(array('nrIndex' => $login));

			return $stmt->fetch();
	}

	public function login($login,$password){

		$row = $this->get_user_hash($login);
		$password2 = $row['password']; 
		$password = md5($password);

		if(strcmp($password, $password2) == 0){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['login'] = $row['login'];
		    $_SESSION['ID_USER'] = $row['ID_USER'];
		    return true;
		}
	}

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
