<?php
/**
 * @var array $post
 */

include_once VIEWS_DIR . '/partials/header.php'
?>

<h1>
    <?php echo htmlspecialchars($post['title']) ?>
</h1>

<a href="/posts">Go back</a>

<div>
    <article>
        <h3><?php echo htmlspecialchars($post['title']) ?></h3>
        <p><?php echo htmlspecialchars($post['excerpt']) ?></p>
        <p><?php echo htmlspecialchars($post['content']) ?></p>
    </article>
</div>

<?php include_once VIEWS_DIR . '/partials/footer.php' ?>