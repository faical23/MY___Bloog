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

    <h1>post page</h1>
    <form action="{{ route('post') }}" method="post">
        @csrf
        <input type="text" name='post_titre' placeholder="post_titre">
        <input type="text" name="post_topic" placeholder="post_topic">
        <input type="text" name="post_img" placeholder="post_img">
        <input type="text" name="post_description" placeholder="post_description">
        <input type="text" name="post_like" placeholder="post_like">
        <input type="text" name="post_ID" placeholder="post_ID">
        <input type="submit">
    </form>

</body>
</html>
