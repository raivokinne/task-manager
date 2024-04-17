<?php view('components/head', ['title' => 'Tasks']) ?>

<div class="container mx-auto px-4 sm:px-8 h-screen w-full">
    <div class="flex justify-between items-center w-full mx-[20px]">
        <div>
            <div class="py-8">
                <h2 class="text-2xl font-semibold leading-tight">Tasks</h2>
            </div>
            <div>
                <label for="category">
                    <span>Filter by category: </span>
                    <?php if (isset($categories) && count($categories) > 0) : ?>
                        <select name="category" id="category">
                            <option value="">All</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                </label>
            </div>
        </div>
        <div class="m-[30px]">
            <a href="/tasks/create"><img class="w-[30px]" src="/assets/add(1).png" alt="Add"></a>
        </div>
    </div>
    <div class="py-8">
        <?php if (isset($tasks) && count($tasks) > 0) : ?>
            <div class="shadow overflow-hidden rounded border-b border-gray-200">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="py-3 px-6 bg-gray-800 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                Title</th>
                            <th class="py-3 px-6 bg-gray-800 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                Description</th>
                            <th class="py-3 px-6 bg-gray-800 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                Actions</th>
                            <th class="py-3 px-6 bg-gray-800 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tasks as $task) : ?>
                            <tr>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900"><?= $task['title'] ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="text-sm text-gray-900"><?= $task['description'] ?></div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a href="/tasks/<?= $task['id'] ?>" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">View</a>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <img class="w-[30px]" src='<?php echo $task['status'] == 'todo' ? "/assets/work-in-progress.png" : ($task['status'] == 'doing' ? "/assets/workflow.png" : ($task['status'] == 'done' ? "/assets/multiply.png" : "")) ?>' />
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p class="text-lg">No tasks</p>
        <?php endif; ?>
    </div>
</div>

<?php view('components/footer') ?>