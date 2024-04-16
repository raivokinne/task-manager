<?php view('components/head', ['title' => 'Create Task']) ?>

<section class="grid grid-cols-6 h-screen w-full">
    <?php view('components/ui/sidenavbar') ?>
    <form action="/tasks" method="post" class="cols-span-5 grid gap-4 place-items-center min-h-screen w-[1000px]">
        <fieldset class="grid gap-4 place-items-center">
            <legend class="text-3xl font-bold text-center w-full">Create Task</legend>
            <label for="title" class="flex flex-col gap-2">
                <span class="font-semibold">Title</span>
                <input type="text" name="title" id="title" required class="w-[300px] border border-black rounded-md text-black p-2 px-2" placeholder="Title">
                <?php if (isset($errors['title'])) : ?>
                    <p class="error" class="text-xs text-red-500 font-semibold"><?= $errors['title'] ?></p>
                <?php endif ?>
            </label>
            <label for="description" class="flex flex-col gap-2">
                <span class="font-semibold">Description</span>
                <textarea name="description" id="description" placeholder="Description" required class="w-[300px] resize-none border border-black rounded-md text-black p-2 px-2">

                </textarea>
                <?php if (isset($errors['description'])) : ?>
                    <p class="error" class="text-xs text-red-500 font-semibold"><?= $errors['description'] ?></p>
                <?php endif ?>
            </label>
            <button type="submit" class="w-[300px] text-white bg-black rounded-md p-2 px-2">Create</button>
        </fieldset>
    </form>
</section>
<?php view('components/footer') ?>
