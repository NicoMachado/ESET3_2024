<?php
class Fruit {
  // Properties
  private $name;
  private $color;
  private $calorias;

  // Methods
    function __toString() {
        return "[Nombre: ".$this->name ."\n".
        "{Color: ".$this->color."}". 
        "]\n\n";
    }

  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }

  function set_color($color) {
    $this->color = $color;
  }
  
  function get_color() {
    return $this->color;
  }

  function set_calorias($calorias){
    $this->calorias = $calorias;
  }
}

$apple = new Fruit();
$res = $apple
    ->set_name('Apple');
$apple->set_calorias(50);
$apple->set_color('Rojo');
var_dump($res);
echo $apple;


$banana = new Fruit();
$banana->set_name('Banana');

echo $apple->get_name();
echo "<br>";
echo $banana->get_name();

echo "<br>";

$fruta = new Fruit();
$fruta->set_name ( "Pera" );
$fruta->set_calorias( 60 );
var_dump($fruta);

$fruta = new Fruit();
$fruta->set_name ( "Pera" );
$fruta->set_calorias( 60 );
var_dump($fruta);

?>