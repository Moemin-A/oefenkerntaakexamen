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
    <form action="/artikels/update/<?=$data["row"]->Id?>" method="post" >
        <table>
            <label for="aib">Aantal in Beschikking</label><br>
            <input type="number" id="aantalinbeschikking" name="aantalinbeschikking" value="<?=$data["row"]->AantalInBeschikking?>" required><br><br>
            <label for="au">Aantal Uitgeleend</label><br>
            <input type="number" id="aantaluitgeleend" name="aantaluitgeleend" value="<?=$data["row"]->AantalInLeen?>"required><br><br>
            <input type="hidden" name="id" value="<?=$data["row"]->Id?>">
            <input type="submit" name="submit" value="Submit">
        </table>
    </form> </center>
    </div>

</div>
</body>

</html>