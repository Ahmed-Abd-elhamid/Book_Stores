<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/book.svg" sizes="32x32" type="image/png">
    <title>Book Stores</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    @include('include.header')
    <main role="main" class="flex-shrink-0">
        <div class="container">
            @include('include.messages')
            @yield('content')
        </div>
    </main>
    @include('include.footer')
</body>
</html>