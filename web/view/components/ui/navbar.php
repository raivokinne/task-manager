<nav class="flex justify-center items-center h-[80px] w-full fixed top-0 z-50 border-b border-gray-300 bg-white">
    <div class="flex justify-between items-center w-full mx-[50px]">
        <div class="flex items-center gap-4">
            <a href="/" class="text-2xl font-bold">Task Master</a>

            <ul class="flex">
                <li class="ml-4">
                    <a href="/" class="font-medium">Home</a>
                </li>
                <li class="ml-4">
                    <a href="/tasks" class="font-medium">Tasks</a>
                </li>
            </ul>
        </div>

        <div>
            <label for="search">
                <input type="text" name="search" id="search" placeholder="Search tasks..." class="border border-black rounded-full text-black p-2 px-2 w-[700px]">
                <?php if (isset($errors['search'])) : ?>
                    <p class="error" class="text-xs text-red-500 font-semibold"><?= $errors['search'] ?></p>
                <?php endif ?>
            </label>
            <ul>
                <?php if (isset($results) && count($results) > 0) : ?>
                    <?php foreach ($results as $result) : ?>
                        <li class="ml-4">
                            <a href="/tasks/show/<?= $result['id'] ?>"><?= $result['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>

        <div class="flex gap-4 items-center">
            <?php if ($_SESSION['user'] ?? false) : ?>
                <a href="/logout" class="font-semibold">Logout</a>
            <?php else : ?>
                <a href="/login" class="font-semibold">Login</a>
                <a href="/register" class="font-semibold">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
