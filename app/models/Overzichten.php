<?php
class Overzichten
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }


    public function getMedewerker()
    {
        $this->db->query('SELECT * FROM baliemedewerkers ORDER BY voornaam');
        $this->db->execute();
        return $this->db->resultSet();
    }


    // function om medewrker te delete
    public function deleteMedewerker($studentNr)
    {
        $this->db->query("DELETE FROM baliemedewerkers WHERE studentNr = :studentNr");
        $this->db->bind("studentNr", $studentNr, PDO::PARAM_INT);
        return $this->db->execute();
    }



    // get single om enkel product te roepen
    public function getSingleMedewerker($studentNr)
    {
        $this->db->query("SELECT * FROM baliemedewerkers WHERE studentNr = :studentNr");
        $this->db->bind(':studentNr', $studentNr, PDO::PARAM_INT);
        return  $this->db->single();
    }



    // function om een medewerker up te daten
    public function updateMedewerker($post)
    {
        $this->db->query("UPDATE baliemedewerkers 
                        SET voornaam = :voornaam,
                        tussenvoegsel = :tussenvoegsel,
                        achternaam = :achternaam,
                        email = :email,
                        klas = :klas
                        WHERE studentNr = :studentNr");

        $this->db->bind(':studentNr', $post["studentNr"], PDO::PARAM_INT);
        $this->db->bind(':voornaam', $post["voornaam"]);
        $this->db->bind(':tussenvoegsel', $post["tussenvoegsel"]);
        $this->db->bind(':achternaam', $post["achternaam"]);
        $this->db->bind(':email', $post["email"]);
        $this->db->bind(':klas', $post["klas"]);

        return $this->db->execute();
    }



    // function om artikel te createn
    public function createMedewerker($post)
    {
        $this->db->query("INSERT INTO baliemedewerkers(studentNr, voornaam, tussenvoegsel, achternaam, email, klas)
                            VALUES (:studentNr, :voornaam, :tussenvoegsel, :achternaam, :email, :klas)");


        $this->db->bind(':studentNr', NULL, PDO::PARAM_INT);
        $this->db->bind(':voornaam', $post["voornaam"]);
        $this->db->bind(':tussenvoegsel', $post["tussenvoegsel"]);
        $this->db->bind(':achternaam', $post["achternaam"]);
        $this->db->bind(':email', $post["email"]);
        $this->db->bind(':klas', $post["klas"]);

        return $this->db->execute();
    }
}
