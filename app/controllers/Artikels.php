<?php
class Artikels extends Controller {

    public function __contstruct(){
      $this->artikelModel = $this->model('Artikelen');
    }
    // Artikels tonen in de juiste categoriën en naar de geleend view sturen 
    public function index() {
        
       $artikels = $this->model('Artikelen');

        try{
            $records1 = "";
            foreach($artikels->getArtikels(1) as $record){
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
            foreach($artikels->getArtikels(2) as $record){
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
            foreach($artikels->getArtikels(3) as $record){
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
            foreach($artikels->getArtikels(4) as $record){
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

        }catch(PDOException $e){ 
            array_push($this->logs, "Failed database connection" . $e->getMessage());
            $records = "Database Failed";
        }
        // Data bewaren in een array en naar magazijn view sturen
        $data = [
            "records1" => $records1,
            "records2" => $records2,
            "records3" => $records3,    
            "records4" => $records4
        ];

        // var_dump($data);

        $this->view('/artikels/geleend', $data);
    }
    // Artikels updaten en naar de update view sturen
    public function update($Id = null){
        // Als $_SERVER in POST zit voer update script uit,
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $artikels = $this->model('Artikelen');
            $artikels->updateArtikel($_POST);
            
        }else{
            $artikels = $this->model('Artikelen');
            $row = $artikels->getSingleArtikel($Id);

            // Artikel informatie meegeven en naar update.php sturen
            $data = [
                'row' => $row
            ];
          
          $this->view('/artikels/update', $data);
        }

    }
    //  DeleteController die de Id meeneemt en naar deleteArtikel() modell stuurd
    public function delete($Id){
        $artikels = $this->model('Artikelen');
        $artikels->deleteArtikel($Id);

    }
    // InsertController die als je niet in POST zit naar de artikel toevoegen view stuurd
    // Als dit wel zo is word je doorgestuurd naar de insertAanvraag() model
    public function insertAanvraag() {
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // var_dump($_POST);exit();
            $artikels = $this->model('Artikelen');
            $artikels->artikelInsert($_POST);
            
        }else{
    
            $this->view('/artikels/artikel-toevoegen');
        }
        
    }
    
}