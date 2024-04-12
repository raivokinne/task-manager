<?php view('components/head') ?>
<section class="grid grid-cols-6 place-content-center min-h-screen">
    <?php view('components/ui/sidenavbar') ?>
    <div class="grid ml-10 cols-span-5 gap-4 min-h-screen p-10 py-10">
        <div class="flex flex-col gap-4">
            <h2 class="text-2xl font-bold mb-2 mt-20">Tasks</h2>
            <ul class="grid gap-2 grid-cols-6 h-full place-content-center">
                <?php if (isset($tasks) && count($tasks) > 0): ?>
                    <?php foreach ($tasks as $task): ?>
                        <li class="mb-2">
                            <a href="/tasks/show/<?= $task['id'] ?>"><?= $task['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No tasks found.</p>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>
<?php view('components/footer') ?>