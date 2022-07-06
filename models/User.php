<?php

require_once(realpath (dirname(__FILE__)) . '/../Utility/Database.php');

class User
{
    public string $email;
    public string $password;

    public function load($pasien)
    {
        $this->email = $pasien['email'];
        $this->password = $pasien['password'];
    }

    public function validate()
    {
        $db = new Database();
        if ($db->validateUser($this)) {
            return true;
        }
        return false;
    }

    public function register()
    {
        $db = new Database();
        if ($db->registerUser($this)) {
            return true;
        }
        return false;
    }
}