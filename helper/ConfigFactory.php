// <?php
// include_once("helper/MyConexion.php");
// include_once("helper/IncludeFileRenderer.php");
// include_once("helper/NewRouter.php");
// include_once("controller/PokemonController.php");
// include_once("controller/LoginController.php");
// include_once("model/PokemonModel.php");
// include_once("model/LoginModel.php");
// include_once('vendor/mustache/src/Mustache/Autoloader.php');
// include_once ("helper/MustacheRenderer.php");
// class ConfigFactory
// {
//     private $config;
//     private $objetos;

//     private $conexion;
//     private $renderer;

//     public function __construct()
//     {
//         $this->config = parse_ini_file("config/config.ini");

//         $this->conexion= new MyConexion(
//             $this->config["server"],
//             $this->config["user"],
//             $this->config["pass"],
//             $this->config["database"]
//         );

//         $this->renderer = new MustacheRenderer("vista");

//         $this->objetos["router"] = new NewRouter($this, "PokemonController", "base");

//         $this->objetos["LoginController"] = new LoginController(new LoginModel($this->conexion), $this->renderer);

//         $this->objetos["PokemonController"] = new PokemonController(new PokemonModel($this->conexion), $this->renderer);

//     }

//     public function get($objectName)
//     {
//         return $this->objetos[$objectName];
//     }
// }

<?php
class ConfigFactory {
    private array $db;

    public function __construct() {
        $path = __DIR__ . '/../config/config.ini';
        $ini = is_file($path) ? parse_ini_file($path, true, INI_SCANNER_TYPED) : null;
        if (!$ini || !isset($ini['db'])) {
            throw new RuntimeException("Falta o es inválido config.ini en: $path");
        }
        $this->db = $ini['db'];
    }
    public function db(): array { return $this->db; }
}
