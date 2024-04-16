<?php view('components/head', ['title' => 'Tasks']) ?>

<section class="grid place-items-center relative w-full h-screen">

    <h1 class="text-3xl absolute top-24 left-24">Tasks</h1>
    <article class='grid-cols-6 gap-4 grid w-screen place-items-center h-full'>
    <?php if (isset($tasks) && count($tasks) > 0): ?>
        <?php foreach ($tasks as $task): ?>
            <a href="/tasks/<?= $task['id'] ?>" class="text-center border shadow-md border-gray-300 w-[200px] h-[200px] rounded-lg  p-4">
                <h2 class='mb-4 text-xl font-semibold'><?= $task['title'] ?></h2>
                <p class='text-xs '><?= $task['description'] ?></p>
        </a>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-3xl">No tasks</p>
    <?php endif; ?>
</article>

</section>

<?php view('components/footer') ?>
