</html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Scan artikelen</title>
</head>


<br>
<?php

if (!empty($data['records']))
    echo '<div class="row">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                            <th scope="col">artikelNaam</th>
                            <th scope="col">code</th>
                            <th scope="col">datum</th>
                        </tr>
                    </thead>
                    <tbody>
                        ' .
        $data['records']
        . '
                    </tbody>
                </table>
            </div>
        </div>';

?>


<body>


    <div style='text-align: center;'>
        <!-- insert your custom barcode setting your data in the GET parameter "data" -->
        <img alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=www.youtube.com%2Fwatch%3Fv%3DdQw4w9WgXcQ&code=Code128' />
    </div>
    <!-- de card -->
    <div style="padding-left: 500px; margin-top: 50px;">
        <div class="card" style="width: 18rem; ">
            <img class="card-img-top" src="../public/img/computer1.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Computer</h5>
                <p class="card-text">info over computer</p>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    SCAN
                </button>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Computer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div style='text-align: center;'>
                                    <!-- insert your custom barcode setting your data in the GET parameter "data" -->
                                    <img alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=computer&code=Code128&translate-esc=on' />
                                </div>
                                <!-- dit scant een land -->
                                <form action="<?= URLROOT; ?>/ScanArtikelen/scanArtikelLeen" method="post">
                                    <label for="land">Scan Artikel</label><br>
                                    <input type="text" id="land" name="artikelNaam" onmouseover="this.focus()" autofocus><br>
                                    <input type="submit" value="submit">
                                </form>

                                <!-- save submit -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>











    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>