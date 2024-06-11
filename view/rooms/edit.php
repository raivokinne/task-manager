<?php view('components/head') ?>

<section class="grid py-6 px-4 bg-gray-100 w-full h-screen place-items-center">
    <form class="space-y-6 max-w-md w-full mt-10" action="/rooms/<?= $room['id'] ?>/update" method="post" enctype="multipart/form-data">
        <?= method('PUT') ?>
        <label for="name">
            <span>Name</span>
            <input type="text" value="<?= $room['name'] ?>" name="name" id="name" placeholder="Name" class="w-full border border-gray-300 rounded px-4 py-2" />
            <?php if (isset($errors['name'])) : ?>
                <p class="text-red-500">
                    <?= $errors['name'] ?>
                </p>
            <?php endif; ?>
        </label>
        <label for="description">
            <span>Description</span>
            <input type="text" name="description" value="<?= $room['description'] ?>" id="description" placeholder="Description" class="w-full border border-gray-300 rounded px-4 py-2" />
            <?php if (isset($errors['description'])) : ?>
                <p class="text-red-500">
                    <?= $errors['description'] ?>
                </p>
            <?php endif; ?>
        </label>
        <label for="price">
            <span>Price</span>
            <input type="number" name="price" id="price" placeholder="Price" value="<?= $room['price'] ?>" class="w-full border border-gray-300 rounded px-4 py-2" />
            <?php if (isset($errors['price'])) : ?>
                <p class="text-red-500">
                    <?= $errors['price'] ?>
                </p>
            <?php endif; ?>
        </label>
        <label for="image">
            <span>Image</span>
            <input type="file" name="image" id="image" placeholder="Image" value="<?= $room['image'] ?>" class="w-full border border-gray-300 rounded px-4 py-2" />
            <?php if (isset($errors['image'])) : ?>
                <p class="text-red-500">
                    <?= $errors['image'] ?>
                </p>
            <?php endif; ?>
        </label>
        <label for="type">
            <span>Type</span>
            <input type="text" name="type" id="type" placeholder="Type" value="<?= $room['type'] ?>" class="w-full border border-gray-300 rounded px-4 py-2" />
            <?php if (isset($errors['type'])) : ?>
                <p class="text-red-500">
                    <?= $errors['type'] ?>
                </p>
            <?php endif; ?>
        </label>
        <label for="capacity">
            <span>Capacity</span>
            <input type="number" name="capacity" id="capacity" placeholder="Capacity" value="<?= $room['capacity'] ?>" class="w-full border border-gray-300 rounded px-4 py-2" />
            <?php if (isset($errors['capacity'])) : ?>
                <p class="text-red-500">
                    <?= $errors['capacity'] ?>
                </p>
            <?php endif; ?>
        </label>
        <label for="address">
            <span>Address</span>
            <input type="text" name="address" id="address" placeholder="Address" value="<?= $room['address'] ?>" class="w-full border border-gray-300 rounded px-4 py-2" />
            <?php if (isset($errors['address'])) : ?>
                <p class="text-red-500">
                    <?= $errors['address'] ?>
                </p>
            <?php endif; ?>
        </label>
        <label for="city">
            <span>City</span>
            <input type="text" name="city" id="city" placeholder="City" value="<?= $room['city'] ?>" class="w-full border border-gray-300 rounded px-4 py-2" />
            <?php if (isset($errors['city'])) : ?>
                <p class="text-red-500">
                    <?= $errors['city'] ?>
                </p>
            <?php endif; ?>
        </label>
        <label for="country">
            <span>Country</span>
            <input type="text" name="country" id="country" placeholder="Country" value="<?= $room['country'] ?>" class="w-full border border-gray-300 rounded px-4 py-2" />
            <?php if (isset($errors['country'])) : ?>
                <p class="text-red-500">
                    <?= $errors['country'] ?>
                </p>
            <?php endif; ?>
        </label>
        <label for="rating">
            <span>Rating</span>
            <input type="number" min="1" max="5" name="rating" id="rating" placeholder="Rating" value="<?= $room['rating'] ?>" class="w-full border border-gray-300 rounded px-4 py-2" />
            <?php if (isset($errors['rating'])) : ?>
                <p class="text-red-500">
                    <?= $errors['rating'] ?>
                </p>
            <?php endif; ?>
        </label>
        <label for="category">
            <span>Category</span>
            <select name="category" id="category" class="w-full border border-gray-300 rounded px-4 py-2">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['id'] ?>" <?= $room['category_id'] == $category['id'] ? 'selected' : '' ?>>
                        <?= $category['name'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($errors['category'])) : ?>
                <p class="text-red-500">
                    <?= $errors['category'] ?>
                </p>
            <?php endif; ?>
        </label>
        <div class="!mt-10">
            <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-gray-700 hover:bg-gray-600 focus:outline-none">
                Update
            </button>
        </div>
    </form>

</section>

<?php view('components/footer') ?>

