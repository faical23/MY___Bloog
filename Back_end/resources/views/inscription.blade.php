<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        <a href="home">home</a>
        <a href="inscription">inscription</a>
        <a href="post">post</a>
    </ul>

    <h1>inscription page</h1>
    <form action="{{ route('inscription') }}" method="post">
        @csrf
        <input type="text" name='name' placeholder="name">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="password" placeholder="password">
        <input type="submit">
    </form>

</body>
</html>
