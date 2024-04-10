<?php view('components/head', ['title' => $title]) ?>
<section class="flex items-center justify-center h-screen w-full">
    <form action="/register" method="post" class="w-[400px]">
        <fieldset class="grid gap-4 place-items-center">
            <legend class="text-3xl font-bold text-center w-full">Register</legend>
            <label for="name" class="flex flex-col gap-2">
                <span class="font-semibold">Name</span>
                <input type="text" name="name" id="name" required
                    class="w-[300px] border border-black rounded-md text-black p-2 px-2">
                <?php if (isset($errors['name'])): ?>
                    <p class="error" class="text-xs text-red-500 font-semibold"><?= $errors['name'] ?></p>
                <?php endif ?>
            </label>
            <label for="email" class="flex flex-col gap-2">
                <span class="font-semibold">Email</span>
                <input type="email" name="email" id="email" required
                    class="w-[300px] border border-black rounded-md text-black p-2 px-2">
                <?php if (isset($errors['email'])): ?>
                    <p class="error" class="text-xs text-red-500 font-semibold"><?= $errors['email'] ?></p>
                <?php endif ?>
            </label>
            <label for="password" class="flex flex-col gap-2">
                <span class="font-semibold">Password</span>
                <input type="password" name="password" id="password" required
                    class="w-[300px] border border-black rounded-md text-black p-2 px-2">
                <?php if (isset($errors['password'])): ?>
                    <p class="error" class="text-xs text-red-500 font-semibold"><?= $errors['password'] ?></p>
                <?php endif ?>
            </label>
            <label for="password_confirmation" class="flex flex-col gap-2">
                <span class="font-semibold">Confirm Password</span>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-[300px] border border-black rounded-md text-black p-2 px-2">
                <?php if (isset($errors['password_confirmation'])): ?>
                    <p class="error" class="text-xs text-red-500 font-semibold"><?= $errors['password_confirmation'] ?></p>
                <?php endif ?>
            </label>
            <button type="submit" class="w-[300px] text-white rounded-md p-2 px-2 bg-black">Login</button>
            <div class="flex gap-2">
                <p>Already have an account?</p>
                <a href="/login" class="text-blue-500 font-semibold">Login</a>
            </div>
        </fieldset>
    </form>
</section>
<?php view('components/footer') ?>