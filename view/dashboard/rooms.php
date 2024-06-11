<?php view('components/head', ['title' => 'Rooms Management']) ?>

<div class="flex h-screen bg-gray-100">
    <?php view('dashboard/partials/side-nav') ?>

    <div class="flex-1 p-10">
        <section class="grid w-full h-full place-items-center">
            <h1 class="mt-20 text-3xl">Rooms Management</h1>
            <a href="/rooms/create" class="px-4 py-2 mt-10 font-bold text-white bg-black rounded hover:bg-gray-700">Create</a>
            <div class="w-full p-6 mt-10 bg-white rounded-lg shadow-lg">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">ID</th>
                            <th class="py-2">Name</th>
                            <th class="py-2">Price</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rooms as $room) : ?>
                            <tr>
                                <td class="py-2 text-center"><?php echo $room['id']; ?></td>
                                <td class="py-2 text-center"><?php echo $room['name']; ?></td>
                                <td class="py-2 text-center"><?php echo $room['price']; ?></td>
                                <td class="grid py-2 text-center">
                                    <form action="/rooms/<?php echo $room['id']; ?>/delete" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                    <a href="/rooms/<?php echo $room['id']; ?>/edit" class="text-blue-600 hover:underline">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<?php view('components/footer') ?>