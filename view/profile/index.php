<?php view('components/head', ['title' => 'Profile']) ?>

<session class="flex justify-center items-center h-screen">
    <div class="grid place-items-center gap-4 bg-gray-100 w-[400px] h-[400px] border border-gray-200">
        <h1>Hello <?php echo $_SESSION['user']['email'] ?></h1>
        <article>
            <a href="/profile/edit">Edit</a>
        </article>
    </div>
</session>

<?php view('components/footer') ?>
