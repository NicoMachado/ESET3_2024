<?php 
abstract class Vehicle {
    private $brand;
    private $model;

    public function __construct($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
    }

    public function display() {
        echo "Brand: " . $this->brand . "\n";
        echo "Model: " . $this->model . "\n";
    }
}

// $v = new Vehicle("Ford", "Mondeo");
// $v->display();

class Car extends Vehicle {
    private $fuelType;

    public function __construct($brand, $model, $fuelType) {
        // Llamada al constructor de la clase padre
        parent::__construct($brand, $model);
        $this->fuelType = $fuelType;
    }

    // Extiende la funcionalidad del método display
    public function display() {
        parent::display(); // Muestra la marca y el modelo
        echo "Fuel Type: " . $this->fuelType . "\n";
    }
}

$c = new Car("Ford", "Mondeo", "Nafta");
$c->display();
