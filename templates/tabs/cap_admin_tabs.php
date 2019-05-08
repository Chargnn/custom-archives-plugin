<h2 class="nav-tab-wrapper">
    <?php foreach (cap_get_post_types() as $post_type): ?>
        <?php if (isset($_GET['tab']) && $_GET['tab'] === $post_type): ?>
            <a href="?page=cap_archives&tab=<?= $post_type; ?>"
               class="nav-tab nav-tab-active"><?= $post_type; ?></a>
        <?php else: ?>
            <a href="?page=cap_archives&tab=<?= $post_type; ?>" class="nav-tab"><?= $post_type; ?></a>
        <?php endif; ?>
    <?php endforeach; ?>
</h2>
