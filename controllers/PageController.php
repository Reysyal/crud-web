<?php

namespace app\controllers;

use app\models\Pasien;
use app\models\User;
use app\Router;

class PageController
{
    static public string $emailSession;

    static public function login(Router $router)
    {
        if (!empty(self::$emailSession)) {
            header("Location: pasien");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataUser['email'] = $_POST['email'];
            $dataUser['password'] = $_POST['password'];

            $user = new User();
            $user->load($dataUser);
            if ($user->validate()) {
                header('Location: pasien');
            }
            else 
                header('Location: login');
            exit;
        }

        $router->renderView('login/index');
    }

    static public function register(Router $router)
    {
        if (!empty(self::$emailSession)) {
            header("Location: pasien");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataUser['email'] = $_POST['email'];
            $dataUser['password'] = $_POST['password'];

            $user = new User();
            $user->load($dataUser);
            if ($user->register()) 
                header('Location: login');
            else 
                header('Location: register');
            exit;
        }

        $router->renderView('login/register');
    }

    static public function pasien(Router $router)
    {
        // if (empty(self::$emailSession)) {
        //     header("Location: login");
        // }

        $pasien = $router->database->getPasien();
        $router->renderView('pasien/index', [
            'pasien' => $pasien,
        ]);
    }
    
    static public function create(Router $router)
    {
        // if (empty(self::$emailSession)) {
        //     header("Location: login");
        // }

        $dataPasien = [
            'faskes' => '',
            'nama' => '',
            'nik' => '',
            'kelamin' => '',
            'umur' => '',
            'hp' => '',
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataPasien['faskes'] = $_POST['faskes'];
            $dataPasien['nama'] = $_POST['nama'];
            $dataPasien['nik'] = $_POST['nik'];
            $dataPasien['kelamin'] = $_POST['kelamin'];
            $dataPasien['umur'] = $_POST['umur'];
            $dataPasien['hp'] = $_POST['hp'];

            $pasien = new Pasien();
            $pasien->load($dataPasien);
            $pasien->save();
            header('Location: /pasien');
            exit;
        }

        $router->renderView('pasien/create', [
            'pasien' => $dataPasien,
        ]);
    }

    static public function update(Router $router)
    {
        // if (empty(self::$emailSession)) {
        //     header("Location: login");
        // }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /pasien');
            exit;
        }
        $dataPasien = $router->database->getPasienById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataPasien['faskes'] = $_POST['faskes'];
            $dataPasien['nama'] = $_POST['nama'];
            $dataPasien['nik'] = $_POST['nik'];
            $dataPasien['kelamin'] = $_POST['kelamin'];
            $dataPasien['umur'] = $_POST['umur'];
            $dataPasien['hp'] = $_POST['hp'];

            $pasien = new Pasien();
            $pasien->load($dataPasien);
            $pasien->save();
            header('Location: /pasien');
            exit;
        }

        $router->renderView('pasien/update', [
            'pasien' => $dataPasien
        ]);
    }

    static public function delete(Router $router)
    {
        // if (empty(self::$emailSession)) {
        //     header("Location: login");
        // }

        $id = $_POST['id'] ?? null;
        if (!$id) {
            header('Location: /pasien');
            exit;
        }

        if ($router->database->deletePasien($id)) {
            header('Location: /pasien');
            exit;
        }
    }
}