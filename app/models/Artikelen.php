<?php
    class Artikelen {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getArtikels($categorie) {
            $this->db->query("SELECT * FROM artikel WHERE CategorieId = :id ORDER BY `Id` ASC");
            $this->db->bind(":id", $categorie);
            return  $this->db->resultSet();
            
        }
        public function getArtikels1() {
            $this->db->query("SELECT * FROM artikel WHERE id= 2 ORDER BY `Id` ASC");
            return  $this->db->resultSet();
        }
        public function getArtikels2() {
            $this->db->query("SELECT * FROM artikel WHERE id= 3 ORDER BY `Id` ASC");
            return  $this->db->resultSet();
        }
        public function getArtikels3() {
            $this->db->query("SELECT * FROM artikel WHERE id= 4 ORDER BY `Id` ASC");
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
            $this->db->bind(":tijdgeleend", $post["tijdgeleend"], PDO::PARAM_INT);
            $this->db->bind(":persoon", $post["persoon"], PDO::PARAM_INT);

            $this->db->execute();

            // Checks for success / errors and prints message accordingly
            echo '<script>alert("Updated successfully")</script>';
            header("Refresh:3; http://oefenkerntaakexamen.nl/artikels"); 
            } catch(PDOException $e) { 
                echo '<script>alert("Update Failed")</script>' . $e->getMessage(); 
                header("Refresh:3; http://oefenkerntaakexamen.nl/artikels"); 
            }
          
        }

        public function deleteArtikel($Id){
            try {
                $this->db->query("DELETE FROM artikel WHERE Id = :id");
                $this->db->bind(":id", $Id, PDO::PARAM_INT);
                $this->db->execute();

                // Checks for success / errors and prints message accordingly
                echo '<script>alert("Deleted artikel successfully")</script>';
                header("Refresh:1; http://oefenkerntaakexamen.nl/artikels"); 
            } catch(PDOException $e) { 
                echo '<script>alert("Delete Failed")</script>' . $e->getMessage(); 
                header("Refresh:3; http://oefenkerntaakexamen.nl/artikels"); 
            }
            
        }

        public function artikelInsert($post) {
            try {
            // prepare sql and bind parameters
            $this->db->query("INSERT INTO aanvraag(Id, MagazijnArtikelId , Aantal, PersoonId) 
                              VALUES (:id, :magazijnartikelid, :aantal, :persoonid");

            $this->db->bind(":id", NULL, PDO::PARAM_INT);
            $this->db->bind(":magazijnartikelid", NULL, PDO::PARAM_INT);
            $this->db->bind(":aantal", $post ["Aantal"], PDO::PARAM_INT);
            $this->db->bind(":persoonid",$post ["PersoonId"], PDO::PARAM_INT);

            $this->db->execute();

            // Checks for success / errors and prints message accordingly
                echo '<script>alert("New records created successfully")</script>';
                header("Refresh:3; http://oefenkerntaakexamen.nl/pages/aanvragen"); 
            }
            catch(PDOException $e) { 
                echo '<script>alert("Insert Failed")</script>' . $e->getMessage(); 
                header("Refresh:3; http://oefenkerntaakexamen.nl/pages/aanvragen"); 
            }
        }
    }