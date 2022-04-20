<?php 

class Klassen{
    public $voornaam;

    public $logs = [];
    private $db;

   public function __construct()
   {
       $this->db = new Database();
   }

   //reads all information from the table and returns a string for a html selector
   public function getMedewerker(){
            $this->db->query("SELECT * FROM klas");
            $result = $this->db->resultSet();
            
            return $result;
   }
}


?>