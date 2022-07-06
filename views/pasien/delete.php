<?php
require_once(realpath (dirname(__FILE__)) . '/../../Utility/Database.php');

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: /views/pasien');
}

$database = new Database();

if ($database->deletePasien($id)) {
    header('Location: /views/pasien');
}
?>