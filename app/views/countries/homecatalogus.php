<?php
include("homesidenavbar.php");

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--links  -->
    <title>Overzicht database</title>
    
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    
  </head>
  <body>
    <?=$data["alert"]?>


</div>
  <!-- Navbar van de pagina -->
  <div class="wrapper">
        <div class="sidebar">
            <center><h2>control panel</h2></center>
            <ul>
            <li><a href=""><i class="fas fa-home"></i>Home overzicht</a></li>
                <li><a href=""><i class="fas fa-list"></i></a></li>
                <li><a href=""><i class="fas fa-list"></i></a></li>
                <li><a href=""><i class="fas fa-list"></i></a></li>
                <li><a href=""><i class="fas fa-list"></i></a></li>
                
            </ul>
        </div>
    </div>


<!--Hoofd tekst van de pagina -->   
    <div class="container">
  <div class="row">
    <div class="col">
    <div class="col-12" id="header-text" style="border-top-style: solid;">
    <div class="col-12" id="header-text" style="border-bottom-style: solid;  border-top-style: solid; ">
    <h1 style="padding-bottom: 50px; padding-top: 50px;">
                <center> MBO Utrecht magazijn ICT</center>
            </h1>

            <div class = "row">
<div class = "col-12">
 <a href="http://oefenkerntaakexamen1/countries/create" type= "button" class="btn btn-danger btn-lg btn-block"> Nieuwe record toevoegen</a>
</div>
<!--Hoofd tekst van de elektronica pagina -->             
    </div>
    <div class="container">
    <div class="row">
    <div class="col">
    <div class="col-12" id="header-text" style="">
    <h1 style="padding-bottom: 20px; padding-top: 100px;">
    <center>Elektronica </center>
            </h1>
    </div>

<!--Tabel van elektronica  -->
    <center> <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">omschrijving</th>
      <th scope="col">categorie</th>
      <th scope="col">aantal in beschikking</th>
      <th scope="col">aantal uitgeleend</th>
      <th scope="col">Wijzigen</th>
      <th scope="col">verwijderen</th>
    </tr>
  </thead>
  <tbody>
      <?php
      echo $data['records'];
      ?>
  </tbody>
</table> </center>

<!-- hoofdtekst van Studieboeken tabel-->
</div>
    <div class="container">
  <div class="row">
    <div class="col">
    <div class="col-12" id="header-text" style="">
    <h1 style="padding-bottom: 20px; padding-top: 100px;">
    <center>Studieboeken </center>
            </h1>
    </div>

    <!--Tabel van studieboeken -->
    <center> <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">omschrijving</th>
      <th scope="col">categorie</th>
      <th scope="col">aantal in beschikking</th>
      <th scope="col">aantal uitgeleend</th>
    </tr>
  </thead>
  <tbody>
  <?php
      echo $data['records1'];
      ?>
  </tbody>
</table> </center>

<!-- hoofdtekst van keuzedeel  -->
</div>
    <div class="container">
  <div class="row">
    <div class="col">
    <div class="col-12" id="header-text" style="">
    <h1 style="padding-bottom: 20px; padding-top: 100px;">
    <center>Keuzedeel artikelen</center>
            </h1>
    </div>

  <!--Tabel van keuzedeel tabel -->
    <center> <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">omschrijving</th>
      <th scope="col">categorie</th>
      <th scope="col">aantal in beschikking</th>
      <th scope="col">aantal uitgeleend</th>
    </tr>
  </thead>
  <tbody>
  <?php
      echo $data['records2'];
      ?>
  </tbody>
</table> </center>

<!-- hoofdtext van school Materialen-->
</div>
    <div class="container">
  <div class="row">
    <div class="col">
    <div class="col-12" id="header-text" style="">
    <h1 style="padding-bottom: 20px; padding-top: 100px;">
    <center>School materialen</center>
            </h1>
    </div>

    <!--Tabel van school materialen -->
    <center> <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">omschrijving</th>
      <th scope="col">categorie</th>
      <th scope="col">aantal in beschikking</th>
      <th scope="col">aantal uitgeleend</th>
    </tr>
  </thead>
  <tbody>
  <?php
      echo $data['records3'];
      ?>
  </tbody>
</table> </center>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>