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
                $this->overzichtModel->naam = $_POST["naam"];
                $record = $this->overzichtModel->getArtikelenLeen();

                if(!empty($record)){
                    
                $records .= "<tr>
                
                <td> " . $record->Naam . "</td>";

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

?>