<?php view('components/head', ['title' => 'Rooms']) ?>

<section class="grid py-6 px-4 bg-gray-100 w-full place-items-center">
    <div class="w-screen flex flex-col justify-center items-center h-full">
        <header class="max-w-7xl mx-auto px-6 lg:px-8 flex justify-between w-full mt-36">
            <div class="flex items-center gap-4">
                <form action="/rooms" method="get">
                    <label for="category">
                        <span>Filter by category: </span>
                        <?php if (isset($categories) && count($categories) > 0) : ?>
                        <select name="category" id="category" onchange="this.form.submit()">
                            <option value="">All</option>
                            <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id'] ?>" <?= ($_GET['category'] ?? '') == $category['id']
                                ? 'selected' : '' ?>>
                                <?= $category['name'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <?php endif; ?>
                    </label>

                    <label for="price">
                        <span>Filter by price: </span>
                        <input type="range" name="price" classs="w-full border border-gray-300 rounded px-4 py-2" id="price" min="100" max="10000" onchange="this.form.submit()" value="<?= $_GET['price'] ?? '' ?>">
                    </label>
                </form>
                <form action="/rooms" method="get">
                </form>
            </div>

            <form action="/rooms" method="get">
                <label for="search" class="flex items-center">
                    <input class="w-[350px] border border-black rounded-full px-4 py-2" type="text" placeholder="Search..." onchange="this.form.submit()" name="search" id="search" value="<?= $_GET['search'] ?? '' ?>">
                </label>
            </form>

        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8 px-6 lg:px-8">
            <?php foreach ($rooms as $room) : ?>
                <div class="p-4 bg-white shadow sm:rounded-lg">
                    <div class="text-center">
                        <div class="flex items-center justify-between">
                            <div class="flex flex-col justify-start items-start">
                                <h2 class="text-lg font-medium text-gray-900">
                                    <?php echo $room['name'] ?>
                                </h2>
                                <p class="text-sm font-medium text-gray-600">
                                    <?php echo $room['type'] ?>
                                </p>
                            </div>
                            <p class="text-sm font-medium text-green-600 mt-1">$
                                <?php echo $room['price'] ?>
                            </p>
                        </div>
                        <a href="/rooms/<?php echo $room['id'] ?>/show">
                            <img src="/storage/images/<?php echo $room['image'] ?>" alt="<?php echo $room['name'] ?>" class="mt-4 mx-auto w-full h-40 object-cover rounded-lg">
                        </a>
                        <p class="text-sm font-medium text-gray-600 mt-2">
                            <?php echo $room['description'] ?>
                        </p>
                        <p>
                            <?php echo $room['rating'] ?> stars
                        </p ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<?php view('components/footer') ?>
