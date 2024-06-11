<?php view('components/head', ['title' => 'Reviews']) ?>

<div class="flex h-screen bg-gray-100">
    <?php view('dashboard/partials/side-nav') ?>

    <div class="flex-1 p-10">
        <section class="grid w-full h-full place-items-center">
            <h1 class="mb-6 text-3xl">Reviews Management</h1>
            <div class="w-full p-6 mt-10 bg-white rounded-lg shadow-lg">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                User</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Room</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Rating</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Review</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reviews as $review) : ?>


                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    <?= $users[$review['user_id']]['name'] ?>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    <?= $rooms[$review['room_id']]['name'] ?>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    <?php echo $review['rating'] ?>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    <?php echo $review['comment'] ?>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    <?php echo $review['created_at'] ?>
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