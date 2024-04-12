<?php

class MySQL_connect
{

    protected $conn;


    public function __construct()
    {
        try {
            // Create connection
            $this->conn = mysqli_connect(DBM_HOST, DBM_USER, DBM_PASSWORD, DBM_NAME);
            return $this->conn;
        } catch (\Throwable $th) {
            $response['error'] = true;
            $response['errno'] = mysqli_connect_errno();
            $response['msj'] = mysqli_connect_error();
            return $response;
        }
    }

    public function selectData($table, $id)
    {
        //si es un array hubo un error de conexion
        if (is_array(($this->conn))) {
            if (isset($this->conn['error'])) {
                if ($this->conn['error']) {
                    return $this->conn;
                }
            }
        }
        //verifica que el id de la request sea mayor que 0
        if ($id <= 0) {
            $response = array();
            $response['error'] = true;
            $response['msg'] = 'bad id';
            mysqli_close($this->conn);
            return $response;
        }

        $response = array();
        $sql = "SELECT * FROM $table WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $response = $row;
            }
        }
        mysqli_close($this->conn);
        return $response;
    }

    //return array
    public function selectAllData($table, $where = null)
    {
        if (is_array(($this->conn))) {
            if (isset($this->conn['error'])) {
                if ($this->conn['error']) {
                    return $this->conn;
                }
            }
        }

        $response = array();
        $sql = "SELECT * FROM $table";
        if (isset($where)) {
            $sql .= " WHERE $where";
        }
        $result = mysqli_query($this->conn, $sql);
        var_dump(mysqli_error($this->conn));
        //if $result is false, there was an error
        if ($result !== false && mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $response[] = $row;
            }
                    
        } else {
            $response['error'] = true;
            $response['errno'] = mysqli_errno($this->conn);
            $response['msg'] = mysqli_error($this->conn);
        }
        mysqli_close($this->conn);
        return $response;
    }
}
