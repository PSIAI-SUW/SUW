<?php

class Course
{

    private $_db;    
    public $name;

    function __construct($db)
    {
    	$this->_db = $db;
    }

	public function getCourseName($name)
    {
        $stmt = $this->_db->prepare($name);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
	}

	public function insertCourseName($name)
    {
        $stmt = $this->_db->prepare($name);
        $result = $stmt->execute();
        return $result;
    }

}

?>
