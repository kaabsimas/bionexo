<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div class="p-6 mx-auto flex items-center space-x-4">
            <div>
                <div class="text-xl font-medium text-black">Médico removido!</div>
                <p class="text-slate-500">O profissional não estará mais disponível nas listagens</p>
            </div>
        </div>
    </body>
</html>