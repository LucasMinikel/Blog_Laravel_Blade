<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="app.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog</title>
</head>

<body>
    <?php foreach ($posts as $post) : ?>
    <article>

        <h1>
            <a href="/post/<?= $post->id; ?>">
                <?= $post->title; ?>
            </a>
        </h1>
        <div>
            <?= $post->excerpt; ?>
        </div>
        <div>
            <?= $post->date; ?>
        </div>
    </article>
    <?php endforeach; ?>
</body>

</html>
