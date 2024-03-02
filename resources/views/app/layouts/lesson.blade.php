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
<body class="h-full text-white">
    <x-app.header/>
    <main class="flex flex-col bg-slate-900 h-full">
        <div class="flex-1 mt-2 gap-4 flex flex-col pt-10">
            @yield("page")
        </div>
    </main>
</body>
</html>
