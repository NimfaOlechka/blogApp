<!doctype html>
<title>My amazing blog</title>
<link rel="stylesheet" href="/app.css">

<body> 
    <h1 id="test">Hi my wonderful girl!</h1>
    <?php foreach ($posts as $post) : ?> 
    <article>
       <?= $post; ?>
    </article>
    <?php endforeach; ?>
</body>
