<?php

class User extends Entity
{
    private $table;

    private $id;
    private $username;
    private $password;

    public function __construct() {
        parent::__construct();   
        $this->table = 'usuario';
    }



    public function setId(string $id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function validate($username, $password) {
        $where = " username = '$username' AND password = '$password'";
        try {
            $users = $this->selectAllData($this->table, $where);
            //code...
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            
        }

        if (count($users) > 0) {
            $user = new User();
            $user->username = $username;
            $user->password = $password;

            return $user;
        } else {
            return null;
        }
    }

    
}