<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>home</title>

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
                include(APPROOT . "/views/includes/sidenavbar.php");
                ?>
            </ul>
        </div>
        <div class="main_content">
            <div class="header">categorieën beheren</div>
            <div class="info">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Naam categorie</label>
                                <input type="text" name="omschrijving" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Toevoegen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>