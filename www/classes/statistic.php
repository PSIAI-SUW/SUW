<?php
class Statistic 
{
    
    private $_db;
    private $name;

    function __construct($db)
    {
    	$this->_db = $db;
    }
    
    public function getStatCount($sql)
    {
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_NUM);
        return $result;
    }
}
   
?>