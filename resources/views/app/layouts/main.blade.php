<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite("resources/css/app.css")
    <title>
        @yield("title")
    </title>
</head>
<body class="h-screen text-white">
    <x-app.header/>
    <main class="flex flex-col bg-slate-900 h-full">
        <x-container class="pt-10 flex-1">
            @yield("page")
        </x-container>
    </main>
    <x-footer></x-footer>
</body>
</html>
