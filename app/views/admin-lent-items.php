<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lent Items</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>




<body>

    <!-- navbar word aangeroepen -->
    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <?php
                include("../public/admin-navbar.php");
                ?>
            </ul>
        </div>


        <div class="main_content">
        <center>
            <div class="header" style="font-size:30px;">Welcome user!</div>
            <div class="info"></center>

                
                <div style="text-align:center; height:150px; pointer-events: none; cursor: default">
                    <iframe src="https://free.timeanddate.com/clock/i879pplp/n1310/fs24/tt0/tw0/tm1/ts1/tb4" frameborder="0" width="147" height="57"></iframe>

                <!-- twéé knoppen worden gemaakt waarmee je naar de IT-docent en TECH-docent paginas kan navigeren -->
                </div>
                <div class="main_content">
             
                <div class="wrapper" style="padding-top:50px;">
                    <li><a href="/artikels"><button class="name noselect">Geleende Artikels</button>
                    <div class="info"> 
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>