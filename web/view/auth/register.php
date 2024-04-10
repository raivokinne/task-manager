<?php view('components/head', ['title' => $title]) ?>
<section class="flex items-center justify-center h-screen w-full">
    <form action="/register" method="post" class="w-[400px]">
        <fieldset class="grid gap-4 place-items-center">
            <legend class="text-3xl font-bold text-center w-full">Register</legend>
            <label for="name" class="flex flex-col gap-2">
                <span class="font-semibold">Name</span>
                <input type="text" name="name" id="name"
                    class="w-[300px] border border-black rounded-md text-black p-2 px-2">
                <?php foreach ($errors['name'] as $error): ?>
                    <p class="error text-xs text-red-500 font-semibold"><?= $error ?></p>
                <?php endforeach; ?>
            </label>
            <label for="email" class="flex flex-col gap-2">
                <span class="font-semibold">Email</span>
                <input type="email" name="email" id="email"
                    class="w-[300px] border border-black rounded-md text-black p-2 px-2">
                <?php foreach ($errors['email'] as $error): ?>
                    <p class="error text-xs text-red-500 font-semibold"><?= $error ?></p>
                <?php endforeach; ?>
            </label>
            <label for="password" class="flex flex-col gap-2">
                <span class="font-semibold">Password</span>
                <input type="password" name="password" id="password"
                    class="w-[300px] border border-black rounded-md text-black p-2 px-2">
                <?php foreach ($errors['password'] as $error): ?>
                    <p class="error text-xs text-red-500 font-semibold"><?= $error ?></p>
                <?php endforeach; ?>
            </label>
            <label for="password_confirmation" class="flex flex-col gap-2">
                <span class="font-semibold">Confirm Password</span>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-[300px] border border-black rounded-md text-black p-2 px-2">
                <?php if (isset($errors['password_confirmation'])): ?>
                    <?php foreach ($errors['password_confirmation'] as $error): ?>
                        <p class="error text-xs text-red-500 font-semibold"><?= $error ?></p>
                    <?php endforeach; ?>
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