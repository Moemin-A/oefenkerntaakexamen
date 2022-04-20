<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Dit is mijn eigen style.css-->
  <link rel="stylesheet" href="./css/style.css">
  <style>

  </style>
  <title>Aanwezigen</title>
</head>

<body>
  <main class="container">
    <div class="row">

    </div>
    <div class="row">
      <div class="col-12">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Aanpassingen maken.</h1>
            <p class="lead">Deze page maakt u aanpassingen aan de records.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-5">
        <form action="<?= URLROOT; ?>/countries/update" method="post">
            <div class="form-group">
              <label for="Omschrijving" class="text-black" style="font-size:1vw">omschrijving</label>
              <input type="text" name="Omschrijving" id="Omschrijving" value="<?= $data["row"]->Omschrijving; ?>">
            </div>

            <div class="form-group">
              <label for="CatogorieId" class="text-black" style="font-size:1vw" >Catogorie</label>
              <input type="text" name="CatogorieId" id="CatogorieId" value="<?= $data["row"]->CatogorieId; ?>">
            </div>

            <div class="form-group">
              <label for="AantalInLeen" class="text-black" style="font-size:1vw" >Aantal in leen</label>
              <input type="text" name="AantalInLeen" id="AantalInLeen" value="<?= $data["row"]->AantalInLeen; ?>">
            </div>

            <div class="form-group">
              <label for="AantalInBeschikking" class="text-black" style="font-size:1vw" >Aantal in beschikking</label>
              <input type="text" name="AantalInBeschikking" id="AantalInBeschikking" value="<?= $data["row"]->AantalInBeschikking; ?>">
            </div>

            <div class="form-group">
              <label for="Id" class="text-black" style="font-size:1vw" >Id</label>
              <input type="hidden" name="Id" id="Id" value="<?= $data["row"]->Id; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Versturen</button>
          </form>
        </div>
      </div>
      <div class="col-7">

      </div>
      <div class="col-12">
        <h1 class="display-4 text-white"></h1>
      </div>
    </div>
    </div>




  </main>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>