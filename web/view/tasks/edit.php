<?php view('components/head') ?>

<section class="flex items-center justify-center h-screen w-full">
    <form action="/tasks/<?= $task['id'] ?>" method="post" class="w-[400px]">
        <fieldset class="grid gap-4 place-items-center">
            <legend class="text-3xl font-bold text-center w-full">Edit Task</legend>
            <label for="title" class="flex flex-col gap-2">
                <span class="font-semibold">Title</span>
                <input type="text" name="title" id="title" value="<?= $task['title'] ?>" required
                    class="w-[300px] border border-black rounded-md text-black p-2 px-2">
                <?php if (isset($errors['title'])): ?>
                    <p class="error" class="text-xs text-red-500 font-semibold"><?= $errors['title'] ?></p>
                <?php endif ?>
            </label>
            <label for="description" class="flex flex-col gap-2">
                <span class="font-semibold">Description</span>
                <textarea name="description" id="description" required
                    class="w-[300px] border border-black rounded-md text-black p-2 px-2"><?= $task['description'] ?></textarea>
                <?php if (isset($errors['description'])): ?>
                    <p class="error" class="text-xs text-red-500 font-semibold"><?= $errors['description'] ?></p>
                <?php endif ?>
            </label>
            <button type="submit" class="w-[300px] border border-black rounded-md text-black p-2 px-2">Update</button>
        </fieldset>
    </form>
</section>
<?php view('components/footer') ?>