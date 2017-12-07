<?php
// Include config file
require_once 'php/config.php';

// Define variables and initialize with empty values
$username = "";
$password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = 'Por favor, ingresa tu usuario.';
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST['password']))) {
        $password_err = 'Por favor, ingresa tu contraseña';
    } else {
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT n_usuario, contrasena FROM proventa.usuario WHERE n_usuario = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            /* Password is correct, so start a new session and
                              save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;
                            header("location: views/inicio.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = 'La contraseña ingresada no es válida.';
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = 'No se encontró una cuenta con ese nombre de usuario.';
                }
            } else {
                echo "Oops! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head><link rel="icon" href="img/proVenta.ico" type="image/x-icon">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - ProVenta</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="form-group">
                <nav class="navbar navbar-inverse navbar-fixed-top" style="background: greenyellow">
                    <div class="container-fluid">
                        <img class="img-circle" style="float: left; height: 50px; margin: 2px 1%" src="img/icono.png">
                        <div class="navbar-header">
                            <p class="navbar-brand" style="color: green">ProVenta</p>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="container" style="margin-top: 30px">
                <h2>Inicio de sesión</h2>
                <p>Por favor, ingrese sus credenciales para iniciar sesión.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-horizontal">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label class="col-sm-2">Usuario:<sup style="color:red" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>><?php echo '*'; ?></sup></label>
                            <div class="col-sm-2">
                                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                            </div>
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>    
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label class="col-sm-2">Contraseña:<sup style="color:red" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>><?php echo '*'; ?></sup></label>
                            <div class="col-sm-2">
                                <input type="password" name="password" class="form-control">
                            </div>
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-success" value="Iniciar sesión">
                        </div>
                        <p class="text-center">¿Aún no tienes una cuenta? <a href="views/register.php">Regístrate ahora</a>.</p> 
                    </div>
                </form>
            </div>
        </div>    
    </body>
</html>