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
   public function getArtikelenLeen($artikelNaam){
            $this->db->query("SELECT * FROM artikelengeleend WHERE artikelNaam = :artikelNaam ");
            $this->db->bind(":artikelNaam", $artikelNaam );
            $result = $this->db->single();
            $this->db->execute();
            
            return $result;
   }
}


?>