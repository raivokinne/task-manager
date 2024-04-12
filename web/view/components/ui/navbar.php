<nav class="flex justify-center items-center h-[80px] w-full fixed top-0 z-50 bg-white text-black">
    <div class="flex justify-between items-center w-full mx-[50px]">
        <div class="flex items-center gap-4">
            <a href="/" class="text-2xl font-bold">Task Master</a>
        </div>

        <ul class="flex">
            <li class="ml-4">
                <a href="/" class="font-medium">Home</a>
            </li>
            <li class="ml-4">
                <a href="/tasks" class="font-medium">Tasks</a>
            </li>
            <li class="ml-4">
                <a href="/calandar" class="font-medium">Calendar</a>
            </li>
            <li class="ml-4">
                <a href="/categories">Categories</a>
            </li>
        </ul>

        <div id="search-model"
            class="hidden fixed top-0 left-0 w-screen h-screen bg-opacity-50 bg-gray-800 justify-center z-50">
            <div class="flex flex-col justify-center items-center w-full h-full">
                <input type="text" id="search-input"
                    class="w-[700px] bg-black text-white rounded-md px-3 py-4 z-[9999px]" placeholder="Search...">
                <ul id="search-results" class="w-[700px] bg-white text-black rounded-md px-3 py-4 mt-4 hidden">
                    <!-- Search results will be appended here -->
                </ul>
            </div>
        </div>

        <div class="flex gap-4 items-center">
            <?php if ($_SESSION['user'] ?? false): ?>
                <button id="search-btn" class="w-[30px]">
                    <img src="/assets/search.png" alt="Search">
                </button>
                <a href="/logout" class="font-semibold">Logout</a>
                <a href="/profile" class="w-[30px]">
                    <img src="/assets/profile-user.png" alt="Profile">
                </a>
            <?php else: ?>
                <button id="search-btn" class="w-[30px]">
                    <img src="/assets/search.png" alt="Search">
                </button>
                <a href="/login" class="font-semibold">Login</a>
                <a href="/register" class="bg-black rounded-full text-white py-1 px-6">Sign up</a>
            <?php endif; ?>
        </div>
    </div>
</nav>