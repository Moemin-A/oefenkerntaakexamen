<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Artikel Update</title>

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
            include("./admin-navbar.php");
            ?>
        </ul>
    </div>

    <div class="main_content">
    <div class="container">
    <h1 style="padding-bottom: 50px; padding-top: 50px;">
                <center> Artikel Updaten</center>
            </h1>
    </div>
    <center>
        <!-- Alle labels om artikelen te updaten versturen naar de updatecontroller -->
    <form action="/artikels/update/<?=$data["row"]->Id?>" method="post" >
        <table>
            <!-- Omschrijving -->
            <label for="oms">Omschrijving</label><br>
            <input type="text" id="omschrijving" name="omschrijving" value="<?=$data["row"]->Omschrijving?>" required><br><br>
            <!-- Categorie -->
            <label for="cat">Categorie</label><br>
            <select name="categorieid" id="categorieid" value="<?=$data["row"]->CategorieId?>"required>>
            <option value="1">Elektronica</option>
            <option value="2">Studieboeken</option>
            <option value="3">keuzedeelproducten</option>
            <option value="4">Schoolmaterialen</option>
            </select><br><br>
            <!-- Tijd Geleend -->
            <label for="tgl">Tijd Geleend</label><br>
            <input type="text" id="tijdgeleend" name="tijdgeleend" value="<?=$data["row"]->TijdGeleend?>"required><br><br>
            <!-- Persoon -->
            <label for="prs">PersoonNummer</label><br>
            <input type="number" id="persoon" name="persoon" value="<?=$data["row"]->Persoon?>"required><br><br>
            <input type="hidden" name="id" value="<?=$data["row"]->Id?>">
            <input type="submit" name="submit" value="Submit">
        </table>
    </form> </center>
    </div>

</div>
</body>

</html>