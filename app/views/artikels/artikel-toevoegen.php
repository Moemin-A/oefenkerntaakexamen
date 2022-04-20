<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Artikel Aanvraag</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<div class="wrapper">
    <div class="sidebar">
        <ul>
            <?php
            include("./docent-navbar.php");
            ?>
        </ul>
    </div>

    <div class="main_content">
    <div class="container">
    <div class="col-12" id="header-text" style="border-bottom-style:hidden; ">
    <h1 style="padding-bottom: 50px; padding-top: 50px;">
                <center> Artikel Aanvragen</center>
            </h1>
    </div>
    <center>
    <form method="post" action="/artikels/insertaanvraag">
    <div class="col-12 col-sm-4">
        <tr>
            <td>
                <label for="omschrijving">Omschrijving:</label>
                <select name="omschrijving" id="omschrijving">
                <option value="keuze">Kies een artikel</option>
                <option value="elektronica"></option>
                <option value="Studieboeken"></option>
                <option value="keuzedeelproducten"></option>
                <option value="schoolmaterialen"></option>
                </select><br><br>
            </td>
        </tr> 
        <tr>
            <td>
                <label for="categorie">Categorie:</label>
                <select name="categorie" id="acat">
                <option value="keuze">Kies een categorie</option>
                <option value="elektronica">Elektronica</option>
                <option value="Studieboeken">Studieboeken</option>
                <option value="keuzedeelproducten">Keuzedeel Producten</option>
                <option value="schoolmaterialen">Schoolmaterialen</option>
                </select><br><br>
            </td>
        </tr> 
        <tr>
            <td>
                <label for="Aantal">Hoeveelheid:</label>
                <input type="number" id="Aantal" name="Aantal" required><br><br>
            </td>
        </tr>
        <tr>
            <td>
                <label for="PersoonId">Persoon Num:</label>
                <input type="number" id="PersoonId" name="PersoonId" required><br><br>
          </td>
        </tr>
        </td>
            </tr>
        <input type="hidden" name="magazijnartikelid">
            <tr>
        <td>
        <input type="hidden" name="id">
        <tr>
            <td>
                <input type="submit" name="submit" value="Submit">
          </td>
        </tr>
    </form> </center>
    <div class="info">
    </div>
    </body>

</html>