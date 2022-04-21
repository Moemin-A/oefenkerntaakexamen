<?php

Class ScanArtikelen extends controller{

    
    public function __construct() {
        $this->overzichtModel = $this->model("Artikelenleen");
    }

    public function index(){
        $this->view('overzicht/scan');
    }

    public function scanArtikelLeen() {
      // var_dump($_POST);


        try{
            $records = "";
            $artikelLeen = $_POST["artikelNaam"];
                $this->overzichtModel->naam = $_POST["artikelNaam"];
                $record = $this->overzichtModel->getArtikelenLeen($artikelLeen);
               // var_dump($record);

                if(!empty($record)){
                    
                    $records .= "<tr>
                    <th scope='row'>" . $record->id . "</th>
                    <td> " . $record->artikelNaam . "</td>
                    <td> " . $record->code . "</td>
                    <td> " . $record->datum . "</td>";
                 

                } else{
                    echo "record empty";
                }
        }catch(PDOException $e){
            echo $e->getMessage();
            $records = 'Database failed';
        }
        $data = [
            "records" => $records
        ];
        $this->view("overzicht/scan", $data);

    }
}
