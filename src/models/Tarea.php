<?php

class Tarea extends Entity
{

    private $id;
    private $titulo;
    private $detalle;
    private $fechaEntrega;
    private $tema_id;
    private $profesor_id;
    private $fechaUltimoCambio;
    private $usuario_id;
    private $table;

    public function __construct()
    {
        parent::__construct(); // Llamada al constructor de la clase base
        $this->table = 'tarea';
    }

    /**
     * 
     */
    public function load($id)
    {
        $this->id = $id;
        $model = $this->mysql->selectData($this->table, $this->id);
        if (!isset($model['error'])) {
            $this->id = $model['id'];
            $this->titulo = $model['titulo'];
            $this->detalle = $model['detalle'];
            $this->fechaEntrega = $model['fechaEntrega'];
            $this->tema_id = $model['tema_id'];
            $this->profesor_id = $model['profesor_id'];
            $this->fechaUltimoCambio = $model['fechaUltimoCambio'];
            $this->usuario_id = $model['usuario_id'];
        }
    }

    /**
     * 
     */
    public function loadAll()
    {
        $model = $this->mysql->selectAllData($this->table);
        return $model;
    }




    public function save()
    {
        $this->mysql->insertData($this->table, $this->id, $this->titulo, $this->detalle, $this->fechaEntrega, $this->tema_id, $this->profesor_id, $this->fechaUltimoCambio, $this->usuario_id);
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setTitulo(string $titulo)
    {
        $this->titulo = $titulo;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setDetalle(string $detalle)
    {
        $this->detalle = $detalle;
    }
    public function getDetalle()
    {
        return $this->detalle;
    }

    public function setFechaEntrega(string $fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;
    }
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    public function setTema_id(string $tema_id)
    {
        $this->tema_id = $tema_id;
    }
    public function getTema_id()
    {
        return $this->tema_id;
    }

    public function setProfesor_id(string $profesor_id)
    {
        $this->profesor_id = $profesor_id;
    }
    public function getProfesor_id()
    {
        return $this->profesor_id;
    }

    public function setFechaUltimoCambio(string $fechaUltimoCambio)
    {
        $this->fechaUltimoCambio = $fechaUltimoCambio;
    }
    public function getFechaUltimoCambio()
    {
        return $this->fechaUltimoCambio;
    }

    public function setUsuario_id(string $usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    //getTable
    public function getTable()
    {
        return $this->table;
    }
}
?>