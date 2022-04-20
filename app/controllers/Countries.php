<?php

Class Countries extends Controller{

    public $logs;
    public $overzichtModel;

    public function __construct()
    {
        $this->overzichtModel = $this->model('Country');
    }
    public function index($message = ""){
        $alert = "";
        if(!empty($message)){
            switch($message){
                case "deleting-success":
                    $alert .= '<div class="alert alert-success" role="alert">
                    A simple success alert—check it out!
                  </div>';
                  break;
            }
            
        }

        try{
            // hier plaats ie de records in de behorende kolomen met records 
            $records = "";
            foreach($this->overzichtModel->getoverzichthandler(1) as $record){
                $records .= "<tr>
                <th scope='row'>" . $record->Id . "</th>
                <td> " . $record->Omschrijving . "</td>
                <td> " . $record->CatogorieId . "</td>
                <td> " . $record->AantalInLeen . "</td>
                <td> " . $record->AantalInBeschikking . "</td>
                <td><form method='POST' action='" . URLROOT . "/countries/update'>
                 <input type='hidden' name='Id' value='". $record->Id ."' />
                 <input type='submit' name='update' value='Wijzigen' /></form>
                 <a href='" . URLROOT . "/countries/update/" . $record->Id . "'>update</a>
                 </td>
                 <td><form method='POST' action='" . URLROOT . "/countries/delete'>
                 <input type='hidden' name='Id' value='". $record->Id ."' />
                 <input type='submit' name='delete' value='Verwijderen' /></form></td>";
            }
            // hier plaats ie de records in de behorende kolomen met records 
            $records1 = "";
             foreach($this->overzichtModel->getoverzichthandler(2) as $record){
                 $records1 .= "<tr>
                 <th scope='row'>" . $record->Id . "</th>
                 <td> " . $record->Omschrijving . "</td>
                 <td> " . $record->CatogorieId . "</td>
                 <td> " . $record->AantalInLeen . "</td>
                 <td> " . $record->AantalInBeschikking . "</td>

                 <td><form method='POST' action='" . URLROOT . "/countries/update'>
                 <input type='hidden' name='Id' value='". $record->Id ."' />
                 <input type='submit' name='edit' value='Wijzigen' /></form></td>

                 <td><form method='POST' action='" . URLROOT . "/countries/delete'>
                 <input type='hidden' name='Id' value='". $record->Id ."' />
                 <input type='submit' name='delete' value='Verwijderen' /></form></td>";
             }
             // hier plaats ie de records in de behorende kolomen met records 
             $records2 = "";
             foreach($this->overzichtModel->getoverzichthandler(3) as $record){
                 $records2 .= "<tr>
                 <th scope='row'>" . $record->Id . "</th>
                 <td> " . $record->Omschrijving . "</td>
                 <td> " . $record->CatogorieId . "</td>
                 <td> " . $record->AantalInLeen . "</td>
                 <td> " . $record->AantalInBeschikking . "</td>

                 <td><form method='POST' action='" . URLROOT . "/countries/update'>
                 <input type='hidden' name='Id' value='". $record->Id ."' />
                 <input type='submit' name='edit' value='Wijzigen' /></form></td>

                 <td><form method='POST' action='" . URLROOT . "/countries/delete'>
                 <input type='hidden' name='Id' value='". $record->Id ."' />
                 <input type='submit' name='delete' value='Verwijderen' /></form></td>";
             }
             // hier plaats ie de records in de behorende kolomen met records 
             $records3 = "";
             foreach($this->overzichtModel->getoverzichthandler(4) as $record){
                 $records3 .= "<tr>
                 <th scope='row'>" . $record->Id . "</th>
                 <td> " . $record->Omschrijving . "</td>
                 <td> " . $record->CatogorieId . "</td>
                 <td> " . $record->AantalInLeen . "</td>
                 <td> " . $record->AantalInBeschikking . "</td>

                 <td><form method='POST' action='" . URLROOT . "/countries/update'>
                 <input type='hidden' name='Id' value='".$record->Id."' />
                 <input type='submit' name='edit' value='Wijzigen' /></form></td>

                 <td><form method='POST' action='" . URLROOT . "/countries/delete'>
                 <input type='hidden' name='Id' value='".$record->Id."' />
                 <input type='submit' name='delete' value='Verwijderen' /></form></td>";
             }


        
             // hier Catch ie een bericht als de database niet word gegeven
        }catch(PDOException $e){
           array_push($this->logs, "Er word geen connectie gemaakt met de database" . $e->getMessage());
           $records = 'Database failed';
           $records1 = 'Database failed';
           $records2 = 'Database failed';
           $records3 = 'Database failed';
         }

        $data = [
            "records" => $records,
            "records1" => $records1,
            "records2" => $records2,
            "records3" => $records3,
            'alert' => $alert
        ];

        $this->view("countries/homecatalogus", $data);
        //header("Refresh:4; url=" . URLROOT . "/countries/homecatalogus");
    }
// functie voor delete verwijderen van een record
    public function delete() {
        $Id = $_POST["Id"];
        $this->overzichtModel->deleteCountry($Id);
        $data =[ 'DeleteStatus' => "<div class='alert alert-success text-center'  role='alert'>
        U heeft succes vol de record verwijderd. Hierbij heeft u het record met id = $Id is verwijderd
      </div>"
        ];
        $this->view("countries/delete", $data);
        header("Refresh:4; url=". URLROOT . "/countries/index");
    }
// functie voor het updaten van een record
    public function update($Id = NULL){
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //var_dump($_POST);exit();
        $this->overzichtModel->updateCountry($_POST);
        //echo $Id . "U heeft de records succesvol veranderd";exit();
        header("Location: ". URLROOT ."/countries/index");
      } else {
        //$Id = $_POST["Id"];
        $row = $this->overzichtModel->getSingleCountry($Id);
        //var_dump($row);exit();
        $data = [
            'row' => $row
        ];
      } 
      $this->view("countries/update", $data);
    }
// functie voor het maken van een record
    public function create(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $id = $this->overzichtModel->createCountry($_POST);
            header("Location: ". URLROOT ."/countries/index");
            //header("Location: " . URLROOT . "/countries/index");
        } else {
        $data = [
            'Title' => "voeg een nieuw omschrijving in"
        ];
        $this->view("countries/create", $data);
    }
    }

}


?>