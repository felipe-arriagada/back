<?php
// echo'<pre>';
//print_r($_SERVER);

$_method = $_SERVER['REQUEST_METHOD'];
$_host = $_SERVER['HTTP_HOST'];
$_uri = $_SERVER['REQUEST_URI'];
$_partes = explode('/', $_uri); // divide la cadena almacenada en $_uri en partes, separándola cada vez que encuentra una barra (/).
//echo "<p>{$_host}</p>";
//echo "<p>{$_uri}</p>";
//echo "<p>{$_method}</p>";
//echo '</pre>';

//header Configuracion  //Instrucción que se envía desde el servidor al navegador o cliente HTTP antes de enviar el contenido de la página.
header("Acces-Control-Allow-Origin: *"); //Este encabezado permite el acceso a la API desde cualquier origen (dominio).
header("Acces-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE"); // Especifica los métodos HTTP permitidos para las solicitudes entrantes.
header("Content-Type: application/json; charset=UTF-8"); // Indica el tipo de contenido y la codificación de caracteres de la respuesta.

//Authorization
$_authorization = null;
try {
    if(isset(getallheaders()['Authorization'])){
        $_authorization = getallheaders()['Authorization'];
       // echo 'autorizacion correcta';
    }else{
      http_response_code(401);
      echo json_encode(['error' =>'No tienes autorizacion']);
    }   

} catch (Exception $e) {
   echo 'error' ;
}
?>