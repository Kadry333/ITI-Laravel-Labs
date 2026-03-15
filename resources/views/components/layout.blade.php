<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ITI Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-white">

    <!-- Navbar -->
    <nav class="bg-gray-800 text-white px-6 py-3 flex items-center gap-6">
        <span class="font-semibold text-lg">ITI Blog</span>
        <a href="{{ route('posts.index') }}" class="text-gray-300 text-sm">All Posts</a>
    </nav>
    {{ $slot }}

    </body>

</html>