<?php

class Overzicht extends Controller
{



    // bouwt constructor
    public function __construct()
    {

        $this->overzichtModel = $this->model('Overzichten');
    }



    // deze functie zorgt voor dat je de pagina ziet
    public function index($message = "")
    {
        // message system voor wanneer je een CRUD actie uitvoert
        $alert = "";
        if (!empty($message)) {
            switch ($message) {
                case 'creating-succes':
                    $alert .= '<div class="alert alert-success" role="alert">
                Artikel succesvol toegevoegd!
              </div>';
                    break;
                case 'creating-failed':
                    $alert .= '<div class="alert alert-danger" role="alert">
                Artikel is niet toegevoegd!
              </div>';
                    break;
                case 'update-succes':
                    $alert .= '<div class="alert alert-success" role="alert">
                Artikel succesvol geupdate!
              </div>';
                    break;
                case 'update-failed':
                    $alert .= '<div class="alert alert-danger" role="alert">
                Artikel is niet geupdate!
              </div>';
                    break;
                case 'info-failed':
                    $alert .= '<div class="alert alert-danger" role="alert">
                    Info is niet geladen!
                  </div>';
                    break;
                case 'delete-succes':
                    $alert .= '<div class="alert alert-danger" role="alert">
                        Artikel succesvol verwijdert!
                      </div>';
                    break;
            }
        }


        $model = $this->overzichtModel->getMedewerker();
        $tablesRow = "";
        foreach ($model as $value) {
            $tablesRow .= " 
            <tr>
            <td>$value->studentNr</td>
            <td>$value->voornaam</td>
            <td>$value->tussenvoegsel</td>
            <td>$value->achternaam</td>
            <td>$value->email</td>
            <td>$value->klas</td>
            <td>
            <a href='" . URLROOT . "/overzicht/update/$value->studentNr'><i class='fa fa-pencil'></i></a>
            </td> 
            <td>
            <a href='" . URLROOT . "/overzicht/delete/$value->studentNr'><i class='fa fa-trash'></i></a>
            </td>
            </tr>
            ";
        }
        $data = [
            'title' => 'Home page',
            'data' => $tablesRow,
            "alert" => $alert
        ];


        // deze code laaad de view door this view en vervolgens de padnaam
        $this->view('overzicht/index', $data);
    }



    // delete function, this overzichtModel select de model die je wilt in dit geval deleteA.. ($id) geef je mee om hem te specifieceren wat je wilt verwijderen
    public function delete($studentNr)
    {
        //echo $id;exit();
        $this->overzichtModel->deleteMedewerker($studentNr);

        // message voor als het delete is gelukt
        $data = [
            'deleteStatus' => "Het record met id = $studentNr is verwijdert"
        ];
        // this view stuurt je terug met het juiste data,  de juist ingeladen functie word ingeladen via de header refresh
        $this->view("overzicht/delete", $data);
        header("Refresh:0; url=" . URLROOT . "/overzicht/index/delete-succes");
    }



    // function om up te daten
    public function update($studentNr = null)
    {
        // filter input array maakt de array schoon zodat er geen gekke chars kunnen onstaan en mensen nogsteeds naamsgewijs inkunnen voeren 't veld etc..
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!$this->validate(['voornaam', 'achternaam', 'email', 'klas'])) {

                // message voor als het niet lukt
                echo "het inserten van je artikel is niet gelukt";
                header("Refresh:2; url=" . URLROOT .  "/overzicht/index/creating-failed");
            } else {

                try {

                    filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $this->overzichtModel->updateMedewerker($_POST);
                    header("Location: " . URLROOT . "./overzicht/index/update-succes");
                } catch (PDOException $e) {

                    header("Location: " . URLROOT . "./overzicht/index/update-failed");
                }
            }
        } else {

            try {

                $row = $this->overzichtModel->getSingleMedewerker($studentNr);

                if (!empty($row)) {


                    $records = $this->fillSelector($row->klas);
                } else {

                    header("Location: " . URLROOT . "./overzicht/index");
                }
            } catch (PDOException $e) {

                echo $e->getMessage();
                header("Location: " . URLROOT . "./overzicht/index");
            }

            $data = [
                'title' => "<h1>Update artikeloverzicht</h1>",
                'row' => $row,
                'records' => $records

            ];

            $this->view("overzicht/update", $data);
        }
    }




    public function validate($values = [])
    {
        $validate = true;
        foreach ($values as $value) {
            if (empty($_POST[$value]))
                $validate = false;
            break;
        }
        return $validate;
    }

    // create function voor als gebruiker een create maakt en hem vervolgens invoerd, deze function controleert de invoervelden en of het veilig is
    public function create()
    {


        // checkt of er een post array komt, request method van toepassing
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // dit haalt via de $this de functie validate eruit, vervolgens in een array, checked hij of deze waardes leeg zijn
            if (!$this->validate(['voornaam',  'achternaam', 'email', 'klas'])) {

                // message voor als het niet lukt
                echo "het inserten van je artikel is niet gelukt";
                header("Refresh:2; url=" . URLROOT .  "/overzicht/index/creating-failed");
            } else {

                // try zorgt ervoor dat de waarde juist ingevoerd moeten worden, dit checkt die.
                try {
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    $this->overzichtModel->createMedewerker($_POST);


                    header("Location:" . URLROOT . "/overzicht/index/creating-succes");

                    // catch rolt hem door als er binnen de try een fout heeft plaatsgevonden. vervolgens refresht die de url
                } catch (PDOException $e) {
                    echo "het inserten van je artikel is niet gelukt";
                    header("Refresh:2; url=" . URLROOT .  "/overzicht/index/creating-failed");
                }
            }

            // deze else functie zorgt ervoor dat er met $data array een invoel kan worden gedaan, in dit geval een title die weergeven word op de create pagina
        } else {


            $records = $this->fillSelector();
            $data = [
                'Title' => "<h1>voeg een nieuw artikel toe</h1>",
                'records' => $records

            ];


            $this->view("overzicht/create", $data);
        }
    }

    public function fillSelector($info = '')
    {
        $records = "";
        foreach ($this->model("Klassen")->getMedewerker() as $record) {
            $selected = ($info == $record->klassen) ? "selected" : ""; //check if the category is the one we have selected
            $records .= "<option value = '" . $record->klassen . "'" . $selected . ">" . $record->klassen .  "</option>";
        }
        return $records;
    }

    // deze functie laad een nieuwe pagina, in dit geval "overzicht/scan.php" via $this-> view spreek je view function 
    // in je libraries/controller.php aan, hierin maak je een functie die de url laad en de juiste map weergeeft
    public function scan()
    {
        $data = '';
        $this->view("overzicht/scan", $data);
    }
}
