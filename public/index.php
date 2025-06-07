<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\LoginController;
use Controllers\RegistroController;
use Controllers\AplicacionesController;
use Controllers\PermisosController;
$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);


//RUTAS LOGIN
$router->get('/login', [LoginController::class,'renderizarPagina']);

//RUTAS PARA USUARIOS
$router->get('/usuarios', [RegistroController::class,'renderizarPagina']);
$router->post('/usuarios/guardar', [RegistroController::class,'guardarAPI']);
$router->get('/usuarios/buscar', [RegistroController::class,'buscarUsuarios']);
$router->post('/usuarios/modificar', [RegistroController::class,'modificarUsuario']);
$router->post('/usuarios/eliminar', [RegistroController::class,'eliminarUsuario']);


//RUTAS PARA APLICACIONES
$router->get('/aplicaciones', [AplicacionesController::class,'renderizarPagina']);
$router->post('/aplicaciones/guardar', [AplicacionesController::class,'guardarAPI']);
$router->get('/aplicaciones/buscar', [AplicacionesController::class,'buscarAplicaciones']);
$router->post('/aplicaciones/modificar', [AplicacionesController::class,'modificarAplicacion']);
$router->post('/aplicaciones/eliminar', [AplicacionesController::class,'eliminarAplicacion']);

//RUTAS PARA PERMISOS
$router->get('/permisos', [PermisosController::class,'renderizarPagina']);
$router->post('/permisos/guardar', [PermisosController::class,'guardarAPI']);
$router->get('/permisos/buscar', [PermisosController::class,'buscarPermisos']);
$router->get('/permisos/aplicaciones', [PermisosController::class,'buscarAplicaciones']);
$router->post('/permisos/modificar', [PermisosController::class,'modificarPermiso']);
$router->post('/permisos/eliminar', [PermisosController::class,'eliminarPermiso']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
