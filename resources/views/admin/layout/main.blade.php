<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite("resources/css/app.css")
    <title>Admin panel</title>
</head>
<body class="h-full">
    <x-header></x-header>

    <div class="flex mt-14 bg-slate-100">
        <x-sidebar></x-sidebar>
        <div class="flex-1 mx-4 mt-2 flex flex-col">
            <main class="flex-1 min-h-screen">
                @yield("page")
            </main>
            <x-footer></x-footer>
        </div>
    </div>
</body>
</html>
