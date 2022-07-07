<?php

require_once(realpath (dirname(__FILE__)) . '/../../Utility/Database.php');
require_once(realpath (dirname(__FILE__)) . '/../../Models/Pasien.php');
include_once __DIR__.'/../partials/layout.php';
include_once __DIR__.'/../partials/header.php';

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: /');
}

$database = new Database();
$pasien = new Pasien();
$pasien = $database->getPasien();
?>
<title>Vaksin | Daftar Pasien</title>

<section class="flex justify-center mt-6">
    <div class="w-full w-4/5">
        <div class="flex justify-between items-center">
            <h2 class="mb-6 text-3xl font-bold tracking-tight px-6 text-red-600">Daftar Pasien Covid 19 di DKI Jakarta</h2>
            <a href="/views/pasien/create.php" class="border-[3px] font-bold border-red-600 text-red-600 px-5 py-2 rounded-lg hover:bg-red-600 hover:text-white transition">Tambah Pasien</a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-700 uppercase bg-red-600">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-white">
                            Nama Faskes
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            NIK
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Umur
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            No. Handphone
                        </th>
                        <th scope="col" class="px-6 py-3 text-white text-right">
                            Action
                            <span class="sr-only">Edit</span>
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pasien as $item) : ?>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium">
                            <?php echo $item['faskes'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo $item['nama'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $item['nik'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $item['kelamin'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $item['umur'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $item['hp'] ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="/views/pasien/update.php?id=<?php echo $item['id'] ?>" class="font-medium text-blue-600 hover:underline mr-2">Edit</a>
                            | <form method="post" action="/views/pasien/delete.php" style="display: inline-block">
                                <input  type="hidden" name="id" value="<?php echo $item['id'] ?>"/>
                                <button type="submit" class="font-medium text-blue-600 hover:underline ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>