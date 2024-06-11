<?php

use App\Models\Room;
?>

<?php view('components/head', ['title' => 'Orders Management']) ?>

<div class="flex h-screen bg-gray-100">
    <?php view('dashboard/partials/side-nav') ?>

    <div class="flex-1 p-10">
        <section class="grid place-items-center w-full h-full">
            <h1 class="text-3xl">Orders Management</h1>
            <div class="mt-10 bg-white p-6 rounded-lg shadow-lg w-full">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">Order ID</th>
                            <th class="py-2">Order Date</th>
                            <th class="py-2">Room Name</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($booking as $order) : ?>
                            <tr>
                                <td class="py-2 text-center">
                                    <?php echo $order['id']; ?>
                                </td>
                                <td class="py-2 text-center">
                                    <?php echo $order['created_at']; ?>
                                </td>
                                <?php
                                    $room = Room::find($order['room_id'])->get();
                                    $order['room_name'] = $room['name'];
                                ?>
                                <td class="py-2 text-center">
                                    <?php echo $order['room_name']; ?>
                                </td>
                                <td class="text-center flex gap-4 items-center w-full justify-center">
                                    <form action="/bookings/<?php echo $order['id'] ?>/cancel" method="POST">
                                        <input type="hidden" name="_method" value="PUT">
                                        <button type="submit" class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                                    </form>
                                    <form action="/bookings/<?php echo $order['id'] ?>/confirm" method="POST">
                                        <input type="hidden" name="_method" value="PUT">
                                        <button type="submit" class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Confirm</button>
                                    </form>
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
