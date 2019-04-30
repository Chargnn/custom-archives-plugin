<?php
$post_types = get_post_types('', 'names');
$post_types = array_diff($post_types, ['attachment', 'revision', 'custom_css',
    'nav_menu_item', 'customize_changeset',
    'oembed_cache', 'user_request', 'wp_block'])
?>

<div class="wrap">
    <h1><?= esc_html(get_admin_page_title()); ?></h1>

    <?php if(isset($_GET['tab'])): ?>
        <?php if(!in_array($_GET['tab'], $post_types)): ?>
            <div class="notice notice-error is-dismissible">
                <p><?php _e('The post type you are editing does not appear to exist', 'custom_archives_plugin'); ?></p>
            </div>
            <?php die; ?>
        <?php endif; ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e('You are now editing the archive page for <u>' . $_GET['tab'] . '</u>', 'custom_archives_plugin'); ?></p>
    </div>
    <?php endif; ?>

    <h2 class="nav-tab-wrapper">

    <?php foreach($post_types as $post_type): ?>
        <a href="?page=cap_archives&tab=<?= $post_type; ?>" class="nav-tab"><?= $post_type; ?></a>
    <?php endforeach; ?>
    </h2>
    <br/>

    <?= wp_editor('', 'terms_wp_content', ['textarea_rows' => 15, 'tabindex' => 1]); ?>
</div>