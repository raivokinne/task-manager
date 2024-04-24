<?php view('components/head') ?>
<section>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Forgot your password?
                </h2>
            </div>
            <div class="mt-8">
                <div class="mt-6">
                    <form class="space-y-6" action="/forgot-password" method="POST">
                        <?= csrf() ?>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Email address
                            </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <button class="bg-black text-white w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Send
                                reset link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php view('components/footer') ?>
