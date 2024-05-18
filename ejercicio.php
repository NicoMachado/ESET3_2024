<?php 

abstract class Vehicle {
    protected $brand;
    private $model;

    public function __construct($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
    }

    public function display() {
        echo "Brand: " . $this->brand . "\n";
        echo "Model: " . $this->model . "\n";
    }

    abstract function startEngine();
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

    public function startEngine() {
        echo "Starting the engine of the car: " . $this->brand . " " . $this->model . "\n";
    }
}

class Truck extends Vehicle {
    private $fuelType;
    private $tons;

    public function __construct($brand, $model, $fuelType, $tons = "5") {
        // Llamada al constructor de la clase padre
        parent::__construct($brand, $model);
        $this->fuelType = $fuelType;
        $this->tons = $tons;
    }

    public function display() {
        parent::display(); // Muestra la marca y el modelo
        echo "Marca: " . $this->brand . "\n";
        echo "Fuel Type: " . $this->fuelType . "\n";
        echo "Tons: " . $this->tons . "\n";
    }

    public function startEngine() {
        echo "Starting the engine of the truck with extra power: " . $this->brand . " " . $this->model . "\n";
    }
    
}

function startVehicleEngine(Vehicle $vehicle) {
    $vehicle->startEngine();
}

$c = new Car("Ford", "Mondeo", "Nafta");
$c->display();
echo "\n";
$t = new Truck("Ford", "F-150", "Diesel");
$t->display();


//startVehicleEngine($c);
//startVehicleEngine($t);