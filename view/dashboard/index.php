<?php view('components/head', ['title' => 'Dashboard']) ?>

<div class="flex h-screen bg-gray-100">
    <?php view('dashboard/partials/side-nav') ?>

    <div class="flex-1 p-10">
        <section class="grid place-items-center w-full h-full">
            <h1 class="text-3xl mb-6">Dashboard Overview</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-semibold text-gray-800">Total Users</h2>
                    <p class="text-gray-600 mt-2">
                        <?php echo $totalUsers; ?>
                    </p>
                    <a href="/dashboard/users" class="text-blue-600 hover:underline mt-4 block">Manage Users</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-semibold text-gray-800">Total Rooms</h2>
                    <p class="text-gray-600 mt-2">
                        <?php echo $totalRooms; ?>
                    </p>
                    <a href="/dashboard/rooms" class="text-blue-600 hover:underline mt-4 block">Manage Rooms</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-semibold text-gray-800">Total Bookings</h2>
                    <p class="text-gray-600 mt-2">
                        <?php echo $totalOrders; ?>
                    </p>
                    <a href="/dashboard/bookings" class="text-blue-600 hover:underline mt-4 block">Manage Bookings</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-semibold text-gray-800">Total Reviews</h2>
                    <p class="text-gray-600 mt-2"><?= $totalReviews; ?></p>
                    <a href=" /dashboard/reviews" class="text-blue-600 hover:underline mt-4 block">Manage Reviews</a>
                </div>
            </div>
        </section>
    </div>
</div>

<?php view('components/footer') ?>
