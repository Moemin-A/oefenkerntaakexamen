<?php
class Artikelen
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //  Selects all artikels in artikel depending on categorie number
    public function getArtikels($categorie)
    {
        $this->db->query("SELECT * FROM artikel WHERE CategorieId = :id ORDER BY `Omschrijving` ASC");
        $this->db->bind(":id", $categorie);
        return  $this->db->resultSet();
    }

    // Fetches artikel id and returns to updatecontroller
    public function getSingleArtikel($Id)
    {
        $this->db->query("SELECT * FROM artikel WHERE Id = :id");
        $this->db->bind(':id', $Id, PDO::PARAM_INT);
        return $this->db->single();
    }

    // After artikel id is fetched update artikel 
    public function updateArtikel($post)
    {
        try {
            $this->db->query("UPDATE artikel
                SET 
                    Omschrijving = :omschrijving,
                    CategorieId = :categorieid,
                    TijdGeleend = :tijdgeleend,
                    Persoon = :persoon
                    
                WHERE Id = :id");

            $this->db->bind(":id", $post["id"], PDO::PARAM_INT);
            $this->db->bind(":omschrijving", $post["omschrijving"]);
            $this->db->bind(":categorieid", $post["categorieid"], PDO::PARAM_INT);
            $this->db->bind(":tijdgeleend", $post["tijdgeleend"]);
            $this->db->bind(":persoon", $post["persoon"], PDO::PARAM_INT);

            $this->db->execute();

            // Checks for success / errors and prints message accordingly

            header("Refresh:1; url = " . URLROOT . "artikels/updating-success"); 
        } catch (PDOException $e) {
            header("Refresh:1; url = " . URLROOT . "artikels/updating-failed");
        }
    }

    // Gets id from record in controller and deletes chosen artikel
    public function deleteArtikel($Id)
    {
        try {
            $this->db->query("DELETE FROM artikel WHERE Id = :id");
            $this->db->bind(":id", $Id, PDO::PARAM_INT);
            $this->db->execute();

            // Checks for success / errors and prints message accordingly
            header("Refresh:1; url = " . URLROOT . "artikels/deleting-success");
        } catch (PDOException $e) {
            header("Refresh:1; url = " . URLROOT . "artikels/deleting-failed");
        }
    }

    // Fetches post request from controller submit and inserts artikel
    public function artikelInsert($post)
    {
        try {
            // prepare sql and bind parameters
            // var_dump($post); echo "Hallo";exit();

            $this->db->query("INSERT INTO artikel  (Id, Omschrijving, TijdGeleend, Persoon, CategorieId) 
                              VALUES (:id, :omschrijving, :tijdgeleend, :persoon, :categorieid)");

            $this->db->bind(":id", NULL);
            $this->db->bind(":omschrijving", $post["omschrijving"]);
            $this->db->bind(":tijdgeleend", ($post["tijdgeleend"]));
            $this->db->bind(":persoon", ($post["persoon"]));
            $this->db->bind(":categorieid", ($post["categorieid"]));


            $this->db->execute(); //exit();

            // Checks for success / errors and prints message accordingly
            header("Refresh:1; url = " . URLROOT . "artikels/creating-success");
        } catch (PDOException $e) {
            header("Refresh:1; url = " . URLROOT . "artikels/creating-failed");
        }
    }
}
