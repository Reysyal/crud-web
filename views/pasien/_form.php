<form method="POST">
    <hr class="my-5" />
    <div class="mb-6 px-6">
        <label for="faskes" class="block mb-2 text-sm font-medium text-gray-900">Nama Faskes</label>
        <input type="text" id="faskes" name="faskes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama faskes..." value="<?php echo $pasien["faskes"] ?>" required>
    </div>
    <div class="mb-6 px-6">
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Pasien</label>
        <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama pasien..." value="<?php echo $pasien["nama"] ?>" required>
    </div>
    <div class="mb-6 px-6">
        <label for="nik" class="block mb-2 text-sm font-medium text-gray-900">NIK Pasien</label>
        <input type="text" id="nik" name="nik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nik pasien..." value="<?php echo $pasien["nik"] ?>" required>
    </div>
    <div class="mb-6 px-6">
        <label for="kelamin" class="block mb-2 text-sm font-medium text-gray-900">Kelamin Pasien</label>
        <div class="flex items-center pt-1">
            <div class="mr-4 flex items-center">
                <input id="default-radio-1" type="radio" value="Laki-laki" name="kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" checked>
                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900">Laki-laki</label>
            </div>
            <div class="flex items-center">
                <input id="default-radio-2" type="radio" value="Perempuan" name="kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900">Perempuan</label>
            </div>
        </div>
    </div>
    <div class="mb-6 px-6">
        <label for="umur" class="block mb-2 text-sm font-medium text-gray-900">Umur Pasien</label>
        <input type="number" id="umur" name="umur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Umur pasien..." value="<?php echo $pasien["umur"] ?>" required>
    </div>
    <div class="mb-6 px-6">
        <label for="hp" class="block mb-2 text-sm font-medium text-gray-900">No Handphone</label>
        <input type="text" id="hp" name="hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="No hanphone pasien..." value="<?php echo $pasien["hp"] ?>" required>
    </div>
    <button type="submit" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-7 py-2.5 mb-2 mx-6">Simpan Pasien</button>
</form>