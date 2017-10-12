<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head><link rel="icon" href="../img/proVenta.ico" type="image/x-icon">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>proVenta - Facturación</title>
        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/dashboard.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" style="background: greenyellow">
            <div class="container-fluid">
                <img class="img-circle" style="float: left; height: 50px; margin: 2px 1%" src="../img/icono.png">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <p style="color: green" class="navbar-brand">ProVenta</p>
                </div>
                <div id="navbar" class="navbar-collapse collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a style="color: green"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="col-sm-3 col-md-2 sidebar" style="background: greenyellow">
                        <ul class="nav nav-sidebar">
                            <li><a href="inicio.php" style="color: green"><span class="glyphicon glyphicon-list-alt"></span> Inventario</a></li>
                            <li class="active"><a href="" style="color: white"><span class="glyphicon glyphicon-usd"></span> Facturar</a></li>
                        </ul>
                    </div>
                </div>
                <div class="container">
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
                        <h2 class="text-center">Facturación</h2><hr>
                    </div>
                </div>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
