<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=" <?=  URLROOT . "public/css/style.css"?> ">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <?= $data["alert"]; ?>
    <div class="container">
        <div class="row">
            <h1 id="overzichtje">Overzicht van medewerkers</h1>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Studentnummer</th>
                            <th scope="col">Voornaam</th>
                            <th scope="col">Tussenvoegsel</th>
                            <th scope="col">Achternaam</th>
                            <th scope="col">email</th>
                            <th scope="col">klas</th>
                            <th scope="col">edit</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $data['data']; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<a id="linkje1" style="padding-left: 120px;" href="<?= URLROOT; ?>/overzicht/create"><button style="" class="btn btn-primary btn-lg active"> Create medewerker</button></a>
<a id="" style="padding-left: 120px;" href="<?= URLROOT; ?>/overzicht/scan"><button style="" class="btn btn-primary btn-lg active"> scan een artikel!</button></a>



</html>