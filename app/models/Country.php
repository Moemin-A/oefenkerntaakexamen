<?php


Class Country {

    public $db;

    public function __construct(){
        $this->db = new Database();
    }

// hier read hij de tabel en zet hij hem in de goeie tabel overzicht
    public function getoverzichthandler($category){
        $this->db->query('SELECT * FROM itemtabel WHERE CatogorieId = :id ORDER BY `Id` ASC');
        $this->db->bind(":id", $category);
        return $this->db->resultSet();
    }
// hier read hij de tabel en zet hij hem in de goeie tabel overzicht
    public function getoverzichthandler1(){
         $this->db->query('SELECT * FROM itemtabel WHERE CatogorieId = 2 ORDER BY `Id` ASC');
         return $this->db->resultSet();
     }
// hier read hij de tabel en zet hij hem in de goeie tabel overzicht
    public function getoverzichthandler2(){
         $this->db->query('SELECT * FROM itemtabel WHERE CatogorieId = 3 ORDER BY `Id` ASC');
         return $this->db->resultSet();
     }
// hier read hij de tabel en zet hij hem in de goeie tabel overzicht
     public function getoverzichthandler3(){
         $this->db->query('SELECT * FROM itemtabel WHERE CatogorieId = 4 ORDER BY `Id` ASC');
         return $this->db->resultSet();
     }
// hier verwijdert hij de kolom.
    public function deleteCountry($Id){
        $this->db->query('DELETE FROM itemtabel WHERE Id = :Id');
        $this->db->bind(":Id", $Id);
        return $this->db->execute();
    }
// hier update hij de kolom
    Public function getSingleCountry($Id){
        //echo $Id; exit();
        $this->db->query('SELECT * FROM itemtabel WHERE Id = :Id');
        $this->db->bind(":Id", $Id, PDO::PARAM_INT);
        return $this->db->result();
    }
// functie voor het maken van een update
    public function updateCountry($post){
    $this->db->query("UPDATE `itemtabel` 
                          SET Omschrijving = :Omschrijving, 
                              CatogorieId = :CatogorieId, 
                              AantalInLeen = :AantalInLeen,
                              AantalInBeschikking = :AantalInBeschikking    
                               WHERE `Id` = :Id;");
    $this->db->bind(':Id', $post["Id"]);
    $this->db->bind(':Omschrijving', $post["Omschrijving"]);
    $this->db->bind(':CatogorieId', $post["CatogorieId"]);
    $this->db->bind(':AantalInLeen', $post["AantalInLeen"]);
    $this->db->bind(':AantalInBeschikking', $post["AantalInBeschikking"]);
    return $this->db->execute();
    }
//  functie voor het maken een create
    public function createCountry($post){
        $this->db->query("INSERT INTO itemtabel(Id,Omschrijving,CatogorieId,AantalInLeen,AantalInBeschikking) VALUES(:Id, :Omschrijving, :CatogorieId, :AantalInLeen, :AantalInBeschikking)");
        $this->db->bind(':Id', NULL, PDO::PARAM_INT);
        $this->db->bind(':Omschrijving', $post["Omschrijving"]);
        $this->db->bind(':CatogorieId', $post["CatogorieId"], PDO::PARAM_INT);
        $this->db->bind(':AantalInLeen', $post["AantalInLeen"], PDO::PARAM_INT);
        $this->db->bind(':AantalInBeschikking', $post["AantalInBeschikking"], PDO::PARAM_INT);
        $this->db->execute();
        return $this->db->lastInsertedId();
    }

}



?>