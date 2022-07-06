<?php include_once __DIR__.'/../partials/header.php' ?>

<section class="flex justify-center mt-6">
    <div class="w-full w-4/5">
        <div class="flex justify-between items-center">
            <h2 class="mb-6 text-3xl font-bold tracking-tight px-6 text-red-600">List Product</h2>
            <a href="/products/create" class="border-[3px] font-bold border-red-600 text-red-600 px-5 py-2 rounded-lg hover:bg-red-600 hover:text-white transition">Add Product</a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-700 uppercase bg-red-600">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-white">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3 text-white text-right">
                            Action
                            <span class="sr-only">Edit</span>
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium">
                            <?php echo $product['title'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo $product['description'] ?>
                        </td>
                        <td class="px-6 py-4">
                            $<?php echo $product['price'] ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="/products/update?id=<?php echo $product['id'] ?>" class="font-medium text-blue-600 hover:underline mr-2">Edit</a>
                            | <form method="post" action="/products/delete" style="display: inline-block">
                                <input  type="hidden" name="id" value="<?php echo $product['id'] ?>"/>
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