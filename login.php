<?php
include_once('./helper/auth.php');
validateUserSessionExist();
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <title>Login | Jadingetop Ads</title>
</head>

<body>
    <div class="flex min-h-full h-screen">
        <div class="relative hidden w-0 flex-1 lg:block">
            <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1661956602116-aa6865609028?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=928&q=80" alt="">
        </div>
        <div class="flex flex-1 flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <div class="text-3xl font-bold text-blue-700">
                        Jadingetop Ads
                    </div>
                    <!-- <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> -->
                    <h2 class="mt-6 text-3xl font-bold tracking-tight text-gray-900">Masuk</h2>
                    <!-- <p class="mt-2 text-sm text-gray-600">
                        Or
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">start your 14-day free trial</a>
                    </p> -->
                </div>

                <div class="mt-8">
                    <div class="mt-6">
                        <form action="./helper/login.php" method="POST" class="space-y-3">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Alamat email</label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" autocomplete="email" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-gray-700">Kata sandi</label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">Ingat saya</label>
                                </div>
                            </div>

                            <div class="py-3 text-blue-500">
                                <a href="./register.php">Belum punya akun?</a>
                            </div>

                            <div>
                                <button type="submit" name="submit" class="flex w-full justify-center rounded-md border border-transparent bg-[#0047b3] py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>