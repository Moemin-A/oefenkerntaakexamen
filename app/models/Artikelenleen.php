<?php 

class ArtikelenLeen{
    public $naam;

    public $logs = [];
    private $db;

   public function __construct()
   {
       $this->db = new Database();
   }

   //reads all information from the table and returns a string for a html selector
   public function getArtikelenLeen(){
            $this->db->query("SELECT * FROM artikelenleen WHERE Naam = :naam");
            $result = $this->db->resultSet();
            
            return $result;
   }
}


?>