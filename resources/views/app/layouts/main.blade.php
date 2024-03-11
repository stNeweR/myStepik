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
<body class="h-full text-white flex flex-col">
    <x-app.header/>
    <main class="flex flex-col bg-slate-900 min-h-screen max-h-full flex-1">
        <x-container class="pt-14">
            @yield("page")
        </x-container>
    </main>
    <x-footer></x-footer>
</body>
</html>
