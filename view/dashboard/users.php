<?php view('components/head', ['title' => 'Users Management']) ?>

<div class="flex h-screen bg-gray-100">
    <?php view('dashboard/partials/side-nav') ?>

    <div class="flex-1 p-10">
        <section class="grid w-full h-full place-items-center">
            <h1 class="text-3xl">Users Management</h1>
            <div class="w-full p-6 mt-10 bg-white rounded-lg shadow-lg">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">ID</th>
                            <th class="py-2">Name</th>
                            <th class="py-2">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td class="py-2 text-center"><?php echo $user['id']; ?></td>
                                <td class="py-2 text-center"><?php echo $user['name']; ?></td>
                                <td class="py-2 text-center"><?php echo $user['email']; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<?php view('components/footer') ?>