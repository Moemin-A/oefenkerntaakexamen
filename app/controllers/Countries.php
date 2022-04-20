<?php
class Countries extends Controller {

  public function __construct() {
    $this->countryModel = $this->model('Country');
  }

  public function index() {
    /**
     * Haal via de method getFruits() uit de model Fruit de records op
     * uit de database
     */
    $countries = $this->countryModel->getCountries();

    /**
     * Maak de inhoud voor de tbody in de view
     */
    $rows = '';
    foreach ($countries as $value){
      $rows .= "<tr>
                  <td>$value->Id </td>
                  <td>" . htmlentities($value->Docentafkorting, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->Voornaam, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->Tussenvoegsel, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->Achternaam, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->Email, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->Telefoonnummer, ENT_QUOTES, 'ISO-8859-1') . "</td>


                  <td><a href='" . URLROOT . "/countries/update/$value->Id'>update</a></td>
                  <td><a href='" . URLROOT . "/countries/delete/$value->Id'>delete</a></td>
                  

                </tr>";
    }


    $data = [
      'title' => '<h1></h1>',
      'countries' => $rows
    ];
    $this->view('countries/index', $data);

  }

  public function update($Id = NULL){
    // var_dump($_SERVER);exit();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

     $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
     $this->countryModel->updateCountry($_POST);
     echo "Het updaten van de artikel is gelukt";
     header("Refresh:2;  url=" . URLROOT .  "/countries/index");
    } else{
      $row = $this->countryModel->getSingleCountry($Id);
      $Klas = $this->countryModel->getOmschrijving();
      $tablesRow = "";
      foreach($Klas as $value){
        $tablesRow .= "
        <option value='$value->Klas'>$value->Klas</option>
        ";
      }
      $data = [
       'title' => '<h1>Update Docenten overzicht </h1>',
       
       'row' => $row,
       'KlasData' => $tablesRow
     ];
     
     $this->view("countries/update", $data);
     
    }
  }
    // var_dump($id); exit();
  
public function delete($Id){
  // echo $id; exit();
  $this->countryModel->deleteCountry($Id);
  $data = [
      'deleteStatus'=> "Het record met Id = $Id is verwijderd"
  ];
  $this->view("countries/delete", $data);

  header("Refresh:2; url=" . URLROOT . "/countries/index");
}
public function create(){
  if($_SERVER["REQUEST_METHOD"] == "POST") {
  //var_dump($_POST);
  try{
        $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
         $this->countryModel->createCountry($_POST);
        echo "Het toevoegen van de artikel is gelukt";
        header("Refresh:2;  url=" . URLROOT .  "/countries/index");

      } catch(PDOException $e){
        echo "Het inserten van het record is niet geluk"; 
        var_dump($e);
        header("Refresh:50 url=" . URLROOT . "/countries/index");
      }
  }else{
    $Klas = $this->countryModel->getOmschrijving();
    $tablesRow = "";
    foreach($Klas as $value){
      $tablesRow .= "
      <option value='$value->Klas'>$value->Klas</option>
      ";
    }
  $data = [
      'KlasData' => $tablesRow];
 

  
  $this->view("countries/create", $data);

}
}

}
?>