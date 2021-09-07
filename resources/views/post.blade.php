<!doctype html>
<title>My amazing blog</title>
<link rel="stylesheet" href="/app.css">

<body>     
    <article>
        <h1>            
            <?= $post->title; ?>            
        </h1>

        <div>
            <?= $post->body; ?>
        </div>

        <a href="/">Go Back to all posts</a>   
    </article> 
   
</body>
