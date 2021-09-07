<!doctype html>
<title>My amazing blog</title>
<link rel="stylesheet" href="/app.css">

<body> 
    <h1 id="test">Hi my wonderful girl!</h1>
    <?php foreach ($posts as $post) : ?> 
    <article>
      <h1>
          <a href="/posts/<?= $post->slug; ?>">
               <?= $post->title; ?>
          </a>
      </h1>
      <div>
        <?= $post->excerpt; ?>
      </div>
    </article>
    <?php endforeach; ?>
</body>
