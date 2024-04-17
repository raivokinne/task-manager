<?php view('components/head') ?>
<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4"><?= $task['title'] ?></h1>
        <p class="text-gray-700"><?= $task['description'] ?></p>
        <p class="text-gray-500">Deadline: <?= date('F d, Y', strtotime($task['deadline'])) ?></p>
        <p class="text-gray-500">Status: <?= ucfirst($task['status']) ?></p>
        <p class="text-gray-500">Priority: <?= ucfirst($task['priority']) ?></p>
        <p class="text-gray-500">Category: <?= $task['category'] ?></p>
        <a href="/tasks" class="text-blue-500 underline mt-4">Back to tasks</a>
    </div>
</div>
<?php view('components/footer') ?>