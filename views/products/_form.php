<section class="flex justify-center">
    <div class="py-6 bg-white w-11/12 md:w-2/4 lg:w-2/5 xl:w-[30%]">
        <h2 class="mb-2 text-3xl font-bold tracking-tight px-6 text-red-600">Add Product</h2>
        <form method="POST">
            <hr class="my-5" />
            <div class="mb-6 px-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Product Title</label>
                <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product title..." value="<?php echo $product["title"] ?>" required>
            </div>
            <div class="mb-6 px-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Product Description</label>
                <textarea id="description" rows="4" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Product description..." required ><?php echo $product["description"] ?></textarea>
            </div>
            <div class="mb-6 px-6">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Product Price</label>
                <input type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product price..." value="<?php echo $product["price"] ?>" required>
            </div>
            <button type="submit" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-7 py-2.5 mb-2 mx-6">Add Product</button>
        </form>
    </div>
</section>