<!DOCTYPE html>
<html>
    <head><link rel="icon" href="img/proVenta.ico" type="image/x-icon">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>proVenta - Login</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/dashboard.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <div class="form-group">
                <nav class="navbar navbar-inverse navbar-fixed-top" style="background: greenyellow">
                    <div class="container-fluid">
                        <img class="img-circle" style="float: left; height: 50px; margin: 2px 1%" src="img/icono.png">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <p class="navbar-brand" style="color: green">ProVenta</p>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="container form-horizontal">
                <div class="form-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Iniciar Sesión</div>
                        <div class="panel-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Usuario:</label>
                                    <div class="col-sm-2">
                                        <input id="user" name="user" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Contraseña:</label>
                                    <div class="col-sm-2">
                                        <input id="pass" name="pass" type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="text-center form-group bottom-right">
                                    <button id="btn-login" class="btn btn-default btn-success" type="button"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                    <div id="img" class="text-center col-lg-4">
                        <img src="img/log2.gif">
                    </div>
                </div>
            </div>
        </div>
        <?php
        // put your code here
        ?>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="../../assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> 
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript">
                $('#btn-login').on('click', function () {
                    if (($('#user').val().trim() === 'admin') && ($('#pass').val().trim() === 'admin*1')) {
                        window.location.replace("views/inicio.php");
                    } else {
                        alert("Usuario o contraseña inválida");
                    }
                });
        </script>
    </body>
</html>
