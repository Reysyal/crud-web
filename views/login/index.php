<?php 
require_once(realpath (dirname(__FILE__)) . '/../../Models/User.php');
include_once __DIR__.'/../partials/layout.php';

session_start();

if (isset($_SESSION['email'])) {
    header("Location: /views/pasien");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataUser['email'] = $_POST['email'];
    $dataUser['password'] = $_POST['password'];

    $user = new User();
    $user->load($dataUser);
    if ($user->validate()) {
        header('Location: /views/pasien');
    }
    else 
        header('Location: /views/login');
}
?>

<section class="flex h-screen items-center justify-center bg-gray-100">
    <div class="py-6 lg:rounded-2xl bg-white drop-shadow-2xl w-11/12 md:w-2/4 lg:w-2/5 xl:w-[30%]">
        <form method="POST">
            <h2 class="mb-2 text-3xl font-bold tracking-tight px-6">Login</h2>
            <hr class="my-5" />
            <div class="mb-6 px-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <div class="mb-6 px-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-7 py-2.5 mb-2 mx-6">Login</button>
            <p class="block mb-2 font-medium text-gray-900 mx-6 mt-3">Belum punya akun? <a href="/views/login/register.php" class="text-red-600 hover:font-bold">Daftar di sini</a></p>
        </form>
    </div>
</section>
