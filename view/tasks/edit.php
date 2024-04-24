<?php view('components/head', ['title' => 'Edit Task']) ?>

<div class="flex justify-center items-center h-[900px] bg-gray-200">
    <form action="/tasks/<?= $task["id"] ?>/update" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-[500px]">
        <?= method('PUT') ?>
        <div class="mb-4">
            <h2 class="block text-gray-700 text-lg font-bold mb-2 text-center">Edit Task</h2>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
            <input value="<?= $task['title'] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Title" name="title">
            <?php if (isset($errors['title'])) : ?>
                <p class="text-red-500 text-xs italic"><?= $errors['title'] ?></p>
            <?php endif ?>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
            <textarea class="shadow appearance-none resize-none h-[100px] border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" placeholder="Description" name="description">
            <?= $task['description'] ?>
            </textarea>
            <?php if (isset($errors['description'])) : ?>
                <p class="text-red-500 text-xs italic"><?= $errors['description'] ?></p>
            <?php endif ?>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="deadline">Deadline</label>
            <input value="<?= $task['deadline'] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="deadline" type="date" name="deadline">
            <?php if (isset($errors['deadline'])) : ?>
                <p class="text-red-500 text-xs italic"><?= $errors['deadline'] ?></p>
            <?php endif ?>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="priority">Priority</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="priority" name="priority">
                <option value="low" <?= $task['priority'] == 'low' ? "selected" : "" ?>>Low</option>
                <option value="medium" <?= $task['priority'] == 'medium' ? "selected" : "" ?>>Medium</option>
                <option value="high" <?= $task['priority'] == 'high' ? "selected" : "" ?>>High</option>
            </select>
            <?php if (isset($errors['priority'])) : ?>
                <p class="text-red-500 text-xs italic"><?= $errors['priority'] ?></p>
            <?php endif ?>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Edit</button>
        </div>
    </form>
</div>

<?php view('components/footer') ?>
