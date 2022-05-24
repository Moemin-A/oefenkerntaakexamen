<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tech-Beheer</title>

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
  <div class="row">
    <div class="col">
    <div class="col-12" id="header-text" style="border-bottom-style: solid; ">
    <h1 style="padding-bottom: 50px; padding-top: 50px;">
                <center> MBO Utrecht magazijn </center>
            </h1>
    </div>
    <div class="container">
  <div class="row">
    <div class="col">
    <div class="col-12" id="header-text" style="">
    <h1 style="padding-bottom: 20px; padding-top: 100px;">
    <center>Elektronica </center>
            </h1>
    </div>

      <center> <table class="table table-striped">
        <!-- Alle records aanroepen bij de labels -->
  <thead>
    <tr>
      <th scope="col">Omschrijving</th>
      <th scope="col">Tijd Geleend</th>
      <th scope="col">Persoon</th>
      <th> </th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
  <?php echo $data['records1']; ?>
  </tbody>
</table> </center>

<!-- Studieboeken tabel-->
</div>
    <div class="container">
  <div class="row">
    <div class="col">
    <div class="col-12" id="header-text" style="">
    <h1 style="padding-bottom: 20px; padding-top: 100px;">
    <center>Studieboeken </center>
            </h1>
    </div>

    <center> <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Omschrijving</th>
      <th scope="col">Tijd Geleend</th>
      <th scope="col">Persoon</th>
      <th> </th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
  <?php echo $data['records2']; ?>
  </tbody>
</table> </center>

<!-- Keuzedeel producten -->
</div>
    <div class="container">
  <div class="row">
    <div class="col">
    <div class="col-12" id="header-text" style="">
    <h1 style="padding-bottom: 20px; padding-top: 100px;">
    <center>Keuzedeel artikelen</center>
            </h1>
    </div>

    <center> <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">omschrijving</th>
      <th scope="col">Tijd Geleend</th>
      <th scope="col">Persoon</th>
      <th> </th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
  <?php echo $data['records3']; ?>
  </tbody>
</table> </center>

<!-- school Materialen-->
</div>
    <div class="container">
  <div class="row">
    <div class="col">
    <div class="col-12" id="header-text" style="">
    <h1 style="padding-bottom: 20px; padding-top: 100px;">
    <center>School materialen</center>
            </h1>
    </div>

    <center> <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Omschrijving</th>
      <th scope="col">Tijd Geleend</th>
      <th scope="col">Persoon</th>  
      <th> </th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
  <?php echo $data['records4']; ?>
  </tbody>
</table> </center>
    <div class="info">
</div>
<form method="get" action="/artikels/insertAanvraag">
    <button type="submit">Artikel Toevoegen</button>
</form>
</div>
   
    </body>

</html>