<?php view('components/head', ['title' => $title]) ?>
<section class="flex items-center justify-center h-screen w-full">
    <form action="/login" method="post" class="w-[400px]">
        <fieldset class="grid gap-4 place-items-center">
            <legend class="text-3xl font-bold text-center w-full">Login</legend>
            <label for="email" class="flex flex-col gap-2">
                <span class="font-semibold">Email</span>
                <input type="email" name="email" id="email"
                    class="w-[300px] border border-black rounded-md text-black p-2 px-2">
                <?php if (isset($errors['email'])): ?>
                    <p class="error" class="text-xs text-red-500 font-semibold"><?= $errors['email'] ?></p>
                <?php endif ?>
            </label>
            <label for="password" class="flex flex-col gap-2">
                <span class="font-semibold">Password</span>
                <input type="password" name="password" id="password"
                    class="w-[300px] border border-black rounded-md text-black p-2 px-2">
                <?php if (isset($errors['password'])): ?>
                    <p class="error" class="text-xs text-red-500 font-semibold"><?= $errors['password'] ?></p>
                <?php endif ?>
            </label>
            <div>
                <a href="/forgot-password" class="text-xs text-blue-500 font-semibold">Forgot Password?</a>
            </div>
            <button type="submit" class="w-[300px] text-white rounded-md p-2 px-2 bg-black">Login</button>
            <div class="flex gap-2">
                <p>Don't have an account?</p>
                <a href="/register" class="text-blue-500 font-semibold">Register</a>
            </div>
        </fieldset>
    </form>
</section>
<?php view('components/footer') ?>