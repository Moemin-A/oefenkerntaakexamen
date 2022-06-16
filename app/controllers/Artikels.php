<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

use \PDOException;


class Artikels extends Controller
 {

    public function __contstruct()
    {
      $this->artikelModel = $this->model('Artikelen');
    }
  
    public function index($message = "") 
    {

    // Als message leeg is switch case maken met goed / fout meldingen
    if (!empty($message)) {
            switch ($message) {
                case 'reading-failed':
                    echo '<div class="alert alert-danger mt-5 w-50 mx-auto text-center" role="alert">
                    Kan de schema niet lezen, probeer het later opnieuw.
                    </div>';
                    header("Refresh: 3; /pages/index");
                    break;
                case 'creating-success':
                    echo '<div class="alert alert-success mt-5 w-50 mx-auto text-center" role="alert">
                    Succesvol toegevoegd.
                    </div>';
                    header("Refresh: 3; /artikels");
                    break;
                case 'creating-failed':
                    echo '<div class="alert alert-danger mt-5 w-50 mx-auto text-center" role="alert">
                    Er is iets fout gegaan bij het toevoegen.
                    </div>';
                    header("Refresh: 5; /artikels");
                    break;
                case 'updating-success':
                    echo '<div class="alert alert-success mt-5 w-50 mx-auto text-center" role="alert">
                    Succesvol vernieuwd.
                    </div>';
                    header("Refresh: 3; /artikels");
                    break;
                case 'updating-failed':
                    echo '<div class="alert alert-danger mt-5 w-50 mx-auto text-center" role="alert">
                    Er is iets fout gegaan bij het vernieuwen.
                    </div>';
                    header("Refresh: 5; /artikels");
                    break;
                case 'deleting-success':
                    echo '<div class="alert alert-success mt-5 w-50 mx-auto text-center" role="alert">
                    Succesvol verwijderd.
                    </div>';
                    header("Refresh: 3; /artikels");
                    break;
                case 'deleting-failed':
                    echo '<div class="alert alert-danger mt-5 w-50 mx-auto text-center" role="alert">
                    Er is iets fout gegaan bij het verwijderen.
                    </div>';
                    header("Refresh: 5; /artikels");
                    break;
            }
        }
       
    // Artikels tonen in de juiste categoriën en naar de geleend view sturen 
    $artikels = $this->model('Artikelen');

        try {
            $records1 = "";
            foreach ($artikels->getArtikels(1) as $record) {
                $records1 .= "<tr>
                <th scope='row'>" . $record->Omschrijving . " </th>
                <td> " . $record->TijdGeleend . "</td>
                <td> " . $record->Persoon . "</td>
                <td>
                <a href='" . URLROOT . "artikels/update/$record->Id'
                data-toggle='tooltip'  data-placement='bottom'
                title='Update'>
                <img  src='/img/icons/edit.png' alt='cross'>
                 </a>
                </td>
                <td>
                <a href='" . URLROOT . "artikels/delete/$record->Id'
                data-toggle='tooltip'  data-placement='bottom'
                title='Delete'>
                  <img  src='/img/icons/drop.png' alt='cross'>
                 </a>
                </td></tr>";   
            }

            $records2 = "";
            foreach ($artikels->getArtikels(2) as $record) {
                $records2 .= "<tr>
                <th scope='row'>" . $record->Omschrijving . " </th>
                <td> " . $record->TijdGeleend . "</td>
                <td> " . $record->Persoon . "</td>
                <td>   <a href='" . URLROOT . "artikels/update/$record->Id'
                data-toggle='tooltip'  data-placement='bottom'
                title='Update'>
                <img  src='/img/icons/edit.png' alt='cross'>
                 </a> </td>
                 <td>
                 <a href='" . URLROOT . "artikels/delete/$record->Id'
                 data-toggle='tooltip'  data-placement='bottom'
                 title='Delete'>
                   <img  src='/img/icons/drop.png' alt='cross'>
                  </a>
                 </td></tr>";    
            }

            $records3 = "";
            foreach ($artikels->getArtikels(3) as $record) {
                $records3 .= "<tr>
                <th scope='row'>" . $record->Omschrijving . " </th>
                <td> " . $record->TijdGeleend . "</td>
                <td> " . $record->Persoon . "</td>
                <td>   <a href='" . URLROOT . "artikels/update/$record->Id'>
                <img  src='/img/icons/edit.png' alt='cross'
                data-toggle='tooltip'  data-placement='bottom'
                title='Update'>
                 </a> </td>
                 <td>
                 <a href='" . URLROOT . "artikels/delete/$record->Id'
                 data-toggle='tooltip'  data-placement='bottom'
                 title='Delete'>
                   <img  src='/img/icons/drop.png' alt='cross'>
                  </a>
                 </td></tr>";      
            }

            $records4 = "";
            foreach ($artikels->getArtikels(4) as $record) {
                $records4 .= "<tr>
                <th scope='row'>" . $record->Omschrijving . " </th>
                <td> " . $record->TijdGeleend . "</td>
                <td> " . $record->Persoon . "</td>
                <td>   <a href='" . URLROOT . "artikels/update/$record->Id'>
                <img  src='/img/icons/edit.png' alt='cross'
                data-toggle='tooltip'  data-placement='bottom'
                title='Update'>
                 </a> </td>
                 <td>
                 <a href='" . URLROOT . "artikels/delete/$record->Id'
                 data-toggle='tooltip'  data-placement='bottom'
                 title='Delete'>
                   <img  src='/img/icons/drop.png' alt='cross'>
                  </a>
                 </td></tr>";       
            }

        } catch (PDOException $e) { 
            header("Refresh:3; url = " . URLROOT . "artikels/reading-failed");
        }
        // Data bewaren in een array en naar magazijn view sturen
        $data = [
            "records1" => $records1,
            "records2" => $records2,
            "records3" => $records3,    
            "records4" => $records4
        ];

        // var_dump($data);

        $this->view('artikels/geleend', $data);
    }
    // Artikels updaten en naar de update view sturen
    public function update($Id = null)
    {
        // Als $_SERVER in POST zit voer update script uit,
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $artikels = $this->model('Artikelen');
            $artikels->updateArtikel($_POST);
            
        } else {
            $artikels = $this->model('Artikelen');
            $row = $artikels->getSingleArtikel($Id);

            // Artikel informatie meegeven en naar update.php sturen
            $data = [
                'row' => $row
            ];
          
          $this->view('artikels/update', $data);
          
        }

    }
    //  DeleteController die de Id meeneemt en naar deleteArtikel() modell stuurd
    public function delete($Id)
    {
        $artikels = $this->model('Artikelen');
        $artikels->deleteArtikel($Id);

    }
    // InsertController die als je niet in POST zit naar de artikel toevoegen view stuurd
    // Als dit wel zo is word je doorgestuurd naar de insertAanvraag() model
    public function insertAanvraag() 
    {
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // var_dump($_POST);exit();
            $artikels = $this->model('Artikelen');
            $artikels->artikelInsert($_POST);
            
        } else {
    
            $this->view('artikels/artikel-toevoegen');
        }
        
    }

    public function sayMyName($name)
    {
        return "Hallo mijn naam is : " . $name;
    }
    
}