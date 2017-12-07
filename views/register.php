<?php
// Include config file
require_once '../php/config.php';

// Define variables and initialize with empty values
$id_tipo_user = $nombre = $apellido = $n_usuario = $contrasena = $confirma_contrasena = $fecha_creacion = "";
$id_tipo_user_err = $nombre_err = $apellido_err = $n_usuario_err = $contrasena_err = $confirma_contrasena_err = $fecha_creacion_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["n_usuario"]))) {
        $n_usuario_err = "Ingresar un nombre de usuario";
    } else {
        // Prepare a select statement
        $sql = "SELECT id_usuario FROM usuario WHERE n_usuario = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["n_usuario"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $n_usuario_err = "Este nombre de usuario ya está en uso.";
                } else {
                    $n_usuario_err = trim($_POST["n_usuario"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if (empty(trim($_POST['contrasena']))) {
        $contrasena_err = "Por favor ingresar una contraseña.";
    } elseif (strlen(trim($_POST['contrasena'])) < 6) {
        $contrasena_err = "La contraseña debe de ser de más de 6 caracteres.";
    } else {
        $contrasena = trim($_POST['contrasena']);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirma_contrasena"]))) {
        $confirma_contrasena_err = 'Porfavor confirmar contraseña.';
    } else {
        $confirma_contrasena = trim($_POST['confirma_contrasena']);
        if ($contrasena != $confirma_contrasena) {
            $confirma_contrasena_err = 'Las contraseñas no son idénticas.';
        }
    }

    // Check input errors before inserting in database
    if (empty($id_tipo_user_err) && empty($nombre_err) && empty($apellido_err) && empty($n_usuario_err) && empty($contrasena_err) && empty($confirma_contrasena_err) && empty($fecha_creacion_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO usuario (id_tipo_user, nombre, apellido, n_usuario, contrasena, fecha_creacion) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_tipo_user, $param_nombre, $param_apellido, $param_username, $param_password, $param_fecha);

            // Set parameters
            $param_tipo_user = $id_tipo_user;
            $param_nombre = $nombre;
            $param_apellido = $apellido;
            $param_username = $n_usuario;
            $param_password = password_hash($contrasena, PASSWORD_DEFAULT); // Creates a password hash
            $param_fecha = $fecha_creacion;
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
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
    <head><link rel="icon" href="../img/proVenta.ico" type="image/x-icon">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro - ProVenta</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; }
            .wrapper{ width: 350px; padding: 20px; }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="form-group">
                <nav class="navbar navbar-inverse navbar-fixed-top" style="background: greenyellow">
                    <div class="container-fluid">
                        <img class="img-circle" style="float: left; height: 50px; margin: 2px 1%" src="../img/icono.png">
                        <div class="navbar-header">
                            <p class="navbar-brand" style="color: green">ProVenta</p>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="container" style="margin-top: 20px">
                <h2>Regístrate</h2>
                <p>Por favor complete este formulario para crear una cuenta.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-horizontal">
                        <div class="form-group <?php echo (!empty($id_tipo_user_err)) ? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Tipo de usuario:<sup>*</sup></label>
                            <div class="col-sm-2">
                                <select class="form-control" name="id_tipo_user" value="<?php echo $id_tipo_user; ?>">
                                    <option>Elegir</option>
                                    <option value="1">Superadmin</option>
                                    <option value="">Admin</option>
                                    <option>Usuario</option>
                                </select>
                                <span class="help-block"><?php echo $id_tipo_user_err; ?></span>
                            </div>
                        </div>
                        <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Nombre:<sup>*</sup></label>
                            <div class="col-sm-2">
                                <input type="text" name="nombre"class="form-control" value="<?php echo $nombre; ?>">
                                <span class="help-block"><?php echo $nombre_err; ?></span>
                            </div>
                        </div>
                        <div class="form-group <?php echo (!empty($apellido_err)) ? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Apellido:<sup>*</sup></label>
                            <div class="col-sm-2">
                                <input type="text" name="apellido"class="form-control" value="<?php echo $apellido; ?>">
                                <span class="help-block"><?php echo $apellido_err; ?></span>
                            </div>
                        </div>
                        <div class="form-group <?php echo (!empty($n_usuario_err)) ? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Nombre de usuario:<sup>*</sup></label>
                            <div class="col-sm-2">
                                <input type="text" name="n_usuario"class="form-control" value="<?php echo $n_usuario; ?>">
                                <span class="help-block"><?php echo $n_usuario_err; ?></span>
                            </div>
                        </div>
                        <div class="form-group <?php echo (!empty($contrasena_err)) ? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Contraseña:<sup>*</sup></label>
                            <div class="col-sm-2">
                                <input type="password" name="contrasena" class="form-control" value="<?php echo $contrasena; ?>">
                                <span class="help-block"><?php echo $contrasena_err; ?></span>
                            </div>
                        </div>
                        <div class="form-group <?php echo (!empty($confirma_contrasena_err)) ? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Confirmar contraseña:<sup>*</sup></label>
                            <div class="col-sm-2">
                                <input type="password" name="confirma_contrasena" class="form-control" value="<?php echo $confirma_contrasena; ?>">
                                <span class="help-block"><?php echo $confirma_contrasena_err; ?></span>
                            </div>
                        </div>
                        <div class="form-group <?php echo (!empty($fecha_creacion_err)) ? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Fecha de creación:<sup>*</sup></label>
                            <div class="col-sm-2">
                                <input type="date" name="fecha_creacion"class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                <span class="help-block"><?php echo $fecha_creacion_err; ?></span>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-success" value="Crear">
                            <input type="reset" class="btn btn-danger" value="Reset">
                        </div>
                        <p class="text-center">¿Ya tienes una cuenta? <a href="../index.php">Entra aquí</a>.</p> 
                    </div>
                </form>
            </div>
        </div>    
    </body>
</html>