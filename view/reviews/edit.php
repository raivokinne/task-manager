<?php view('components/head', ['title' => 'Update Review']) ?>
<form action="/reviews/<?php echo $id ?>" method="POST" class="mt-6">
    <input type="hidden" name="room_id" value="<?php echo $room_id ?>">
    <div class="mb-4">
        <label for="rating" class="block text-gray-700">Rating</label>
        <select id="rating" name="rating" class="w-full p-2 border rounded">
            <?php foreach (range(1, 5) as $i) : ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-4">
        <label for="comment" class="block text-gray-700">Comment</label>
        <textarea id="comment" name="comment" rows="4" class="w-full p-2 border rounded"></textarea>
    </div>
    <button type="submit" class="px-4 py-2 font-bold text-white bg-black rounded hover:bg-gray-800">Submit
        Review</button>
</form>
<?php view('components/footer');
