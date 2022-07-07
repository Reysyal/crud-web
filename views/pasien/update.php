<?php
require_once(realpath (dirname(__FILE__)) . '/../../Utility/Database.php');
require_once(realpath (dirname(__FILE__)) . '/../../Models/Pasien.php');

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: /views/pasien');
    exit;
}

$database = new Database();
$pasien = $database->getPasienById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pasien['faskes'] = $_POST['faskes'];
    $pasien['nama'] = $_POST['nama'];
    $pasien['nik'] = $_POST['nik'];
    $pasien['kelamin'] = $_POST['kelamin'];
    $pasien['umur'] = $_POST['umur'];
    $pasien['hp'] = $_POST['hp'];

    $pasienModel = new Pasien();
    $pasienModel->load($pasien);
    $pasienModel->save();
    header('Location: /views/pasien');
    exit;
}
?>

<?php include_once __DIR__.'/../partials/layout.php' ?>
<?php include_once __DIR__.'/../partials/header.php' ?>

<title>Vaksin | Update Pasien</title>

<section class="flex justify-center">
    <div class="py-6 bg-white w-11/12 md:w-2/4 lg:w-2/5 xl:w-[30%]">
        <h2 class="mb-2 text-3xl font-bold tracking-tight px-6 text-red-600">Update Pasien</h2>
        <?php include_once '_form.php' ?>
    </div>
</section>