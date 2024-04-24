<?php view('components/head') ?>
<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md relative">
        <div>
            <h1 class="text-2xl font-bold mb-4"><?= $task['title'] ?></h1>
            <p class="text-gray-700"><?= $task['description'] ?></p>
            <p class="text-gray-500">Deadline: <?= date('F d, Y', strtotime($task['deadline'])) ?></p>
            <p class="text-gray-500">Status: <?= ucfirst($task['status']) ?></p>
            <p class="text-gray-500">Priority: <?= ucfirst($task['priority']) ?></p>
            <p class="text-gray-500">Category: <?= $task['category'] ?></p>
        </div>
        <br>
        <a href="/tasks/<?= $task["id"] ?>/edit" class="text-black font-semibold hover:text-gray-500 mt-4">EDIT</a>
        <form method="POST" action="/tasks/<?= $task['id'] ?>/delete">
            <?= csrf() ?>
            <?= method('DELETE') ?>
            <button>Delete</button>
        </form>
        <form method="POST" action="/tasks/<?= $task['id'] ?>/end">
            <button class="absolute bottom-4 right-4 text-red-700 font-semibold">END </button>
        </form>
        <form method="POST" action="/tasks/<?= $task['id'] ?>/finish">
            <button class="absolute bottom-4 right-20 text-green-700 font-semibold">FINISH </button>
        </form>
        <a href="/tasks" class="text-black font-semibold hover:text-gray-500 mt-4">Back to tasks</a>
    </div>
</div>
<?php view('components/footer') ?>
