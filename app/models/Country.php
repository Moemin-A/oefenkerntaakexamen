<?php
  class Country {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getCountries() {
      $this->db->query("SELECT * FROM `docent`;");

      $result = $this->db->resultSet();

      return $result;
    }

    public function getSingleCountry($Id){
      $this->db->query("SELECT * FROM docent WHERE Id = :Id");
      $this->db->bind(':Id', $Id, PDO::PARAM_INT);
     return($this->db->single()); 

    }

    public function updateCountry($post){
      //var_dump($post);exit();
      $this->db->query("UPDATE docent
                        SET Docentafkorting = :Docentafkorting, 
                            Voornaam = :Voornaam,
                            Tussenvoegsel= :Tussenvoegsel, 
                            Achternaam= :Achternaam,
                            Email= :Email,
                            Telefoonnummer = :Telefoonnummer
                              WHERE Id = :Id"); 
          
        $this->db->bind(':Id', $post["Id"], PDO::PARAM_INT);
        $this->db->bind(':Docentafkorting', $post["Docentafkorting"], PDO::PARAM_STR);
        $this->db->bind(':Voornaam', $post["Voornaam"], PDO::PARAM_STR);
        $this->db->bind(':Tussenvoegsel', $post["Tussenvoegsel"], PDO::PARAM_STR);
        $this->db->bind(':Achternaam', $post["Achternaam"], PDO::PARAM_STR);
        $this->db->bind(':Email', $post["Email"], PDO::PARAM_STR);
        $this->db->bind(':Telefoonnummer', $post["Telefoonnummer"], PDO::PARAM_INT);
      
       return $this->db->execute();
    }
    

    public function deleteCountry($Id){

      $this->db->query("DELETE FROM docent WHERE Id = :Id ");
      $this->db->bind("Id", $Id , PDO::PARAM_INT);
      return $this->db->execute();
    }

    public function createCountry($post){
      //var_dump($post);exit();
      $this->db->query("INSERT INTO `docent` (`Id`, `Docentafkorting`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Email`, `Telefoonnummer`)
                         VALUES (:Id, :Docentafkorting, :Voornaam, :Tussenvoegsel, :Achternaam, :Email, :Telefoonnummer)");
     
       $this->db->bind(':Id', NULL, PDO::PARAM_INT);
       $this->db->bind(':Docentafkorting', $post["Docentafkorting"], PDO::PARAM_STR);
       $this->db->bind(':Voornaam', $post["Voornaam"], PDO::PARAM_STR);
       $this->db->bind(':Tussenvoegsel', $post["Tussenvoegsel"], PDO::PARAM_STR);
       $this->db->bind(':Achternaam', $post["Achternaam"], PDO::PARAM_STR);
       $this->db->bind(':Email', $post["Email"], PDO::PARAM_STR);
       $this->db->bind(':Telefoonnummer', $post["Telefoonnummer"], PDO::PARAM_INT);
      $this->db->execute();
   }

   public function getOmschrijving(){
     $this->db->query('SELECT Klas from klas');
     $this->db->execute();
     return $this->db->resultSet();
   }
  }

?>