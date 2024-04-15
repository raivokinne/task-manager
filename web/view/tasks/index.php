<?php view('components/head', ['title' => 'Tasks']) ?>
<section class="grid grid-cols-6 place-content-center min-h-screen">
    <?php view('components/ui/sidenavbar') ?>
    <div class="grid ml-10 cols-span-5 gap-4 min-h-screen p-10 py-10">
        <div class="flex flex-col gap-4 justify-center items-center">
            <h2 class="text-2xl font-bold mb-2 mt-20">Tasks</h2>
            <ul class="grid gap-2 grid-cols-6 h-full place-items-center">
                <?php if (isset($tasks) && count($tasks) > 0): ?>
                    <?php foreach ($tasks as $task): ?>
                        <li class="mb-2">
                            <a href="/tasks/show/<?= $task['id'] ?>"><?= $task['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <a href="/tasks/create" class="w-[50px] p-2 ml-32 px-2">
                        <img src="/assets/add(1).png" alt="No tasks">
                    </a>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>
<?php view('components/footer') ?>