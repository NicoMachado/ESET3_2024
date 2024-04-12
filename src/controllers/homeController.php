<?php

/**
 *
 */
class HomeController extends Controllers
{

    private $name;
    private $mysql;

    public function __construct()
    {
        $this->name = 'homeController';
        $this->mysql = new MySQL_connect();
    }

    public function getName()
    {
        return $this->name;
    }

    public function index()
    {
        require_once(VIEWS_PATH . "homeView.php");
        
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            // El usuario ha iniciado sesión correctamente, muestra el contenido protegido
            // Aquí puedes incluir lógica para cargar datos específicos del usuario, etc.
            $usuario = $_SESSION['logged_user'];

            require_once(VIEWS_PATH . "homeView.php");
        } else {
            // El usuario no ha iniciado sesión, redirige a la página de inicio de sesión o muestra un mensaje de error
            // Ejemplo:
            // header("Location: login.php");
            // exit();
            echo "Debe iniciar sesión para acceder a esta página";
        }
    }

    public function login() {
        // Verifica las credenciales del usuario
        $credenciales_validas = false;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credenciales_validas = $this->mysql->login($_POST['username'], $_POST['password']);
        }
        if ($credenciales_validas) {
            $_SESSION['logged_in'] = true; // Establece la variable de sesión
            $_SESSION['logged_user'] = $_POST['username']; // Establece el nombre de usuario de sesión
            header("Location: home/index");
            exit();
        }

        require_once(VIEWS_PATH . "loginView.php");
        
    }

    public function api()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Allow: GET, POST, OPTIONS, PUT, DELETE");
        header('Content-Type: application/json');

        $http_method = $_SERVER['REQUEST_METHOD'];

        switch ($http_method) {
            case "GET":
                
                $model = $this->mysql->selectAllData('Tema');
                $response['data'] = $model;
                $response['http-method'] = $http_method;

                //$model['http-method'] = $http_method;

                $this->responseJSON($response);
                break;
            case "POST":
        }
    }

    public function responseJSON(array $response)
    {
        if (isset($response['error'])) {
            http_response_code(404);
        } else {
            http_response_code(200);
        }
        echo json_encode($response);
    }
}
