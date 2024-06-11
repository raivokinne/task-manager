<?php view('components/head', ['title' => $room['name']]) ?>

<section class="grid w-full h-full px-4 py-6 bg-gray-100 place-items-center">
    <div class="grid grid-cols-2 place-items-center w-full h-[75vh] mt-36">
        <div class="flex flex-col items-start justify-start w-full h-full p-6 space-y-4">
            <img src="/storage/images/<?= $room['image'] ?>" alt="<?= $room['name'] ?>" class="w-full">
            <p class="text-xl text-gray-600">
                <?= $room['rating'] ?>/5
            </p>
        </div>
        <div class="flex flex-col items-start justify-start w-full h-full gap-10 p-6 space-y-4">
            <div class="space-y-4">
                <h1 class="text-4xl font-bold text-gray-800">
                    <?= $room['name'] ?>
                </h1>
                <p class="text-xl text-green-600">$
                    <?= number_format($room['price'], 2) ?>
                </p>
            </div>
            <hr class="w-full h-0.5 bg-black">
            <div class="space-y-4">
                <h2 class="text-2xl font-bold text-gray-800">Details</h2>
                <div>
                    <p class="text-gray-600">
                        <?= $room['description'] ?>
                    </p>
                    <p><strong>Type:</strong>
                        <?= $room['type'] ?>
                    </p>
                    <p><strong>Capacity:</strong>
                        <?= $room['capacity'] ?> people
                    </p>
                    <p><strong>Address:</strong>
                        <?= $room['address'] ?>
                    </p>
                    <p><strong>City:</strong>
                        <?= $room['city'] ?>
                    </p>
                    <p><strong>Country:</strong>
                        <?= $room['country'] ?>
                    </p>
                </div>
            </div>
            <div class="flex space-x-4">
                <form action="/bookings" method="POST">
                    <input type="hidden" name="room_id" value="<?= $room['id'] ?>">
                    <input type="hidden" name="total_price" value="<?= $room['price'] ?>">
                    <input type="date" name="start_date" id="start_date" class="px-4 py-2 border border-black rounded-full">
                    <input type="date" name="end_date" id="end_date" class="px-4 py-2 border border-black rounded-full">
                    <button class="px-4 py-2 font-bold text-white bg-black rounded hover:bg-gray-800">Book</button>
                </form>
                <?php if (isset($_SESSION['user'])) : ?>
                    <?php if ($_SESSION['user']['role'] == 'admin') : ?>
                        <button class="px-4 py-2 font-bold text-white bg-black rounded hover:bg-gray-800"><a href="/rooms/<?= $room['id'] ?>/edit">Edit</a></button>
                        <form action="/rooms/<?= $room['id'] ?>/delete" method="POST">
                            <?= method('DELETE') ?>
                            <button class="px-4 py-2 font-bold text-white bg-black rounded hover:bg-gray-800">Delete</button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php view('rooms/partials/reviews', ['title' => 'Reviews', 'users' => $users, 'room_id' => $room['id'], 'reviews' => $reviews]) ?>
</section>


<?php view('components/footer') ?>