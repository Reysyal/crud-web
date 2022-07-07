<?php

class Database
{
    private $_connection = null;
    private static $_instance;

    const _DB_HOST = 'localhost';
    const _DB_USER = 'id19229840_root';
    const _DB_PASS = '_=MeH2nlI<p8\&{V';
    const _DB_NAME = 'id19229840_vaksin';

    public static function getInstance() 
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        
        return self::$_instance;
    }

    public function getConnection()
    {
        $this->_connection = mysqli_connect(self::_DB_HOST, self::_DB_USER, self::_DB_PASS, self::_DB_NAME);

        return $this->_connection;
    }

    public function validateUser(User $user)
    {
        $email = $user->email;
        $password = md5($user->password);

        $result = self::getInstance()->getConnection()->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $row['email'];
            return true;
        }
        return false;
    }

    public function registerUser(User $user)
    {
        $email = $user->email;
        $password = md5($user->password);

        if(self::getInstance()->getConnection()->query("INSERT INTO users (email, password) VALUES ('$email', '$password')")) {
            return true;
        } 
        return false;
    }

    public function getPasien()
    {
        $result = self::getInstance()->getConnection()->query("SELECT * FROM pasien");
        $rows = array();

        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function createPasien(Pasien $pasien)
    {
        $sql = 'INSERT INTO pasien (faskes, nama, nik, kelamin, umur, hp) VALUES ("' . $pasien->faskes . '", "' . $pasien->nama . '", "' . $pasien->nik . '", "' . $pasien->kelamin . '", ' . $pasien->umur . ', "' . $pasien->hp . '")';
        
        self::getInstance()->getConnection()->query($sql);
    }

    public function updatePasien(Pasien $pasien)
    {
        $sql = "UPDATE pasien SET faskes = '" . $pasien->faskes ."', nama = '" . $pasien->nama . "', nik = '" . $pasien->nik . "', kelamin = '" . $pasien->kelamin . "', umur = " . $pasien->umur . ", hp = '" . $pasien->hp . "' WHERE id = " . $pasien->id . "";

        self::getInstance()->getConnection()->query($sql);
    }

    public function deletePasien($id)
    {
        $sql = "DELETE FROM pasien WHERE id = $id";
        return self::getInstance()->getConnection()->query($sql);
    }

    public function getPasienById($id)
    {
        $result = self::getInstance()->getConnection()->query("SELECT * FROM pasien WHERE id = $id");

        return mysqli_fetch_assoc($result);
    }
}