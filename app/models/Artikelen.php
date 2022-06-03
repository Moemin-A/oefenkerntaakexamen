<?php
    class Artikelen {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getArtikels($categorie) {
            $this->db->query("SELECT * FROM artikel WHERE CategorieId = :id ORDER BY `Omschrijving` ASC");
            $this->db->bind(":id", $categorie);
            return  $this->db->resultSet();
            
        }
        public function getArtikels1() {
            $this->db->query("SELECT * FROM artikel WHERE id= 2 ORDER BY `Omschrijving` ASC");
            return  $this->db->resultSet();
        }
        public function getArtikels2() {
            $this->db->query("SELECT * FROM artikel WHERE id= 3 ORDER BY `Omschrijving` ASC");
            return  $this->db->resultSet();
        }
        public function getArtikels3() {
            $this->db->query("SELECT * FROM artikel WHERE id= 4 ORDER BY `Omschrijving` ASC");
            return  $this->db->resultSet();
        }
        
        public function getSingleArtikel($Id){
            $this->db->query("SELECT * FROM artikel WHERE Id = :id");
            $this->db->bind(':id', $Id, PDO::PARAM_INT);
            return $this->db->single();
            
        }
        public function updateArtikel($post){
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
            header("Refresh:2; url = " . URLROOT . "artikels/updating-success"); 
            } catch(PDOException $e) { 
            header("Refresh:2; url = " . URLROOT . "artikels/creating-success"); 
            }
          
        }

        public function deleteArtikel($Id){
            try {
                $this->db->query("DELETE FROM artikel WHERE Id = :id");
                $this->db->bind(":id", $Id, PDO::PARAM_INT);
                $this->db->execute();

                // Checks for success / errors and prints message accordingly
                header("Refresh:2; url = " . URLROOT . "artikels/deleting-success"); 
            } catch(PDOException $e) { 
                header("Refresh:2; url = " . URLROOT . "artikels/creating-failed");  
            }
            
        }

        public function artikelInsert($post) {
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
            

            $this->db->execute();//exit();

            // Checks for success / errors and prints message accordingly
                header("Refresh:2; url = " . URLROOT . "artikels/creating-success"); 
            }
            catch(PDOException $e) { 
                header("Refresh:2; url = " . URLROOT . "artikels/creating-failed"); 
            }
        }
    }