<?php
class Entity
{
    private $conn;
    private $response;

    public function __construct()
    {
        $this->conn = new MySQL_connect();
        $this->response = array();
    }

    public function selectData($table, $id)
    {
        $this->response = $this->conn->selectData($table, $id);
        return $this->response;
    }
    public function selectAllData($table, $where = null)
    {
        $this->response = $this->conn->selectAllData($table, $where);
        return $this->response;
    }
}
?>

