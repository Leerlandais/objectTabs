<?php

?>

<!doctype html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
</head>
<body>
<div class="container-fluid w-screen h-screen bg-blue-400">
    <div class="py-12">
        <?php if(isset($errorMessage)) {
        ?>
            <h2 class="text-4xl text-red-600 text-center"><?=$errorMessage?></h2>
        <?php
        }
        ?>
    </div>
<div class="container-fluid flex place-content-center">
<form action="./" method="POST">
    <div class="bg-[#F9FAFB] h-auto w-50 flex items-center">
        <div class="h-max mx-auto flex flex-col items-center">
            <div class="bg-white shadow-xl p-10 flex flex-col gap-4 text-sm text-center">
                <h3 class="text-xl font-bold text-center pb-10">Login</h3>
                <div>
                    <label for="loginUserLogin" class="text-gray-600 font-bold inline-block pb-2">Login : </label>
                    <input type="text" name="loginUserLogin" class="border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2 	" required>
                </div>
                <div>
                    <label for="loginUserPassword" class="text-gray-600 font-bold inline-block pb-2">Password : </label>
                    <input type="password" name="loginUserPassword" class="border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2 	">
                </div>
                <div>
                    <button type="submit" class="bg-[#4F46E5] w-full py-2 rounded-md text-white font-bold cursor-pointer hover:bg-[#181196]">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="./" method="POST">
    <div class="bg-[#F9FAFB] h-auto w-50 flex items-center">
        <div class="h-max mx-auto flex flex-col items-center">
            <div class="bg-white shadow-xl p-10 flex flex-col gap-4 text-sm text-center">
                <h3 class="text-xl font-bold text-center pb-10">Create</h3>
                <div>
                    <label for="createUserName" class="text-gray-600 font-bold inline-block pb-2">Full Name : </label>
                    <input type="text" name="createUserName" class="border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2" required>
                </div>
                <div>
                    <label for="loginUserEmail" class="text-gray-600 font-bold inline-block pb-2">Email : </label>
                    <input type="email" name="createUserEmail" class="border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2" required>
                </div>
                <div>
                    <label for="loginUserLogin" class="text-gray-600 font-bold inline-block pb-2">Login : </label>
                    <input type="text" name="createUserLogin" class="border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2" required>
                </div>
                <div>
                    <label for="loginUserPassword" class="text-gray-600 font-bold inline-block pb-2">Password : </label>
                    <input type="password" name="createUserPassword" class="border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2" required>
                </div>
                <div>
                    <label for="loginUserPassVerify" class="text-gray-600 font-bold inline-block pb-2">Repeat Password : </label>
                    <input type="password" name="createUserPassVerify" class="border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2" required>
                </div>
                <div>
                    <button type="submit" class="bg-[#4F46E5] w-full py-2 rounded-md text-white font-bold cursor-pointer hover:bg-[#181196]">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

</div>
<a href="?logout"><button class="bg-[#4F46E5] w-auto p-2 rounded-md text-white font-bold cursor-pointer hover:bg-[#181196]">Logout</button></a>
</div>
</body>
</html>

