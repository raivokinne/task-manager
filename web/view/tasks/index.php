<?php view('components/head', ['title' => 'Tasks']) ?>
<section class="flex min-h-screen justify-center items-center w-full">
    <?php view('components/ui/sidenavbar') ?>
    <h1 class="text-3xl">Tasks</h1>
    <article>
        <?php if (isset($tasks) && count($tasks) > 0): ?>
            <div>
                <?php foreach ($tasks as $task): ?>
                    <p><?= $task ?></p>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-3xl">No tasks</p>
        <?php endif; ?>
    </article>
</section>
<?php view('components/footer') ?>