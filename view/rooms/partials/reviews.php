<section class="w-full px-4 py-6">
    <div class="max-w-4xl">
        <h2 class="mb-4 text-2xl font-bold text-gray-800">Reviews</h2>

        <?php if (isset($_SESSION['user'])) : ?>
            <form action="/reviews" method="POST" class="mt-6">
                <input type="hidden" name="room_id" value="<?= $room_id ?>">
                <div class="mb-4">
                    <label for="rating" class="block text-gray-700">Rating</label>
                    <select id="rating" name="rating" class="w-full p-2 border rounded">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="comment" class="block text-gray-700">Comment</label>
                    <textarea id="comment" name="comment" rows="4" class="w-full p-2 border rounded"></textarea>
                </div>
                <button type="submit" class="px-4 py-2 font-bold text-white bg-black rounded hover:bg-gray-800">Submit
                    Review</button>
            </form>
        <?php else : ?>
            <p class="text-gray-600">Please <a href="/login" class="text-blue-500">log in</a> to leave a review.</p>
        <?php endif; ?>
        <?php foreach ($reviews as $review) : ?>
            <div class="p-4 mt-10 mb-4 border rounded-lg bg-gray-50">
                <p class="text-gray-600">
                    <strong>
                        <?= $review['user_id'] == $_SESSION['user']['id'] ? 'You' : $users[$review['user_id']]['name']  ?>
                    </strong> on <strong>
                        <?= date('d M Y', strtotime($review['created_at'])) ?>
                    </strong> rated it
                    <?= $review['rating'] ?>/5
                </p>
                <p class="text-gray-800">
                    <?= $review['comment'] ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
