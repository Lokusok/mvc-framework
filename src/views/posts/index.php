<?php
/**
 * @var array $posts
 */

include_once VIEWS_DIR . '/partials/header.php'
?>

<h1>
    Posts page
</h1>

<div>
    <?php foreach ($posts as $post): ?>
        <article>
            <h3><?php echo htmlspecialchars($post['title']) ?></h3>
            <p><?php echo htmlspecialchars($post['excerpt']) ?></p>
            <a href="/posts/<?php echo htmlspecialchars($post['id']) ?>">
                Read more
            </a>
        </article>
    <?php endforeach ?>
</div>

<?php include_once VIEWS_DIR . '/partials/footer.php' ?>