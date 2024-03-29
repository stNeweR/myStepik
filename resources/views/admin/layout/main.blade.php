<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite("resources/css/app.css")
    <title>Admin panel</title>
</head>
<body class="h-full text-white">
    <x-header></x-header>
    <div class="flex mt-14 bg-slate-900 h-full">
        <x-sidebar></x-sidebar>
        <main class="flex flex-col flex-1 min-h-screen max-h-full">
            @yield("page")
            <x-footer></x-footer>
        </main>
    </div>
</body>
</html>
