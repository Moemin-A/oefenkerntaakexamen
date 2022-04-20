<?=$data['title']; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>


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

<div class="col text-right">
		</div>
	</div>
<br>
<form action="<?=URLROOT;?>/countries/update" method="post">
<div class="container">
<div class="row">
<br>
	<div class="col">
		<div class="form-group">
			<label>Docentafkorting</label>
			<input type="text" placeholder="" class="form-control" name="Docentafkorting" value="<?=$data["row"]->Docentafkorting; ?>">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Voornaam</label>
			<input type="text" placeholder="" class="form-control" name="Voornaam" value="<?=$data["row"]->Voornaam; ?>">
		</div>
	</div>
</div>
<div class="row">
<br>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Tussenvoegsel</label>
			<input type="text" placeholder="" class="form-control" name="Tussenvoegsel" value="<?=$data["row"]->Tussenvoegsel; ?>">
		</div>
	</div>
  <br>
  <div class="row">
	<div class="col">
		<div class="form-group">
			<label>Achternaam</label>
			<input type="text" placeholder="" class="form-control" name="Achternaam" value="<?=$data["row"]->Achternaam; ?>">
		</div>
	</div>

	<div class="row">
<br>
<div class="col">
	
<!-- <label>Klas</label>
		<div class="form-group">
		<select class="form-select" name="Klas" aria-label="Default select example">
</select>
		</div>
	</div> -->
		
  <br>
  <div class="row">
	<div class="col">
		<div class="form-group">
			<label>Email</label>
			<input type="text" placeholder="" class="form-control" name="Email" value="<?=$data["row"]->Email; ?>">
		</div>
	</div>
  <br>

  <div class="row">
	<div class="col">
		<div class="form-group">
			<label>Telefoonnummer</label>
			<input type="number" placeholder="" class="form-control" name="Telefoonnummer" value="<?=$data["row"]->Telefoonnummer; ?>">
		</div>
	</div>
  <br>
</div>
<td>
  <input type="hidden" name="Id" value="<?=$data["row"]->Id; ?>">        
  </td>  
<div class="row">
	<div class="col">
</div>
</div>
<br><br>
<input type="submit" value="verzenden">

