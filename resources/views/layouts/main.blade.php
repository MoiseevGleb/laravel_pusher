<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat App</title>
    @vite('resources/js/app.js')
</head>
<body>
    <div id="app">
        <chat-message :user="{{ auth()->user() }}"></chat-message>
        <chat-form></chat-form>
        @yield('content')
    </div>
</body>
</html>
