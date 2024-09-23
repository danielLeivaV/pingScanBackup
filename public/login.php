<?php
require '../config/conectar.php';
require '../modules/seguridad_autenticacion/controller.php';

// Crear una instancia de la clase Conectar y obtener la conexión
$conexion = new Conectar();
$conn = $conexion->getConexion();

// Crear una instancia del controlador de usuario
$controller = new UserController($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['usuario'];
    $password = $_POST['contrasena'];

    header('Content-Type: application/json'); // Indicar que la respuesta es JSON

    if ($controller->login($username, $password)) {
        echo json_encode(['success' => true, 'message' => 'Inicio de sesión exitoso', 'redirect' => '../modules/dashboard/DashboardView.php']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Nombre de usuario o contraseña incorrectos.']);
    }
    exit(); // Asegúrate de terminar el script después de la respuesta
}
?>
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ping scan</title>
    <link rel="stylesheet" href="./css/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./css/personalizado.css">
    
</head>
<body class="bg-dark">
<?php if (isset($error)): ?>
        <p><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
<img src="./media/imagenes/fondo-inicio-seccion.jpg" alt=""
    class="banner-inicio-seccion"
    />
<main class="container">
   
    <div class="row fila-inicio-seccion">
        <div class="card imagen-usuario">
            <img src="./media/imagenes/imagen-usuario.png" alt="usuario"/>
        </div>    
    </div>
    <div class="row fila-inicio-seccion">
    <div class="col-12 col-sm-12 ">
        <div class="card card-body">
            <form  action="login.php" method="POST">
            <div class="card-title text-center"><h2>INICIO DE SECCION</h2></div>
            <div class="card-body">
                <div class="row"> <!-- inicio del row para modificar la apariencia de los inputs -->
                    <div class="col-sm-12 col-md-6">   <!-- inicio de la columna responsiva 1 -->
                <label for="usuario">Usuario: </label>
                <input name="usuario" id="usuario"
                type="text" placeholder="Ingrese su usuario"
                style="width:70%" required
                />
</div><div class="col-sm-12 col-md-6"> <!-- inicio de la columna responsiva 2 y final de la 1 -->
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" 
                name="contrasena" placeholder="Ingrese su contraseña"
                style="width:70%" required
                />
                    </div><!-- final de la columna responsiva 2-->
                </div><!--Final del row para los inputs -->
            </div>
            <div class="card-footer text-center"><button class="btn btn-primary btn-inicio-seccion">Iniciar Seccion</button></div>
            </form>
        </div>
    </div>
    
    </div>
</main>
</body>
<script src="js/scripts.js"></script> <!-- Enlace a scripts.js -->
</html>
