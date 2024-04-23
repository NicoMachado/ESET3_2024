<?php
class User extends Entity
{
    public function __construct() {
        parent::__construct();        
    }
    private $id;
    private $username;
    private $password;


    public function setId(string $id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }

    public function setContrasena(string $contrasena)
    {
        $this->contrasena = $contrasena;
    }
    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function validate($username, $password) {
        $where = "WHERE username = '$username' AND password = '$password'";
        $users = $this->selectAllData('user', $where);

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